<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );
if(strlen($_SESSION['user_all'])==0)
  { 
header('location:../../index');
}
else{

include('../../db/config.php');
include('../../line/line_Room_Msg.php');

$room_id=$_GET['room_id'];
$user_id=$_SESSION['user_id'];

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
  $booking_end=$_POST['start_date'] . ' ' . $_POST['return_time'];
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
  $bookedCh=mysqli_query($con,"SELECT * FROM `room_booking` WHERE `booking_st`='1' AND '$booking_start' BETWEEN `booking_start` AND `booking_end` AND `room_id`='$room_id' ");
  
  $booked=mysqli_num_rows($bookedCh);



  if ($booked>0) 
  {
    $_SESSION['error']="booked";
  }

  else
  {

  $storeData=mysqli_query($con,"INSERT INTO `room_booking`(`room_id`, `booking_start`, `booking_end`, `purpose`, `hours`, `booking_st`, `user_id`) VALUES ('$room_id','$booking_start','$booking_end','$purpose','$hours','$booking_st','$user_id')");

  $U_dept=str_replace('&', 'and', $u_dept);
  $purposeLine = str_replace('&', 'and', $purpose);

//*************For Sending Line Group Message*******************//
       $message="Booked Status,%0A Booked By: $U_Name,%0A Department: $U_dept,%0A Purpose: $purposeLine,%0A Room: $roomName,%0A Start: $booking_start,%0A End: $booking_end.";
                        lineMsg($message);

        //**********Start Sweet Alert and redirect other Page ***********// 
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
                                    window.location.href = "meeting-room.php";
                                  }
                                }); }, 1000);
                      </script>
                      <?php
          //**********End Sweet Alert and redirect other Page ***********// 
      }


}


//*********** 3 table join ******************//

$calData=array();
$calenderSql=mysqli_query($con,"SELECT room_booking.r_booking_id, room_booking.booking_start, room_booking.booking_end, user.user_name, user.user_dept, room.room_name FROM `room_booking` INNER JOIN `user` ON room_booking.user_id=user.user_id INNER JOIN room ON room_booking.room_id=room.room_id WHERE room_booking.booking_st='1' AND room_booking.room_id='$room_id'");

while ($cal_row = $calenderSql->fetch_assoc()) 
{
	$calData[]=array(

		'id'=> $cal_row["r_booking_id"],
		'title'=> $cal_row["room_name"].' || '. $cal_row["user_name"].' || '. $cal_row["user_dept"],
		'start'=> $cal_row["booking_start"],
		'end'=> $cal_row["booking_end"],

	);
	
}


?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/cpb.ico" type="image/x-icon" />

<!--*********start Sweet alert For Submiting data **********-->
  <!-- <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->


 <!-- For Calendar Load Links -->
<link href='cal/fullcalendar.min.css' rel='stylesheet' />
<link href='cal/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='cal/lib/moment.min.js'></script>
<script src='cal/lib/jquery.min.js'></script>
<script src='cal/fullcalendar.min.js'></script>
<script src='cal/locale-all.js'></script>
    
    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?>

<script>
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      //defaultDate: '2018-03-12',
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      //editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: <?php echo json_encode($calData); ?>
        
    });    
  });
</script>




<style type="text/css">   
      
/************ My Coustom CSS For Warning Button *******************/
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}
 
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
.driverImg{
    border-radius: 10px 20px;
    background: #ffd000;
    padding: 2px; 
    width: 100px;
    height: 110px;
  margin-right: 0px;
  float: right;
}

.carImg{
    border-radius: 10px 20px;
    background: #ffd000;
    padding: 2px; 
    width: 200px;
    height: 110px;
    margin-right: 0px;
    float: left;
}

    </style> 

</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="Syful-IT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <?php require('common/topbar.php') ?>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <?php require('common/logo.php'); ?>
                    
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <?php require('common/navbar.php'); ?>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--==************************* Header Area End ****************************************************************************************************************************==-->



<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Room Booking</h2>
                        <span class="title-line"><i class="fa fa-home"></i></span>
                       <!--  <p>C.P. Bangladesh Car List.. </p> -->
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->


<section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 m-auto">
                  <div class="login-page-content">
					           <div class="login-form">
                      <h3>Meeting Room Booking</h3> 

          						<?php 
                      if ($_SESSION['error']=="") 
                      {
          						  echo htmlentities($_SESSION['error']="");

          						}
                      if($_SESSION['error']=="booked")
                        {?>
          						<div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Sorry!</strong> This Car Booked By Another User!!!.
                      </div>
          						<?php
          						echo htmlentities($_SESSION['error']="");
          						 }
                      

                       ?>

              <form action="" method="POST" onsubmit="return Validate(this);">
                

                  <div class="row">
                    <div class="col-md-12">
                      
                      <label>Pic-Up DATE:
                          <input type="date"  name="start_date"  placeholder="Pick Up Date" required />
                         
                       </label>
                    </div>
                    
                  </div>
                

          
                <div class="row">
                    
             
                            
                            <div class="col-lg-12">        
                              <div id="manual_input_show" class="pickup-location book-item " >
                                    <div class="row">
                                        <div class="col-lg-6 " >
                                            <label>Booking Start time :
                                    <select id="first" name="start_time" class="custom-select" > 
                                        <option value="01:00:00">Select Time </option>
                                            <option value="09:00:00">9.00 AM </option>
                                            <option value="09:30:00">9.30 AM </option>
                                            <option value="10:00:00">10.00 AM </option>
                                            <option value="10:30:00">10.30 AM </option>
                                            <option value="11:00:00">11.00 AM </option>
                                            <option value="11:30:00">11.30 AM </option>
                                            <option value="12:00:00">12.00 PM </option>
                                            <option value="12:30:00">12.30 PM </option>
                                            <option value="13:00:00">1.00 PM </option>
                                            <option value="13:30:00">1.30 PM </option>
                                            <option value="14:00:00">2.00 PM </option>
                                            <option value="14:30:00">2.30 PM </option>
                                            <option value="15:00:00">3.00 PM </option>
                                            <option value="15:30:00">3.30 PM </option>
                                            <option value="16:00:00">4.00 PM </option>
                                            <option value="16:30:00">4.30 PM </option>
                                            
                                           
                                            
                                                                                  
                                         </select>
                                            </label>
                                        </div>

                                        <div  class="col-md-6">
                                            <label>Booking Return Time :
                                        <select id="second" name="return_time" class="custom-select"> 
                                          <option value="23:59:00">Select Time </option>
                                            
                                            <option value="09:30:00">9.30 AM </option>
                                            <option value="10:00:00">10.00 AM </option>
                                            <option value="10:30:00">10.30 AM </option>
                                            <option value="11:00:00">11.00 AM </option>
                                            <option value="11:30:00">11.30 AM </option>
                                            <option value="12:00:00">12.00 PM </option>
                                            <option value="12:30:00">12.30 PM </option>
                                            <option value="13:00:00">1.00 PM </option>
                                            <option value="13:30:00">1.30 PM </option>
                                            <option value="14:00:00">2.00 PM </option>
                                            <option value="14:30:00">2.30 PM </option>
                                            <option value="15:00:00">3.00 PM </option>
                                            <option value="15:30:00">3.30 PM </option>
                                            <option value="16:00:00">4.00 PM </option>
                                            <option value="16:30:00">4.30 PM </option>
                                            <option value="17:00:00">5.00 PM </option>
                                            <option value="17:30:00">5.30 PM </option>
                                            <option value="18:00:00">6.00 PM </option>
                                            
                                                                                  
                                         </select>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                           </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      
                      <label>Purpose:
                          <input type="text"  name="purpose"  placeholder="Enter Purpose" required />
                         
                       </label>
                    </div>
                   
                  </div>

                

                <div class="log-btn">
                  
                  <button type="submit"  name="submit" class="fa fa-check-square"> Book Room</button>
                </div>
              </form>
                    </div>
 

                </div>
          </div>


        <div class="col-lg-6 col-md-12 m-auto">
                  <div class="login-page-content">
                          <div id="calendar"></div>                    
                  </div>                    
        </div>


</div>
</div>
</section>




    <!--=======================Javascript============================-->


<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 -->


<script type="text/javascript">
        function Validate(objForm) {
            if(document.getElementById("first").value == document.getElementById("second").value)
            {
   
            swal({
                  title: "Invalid Input",
                  text: "You Can't Input Same Time !!",
                  type: "warning",
                  buttons: true,
                  dangerMode: true,
                });
    return false;
            }
            else if(document.getElementById("first").value >= document.getElementById("second").value)
            {
    
        swal({
              title: "Invalid Input",
              text: "You Can't Put Lower Time from Start Time !! ",
              type: "warning",
              buttons: true,
              dangerMode: true,
            });
    return false;
            }
            return true;
        }

</script>



    <!--== Footer Area Start ==-->
    <section id="footer-area">           
        <?php require('common/footer.php'); ?>     
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="Syful-IT">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->

    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>


    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>
<!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>
    

</body>

</html>

<?php } ?>