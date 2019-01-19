<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin');
}
else{  
 
include('../db/config.php');


/*  anable or disable code for user  */



// For hide 
if(isset($_GET['h_user_id']))
{
$id=$_GET['h_user_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_st`='0' WHERE `user_id`='$id' ");

 header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_user_id']))
{
$id=$_GET['s_user_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_st`='1' WHERE `user_id`='$id' ");

 header('Location: ' . $_SERVER['HTTP_REFERER']);
}



// ********** Car Pool status change ************************//
if(isset($_GET['h_user_car_id']))
{
$id=$_GET['h_user_car_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_car_st`='0' WHERE `user_id`='$id' ");

//header('location:user-all');
 header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_user_car_id']))
{
$id=$_GET['s_user_car_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_car_st`='1' WHERE `user_id`='$id' ");

//header('location:user-all');
 header('Location: ' . $_SERVER['HTTP_REFERER']);
}



// ********** Room Booking status change ************************//
if(isset($_GET['h_user_room_id']))
{
$id=$_GET['h_user_room_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_room_st`='0' WHERE `user_id`='$id' ");

 header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_user_room_id']))
{
$id=$_GET['s_user_room_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_room_st`='1' WHERE `user_id`='$id' ");

 header('Location: ' . $_SERVER['HTTP_REFERER']);
}

// ********** Legal status change ************************//
if(isset($_GET['h_user_law_id']))
{
$id=$_GET['h_user_law_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_law_st`='0' WHERE `user_id`='$id' ");

 header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_user_law_id']))
{
$id=$_GET['s_user_law_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_law_st`='1'WHERE `user_id`='$id' ");

 header('Location: ' . $_SERVER['HTTP_REFERER']);
}




}?>

