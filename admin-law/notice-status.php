<?php
include('../db/config.php');

/*  anable or disable code for user  */
// For hide 
if(isset($_GET['hide_id']))
{
$id=$_GET['hide_id'];

$que=mysqli_query($con,"UPDATE `legal_notice` SET `show_st`='0' WHERE `notice_id`='$id' ");

header('location:notice-all');
}
// For Show
if(isset($_GET['show_id']))
{
$id=$_GET['show_id'];

$que=mysqli_query($con,"UPDATE `legal_notice` SET `show_st`='1' WHERE `notice_id`='$id' ");

header('location:notice-all');
}
?>