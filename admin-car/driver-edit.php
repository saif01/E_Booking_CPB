<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-car-login'])==0)
  { 
header('location:../admin');
}
else{ 
$driver_id=$_GET['driver_id'];
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
        <?php include('common/icon.php'); ?>

       

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
                                        <button class="card-title btn btn-outline btn-block ">Driver Update Form</button>

<form class="form-sample" action="driver-edit-action.php?driver_id=<?php echo $driver_id; ?>" method="post" enctype="multipart/form-data">

<?php 
                                        
$query=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' ");

$row=$query->fetch_assoc();

?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">Driver Name </label>
                                                        <div class="col-sm-9">

                                                            <input type="text" id="check_value" onBlur="userAvailability()" name="driver_name" class="form-control" value="<?php echo htmlentities($row['driver_name']); ?>" readonly>

                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver License</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_license" class="form-control" placeholder="Enter Driver License" value="<?php echo htmlentities($row['driver_license']); ?>" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver Contract</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_phone" class="form-control" placeholder="Enter Driver Phone Number" value="<?php echo htmlentities($row['driver_phone']); ?>" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Driver NID</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="driver_nid" class="form-control" placeholder="Enter Driver NID" value="<?php echo htmlentities($row['driver_nid']); ?>" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                     <div class="col-md-6 ">
                                        <table class="table">
                                            <thead>

                                                <tr>
                                                    <th >Old Img </th>
                                                      <th >New Img </th>
                                                      <th >Select Img </th>
                                                
                                                </tr>
                                                
                                            </thead>
                                            
                                            <tbody>

                                                <td><img src="../pimages/driver/<?php echo($row['driver_img']);?>" class="img-responsive" alt="Image" height="100" width="100" >   </td>

                                                <td> <img id="preview" alt="Not Selected" width="100" height="100" /> </td>

                                                <td>  <input type="file" style="float: right;" name="driver_img" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">  </td>
                                                
                                                

                                            </tbody>

                                        </table>                                               
                                                                                                                                                                                                                
                                     </div>
                                            <div class="col-md-6 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Driver Info Update </button>
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