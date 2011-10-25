<?php
require_once(LIB_PATH.DS."config.php");

//If it's going to need the database, then it's
//a good idea to require it before we start.

class User extends DatabaseObject {

	protected static $table_name = "users";
	protected static $db_fields = array('username', 'password', 'first_name', 'last_name');

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;	

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
}

?>
