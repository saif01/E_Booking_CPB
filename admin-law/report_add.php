<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-law-login'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');



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

        <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_case_number.php",
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
                <h3 class="panel-title">Legal Report Add Form</h3>
            </div>
            <div class="panel-body">


<form class="form-horizontal" action="report-add-action.php" method="post">

	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Department</label>
                <div class="col-sm-9">
                  <select name="case_dept" class="form-control" required>
					  <option value="">Select Department</option>
					<?php
					  $query2=mysqli_query($con,"SELECT `department` FROM `case_dept` ORDER BY `department`");

					      while ($row2 = mysqli_fetch_array($query2))
					      {
					echo "<option value='". $row2['department'] ."'>" .$row2['department'] ."</option>" ;
					}
					?>

					</select>

                   
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Customer Name</label>
                <div class="col-sm-9">
                  <input type="text" name="customer" class="form-control"  placeholder="Enter  Customer Name" required />
                </div>
            </div>
    </div>
    <div class="col-md-6">
    		<div class="form-group">
                <label class="col-sm-3 control-label">Case Number</label>
                <div class="col-sm-9">
                  <input type="text" name="case_no" class="form-control" id="check_value" onBlur="userAvailability()" value="Cr. Case No-" required />
                  <span id="user-availability-status1" style="font-size:12px;"></span>  
                </div>
            </div> 
            
            <div class="form-group">
                <label class="col-sm-3 control-label">Complaint Name</label>
                <div class="col-sm-9">
                   <input type="text" name="complaint" class="form-control" placeholder="Enter Responsible Person's Name" required />

                </div>
            </div>
    </div>
	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Filling Date</label>
                <div class="col-sm-9">
                  <input type="date" name="filling" class="form-control" />
                   
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Hearing Date</label>
                <div class="col-sm-9">
                   <input type="date" name="hearing" class="form-control"  />
                </div>
            </div>
    </div>
    <div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Last Hearing</label>
                <div class="col-sm-9">
                  <input type="date" name="last_hearing" class="form-control"  />
                   
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Previous Banalce</label>
                <div class="col-sm-9">
                   <input type="number" name="pre_balance" class="form-control"  placeholder="Balance Before legal Action" required />
                </div>
            </div>
    </div>
    <div class="col-md-6">

    		<div class="form-group">

            	<label  class="col-sm-3 control-label">Case Status</label>
                <div class="col-sm-9">
	                  <select name="status" class="form-control" required>
            				<option value="In Process">In Process</option>
                            <option value="Sattaled">Sattaled</option>
            				<option value="Closed">Closed</option>
            			</select>
                </div>
            </div> 

            <div class="form-group">
                <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9">
                        	<textarea type="text" class="form-control" placeholder="Write Somthing About Case" name="remarks" rows="3" required></textarea>
                </div>
            </div>
            		
    </div>
    <div class="col-md-6">

    		<div class="form-group">

            	<label  class="col-sm-3 control-label">Present Banalce</label>
                <div class="col-sm-9">
	                 <input type="number" name="pr_balance" class="form-control" placeholder="Balance After legal Action" required />
                </div>
            </div> 

            <div class="form-group">

                <label  class="col-sm-3 control-label">Legal Fees</label>
                <div class="col-sm-9">
                     <input type="number" name="law_fees" class="form-control" placeholder="Balance After legal Action" required />
                </div>
            </div> 

           
            		
    </div>

    <div class="col-md-12 text-center"> 
         <div class="form-group">
                <label class="col-sm-3 control-label">Publish</label>
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
    </div>

    

    <div class="col-md-12">         
       <div class="form-group m-b-0">    
<button type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Legal Report Add</button>

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