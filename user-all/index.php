<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d h:i:s', time () );
if(strlen($_SESSION['user_redirect'])==0)
  { 
header('location:index');
}
else{  ?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CPB.IT-Portal</title>
       <!--=== Favicon ===-->
    <link rel="shortcut icon" href="img/cpb.ico" type="image/x-icon" /> 

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/a.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
     <!-- vagas CSS Link -->
    <link rel="stylesheet" type="text/css" href="vegas/style.css">


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
          <h2   class="text-light d-inline" style="font-family: Times New Roman">C.P.B. IT-Portal</h2>
          </div>
        </div>
      </div>
    </section>
<!-- end nav section -->
    <!-- Page Content -->
    <div class="container " id="content" style="font-family: Times New Roman; margin-top: 110px;">

      

<?php 
 
if (strlen($_SESSION['car_logIn_id'])!=0) {
?>
      <!-- Project Car Pool -->
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel" ></li>
                    <li data-slide-to="2" data-target="#mycarousel" ></li>
                  </ol>
               
                  <div class="carousel-item  active">
                      <img src="img/carpool/carpool (1).jpg" height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                     <img src="img/carpool/carpool (2).jpg"  height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                   <img src="img/carpool/carpool (3).jpg" height="300" width="700" class="rounded" >
                     
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

              <h3>Car Pool</h3><hr>
          <a href="../user-car">
         <button class="button1"><span>Car Pool</span> </button>
          </a>
            </div>
          </div>
        </div>
      
      </div>
      <!-- /.row -->
      <hr>
<?php }
if (strlen($_SESSION['room_login_id'])!=0) {
?>

      <!--Room Booking Project  -->
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel1" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel1" ></li>
                    <li data-slide-to="2" data-target="#mycarousel1" ></li>
                  </ol>
               
                  <div class="carousel-item  active">
                      <img src="img/room/room (1).jpg" height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
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
        <div class="col-md-4 col-sm-6 text-center">
          <div class="card" style="margin-top: 10%;">
            <div class="card-body" style="background-color: #696969; color:#11f7d4;">
              <h3>Meeting Room Booking</h3><hr>
         
          <a href="../user-room">
          <button class="button2"><span>Room Booking </span> </button>
          </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    <hr>
<?php }
if (strlen($_SESSION['law_login_id'])!=0) {
?>
      <!--Legal Project  -->
      <div class="row">
        <div class="col-md-8 col-sm-6">
          <div id="mycarousel3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel3" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel3" ></li>
                    <li data-slide-to="2" data-target="#mycarousel3" ></li>
                  </ol>
               
                  <div class="carousel-item  active">
                      <img src="img/legal/legal (1).jpg" height="300" width="700" class="rounded" >
                     
                  </div>
                  <div class="carousel-item ">
                     <img src="img/legal/legal (2).jpg"  height="300" width="700" class="rounded" >
                     
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
            <div class="card-body" style="background-color: #191970; color:#912CEE; ">
              <h3>Legal Management</h3><hr>
         
          <a href="../user-law">
          <button class="button3"><span>Legal</span> </button>
          </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    <hr>
<?php }?>
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