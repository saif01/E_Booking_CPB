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

         <!--  for Mini Preview -->
        <link href="../assets/mini_preview/jquery.minipreview.css" rel="stylesheet" type="text/css" />


        <!-- <script src="js/modernizr.min.js"></script> -->

        <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 580 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
            }
        </script>

        <style type="text/css">
            .f_btn{
               /* margin-left: -40px;*/
               float: left;
            }

            .p_btn{
                margin-left:15px;
                float: center;
            }

            .f_dn{
                float: center;
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
                                         <h3 class="panel-title">Application Complains Action</h3>
                                     </div>

                                      <div class="panel-body">
                                        <div class="row">
                           

<div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
                                                                                                 
                                              
         <?php 

 $app_id=$_GET['app_id'];        

// 4 table Join for generate  report         
$query=mysqli_query($con,"SELECT cms_app_complain.app_id, cms_app_complain.user_id, cms_app_complain.com_details, cms_app_complain.document1, cms_app_complain.document2, cms_app_complain.document3, cms_app_complain.document4, cms_app_complain.status, cms_app_complain.reg, cms_app_complain.last_up, cms_app_soft.soft_name, cms_app_module.mod_name ,user.user_name, user.user_dept FROM cms_app_complain INNER JOIN cms_app_soft ON cms_app_complain.soft_id=cms_app_soft.soft_id INNER JOIN cms_app_module ON cms_app_complain.mod_id=cms_app_module.mod_id INNER JOIN user ON cms_app_complain.user_id=user.user_id WHERE cms_app_complain.app_id='$app_id' ");
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


      <?php 

            $file1= $row['document1'];
            $file2= $row['document2'];
            $file3= $row['document3'];
            $file4= $row['document4']; 

        //File 1 extension
            $file1= $row['document1']; 
            $info1 = pathinfo($file1);
            $ext1= $info1["extension"];

        //File 2 extension
            $file2 = $row['document2']; 
            $info2 = pathinfo($file2);
            $ext2 = $info2["extension"];

        //File 3 extension
            $file3= $row['document3']; 
            $info3 = pathinfo($file3);
            $ext3= $info3["extension"];

        //File 4 extension
            $file4= $row['document4']; 
            $info4 = pathinfo($file4);
            $ext4= $info4["extension"];

  ?>

      <tr> 


  

        <th class="col-md-1">File:</th>

       
<!-- File One  -->
            
        <?php  
            if($file1 !='') {?>

    
        <td class="col-md-2"  
<?php 
if ( $ext1 == "jpg" || $ext1 == "png" || $ext1 == "JPG" || $ext1 == "PNG" ) { echo " id='min_preview' "; } ?> >


    <?php

        if ( $ext1 == "jpg" || $ext1 == "png" || $ext1 == "JPG" || $ext1 == "PNG" ) { ?>

        <a href="../pimages/app/<?php echo ($file1); ?>" class="btn btn-info btn-sm f_btn" download>File-1</a>

        <button type="button" class="btn btn-success btn-sm p_btn" onClick=window.open("preview?file=<?php echo ($file1);?>","Ratting","width=850,height=570,top=80,toolbar=0,status=0,"); > <i class="fa fa-search"></i> Preview 1</button>
        

          
       <?php }
       // Only Preview Show for other File
        else{?>

        <a href="../pimages/app/<?php echo ($file2); ?>" class="btn btn-danger btn-sm f_dn"  download="download"><i class="fa fa-download" ></i> Download</a>

        <?php } ?> </td>


       <?php  }


// File two

        if($file2 !='') {?>

        <td class="col-md-2"  
<?php 
if ( $ext2 == "jpg" || $ext2 == "png" || $ext2 == "JPG" || $ext2 == "PNG" ) { echo " id='min_preview' "; } ?> >


    <?php

        if ( $ext2 == "jpg" || $ext2 == "png" || $ext2 == "JPG" || $ext2 == "PNG" ) { ?>

        <a href="../pimages/app/<?php echo ($file2); ?>" class="btn btn-info btn-sm f_btn" download>File-1</a>

        <button type="button" class="btn btn-success btn-sm p_btn" onClick=window.open("preview?file=<?php echo ($file2);?>","Ratting","width=850,height=570,top=80,toolbar=0,status=0,"); > <i class="fa fa-search"></i> Preview 2</button>
        

          
       <?php }
       // Only Preview Show for other File
        else{?>

        <a href="../pimages/app/<?php echo ($file2); ?>" class="btn btn-danger btn-sm f_dn"  download="download"><i class="fa fa-download" ></i> Download</a>

        <?php } ?> </td>


       <?php  }


 if($file3 !='') {?>

        <td class="col-md-2"  
<?php 
if ( $ext3 == "jpg" || $ext3 == "png" || $ext3 == "JPG" || $ext3 == "PNG" ) { echo " id='min_preview' "; } ?> >


    <?php

        if ( $ext3 == "jpg" || $ext3 == "png" || $ext3 == "JPG" || $ext3 == "PNG" ) { ?>

        <a href="../pimages/app/<?php echo ($file3); ?>" class="btn btn-info btn-sm f_btn" download>File-1</a>

        <button type="button" class="btn btn-success btn-sm p_btn" onClick=window.open("preview?file=<?php echo ($file3);?>","Ratting","width=850,height=570,top=80,toolbar=0,status=0,"); > <i class="fa fa-search"></i> Preview 3</button>
        

          
       <?php }
       // Only Preview Show for other File
        else{?>

        <a href="../pimages/app/<?php echo ($file3); ?>" class="btn btn-danger btn-sm f_dn"  download="download"><i class="fa fa-download" ></i> Download</a>

        <?php } ?> </td>


       <?php  }


         if($file4 !='') {?>

        <td class="col-md-2"  
<?php 
if ( $ext4 == "jpg" || $ext4 == "png" || $ext4 == "JPG" || $ext4 == "PNG" ) { echo " id='min_preview' "; } ?> >


    <?php

        if ( $ext4 == "jpg" || $ext4 == "png" || $ext4 == "JPG" || $ext4 == "PNG" ) { ?>

        <a href="../pimages/app/<?php echo ($file4); ?>" class="btn btn-info btn-sm f_btn" download>File-1</a>

        <button type="button" class="btn btn-success btn-sm p_btn" onClick=window.open("preview?file=<?php echo ($file4);?>","Ratting","width=850,height=570,top=80,toolbar=0,status=0,"); > <i class="fa fa-search"></i> Preview 4</button>
        

          
       <?php }
       // Only Preview Show for other File
        else{?>

        <a href="../pimages/app/<?php echo ($file4); ?>" class="btn btn-danger btn-sm f_dn"  download="download"><i class="fa fa-download" ></i> Download</a>

        <?php } ?> </td>

         
        <?php }


        if ($file1=='' && $file2=='' && $file3=='' && $file1 =='' )
        {?>
                <td class="col-md-10" >
                    Document Not Send .....
                </td>

  <?php }?> 
          
                      
      </tr>
</table>
<table class="table">
     <tr>
        <th class="col-md-1">Details: </th>
             <td class="col-md-11"><?php echo ($row['com_details']) ; ?></td>
          
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
<a href="javascript:void(0);" onClick="popUpWindow('update-complain?app_id=<?php echo ($row['app_id']); ?>');" title="Update" class="btn btn-danger btn-block btn-rounded"><i class="fa fa-external-link"></i> Take Action </a>
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
        <!-- for Mini preview js -->
        <script src="../assets/mini_preview/jquery.minipreview.js"></script>
        
        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>


     <script type="text/javascript">
    // FOr Preview  
       $('#min_preview a').miniPreview({
              width: 140,
              height: 150,
              scale: .25,
              prefetch: 'pageload'
             });
     </script>

   
    
    </body>
</html>

<?php } ?>