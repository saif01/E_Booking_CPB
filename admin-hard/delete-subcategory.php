<?php
include('../db/config.php');

if ($_GET['Id']) {
	
$id=$_GET['Id'];



// For delete database record
	$delsql=mysqli_query($con,"DELETE FROM `cms_hard_subcategory` WHERE `sub_id`='$id' ");

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