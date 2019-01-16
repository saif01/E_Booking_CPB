<?php
include('../db/config.php');

if ($_GET['deleteId']) {
	
$id=$_GET['deleteId'];


// For delete file
$query2=mysqli_query($con,"SELECT `photo` FROM `advisor` WHERE `advisor_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file="../pimages/advisor/".$row['photo'];
    	$delphoto=unlink($file);

   	}

// For delete database record
	$delsql=mysqli_query($con,"DELETE FROM `advisor` WHERE `advisor_id`='$id' ");

	if ($delphoto && $delsql) 
	{
		header('location:advisor-all');
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