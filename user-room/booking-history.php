<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () ); // h=12 hours H=24 hours
if(strlen($_SESSION['room_login_id'])==0)
  { 
header('location:index');
}
else{   
 include('../db/config.php');

$user_login= $_SESSION['room_login_id'];
$user_id= $_SESSION['user_id'];


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

                       <h2>My Booking History</h2>
                        <span class="title-line"><i class="fa fa-home"></i></span>
                        
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

              <thead style="background-color: #11f7d4;">
                <tr>
                    <th>Img</th>
                   <th>Room</th>                  
                  <th>Booking Starts</th>
                  <th>Booking Ends</th>
                  <th>Purpose</th>
                  <th>Time</th>
                  <th>Status</th>
 
                </tr>
              </thead>   
              <tbody>
                <?php 
    $query=mysqli_query($con,"SELECT room_booking.booking_start, room_booking.booking_end, room_booking.purpose, room_booking.hours, room_booking.booking_st, room.room_name, room.room_img1 FROM room_booking INNER JOIN room ON room_booking.room_id=room.room_id WHERE room_booking.user_id='$user_id' ORDER BY room_booking.r_booking_id DESC ");

    while($row=mysqli_fetch_array($query))
    {

?>
  <tr>
       
                <td> <img src="../pimages/room/<?php echo $row['room_img1'] ?>" height="80px;" width="80px;" ></td>
                
                <td class="center"><?php echo ($row['room_name']); ?></td>
                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row['booking_start'])); ?></td>

                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row['booking_end'])); ?></td>

                <td class="center"><?php echo ($row['purpose']); ?></td>

                <td class="center">
                    <?php 
                $time=$row['hours'];

                if ($time>24) {
                     $day=$time/24;
                     echo (round($day))." Days";
                 }
                 else{
                    echo $time." Hours";
                 } 

                ?>
                    
                </td>
                
                 <td class="center">
                  <?php
                $st= $row['booking_st']; 
                  if($st=='1')
                    {echo "Booked";}
                  else{
                    echo "Canceled";
                  }?>
                   
                 </td>
                


              </tr>

                <?php } ?>
            
              </tbody>

               
        
    </table>

        
            </div>
    
    <!--== About Page Content End ==-->

   
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

<!--********* Data Table js Link *********-->
<script type="text/javascript" src="assets/dataTable/libry.js"></script>
<script type="text/javascript" src="assets/dataTable/tbl.js"></script>
<script type="text/javascript" src="assets/dataTable/boots.js"></script>
 
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

  
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