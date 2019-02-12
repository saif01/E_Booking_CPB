<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d h:i:s', time () );
if(strlen($_SESSION['admin-redirect'])==0)
  { 
header('location:../index');
}
else{  

require('../../db/config.php');

$admin_id=$_SESSION['admin_id'];

$adminSql=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_id`='$admin_id'");
$row=$adminSql->fetch_assoc();

$admin_car_st= $row['admin_car_st'];
$admin_room_st= $row['admin_room_st'];
$admin_law_st= $row['admin_law_st'];
$admin_hard_st= $row['admin_hard_st'];
$admin_app_st= $row['admin_app_st'];
$admin_super_st= $row['admin_super_st']; 
  ?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CPB-IT ADMIN</title>
       <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon" /> 

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- vagas CSS Link -->
    <link rel="stylesheet" type="text/css" href="vegas/style.css">

        <!--*************** Font Awesome v.5.7.0 ****************-->
    <link href="../../assets/fontawesom/css/all.css" rel="stylesheet">

    <!-- Pre Loader JS -->
    <script type="text/javascript">
      window.addEventListener("load", function () {
        const loader = document.querySelector(".loader");
        loader.className += " hidden"; // class "loader hidden"
    });
    </script>


  </head>

  <body class="vegas-slider">
    <!-- pre loader start -->
    <div class="loader">
        <img src="img/preloader.gif" alt="Loading..." />
    </div>
    <!-- preloder end -->

<div class="navbar_grad">
  <!-- Image and text -->
   
        <nav class="navbar navbar-expand-lg navbar-light resize mx-auto justify-content-center" >
          

          <a class="navbar-brand" href="#">
            <img src="../../assets/img/logo.png" width="50" height="50" style=" border-radius:20%;
            border: 2px solid #ffd000; " alt="" >
            <span style="color: white;">CPB-IT Portal Admin Section</span>                
          </a>

        </nav>
</div>


<div class="container">
  <div class="row justify-content-center">

<?php 
//Car Pool Admin Section
if ($admin_car_st=='1') {
  $_SESSION['admin-car-login']=$row['admin_login'];
?>
    <!-- Project Car Pool -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../../admin-car">
        <i class="fas fa-car text-primary" style="font-size:700%;"></i>       
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">Carpool</span>
      </a>   
    </div>

<?php } 
//Room Booking Admin Section
if ($admin_room_st=='1') {
  $_SESSION['admin-room-login']=$row['admin_login'];
?>

    <!--Room Booking Project  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../../admin-room">
        <i class="fas fa-home text-success" style="font-size:700%;" ></i>
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">Room Booking </span>
      </a>   
    </div>

<?php } 
//LEgal Admin Section
if ($admin_law_st=='1') {
  $_SESSION['admin-law-login']=$row['admin_login'];
?>

    <!--Legal Project  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../../admin-law">
        <i class="fas fa-balance-scale text-warning" style="font-size:700%;" ></i>
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">Legal</span>
      </a>   
    </div>
<?php } 

// CMS Hardware Section
if ($admin_hard_st=='1') {
  $_SESSION['admin_hard_login']=$row['admin_login'];
?>

    <!--Complaint Management  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../../admin-hard">
        <i class="fas fa-tools" style="font-size:700%; color: #A0522D "></i>
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">CMS Hardware</span>
      </a>   
    </div>
    
<?php }

// CMS Application Section
if ($admin_app_st=='1') {
  $_SESSION['admin_app_login']=$row['admin_login'];
?>

    <!--Complaint Management  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../../admin-app">
        
        <i class="fas fa-laptop-medical" style="font-size:700%; color: #410093 "></i>
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">CMS Application</span>
      </a>   
    </div>
    
<?php }  
 
//Super Admin Section
if ($admin_super_st=='1') {
  $_SESSION['admin-super-login']=$row['admin_login'];
?>


    <!--Complaint Management  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../../superadmin">      
        
        <i class="fas fa-user-secret" style="font-size:700%; color: #FF69B4 "></i>
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">Super Admin</span>
      </a>   
    </div>
    
<?php } 

//No Access
if($admin_car_st=='0' && $admin_law_st=='0' && $admin_room_st=='0' && $admin_hard_st=='0' && $admin_app_st=='0' && $admin_super_st=='0')
{
?>
     
<p class="text-danger text-center h1" >Sorry !!!! You Have <b>No Access</b></p>
    
<?php } ?> 

 <!--LogOut  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="logout">
        <i class="fas fa-power-off text-danger" style="font-size:700%;"></i>      
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">LogOut</span>
      </a>   
    </div>    

  </div>
  
</div>

<!-- Footer -->
<footer class="page-footer font-small footer_grad">
 <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 2018 Powered By CPB-IT</p>
  </div>
</footer>
<!-- Footer -->

<!-- Vagas Slider JS --> 
<script type="text/javascript" src="vegas/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="pluagins/vegus/vegas.js"></script>
<script type="text/javascript" src="vegas/custom.js"></script>

<!-- end  -->
  </body>

</html>

<?php } ?>