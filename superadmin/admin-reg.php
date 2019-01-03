<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin/index');
}
else{ 
include('../db/config.php');

if (isset($_POST['submit'])) {

$admin_login = $_POST['admin_login'];
$admin_name = $_POST['admin_name'];
$admin_pass = $_POST['admin_pass'];
$admin_dept = $_POST['admin_dept'];
$admin_contact =$_POST['admin_contact'];
$admin_contract = $_POST['admin_contract'];
$admin_officeId = $_POST['admin_officeId'];
$admin_st_ch = $_POST['admin_st'];




          $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['admin_img']['name']);
            $storeFile="../pimages/admin/".$file_name;
            $fileName=$_FILES['admin_img']['tmp_name'];

            move_uploaded_file($fileName,$storeFile);


            if ($admin_st_ch =='carpool') {

                $admin_st='1';
                $admin_car_st='1';
                $admin_room_st='0';
                $admin_super_st='0';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_super_st')");

                ?>
                <script>
                    alert('Update successfull. Make CarPool Admin !!!');
                    window.open('admin-all.php', '_self'); //for locating other page.
                    //window.location.reload(); //For reload Same page
                </script>
                <?php
                exit();
               
            }

             elseif ($admin_st_ch=='room') {

               $admin_st='1';
                $admin_car_st='1';
                $admin_room_st='0';
                $admin_super_st='0';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_super_st')");

                ?>
                <script>
                    alert('Update successfull. Make Room Booking Admin !');
                    window.open('admin-all.php', '_self'); //for locating other page.
                    //window.location.reload(); //For reload Same page
                </script>
                <?php
                exit();
               
            }

            elseif ($admin_st_ch=='car_room') {

              $admin_st='1';
                $admin_car_st='1';
                $admin_room_st='0';
                $admin_super_st='0';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_super_st')");

                ?>
                <script>
                    alert('Update successfull. Make CarPool And Room Booking Admin!!!');
                    window.open('admin-all.php', '_self'); //for locating other page.
                    //window.location.reload(); //For reload Same page
                </script>
                <?php
                exit();
               
            }

            elseif ($admin_st_ch=='super') {

                $admin_st='1';
                $admin_car_st='1';
                $admin_room_st='1';
                $admin_super_st='1';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_super_st')");

                ?>
                <script>
                    alert('Update successfull. Make a Super Admin  !');
                    window.open('admin-all.php', '_self'); //for locating other page.
                    //window.location.reload(); //For reload Same page
                </script>
                <?php
               exit();
            }

            else{
                echo "Error !!! Data Not Updated";
            }


    } ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CPB.CarPool</title>
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
                    url: "check_availabe_admin.php",
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
                                        <button class="card-title btn btn-outline btn-block ">Admin Registration</button>
                <form class="form-sample" action="admin-reg-action.php" method="post" enctype="multipart/form-data">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                            <label class="col-sm-3 col-form-label">Admin LogIn ID </label>
                                                        <div class="col-sm-9">

                                             <input type="text" name="admin_login" id="check_value" onBlur="userAvailability()" class="form-control" placeholder="Enter User Name" required>
                                                <span id="user-availability-status1" style="font-size:12px;"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="admin_pass" class="form-control" placeholder="Default Password" value="12345">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="admin_name" class="form-control" placeholder="Enter Admin Full Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Department</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="admin_dept" class="form-control" placeholder="Enter Admin Department Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            

                                            <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Contact</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="admin_contact" class="form-control" placeholder="Enter Admin Phone Number" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Define </label>
                                                        <div class="col-sm-9">
                                    <select class="form-control" name="admin_st" required>
                                                 <option value="" disabled selected>Select Data</option>
                                                <option value="carpool" >Admin Car Pool</option>
                                                <option value="room" >Admin Room Booking</option>
                                                <option value="car_room" >Admin Car & Room (Both)</option>
                                                <option value="super">Super Admin</option>

                                    </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>                                            

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Image</label>
                                                        <div class="col-sm-9">
                                    <input name="admin_img" type="file" class="form-control file-upload-info" placeholder="Upload Image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" required>
                                        <p style="color:red;">Resolution 300*250 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">
                                                            <img id="preview" alt="Image Not Selected" width="100" height="100" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                               

                                               
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Admin Registration</button>
                                                    <button class="btn btn-light btn-block btn-rounded ">Reset</button>
                                                    
                                                   <a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
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
    </body>

    </html>

    <?php } ?>