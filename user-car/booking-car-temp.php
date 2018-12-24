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
include('line/lineMsg.php');

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



if (isset($_POST['submit'])) {

   $start_date=$_POST['start_date'];
    $start_book= $_POST['start_date'] . ' ' . $_POST['start_time'];
    $end_book= $_POST['start_date'] . ' ' . $_POST['return_time'];  

    //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($start_book);
        $ts2    =   strtotime($end_book);
        $seconds    = abs($ts2 - $ts1); # difference will always be positive
        $days = round($seconds/(60*60*24));
        //$days2 = $seconds/(60*60*24);
  //Start Time Subtraction and convert to days.
 
        $currentTime = date( 'Y-m-d h:i:s', time () );   
      $ts3   =   strtotime($currentTime);
      $ts4    =   strtotime($start_book);
      $seconds    = abs($ts3 - $ts4); # difference will always be positive
      $afterdays = round($seconds/(60*60*24));

//**************** Driver leave Status Checking ***********************//
 $drivLev=mysqli_query($con,"SELECT * FROM `driver_leave` WHERE `leave_status`='1' AND `driver_id`='$driver_id' AND date('$start_date') BETWEEN date(`driver_leave_start`) AND date(`driver_leave_end`)");
$drivLevs=mysqli_num_rows($drivLev);
      

        if(date($start_date) < date('Y-m-d'))
                {
                  $_SESSION['error']="pre";
                }
//************For checking Driver leave Status *********//
        elseif($drivLevs>0)
              {
                $_SESSION['error']="driverLeave";
              }                  

        else{

            $sql=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id' AND `boking_status`='1' AND '$start_book' BETWEEN `start_date` AND `end_date`");

            //SELECT * FROM `car_booking` WHERE `car_id`='$car_id' AND '$start_book' BETWEEN `start_date` AND `end_date` 

                $result=mysqli_num_rows($sql);

                if ($result > 0) 
                {
                    
                    $_SESSION['error']="booked";
                   
                }

                
                else
                {

                   
                    $start_book= $_POST['start_date'] . ' ' . $_POST['start_time'];
                    $end_book= $_POST['start_date'] . ' ' . $_POST['return_time'];

                    $location=$_POST['location'];
                     $purpose=$_POST['purpose'];

                     $purposeLine = str_replace('&', 'and', $purpose);
                     $locationLine = str_replace('&', 'and', $location);

                    $status=1;

                      $samRecd=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `boking_status`='1' AND `start_date`='$start_book' AND `end_date`='$end_book' AND `location`='$location' AND `user_name`!='$username'");
                       $sameResult=mysqli_num_rows($samRecd);

                      if ($sameResult > 0) {

                        $query=mysqli_query($con,"INSERT INTO `car_booking`(`car_id`, `user_id`, `user_name`, `car_name`, `car_number`, `car_img`, `start_date`, `end_date`, `location`, `purpose`, `day_count`, `boking_status`) VALUES ('$car_id','$user_id','$username','$car_name','$car_number','$car_img','$start_book','$end_book','$location','$purpose','$days','$status')");

  //*************For Sending Line Group Message*******************//
                    $message="Booked Status,%0A Booked By: $U_realName,%0A Department: $u_dept,%0A Destination: $locationLine,%0A Purpose: $purposeLine,%0A Driver: $dariver_name,%0A Car: $car_number,%0A Start: $start_book,%0A End: $end_book.";
                    lineMsg($message);

                   $_SESSION['error']="same_result";
 //************Store Value in SESSION for show same record*********//                
                  $_SESSION['start_book']=$start_book;
                  $_SESSION['end_book']= $end_book;
                  $_SESSION['location']=$location;

                        
                      }
                      else
                      {
                        $query=mysqli_query($con,"INSERT INTO `car_booking`(`car_id`, `user_id`, `user_name`, `car_name`, `car_number`, `car_img`, `start_date`, `end_date`, `location`, `purpose`, `day_count`, `boking_status`) VALUES ('$car_id','$user_id','$username','$car_name','$car_number','$car_img','$start_book','$end_book','$location','$purpose','$days','$status')");
                        
//*************For Sending Line Group Message*******************//
                      $message="Booked Status,%0A Booked By: $U_realName,%0A Department: $u_dept,%0A Destination: $locationLine,%0A Purpose: $purposeLine,%0A Driver: $dariver_name,%0A Car: $car_number,%0A Start: $start_book,%0A End: $end_book.";
                        lineMsg($message);
                    
                         
//****************** Start Sweet Alert ********************///
                          ?>
                      <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Booked Successfully!",
                                  text: "Your Car Booking Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "car-list-temp.php";
                                  }
                                }); }, 1000);
                         // alert('Update successfull.  !');
                         // window.open('car-list-reg.php', '_self');
                      </script>
                      <?php
//****************** End Sweet Alert ********************///

                              // alert('Update successfull..  !');
                              // window.open('car-list-temp.php','_self');
                           $_SESSION['error']="";
                      }
                    
                }

        }

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

    
    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?> 


  <!-- For Calendar Load Links -->
<link href='cal/fullcalendar.min.css' rel='stylesheet' />
<link href='cal/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='cal/lib/moment.min.js'></script>
<script src='cal/lib/jquery.min.js'></script>
<script src='cal/fullcalendar.min.js'></script>
<script src='cal/locale-all.js'></script>

<style>
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

              <form action="" method="POST" onsubmit="return Validate(this);">
                

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
                  
                  <button type="submit"  name="submit" class="fa fa-check-square"> Book Car</button>
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

</script>

</body>

</html>

<?php } ?>

