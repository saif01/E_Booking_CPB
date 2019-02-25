<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_app_login'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="syful.cse.bd@gmail.com">
        <meta name="author" content="Saif">

        <?php include('common/icon.php'); ?>

        <?php include('common/title.php'); ?>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect --> 
        <link href="css/waves-effect.css" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>

           <!--Excel DataTables -->
    <link href="assets/datatables/excel/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/excel/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

        
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <?php include('common/navbar.php'); ?>
            <!-- Top Bar End -->


           <!-- Left Sidebar Start --> 

            <?php include('common/sidebar.php'); ?>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Start Widget -->
                        <div class="row">
                           

                             <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      
                                        <h3 class="panel-title">All Closed Complains Reports</h3>

                                    </div>

                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
                                                <table id="datatable" class="table table-striped table-bordered text-center">
                                                    <thead>
                                                    <tr>
                                                
		                                                  <th>Number</th>
		                                                  <th>Software</th>
		                                                  <th>Module</th>
		                                                  <th>User</th>
		                                                  <th>Dept.</th>
		                                                  <th>Days</th>
		                                                  <th>Registration</th>
		                                                  <th>Close</th>
                                                          <th>View</th>
		                                                 

                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
         <?php 

// 4 table Join for generate  report         
$query=mysqli_query($con,"SELECT cms_app_complain.app_id, cms_app_complain.user_id, cms_app_complain.com_details, cms_app_complain.reg, cms_app_complain.last_up, cms_app_soft.soft_name, cms_app_module.mod_name ,user.user_name, user.user_dept FROM cms_app_complain INNER JOIN cms_app_soft ON cms_app_complain.soft_id=cms_app_soft.soft_id INNER JOIN cms_app_module ON cms_app_complain.mod_id=cms_app_module.mod_id INNER JOIN user ON cms_app_complain.user_id=user.user_id WHERE cms_app_complain.status='Closed' ORDER BY cms_app_complain.app_id DESC");
while($row=mysqli_fetch_array($query))
{

 //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($row['last_up']);
        $ts2    =   strtotime($row['reg']);
        $seconds    = abs($ts1 - $ts2); # difference will always be positive
        $days = round($seconds/(60*60*24));


?>
                                              <tr>

                       <td>
<span class="badge badge-pill badge-success" style="font-size: 20px;"> <?php echo ($row['app_id']); ?></span>                                  
              		  </td>
                      <td>
          
              <?php echo ($row['soft_name']) ; ?>
                      </td>
                      
                      <td>
               <?php echo ($row['mod_name']); ?>
                      </td>
                      <td>
<a href="javascript:void(0);" onClick="popUpWindow('user-profile?user_id=<?php echo ($row['user_id']); ?>');" title="User Details"><?php echo ($row['user_name']); ?></a> 
       
                      </td>
                       <td>
               <?php echo ($row['user_dept']); ?>
                      </td>

                      <td>
               <?php echo $days; ?>
                      </td>
                      
                       <td>                                        
           	  <?php echo date("M j, Y, g:i a", strtotime($row['reg'])); ?>
                        </td>
                        <td>                                        
           	  <?php echo date("M j, Y, g:i a", strtotime($row['last_up'])); ?>
                        </td>
                        <td>
       <!--   Edit   -->                           
<a href="action.php?app_id=<?php echo $row['app_id']?>" title="Action">  <span class="btn btn-warning"><i class="fa fa-edit text-success"></i> Details</span> </a>                                      
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
                        

                            
                        </div> <!-- end row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    <?php include('common/footer.php') ?>
                </footer>

            </div>
          


            

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>
        <script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>

        

       <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>
<!--*************** For Data Table  EXcel JS ****************--> 
        <script src="assets/datatables/excel/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/excel/dataTables.buttons.min.js"></script>
        <script src="assets/datatables/excel/jszip.min.js"></script> 
        <script src="assets/datatables/excel/buttons.html5.min.js"></script>        
 
 


<script type="text/javascript">
    
    $(document).ready( function() {
    $('#datatable').DataTable( {
        "order": [],
        dom: 'Bfrtip',
        buttons: [ {
            extend: 'excelHtml5',
            customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
 
                $('row c[r^="C"]', sheet).attr( 's', '1' );
            }
        } ]
    } );
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
   
    </body>
</html>

<?php } ?>