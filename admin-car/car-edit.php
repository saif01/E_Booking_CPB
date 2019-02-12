<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-car-login'])==0)
  { 
header('location:../admin');
}
else{  

include('../db/config.php');

$car_id=$_GET['car_id'];
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
                                        <button class="card-title btn btn-outline btn-block ">Car Edit Form</button>
<form class="form-sample" action="car-edit-action.php?car_id=<?php echo $car_id; ?>" method="post" enctype="multipart/form-data">
                                            <?php 
                                    

$query=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$car_id' ");

$row=$query->fetch_assoc();
 //print_r($row);

                                            ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">Car Name </label>
                                                        <div class="col-sm-9">

                                                            <input type="text" name="car_name" class="form-control" value="<?php echo htmlentities($row['car_name']); ?>" id="typeahead" data-provide="typeahead" data-items="4" data-source='["BMW","Toyota","Suzuki","Mitsubishi","Nissan","Toyota Allion","Toyota Probox","Toyota Noah","Toyota Axio","Toyota Belta","Honda Airwave","Toyota Corolla","Toyota HiAce"]'>
                                                            <p style="color: green;" class="help-block">Start typing to activate auto complete!</p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Number</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="car_namePlate" class="form-control" value="<?php echo htmlentities($row['car_namePlate']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Type</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="car_type" >
                    <option value="<?php echo htmlentities($row['car_type']); ?>"> <?php echo htmlentities($row['car_type']); ?></option>
                  <option value="CNG">CNG</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Diesel">Diesel</option>
                  
                  </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Capacity</label>
                                                        <div class="col-sm-9">
                                                            <input type="Number" name="car_capacity" class="form-control" value="<?php echo htmlentities($row['car_capacity']); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car GearBox</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="car_gearbox">
                              <option value="<?php echo htmlentities($row['car_gearbox']); ?>"> <?php echo htmlentities($row['car_gearbox']); ?></option>
                              <option value="Automatic">Automatic</option>
                              <option value="Manual">Manual</option>
                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Door</label>
                                                        <div class="col-sm-9">

                                                            <input type="Number" name="car_door" class="form-control" value="<?php echo htmlentities($row['car_door']); ?>" />

                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                            <p class="card-description">
                                                Radio Input
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car Aircondition</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_aircondition" id="membershipRadios1" value="1" checked> Yes
                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_aircondition" id="membershipRadios2" value="0"> No
                              </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Power Door Lock</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_power_doorLock" id="membershipRadios1" value="1" checked> Yes
                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_power_doorLock" id="membershipRadios2" value="0"> No
                              </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">CD Player</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_cd_player" id="membershipRadios1" value="1" checked> Yes
                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_cd_player" id="membershipRadios2" value="0"> No
                              </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car GPS</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_gps" id="membershipRadios1" value="1" checked> Yes
                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="car_gps" id="membershipRadios2" value="0"> No
                              </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Car Remarks</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" name="remarks" class="form-control form-control-lg"> <?php echo htmlentities($row['car_remarks']); ?></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    <p class="card-description">
                                                Car Image 
                                            </p>

 

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">First Image :</label>
                                                        <div class="col-sm-9">
                                                            <input name="imgA" type="file" class="form-control" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" />
                                                            <p style="color:red;">Resolution 1280*800 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Second Image :</label>
                                                        <div class="col-sm-9">
                                                            <input name="imgB" type="file" class="form-control" onchange="document.getElementById('preview2').src = window.URL.createObjectURL(this.files[0])" />
                                                            <p style="color:red;">Resolution 1280*800 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Third Image :</label>

                                                        <div class="col-sm-9">
                                                            <input name="imgC" type="file" class="form-control" onchange="document.getElementById('preview3').src = window.URL.createObjectURL(this.files[0])"/>
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
                                                    <img src="../pimages/car/<?php echo htmlentities($row['car_img1']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
                                                    
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
                                                       
                                                    <img src="../pimages/car/<?php echo htmlentities($row['car_img2']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
                                                    
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
                                                    <img src="../pimages/car/<?php echo htmlentities($row['car_img3']); ?>" alt="Old Image" class="rounded float-left" width="100" height="100" />
                                                    
                                                    <img id="preview3" alt="Image Not Selected" class="rounded float-right" width="100" height="100" />
                                                   <!--  <p class="float-right">New</p> -->
                                                    </div>
                                                </div>

                                            </div>

                                           

                                           


                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Car Info Update</button>
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