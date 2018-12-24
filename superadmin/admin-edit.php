<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin/index');
}
else{ 
include('../db/config.php');

$admin_id=$_GET['admin_id'];

if (isset($_POST['submit'])) {

$admin_name = $_POST['admin_name'];
$admin_dept = $_POST['admin_dept'];
$admin_contact =$_POST['admin_contact'];


//$admin_st_ch = $_POST['admin_st'];

$fileName=$_FILES['admin_img']['tmp_name'];

        if ($fileName !=="") 
        {
        // ******** Delete Img File From Folder ********//
            $sql=mysqli_query($con,"SELECT `admin_img` FROM `admin` WHERE `admin_id`='$admin_id' ");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/admin/".$row2['admin_img'];
                        unlink($file);
                    }
        //******** Store Img On Folder ****************//
          $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['admin_img']['name']);
            $storeFile="../pimages/admin/".$file_name;
            $fileName=$_FILES['admin_img']['tmp_name'];

            move_uploaded_file($fileName,$storeFile);
        //******** Store value on Data Base *************//
             $admin_st='1';
            $query=mysqli_query($con,"UPDATE `admin` SET `admin_name`='$admin_name',`admin_img`='$file_name',`admin_dept`='$admin_dept',`admin_contact`='$admin_contact',`admin_st`='$admin_st' WHERE `admin_id`='$admin_id'");

                 ?>
                <script>
                    alert('Update successfull.!!!');
                    window.open('admin-all.php', '_self'); //for locating other page.
                    //window.location.reload(); //For reload Same page
                </script>
                <?php
               exit();
            }

           

            else{
                
                $admin_st='1';

               $query=mysqli_query($con,"UPDATE `admin` SET `admin_name`='$admin_name',`admin_dept`='$admin_dept',`admin_contact`='$admin_contact',`admin_st`='$admin_st' WHERE `admin_id`='$admin_id'");


                ?>
                <script>
                    alert('Update successfull !');
                    window.open('admin-all.php', '_self'); //for locating other page.
                    //window.location.reload(); //For reload Same page
                </script>
                <?php
               exit();
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
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">

            <?php
            $adminSQL=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_id`='$admin_id'");
            $row=$adminSQL->fetch_assoc();

            ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                            <label class="col-sm-3 col-form-label">Admin LogIn ID </label>
                                                        <div class="col-sm-9">

                                             <input type="text" name="admin_login" class="form-control" value="<?php echo $row['admin_login']; ?>"  readonly>
                                                

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Contact</label>
                                                        <div class="col-sm-9">
                                            <input type="text" name="admin_contact" class="form-control" value="<?php echo $row['admin_contact']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="admin_name" class="form-control" value="<?php echo $row['admin_name']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Department</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" name="admin_dept" class="form-control" value="<?php echo $row['admin_dept']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            

                                           

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Admin Image</label>
                                                        <div class="col-sm-9">
                                    <input name="admin_img" type="file" class="form-control file-upload-info"  onchange="readURL(this);">
                                        <p style="color:red;">Resolution 300*250 pixels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">
                    <img id="image" src="../pimages/admin/<?php echo($row['admin_img']);?>" style="height: 80px; width: 80px;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                               

                                               
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Admin Information Update</button>
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