<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );//H, Time in 24 hours show , h, for 12 hours 
if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{

//***************************************Temporary*********************************************************************************************************************************************************************** Temporary Car Booking Page **************************************************************************************************************************************************************Temporary****************************************//

include('../db/config.php');

$car_id= $_GET['car_id'];

$user_login= $_SESSION['car_logIn_id'];
$user_id= $_SESSION['user_id'];

//*********Only User Real Name finding *********//
$Query0=mysqli_query($con,"SELECT `user_name`, `user_dept` FROM `user` WHERE `user_id`='$user_id'");
$S_name=$Query0->fetch_assoc();
$U_realName=$S_name['user_name'];
$dept=$S_name['user_dept'];
$u_dept=str_replace('&', 'and', $dept);

 //******************* Car and Driver joining *********************//
$drCarSql=mysqli_query($con,"SELECT tbl_car.car_name, tbl_car.car_namePlate, tbl_car.car_img1, car_driver.driver_id, car_driver.driver_name, car_driver.driver_img FROM tbl_car INNER JOIN car_driver ON tbl_car.car_id=car_driver.car_id WHERE tbl_car.car_id='$car_id' ");
$value=$drCarSql->fetch_assoc();
//*** Car Table Value ****//
$car_name= $value['car_name'];
$car_number=$value['car_namePlate'];
$car_img=$value['car_img1'];
//*** Driver Table Value ****//
$driver_id=$value['driver_id']; 
$dariver_name=$value['driver_name'];
$driver_img=$value['driver_img'];



//*********** 2 table join ******************//
//***********Start Calendar Data Show ************//
$calData=array();
$calenderSql=mysqli_query($con,"SELECT car_booking.booking_id, car_booking.start_date, car_booking.end_date, car_booking.location, user.user_name, user.user_dept FROM car_booking INNER JOIN user ON car_booking.user_id=user.user_id WHERE car_booking.boking_status='1' AND car_booking.car_id='$car_id'");

while ($cal_row = $calenderSql->fetch_assoc()) 
{
  $calData[]=array(

    'id'=> $cal_row["booking_id"],
    'title'=> $cal_row["location"].' || '. $cal_row["user_name"].' || '. $cal_row["user_dept"],
    'start'=> $cal_row["start_date"],
    'end'=> $cal_row["end_date"],
  );  
}
//***********End Calendar Data Show ************//


  ?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <?php require('common/icon.php'); ?> 
    <link rel="stylesheet" type="text/css" href="assets/coustom/myCoustom.css">
    
    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?> 


  <!-- For Calendar Load Links -->
<link href='cal/fullcalendar.min.css' rel='stylesheet' />
<link href='cal/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='cal/lib/moment.min.js'></script>
<script src='cal/lib/jquery.min.js'></script>
<script src='cal/fullcalendar.min.js'></script>
<script src='cal/locale-all.js'></script>

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
    <!--== Header Area End ==-->
     <!--==************************* Header Area End ****************************************************************************************************************************==-->



<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                   <div class="section-title  text-center">

                    <img src="../pimages/car/<?php echo $car_img;?>" class="img-responsive carImg"  alt="Car Image" />

                    <img src="../pimages/driver/<?php echo $driver_img;?>" class="img-responsive driverImg"  alt="Driver Image" />

                       <h2><?php echo $car_number;?> || <?php echo $dariver_name;?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
      <?php
//Driver Leave Date Show....
$driverLevsql=mysqli_query($con,"SELECT * FROM `driver_leave` WHERE `leave_status`='1' AND `driver_id`='$driver_id' ORDER BY `driver_leave_id` DESC LIMIT 1");
$driver_lev=$driverLevsql->fetch_assoc();

$driver_leave_start=$driver_lev['driver_leave_start'];
$driver_leave_end=$driver_lev['driver_leave_end'];

if ( $driver_leave_end >= $currentTime) {

echo '<h5><p class="badge-warning text-dark"> Driver Leave :'.date("M j, Y", strtotime($driver_leave_start)).' To '.date("M j, Y", strtotime($driver_leave_end)).'</p></h5>' ;
}

 ?>
                        
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
                      <h3>Temporary Car Booking Entry</h3> 

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
                      

                       if($_SESSION['error']=="pre")
                        { ?>
                      <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Sorry!</strong> You can not Book Previous Date !!.
                      </div>
                      <?php 
                      echo htmlentities($_SESSION['error']="");
                       }

//***** If Driver Leave Then show*****//
                       if($_SESSION['error']=="driverLeave")
                        { ?>
                      <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Sorry!</strong> You can't Book because Driver Not avaiable at this date!!.
                      </div>
                      <?php 
                      echo htmlentities($_SESSION['error']="");
                       } 

 //***** If Police Requisition Then show*****//
                       if($_SESSION['error']=="ploce_requisition")
                        { ?>
                      <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Sorry!</strong> You can't Book because Police Requisition have at this date!!.
                      </div>
                      <?php 
                      echo htmlentities($_SESSION['error']="");
                       } 

//***** If Car Maintence Then show*****//
                       if($_SESSION['error']=="maintence")
                        { ?>
                      <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Sorry!</strong> You can't Book because, this car send for maintenance purpose!!.
                      </div>
                      <?php 
                      echo htmlentities($_SESSION['error']="");                     
                     }
//******** After Same Result Found Show This Message *************//
                       if($_SESSION['error']=="same_result")
                        { ?>
                      <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Booking Complete!</strong> Found Same Record You have to show.
                        <a href="same_record" class="btn btn-info">Click Me</a>
                      </div>
                      <?php 
                      echo htmlentities($_SESSION['error']="");
                       } 

             
                       ?>

              <form action="booking-action-temp.php?car_id=<?php echo $car_id; ?>" method="POST" onsubmit="return Validate(this);">
                

                  <div class="row">
                    <div class="col-md-12">
                      
                      <label>Pic-Up DATE:
                          <input type="date"  name="start_date"  placeholder="Pick Up Date" required />
                         
                       </label>
                    </div>
                    
                  </div>
                
                                <div class="row">
                    <div class="col-md-4">
                       <div class="pickup-location book-item">
                      <label>Destination : </label>
                                  
                        <select name="location" class="custom-select" required>
                            <option value="">Select Destination</option> 
                                    
                  <?php
                    $query2=mysqli_query($con,"SELECT `location` FROM `location` ORDER BY `location`");

                        while ($row2 = mysqli_fetch_array($query2))
                        {
                  echo "<option value='". $row2['location'] ."'>" .$row2['location'] . "</option>" ;
                  }
                  ?>

                                   </select>
                              </div>          
                    </div>

              <div class="col-md-4">
                      <div class="pickup-location book-item">
                              <label>Start time : </label>
                                    <select id="first" name="start_time" class="custom-select" required> 
                                        <option value="" disabled selected >Select Time </option>
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
                                        </div>    

                                    </div>
                                    <div class="col-md-4">
                                  <div class="pickup-location book-item">

                                    <label>Return Time : </label>
                                        <select id="second" name="return_time" class="custom-select" required> 
                                          <option value="" disabled selected >Select Time </option>
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
                                                                                  
                                         </select>
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
                  
                  <button id="btnSubmit" type="submit"  name="submit" class="fa fa-check-square"> Book Car</button>
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

    
<!--=== Jquery Min Js ===-->
   <!--  <script src="assets/js/jquery-3.2.1.min.js"></script> -->
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

<!-- Bubmit Button Disable After submit form -->
<script type="text/javascript">
    $(document).ready(function () {
    $('form').submit(function () {
        setTimeout(function () { disableButton(); },0);
    });

    function disableButton() {
        $("#btnSubmit").prop('disabled', true);
    }
});
</script>



</body>

</html>

<?php } ?>

