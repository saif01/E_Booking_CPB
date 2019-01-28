<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-room-login'])==0)
  { 
header('location:../admin');
}
else{  
include('../db/config.php');
$room_id=$_GET['room_id'];
 
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

                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">Meeting Room Update Form </button>
<form class="form-sample" action="room-edit-action.php?room_id=<?php echo $room_id; ?>" method="post" enctype="multipart/form-data">

    <div class="row">
<?php 
$query=mysqli_query($con,"SELECT * FROM `room` WHERE `room_id`='$room_id' ");
$row=$query->fetch_assoc();
        
?>                             
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Room Number </label>
                <div class="col-sm-9">
                    <input type="text" name="room_name" class="form-control" value="<?php echo $row['room_name']; ?>" readonly/>

    
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Room Capacity </label>
                <div class="col-sm-9">
                    <input type="Number" name="room_capicity" class="form-control"  value="<?php echo $row['room_capicity']; ?>" required />
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Room Details:</label>
                <div class="col-sm-9">

                    <textarea type="text" name="room_details" class="form-control" rows="3" required><?php echo $row['room_details']; ?></textarea> 

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
                    <input name="room_img1" type="file" class="form-control"onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" />
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
                    <input name="room_img3" type="file" class="form-control" onchange="document.getElementById('preview3').src = window.URL.createObjectURL(this.files[0])" />
                    <p style="color:red;">Resolution 1280*800 pixels</p>
                </div>
            </div>
        </div>
    </div>

     <div class="row">

        <div class="col-md-4">
            <div class="col-md-10">
                <div class="row">        
            <h4 style="margin-left: 17%;">Old </h4>
            <h4  style="margin-left: 38%;">New </h4>
                </div>
                <!-- <p class="float-left" >Old</p> -->
            <img src="../pimages/room/<?php echo htmlentities($row['room_img1']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
            
           <img id="preview1" alt="Image Not Selected" class="rounded float-right" width="100" height="100" />
           <!--  <p class="float-right">New</p> -->
            </div>
           
          
        </div>
        <div class="col-md-4">
            <div class="col-md-10">
                <div class="row">        
            <h4 style="margin-left: 17%;">Old </h4>
            <h4  style="margin-left: 38%;">New </h4>
                </div>
               <!--  <p class="float-left" >Old</p> -->
               
            <img src="../pimages/room/<?php echo htmlentities($row['room_img2']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
            
            <img id="preview2" alt="Image Not Selected" class="rounded float-right" width="100" height="100" />
           <!--  <p class="float-right">New</p> -->
       
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="col-md-10">
                <div class="row">        
            <h4 style="margin-left: 17%;">Old </h4>
            <h4  style="margin-left: 38%;">New </h4>
                </div>
               <!--  <p class="float-left" >Old</p> -->
            <img src="../pimages/room/<?php echo htmlentities($row['room_img3']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
            
            <img id="preview3" alt="Image Not Selected" class="rounded float-right" width="100" height="100" />
           <!--  <p class="float-right">New</p> -->
            </div>
        </div>

    </div>

   
    <hr>

    <div class="row">
        <div class="col-12 text-center">
            <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Room Information Update</button>
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
<!--************************ FOR IMAGE SHOW WHEN SELECETED *******************  -->
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image1')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<!--************************ FOR IMAGE SHOW WHEN SELECETED *******************  -->
<!--************************ FOR IMAGE SHOW WHEN SELECETED *******************  -->
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image2')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<!--************************ FOR IMAGE SHOW WHEN SELECETED *******************  -->
<!--************************ FOR IMAGE SHOW WHEN SELECETED *******************  -->
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image3')
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