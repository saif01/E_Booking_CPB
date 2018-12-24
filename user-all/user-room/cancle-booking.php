<?php 
include('../../db/config.php');
include('../../line/line_Room_Msg.php');
$r_booking_id= $_GET['r_booking_id'];

$query=mysqli_query($con,"UPDATE `room_booking` SET `booking_st`='0' WHERE `r_booking_id`='$r_booking_id'");


//**************Three table joining*****************//
$sql=mysqli_query($con,"SELECT room_booking.booking_start, room_booking.booking_end, room_booking.purpose, room_booking.hours, room.room_name, user.user_name, user.user_dept FROM room_booking INNER JOIN room ON room_booking.room_id=room.room_id INNER JOIN user ON room_booking.user_id= user.user_id WHERE room_booking.r_booking_id='$r_booking_id'");
while ($row=mysqli_fetch_array($sql)) {
	$start_book= $row['booking_start'];
	$end_book= $row['booking_end'];
	$U_realName= $row['user_name'];
	$dept=$row['user_dept']; 
	//$location= $row['location'];
	$purpose= $row['purpose'];
	//$dariver_name=$row['driver_name'];
	$room_name=$row['room_name'];
	
    $u_dept=str_replace('&', 'and', $dept);
	$purposeLine = str_replace('&', 'and', $purpose);

//*************For Sending Line Group Message*******************//
        $message="Canceled Status, %0A Canceled By: $U_realName,%0A Department: $u_dept,%0A Purpose: $purposeLine,%0A Room: $room_name,%0A Start: $start_book,%0A End: $end_book.";
          lineMsg($message);
	}
?>
<!--*********start Sweet alert For Submiting data **********-->
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
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
                                    window.location.href = "user-booked-room.php";
                                  }
                                }); }, 1000);
                      </script>            
                         
<!-- //****************** End Sweet Alert ********************///
 -->
