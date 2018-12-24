<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['user_all'])==0)
  { 
header('location:../../index');
}
else{  
include('../../db/config.php');

$user_id=$_SESSION['user_id'];
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
                        <h2>My Booked Rooms</h2>
                        <span class="title-line"><i class="fa fa-home"></i></span>
                       <!--  <p>C.P. Bangladesh Car List.. </p> -->
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

   //********* Two Table join *******//                         
$query=mysqli_query($con,"SELECT room_booking.r_booking_id, room_booking.booking_start, room_booking.booking_end, room_booking.purpose, room_booking.hours, room_booking.booking_st, room.room_id, room.room_name, room.room_img1, room.room_capicity FROM room_booking INNER JOIN room ON room_booking.room_id=room.room_id WHERE room_booking.user_id='$user_id' AND room_booking.booking_start >='$currentDate' ORDER BY room_booking.booking_start ASC ");
        while($row=mysqli_fetch_array($query))
            {   ?>

                                <div class="single-faq-sub-content ">
                                    <div id="accordion">
                                        <!-- Single FAQ Start -->
                                        <div class="card">
                                            <div class="card-header" >
                                                <h5 class="mb-0">
                            <span><?php echo date("F j, Y, g:i a", strtotime($row['booking_start'])); ?>.</span>  

                                             <b style="margin-left: 20%"><?php
                                            
                                                 echo $row['hours'] ." Hours";
                                              ?> </b>

                                               
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
<a href="room-details?room_id=<?php echo $row['room_id'];?>"><img src="../../pimages/room/<?php echo($row['room_img1']);?>" class="rounded mx-auto d-block" alt="Image" /></a>
                                                                </div>
                                                            </div>
                                                            <!-- Single Car Thumbnail -->

                                                            <!-- Single Car Info -->
                                        <div class="col-lg-8">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <div class="car-list-info text-center">
                                                    <h2>
                                                
                                            <?php echo $row['room_name']; ?> 

                                                    </h2>
                                                   
                                            <ul class="car-info-list">
                                                <li>Purpose :<b> <?php echo $row['purpose']; ?></b>
                                                  
                                                </li>
                                            </ul>
                                            <ul class="car-info-list">
                                                <li>Capacity :<b> <?php echo $row['room_capicity']; ?></b>
                                                  
                                                </li>
                                            </ul>
                                            

                <?php 
            $booking_status=$row['booking_st'];
            $booking_end=$row['booking_end'];
            $booked_Date = date($booking_end);

                if ($booked_Date > $currentTime && $booking_status==1) {?>                   
                    <a href="cancle-booking?r_booking_id=<?php echo $row['r_booking_id'];?>" class="rent-btn">Cancel Booking</a>
               <?php
                }
                elseif($booking_status==0){
//echo "Canceled";
?> <button type="button" class="btn btn-danger">Booking Canceled</button> <?php

                   }
                else{
?> <button type="button" class="btn btn-danger">Date Expired</button> <?php
                } ?>



                     
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