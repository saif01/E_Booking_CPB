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

 include('../db/config.php');

                 
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <?php require('common/icon.php'); ?> 

    
    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?>

   


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

                       <h2> 
                        <?php echo ($_SESSION['car_logIn_id']) ?>'s Booked car</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
    <!--== FAQ Area Start ==-->
    <section id="faq-page-area" class="section-padding">
        <div class="container">
            <div class="row">



                <!-- FAQ Content Start -->
                <div class="col-lg-12">
                    <div class="faq-details-content">
                        <!-- Single FAQ Subject  Start -->
                        <div class="single-faq-sub">
                            <!-- <h3>Booked Info</h3> -->

                            <?php
            $user_id=$_SESSION['user_id'];
                    //$query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_id` = '$user_id' ORDER BY `booking_id` DESC LIMIT 4");
                    $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_id`='$user_id' AND `comit_st`='' AND `start_date` >='$currentDate' ORDER BY `start_date` ASC ");
                    while($row=mysqli_fetch_array($query))
                    {  
 
$startDate=$row['start_date'];
$endDate=$row['end_date'];

 $date1 = new DateTime($startDate);
   $date2 = new DateTime($endDate);

$sdate=$date1->format('d.M.Y'); 
$edate=$date2->format('d.M.Y');

$sdate2=$date1->format('d-m-Y h:i:s A ');
$edate2=$date2->format('d-m-Y h:i:s A');


 //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($startDate);
        $ts2    =   strtotime($endDate);
        $seconds    = abs($ts2 - $ts1); # difference will always be positive
        $days = round($seconds/(60*60*24));
        $hours=round($seconds/(60*60));
  //Start Time Subtraction and convert to days.


                          ?>

                                <div class="single-faq-sub-content ">
                                    <div id="accordion">
                                        <!-- Single FAQ Start -->
                                        <div class="card">
                                            <div class="card-header" >
                                                <h5 class="mb-0">
                                                <span><?php echo ($sdate); ?> ---- to ---- <?php echo ($edate); ?></span>  

                                             <b style="margin-left: 20%"><?php
                                             if ($days=='0') {
                                                 echo $hours." Hours";
                                              }else{
                                                echo $days." Days";
                                              }?> </b>

                                               
                                            </h5>
                                            </div>

                                            <div>
                                                <div class="card-body">

                                    <!-- Single Car Start -->
                                    <div class="single-car-wrap">
                                        <div class="row">
                                            <!-- Single Car Thumbnail -->
                                            <div class="col-lg-4">
                                                <div class="car-list-thumb-s">
<a href="car-details?car_id=<?php echo ($row['car_id']);?> ">  <img src="../pimages/car/<?php echo($row['car_img']);?>" class="rounded mx-auto d-block" alt="Image" /></a>
                                                </div>
                                            </div>
                                            <!-- Single Car Thumbnail -->

                                                            <!-- Single Car Info -->
                                        <div class="col-lg-8">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <div class="car-list-info text-center">
                                                    <h2>
                                                
                                            <?php echo ($row['car_name']); ?> --: <?php echo ($row['car_number']); ?> 

                                                        
                                                    </h2>
                                                   


                                            <ul class="car-info-list">
                                                <li> Destination :<b> <?php echo ($row['location']); ?></b></li>
                                            </ul>
                                            <ul class="car-info-list">
                                                <li>Purpose :<b> <?php echo ($row['purpose']); ?></b>
                                                  
                                                </li>
                                            </ul>
                                            <ul class="car-info-list">
                                                <li><b><?php echo ($sdate2); ?></b> --To-- <b> <?php echo ($edate2); ?></b>
                                                  
                                                </li>
                                            </ul>

                                          
<div class="row justify-content-center">
                <?php 
            $booking_status=$row['boking_status'];
            $booked_Date = date($endDate);

                if ($booked_Date > $currentTime && $booking_status==1) {?>

<form method="post" action="cancle-booking?booking_id=<?php echo ($row['booking_id']); ?>" onsubmit="return confirm('Are you want to Cancel Booking ???');">
    
    <input type="submit" class="rent-btn" name="cancel_booking"  value="Cancel Booking">
</form>



<!-- Modify Booking End Time -->
 <a href="javascript:void(0);" onClick="popUpWindow('booking-modify.php?booking_id=<?php echo ($row['booking_id']);?>');" title="Modify Info."><button class="rent-btn"> Modify Booking</button></a>
               <?php
                }
                elseif($booking_status==0){
//echo "Canceled";
?> <span class="rent-btn-dan">Booking Canceled</span> <?php

                   }
                else{
?> <span class="rent-btn-dan">Date Expired</span> <?php
                }

if ($row['booking_cost'] !=='' && $row['driver_rating'] !=='' && $row['start_mileage'] !=='' && $end_mileage=$row['end_mileage'] !=='' && $row['comit_st'] =='' ) 
{
    
?> <span class="rent-btn-dan"> Commended </span> <?php
}

$startDateTime= $row['start_date'];   
$Onlydate= DateTime::createFromFormat("Y-m-d H:i:s",$startDateTime )->format("Y-m-d");

if($comit_st=='' && $row['boking_status']=='1' && $Onlydate == $currentDate)
{

    $car_id=$row['car_id'];
     $query2=mysqli_query($con,"SELECT `driver_id` FROM `car_driver` WHERE `car_id`='$car_id' ");
    $row2=$query2->fetch_assoc();
                        
?><a href="user-comment?booking_id=<?php echo ($row['booking_id']); ?> &driver_id=<?php echo ($row2['driver_id']); ?>" ><button class="rent-btn"> Comment</button> </a> 
<?php }?>

  </div>                   
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Single Car info -->

                                                        </div>
                                                    </div>
                                                    <!-- Single Car End -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single FAQ End -->
                                    </div>
                                </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== FAQ Area End ==-->





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
    <?php require('common/alljs.php'); ?>
    

    <script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 780 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
    </script>

   

</body>

</html>

<?php } ?>