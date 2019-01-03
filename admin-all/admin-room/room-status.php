<?php
include('../../db/config.php');

/*  anable or disable code for user  */

if(isset($_GET['h_room_id']))
{
$id=$_GET['h_room_id'];

$que=mysqli_query($con,"UPDATE `room` SET `show_st`='0' WHERE `room_id`='$id' ");

header('location:room-all.php');
}

if(isset($_GET['s_room_id']))
{
$id=$_GET['s_room_id'];

$que=mysqli_query($con,"UPDATE `room` SET `show_st`='1' WHERE `room_id`='$id' ");

header('location:room-all.php');
}
?>