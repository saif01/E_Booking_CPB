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

    <title>CPB.IT-ADMIN</title>
       <!--=== Favicon ===-->
    <link rel="shortcut icon" href="img/cpb.ico" type="image/x-icon" /> 

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/a.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <!-- vagas CSS Link -->
    <link rel="stylesheet" type="text/css" href="vegas/style.css">
    <!-- Text Animated CSS --> 
    <link href="../../assets/coustom/animate.css" rel="stylesheet">


  </head>

  <body class="vegas-slider">
    <!-- pre loader start -->
    <div id="loader"></div>
    <!-- preloder end -->

    <!-- nav section start -->
    <section id="nav" class="py-3 nav_coustom text-center fixed-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
             <img src="img/logo.png" class="r_user" >
          <h2   class="text-light d-inline animated infinite bounce delay-2s" style="font-family: Times New Roman"> C.P.B. IT-Portal Admin Section</h2>
          </div>
        </div>
      </div>
    </section>
<!-- end nav section -->
    <!-- Page Content -->
    <div class="container " id="content" style="font-family: Times New Roman; margin-top: 110px;">




<?php 
//Car Pool Admin Section
if ($admin_car_st=='1') {
  $_SESSION['admin-car-login']=$row['admin_login'];
?>

    <!--Car Pool Project -->
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel" ></li>
                    <li data-slide-to="2" data-target="#mycarousel" ></li>
                  </ol>
               
                  <div class="carousel-item active" style="background-color:#778899; height: 300px; width: 700px; ">
                      <h1 class="header_saif" style="font-size: 85px;">Car Management  Admin</h1>
                     
                  </div>
                  <div class="carousel-item ">
                     <img src="img/carpool/carpool (2).jpg"  height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                   <img src="img/carpool/carpool (1).jpg" height="300" width="700" class="rounded" >
                     
                  </div>
                  <a href="#mycarousel" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        
        <div class="col-md-4 text-center col-sm-6">
          <div class="card" style="margin-top: 10%;">
            <div class="card-body" style="background-color: #696969; color: #ffd000;" >

              <h3 class="animated infinite bounce slow delay-2s" >Car Pool Admin</h3><hr>
          <a href="../../admin-car">
         <button class="button1"><span>Car Pool</span> </button>
          </a>
            </div>
          </div>
        </div>
      
      </div>
      <!-- /.row -->
      <hr>
<?php } 
//LEgal Admin Section
if ($admin_law_st=='1') {
  $_SESSION['admin-law-login']=$row['admin_login'];
?>

      <!--Legal Project -->
            
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel3" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel3" ></li>
                    <li data-slide-to="2" data-target="#mycarousel3" ></li>
                  </ol>
               
                 <div class="carousel-item active" style="background-color:#778899; height: 300px; width: 700px; ">
                      <h1 class="header_saif" style="font-size: 85px;">Legal Management  Admin</h1>
                     
                  </div>
                  <div class="carousel-item">
                     <img src="img/legal/legal (1).jpg"  height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                   <img src="img/legal/legal (3).jpg" height="300" width="700" class="rounded">
                     
                  </div>
                  <a href="#mycarousel3" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel3" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        <div class="col-md-4 text-center col-sm-6">
          <div class="card" style="margin-top: 10%;">
            <div class="card-body" style="background-color: #191970; color:#912CEE;">
              <h3 class="animated infinite zoomIn slow delay-2s">Legal Admin</h3><hr>
         
          <a href="../../admin-law">
          <button class="button4"><span>Legal</span> </button>
          </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    <hr>

<?php } 
//Room Booking Admin Section
if ($admin_room_st=='1') {
  $_SESSION['admin-room-login']=$row['admin_login'];
?>

      <!--Room Booking Project -->
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel1" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel1" ></li>
                    <li data-slide-to="2" data-target="#mycarousel1" ></li>
                  </ol>
               
                  <div class="carousel-item active" style="background-color:#778899; height: 300px; width: 700px; ">
                      <h1 class="header_saif" style="font-size: 95px;">Room Booking Admin</h1>
                     
                  </div>
                  <div class="carousel-item">
                     <img src="img/room/room (2).jpg"  height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                   <img src="img/room/room (3).jpg" height="300" width="700" class="rounded">
                     
                  </div>
                  <a href="#mycarousel1" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel1" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        <div class="col-md-4 text-center col-sm-6">
          <div class="card" style="margin-top: 10%;">
            <div class="card-body" style="background-color: #696969; color:#11f7d4;">
              <h3 class="animated infinite rollIn slow delay-2s">Meeting Room Admin</h3><hr>
         
          <a href="../../admin-room">
          <button class="button2"><span>Room Booking </span> </button>
          </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    <hr>
<?php } 

// CMS Hardware Section
if ($admin_hard_st=='1') {
  $_SESSION['admin_hard_login']=$row['admin_login'];
?>

    <!--CMS Project -->
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel5" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel5" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel5" ></li>
                    <li data-slide-to="2" data-target="#mycarousel5" ></li>
                  </ol>
               
                  <div class="carousel-item active" style="background-color:#778899; height: 300px; width: 700px; ">
                      <h1 class="header_saif" style="font-size: 95px;">CMS Hardware Admin</h1>
                     
                  </div>
                     
                  <div class="carousel-item ">
                     <img src="img/super/superadmin (2).jpg"  height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                   <img src="img/super/superadmin (3).jpg" height="300" width="700" class="rounded" >
                     
                  </div>
                  <a href="#mycarousel5" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel5" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        
        <div class="col-md-4 text-center col-sm-6">
          <div class="card" style="margin-top: 10%;">
            <div class="card-body" style="background-color:#EEDFCC; color: #228B22;" >

              <h3 class="animated infinite rotateOutUpRight slow delay-2s">CMS Hardware</h3><hr>
          <a href="../../admin-hard">
         <button class="button2"><span>Hardware</span> </button>
          </a>
            </div>
          </div>
        </div>
      
      </div>
      <!-- /.row -->
      <hr>

<?php }

// CMS Application Section
if ($admin_app_st=='1') {
  $_SESSION['admin_app_login']=$row['admin_login'];
?>

    <!--Application Project -->
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel6" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel6" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel6" ></li>
                    <li data-slide-to="2" data-target="#mycarousel6" ></li>
                  </ol>
               
                  <div class="carousel-item active" style="background-color:#778899; height: 300px; width: 700px; ">
                      <h1 class="header_saif" style="font-size: 90px;">CMS Application Admin</h1>
                     
                  </div>
                  <div class="carousel-item ">
                     <img src="img/super/superadmin (2).jpg"  height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                   <img src="img/super/superadmin (3).jpg" height="300" width="700" class="rounded" >
                     
                  </div>
                  <a href="#mycarousel6" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel6" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        
        <div class="col-md-4 text-center col-sm-6">
          <div class="card" style="margin-top: 10%;">
            <div class="card-body" style="background-color:#EEDFCC; color: #228B22;" >

              <h3 class="animated infinite rotateOutUpLeft slow delay-2s">CMS Application</h3><hr>
          <a href="../../admin-app">
         <button class="button4"><span>Application</span> </button>
          </a>
            </div>
          </div>
        </div>
      
      </div>
      <!-- /.row -->
      <hr>

<?php }  
 
//Super Admin Section
if ($admin_super_st=='1') {
  $_SESSION['admin-super-login']=$row['admin_login'];
?>

    <!--Super Project -->
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel4" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel4" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel4" ></li>
                    <li data-slide-to="2" data-target="#mycarousel4" ></li>
                  </ol>
               
                  <div class="carousel-item active" style="background-color:#778899; height: 300px; width: 700px; ">
                      <h1 class="header_saif" style="font-size: 120px; ">Super <br> Admin</h1>
                     
                  </div>
                  <div class="carousel-item ">
                     <img src="img/super/superadmin (2).jpg"  height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                   <img src="img/super/superadmin (3).jpg" height="300" width="700" class="rounded" >
                     
                  </div>
                  <a href="#mycarousel4" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel4" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        
        <div class="col-md-4 text-center col-sm-6">
          <div class="card" style="margin-top: 10%;">
            <div class="card-body" style="background-color:#EEDFCC; color: #228B22;" >

              <h3 class="animated infinite zoomInDown slow delay-2s">Super Admin</h3><hr>
          <a href="../../superadmin">
         <button class="button3"><span>Super Admin</span> </button>
          </a>
            </div>
          </div>
        </div>
      
      </div>
      <!-- /.row -->
      <hr>
<?php }
//No Access
if($admin_car_st=='0' && $admin_law_st=='0' && $admin_room_st=='0' && $admin_hard_st=='0' && $admin_app_st=='0' && $admin_super_st=='0')
{
?>
<div class="row">
  <h1 class="text-danger" >Sorry !!!! You Have <b>No Access.</b> Contact With C.P.B.-IT</h1>
</div>

<?php } ?>



    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 foter_coustom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 2018 Powered By C.P.B.-IT</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
   <script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>

<!-- Vagas Slider JS --> 
<script type="text/javascript" src="vegas/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="pluagins/vegus/vegas.js"></script>
<script type="text/javascript" src="vegas/custom.js"></script>



<!-- pre loder script start -->
<script type="text/javascript">
  var loader;
  function load(opacity){
    if (opacity <= 0) {
      displayContent();
    }
    else{
      loader.style.opacity=opacity;
      window.setTimeout(function(){
        load(opacity - 0.05)
      },100);
    }
  } 
  function displayContent(){
    loader.style.display='none';
    document.getElementById('content').style.display='block';
  }
  document.addEventListener("DOMContentLoaded",function(){
    loader=document.getElementById('loader');
    load(1);
  })
</script>
<!-- end  -->
  </body>

</html>

<?php } ?>