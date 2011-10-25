<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>

<?php
	$user = new User();
	$user->username = "name";
	$user->password = "pwd";
	$user->first_name = '1';
	$user->last_name = '2';
	$user->save();
?>


<?php include_layout_template('admin_footer.php'); ?>
		
