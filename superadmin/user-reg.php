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

$user_login=$_POST['user_login'];
$user_pass=$_POST['user_pass'];
$user_name=$_POST['user_name'];
$user_dept=$_POST['user_dept'];
$user_contact=$_POST['user_contact'];
$user_office_id=$_POST['user_office_id'];
$user_st_ch=$_POST['user_st_ch'];
$user_st = 1;


$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['user_img']['name']);
    $storeFile="../pimages/user/".$file_name;
    $fileName=$_FILES['user_img']['tmp_name'];

    move_uploaded_file($fileName,$storeFile);

    if ($user_st_ch=='carpool') 
        {   
            $user_car_st='1';
            $user_room_st='0';

            $query=mysqli_query($con,"INSERT INTO `user`(`user_login`, `user_pass`, `user_name`, `user_img`, `user_dept`, `user_contact`, `user_office_id`, `user_st`, `user_car_st`, `user_room_st`) VALUES ('$user_login','$user_pass','$user_name','$file_name','$user_dept','$user_contact','$user_office_id','$user_st','$user_car_st','$user_room_st')");
        ?>
            <script>
                alert('Update successfull.  !');
                window.open('user-all-info', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        }

        elseif ($user_st_ch=='room') 
        {   
            $user_car_st='0';
            $user_room_st='1';

            $query=mysqli_query($con,"INSERT INTO `user`(`user_login`, `user_pass`, `user_name`, `user_img`, `user_dept`, `user_contact`, `user_office_id`, `user_st`, `user_car_st`, `user_room_st`) VALUES ('$user_login','$user_pass','$user_name','$file_name','$user_dept','$user_contact','$user_office_id','$user_st','$user_car_st','$user_room_st')");
        ?>
            <script>

                
                alert('Update successfull.  !');
                window.open('user-all-info', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        }
         elseif ($user_st_ch=='car_room') 
        {   
            $user_car_st='1';
            $user_room_st='1';

            $query=mysqli_query($con,"INSERT INTO `user`(`user_login`, `user_pass`, `user_name`, `user_img`, `user_dept`, `user_contact`, `user_office_id`, `user_st`, `user_car_st`, `user_room_st`) VALUES ('$user_login','$user_pass','$user_name','$file_name','$user_dept','$user_contact','$user_office_id','$user_st','$user_car_st','$user_room_st')");
        ?>
            <script>
                alert('Update successfull.  !');
                window.open('user-all-info', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        }

        else{
            ?>
            <script>
                alert('Error Generated.!!!!!!!!!!');
                
            </script>
            <?php
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
                                        <button class="card-title btn btn-outline btn-block ">User Registration</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">User ID  </label>
                                                        <div class="col-sm-9">
                                                            
                                                            <input type="text" id="check_value" onBlur="userAvailability()" name="user_login" class="form-control" placeholder="Enter User Name" required>
                                                <span id="user-availability-status1" style="font-size:12px;"></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="user_pass" class="form-control" placeholder="Default Password" value="12345">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                             <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="user_name" class="form-control" placeholder="Enter User Full Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Contact</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="user_contact" class="form-control" placeholder="Enter User Phone Number" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Department</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="user_dept" class="form-control" placeholder="Enter User Department Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Office ID </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="user_office_id" class="form-control" placeholder="Enter User Office ID" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Image</label>
                                                        <div class="col-sm-9">
                                    <input name="user_img" type="file" class="form-control file-upload-info" placeholder="Upload Image" onchange="readURL(this);" required>
                                        <p style="color:red;">Resolution 250*300 pixels</p>

                                        <img id="image" src="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Define </label>
                                                        <div class="col-sm-9">
                                    <select class="form-control" name="user_st_ch" required>
                                                 <option value="" disabled selected>Select Data</option>
                                                <option value="carpool">Car Pool</option>
                                                <option value="room" >Room Booking</option>
                                                <option value="car_room" >Car Pool & Room Booking (Both)</option>
                                               

                                    </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>

                                           
                                               

                                               
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">User Registration </button>

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

<!-- Sweet Alert CDN Link -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js'"></script>



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