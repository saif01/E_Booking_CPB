<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{  
 include('../db/config.php');

$user_name= $_SESSION['car_logIn_id'];
$user_id= $_SESSION['user_id'];

$driver_id=$_GET['driver_id'];
$query=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id`='$user_id' ");
$value = $query->fetch_assoc();


?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Developer Signature -->
    <meta name="author" content="Md. Syful Islam">
    <meta name="author_Email" content="syful.cse.bd@gmail.com">
   <?php require('common/icon.php'); ?> 
   
    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?> 

<!--*********** Simple Data table CDN ***********************-->
<link rel="stylesheet" type="text/css" href="assets/dataTable/data_table.css">
    
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
        <div class="container" >
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">

                       <h2> 
                        <?php echo htmlentities($_SESSION['car_logIn_id']) ?>'s Booking History</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
 <!--== About Page Content Start ==-->
   
        <div class="container" style="margin-top: 20px;">
           
              
          <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">

              <thead style="background-color: #ffd000;">
                <tr>
                   <th>Car</th>                  
                  <th>Booking Starts</th>
                  <th>Booking Ends</th>
                  <th>Destination</th>
                  <th>Purpose</th>
                  <th>Days</th>
                  <th>Status</th>
                  <th>Cost</th>
                  <th>Milage</th>
                  <th>Driver</th>
                  
                  
                </tr>
              </thead>   
              <tbody>
                <?php 
    $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_id`='$user_id' ORDER BY`booking_id` DESC");

    while($row=mysqli_fetch_array($query))
    {

?>
  <tr>

                

                <td class="center" ><?php echo htmlentities($row['car_name']. '- '.$row['car_number'] ) ; ?></td>
                

                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row['start_date'])); ?></td>

                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row['end_date'])); ?></td>


                <td class="center"><?php echo htmlentities($row['location']); ?></td>
                <td class="center"><?php echo htmlentities($row['purpose']); ?></td>
                <td class="center"><?php echo htmlentities($row['day_count']); ?></td>
                 <td class="center">
                  <?php
                $st= $row['boking_status']; 
                  if($st=='1')
                    {echo "Booked";}
                  else{
                    echo "Canceled";
                  }?>
                   
                 </td>
                <td class="center"><?php echo htmlentities($row['booking_cost']); ?></td>
                <td> <?php echo htmlentities($row['start_mileage']. '- '.$row['end_mileage'] ) ; ?>  </td>


                <td class="center">
                  <?php
                  $driver_id=$row['driver_id'];
                  $sql=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' ");
                  $row2=$sql->fetch_assoc();
  

                 echo htmlentities($row2['driver_name']); ?> 

                </td>


              </tr>

                <?php } ?>
            
              </tbody>

               
        
    </table>

        
            </div>
    
    <!--== About Page Content End ==-->

   <!--=======================Javascript============================-->

<!--********* Data Table js Link *********-->
<script type="text/javascript" src="assets/dataTable/libry.js"></script>
<script type="text/javascript" src="assets/dataTable/tbl.js"></script>
<script type="text/javascript" src="assets/dataTable/boots.js"></script>
 
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
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

    <!--=== Jquery Min Js ===-->
  
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>   
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>    
    <!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>


</body>

</html>
 <?php } ?>