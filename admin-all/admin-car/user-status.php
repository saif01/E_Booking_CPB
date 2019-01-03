<?php
include('../../db/config.php');

/*  anable or disable code for user  */
// For hide 
if(isset($_GET['h_user_id']))
{
$id=$_GET['h_user_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_st`= '0' WHERE `user_id`='$id' ");

header('location:user-all-info');
}
// For Show
if(isset($_GET['s_user_id']))
{
$id=$_GET['s_user_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_st`= '1' WHERE `user_id`='$id' ");

header('location:user-all-info');
}

//For Room Hide
if(isset($_GET['h_user_room_id']))
{
$id=$_GET['h_user_room_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_room_st`= '0' WHERE `user_id`='$id' ");

header('location:user-all-info');
}
//For Room Show
if(isset($_GET['s_user_room_id']))
{
$id=$_GET['s_user_room_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_room_st`= '1' WHERE `user_id`='$id' ");

header('location:user-all-info');
}


//For Car Hide
if(isset($_GET['h_user_car_id']))
{
$id=$_GET['h_user_car_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_car_st`= '0' WHERE `user_id`='$id' ");

header('location:user-all-info');
}
//For Car Show
if(isset($_GET['s_user_car_id']))
{
$id=$_GET['s_user_car_id'];

$que=mysqli_query($con,"UPDATE `user` SET `user_car_st`= '1' WHERE `user_id`='$id' ");

header('location:user-all-info');
}

?>