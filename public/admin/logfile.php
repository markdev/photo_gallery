<?php
require_once('../../includes/initialize.php');

if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>
<?php if($_GET['clear']=='true') {$session->clear_logs();} ?>

		<h2>Menu</h2>

<?php echo $session->read_log_entries(); ?>

<a href="logfile.php?clear=true">Clear Log Files</a>	
		</div>
		
<?php include_layout_template('admin_footer.php'); ?>
