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
        <link rel="stylesheet" href="css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />
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
                                        <!-- <h4 class="card-title">All Booked Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">Meeting Room Booking Report</button>
                                        <div class="table-responsive ">
            <table id="example" class="table table-striped table-bordered table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Case No.</th>
                                                        <th>Customer</th>  
                                                        <th>Complaint</th>          
                                                        <th>Filling</th>
                                                        <th>Hearing</th>
                                                        <th>Last Hearing</th>
                                                        <th>Previous</th>
                                                        <th>Present</th>
                                                        <th>Improve</th>
                                                        <th>Department</th>
                                                        <th>Remarks</th>

                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
          <?php 
        $status='Closed';
    $query=mysqli_query($con,"SELECT * FROM `law_report` WHERE `status`='$status' ORDER BY `law_id` DESC");

    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>

                                 <td><?php echo $row['status']; ?></td>
                                 <td><?php echo $row['case_no']; ?></td>
                                 <td><?php echo $row['customer']; ?></td>
                                 <td><?php echo $row['complaint']; ?></td>
          
        <td><?php echo date("M j, Y", strtotime($row['filling'])); ?></td>
         <td><?php echo date("M j, Y", strtotime($row['hearing'])); ?></td>
          <td><?php echo date("M j, Y", strtotime($row['last_hearing'])); ?></td>

                                 <td><?php echo $row['pre_balance']; ?></td>
                                 <td><?php echo $row['pr_balance']; ?></td>
                                 <td><?php echo $row['case_dept']; ?></td>
                                 <td><?php echo $row['case_dept']; ?></td>
                                 <td><?php echo $row['remarks']; ?></td>


                                                        
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
            lengthChange: false,
            "order": [[ 0, 'DESC' ]],
            buttons: [ 'excel', 'colvis' ]
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