
<!DOCTYPE html>
<html>
<head>
	 <?php include('common/icon.php'); ?>

        <?php include('common/title.php'); ?>

<style type="text/css">
	img{
		max-width: 100%;
	    height: auto;
	    width: auto\9; /* ie8 */
	}
</style>

</head>
<body>
	<div style="height: 100%; width: 100%;">
		


	
<?php

if (isset($_GET['file'])) {
	$file=$_GET['file']; ?>

	<img src="../pimages/hard/<?php echo ($file); ?>" >
<?php }?>

<?php

if (isset($_GET['file2'])) {
	$file=$_GET['file2']; ?>

	<img src="../pimages/hardaction/<?php echo ($file); ?>" >
<?php }?>
	
	</div>
</body>
</html>