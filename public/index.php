<?php

require_once('../includes/database.php');
require_once('../includes/user.php');

$user = User::find_by_id(1);
print_r($user);
echo "<br/>";

$user = User::find_by_sql("SELECT * FROM users WHERE first_name = 'marcus'");
print_r($user);
echo "<br/>";

$user = User::find_all();
print_r($user);
echo "<br/>";
 
?>
