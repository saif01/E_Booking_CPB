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

        <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 580 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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

                        <!-- Start Widget -->
                        <div class="row">

                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <h3 class="panel-title">Application Complains Action</h3>
                                     </div>

                                      <div class="panel-body">
                                        <div class="row">
                           

<div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
                                                                                                 
                                              
         <?php 

 $app_id=$_GET['app_id'];        

// 4 table Join for generate  report         
$query=mysqli_query($con,"SELECT cms_app_complain.app_id, cms_app_complain.user_id, cms_app_complain.com_details, cms_app_complain.file, cms_app_complain.status, cms_app_complain.reg, cms_app_complain.last_up, cms_app_soft.soft_name, cms_app_module.mod_name ,user.user_name, user.user_dept FROM cms_app_complain INNER JOIN cms_app_soft ON cms_app_complain.soft_id=cms_app_soft.soft_id INNER JOIN cms_app_module ON cms_app_complain.mod_id=cms_app_module.mod_id INNER JOIN user ON cms_app_complain.user_id=user.user_id WHERE cms_app_complain.app_id='$app_id' ");
$row=$query->fetch_assoc();


?>

<!-- Data From 4 table Joining -->
<table class="table">
      <tr>

        <th class="col-md-2">Complain Number:</th>
            <td class="col-md-2 text-center"><?php echo ($row['app_id']); ?> </td>
                      
        <th class="col-md-2">Software: </th>
             <td class="col-md-2"> <?php echo ($row['soft_name']) ; ?></td>

        <th class="col-md-2">Module: </th>
            <td class="col-md-2"><?php echo ($row['mod_name']); ?></td>

      </tr>

       <tr>

        <th class="col-md-2">User Name:</th>
            <td class="col-md-2 text-center">
<a href="javascript:void(0);" onClick="popUpWindow('user-profile?user_id=<?php echo ($row['user_id']); ?>');" title="User Details"><?php echo ($row['user_name']); ?></a>
            </td>
                      
        <th class="col-md-2">Department:</th>
             <td class="col-md-2"> <?php echo ($row['user_dept']) ; ?></td>

        <th class="col-md-2">Complain Register:</th>
            <td class="col-md-2">
        <?php echo date("M j, Y, g:i a", strtotime($row['reg'])); ?>
                    
                </td>

      </tr>

      

</table>


<table class="table">

      <tr>

        <th class="col-md-1">File:</th>

            <td class="col-md-1">

        <?php $file= $row['file']; 
            if($file !='') {

        ?><a href="../pimages/app/<?php echo ($file); ?>" class="btn btn-info btn-sm" download>File</a><?php 
        }
           else{
               echo "No Files";
         }?> 
            </td>
                      
        <th class="col-md-1">Details: </th>
             <td class="col-md-9"><?php echo ($row['com_details']) ; ?></td>

      </tr>
      
</table>
<table class="table">
      <tr>
          <th class="col-md-2">Final Status:</th>
          <td class="col-md-10"><span class="badge badge-pill badge-success" style="font-size: 15px;"><?php echo ($row['status']); ?></span></td>
      </tr>
</table>

<!-- Data Fetch from Remarks Table -->
<?php
$queryRem=mysqli_query($con,"SELECT cms_app_remarks.status, cms_app_remarks.remarks, cms_app_remarks.rem_reg, admin.admin_name FROM cms_app_remarks INNER JOIN admin ON cms_app_remarks.action_by=admin.admin_id WHERE cms_app_remarks.app_id='$app_id' ORDER BY cms_app_remarks.app_rem_id ASC");
    while($row2=mysqli_fetch_array($queryRem))
    {
?>
<table class="table">
    <tr>
        <th class="col-md-1">Status</th>
            <td class="col-md-2"><?php echo ($row2['status']); ?></td>
        <th class="col-md-1">Remarks</th>
            <td class="col-md-8"><?php echo ($row2['remarks']); ?></td>
    </tr>
    <tr>
        <th class="col-md-1">Action By</th>
            <td class="col-md-2"> <?php echo ($row2['admin_name']); ?></td>
        <th class="col-md-1">Time</th>
            <td class="col-md-8"><?php echo date("F j, Y, g:i a", strtotime($row2['rem_reg'])); ?></td>
    </tr>
    


</table>
<?php } ?>



<!-- Data From 4 table Joining -->
<table class="table">

         <tr>
            <th class="col-md-2">
                    Actions
            </th>
            <td class="col-md-10 text-center">
<?php 
if($row['status'] == 'Closed') {
    echo "Complain Closed";
}
else{

?>
<a href="javascript:void(0);" onClick="popUpWindow('update-complain?app_id=<?php echo ($row['app_id']); ?>');" title="Update" class="btn btn-danger btn-block btn-rounded"> Take Action </a>
 <?php } ?>              
            </td>    

         </tr>
</table>

                                            </div>                            

                               
                                 </div>
                            <!--  Row End-->


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


    

   
    
    </body>
</html>

<?php } ?>