<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-car-login'])==0)
  { 
header('location:../admin');
}
else{ 
include('../db/config.php');

if (isset($_POST['submit'])) {

$location=$_POST['location'];


$query=mysqli_query($con,"INSERT INTO `location`(`location`) VALUES ('$location')");


?>
    <script>
        alert('Update successfull.  !');
        window.open('location-add', '_self'); //for locating other page.
        //window.location.reload(); //For reload Same page
    </script>
    <?php } ?>

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

        <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_location.php",
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


         <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 480 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
<button class="card-title btn btn-outline btn-block ">Location Add</button>
<form class="form-sample" action="" method="post" >


    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">

                <label class="col-sm-3 col-form-label">Location </label>
                <div class="col-sm-9">

                    <input type="text" id="check_value" onBlur="userAvailability()" name="location" class="form-control" placeholder="Enter User Name" required>
        <span id="user-availability-status1" style="font-size:12px;"></span>
        <span class="btn btn-info btn-sm" style="float: right; margin-top: 1%;" >Check</span>

                </div>
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group row">
                <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Add Location </button> 
            </div>
        </div>

    </div>

                                        </form>




                                    </div>
                                </div>
                        
                                                                             
                            <!--row end-->
                        </div>


                <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                       <!--  <h4 class="card-title">Location</h4> -->
                                                                                   
                                            <table id="example" class="table table-striped table-bordered table-responsive-md table-dark col-lg-12">
                                                <thead>
                                                    <tr>
                                                    
                                                        <th>Location</th>
                                                        <th>Reg. date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
<tbody>
                                                    <?php 
    $query=mysqli_query($con,"SELECT * FROM `location` ORDER BY `location_id` DESC");
    
        while($row=mysqli_fetch_array($query))
        {

?>
                                                    <tr>

                                                   
                                                    <td>
                                                 <?php echo htmlentities($row['location']); ?>
                                                    </td>
                                                    <td>
                                                 <?php echo date("F j, Y, g:i a", strtotime($row['regDate'])); ?> 
                                                    </td>

                                                    <td>
<a href="location-delete?location_id=<?php echo $row['location_id']?>" onClick="return confirm('Are you sure you want to delete???')" title="Delete"> <i class="mdi mdi-close-box-outline text-danger icon-lg"></i></a>
<!-- Edit Location -->
<a href="javascript:void(0);" onClick="popUpWindow('edit-location.php?location_id=<?php echo $row['location_id']?>')" title="Edit"><i class="mdi mdi-pencil-box-outline text-warning icon-lg" style="font-size: 40px;"></i> </a>
                                                     </td>

                                                    </tr>
                                                    <?php } ?>

                                                </tbody>

                                                </table>

                                </div>
                            </div>
                        </div>
                    




                        <!-- content-wrapper-->
                    </div>
                   
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
      <!--********* Data Table js Link *********-->
        <!-- <script type="text/javascript" src="assets/dataTable/libry.js"></script> -->
        <script type="text/javascript" src="../assets/dataTable/tbl.js"></script>
        <script type="text/javascript" src="../assets/dataTable/boots.js"></script>
         
       <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable(
              {
                "order": []
              });
        } );
        </script>


    </body>

    </html>

    <?php } ?>