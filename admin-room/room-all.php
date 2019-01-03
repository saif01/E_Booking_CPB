<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-room-login'])==0)
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
        <title>CPB.RoomBooking</title>
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

        <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 780 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                                        <!-- <h4 class="card-title">All Car Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">All Room Information</button>

                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
                                                <thead>
                                                    <tr>
                                                    	<th>Image</th>
                                                        <th>Room</th>
                                                        <th>Capacity</th>
                                                        <th>Details</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
	$query=mysqli_query($con,"SELECT * FROM `room` ORDER BY `room_id` DESC");
    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>

                                                        <td>
                                       
                                        <img src="../pimages/room/<?php echo($row['room_img1']);?>" class="img-responsive" alt="Car Img" />
                                                        </td>

                                                        <td class="center">

                                         <?php echo htmlentities($row['room_name']) ; ?> 
                                                        </td>
                                                        <td class="center">
                                         <?php echo htmlentities($row['room_capicity']); ?>
                                                        </td>
                                                        
                                                        <td class="center">
                                         <?php echo htmlentities($row['room_details']); ?>
                                                        </td>
                                                        

                                                        <td class="center">
                                                            <?php
                                         if($row['show_st']==1)
                                         {?>
                                            <a href="room-status.php?h_room_id=<?php echo htmlentities($row['room_id']);?>" title="Hide" id="hide"> <i class="mdi mdi-eye text-success icon-lg"></i></a>

                                            
                                        <?php } else {?>

                                            <a href="room-status.php?s_room_id=<?php echo htmlentities($row['room_id']);?>" title="Show" id="show"> <i class="mdi mdi-eye-off text-danger icon-lg"></i></a> 
                                            <?php } ?>
                                          
                  									</td>
                  									<td>
                  

                  <a href="room-edit?room_id=<?php echo htmlentities($row['room_id']);?>" title="Edit"
                    >
                    <i class="mdi mdi-pencil-box-outline text-warning icon-lg"></i>  
                  </a>

                <a href="room-delete.php?room_id=<?php echo $row['room_id']?>" title="Delete" id="delete" > <i class="mdi mdi-close-box-outline text-danger icon-lg"></i></a>
                                                                
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
                  title: "Are you Want to Hide This Room?",
                  text: "If Hide !!, Youser Can't Book This Room !",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Nothing Change!");
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
                  title: "Are you Want to Show This User?",
                  text: "If Show !!, Youser Can Book This Room !",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Nothing Change!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->
    </body>

    </html>

    <?php } ?>