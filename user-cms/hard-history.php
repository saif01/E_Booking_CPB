<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['cms_login_id'])==0)
  { 
header('location:../index');
}
else{   
include('../db/config.php');

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/cpb.ico" type="image/x-icon" />

    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?> 

    <!--*********** Simple Data table CDN ***********************-->
<link rel="stylesheet" type="text/css" href="assets/dataTable/data_table.css">

</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="Syful-IT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <?php require('common/topbar.php') ?>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <?php require('common/logo.php'); ?>
                    
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <?php require('common/navbar.php'); ?>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--==************************* Header Area End ****************************************************************************************************************************==-->


<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container" >
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">

                       <h2>Your Hardware Complain's History</h2>
                        <span class="title-line"><i class="fa fa-chain-broken" aria-hidden="true"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
 <!--== About Page Content Start ==-->
   
        <div class="container" style="margin-top: 20px;">
           
              
          <table id="datatable" class="table table-striped table-bordered table-dark text-center" style="width:100%">

              <thead style="background-color: #1E90FF;">
                <tr>
                  <th>Number</th>                  
                  <th>Type</th>
                  <th>Module</th>
                  <th>Status</th>
                  <th>Register</th>
                  <th>View</th>
              
                </tr>
              </thead>   
              <tbody>
                <?php 



$user_id=$_SESSION['user_id'];
$query=mysqli_query($con,"SELECT cms_hard_complain.hard_id, cms_hard_complain.user_id, cms_hard_complain.tools, cms_hard_complain.details, cms_hard_complain.documents, cms_hard_complain.status, cms_hard_complain.warrenty, cms_hard_complain.delivery, cms_hard_complain.last_up, cms_hard_complain.reg, cms_hard_category.category, cms_hard_subcategory.subcategory, user.user_name, user.user_dept FROM cms_hard_complain INNER JOIN cms_hard_category ON cms_hard_complain.cat_id=cms_hard_category.cat_id INNER JOIN cms_hard_subcategory ON cms_hard_complain.sub_id=cms_hard_subcategory.sub_id INNER JOIN user ON cms_hard_complain.user_id=user.user_id WHERE cms_hard_complain.user_id='$user_id' ORDER BY cms_hard_complain.hard_id DESC");

    while($row=mysqli_fetch_array($query))
    {

?>
            <tr>
                  
<td >
    <span class="badge badge-pill badge-success" style="font-size: 20px;"> <?php echo ($row['hard_id']); ?></span>
    </td>
<td ><?php echo ($row['category']); ?></td>
<td ><?php echo ($row['subcategory']); ?></td>



<td>
<!--Start Status Show  (Process, Warrenty, Dalivery)-->
<?php
$st=$row['status'];
$ws=$row['warrenty']; 

 if($st == 'Closed') {?>
<span class="badge badge-pill badge-danger" style="font-size: 15px;">Closed</span>
    
<?php } 

if($st == 'Processing') {?>
<span class="badge badge-pill badge-warning" style="font-size: 15px;">Processing</span>
    
<?php }

if($st == 'Damaged') {?>
<span class="badge badge-pill badge-danger" style="font-size: 15px;">Damaged</span>
    
<?php }

if($st == 'Not Process') {?>
<span class="badge badge-pill badge-success" style="font-size: 15px;"> Not Process</span>
    
<?php }



             if ($ws=='') {
                
             }
             elseif ($ws=='s_w' || $ws=='a_s_w' || $ws=='b_w') {
    ?>
<span class="badge badge-pill badge-info" style="font-size: 15px;">Warrenty</span>
    <?php
               
             }
            
             
             elseif ($ws=='dm_w') {
 ?>
<span class="badge badge-pill badge-danger" style="font-size: 15px;">Damage</span>
    <?php
              
             }?>
 <!--Start Status Show  (Process, Warrenty, Dalivery)-->   
</td>

<td><?php echo date("F j, Y, g:i a", strtotime($row['reg'])); ?></td>

<td>
<a href="javascript:void(0);" onClick="popUpWindow('har-comp-details?hard_id=<?php echo ($row['hard_id']); ?>');" title="Complain Details" class="btn btn-info" >Details</a> 

  </td>


              </tr>

                <?php } ?>
            
              </tbody>

               
        
    </table>

        
            </div>
    
    <!--== About Page Content End ==-->

   
    <!--== Footer Area Start ==-->
    <section id="footer-area">           
        <?php require('common/footer.php'); ?>     
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="Syful-IT">
    </div>
    <!--== Scroll Top Area End ==-->

   
<!--=======================Javascript============================-->

<!--********* Data Table js Link *********-->
<script type="text/javascript" src="assets/dataTable/libry.js"></script>
<script type="text/javascript" src="assets/dataTable/tbl.js"></script>
<script type="text/javascript" src="assets/dataTable/boots.js"></script>
 
  <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable({
                    "order": []
                 
                });
            } );
   </script>

  
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>   
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>    
    <!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>

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