<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>

<?php
	$photo = Photograph::find_by_id($_GET['id']);
	$photo_location = SITE_ROOT . DS . "public" . DS . "images" . DS . $photo->filename;
?>

<a href="index.php">Back</a>

	<h2>View Uploaded Photo</h2>
	
	<table>
	<thead>
		<td>Image</td>
		<td>Type</td>
		<td>Size</td>
		<td>Caption</td>
	</thead>
	<tr>
		<td>
			<img src="../images/<?=$photo->filename ?>" height="175" alt="<?=$photo->filename ?>" />
		</td>
		<td>
			<?=$photo->type ?>
		</td>
		<td>
			<?=$photo->size ?>
		</td>
		<td>
			<?=$photo->caption ?>
		</td>
	</tr>
	</table>	

<?php include_layout_template('admin_footer.php'); ?>
		
