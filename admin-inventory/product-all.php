<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_inventory'])==0)
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
                                        
                                        <h3 class="panel-title">All Stock Product Reports</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
                                                <table id="datatable" class="table table-striped table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                           
                                                        <th>Category</th>
                                                        <th>Subcategory</th>
                                                        <th>Brand</th>  
                                                        <th>Serial</th>          
                                                        <th>Warranty</th>
                                                        <th>File</th>
                                                        <th>Registration</th>
                                                        <th>Action</th>

                                      
                                                    </tr>
                                                    </thead>

                                             
                                                    <tbody>
        <?php 
      
    $query=mysqli_query($con,"SELECT inv_products.*, cms_hard_category.category, cms_hard_subcategory.subcategory FROM `inv_products` INNER JOIN cms_hard_category ON inv_products.cat_id=cms_hard_category.cat_id INNER JOIN cms_hard_subcategory ON inv_products.sub_id = cms_hard_subcategory.sub_id ORDER BY inv_products.id DESC");

    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>
                                
                                 <td><?php echo $row['category']; ?> </td>
                                 <td><?php echo $row['subcategory']; ?></td>
                                 <td><?php echo $row['brand']; ?></td>
                                 <td><?php echo $row['serial']; ?></td>
                                 <td><?php echo $row['warranty']; ?></td>
                                 <td> 
        <?php $file= $row['file']; 
            if($file !='') {

        ?><a href="../pimages/product_file/<?php echo ($file); ?>" class="btn btn-info btn-sm" download>File</a><?php 
        }
           else{
               echo "No Files";
         }?> 
     </td>
          
        <td><?php echo date("M j, Y", strtotime($row['reg'])); ?></td>

        <td> view</td>
         

                                 
                                 


                                                        
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