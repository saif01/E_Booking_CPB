<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin/index');
}
else{ 

include('../db/config.php');
$room_id=$_GET['room_id'];
 

if (isset($_POST['submit'])) {

$room_capicity=$_POST['room_capicity'];
$room_details=$_POST['room_details'];

$fileName1=$_FILES['room_img1']['tmp_name'];
$fileName2=$_FILES['room_img2']['tmp_name'];
$fileName3=$_FILES['room_img3']['tmp_name'];

        if ($fileName1 !=="" && $fileName2 !=="" && $fileName3 !=="") 
        {
             
             $sql=mysqli_query($con,"SELECT `room_img1`, `room_img2`, `room_img3` FROM `room` WHERE `room_id`='$room_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/room/".$row2['car_img1'];
                        unlink($file);
                        $file="../pimages/room/".$row2['car_img2'];
                        unlink($file);
                        $file="../pimages/room/".$row2['car_img3'];
                        unlink($file);
                    }
              


                $file_name1=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img1']['name']);
                $storeFile1="../pimages/room/".$file_name1;
                $fileName1=$_FILES['room_img1']['tmp_name'];
                move_uploaded_file($fileName1,$storeFile1);

                $file_name2=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img2']['name']);
                $storeFile2="../pimages/room/".$file_name2;
                $fileName2=$_FILES['room_img2']['tmp_name'];
                move_uploaded_file($fileName2,$storeFile2);

                $file_name3=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img3']['name']);
                $storeFile3="../pimages/room/".$file_name3;
                $fileName3=$_FILES['room_img3']['tmp_name'];
                move_uploaded_file($fileName3,$storeFile3);

                           
                $query2=mysqli_query($con,"UPDATE `room` SET `room_img1`='$file_name1',`room_img2`='$file_name2',`room_img3`='$file_name3',`room_capicity`='$room_capicity',`room_details`='$room_details' WHERE `room_id`='$room_id' ");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('room-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
                 } 

                 elseif ($fileName1 !=="") 
            {
            
             $sql=mysqli_query($con,"SELECT `room_img1` FROM `room` WHERE `room_id`='$room_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/room/".$row2['room_img1'];
                        unlink($file);
                    }
                         
             $file_name1=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img1']['name']);

                $storeFile1="../pimages/room/".$file_name1;
                $fileName1=$_FILES['room_img1']['tmp_name'];
                move_uploaded_file($fileName1,$storeFile1);

                           

                $query2=mysqli_query($con,"UPDATE `room` SET `room_img1`='$file_name1',`room_capicity`='$room_capicity',`room_details`='$room_details' WHERE `room_id`='$room_id' ");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('room-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
                 } 

                 elseif ($fileName2 !=="") 
             {
             
             $sql=mysqli_query($con,"SELECT `room_img2` FROM `room` WHERE `room_id`='$room_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/room/".$row2['room_img2'];
                        unlink($file);
                    }
                      
              $file_name2=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img2']['name']);
                $storeFile2="../pimages/room/".$file_name2;
                $fileName2=$_FILES['room_img2']['tmp_name'];
                move_uploaded_file($fileName2,$storeFile2);

                           

                $query2=mysqli_query($con,"UPDATE `room` SET `room_img2`='$file_name2',`room_capicity`='$room_capicity',`room_details`='$room_details' WHERE `room_id`='$room_id' ");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('room-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
                 } 

                 elseif ($fileName3 !=="") 
            {
             
             $sql=mysqli_query($con,"SELECT `room_img3` FROM `room` WHERE `room_id`='$room_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/room/".$row2['room_img3'];
                        unlink($file);
                    }
              
            
             $file_name3=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img3']['name']);
                $storeFile3="../pimages/room/".$file_name3;
                $fileName3=$_FILES['room_img3']['tmp_name'];
                move_uploaded_file($fileName3,$storeFile3);
                           

                $query2=mysqli_query($con,"UPDATE `room` SET `room_img3`='$file_name3',`room_capicity`='$room_capicity',`room_details`='$room_details' WHERE `room_id`='$room_id'");

                ?>
            <script>
                alert('Update successfull.  !');
                window.open('room-all', '_self'); //for locating other page.
                //window.location.reload(); //For reload Same page
            </script>
            <?php
        
                 } 

            else{
  
                $query=mysqli_query($con,"UPDATE `room` SET `room_capicity`='$room_capicity',`room_details`='$room_details' WHERE `room_id`='$room_id'");

            ?>
            <script>
                alert( 'Update successfull.  !');
                window.open('room-all', '_self'); //for locating other page.
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
                        <div class="row">

                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Car Add Form</h4> -->
                                        <button class="card-title btn btn-outline btn-block ">Meeting Room Add Form </button>
                                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">

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
                                                

                                                <div class="col-md-9">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Room Details:</label>
                                                        <div class="col-sm-9">

                                                            <textarea type="text" name="room_details" class="form-control" rows="3" required><?php echo $row['room_details']; ?></textarea> 

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