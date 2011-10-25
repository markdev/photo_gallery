<?php
require_once(LIB_PATH.DS."config.php");

//If it's going to need the database, then it's
//a good idea to require it before we start.

class User {

	protected static $table_name = "users";
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

	public static function authenticate($username="", $password="") {
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);
		$sql = "SELECT * FROM users ";
		$sql .= "WHERE username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
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

	public function save() {
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;
		$sql = "INSERT INTO " . self::$table_name  . " (";
		$sql .= "username, password, first_name, last_name";
		$sql .= ") VALUES ('";
		$sql .= $database->escape_value($this->username) . "', '";
		$sql .= $database->escape_value($this->password) . "', '";
		$sql .= $database->escape_value($this->first_name) . "', '";
		$sql .= $database->escape_value($this->last_name) . "')";
		if($database->query($sql)) {
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		global $database;
		$sql = "UPDATE " . self::$table_name  . " SET ";
		$sql .= "username='". $database->escape_value($this->username) ."', ";
		$sql .= "password='". $database->escape_value($this->password) ."', ";
		$sql .= "first_name='". $database->escape_value($this->first_name) ."', ";
		$sql .= "last_name='". $database->escape_value($this->last_name) ."' ";
		$sql .= "WHERE id=". $database->escape_value($this->id);
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	public function delete() {
		global $database;
		$sql = "DELETE FROM " . self::$table_name ;
		$sql .= " WHERE id=" . $database->escape_value($this->id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1)? true : false;
	}
}

?>
