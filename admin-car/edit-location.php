<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-car-login'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');

$location_id=$_GET['location_id'];

$query=mysqli_query($con,"SELECT `location` FROM `location` WHERE `location_id`='$location_id' ");

$row=$query->fetch_assoc();
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
        <?php include('common/icon.php'); ?>

        <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_location.php",
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
            <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
                <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auto-form-wrapper">
                            	<h3 style="text-align: center; margin-bottom: 10%;">Location Update</h3>

<form class="form-sample" action="edit-location-action.php?location_id=<?php echo ($location_id); ?>" method="post" >


    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">

                <label class="col-sm-3 col-form-label">Location </label>
                <div class="col-sm-9">

                    <input type="text" id="check_value" onBlur="userAvailability()" name="location" class="form-control" value="<?php echo($row[location]); ?>" required>
        <span id="user-availability-status1" style="font-size:12px;"></span>
         <span class="btn btn-info btn-sm" style="float: right; margin-top: 1%;" >Check</span>


                </div>
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group row">
                <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Update Location</button> 
            </div>
        </div>

    </div>

                                        </form>
                               
                            </div>

                            <?php include('common/footer.php') ?>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
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