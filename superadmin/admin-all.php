<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
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
         <!--Excel DataTables -->
  <!--   <link href="assets/datatables/excel/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/excel/buttons.dataTables.min.css" rel="stylesheet" type="text/css" /> -->

    <style type="text/css">
        img {
          border: 1px solid #0000CD;
          border-radius: 10%;
          margin: 0 auto;
          padding: 2px;
          width: 80px;
          height: 80px;
        }

        img:hover {
          box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }

       #datatable i{
            font-size: 40px;
        }
    </style>      
        
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
                                      <a href="admin-reg" class="btn btn-sm btn-info" style="float: right;">Add New</a>
                                        <h3 class="panel-title">All Admin Information</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
            <table id="datatable" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                    <th>Actions</th>                                                        
                    <th>Legal</th>
                    <th>Car </th>
                    <th>Room </th>
                    <th>Hard.</th>
                    <th>App.</th>
                    <th>Super </th>                    
                    <th>Image</th>
                    <th>LogIn Id</th>
                    <th>Name</th>
                    <th>Department</th>
                               
                </tr>
                </thead>

         
                <tbody>
   <?php 
    $query=mysqli_query($con,"SELECT * FROM `admin` ORDER BY `admin_id` DESC");
    while($row=mysqli_fetch_array($query))
    { ?>
                  <tr>
                                

                <td>

  <a href="admin-delete.php?admin_id=<?php echo $row['admin_id']?>" id="delete" title="Delete"> <i class="fa fa-trash text-danger" ></i></a>

  <a href="admin-edit?admin_id=<?php echo ($row['admin_id']);?>" title="Edit"
><i class="fa fa-edit text-warning"></i> </a>
                            <?php
//************* Admin Bolck/Unblock Section                                               
         if($row['admin_st']=='1')
         {?>
<a href="admin-status.php?h_admin_id=<?php echo ($row['admin_id']);?>" id="hide" title="Hide"> <i class="fa fa-eye text-success" ></i></a>
            
        <?php } else {?>

<a href="admin-status.php?s_admin_id=<?php echo ($row['admin_id']);?>" id="show" title="Show"> <i class="fa fa-eye-slash text-danger"></i></a>           <?php } 

          ?>
          

                        </td>

                         <td>
                  <?php
//************** Legal OR law Status Show ****************//
         if($row['admin_law_st']==1)
         {?>
<a href="admin-status.php?h_admin_law_id=<?php echo ($row['admin_id']);?>" id="remove" title="Hide"> <i class="fa fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="admin-status.php?s_admin_law_id=<?php echo ($row['admin_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td>
                        
                        <td>
                  <?php
//************** Car Pool Status Show ****************//
         if($row['admin_car_st']==1)
         {?>
<a href="admin-status.php?h_admin_car_id=<?php echo ($row['admin_id']);?>" id="remove" title="Hide"><i class="fa fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="admin-status.php?s_admin_car_id=<?php echo ($row['admin_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td>

                        <td>
                  <?php
//************** Room Booking Status Show ****************//
         if($row['admin_room_st']==1)
         {?>
<a href="admin-status.php?h_admin_room_id=<?php echo ($row['admin_id']);?>" id="remove" title="Hide"><i class="fa  fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="admin-status.php?s_admin_room_id=<?php echo ($row['admin_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                      </td>
                       <td>
                  <?php
//************** Hardware Admin Status Show ****************//
         if($row['admin_hard_st']==1)
         {?>
<a href="admin-status.php?h_admin_hard_id=<?php echo ($row['admin_id']);?>" id="remove" title="Hide"><i class="fa  fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="admin-status.php?s_admin_hard_id=<?php echo ($row['admin_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td>

                         <td>
                  <?php
//************** Application Admin Status Show ****************//
         if($row['admin_app_st']==1)
         {?>
<a href="admin-status.php?h_admin_app_id=<?php echo ($row['admin_id']);?>" id="remove" title="Hide"><i class="fa  fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="admin-status.php?s_admin_app_id=<?php echo ($row['admin_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td> 


   						         <td>
                  <?php
//************** Super Admin Status Show ****************//
         if($row['admin_super_st']==1)
         {?>
<a href="admin-status.php?h_admin_super_id=<?php echo ($row['admin_id']);?>" id="remove" title="Hide"><i class="fa  fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="admin-status.php?s_admin_super_id=<?php echo ($row['admin_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td>                        

                        

                        <td>
<a href="javascript:void(0);" onClick="popUpWindow('admin-profile.php?admin_id=<?php echo $row['admin_id'];?>');" title="View User Info."><img src="../pimages/admin/<?php echo $row['admin_img'];?>" class="img-responsive" alt="Image" style=" max-width:60%;" /> </a>
                        </td>

                         <td>
                            <?php echo ($row['admin_login']); ?>
                        </td>

                        <td>
                            <?php echo ($row['admin_name']); ?>
                        </td>
                       
                        <td>
                            <?php echo ($row['admin_dept']); ?>
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
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 780 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
</script>  

  
 <!-- sweet alerts -->
        <script src="assets/sweet-alert/coustom_swalert_saif.js"></script>

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
                  title: "Are you Want to Block This Admin?",
                  text: "If Block !!, Admin Can't Login !",
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
         $(document).on("click", "#show", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to UnBlock This Admin?",
                  text: "If UnBlock !!, Admin Can Login !",
                  icon: "success",
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

<!--****************  Admin Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#give", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Give This Access ???",
                  text: "If  Give !,This Admin Can Get This Access !",
                  icon: "success",
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

<script>  
         $(document).on("click", "#remove", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Remove This Access ???",
                  text: "If Removed !!, This Admin Can't Get This Access  !",
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