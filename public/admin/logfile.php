<?php
require_once('../../includes/initialize.php');

if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>
<?php if($_GET['clear']=='true') {$session->clear_logs();} ?>

<a href="index.php">Back</a>

		<h2>Log File</h2>

<a href="logfile.php?clear=true">Clear Log Files</a>	

<?php echo $session->read_log_entries(); ?>

		</div>
		
<?php include_layout_template('admin_footer.php'); ?>
