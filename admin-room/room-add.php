<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-room-login'])==0)
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
        <title>CPB.RoomBooking</title>
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
                    url: "check_room_number.php",
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
                                        <button class="card-title btn btn-outline btn-block ">Room Register Form </button>
            <form class="form-sample" action="room-add-action.php" method="post" enctype="multipart/form-data">

        <div class="row">               
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Room Number </label>
                    <div class="col-sm-9">
                        <input type="text" name="room_name" class="form-control" id="check_value" onBlur="userAvailability()" placeholder="Enter Car Number" required />

                        <span id="user-availability-status1" style="font-size:12px;"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Room Capacity </label>
                    <div class="col-sm-9">
                        <input type="Number" name="room_capicity" class="form-control" placeholder="Enter Room Capacity" required />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Room Details:</label>
                    <div class="col-sm-9">

                        <textarea type="text" name="room_details" class="form-control" rows="3" placeholder="Enter Room Details" required></textarea> 

                    </div>
                </div>
            </div>

             <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Room Type</label>
                    <div class="col-sm-9">
                        <select name="room_type" class="form-control" required>
                            <option value="Meeting">Meeting Room</option>
                            <option value="Residential">Residance Room</option>
                        </select>
                    </div>
                </div>
            </div>

        </div> 

    <div class="row ">               
                <div class="col-md-6 ">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Projector</label>
                    <div class="col-sm-4">
                        <div class="form-radio">
                            <label class="form-check-label">
<input type="radio" class="form-check-input" name="projector" id="membershipRadios1" value="1" checked> Yes
</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-radio">
                            <label class="form-check-label">
<input type="radio" class="form-check-input" name="projector" id="membershipRadios2" value="0"> No
</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
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

        <p class="card-description">
            Room Image
        </p>
        <div class="row">

            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">First Image :</label>
                    <div class="col-sm-9">
                        <input name="room_img1" type="file" class="form-control" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" />
                        <p style="color:red;">Resolution 1280*800 pixels</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Second Image :</label>
                    <div class="col-sm-9">
                        <input name="room_img2" type="file" class="form-control" onchange="document.getElementById('preview2').src = window.URL.createObjectURL(this.files[0])" />
                        <p style="color:red;">Resolution 1280*800 pixels</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Third Image :</label>

                    <div class="col-sm-9">
                        <input name="room_img3" type="file" class="form-control" onchange="document.getElementById('preview3').src = window.URL.createObjectURL(this.files[0])"/>
                        <p style="color:red;">Resolution 1280*800 pixels</p>
                    </div>
                </div>
            </div>
        </div>

         <div class="row">

            <div class="col-md-4">
               
              
               <img id="preview1" alt="Image Not Selected" class="rounded mx-auto d-block" width="100" height="100" />
              
            </div>
            <div class="col-md-4">
                <img id="preview2" alt="Image Not Selected" class="rounded mx-auto d-block" width="100" height="100" />
            </div>
            <div class="col-md-4">
                <img id="preview3" alt="Image Not Selected" class="rounded mx-auto d-block" width="100" height="100" />
            </div>

        </div>

       
        <hr>

        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Room Add</button>
               

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