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
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="syful.cse.bd@gmail.com">
        <meta name="author" content="Saif">

        <link rel="shortcut icon" href="images/cpb.png">

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
                                        <a href="report_add" class="btn btn-success btn-sm pull-right" >Add New</a>
                                        <h3 class="panel-title">All Legal Reports</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           
                                                        <th>Status</th>
                                                        <th>Case No.</th>
                                                        <th>Customer</th>  
                                                        <th>Complaint</th>          
                                                        <th>Filling</th>
                                                        <th>Hearing</th>
                                                        <th>Last Hearing</th>
                                                        <th>Previous</th>
                                                        <th>Present</th>
                                                        <th>Fees</th>
                                                        <th>Department</th>
                                                        <th>Remarks</th>

                                      
                                                    </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        <?php 
      
    $query=mysqli_query($con,"SELECT * FROM `law_report` ORDER BY `law_id` DESC");

    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>
                                
                                 <td><?php echo $row['status']; ?> </td>
                                 <td><?php echo $row['case_no']; ?></td>
                                 <td><?php echo $row['customer']; ?></td>
                                 <td><?php echo $row['complaint']; ?></td>
          
                                <td>
                                    <?php            
                                if ($row['filling']=='') 
                                {
                                    echo "No Data";
                                }
                                else
                                {
                                  echo date("M j, Y", strtotime($row['filling']));    
                                 }?>
                                    
                                </td>
                                 <td>
                                    <?php            
                                if ($row['hearing']=='') 
                                {
                                    echo "No Data";
                                }
                                else
                                {
                                  echo date("M j, Y", strtotime($row['hearing']));    
                                 }?>
                                </td>
                                  <td>
                                     <?php            
                                if ($row['last_hearing']=='') 
                                {
                                    echo "No Data";
                                }
                                else
                                {
                                  echo date("M j, Y", strtotime($row['last_hearing']));    
                                 }?>

                                </td>

                                 <td><?php echo $row['pre_balance']; ?></td>
                                 <td><?php echo $row['pr_balance']; ?></td>
                                 <td><?php echo $row['law_fees']; ?></td> 
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

        <!-- <script src="assets/datatables/jquery.dataTables.min.js"></script> -->
        <!-- <script src="assets/datatables/dataTables.bootstrap.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script> -->

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




       
   
    
    </body>
</html>

<?php } ?>