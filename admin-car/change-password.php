<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-car-login'])==0)
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
        <!-- inject:css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />


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

                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <button class="card-title btn btn-outline btn-block ">Change Password</button>
                                        

                        <form class="forms-sample" action="change-password-action.php" method="post" name="chngpwd" onSubmit="return valid();">



                                            <div class="form-group">
                                                <label>Current Password </label>
                                                <input type="Password" name="admin_pass" class="form-control" placeholder="Enter Current Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">New Password</label>
                                                <input type="Password" name="newpassword" class="form-control" placeholder="Enter New Password">
                                            </div>
                                            <div class="form-group">
                                                <label>User Contract</label>
                                                <input type="password" name="confirmpassword" class="form-control" placeholder=" Retype New Password" required>
                                            </div>



                                            <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Hit To Change Password</button>
                                            <button class="btn btn-light btn-block btn-rounded">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--row end-->
                        </div>
                        <!-- content-wrapper-->
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



        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->
        
    </body>

    </html>

    <?php } ?>