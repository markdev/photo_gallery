<?php
require_once('../includes/initialize.php');

$user = User::find_by_id(1);
print_r($user);
echo "<br/>";
print_r($session);
?>
