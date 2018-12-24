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

        <!-- Sweet Alert CDN Link -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js'"></script>

        <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 580 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">


                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <!--  <h4 class="card-title">All User Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">All User Information</button>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Department</th>
                                                        <th>Phone</th>
                                                        <th>Car Pool</th>
                                                        <th>Room Booking</th>
                                                       <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
        $query=mysqli_query($con," SELECT * FROM `user`");
        while($row=mysqli_fetch_array($query))
        {

?>
                                                    <tr>

                                                        <td>
                                        <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?user_id=<?php echo htmlentities($row['user_id']);?>');" title="View User Info.">
                                        <img src="../pimages/user/<?php echo($row['user_img']);?>" class="img-responsive" alt="Image" /> </td></a>
                                                        <td>
                                            <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?user_id=<?php echo htmlentities($row['user_id']);?>');" title="View User Info.">
                                                <?php echo htmlentities($row['user_name']) ; ?></a>
                                                        </td>
                                                        <td class="center">
                                                            <?php echo htmlentities($row['user_dept']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['user_contact']); ?>
                                                        </td>
                                                        <td>
                                                  <?php
          //************** Car Pool Status Show ****************//
                                         if($row['user_car_st']==1)
                                         {?>
  <a href="user-status.php?h_user_car_id=<?php echo htmlentities($row['user_id']);?>" id="hidecar" title="Hide"> <i class="mdi mdi-check-all text-success icon-lg"></i></a>
                                            
                                        <?php } else {?>

  <a href="user-status.php?s_user_car_id=<?php echo htmlentities($row['user_id']);?>" id="showcar" title="Show"> <i class="mdi mdi-close text-danger icon-lg"></i></a> 
                                            <?php } ?>

                                                        </td>

                                                        <td>
                                                  <?php
          //************** Room Booking Status Show ****************//
                                         if($row['user_room_st']==1)
                                         {?>
  <a href="user-status.php?h_user_room_id=<?php echo htmlentities($row['user_id']);?>" id="hideroom" title="Hide"> <i class="mdi mdi-check-all text-success icon-lg"></i></a>
                                            
                                        <?php } else {?>

  <a href="user-status.php?s_user_room_id=<?php echo htmlentities($row['user_id']);?>" id="showroom" title="Show"> <i class="mdi mdi-close text-danger icon-lg"></i></a> 
                                            <?php } ?>

                                                        </td>

                                                        <td class="center">
                                                            <?php
        //************* User Bolck/Unblock Section *********************//                                                
                                         if($row['user_st']==1)
                                         {?>
<a href="user-status.php?h_user_id=<?php echo htmlentities($row['user_id']);?>" id="hide" title="Hide"> <i class="mdi mdi-eye text-success icon-lg"></i></a>
                                            
                                        <?php } else {?>

<a href="user-status.php?s_user_id=<?php echo htmlentities($row['user_id']);?>" id="show" title="Show"> <i class="mdi mdi-eye-off text-danger icon-lg"></i></a> 
                                            <?php } ?>
                                          

<a href="user-edit?user_id=<?php echo htmlentities($row['user_id']);?>" title="Edit"
  ><i class="mdi mdi-pencil-box-outline text-warning icon-lg"></i> </a>
                                    
<a href="user-delete.php?user_id=<?php echo $row['user_id']?>" id="delete" title="Delete"> <i class="mdi mdi-close-box-outline text-danger icon-lg"></i></a>

                                                            
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

<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#hide", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Block This User?",
                  text: "If Block !!, Youser Can't Login !",
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
                  title: "Are you Want to UnBlock This User?",
                  text: "If UnBlock !!, Youser Can Login !",
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

<!--**************** CAr Booking Admin Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#showcar", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Give User CarPool Access ???",
                  text: "If Make CarPool User !,This User Can Get CarPool Access !",
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
         $(document).on("click", "#hidecar", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Remove User CarPool Access ???",
                  text: "If Removed !!, This User Can't Get CarPool Access  !",
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
<!--**************** Romm Booking Admin Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#showroom", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Give User Room Booking Access ???",
                  text: "If Make Room Booking User !,This User Can Get Room Booking Access !",
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
         $(document).on("click", "#hideroom", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Remove Room Booking User Access ???",
                  text: "If Removed !!, This User Can't Get Room Booking Access !",
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