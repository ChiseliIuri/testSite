<?php

/**
 * UserModel
 */
class UserModel extends BaseModel {
	const TABLE = 'users';

	static $_table_setup = [
		'fName' => ['type' => 's'],
		'lName' => ['type' => 's'],
		'age'   => ['type' => 'i']
	];

	function __construct($data = null) {
		parent::__construct($data);
	}
}