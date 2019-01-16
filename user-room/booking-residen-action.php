<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );//H=24 hours and h=12 hours
if(strlen($_SESSION['car_room_id'])==0)
  { 
header('location:../index');
}
else{
include('../db/config.php');
include('../line/line_Room_Msg.php');
$room_id=$_GET['room_id'];
$user_id=$_SESSION['user_id'];

?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php


//******** Room Name For Line Message ************/// 
$RoomLineSql=mysqli_query($con,"SELECT `room_name` FROM `room` WHERE `room_id`='$room_id'");
$room_row=$RoomLineSql->fetch_assoc();
$roomName=$room_row['room_name'];

//******** User Name And Department For Line Message ************/// 
$userLineSql=mysqli_query($con,"SELECT `user_name`, `user_dept`  FROM `user` WHERE `user_id`='$user_id'");
$user_row=$userLineSql->fetch_assoc();
$U_Name=$user_row['user_name'];
$u_dept=$user_row['user_dept'];



if (isset($_POST['submit'])) {
  $start_date=$_POST['start_date'];
  //****** Time **********//
  $start_time=$_POST['start_time'];
  $return_time=$_POST['return_time'];

  $booking_start=$_POST['start_date'] . ' ' . $_POST['start_time'];
  $booking_end=$_POST['end_date'] . ' ' . $_POST['return_time'];
  $purpose=$_POST['purpose'];
  $booking_st=1;

  //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($booking_start);
        $ts2    =   strtotime($booking_end);
        $seconds    = abs($ts2 - $ts1); # difference will always be positive
        //$days = round($seconds/(60*60*24));
        $hours=round($seconds/(60*60));
  //Start Time Subtraction and convert to days.


//****** Booked info Check **********//
  $bookedCh=mysqli_query($con,"SELECT * FROM `room_booking` WHERE `booking_st`='1' AND `room_id`='$room_id' AND (`booking_start` BETWEEN '$booking_start' AND '$booking_end' OR `booking_end` BETWEEN '$booking_start'  AND '$booking_end' OR '$booking_start' BETWEEN `booking_start` AND `booking_end` OR '$booking_end' BETWEEN `booking_start` AND  `booking_end` )");

  $booked=mysqli_num_rows($bookedCh);

//************For checking booked Have or not*********//
  if ($booked>0) 
  {
    $_SESSION['error']="booked";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
//************For checking Start Date Correct or not*********//
  elseif (date($start_date) < date('Y-m-d')) 
  {
    $_SESSION['error']="pre_Time";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  //************For checking Date ANd Time Correct or not*********//
    elseif ($booking_start==$booking_end) 
    {
        $_SESSION['error']="sameTime";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

  //************For checking Date ANd Time Correct or not*********//
    elseif ($booking_start>$booking_end) 
     {
         $_SESSION['error']="NotValid";
         header('Location: ' . $_SERVER['HTTP_REFERER']);
     }

  else
  {

  $storeData=mysqli_query($con,"INSERT INTO `room_booking`(`room_id`, `booking_start`, `booking_end`, `purpose`, `hours`, `booking_st`, `user_id`) VALUES ('$room_id','$booking_start','$booking_end','$purpose','$hours','$booking_st','$user_id')");

  $U_dept=str_replace('&', 'and', $u_dept);
  $purposeLine = str_replace('&', 'and', $purpose);

//*************For Sending Line Group Message*******************//
       $message="Booked Status,%0A Booked By: $U_Name,%0A Department: $U_dept,%0A Purpose: $purposeLine,%0A Room: $roomName,%0A Start: $booking_start,%0A End: $booking_end.";
                        lineMsg($message);


                           if ($storeData) 
                        {
                          ?>
                      <script type="text/javascript">
                        setTimeout(function () { 
                                swal({
                                  title: "Booked Successfully!",
                                  text: "Your Room Booking Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "residential-room.php";
                                  }
                                }); },0);
                      </script>
                      <?php
                        }
                        else
                        {
                          ?>
                      <script type="text/javascript">
                        setTimeout(function () { 
                                swal({
                                  title: "Error!",
                                  text: "Your Room Booking Not Completed!",
                                  type: "error",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "residential-room.php";
                                  }
                                }); },0);
                      </script>
                      <?php
                        }


      }


	}

}?>