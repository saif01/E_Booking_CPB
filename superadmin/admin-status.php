<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin');
}
else{  
 
include('../db/config.php');


/*  anable or disable code for admin  */



// For hide 
if(isset($_GET['h_admin_id']))
{
$id=$_GET['h_admin_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_st`='0' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_admin_id']))
{
$id=$_GET['s_admin_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_st`='1' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}



// ********** Car Pool status change ************************//
if(isset($_GET['h_admin_car_id']))
{
$id=$_GET['h_admin_car_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='0' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_admin_car_id']))
{
$id=$_GET['s_admin_car_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='1' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}



// ********** Room Booking status change ************************//
if(isset($_GET['h_admin_room_id']))
{
$id=$_GET['h_admin_room_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_room_st`='0' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_admin_room_id']))
{
$id=$_GET['s_admin_room_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_room_st`='1' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}


// ********** Legal status change ************************//
if(isset($_GET['h_admin_law_id']))
{
$id=$_GET['h_admin_law_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_law_st`='0' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_admin_law_id']))
{
$id=$_GET['s_admin_law_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_law_st`='1'WHERE `admin_id`='$id' ");

header('location:admin-all');
}


// ********** Super Admin status change ************************//
if(isset($_GET['h_admin_super_id']))
{
$id=$_GET['h_admin_super_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_super_st`='0' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// For Show
if(isset($_GET['s_admin_super_id']))
{
$id=$_GET['s_admin_super_id'];

$que=mysqli_query($con,"UPDATE `admin` SET  `admin_car_st`='1',`admin_room_st`='1',`admin_law_st`='1',`admin_super_st`='1' WHERE `admin_id`='$id' ");

header('Location: ' . $_SERVER['HTTP_REFERER']);
}



}?>

