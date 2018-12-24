<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['user_all'])==0)
  { 
header('location:../../index');
}
else{  
 include('../../db/config.php');

$user_name= $_SESSION['user_all'];
$user_id= $_SESSION['user_id'];

$start_date=$_POST['startDate'];
$end_date=$_POST['endDate'];

$location=$_POST['location'];


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
                        <?php
                        if ($start_date==$end_date ) {

                            echo date("M j, Y", strtotime($start_date));
                        }
                        else{ 
                         echo date("M j, Y", strtotime($start_date)).  " -- " . date("M j, Y", strtotime($end_date));
                        }?>
                      . Booking History</h2>
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

                   <th>User</th>
                   <th>Contact</th>
                   <th>Car</th>                 
                  <th>Booking Starts</th>
                  <th>Booking Ends</th>
                  <th>Destination</th>
                  <th>Purpose</th>
                  <th>Days</th>
                  
                  
                </tr>
              </thead>   
              <tbody>
                <?php 
    $query=mysqli_query($con,"SELECT * FROM `car_booking` LEFT JOIN `user` ON car_booking.user_id= user.user_id WHERE car_booking.boking_status='1' AND car_booking.start_date LIKE '%$start_date%' AND car_booking.end_date LIKE '%$end_date%' AND car_booking.location='$location'");

    while($row=mysqli_fetch_array($query))
    {

?>
  <tr>            
                <td><?php echo htmlentities($row['user_name']); ?> </td>
                <td>
                    <a  href="tel:+88<?php echo htmlentities($row['user_contract']) ; ?>">
                        <?php echo htmlentities($row['user_contract']); ?> 
                    </a>
                </td>
                <td> <?php echo htmlentities($row['car_name']. '- '.$row['car_number'] ) ; ?></td>

                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row['start_date'])); ?></td>

                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row['end_date'])); ?></td>

                 <td class="center"><?php echo htmlentities($row['location']); ?></td>

                 <td class="center"><?php echo htmlentities($row['purpose']); ?></td>

                 <td class="center"><?php echo htmlentities($row['day_count']); ?></td>



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