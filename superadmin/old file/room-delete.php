<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin/index');
}
else{ 
include('../db/config.php');
?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php

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

}

?>
                <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Delete Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "room-all.php";
                                  }
                                }); },0);
                       
                      </script>
<?php } ?>