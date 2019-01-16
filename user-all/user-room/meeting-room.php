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
 require('../../db/config.php');
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

    <style type="text/css">
        .booking_st{
            background-color: #11f7d4;
            border-radius: 8px;
            color: #fff;
            font-weight: 700;
            height: 35px;
            margin-top: -17px;
            padding: 5px;
            position: absolute;
            text-align: center;
            width: 100px;
            margin-left: 38%;
        }
    </style>

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Meeting Rooms</h2>
                        <span class="title-line"><i class="fa fa-home"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">

                            <?php
                 $room_type="Meeting";          
                $allrooms=mysqli_query($con,"SELECT * FROM `room` WHERE `room_type`='$room_type' AND `show_st`='1' ORDER BY `room_name` ASC");
                while ($row=mysqli_fetch_array($allrooms)) { 

               // print_r($row) ;

                ?>


                            

                             <!-- Single Car Start -->
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="car-list-thumb">
                                        <a href="room-details?room_id=<?php echo $row['room_id'];?>">
                                         <img src="../../pimages/room/<?php echo $row['room_img1'];?>" class="img-responsive" style="height: 300px; width: 100%;" alt="Image"></a> 
                                    </div>

                                <div class="booking_st">
                                    <?php
                //****** Booked info Check **********//
                         $currTime = date('Y-m-d H:i:s');
                         $room_id=$row['room_id'];
    $bookedCh=mysqli_query($con,"SELECT * FROM `room_booking` WHERE `booking_st`='1' AND `room_id`='$room_id' AND '$currTime' BETWEEN `booking_start` AND `booking_end`");

    $booked=mysqli_num_rows($bookedCh);

                        if ($booked>0) {
                                
                                ?> <p style="color: red;"> Booked</p> <?php
                            }
                            else{
                                  ?> <p style="color:#141212;">Free</p> <?php
                            } ?>
                                    
                                </div>
                                    <div class="car-list-info without-bar text-center">
                                        <h2><a href="#"><?php echo $row['room_name']; ?></a></h2>
                                        
                                      
                                        <ul class="car-info-list">
                                            <li>Room Capacity</li>
                                            <li> <b><?php echo $row['room_capicity'];?></b> Persons</li>
                                        </ul>
                                        
                                        <a href="booking-meeting?room_id=<?php echo $row['room_id']; ?>" class="rent-btn">Book It</a>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                           <!--  <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="car-list-thumb">
                                         <img src="assets/img/car/car-1.jpg" style="height: 300px; width: 100%;" >
                                    </div>
                                    <div class="booking_st">Booked</div>
                                    <div class="car-list-info without-bar text-center">
                                        <h2><a href="#">Aston Martin One-77</a></h2>   
                                        <p>Vivamus eget nibh. </p>     
                                        <a href="#" class="rent-btn">Book It</a>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Single Car End -->

                          

                         

                        </div>
                    </div>

                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

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