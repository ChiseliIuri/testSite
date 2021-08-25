<?php
class DB {
	private static $instance = null;

	private function __construct($host, $user, $pass, $name) {
		$link = @mysqli_connect($host, $user, $pass, $name);
		if($link) {
			$this->link = $link;
		} else {
			throw new Exception('Eroare de conectare la BD A', 1);
		}
	}

	public static function getInstance() {
		if(self::$instance == null) {
			throw new Exception('Eroare de conectare la BD B', 2);
		}
		return (self::$instance)->link;
	}

	public static function connect($host, $user, $pass, $name) {
		self::$instance = new DB($host, $user, $pass, $name);
		return (self::$instance)->link;
	}
}