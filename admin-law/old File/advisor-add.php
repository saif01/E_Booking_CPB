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
                    url: "check_availabe_advisor.php",
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


  <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">Legal Advisor Registration</button>
                <form class="form-sample" action="advisor-add-action.php" method="post" enctype="multipart/form-data">


        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">

                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        
                        <input type="text" id="check_value" onBlur="userAvailability()" name="name" class="form-control"  placeholder="Enter Advisor Name" required>
            <span id="user-availability-status1" style="font-size:12px;"></span>

                    </div>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contact</label>
                    <div class="col-sm-9">
                         <input type="Number" name="contact" class="form-control" placeholder="Enter Advisor Contact Number" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                    	<textarea type="text" name="details" class="form-control" placeholder="Enter Advisor Description" required></textarea>
                         
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

         <div class="row">

            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Court</label>
                    <div class="col-sm-9">
                     <input type="text" name="court" class="form-control" placeholder="Enter Advisor Court Name" required>
                        
                    </div>
                 </div>
               </div>
           
           <!--  <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Court</label>
                    <div class="col-sm-9">
                        <select name="court" class="form-control" required>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Sattaled">Sattaled</option>
                            <option value="Closed">Closed</option>
                        </select>
                    
                    </div>
                 </div>
               </div> -->
        </div>
        

        

        <div class="row">
        	
          <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Advisor Image</label>
                     <div class="col-sm-9">

       <input name="photo" type="file" class="form-control file-upload-info" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" required>
    <p style="color:red;">Resolution 250*300 pixels</p>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Photo Preview</label>
                    <div class="col-sm-9">
                    	<img id="preview1" alt="Image Not Selected" class="rounded mx-auto d-block" width="100" height="100" />
                         
                    </div>
                </div>
            </div>  
           
        </div>
        

        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Advisor Registration </button>
                <button class="btn btn-light btn-block btn-rounded ">Reset</button>
                
                <a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
            </div>
        </div>

                                        </form>
                                    </div>
                                </div>
                        
                                        


                                                                                                
                            <!--row end-->
                        </div>
                        <!-- content-wrapper-->
                    </div>
                    <!-- content-wrapper ends -->
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

<!--************************ FOR IMAGE SHOW WHEN SELECETED *******************  -->
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<!--************************ FOR IMAGE SHOW WHEN SELECETED *******************  -->




    </body>

    </html>

    <?php } ?>