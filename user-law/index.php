<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['car_law_id'])==0)
  { 
header('location:../index');
}
else{ 
 require('../db/config.php');
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

        <!--== SlideshowBg Area Start ==-->
    <section id="slideslow-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="slideshowcontent">
                        <div class="display-table">
                            <div class="display-table-cell">
                               <!-- <a href="law-history" > <h1>All LEGAL ACTIONS..!</h1> </a> -->

                                 
           
              
          <table class="table table-striped table-bordered table-dark" style="width:100% ">

              <thead style="background-color: #912CEE;">

                <tr class="text-center">

                  <th width="20%">Notice Date</th> 
                  <th width="60%">Notice Subject</th>
                  <th width="20%">Details</th>
                  
                  
                   
                </tr>
              </thead>   
              <tbody>
                <?php 
    $query=mysqli_query($con,"SELECT * FROM `legal_notice` WHERE `show_st`='1' ORDER BY `notice_id` DESC LIMIT 3 ");

    while($row=mysqli_fetch_array($query))
    {

?>
                <tr>
                <td><span class="badge badge-info" style="font-size: 20px;"><i class="fa fa-calendar" style="color: #FF4500;" aria-hidden="true"></i> <?php echo date("M j", strtotime($row['reg'])); ?></span></td>
                <td><?php echo $row['subject']; ?> </td>

                <td>
                    <input type="button"  name="view" value="view" notice_id="<?php echo $row["notice_id"]; ?>" class="btn btn-info view_data"/>
                </td>
                
              
              </tr>

                <?php } ?>
            
              </tbody>

               
        
    </table>

<!-- <a href=""><button class="btn btn-primary">All Notice</button></a>
 -->   

 <!-- Button trigger modal -->
 <a href="notice-all">
<button type="button" class="btn btn-danger btn-block">All Notice</button></a>
           
    

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== SlideshowBg Area End ==-->

<!-- Default Model Modal  -->
<!-- <div  class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header text-center">
                    <h5 class="modal-title text-info" >Notice Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>  
                <div class="modal-body text-center" id="notice_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>   -->

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
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
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
    <?php require('common/alljs.php'); ?>



</body>

</html>

<?php } ?>