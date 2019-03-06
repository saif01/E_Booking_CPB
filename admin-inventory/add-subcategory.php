<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_inventory'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');

// For Applications
$category = '';
$query = "SELECT * FROM `cms_hard_category` ORDER BY `category`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $category .= '<option value="'.$row["cat_id"].'">'.$row["category"].'</option>';
}

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

         <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


        <script src="js/modernizr.min.js"></script>

         <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availabe_module.php",
                    data: 'check_value=' + $("#check_value").val(),
                    type: "POST",
                    success: function(data) {
                        $("#user-availability-status1").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
        
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

                        <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Hardware Subcategories Add</h3>
            </div>
            <div class="panel-body">


<form class="form-horizontal" action="add-subcategory-action.php" method="post">

	<div class="col-md-6">
    	<div class="form-group">
                <label class="col-sm-3 control-label">Subcategory</label>
                <div class="col-sm-9">
                  <input type="text" id="check_value" onBlur="userAvailability()" name="subcategory" class="form-control"  placeholder="Enter CPB Hardware Subcategory Name" required>
            	  <span id="user-availability-status1" style="font-size:12px;"></span>
                  <span class="btn btn-sm btn-warning btn-custom" style="float: right; margin: 3px;">Check</span>
                </div>
            </div>


    </div>
	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Category</label>
                <div class="col-sm-9">
                	<select class="form-control" name="cat_id" required="required">
                		<option value="" disabled selected>Select Category</option>
                		<?php echo $category; ?>
                	</select>
                  
                </div>
            </div>
            
    </div>
    

    <div class="col-md-12">         
       <div class="form-group m-b-0">    
<button type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Hit To Add Subcategory</button>

           </div>
    </div>
    

    
                    </form>

			</div> <!-- Panel-body -->
            
        </div> <!-- Panel -->
    </div> <!-- col-->
    
</div> <!-- End row -->





<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">All C.P.B. Hardware Subcategories</h3>
            </div>
            <div class="panel-body">


 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
       <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Registration Time</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </tsr>
                        </thead>
            <tbody>
<?php 
    $query=mysqli_query($con,"SELECT cms_hard_subcategory.sub_id, cms_hard_subcategory.subcategory, cms_hard_subcategory.reg, cms_hard_subcategory.last_up, cms_hard_category.category FROM cms_hard_subcategory INNER JOIN cms_hard_category ON cms_hard_subcategory.cat_id=cms_hard_category.cat_id ORDER BY cms_hard_subcategory.sub_id DESC");
    
        while($row=mysqli_fetch_array($query))
        { ?>
                <tr>

                    <td>
                 <?php echo ($row['category']); ?>
                    </td>
                    <td>
                 <?php echo ($row['subcategory']); ?>
                    </td>
                   
                    <td>
                 <?php echo date("F j, Y g:i a", strtotime($row['reg'])); ?> 
                    </td>
                    <td>

                 <?php
                 if ($row['last_up'] =='') {
                    echo "No Update";
                 }else{
                    echo date("F j, Y g:i a", strtotime($row['last_up'])); 
                 }?> 
                    </td>

                    <td>
             <a href="delete-subcategory?Id=<?php echo $row['sub_id']?>"
           title="Delete" id="delete" > <i class="fa fa-trash text-danger" style="font-size: 40px;"></i></a>

           <a href="javascript:void(0);" onClick="popUpWindow('edit-subcategory.php?sub_id=<?php echo ($row['sub_id']);?>');" title="Edit"><i class="fa fa-edit text-warning" style="font-size: 40px;"></i> </a>
                    </td>

                </tr>
                    <?php } ?>

                </tbody>

                </table>
            </div>





			</div> <!-- Panel-body -->
            
        </div> <!-- Panel -->
    </div> <!-- col-->
    
</div> <!-- End row -->
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
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
    </script>  

  <!-- Sweet Alert CDN Link -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

   
    
    </body>
</html>

<?php } ?>