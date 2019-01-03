<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
    $currentDate = date( 'Y-m-d');

if(strlen($_SESSION['user_all'])==0)
  { 
header('location:../../index');
}
else{  
include('../../db/config.php');
?>
<script src="../../assets/coustom/swwetalert/jslib.js"></script>
<script src="../../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/coustom/swwetalert/sweetalert.css">
<?php
 $booking_id=$_GET['booking_id'];
 $driver_id=$_GET['driver_id'];

 if (isset($_POST['submit'])) 

{
	
 $cost=$_POST['cost'];
 $driver_rating=$_POST['driver_rating'];
 $start_mileage=$_POST['start_mileage'];
 $end_mileage=$_POST['end_mileage'];

 
$query4=mysqli_query($con,"UPDATE `car_booking` SET `booking_cost`='$cost', `driver_rating`='$driver_rating',`driver_id`='$driver_id' ,`start_mileage`='$start_mileage' ,`end_mileage`='$end_mileage'  WHERE `booking_id` ='$booking_id' ");

//****************** Start Sweet Alert ********************/// 
                          ?>

                        <script type="text/javascript">
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Your Comment Update Successfull..!!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-notclosed-car.php";
                                  }
                                }); }, 0);
                      </script>            
                        <?php  
 //****************** End Sweet Alert ********************///
        
}

if (isset($_POST['closeComit']))
{

 $cost=$_POST['cost'];
 $driver_rating=$_POST['driver_rating'];
 $start_mileage=$_POST['start_mileage'];
 $end_mileage=$_POST['end_mileage'];

$query5=mysqli_query($con,"UPDATE `car_booking` SET `booking_cost`='$cost', `driver_rating`='$driver_rating',`driver_id`='$driver_id' ,`start_mileage`='$start_mileage' ,`end_mileage`='$end_mileage' , `comit_st`='1'  WHERE `booking_id` ='$booking_id' ");

//****************** Start Sweet Alert ********************///
                          ?>
                           <script type="text/javascript">
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Permanently Close This Comment!!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-notclosed-car.php";
                                  }
                                }); }, 0);
                      </script>         
   
                          <?php 
//****************** End Sweet Alert ********************///

		}
}					
?>