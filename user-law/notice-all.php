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

    <!--*********** Simple Data table ***********************-->
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

                       <h2>All Notice History</h2>
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
                <tr class="text-center">
                  <th>Notice Date</th>
                  <th>Notice Subject</th>
                  <th>Details</th>
                
                </tr>
              </thead>   
              <tbody>
                <?php 
    $query=mysqli_query($con,"SELECT * FROM `legal_notice` WHERE `show_st`='1' ORDER BY `notice_id` DESC");

    while($row=mysqli_fetch_array($query))
    {

?>
 			 <tr class="text-center">
       
        
    <td width="30%"><span class="badge badge-info" style="font-size: 20px;"><i class="fa fa-calendar" style="color: #FF4500;" aria-hidden="true"></i> <?php echo date("M j, Y", strtotime($row['reg'])); ?></span></td>
    <td width="50%" ><?php echo $row['subject']; ?> </td>

    <td width="20%">
        <input type="button"  name="view" value="view" notice_id="<?php echo $row["notice_id"]; ?>" class="btn btn-info view_data"/>
    </td>
           
              </tr>

                <?php } ?>
            
              </tbody>

               
        
    </table>

        
            </div>
    
    <!--== About Page Content End ==-->


<!-- Large Model Modal  -->
<div id="dataModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <!-- Main Content show -->
      <div class="modal-body text-center" id="notice_detail">
        </div>

    <div class="modal-footer">  
     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
    </div>
  </div>
</div>


  
<!-- ajax cdn -->
 <script src="../assets/coustom/ajax_3.2.1-jquery.min.js"></script>

 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var notice_id = $(this).attr("notice_id");  
           $.ajax({  
                url:"model-data.php",  
                method:"post",  
                data:{notice_id:notice_id},  
                success:function(data){  
                     $('#notice_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>


   
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

   
    


    <!--=======================Javascript============================-->
  <!--=== Jquery Min Js ===-->
   <!--  <script src="assets/js/jquery-3.2.1.min.js"></script> -->
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>

    <!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>

</body>

</html>

<?php } ?>