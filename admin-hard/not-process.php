<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_hard_login'])==0)
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

          <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        
        
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
                                      
                                        <h3 class="panel-title">All Not Processing Complains Reports</h3>

                                    </div>

                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
                                                <table id="datatable" class="table table-striped table-bordered text-center">
                                                    <thead>
                                                    <tr>
                                                
		                                                  <th>Number</th>
		                                                  <th>Category</th>
		                                                  <th>Subcategory</th>
		                                                  <th>User</th>
		                                                  <th>Department</th>
		                                                 <th>Actions</th>

                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
         <?php 


// 4 table Join for generate  report         
$query=mysqli_query($con,"SELECT cms_hard_complain.hard_id, cms_hard_complain.user_id, cms_hard_complain.tools, cms_hard_complain.details, cms_hard_complain.documents, cms_hard_complain.status, cms_hard_complain.warrenty, cms_hard_complain.delivery, cms_hard_complain.last_up, cms_hard_complain.reg, cms_hard_category.category, cms_hard_subcategory.subcategory, user.user_name, user.user_dept FROM cms_hard_complain INNER JOIN cms_hard_category ON cms_hard_complain.cat_id=cms_hard_category.cat_id INNER JOIN cms_hard_subcategory ON cms_hard_complain.sub_id=cms_hard_subcategory.sub_id INNER JOIN user ON cms_hard_complain.user_id=user.user_id WHERE cms_hard_complain.status='Not Process' ORDER BY cms_hard_complain.hard_id DESC");


while($row=mysqli_fetch_array($query))
{

?>
                                              <tr>

                       <td>
<span class="badge badge-pill badge-success" style="font-size: 20px;"> <?php echo ($row['hard_id']); ?></span>                                  
              		  </td>
                      <td>
          
              <?php echo ($row['category']) ; ?>
                      </td>
                      
                      <td>
               <?php echo ($row['subcategory']); ?>
                      </td>
                      <td>
<a href="javascript:void(0);" onClick="popUpWindow('user-profile?user_id=<?php echo ($row['user_id']); ?>');" title="User Details"><?php echo ($row['user_name']); ?></a>
                      </td>
                       <td>
               <?php echo ($row['user_dept']); ?>
                      </td>

                       <td>
                                                     
          
       <!--   Edit   -->                                   
        <a href="action.php?hard_id=<?php echo $row['hard_id']?>" 
           title="Action">  <span class="btn btn-danger"><i class="fa fa-edit text-success"></i> Action</span> </a>
       

                                                      
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

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable({
                	"order": []
                });
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