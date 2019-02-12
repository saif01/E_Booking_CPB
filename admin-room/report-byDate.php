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
        <?php include('common/icon.php'); ?>
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <?php include('common/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <?php include('common/sidebar.php'); ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
						<div class="row">

                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="card-title btn btn-outline btn-block ">Report Show By Date</button>

                                        <form action="" method="post">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Start Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="Date" name="start_date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Car</label>
                                                        <div class="col-sm-9">
                            <select name="room_id" class="form-control">
                              <option value="pick"> Select Car </option>
<?php
                $query2=mysqli_query($con,"SELECT `room_id`, `room_name` FROM `room`");
            while ($row2 = mysqli_fetch_array($query2))
            {
echo "<option value='". $row2['room_id'] ."'>" .$row2['room_name'] ."</option>" ;
}
?>
                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">




                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">End Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="Date" name="end_date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">

                                                            <button type="submit" name="submit" class="btn btn-info btn-block btn-rounded">View Report</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>
                            <div class="table-responsive ">
<?php 
if(isset($_POST['submit']))
{
     $start_date= $_POST['start_date'];
     $end_date=$_POST['end_date'];
     $room_id=$_POST['room_id'];


?>

            <table id="example" class="table table-striped table-bordered table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Room</th>
                                                        <th>Booking</th>  
                                                        <th>Purpose</th>          
                                                        <th>Hours</th>
                                                        <th>Use Name</th>
                                                        <th>Department</th>
                                                        <th>Status</th>
                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
    $query=mysqli_query($con,"SELECT room_booking.r_booking_id, room_booking.booking_start, room_booking.booking_end, room_booking.purpose, room_booking.hours, room_booking.booking_st, room_booking.user_id, room.room_name, user.user_name, user.user_dept FROM room_booking INNER JOIN room ON room_booking.room_id=room.room_id INNER JOIN user ON room_booking.user_id=user.user_id WHERE room_booking.room_id='$room_id' AND room_booking.booking_start >= '$start_date' AND room_booking.booking_end <= '$end_date' ");

    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>

                                <td><?php echo $row['r_booking_id']; ?> </td>
                                 <td><?php echo $row['room_name']; ?></td>
          
                                 <td><?php echo date("M j, Y", strtotime($row['booking_start'])); ?>
                                </td>
                                 <td><?php echo $row['purpose']; ?></td>
                                 <td><?php echo $row['hours']; ?></td>
                                 <td><?php echo $row['user_name']; ?></td>
                                 <td><?php echo $row['user_dept']; ?></td>

                                <td class="center">
                                        <?php
                                            if ($row['booking_st']=='1') {
                                                echo "Ok";
                                                }
                                            else{
                                                echo "Canceled";
                                                    }?>
                                                             
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>


                                            <?php } ?>
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
<!--*************** For Data Table PDF Xcel JS ****************-->       
 <script src="../assets/table_adv/js/dataTables.min.js"></script>
 <script src="../assets/table_adv/js/dataTables.bootstrap4.min.js"></script>
 <script src="../assets/table_adv/js/dataTables.buttons.min.js"></script>
 <script src="../assets/table_adv/js/buttons.bootstrap4.min.js"></script>
 <script src="../assets/table_adv/js/jszip.min.js"></script>
 <script src="../assets/table_adv/js/pdfmake.min.js"></script>
 <script src="../assets/table_adv/js/vfs_fonts.js"></script>
 <script src="../assets/table_adv/js/buttons.html5.min.js"></script>
 <script src="../assets/table_adv/js/buttons.print.min.js"></script>
 <script src="../assets/table_adv/js/buttons.colVis.min.js"></script>




        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#example').DataTable({
                     "order": [],
                    lengthChange: false,
                    buttons: [ 'excel', 'pdf', 'colvis' ]
                });

                table.buttons().container()
                    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
            });
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

    </body>

    </html>

    <?php } ?>