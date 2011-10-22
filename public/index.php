<?php

require_once('../includes/database.php');
require_once('../includes/user.php');

$user = User::find_by_id(1);
print_r($user);
?>
