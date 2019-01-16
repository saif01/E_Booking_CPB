<?php
include('../db/config.php');

if ($_GET['deleteId']) {
	
$id=$_GET['deleteId'];


// For delete file
$query2=mysqli_query($con,"SELECT `photo` FROM `legal_notice` WHERE `notice_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file="../pimages/notice/".$row['photo'];
    	$delphoto=unlink($file);

   	}

// For delete database record
	$delsql=mysqli_query($con,"DELETE FROM `legal_notice` WHERE `notice_id`='$id' ");

	if ($delsql) 
	{
		header('location:notice-all');
	}

	else
	{
			echo '<script language="javascript">';
			echo 'alert("Error !!!!..All Data Not Deleted")';
			echo '</script>';
			header('location:advisor-all');
	}	

}

?>