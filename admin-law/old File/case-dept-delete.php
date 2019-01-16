<?php
include('../db/config.php');

if ($_GET['deleteId']) {
	
$id=$_GET['deleteId'];



// For delete database record
	$delsql=mysqli_query($con,"DELETE FROM `case_dept` WHERE `dept_id`='$id' ");

	if ($delsql) 
	{
		header('location:case-dept-add');
	}

	else
	{
			echo '<script language="javascript">';
			echo 'alert("Error !!!!..All Data Not Deleted")';
			echo '</script>';
	}	

}

?>