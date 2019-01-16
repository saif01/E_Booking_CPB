<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin/index');
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
        <link rel="icon" type="img/png" href="img/logo.png" />
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
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">


                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">All User Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">All Admin Information</button>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
                                                <thead>
                                                    <tr>

                                                        <th>Actions</th>
                                                        <th>Legal</th>
                                                        <th>Car pool</th>
                                                        <th>Room </th>
                                                        <th>Super </th>
                                                        <th>Img</th>
                                                        <th>Department</th>
                                                        

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
		$query=mysqli_query($con,"SELECT * FROM `admin` ORDER BY `admin_id` DESC");
    while($row=mysqli_fetch_array($query))
    {

?>
                <tr>
                        <td>
                          
<a href="admin-delete.php?admin_id=<?php echo $row['admin_id']?>" id="delete" title="Delete"> <i class="mdi mdi-close-box-outline text-danger icon-lg"></i></a>

<a href="admin-edit?admin_id=<?php echo htmlentities($row['admin_id']);?>" title="Edit"><i class="mdi mdi-pencil-box-outline text-warning icon-lg"></i>  </a>


          <?php
                        if($row['admin_st']==1)
                               {?>
<a href="admin-status.php?h_admin_id=<?php echo htmlentities($row['admin_id']);?>" id="hide" title="Hide"> <i class="mdi mdi-eye text-success icon-lg"></i></a>
                                  
                              <?php } else {?>

<a href="admin-status.php?s_admin_id=<?php echo htmlentities($row['admin_id']);?>" id="show" title="Show"> <i class="mdi mdi-eye-off text-danger icon-lg"></i></a>
                                  <?php } ?>


                                                      
                      </td>
                      <td>
<!--****************  Legal Admin Change Part *********************-->
                        <?php
                        if ($row['admin_law_st']=='1') 
                        { ?>
                            
<a href="admin-status.php?h_law_ad_id=<?php echo htmlentities($row['admin_id']);?>" id="remove" title="Hide"> <i class="mdi mdi-check-all text-success icon-lg"></i></a>
                            <?php
                         }
                         else{
                           ?>
<a href="admin-status.php?s_law_ad_id=<?php echo htmlentities($row['admin_id']);?>" id="give" title="Show"> <i class="mdi mdi-close text-danger icon-lg"></i></a>

                           <?php
                         }

                         ?>
                    </td>

                    <td>
<!--****************  Car Booking Admin Change Part *********************-->
                        <?php
                        if ($row['admin_car_st']=='1') 
                        { ?>
                            
<a href="admin-status.php?h_car_ad_id=<?php echo htmlentities($row['admin_id']);?>" id="remove" title="Hide"> <i class="mdi mdi-check-all text-success icon-lg"></i></a>
                            <?php
                         }
                         else{
                           ?>
<a href="admin-status.php?s_car_ad_id=<?php echo htmlentities($row['admin_id']);?>" id="give" title="Show"> <i class="mdi mdi-close text-danger icon-lg"></i></a>

                           <?php
                         }

                         ?>
                    </td>

                    <td>
<!--****************   Room Booking Admin Change Part *********************-->
                        <?php
                        if ($row['admin_room_st']=='1') {
                            ?>
<a href="admin-status.php?h_room_ad_id=<?php echo htmlentities($row['admin_id']);?>" id="remove" title="Hide"> <i class="mdi mdi-check-all text-success icon-lg"></i></a>
                           <?php
                         }
                         else{
                           ?>
<a href="admin-status.php?s_room_ad_id=<?php echo htmlentities($row['admin_id']);?>" id="give" title="Show"> <i class="mdi mdi-close text-danger icon-lg"></i></a>
                           <?php
                         }?>
                    </td>

                     <td>
<!--****************   Super Admin Change Part *********************-->
                        <?php
                        if ($row['admin_super_st']=='1') {
                            ?>
<a href="admin-status.php?h_super_ad_id=<?php echo htmlentities($row['admin_id']);?>" id="remove" title="Hide"> <i class="mdi mdi-check-all text-success icon-lg"></i></a>
                            <?php
                         }
                         else
                         {?>
<a href="admin-status.php?s_super_ad_id=<?php echo htmlentities($row['admin_id']);?>" id="give" title="Show"> <i class="mdi mdi-close text-danger icon-lg"></i></a>
                      <?php
                    }?>
                    </td>


                    <td>
<a href="javascript:void(0);" onClick="popUpWindow('admin-access-profile.php?admin_id=<?php echo $row['admin_id'];?>');" title="View Admin Info."><img src="../pimages/admin/<?php echo $row['admin_img'];?>" class="img-responsive" alt="Image" /> <?php echo $row['admin_name']; ?></a>

                    </td>
                   
                    <td>
                        <?php echo htmlentities($row['admin_dept']); ?>
                    </td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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
        

        <!--********* Data Table js Link *********-->
        <!-- <script type="text/javascript" src="assets/dataTable/libry.js"></script> -->
        <script type="text/javascript" src="../assets/dataTable/tbl.js"></script>
        <script type="text/javascript" src="../assets/dataTable/boots.js"></script>
         
        <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>


         <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 580 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
            }
        </script>


 <!-- Sweet Alert CDN Link -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js'"></script>
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

<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#hide", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Block This Admin?",
                  text: "If Block !!, Admin Can't Login !",
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

<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#show", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to UnBlock This Admin?",
                  text: "If UnBlock !!, Admin Can Login !",
                  icon: "success",
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


<!--****************  Admin Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#give", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Give This Access ???",
                  text: "If  Give !,This User Can Get This Access !",
                  icon: "success",
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

<script>  
         $(document).on("click", "#remove", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Remove This Access ???",
                  text: "If Removed !!, This User Can't Get This Access  !",
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