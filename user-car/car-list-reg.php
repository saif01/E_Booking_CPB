<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date('Y-m-d H:i:s', time () ); 
$currentdate = date('Y-m-d');

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
    <!--== Header Area End ==-->
     <!--==************************* Header Area End ****************************************************************************************************************************==-->

 <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Regular Car's..</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">

                <?php
                    //$query=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `temp_car`='0'");
                $query=mysqli_query($con,"SELECT * FROM `tbl_car` LEFT JOIN `car_driver` ON tbl_car.car_id=car_driver.car_id WHERE tbl_car.temp_car='0' AND tbl_car.show_status='1'");
                
                    while($row=mysqli_fetch_array($query))
                    {  ?>

                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="article-thumb">
                                    <a href="car-details.php?car_id=<?php echo ($row['car_id']);?> ">  <img src="../pimages/car/<?php echo($row['car_img1']);?>" class="img-responsive" alt="Image" /></a>
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->

                            <!-- Articles Content Start -->
                            <div class="col-lg-5">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                          
                                            <div class="article-date">

            <?php
     $driver_id=$row['driver_id'];
     $car_id=$row['car_id'];
//********* Booking status checkinig by Current Date *****************//
$query3=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id' AND `boking_status`='1' AND '$currentTime' BETWEEN `start_date` AND `end_date`");

//********* Driver Leave status checkinig by Current Date *****************//
$drivLev=mysqli_query($con,"SELECT * FROM `driver_leave` WHERE `leave_status`='1' AND `driver_id`='$driver_id' AND '$currentTime' BETWEEN `driver_leave_start` AND `driver_leave_end`");

//********* Police Requisition status checkinig by CurrentDate*************//
$polic_req=mysqli_query($con,"SELECT * FROM `police_req` WHERE `car_id`='$car_id' AND `req_st`='1' AND '$currentTime' BETWEEN `req_start` AND `req_end`");

//********* Car Maintence status checkinig by CurrentDate*************//
$maintenceSQL=mysqli_query($con,"SELECT * FROM `car_maintenance` WHERE `car_id`='$car_id' AND `ment_st`='1'  AND '$currentTime' BETWEEN `ment_stat` AND `ment_end`");

     //$row3=$query3->fetch_assoc();
     $row3=mysqli_num_rows($query3);
     $row4=mysqli_num_rows($drivLev);
     $p_row=mysqli_num_rows($polic_req);
     $maintence_car=mysqli_num_rows($maintenceSQL);

    if ($row3>0) {
        echo '<p style="color: red;"> Booked</p>';
    }
    elseif ($row4>0) { 
        echo '<p style="color: red;">Busy</p>'; 
    }
    elseif ($p_row>0) {
         echo '<p style="color: red;">Busy</p>';
    }
    elseif ($maintence_car>0) {
        echo '<p style="color: red;">Busy</p>';
    }
    else{
        echo "Free";
    }
         ?>   

                </div>

                <div class="text-center">

                <table class="table ">
<?php
//Driver Leave Date Show....Sql
$driver_id=$row['driver_id'];
$driverLevsql=mysqli_query($con,"SELECT * FROM `driver_leave` WHERE `leave_status`='1' AND `driver_id`='$driver_id' AND `driver_leave_end` >= '$currentTime' ORDER BY `driver_leave_id` DESC LIMIT 1");
// car maintence Sql
$car_maintence=mysqli_query($con,"SELECT * FROM `car_maintenance` WHERE `driver_id`='$driver_id' AND `ment_st`='1' AND `ment_end` >= '$currentTime' ORDER BY `ment_id` DESC LIMIT 1");

$driver_lev=$driverLevsql->fetch_assoc();
$car_ment=$car_maintence->fetch_assoc();

// driver leave
if ( $driver_lev !='') { 
echo '<h5><span class="badge badge-warning"> Driver Leave : '.date("M j, Y", strtotime($driver_lev['driver_leave_start'])).' To '.date("M j, Y", strtotime($driver_lev['driver_leave_end'])).'</span></h5>' ;
}

// car maintence
if ( $car_ment !='') {
echo '<h5><span class="badge badge-info">Maintenance : '.date("M j, Y", strtotime($car_ment['ment_stat'])).' To '.date("M j, Y", strtotime($car_ment['ment_end'])).'</span></h5>' ;
}

 ?>

                 

                    <tr>
                        <th>Name :</th>
                        <td> <?php echo $row['car_name']; ?></td>
                    </tr>
                    
                    <tr>
                        <th>Car Number :</th>
                        <td><?php echo $row['car_namePlate'];?></td>
                    </tr>
                    <tr>
                        <th>Capacity :</th>
                        <td><?php echo $row['car_capacity'];?></td>
                    
                    </tr>
                   
                   
                </table>

<a href="booking-car-reg?car_id=<?php echo ($row['car_id']);?>" class="readmore-btn">Book  <i class="far fa-arrow-alt-circle-right"></i></a>

                    
                </div>

                    
                </div>
            </div>
        </div>
    </div>
    <!-- Articles Content End -->

<!--  Driver Section Start -->
<div class="col-lg-2">

<?php    
$st= $row['driver_status'];


 $driver_id=$row['driver_id'];
 $sql4=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' AND '$currentdate' BETWEEN date(`leave_start`) AND date(`leave_end`)");

 $rowNum=mysqli_num_rows($sql4);

// Show for Personal Leave
    if($rowNum >0) { ?>
<div class="article-thumb-s" >                                              
    <a href="driver-details.php?driver_id=<?php echo ($row['driver_id']);?>" > <img src="../pimages/driver/<?php echo ($row['driver_img']);?>" class="img-responsive mx-auto d-block"  alt="Image" /> </a>       
    <p><?php echo ($row['driver_name']) ; ?> </p> 
    <p style="background-color: red;  color: white; ">On Leave</p>                                                                    
</div>


 <?php } 

  //Show for Police Requisiton
 elseif($p_row >0) { ?>

        <div class="article-thumb-s" >
                                              
            <a href="driver-details.php?driver_id=<?php echo ($row['driver_id']);?>" > <img src="../pimages/driver/<?php echo($row['driver_img']);?>" class="img-responsive mx-auto d-block"  alt="Image" /> </a>
        
            <p><?php echo ($row['driver_name']) ; ?> </p> 
            <p style="background-color: red;  color: white; ">Police REQ.</p>                                                                    
        </div>

 <?php }

 //Show for emergency Leave 
  elseif ($st==0) { ?>

        <div class="article-thumb-s"> 
            <a> <img src="../pimages/driver/def/absence.jpg" class="img-responsive mx-auto d-block" alt="Image" /> </a>

            <p ><?php echo ($row['driver_name']) ; ?> </p> 
            <p style="background-color: red; color: white; "> Emergency Leave </p>       
        </div>

 <?php } 

//Show for Car Maintance
elseif ($maintence_car > 0) { ?>

    <div class="article-thumb-s"> 
        <a href="driver-details.php?driver_id=<?php echo ($row['driver_id']);?>" > <img src="../pimages/driver/def/absence.jpg" class="img-responsive mx-auto d-block" alt="Image" /> </a>

        <p ><?php echo htmlentities($row['driver_name']) ; ?> </p> 
        <p style="background-color: red; color: white; ">Maintenance </p>       
    </div>

<?php } 


else{ ?>

        <div class="article-thumb-s" >
                                              
            <a href="driver-details.php?driver_id=<?php echo ($row['driver_id']);?>" > <img src="../pimages/driver/<?php echo($row['driver_img']);?>" class="img-responsive mx-auto d-block"  alt="Image" /> </a>
        
            <p><?php echo ($row['driver_name']) ; ?> </p> 
<p><i class="fas fa-mobile-alt"></i> <a  href="tel:+88<?php echo ($row['driver_phone']) ; ?>"> <?php echo ($row['driver_phone']) ; ?> </a> 
            </p>                                
          
        </div> 


                <?php } ?>

                            </div>
            <!--  Driver Section End -->


                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->
<?php } ?>           
            
            </div>
       
        </div>
    </div>
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