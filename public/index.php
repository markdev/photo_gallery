<?php

require_once('../includes/database.php');
require_once('../includes/user.php');
require_once('../includes/session.php');
require_once('../includes/functions.php');

$user = User::find_by_id(1);
print_r($user);
echo "<br/>";
print_r($session);
?>
