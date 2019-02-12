<!DOCTYPE html>
<html>
<head>
	<title></title>
<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
 <!-- vagas CSS Link -->
    <link rel="stylesheet" type="text/css" href="vegas/style.css">

    <!--*************** Font Awesome v.5.0 ****************-->
    <link href="../assets/fontawesom/css/all.css" rel="stylesheet">

<!-- Pre Loader JS -->
    <script type="text/javascript">
      window.addEventListener("load", function () {
        const loader = document.querySelector(".loader");
        loader.className += " hidden"; // class "loader hidden"
    });
    </script>



</head>
<body class="vegas-slider">

    <div class="loader">
        <img src="img/preloader.gif" alt="Loading..." />
    </div>

	
<div class="navbar_grad">
  <!-- Image and text -->
   
        <nav class="navbar navbar-expand-lg navbar-light resize mx-auto justify-content-center" >
          

          <a class="navbar-brand" href="#">
            <img src="../assets/img/logo.png" width="50" height="50" style=" border-radius:20%;
            border: 2px solid #ffd000; " alt="" >
            <span style="color: white;">CPB-IT Portal</span>                
          </a>

        </nav>
</div>


<div class="container">


  <!-- <p class="text-danger text-center h1" >Sorry !!!! You Have <b>No Access</b></p> -->


  <div class="row justify-content-center">

    <!-- Project Car Pool -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../user-car">

        <i class="fas fa-car text-primary" style="font-size:700%;"></i>
       
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">Carpool</span>
      </a>   
    </div>
    <!--Room Booking Project  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../user-room">
        <i class="fas fa-home text-success" style="font-size:700%;" ></i>
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">Room Booking </span>
      </a>   
    </div>
    <!--Legal Project  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../user-law">
        <i class="fas fa-balance-scale text-warning" style="font-size:700%;" ></i>
       <!--  <img src="img/img/Legal.png" class="img_size"> -->
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">Legal</span>
      </a>   
    </div>
    <!--Complaint Management  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../user-room">
        
        <i class="fas fa-laptop-medical" style="font-size:700%; color: #410093 "></i>
        <span class="badge badge-dark" style="font-size: 120%; margin:2%;">CMS</span>
      </a>   
    </div>

     <!--LogOut  -->
    <div class="col-md-2 shadow-lg p-3 rounded saif text-center zoom" id="grad1">
      <a href="../user-room">

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

</body>
</html>