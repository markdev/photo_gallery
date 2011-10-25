<?php
require_once(LIB_PATH.DS."config.php");

//A class to help work with Sessions
//In our case, primarily to manage logging users in and out

//Keep in mind when workin iwth session that it is generally
//inadvisable to store db-related objects in sessions

class Session {

	private $logged_in;
	public $user_id;	

	function __construct() {
		session_start();
		$this->check_login();
		if($this->logged_in) {
			//actions to take right away if user is logged in
		} else {
			//actions to take right away if user is not logged in
		}
	}

	public function is_logged_in() {
		return $this->logged_in;
	}

	public function login($user) {
		// database should find user based on username/password
		if($user) {
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->logged_in = true;
			$this->add_log_entry($this->user_id);
		}
	}

	public function add_log_entry($user_id) {
		$file = SITE_ROOT.DS.'logs/log.txt';
		if($handle = fopen($file, 'a')) {
		   $user = User::find_by_id($user_id);
		   $time = strftime("%G-%m-%d %T", time());	
           fwrite($handle, "\n$time | $user->username logged in ");
		} else {
			
		}
		fclose($handle);
	}

	public function read_log_entries() {
		$file = SITE_ROOT.DS.'logs/log.txt';
		$content = "<ul>";
		if($handle = fopen($file, 'r')) {
			while(!feof($handle)) {
				$blurb = fgets($handle);
				if(strlen($blurb) > 1) {	
					$content .= "<li>" . $blurb  . "</li>";
				}
			}
		}
		fclose($handle);
		$content .= "</ul>";
		return $content;
	}

	public function clear_logs() {
		$file = SITE_ROOT.DS.'logs/log.txt';
		if($handle = fopen($file, 'w')) {
		}	
	}	

	public function logout() {
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->logged_in = false;
	}

	private function check_login() {
		if(isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
		} else {
			unset($this->user_id);
			$this->logged_in = false;
		}
	}
}

$session = new Session();

?>
