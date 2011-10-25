<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>

<?php
	$user = User::find_by_id(6);
//	$user->username = "foo";
//	$user->password = "bar";
//	$user->first_name = "tbaz";
//	$user->last_name = "quuuux";
//	$user->save();
	$user->delete();
?>


<?php include_layout_template('admin_footer.php'); ?>
		
