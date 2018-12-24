<?php
include('../db/config.php');

if ($_GET['room_id']) {	
$id=$_GET['room_id'];

// For delete file
$query2=mysqli_query($con,"SELECT `room_img1`, `room_img2`, `room_img3` FROM `room` WHERE `room_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file1="../pimages/room/".$row['room_img1'];
    	unlink($file1);
    	$file2="../pimages/room/".$row['room_img2'];
    	unlink($file2);
    	$file3="../pimages/room/".$row['room_img3'];
    	unlink($file3);

   	}

// For delete database record
	$query=mysqli_query($con,"DELETE FROM `room` WHERE `room_id`='$id' ");

	
header('location:room-all.php');
}

?>