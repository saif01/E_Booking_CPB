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

        <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 730 + ',height=' + 680 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                                         <h3 class="panel-title">Hardware Complains Action</h3>
                                     </div>

                                      <div class="panel-body">
                                        <div class="row">
                           

<div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
         <?php 
$hard_id=$_GET['hard_id']; 
// 4 table Join for generate  report         
$query=mysqli_query($con,"SELECT cms_hard_complain.hard_id, cms_hard_complain.user_id, cms_hard_complain.tools, cms_hard_complain.details, cms_hard_complain.documents, cms_hard_complain.status, cms_hard_complain.warrenty, cms_hard_complain.delivery, cms_hard_complain.last_up, cms_hard_complain.reg, cms_hard_category.category, cms_hard_subcategory.subcategory, user.user_name, user.user_dept FROM cms_hard_complain INNER JOIN cms_hard_category ON cms_hard_complain.cat_id=cms_hard_category.cat_id INNER JOIN cms_hard_subcategory ON cms_hard_complain.sub_id=cms_hard_subcategory.sub_id INNER JOIN user ON cms_hard_complain.user_id=user.user_id WHERE cms_hard_complain.hard_id='$hard_id' ");
$row=$query->fetch_assoc();
?>

<!-- Data From 4 table Joining -->
<table class="table">
      <tr>

        <th class="col-md-2">Complain Number:</th>
            <td class="col-md-2 text-center"><?php echo ($row['hard_id']); ?> </td>
                      
        <th class="col-md-2">Category: </th>
             <td class="col-md-2"> <?php echo ($row['category']) ; ?></td>

        <th class="col-md-2">Subcategory: </th>
            <td class="col-md-2"><?php echo ($row['subcategory']); ?></td>

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

      <tr>

        <th class="col-md-2">warrenty Status:</th>
            <td class="col-md-2 text-center">
              <?php
             $ws=$row['warrenty']; 
             if ($ws=='') {
                echo "No warrenty"; 
             }
             elseif ($ws=='s_w') {
                echo "Send warrenty";
             }
             elseif ($ws=='b_w') {
                echo "Back warrenty";
             }
             elseif ($ws=='a_s_w') {
                echo "again send warrenty";
             }
             elseif ($ws=='dm_w') {
                echo "Product Damaged";
             }
             ?>
            </td>
                      
        <th class="col-md-2">Delivery:</th>
             <td class="col-md-2">
            <?php $d_st= $row['delivery'];

            if ($row['status']=='Damaged') {
                echo "Product Damaged";
             }

            elseif ($row['status']=='Closed') {
                echo "Product Closed";
             }
            elseif ($d_st=='') {
              echo "Not Closed";
            }

            elseif ($d_st=='Notdeliverable') {
               echo "Not Deliverable";
            }
            elseif ($d_st=='Deliverable') {
               echo "Deliverable";
            }

            else {
               echo $d_st;
            }?>
             </td>

        <th class="col-md-2">Last Update:</th>
            <td class="col-md-2">
        <?php if ($row['last_up']=='') {
          echo "Not Any Process";
        }
        else{
          echo date("M j, Y, g:i a", strtotime($row['last_up']));
        } ?>
                    
                </td>

      </tr>

      

</table>


<table class="table">

      <tr>

        <th class="col-md-1">File:</th>

            <td class="col-md-1">

        <?php $file= $row['documents']; 
            if($file !='') {

        ?><a href="../pimages/hard/<?php echo ($file); ?>" class="btn btn-info btn-sm" download>File</a><?php 
        }
           else{
               echo "No Files";
         }?> 
            </td>
                      
        <th class="col-md-1">Details: </th>
             <td class="col-md-9"><?php echo ($row['details']) ; ?></td>

      </tr>
      
</table>
<table class="table">
      <tr>
          <th class="col-md-2">Final Status:</th>
          <td class="col-md-2"><span class="badge badge-pill badge-success" style="font-size: 15px;"><?php echo ($row['status']); ?></span></td>

          <th class="col-md-1">Tools:</th>
          <td class="col-md-5"><?php echo ($row['tools']); ?></td>
      </tr>
      
</table>

<!-- Data Fetch from Remarks Table -->
<?php
$queryRem=mysqli_query($con,"SELECT cms_hard_remarks.status, cms_hard_remarks.remarks, cms_hard_remarks.reg, admin.admin_name FROM cms_hard_remarks INNER JOIN admin ON cms_hard_remarks.action_by=admin.admin_id WHERE cms_hard_remarks.hard_id='$hard_id' ORDER BY cms_hard_remarks.hard_rem_id ASC ");
    while($row2=mysqli_fetch_array($queryRem))
    {
?>
<table class="table" style="background: #DCDCDC; ">
   
    <tr>
         <th class="col-md-1">Status</th>
            <td class="col-md-2"><?php echo ($row2['status']); ?></td>
        
        <th class="col-md-1">Time</th>
            <td class="col-md-3"><?php echo date("F j, Y, g:i a", strtotime($row2['reg'])); ?></td>

    </tr>
        <th class="col-md-1">Action By</th>
            <td class="col-md-2"> <?php echo ($row2['admin_name']); ?></td>
       
        <th class="col-md-1">Remarks</th>
            <td class="col-md-8"><?php echo ($row2['remarks']); ?></td>
    </tr>
    

</table>
<?php } ?>
<!-- End Remarks data show-->



<!-- Take Action Part -->
<table class="table">

         <tr>
            <th class="col-md-2">
                    Actions
            </th>
            <td class="col-md-10 text-center">
<?php 
// Complain Closed 
if($row['status'] == 'Closed' && $row['delivery']=='Notdeliverable') {
    echo "Complain Closed";
}
//Complain Closed And Dalivered
elseif($row['status'] == 'Closed' && $row['delivery']=='Delivered') {
    echo "Product Delivered";
}
// Complain Product Damagedd
elseif($row['status'] == 'Damaged') {
    echo "Product Damaged";
}

// Complain Product Damagedd
elseif($row['status'] == 'Closed' && $row['delivery']=='') {
    echo "Complain Closed";
}

// Complain Closed And Product Deliverable
elseif($row['status'] == 'Closed' && $row['delivery']=='Deliverable'){?>

<a href="javascript:void(0);" onClick="popUpWindow('delivery-complain?hard_id=<?php echo ($row['hard_id']); ?>');" title="Update" class="btn btn-danger btn-block btn-rounded"> Take Action </a>

 <?php }



// Show For Warranty Only (Send Warrenty Or Again Send Warrenty)
elseif( ($row['warrenty'] == 's_w' || $row['warrenty'] == 'a_s_w') && $row['last_up'] != ''){?>

<a href="javascript:void(0);" onClick="popUpWindow('update-complain-warrenty?hard_id=<?php echo ($row['hard_id']); ?>');" title="Update" class="btn btn-danger btn-block btn-rounded"> Take Action </a>

 <?php }

 // Show for Second Step action
 elseif( ($row['warrenty'] =='' || $row['warrenty'] =='b_w' ) && $row['last_up'] !='' && $row['status'] =='Processing' ){?>

<a href="javascript:void(0);" onClick="popUpWindow('update-complain2?hard_id=<?php echo ($row['hard_id']); ?>');" title="Update" class="btn btn-danger btn-block btn-rounded"> Take Action </a>

 <?php }

// Show for frist Step
elseif($row['last_up'] ==''){?>

<a href="javascript:void(0);" onClick="popUpWindow('update-complain?hard_id=<?php echo ($row['hard_id']); ?>');" title="Update" class="btn btn-danger btn-block btn-rounded"> Take Action </a>

 <?php } ?>              
            </td>    

         </tr>
</table>                                                                                 
<!-- End Take Action Part -->               
                                              


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