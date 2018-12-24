<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );


$user_id=$_SESSION['car_logIn_id'];
$start_book=$_SESSION['start_book'];
$end_book=$_SESSION['end_book'];
$location=$_SESSION['location'];

include('../db/config.php');
include('line/lineMsg.php');

if (isset($_POST['cancel'])) {
	$sql2=mysqli_query($con,"UPDATE `car_booking` SET `boking_status`='0' WHERE `user_name`='$user_id' ORDER BY `booking_id` DESC LIMIT 1");


  //**************Three table joining*****************//
$sql=mysqli_query($con,"SELECT car_booking.car_number, car_booking.start_date, car_booking.end_date, car_booking.location, car_booking.purpose, car_driver.driver_name, user.user_name, user.user_department FROM car_booking INNER JOIN car_driver ON car_booking.car_id=car_driver.car_id INNER JOIN user ON car_booking.user_id=user.user_id WHERE car_booking.user_name='$user_id' ORDER BY car_booking.booking_id DESC LIMIT 1 ");

while ($row3=mysqli_fetch_array($sql)) {
  // $start_book3= date("M j, g:i a", strtotime($row3['start_date']));
  // $end_book3= date("M j, g:i a", strtotime($row3['end_date']));
  $start_book3= $row3['start_date'];
  $end_book3= $row3['end_date'];
  $U_realName= $row3['user_name'];
  $dept=$row3['user_department']; 
  $location3= $row3['location'];
  $purpose3= $row3['purpose'];
  $dariver_name=$row3['driver_name'];
  $car_number3=$row3['car_number'];

 $u_dept=str_replace('&', 'and', $dept);
  $purposeLine = str_replace('&', 'and', $purpose3);
    $locationLine = str_replace('&', 'and', $location3);

//*************For Sending Line Group Message*******************//
        $message="Canceled Status %0A Canceled By: $U_realName,%0A Department: $u_dept,%0A Destination: $locationLine,%0A Purpose: $purposeLine,%0A Driver: $dariver_name,%0A Car: $car_number3,%0A Start: $start_book3,%0A End: $end_book3.";
          lineMsg($message);
  }





      				?>

<script>
    alert('Your Booking canceled successfully..!!');
    window.open('car-list-reg','_self');
    </script>

      <?php 

}?>

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
                        $start_date= date("Y-m-d", strtotime($start_book));
                        $end_date= date("Y-m-d", strtotime($end_book));
                        if ($start_date==$end_date ) {

                            echo date("M j, Y", strtotime($start_date));
                        }
                        else{ 
                         echo date("M j, Y", strtotime($start_date)).  " -- " . date("M j, Y", strtotime($end_date));
                        }?>
                      . Same Booking History</h2>

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

        	 <div>
            <table class="table table-hover">

              <thead style="background-color: #ffd000;">
                  <th>Car</th>                  
                  <th>Booking Starts</th>
                  <th>Booking Ends</th>
                  <th>Destination</th>
                  <th>Purpose</th>
                  <th>Days</th>
                  <th>Action</th>
                
              </thead>
 <?php 
    
$query2=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_name`='$user_id' ORDER BY `booking_id` DESC LIMIT 1 ");
    while($row2=mysqli_fetch_array($query2))
    {

?>
              <tbody>
              	<tr>
              	<td> <?php echo htmlentities($row2['car_name']. '- '.$row2['car_number'] ) ; ?></td>

  				<td class="center"><?php echo date("F j, Y, g:i a", strtotime($row2['start_date'])); ?></td>

                <td class="center"><?php echo date("F j, Y, g:i a", strtotime($row2['end_date'])); ?></td>

                 <td class="center"><?php echo htmlentities($row2['location']); ?></td>

                 <td class="center"><?php echo htmlentities($row2['purpose']); ?></td>

                 <td class="center"><?php echo htmlentities($row2['day_count']); ?></td>
                 <td>
                 	<form method="post" >	
                 		<button type="submit" name="cancel" class="btn btn-danger" >Booking Cancel</button>
                 	</form>
                 	

                 </td>
                

             </tr>

                <?php } ?>
            
              </tbody>

            </table>



          </div>
           
              
          <table id="example" class="table table-striped table-bordered table-dark table-hover">

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
    
//$query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `boking_status`='1' AND `start_date`='$start_book' AND `end_date`='$end_book' AND `location`='$location' ");
$query=mysqli_query($con,"SELECT * FROM `car_booking` LEFT JOIN `user` ON car_booking.user_id= user.user_id WHERE car_booking.boking_status='1' AND car_booking.start_date='$start_book' AND car_booking.end_date='$end_book' AND car_booking.location='$location' AND car_booking.user_name !='$user_id' ");


// $_SESSION['start_book']='';
// $_SESSION['end_book']='';
// $_SESSION['location']='';

    while($row=mysqli_fetch_array($query))
    {

?>
  			<tr>

  				
  				<td><?php echo htmlentities($row['user_name']); ?> </td>
  				<td><a  href="tel:+88<?php echo htmlentities($row['user_contract']) ; ?>">
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