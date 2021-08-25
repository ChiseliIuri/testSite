<?php

abstract class BaseModel {
	const TABLE = null;
	const PK = 'id';
	protected $_table_data = [];
	static $_table_setup = [];

	public function say() {
		return $this::TABLE;
	}

	protected function __construct($data) {
		if($data && is_array($data)) {
			$this->_table_data = $data;
		}
	}

	public function __get($property) {
		if (isset($this->_table_data[$property])) {
			return $this->_table_data[$property];
		}
	}

	public function __set($property, $value) {
		$this->_table_data[$property] = $value;
		return $this;
	}

	// CRUD (create, read, update, delete)

	public function save() {
		if(isset($this->_table_data[$this::PK])) {
			return $this->update();
		} else {
			return $this->insert();
		}
	}

	public function insert() {
		$this->check_table();
		$data = $this->_model_data();
		$length = count($data);
		if(!$length) {
			// throw new Exception("No data for insert", 1);
			return false;
		}

		$keys = array_keys($data);
		$template = array_fill_keys($keys,'?');
		$query = sprintf(
			"INSERT INTO `%s` (%s) values(%s)",
			$this::TABLE,
			implode(', ', $keys),
			implode(', ', $template)
		);
		$setup = $this::$_table_setup;
		$setup[$this::PK] = ['type'=>'i'];
		$types = implode('', array_map(function($key)use($setup){ return $setup[$key]['type']; }, array_keys($data)));

		$link = DB::getInstance();
		return $this->__do_query($query, $data, $types);
	}

	protected function update() {
		$this->check_table();
		$data = $this->_model_data();
		$pk = $data[$this::PK];
		unset($data[$this::PK]);

		$values_part = array_map(function($key){ return sprintf("%s = ?", $key); },array_keys($data));
		$values_part = implode(', ', $values_part);

		$setup = $this::$_table_setup;
		$types = implode('', array_map(function($key)use($setup){ return $setup[$key]['type']; }, array_keys($data)));

		$query = sprintf(
			"UPDATE `%s` SET %s WHERE `%s` = ?",
			$this::TABLE,
			$values_part,
			$this::PK
		);
		$data[$this::PK] = $pk;
		return $this->__do_query($query, $data, $types . 'i');
	}

	private function __do_query($query, $params, $types = null) {
		// https://www.php.net/manual/en/mysqli.prepare
		if($types===null) {
			$types = str_repeat('s', count($params));
		}
		$link = DB::getInstance();
		$prepare = $link->prepare($query);
		if ($prepare->bind_param($types, ...array_values($params))) {
			if ($prepare->execute()) {
				if(strpos($query, 'INSERT') !== false) {
					$pk = $this::PK;
					$this->_table_data[$pk] = $link->insert_id;
					return $this->$pk;
				} else {
					return true;
				}
			} else {
				return false;
			}
		}
	}

	public function delete() {
		$pole = sprintf('`%s` = ?', $this::PK);
		$query = sprintf(
			"DELETE FROM %s WHERE %s",
			$this::TABLE,
			$pole
		);
		$link = DB::getInstance();
		$prepare = $link->prepare($query);

		$pk = $this::PK;
		if ($prepare->bind_param('i', $this->_table_data[$pk])) {
			if ($prepare->execute()) {
				return true;
			}
		}
		return false;
	}

	public static function findByPk($id) {
		$model = get_called_class();
		$result = self::find([$model::PK => $id]);
		if(isset($result[$id])) {
			return $result[$id];
		}
		return false;
	}

	public static function find($params) {
		$model = get_called_class();
		$keys = array_keys($params);
		$where = array_map(function($key){ return sprintf("`%s` = ?", $key); }, $keys);
		$query = sprintf(
			"SELECT * FROM %s WHERE %s",
			$model::TABLE,
			implode(', ', $where)
		);
		$link = DB::getInstance();
		$prepare = $link->prepare($query);

		$setup = $model::$_table_setup;
		$setup[$model::PK] = ['type'=>'i'];
		$types = implode('', array_map(function($key)use($setup){ return $setup[$key]['type']; }, $keys));

		if ($prepare->bind_param($types, ...array_values($params))) {
			if ($prepare->execute()) {
				$result = $prepare->get_result();
				$rows = [];
				while ($row = $result->fetch_assoc()) {
					$rows[$row[$model::PK]] = new $model($row);
				}
				return $rows;
			}
		}
		return false;
	}

	public static function findAll() {
		$model = get_called_class();
		$link = DB::getInstance();
		$sql = sprintf("SELECT * FROM `%s`", $model::TABLE);
		$qObj = $link->query($sql);
		if (!empty($qObj)) {
			$ar = array();
			while ($row = $qObj->fetch_assoc()) {
				$ar[$row[$model::PK]] = $row;
			}
			return $ar;
		} else {
			return [];
		}
	}

	private function check_table() {
		if(!$this::TABLE) {
			throw new Exception("No table in model", 1);
		}
	}

	private function _model_data() {
		$data = array_intersect_key($this->_table_data, $this::$_table_setup);
		if(isset($this->_table_data[$this::PK])) {
			$data[$this::PK] = $this->_table_data[$this::PK];
		}
		return $data;
	}
}