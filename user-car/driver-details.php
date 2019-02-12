<?php
session_start();
error_reporting(0);
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
    <!--==****************** Header Area End ******************************==-->
<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Driver Dedails info.</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                       <!--  <p>C.P. Bangladesh Car List.. </p> -->
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

<?php 
$driver_id=$_GET['driver_id'];
$query=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`= $driver_id ");
$value = $query->fetch_assoc();

?>
 <!--== About Page Content Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            

            <div class="row">
                <!-- About Content Start -->
                <div class="col-lg-8 col-md-12">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content " >
                            	<ul class="package-list">
                            	<li> <h3>Name : <?php echo $value['driver_name']; ?></h3> </li>
                            	<li> Contract Number : <?php echo $value['driver_phone']; ?> </li>
                            	<li> License Number : <?php echo $value['driver_license']; ?> </li>
                            	<li> Contract NID : <?php echo $value['driver_nid']; ?> </li>
                                <li> Leave Status : 


                                    <?php 
                                    if ($value['leave_start']=='') {
                                       echo "No Data Available";
                                    }
                                    else{

                                        echo date("F j, Y", strtotime($value['leave_start'])) ." -- To -- ".date("F j, Y", strtotime($value['leave_end']));
                                    }

                                    ?> 


                            </li>
                        <li> Police Requisition : 
                            <?php 
                         
$police_req=mysqli_query($con,"SELECT * FROM `police_req` WHERE `driver_id`='$driver_id' AND `req_st` ='1' AND `req_end` >= '$currentTime' ORDER BY `req_id` DESC LIMIT 1 ");
$police_num=mysqli_num_rows($police_req);
$police_row=$police_req ->fetch_assoc();


                                    if ($police_num == 0) {
                                       echo "No Data Available";
                                    }
                                    else{

                    echo date("F j, Y, g:i a", strtotime($police_row['req_start'])) ." -- To -- ".date("F j, Y, g:i a", strtotime($police_row['req_end']));
                                    }

                                    ?> 


                            </li>
                            	<li> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content End -->

                <!-- About Video Start -->
                <div class="col-lg-4 col-md-12" >
                    <div class="about-image text-center">
                        
                      <img src="../pimages/driver/<?php echo($value['driver_img']);?>" class="img-responsive img-thumbnail rounded" alt="Image" style=" border: 4px solid #ffd000;" />
                    </div>
                </div>
                <!-- About Video End -->
            </div>

            <!-- About Fretutes Start -->
            <div class="about-feature-area">
                <div class="row">
                    <!-- Single Fretutes Start -->
                    <div class="col-lg-12">
                        <div class="about-feature-item active">
                            <i class="fa fa-car"></i>
                            
                        </div>
                    </div>
                    <!-- Single Fretutes End -->

                </div>
            </div>
            <!-- About Fretutes End -->
        </div>
    </section>
    <!--== About Page Content End ==-->

    <!--== Footer Area Start ==-->
    <section id="footer-area">           
        <?php require('common/footer.php'); ?>     
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <?php require('common/alljs.php'); ?>
    

</body>

</html>

<?php } ?>