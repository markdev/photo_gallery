<?php
require_once('../../includes/initialize.php');

$session = new Session();
$session->logout();
redirect_to('login.php');

?>
