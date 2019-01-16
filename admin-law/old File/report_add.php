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
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php include('common/title.php'); ?>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />

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

    <body>
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <?php include('common/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">

                <!-- partial:partials/_sidebar.html -->
                <?php include('common/sidebar.php'); ?>
                <!-- partial -->

                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">

                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">Legal Report Add Form </button>
            <form class="form-sample" action="report-add-action.php" method="post">

            <div class="row">
                <div class="col-md-6">
                 <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Case Number </label>
                    <div class="col-sm-9">
                        <input type="text" name="case_no" class="form-control" id="check_value" onBlur="userAvailability()" value="Cr. Case No-" required />

                        <span id="user-availability-status1" style="font-size:12px;"></span>
                    </div>
                </div>
               </div>
                   
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Customer Name </label>
                        <div class="col-sm-9">
                            <input type="text" name="customer" class="form-control"  placeholder="Enter  Customer Name" required />

                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                
                   
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Case Department </label>
                                  <div class="col-md-6">
                                                    
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
                </div>
            </div>
              
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Complaint </label>
                        <div class="col-sm-9">
                            <input type="text" name="complaint" class="form-control" placeholder="Enter Responsible Person's Name" required />
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
           
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Filling Date </label>
                        <div class="col-sm-9">
                            <input type="date" name="filling" class="form-control" required />
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Hearing Date </label>
                        <div class="col-sm-9">
                            <input type="date" name="hearing" class="form-control"  placeholder="Enter  Customer Name" required />

                        </div>
                    </div>
                </div>

            </div>

                 <div class="row">
       
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Hearing Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="last_hearing" class="form-control" required />
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Previous Banalce </label>
                        <div class="col-sm-9">
                            <input type="number" name="pre_balance" class="form-control"  placeholder="Balance Before legal Action" required />

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
    
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Remarks</label>
                        <div class="col-sm-9">
                        	<textarea type="text" class="form-control" placeholder="Write Somthing About Case" name="remarks" rows="3" required></textarea>
                            
                        </div>
                    </div>
                </div>

                 <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Present Banalce</label>
                        <div class="col-sm-9">
                            <input type="number" name="pr_balance" class="form-control" placeholder="Balance After legal Action" required />
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
   				<div class="col-md-6">
            	<div class="form-group row">
            		<label class="col-sm-3 col-form-label">Case Status</label>
            		<div class="col-sm-9">
            			<select name="status" class="form-control" required>
            				<option value="In Process">In Process</option>
                            <option value="Sattaled">Sattaled</option>
            				<option value="Closed">Closed</option>
            			</select>
                	
                    </div>
                 </div>
               </div>

                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Publish</label>
                    <div class="col-sm-4">
                        <div class="form-radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="show_st" id="membershipRadios1" value="1" checked> Yes
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="form-radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="show_st" id="membershipRadios2" value="0"> No
                        </label>
                    </div>
                </div>
                </div>
            </div>
            
            </div>

            <hr>

    <div class="row">
        <div class="col-12 text-center">
            <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Report Add</button>
            <button class="btn btn-light btn-block btn-rounded">Reset</button>

            <a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
        </div>
    </div>


                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <?php include('common/footer.php') ?>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
    </body>

    </html>
    <?php } ?>