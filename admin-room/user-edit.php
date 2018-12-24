<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-room-login'])==0)
  { 
header('location:login');
}
else{
include('../db/config.php');
$user_id=$_GET['user_id'];

if (isset($_POST['submit'])) {



$user_name=$_POST['user_name'];
$user_dept=$_POST['user_dept'];
$user_number=$_POST['user_number'];



$fileName=$_FILES['user_img']['tmp_name'];

        if ($fileName !=="") 
        {
             $user_id=$_GET['user_id'];
             $sql=mysqli_query($con,"SELECT `user_img` FROM `user` WHERE `user_id`='$user_id' ");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../imgs/user/".$row2['user_img'];
                        unlink($file);
                    }
              
            
             $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['user_img']['name']);

                $storeFile="../imgs/user/".$file_name;
                $fileName=$_FILES['user_img']['tmp_name'];
                move_uploaded_file($fileName,$storeFile);

                           

                $query2=mysqli_query($con,"UPDATE `user` SET `user_name`='$user_name',`user_img`='$file_name',`user_number`='$user_number',`user_dept`='$user_dept' WHERE `user_id`='$user_id'");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('user-all-info', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
       

        } 
            else{

                
                $query=mysqli_query($con,"UPDATE `user` SET `user_name`='$user_name',`user_number`='$user_number',`user_dept`='$user_dept' WHERE `user_id`='$user_id'");

            ?>
            <script>
                alert('Update successfull.  !');
                window.open('user-all-info', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
            }

}

            ?>




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


                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">User Information Update</button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">

<?php 
    // $user_id=$_GET['user_id'];

$query=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id`='$user_id'");

$row=$query->fetch_assoc();

?>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">

                                                        <label class="col-sm-3 col-form-label">User ID  </label>
                                                        <div class="col-sm-9">

                                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['user_login']); ?>" readonly>
                                                

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Contact </label>
                                                        <div class="col-sm-9">
                                        <input type="text" name="user_number" class="form-control" value="<?php echo htmlentities($row['user_number']); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Name </label>
                                                        <div class="col-sm-9">
                                        <input type="text" name="user_name" class="form-control" value="<?php echo htmlentities($row['user_name']); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>


                                           <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"> Department </label>
                                                        <div class="col-sm-9">
                                        <input type="text" name="user_dept" class="form-control" value="<?php echo htmlentities($row['user_dept']); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                             <div class="row">
                                               <!--  <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">User Contarct </label>
                                                        <div class="col-sm-9">
                                        <input type="text" name="user_contract" class="form-control" placeholder="Enter User Office ID"  required>
                                                        </div>
                                                    </div>
                                                </div> -->


                                           <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"> Status </label>
                                                        <div class="col-sm-9">
                                        <?php $st =$row['user_st'];

                                                  if ($st==1) {
                                                    echo "Active";
                                                  }
                                                  else{
                                                    echo "Deactive";
                                                  }?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                            <div class="row">
                                     <div class="col-md-6 ">

                                         <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">User Image</label>
                                        <div class="col-sm-9">
                                    <input type="file"  name="user_img" accept="image/*" class="form-control file-upload-info" onchange="readURL(this);">
                                       <img id="image" src="../imgs/user/<?php echo($row['user_img']);?>" style="height: 80px; width: 80px;" />
                                        <p style="color:red;">Resolution 300*250 pixels</p>
                                        </div>

                                        </div>


                                                                                                                                                                                                                
                                     </div>
                                            <div class="col-md-6 text-center">
                                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">User Info Update </button>
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