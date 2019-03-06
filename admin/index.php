<?php
session_start();
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CPB-IT-Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../admin-car/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../admin-car/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../admin-car/vendors/css/vendor.bundle.addons.css">
    
    <link rel="stylesheet" href="../admin-car/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/img/logo.png" /> 
    <style type="text/css">
        .login_logo
        {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            position: absolute;
            top: calc(-100px/2);
            left: calc(50% - 50px);
            border-radius: 10px;
            border: 2px solid #1E90FF;
            padding: 1px;

        }
       
    </style>

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">

                            <img src="../assets/img/logo.png" alt="CPB-IT" class="login_logo">

                            <h3 class="text-center text-muted" style="margin: 7px;">Admin Login</h3>


                            <form action="admin-login-action.php" method="post">
                                <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>


                                <div class="form-group">
                                    <label class="label">Username</label>
                                    <div class="input-group">
                                        <input type="text" name="admin_login" class="form-control" placeholder="Enter AD ID" required="required">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="admin_pass" class="form-control" placeholder="Enter AD Password" required="required">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                                </div>


                            </form>
                        </div>

                        <p class="footer-text text-center">copyright © 2018. <b style="color: green;">C.P. Bangladesh</b> @Powered By CPB-IT.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../admin-car/vendors/js/vendor.bundle.base.js"></script>
    <script src="../admin-car/vendors/js/vendor.bundle.addons.js"></script>
    
    <script src="../admin-car/js/off-canvas.js"></script>
    <script src="../admin-car/js/misc.js"></script>
    <!-- endinject -->
</body>

</html>