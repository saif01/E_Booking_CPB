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
                  <!-- <h4 class="card-title">All Booked Information </h4> -->
                  <button  class="card-title btn btn-outline btn-block ">Login Log Information</button>
                  <div class="table-responsive ">
                    <table id="example" class="table table-striped table-bordered table-responsive-md table-dark" >
                      <thead>
                    <tr>
                    <th>id</th>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>LogIn</th>
                    <th>LogOut</th>
                    <th>User IP</th>
                    <th>User OS</th> 
                    <th>Browser</th>             
                    <th>User Device</th>
                    <th>User Status</th>
               
                  
                </tr>
                      </thead>
                      <tbody>
                       <?php 
    $query=mysqli_query($con,"SELECT * FROM `login_log`");
    while($row=mysqli_fetch_array($query))
    {
 
?>
              <tr>
                <td><?php echo htmlentities($row['log_id']) ; ?></td>
                <td><?php echo htmlentities($row['login_id']) ; ?></td>
                <td><?php echo htmlentities($row['login_name']) ; ?></td>
                <td><?php echo date("M j, Y, g:i a", strtotime($row['login_time'])); ?></td>
                <td>
                <?php
                $logout_time=$row['logout_time'];
                if ($logout_time=='') {
                  echo "Not Log Out";
                }
                else
                {
                  echo date("M j, Y, g:i a", strtotime($row['logout_time']));
                }?>

                </td>
                <td><?php echo htmlentities($row['login_ip']); ?></td>
                <td><?php echo htmlentities($row['login_os']); ?></td>
                <td><?php echo htmlentities($row['login_browser']); ?></td>
                
                <td><?php echo htmlentities($row['login_device']); ?></td>

                <td><?php 
                $st=$row['login_st']; 
                if ($st==1) {
                  echo "Active";
                }else{echo "Deactive";}


                ?></td>
                
                
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
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
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
                    buttons: [ 'excel', 'copy', 'colvis' ]
                });

                table.buttons().container()
                    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
            });
        </script>
</body>
</html>

<?php } ?>