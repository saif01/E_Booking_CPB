<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-law-login'])==0)
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
        <link rel="shortcut icon" href="images/favicon.png" />

        <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availabe_dept.php",
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
                                        <button class="card-title btn btn-outline btn-block ">Case Department Add</button>
    <form class="form-sample" action="case-dept-add-action.php" method="post" >


        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">

                    <label class="col-sm-3 col-form-label">Department </label>
                    <div class="col-sm-9">

                        <input type="text" id="check_value" onBlur="userAvailability()" name="department" class="form-control" placeholder="Enter User Name" required>
            <span id="user-availability-status1" style="font-size:12px;"></span>

                    </div>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group row">
                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Add Department </button> 
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
                              
                                <th>Department</th>
                                <th>Reg. date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
            <tbody>
            <?php 
                $query=mysqli_query($con,"SELECT * FROM `case_dept`");
                
                    while($row=mysqli_fetch_array($query))
                    { ?>
                    <tr>

                    <td>
                 <?php echo htmlentities($row['department']); ?>
                    </td>
                   
                    <td>
                 <?php echo date("F j, Y", strtotime($row['reg'])); ?> 
                    </td>

                    <td>
                    <a href="case-dept-delete?deleteId=<?php echo $row['dept_id']?>" title="Delete" id="delete"> <i class="mdi mdi-close-box-outline text-danger icon-lg"></i></a></td>

                    </tr>
                    <?php } ?>

                </tbody>

                </table>

                                </div>
                            </div>
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
      <!--********* Data Table js Link *********-->
        <!-- <script type="text/javascript" src="assets/dataTable/libry.js"></script> -->
        <script type="text/javascript" src="../assets/dataTable/tbl.js"></script>
        <script type="text/javascript" src="../assets/dataTable/boots.js"></script>
         
        <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>

         <!-- Sweet Alert CDN Link -->
<script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->

    </body>

    </html>

    <?php } ?>