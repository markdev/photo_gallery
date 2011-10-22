<?php

//If it's going to need the database, then it's
//a good idea to require it before we start.
require_once('database.php');

class User {

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;	

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM Users");
	}

	public static function find_by_id($id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM users WHERE id = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}
	
	public function full_name() {
		if(isset($this->first_name) && isset($this->last_name)) {
			return $this->first_name . " " . $this->last_name;
		} else {
			return "";
		}
	}
	
	private static function instantiate($record) {
		$object = new self;
		foreach($record as $attribute=>$value) {
			if(self::has_attribute($attribute)) {
				$object->$attribute = $value;
			} 		
		}
		return $object;
	}

	private static function has_attribute($attribute) {
		$object = new self;
		//get_object_vars returns an associative array with all attributes
		//(incl. private ones) as the keys and their current values as the value
		$object_vars = get_object_vars($object);
		//We don't care about the value, we just want to know if the key exists
		//will return true or false
		return array_key_exists($attribute, $object_vars);
	}
}

?>
