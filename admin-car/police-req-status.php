<?php
include('../db/config.php');

/*  anable or disable code for user  */
// For hide 
if(isset($_GET['h_req_id']))
{
$id=$_GET['h_req_id'];

$que=mysqli_query($con,"UPDATE `police_req` SET `req_st`='0' WHERE `req_id`='$id' ");

header("Location: " . $_SERVER["HTTP_REFERER"]);
}

?>