<?php
include('../db/config.php');

/*  anable or disable code for user  */
// For hide 
if(isset($_GET['h_admin_id']))
{
$id=$_GET['h_admin_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_st`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}
// For Show
if(isset($_GET['s_admin_id']))
{
$id=$_GET['s_admin_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_st`='1' WHERE `admin_id`='$id'");

header('location:admin-all');
}



//***** For make Change Car Section Admin *****//

if(isset($_GET['h_car_ad_id']))
{
$id=$_GET['h_car_ad_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='0',`admin_room_st`='0',`admin_law_st`='0',`admin_super_st`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}

if(isset($_GET['s_car_ad_id']))
{
$id=$_GET['s_car_ad_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='1',`admin_room_st`='0',`admin_law_st`='0',`admin_super_st`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}

//***** For make Change Room Booking Section Admin *****//

if(isset($_GET['h_room_ad_id']))
{
$id=$_GET['h_room_ad_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='0',`admin_room_st`='0',`admin_law_st`='0',`admin_super_st`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}

if(isset($_GET['s_room_ad_id']))
{
$id=$_GET['s_room_ad_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='0',`admin_room_st`='1',`admin_law_st`='0',`admin_super_st`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}

//***** For make Change Legal Or Law Section Admin *****//

if(isset($_GET['h_law_ad_id']))
{
$id=$_GET['h_law_ad_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='0',`admin_room_st`='0',`admin_law_st`='0',`admin_super_st`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}

if(isset($_GET['s_law_ad_id']))
{
$id=$_GET['s_law_ad_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='0',`admin_room_st`='0',`admin_law_st`='1',`admin_super_st`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}


//***** For make Change Super Admin Section Admin *****//

if(isset($_GET['h_super_ad_id']))
{
$id=$_GET['h_super_ad_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='0',`admin_room_st`='0',`admin_law_st`='0',`admin_super_st`='0' WHERE `admin_id`='$id'");

header('location:admin-all');
}

if(isset($_GET['s_super_ad_id']))
{
$id=$_GET['s_super_ad_id'];

$que=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='1',`admin_room_st`='1',`admin_law_st`='1',`admin_super_st`='1' WHERE `admin_id`='$id'");

header('location:admin-all');
}





?>