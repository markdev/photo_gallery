<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>

<?php
	$user = new User();
	$user->username = "zookeeper";
	$user->password = "goats";
	$user->first_name = "thingy";
	$user->last_name = "thangy";
	$user->save();
?>


<?php include_layout_template('admin_footer.php'); ?>
		
