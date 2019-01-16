<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-law-login'])==0)
  { 
header('location:../admin/index');
}
else{
include('../db/config.php');
$notice_id=$_GET['notice_id'];

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
            <form class="form-sample" action="notice-edit-action.php?notice_id=<?php echo $notice_id ; ?>" method="post" enctype="multipart/form-data">

<?php 
 
$query=mysqli_query($con,"SELECT * FROM `legal_notice` WHERE `notice_id`='$notice_id'");

$row=$query->fetch_assoc();

?>

        <div class="row">
<div class="col-md-6">
<div class="form-group row">

    <label class="col-sm-3 col-form-label">Subject</label>
    <div class="col-sm-9">
        
        <input type="text" id="check_value" onBlur="userAvailability()" name="subject" class="form-control"  value="<?php echo($row[subject]); ?>" required>
<span id="user-availability-status1" style="font-size:12px;"></span>

    </div>
</div>
</div>
<div class="col-md-6">
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Notice Type</label>
    <div class="col-sm-9">
        <select name="type" class="form-control" required>
            <option value="Normal">Normal</option>
            <option value="Important">Important</option>
            
        </select>
    
    </div>
 </div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Description</label>
    <div class="col-sm-9">
    	<textarea type="text" name="details" class="form-control" ><?php echo($row[details]); ?></textarea>
         
    </div>
</div>
</div>

<div class="col-md-6">
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

        <td><img src="../pimages/notice/<?php echo($row['photo']);?>" class="img-responsive" alt="Image" height="100" width="100" >   </td>

        <td> <img id="preview" alt="Not Selected" width="100" height="100" /> </td>

        <td>  <input type="file" style="float: right;" name="photo" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">  </td>
        
        

    </tbody>

</table>                                               
                                                                                                                                                                                                
                     </div>
                            <div class="col-md-6 text-center">
                                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Notice Info Update </button>
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
    </body>

    </html>

    <?php } ?>