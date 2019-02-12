<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{ 
 require('../db/config.php');
date_default_timezone_set('Asia/Dhaka');// change according timezone            
$currentdate = date( 'Y-m-d' );                
$user_id=$_SESSION['user_id'];
$notify2=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_id`='$user_id' AND `comit_st`='' AND `boking_status`='1' AND date(`start_date`) <= date('$currentdate') ");
$number2=mysqli_num_rows($notify2);
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

    <!--*************Start For Auto Load Model ***************-->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script type="text/javascript">
      $(window).load(function()   
    {

    var noncom=<?php echo $number2; ?>;

      if (noncom >= 2) {
        $('#myModal').modal('show');
      }
    });
    </script>
    <!--*************End For Auto Load Model ***************-->

</head>

<body class="loader-active">

   

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


<!-- Advance Search Modal -->

<div id="advanceSearch" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
         <div class="modal-header">
        <h5 class="modal-title">Find Free Car's By Date</h5>
        <button type="button" onclick="goBack()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        

        <form method="post" action="car-list-free.php">
            

            <div class="row col-md-12 text-center text-info">
                <div class="col-md-6">
                      <div class="form-group">
                        <label >Start Date</label>
                        <input type="date" class="form-control" name="start_date" required="required">

                      </div>
                </div> 
           
           
            	 <div class="col-md-6">
                      <div class="form-group">
                        <label >End Date</label>
                        <input type="date" class="form-control" name="end_date" required="required">

                      </div>
                </div>

           </div>
            
            
            <div class="row col-md-12 text-center text-info">
                <div class="col-md-6">
                      <div class="form-group">
                        <label >Start Time</label>
                        <input type="date" class="form-control" name="start_date" required="required">

                      </div>
                </div> 
           
           
            	 <div class="col-md-6">
                      <div class="form-group">
                        <label >End Time</label>
                        <input type="date" class="form-control" name="end_date" required="required">

                      </div>
                </div>

           </div>

            <div class="col-md-12">

                  <div class="form-group">
                    <label >Car Type</label>
                    <select name="car_type" class="form-control" >
                        <option value="0">Regular</option>
                        <option value="1">Temporary</option>

                    </select>
                  </div>
            </div>
           
      

       <div class="modal-footer">
           
            <input type="submit" name="findcar" class="bnt btn-primary btn-block form-control" value="Find Free Car's">
       </div>


        </form>

    </div>
  </div>
</div>
<!-- End Search Modal -->

 

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

<script type='text/javascript'>
            (function() {
                'use strict';
                function remoteModal(idModal){
                    var vm = this;
                    vm.modal = $(idModal);

                    if( vm.modal.length == 0 ) {
                        return false;
                    }

                    if( window.location.hash == idModal ){
                        openModal();
                    }

                    var services = {
                        open: openModal,
                        close: closeModal
                    };

                    return services;
                    ///////////////

                    // method to open modal
                    function openModal(){
                        vm.modal.modal('show');
                    }

                    // method to close modal
                    function closeModal(){
                        vm.modal.modal('hide');
                    }
                }
                Window.prototype.remoteModal = remoteModal;
            })();

            $(function(){
                window.remoteModal('#advanceSearch');
            });
        </script>


<script type="text/javascript">
// if close modal then Go back	
	function goBack() {
		window.history.back();
 		 //location.reload();
		}
// Any any click Then Go back
	  $(document).on("click", function () {
	  	window.history.back();
	        //console.log('clicked');
	    });
</script>



        </body>

</html>

<?php } ?>