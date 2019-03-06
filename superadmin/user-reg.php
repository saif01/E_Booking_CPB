<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin');
}
else{ 
include('../db/config.php');
 
// For User Location
$location = '';
$query = "SELECT * FROM `bu_location` ORDER BY `location_name`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $location .= '<option value="'.$row["bul_id"].'">'.$row["location_name"].'</option>';
}

// Department
$department = '';
$query1 = "SELECT * FROM `department` ORDER BY `dept_name`";
$result1 = mysqli_query($con, $query1);
while($row = mysqli_fetch_array($result1))
{
 $department .= '<option value="'.$row["dept_name"].'">'.$row["dept_name"].'</option>';
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="syful.cse.bd@gmail.com">
        <meta name="author" content="Saif">

       <?php include('common/icon.php'); ?>

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

        <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availabe_user.php",
                    data: 'check_value=' + $("#check_value").val(),
                    type: "POST",
                    success: function(data) {
                        $("#user-availability-status1").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
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
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">User Registration</h3>
            </div>
            <div class="panel-body">


<form id="yourFormId" class="form-horizontal" action="user-reg-action.php" method="post" enctype="multipart/form-data">
<div class="row"> 
	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">User ID</label>
                <div class="col-sm-9">
                  <input type="text" id="check_value" onBlur="userAvailability()" name="user_login" class="form-control"  placeholder="Enter User Login ID" required>
            	  <span id="user-availability-status1" style="font-size:12px;"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" name="user_pass" class="form-control" placeholder="Default Password" value="12345" disabled="disabled">
                </div>
            </div>
    </div>
  
	
    <div class="col-md-6"> 
    		<div class="form-group">
                <label class="col-sm-3 control-label">User Name</label>
                <div class="col-sm-9">
                   <input type="text" name="user_name" class="form-control" placeholder="Enter User Full Name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">User Contact</label>
                <div class="col-sm-9">
                   <input type="text" name="user_contact" class="form-control" placeholder="Enter User Phone Number" required>
                </div>
            </div>            
    </div>

</div>
<div class="row">
    <div class="col-md-6"> 
    		<div class="form-group">
                <label class="col-sm-3 control-label">User Email</label>
                <div class="col-sm-9">
                   <input type="email" name="user_mail" class="form-control" placeholder="Enter User Email Address" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">B.U. Email</label>
                <div class="col-sm-9">
                   <input type="text" name="bu_mail" class="form-control" placeholder="Enter User B.U. Head Email Address" required>
                </div>
            </div>
                      
    </div>

   <div class="col-md-6"> 
    		<div class="form-group">
                <label class="col-sm-3 control-label">User Office ID</label>
                <div class="col-sm-9">
                   <input type="text" name="user_office_id" class="form-control" placeholder="Enter User Office ID" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">User Location</label>
                <div class="col-sm-9">
                  <select class="form-control" name="user_location" required="required">
                      <option value="" disabled selected>Select Location Name</option>
                          <?php echo $location; ?>
                  </select>
                </div>
            </div>
                
    </div>
</div>
<div class="row">

    <div class="col-md-6"> 
                <div class="form-group">
                    <label class="col-sm-3 control-label">Department</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="user_dept" required="required">
                            <option value="" disabled selected>Select Department Name</option>
                          <?php echo $department; ?>
                        </select>
                       <!-- <input type="text" name="user_dept" class="form-control" placeholder="Enter User Department Name" required> -->
                    </div>
                </div>  

        
    		   <div class="form-group">
                <label class="col-sm-3 control-label">Active</label>
                        <div class="col-sm-9">
                        	 <div class="radio radio-info radio-inline">
                                <input type="radio" id="inlineRadio1" value="1" name="show_st" checked>
                                <label for="inlineRadio1"> Yes </label>
                            </div>
                            <div class="radio radio-inline">
                                <input type="radio" id="inlineRadio2" value="0" name="show_st">
                                <label for="inlineRadio2"> No </label>
                            </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">User Access</label>
                <div class="col-sm-9">
                   <div class="checkbox checkbox-success checkbox-inline">
                    <input type="checkbox" name="user_car_st" value="1">
                    <label for="inlineCheckbox1"> Car </label>
	                </div>
	                <div class="checkbox checkbox-success checkbox-inline">
	                    <input type="checkbox" name="user_room_st" value="1">
	                    <label for="inlineCheckbox2"> Room </label>
	                </div>
	                <div class="checkbox checkbox-success checkbox-inline">
	                    <input type="checkbox" name="user_law_st"  value="1">
	                    <label for="inlineCheckbox3"> Legal </label>
	                </div>
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" name="user_cms_st"  value="1">
                        <label for="inlineCheckbox3"> CMS </label>
                    </div>

	                
	                
                </div>
            </div>
         
    </div>

   

 <div class="col-md-6"> 
            
            <div class="form-group">
                <label class="col-sm-3 control-label">User Image</label>
                        <div class="col-sm-9">
                        <input name="photo" id="target1" type="file" class="form-control file-upload-info" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" required>
                        
                             
                </div>
            </div>     
           
            <div class="form-group">
                <label class="col-sm-3 control-label">Photo Preview</label>
                <div class="col-sm-9">
                  <img id="preview1" alt="Image Not Selected" class="rounded mx-auto d-block" width="100" height="100" />
                   
                </div>
            </div>



    </div>
                                      


</div> 




    <div class="col-md-12">         
       <div class="form-group m-b-0">    
<button id="btnSubmit" type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Submit </button>

<a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
           </div>
    </div>

                                        </form>






			</div> <!-- Panel-body -->
            
        </div> <!-- Panel -->
    </div> <!-- col-->
    
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
       <!--  <script src="js/jquery.min.js"></script> -->
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
        
<script src="../assets/coustom/ajax/3.3.1_jquery.min.js"></script>
<!-- Bubmit Button Disable After submit form -->
<script type="text/javascript">
    $(document).ready(function () {
    $('form').submit(function () {
        setTimeout(function () { disableButton(); },0);
    });

    function disableButton() {
        $("#btnSubmit").prop('disabled', true);
    }
});
</script>


   
    
    </body>
</html>

<?php } ?>