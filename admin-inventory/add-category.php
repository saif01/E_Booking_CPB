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

         <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


        <script src="js/modernizr.min.js"></script>

         <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_category.php",
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
                <h3 class="panel-title">Category Add</h3>
            </div>
            <div class="panel-body">


<form class="form-horizontal" action="add-category-action.php" method="post">

	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Category Type</label>
                <div class="col-sm-9">
                  <input type="text" id="check_value" onBlur="userAvailability()" name="category" class="form-control"  placeholder="Enter CPB Hardware Category Type" required>
            	  <span id="user-availability-status1" style="font-size:12px;"></span>
                </div>
            </div>
            
    </div>
    <div class="col-md-6">
    	<div class="col-sm-3 control-label">
            
        </div>
                <div class="col-sm-9">

    	   
<button type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Add Category</button>

           </div>
		
    </div>
    <span class="btn btn-sm btn-warning btn-custom">Check</span>
                    </form>
                    

			</div> <!-- Panel-body -->
            
        </div> <!-- Panel -->
    </div> <!-- col-->
    
</div> <!-- End row -->





<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">C.P.B. All Hardware Categoris</h3>
            </div>
            <div class="panel-body">


 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
       <table id="datatable" class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                              
                                <th>Category</th>
                                <th>Registration Time</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
            <tbody>
<?php 
    $query=mysqli_query($con,"SELECT * FROM `cms_hard_category` ORDER BY `cat_id` DESC");
                
                    while($row=mysqli_fetch_array($query))
                    { ?>
                    <tr>

                    <td>
                 <?php echo htmlentities($row['category']); ?>
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
             <a href="delete-category?Id=<?php echo $row['cat_id']?>"
           title="Delete" id="delete" > <i class="fa fa-trash text-danger" style="font-size: 40px;"></i></a>

<a href="javascript:void(0);" onClick="popUpWindow('edit-category.php?cat_id=<?php echo ($row['cat_id']);?>');" title="Edit"><i class="fa fa-edit text-warning" style="font-size: 40px;"></i> </a>

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
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 780 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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