<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () ); // h=12 hours H=24 hours
if(strlen($_SESSION['car_law_id'])==0)
  { 
header('location:index');
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

                       <h2><?php echo $_GET['dept']; ?> -Department's  Case  History</h2>
                        <span class="title-line"><i class="fa fa-gavel" aria-hidden="true"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
 <!--== About Page Content Start ==-->
   
        <div class="container" style="margin-top: 20px;">
           
              
          <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">

              <thead style="background-color: #912CEE;">
                <tr>
                  <th>Department</th>
                  <th>Case Number</th>
                  <th>Complainant</th>                  
                  <th>Filing Date</th>
                  <th>Last Hearing Date</th>
                  <th>B.L. Balace</th>
                  <th>Present Balace</th>
                   
                </tr>
              </thead>   
              <tbody>
                <?php 
     //$dept="FIT";
        $dept=$_GET['dept'];        
    $query=mysqli_query($con,"SELECT * FROM `law_report` WHERE `show_st`='1' AND `case_dept`='$dept'");

    while($row=mysqli_fetch_array($query))
    {

?>
  <tr>
       
                <td><?php echo $row['case_dept']; ?> </td>
                <td><?php echo $row['case_no']; ?> </td>
                <td><?php echo $row['complaint']; ?> </td>
                
       
                <td><?php echo date("M j, Y", strtotime($row['filling'])); ?></td>

                <td><?php echo date("F j, Y", strtotime($row['last_hearing'])); ?></td>

                <td ><?php echo $row['pre_balance']; ?></td>
                <td ><?php echo $row['pr_balance']; ?></td>
                
                
                


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
    $('#example').dataTable( {
        "order": [[ 0, 'DESC' ]]
    } );
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

    

</body>

</html>

<?php } ?>