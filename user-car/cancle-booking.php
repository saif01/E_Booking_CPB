<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{
include('../db/config.php');
include('../line/line_Car_Msg.php');
$booking_id= $_GET['booking_id'];

$query=mysqli_query($con,"UPDATE `car_booking` SET `boking_status`= '0' WHERE `booking_id`='$booking_id' ");


//**************Three table joining*****************//
$sql=mysqli_query($con,"SELECT car_booking.car_number, car_booking.start_date, car_booking.end_date, car_booking.location, car_booking.purpose, car_driver.driver_name, user.user_name, user.user_dept FROM car_booking INNER JOIN car_driver ON car_booking.car_id=car_driver.car_id INNER JOIN user ON car_booking.user_id=user.user_id WHERE car_booking.booking_id='$booking_id'");
while ($row=mysqli_fetch_array($sql)) {
	// $start_book= date("M j, g:i a", strtotime($row['start_date']));
	// $end_book= date("M j, g:i a", strtotime($row['end_date']));
	$start_book= $row['start_date'];
	$end_book= $row['end_date'];
	$U_realName= $row['user_name'];
	$dept=$row['user_dept']; 
	$location= $row['location'];
	$purpose= $row['purpose'];
	$dariver_name=$row['driver_name'];
	$car_number=$row['car_number'];
	
  $u_dept=str_replace('&', 'and', $dept);
	$purposeLine = str_replace('&', 'and', $purpose);
  $locationLine = str_replace('&', 'and', $location);

//*************For Sending Line Group Message*******************//
    $message="Canceled Status, %0A Canceled By: $U_realName,%0A Department: $u_dept,%0A Destination: $locationLine,%0A Purpose: $purposeLine,%0A Driver: $dariver_name,%0A Car: $car_number,%0A Start: $start_book,%0A End: $end_book.";
          lineMsg($message);
	}
?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->

    <!-- //****************** Start Sweet Alert ********************/// -->                         
                          <script type="text/javascript">
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Your Booking canceled successfully..!!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-booked-car.php";
                                  }
                                }); },0);
                      </script>            
                         
<!-- //****************** End Sweet Alert ********************///
 -->
<?php } ?>