
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
		
	
<?php $file=$_GET['file'];  ?>
	<img src="../pimages/app/<?php echo ($file); ?>" >
	</div>
</body>
</html>