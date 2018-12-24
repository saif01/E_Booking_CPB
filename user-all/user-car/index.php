<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['user_all'])==0)
  { 
header('location:../../index');
}
else{ 
 require('../../db/config.php');
date_default_timezone_set('Asia/Dhaka');// change according timezone            
$currentdate = date( 'Y-m-d' );                
$user_id=$_SESSION['user_id'];
$notify2=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_id`='$user_id' AND `comit_st`='' AND `boking_status`='1' AND date(`start_date`) <= date('$currentdate') ");
$number2=mysqli_num_rows($notify2);
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

    <!--*************Start For Auto Load Model ***************-->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script type="text/javascript">
      $(window).load(function()   
    {

    var noncom=<?php echo $number2; ?>;

      if (noncom >= 2) {
        $('#myModal').modal('show');
      }
    });
    </script>
    <!--*************End For Auto Load Model ***************-->

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
                               <a href="car-list-reg" > <h1>BOOK A CAR TODAY!</h1> </a>

                                 <div class="book-ur-car">


                                <form action="search-result.php" method="POST" onsubmit="return Validate(this);">
                                        
                                        <div class="pick-date bookinput-item">
                                            <!-- <input id="startDate2" name="startDate" placeholder="Pick Date"/> -->
                                            <input type="DATE" class="custom-select" id="first" name="startDate" required>
                                        </div>

                                        <div class="retern-date bookinput-item">
                                            <!-- <input id="endDate2" name="endDate" placeholder="Return Date"/> -->

                                            <input type="DATE" class="custom-select" id="second" name="endDate" required>
                                        </div>


                                       <div class="pick-location bookinput-item">
                                        <select name="location" class="custom-select" required>
                                              <option selected>Pick Destination</option>
                                             <?php
                                        $query2=mysqli_query($con,"SELECT `location` FROM `location` ORDER BY `location`");

                                                while ($row2 = mysqli_fetch_array($query2))
                                                {
                                    echo "<option value='". $row2['location'] ."'>" .$row2['location'] . "</option>" ;
                                    }
                                    ?>
                                            </select>
                                        </div>
                                        

                                         <div class="bookcar-btn bookinput-item" >
                                            <button type="submit" name="submit" >Search Record</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== SlideshowBg Area End ==-->

    <!--Start Modal -->
<div class="modal show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title text-info" id="exampleModalLongTitle">Non Commented Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center text-danger font-italic text-justify" style="font-size: 20px;" >
        <!-- <i class="material-icons text-danger" style="">notifications_active</i> --> 
       

        <ul class="list-group">
          <li class="list-group-item list-group-item-action list-group-item-danger">
            Your non commented booked number
            <span class="badge badge-danger badge-pill"><?php echo $number2; ?></span>
          </li>
          <li class="list-group-item list-group-item-action list-group-item-secondary">
            Please Fulfill comment section.
            
          </li>
          <li class="list-group-item list-group-item-action list-group-item-warning">
            Otherwise you can't book in future. 
            
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--End Modal -->
   


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