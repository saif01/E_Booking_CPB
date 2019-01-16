<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );
if(strlen($_SESSION['car_room_id'])==0)
  { 
header('location:../index');
}
else{

include('../db/config.php');
$room_id=$_GET['room_id'];

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
                        <h2>Meeting Room Booking</h2>
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
      //*********Room Booked Have or Not Checking
                      if($_SESSION['error']=="booked")
                        {?>
          						<div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Sorry!</strong> This Room Booked By Another User!!!.
                      </div>
          						<?php
          						echo htmlentities($_SESSION['error']="");
          						 }
      //*********Room Booked Date Checking
                       if($_SESSION['error']=="pre_Time")
                        {?>
                      <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Sorry!</strong> You Can't Put Previous Date!!!.
                      </div>
                      <?php
                      echo htmlentities($_SESSION['error']="");
                       }
                      

                       ?>

              <form action="booking-meeting-action.php?room_id=<?php echo $room_id; ?>" method="POST" onsubmit="return Validate(this);">
                

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



<!--*********start Sweet alert For Submiting data **********-->
<!-- <script src="../assets/coustom/swwetalert/jslib.js"></script> -->
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->

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