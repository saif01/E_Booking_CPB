<?php
include('../db/config.php');

if ($_GET['Id']) {
	
$id=$_GET['Id'];



// For delete database record
	$delsql=mysqli_query($con,"DELETE FROM `cms_app_module` WHERE `mod_id`='$id' ");

	if ($delsql) 
	{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
	}

	else
	{
			echo '<script language="javascript">';
			echo 'alert("Error !!!!..All Data Not Deleted")';
			echo '</script>';
	}	

}

?>