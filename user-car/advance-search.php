<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d h:i:s', time () );
if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{  ?>
<?php 
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
    <!--==************************* Header Area End ****************************************************************************************************************************==-->
    

   
   <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Find Free Cars By Date And Time</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                       <!--  <p>C.P. Bangladesh Car List.. </p> -->
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

     <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 m-auto">
                    <div class="login-page-content">
                        <div style="background-color: #ffd000; padding: 2%;">
                           

                 <form method="post" action="car-list-free.php" >


      <div class="form-group row col-md-12">
    
	  <label for="inputPassword" class="col-sm-4 col-form-label">Select Car Type :</label>
		    <div class="col-sm-6">
		     <select class="form-control custom-select" name="car_type">
		     	<option value="0">Regular </option>
		     	<option value="1">Temporary</option>

		     </select>
		    
		  </div>

	</div>            	

      <div class="form-group row col-md-12">
    
		  <div class="form-group row col-md-6">
		    <label for="inputPassword" class="col-sm-4 col-form-label">Start Date :</label>
		    <div class="col-sm-6">
		      <input type="date" class="form-control" name="start_date" >
		    </div>
		  </div>
		  <div class="form-group row col-md-6">
		    <label for="inputPassword" class="col-sm-4 col-form-label">Start Time :</label>
		    <div class="col-sm-6">
		     <select  name="start_time" class="form-control custom-select" > 
            <option value="01:00:00">Full Day</option>
                <option value="09:00:00">9.00 AM </option>
                <option value="09:30:00">9.30 AM </option>
                <option value="10:00:00">10.00 AM </option>
                <option value="10:30:00">10.30 AM </option>
                <option value="11:00:00">11.00 AM </option>
                <option value="11:30:00">11.30 AM </option>
                <option value="12:00:00">12.00 PM (Noon)</option>
                <option value="12:30:00">12.30 PM</option>
                <option value="13:00:00">01.00 PM </option>
                <option value="13:30:00">01.30 PM </option>
                <option value="14:00:00">02.00 PM </option>
                <option value="14:30:00">02.30 PM </option>
                <option value="15:00:00">03.00 PM </option>
                <option value="15:30:00">03.30 PM </option>
                <option value="16:00:00">04.00 PM </option>
                <option value="16:30:00">04.30 PM </option>
                <option value="17:00:00">05.00 PM </option>
                <option value="17:30:00">05.30 PM </option>
                <option value="18:00:00">06.00 PM </option>
                <option value="18:30:00">06.30 PM </option>
                <option value="19:00:00">07.00 PM </option>
                <option value="19:30:00">07.30 PM </option>
                <option value="20:00:00">08.00 PM </option>
                <option value="20:30:00">08.30 PM </option>
                <option value="21:00:00">09.00 PM </option>
                <option value="21:30:00">09.30 PM </option>
                <option value="22:00:00">10.00 PM </option>
                <option value="22:30:00">10.30 PM </option>
                <option value="23:00:00">11.00 PM </option>
                <option value="23:30:00">11.30 PM </option>
                <option value="23:59:00">12.00 AM (Night) </option>
                <option value="01:00:00">01.00 AM </option>
                <option value="01:30:00">01.30 AM </option>
                <option value="02:00:00">02.00 AM </option>
                <option value="02:30:00">02.30 AM </option>
                <option value="03:00:00">03.00 AM </option>
                <option value="03:30:00">03.30 AM </option>
                <option value="04:00:00">04.00 AM </option>
                <option value="04:30:00">04.30 AM </option>
                <option value="05:00:00">05.00 AM </option>
                <option value="05:30:00">05.30 AM </option>
                <option value="06:00:00">06.00 AM </option>
                <option value="06:30:00">06.30 AM </option>
                <option value="07:00:00">07.00 AM </option>
                <option value="07:30:00">07.30 AM </option>
                <option value="08:00:00">08.00 AM </option>
                <option value="08:30:00">08.30 AM </option>
                                                      
             </select>
		    </div>
		  </div>

	</div> 

 <div class="form-group row col-md-12">
    
		  <div class="form-group row col-md-6">
		    <label for="inputPassword" class="col-sm-4 col-form-label">End Date :</label>
		    <div class="col-sm-6">
		      <input type="date" class="form-control" name="end_date" >
		    </div>
		  </div>
		  <div class="form-group row col-md-6">
		    <label for="inputPassword" class="col-sm-4 col-form-label">End Time :</label>
		    <div class="col-sm-6">
		     <select  name="return_time" class="form-control custom-select"> 
              <option value="23:59:00">Full Day</option>
                <option value="09:00:00">9.00 AM </option>
                <option value="09:30:00">9.30 AM </option>
                <option value="10:00:00">10.00 AM </option>
                <option value="10:30:00">10.30 AM </option>
                <option value="11:00:00">11.00 AM </option>
                <option value="11:30:00">11.30 AM </option>
                <option value="12:00:00">12.00 PM (Noon)</option>
                <option value="12:30:00">12.30 PM</option>
                <option value="13:00:00">01.00 PM </option>
                <option value="13:30:00">01.30 PM </option>
                <option value="14:00:00">02.00 PM </option>
                <option value="14:30:00">02.30 PM </option>
                <option value="15:00:00">03.00 PM </option>
                <option value="15:30:00">03.30 PM </option>
                <option value="16:00:00">04.00 PM </option>
                <option value="16:30:00">04.30 PM </option>
                <option value="17:00:00">05.00 PM </option>
                <option value="17:30:00">05.30 PM </option>
                <option value="18:00:00">06.00 PM </option>
                <option value="18:30:00">06.30 PM </option>
                <option value="19:00:00">07.00 PM </option>
                <option value="19:30:00">07.30 PM </option>
                <option value="20:00:00">08.00 PM </option>
                <option value="20:30:00">08.30 PM </option>
                <option value="21:00:00">09.00 PM </option>
                <option value="21:30:00">09.30 PM </option>
                <option value="22:00:00">10.00 PM </option>
                <option value="22:30:00">10.30 PM </option>
                <option value="23:00:00">11.00 PM </option>
                <option value="23:30:00">11.30 PM </option>
                <option value="23:59:00">12.00 AM (Night) </option>
                <option value="01:00:00">01.00 AM </option>
                <option value="01:30:00">01.30 AM </option>
                <option value="02:00:00">02.00 AM </option>
                <option value="02:30:00">02.30 AM </option>
                <option value="03:00:00">03.00 AM </option>
                <option value="03:30:00">03.30 AM </option>
                <option value="04:00:00">04.00 AM </option>
                <option value="04:30:00">04.30 AM </option>
                <option value="05:00:00">05.00 AM </option>
                <option value="05:30:00">05.30 AM </option>
                <option value="06:00:00">06.00 AM </option>
                <option value="06:30:00">06.30 AM </option>
                <option value="07:00:00">07.00 AM </option>
                <option value="07:30:00">07.30 AM </option>
                <option value="08:00:00">08.00 AM </option>
                <option value="08:30:00">08.30 AM </option>
                                                      
             </select>
		    </div>
		  </div>

	</div> 
	
    

       <div class="modal-footer">
           
            <input type="submit" name="findcar" class="bnt btn-primary btn-block form-control" value="Find Free Car's">
       </div>

        </form>








                        </div>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Login Page Content End ==-->
 

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