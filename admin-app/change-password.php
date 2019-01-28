<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_app_login'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');

//$admin_id=$_SESSION['admin_id'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="syful.cse.bd@gmail.com">
        <meta name="author" content="Saif">

        <link rel="shortcut icon" href="images/cpb.png">

        <?php include('common/title.php'); ?>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect --> 
        <link href="css/waves-effect.css" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>

         <script type="text/javascript">
            function valid() {
                if (document.chngpwd.admin_pass.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.admin_pass.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <?php include('common/navbar.php'); ?>
            <!-- Top Bar End -->


           <!-- Left Sidebar Start --> 

            <?php include('common/sidebar.php'); ?>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                           <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Change Your Password</h3></div>
                                    <div class="panel-body">
            <form class="form-horizontal" action="change-password-action.php" method="post" role="form" name="chngpwd" onSubmit="return valid();">                                    
               
                
                <div class="form-group">
                    <label class="col-md-4 control-label">Current Password</label>
                    <div class="col-md-6">
                        <input type="password" name="admin_pass" class="form-control" placeholder="Enter Your Current Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">New Password</label>
                    <div class="col-md-6">
                        <input type="password" name="newpassword" class="form-control" placeholder="Enter New Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Conform Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Retype New Password" required>
                    </div>
                </div>


	    <div class="col-md-12">         
	       <div class="form-group m-b-0">    
	<button type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Change Password</button>

	<a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
	           </div>
	    </div>
                

                                          
                           
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    <?php include('common/footer.php') ?>
                </footer>

            </div>
          


            

        </div>
        <!-- END wrapper -->


    
       

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>
        <script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>

        
        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>




   
    
    </body>
</html>

<?php } ?>