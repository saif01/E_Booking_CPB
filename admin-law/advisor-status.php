<?php
include('../db/config.php');

/*  anable or disable code for user  */
// For hide 
if(isset($_GET['hide_id']))
{
$id=$_GET['hide_id'];

$que=mysqli_query($con,"UPDATE `advisor` SET `status`='0' WHERE `advisor_id`='$id' ");

header('location:advisor-all');
}
// For Show
if(isset($_GET['show_id']))
{
$id=$_GET['show_id'];

$que=mysqli_query($con,"UPDATE `advisor` SET `status`='1' WHERE `advisor_id`='$id' ");

header('location:advisor-all');
}
?>