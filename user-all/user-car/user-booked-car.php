<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );//H, Time in 24 hours show , h, for 12 hours 
$currentDate=date('Y-m-d');

if(strlen($_SESSION['user_all'])==0)
  { 
header('location:../../index');
}
else{ 

 include('../../db/config.php');

                 
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
                        <?php echo htmlentities($_SESSION['user_all']) ?>'s Booked car</h2>
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
                                                <span><?php echo htmlentities($sdate); ?> ---- to ---- <?php echo htmlentities($edate); ?></span>  

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
<a href="car-details?car_id=<?php echo htmlentities($row['car_id']);?> ">  <img src="../../pimages/car/<?php echo($row['car_img']);?>" class="rounded mx-auto d-block" alt="Image" /></a>
                                                                </div>
                                                            </div>
                                                            <!-- Single Car Thumbnail -->

                                                            <!-- Single Car Info -->
                                        <div class="col-lg-8">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <div class="car-list-info text-center">
                                                    <h2>
                                                
                                            <?php echo htmlentities($row['car_name']); ?> --: <?php echo htmlentities($row['car_number']); ?> 

                                                        
                                                    </h2>
                                                   


                                            <ul class="car-info-list">
                                                <li> Destination :<b> <?php echo htmlentities($row['location']); ?></b></li>
                                            </ul>
                                            <ul class="car-info-list">
                                                <li>Purpose :<b> <?php echo htmlentities($row['purpose']); ?></b>
                                                  
                                                </li>
                                            </ul>
                                            <ul class="car-info-list">
                                                <li><b><?php echo htmlentities($sdate2); ?></b> --To-- <b> <?php echo htmlentities($edate2); ?></b>
                                                  
                                                </li>
                                            </ul>

                <?php 
            $booking_status=$row['boking_status'];
            $booked_Date = date($endDate);

                if ($booked_Date > $currentTime && $booking_status==1) {?>                   
                    <a href="cancle-booking?booking_id=<?php echo htmlentities($row['booking_id']); ?>" class="rent-btn">Cancel Booking</a>
               <?php
                }
                elseif($booking_status==0){
//echo "Canceled";
?> <button type="button" class="btn btn-danger">Booking Canceled</button> <?php

                   }
                else{
?> <button type="button" class="btn btn-danger">Date Expired</button> <?php
                }

if ($row['booking_cost'] !=='' && $row['driver_rating'] !=='' && $row['start_mileage'] !=='' && $end_mileage=$row['end_mileage'] !=='' && $row['comit_st'] =='' ) {
    
?> <button type="button" class="btn btn-info"> Commended </button> 
<?php
}

$startDateTime= $row['start_date'];   
$Onlydate= DateTime::createFromFormat("Y-m-d H:i:s",$startDateTime )->format("Y-m-d");

if($comit_st=='' && $row['boking_status']=='1' && $Onlydate == $currentDate)
{

    $car_id=$row['car_id'];
     $query2=mysqli_query($con,"SELECT `driver_id` FROM `car_driver` WHERE `car_id`='$car_id' ");
    $row2=$query2->fetch_assoc();
                        
?><a href="user-comment?booking_id=<?php echo htmlentities($row['booking_id']); ?> &driver_id=<?php echo htmlentities($row2['driver_id']); ?>" class="rent-btn">Comment</a> 
<?php }?>

                     
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
    

</body>

</html>

<?php } ?>