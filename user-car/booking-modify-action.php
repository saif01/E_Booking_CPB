<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );//H, Time in 24 hours show , h, for 12 hours 
$currentDate=date('Y-m-d');

if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{
?>
<!--*********start Sweet alert For Submiting data **********-->
 <script src="assets/coustom/swwetalert/jslib.js"></script>
 <script src="assets/coustom/swwetalert/dev.js"></script>
 <link rel="stylesheet" type="text/css" href="assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php 

include('../db/config.php');

$booking_id=$_GET['booking_id'];

$SQL=mysqli_query($con,"SELECT `start_date` FROM `car_booking` WHERE `booking_id`='$booking_id'");

$row=$SQL->fetch_assoc();

$start=$row['start_date'];


if (isset($_POST['submit'])) 
{

	$end_books= $_POST['end_date'] . ' ' . $_POST['end_time'];

	if ($start > $end_books) 
	{
		 $_SESSION['error']="dateError";
		  header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	else
	{


	$sqlUp=mysqli_query($con,"UPDATE `car_booking` SET `end_date`='$end_books' WHERE `booking_id`='$booking_id'");
									
			?>
				<script>
                setTimeout(function () { 
                        swal({
                          title: "Successfully!",
                          text: "Your End Booking Time Changed!",
                          type: "success",
                          confirmButtonText: "OK"
                        },
                        function(isConfirm){
                          if (isConfirm) {
                           window.opener.location.reload();
		          		   window.close();
                          }
                        }); },0);
                 
              </script>
             <?php
                      
         }


	}//End Submit 

	
	
}?>
