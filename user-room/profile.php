<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['room_login_id'])==0)
  { 
header('location:../index');
}
else{ 
 require('../db/config.php');

 $user_login=$_SESSION['room_login_id'];
 ?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <?php require('common/icon.php'); ?> 

    
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
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">

                       <h2> 
                        <?php echo htmlentities($_SESSION['user_name']) ?>'s Profile Info.</h2>
                        <span class="title-line"><i class="fa fa-home"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->


     <!--== About Page Content Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <div class="row">


            </div>

            <div class="row">
<?php
  $sql=mysqli_query($con,"SELECT * FROM `user` WHERE `user_login`='$user_login'");
  $row=$sql->fetch_assoc();

       ?>         
            <!-- About Content Start -->
                <div class="col-lg-8 col-md-12">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content " >
                            	<ul class="package-list">
                            	<li> <h3>ID : <?php echo $row['user_login']; ?></h3> </li>
                                <li> Full Name : <?php echo $row['user_name']; ?> </li>
                                <li> Department : <?php echo $row['user_dept']; ?> </li>
                            	<li> Contract Number : <?php echo $row['user_contact']; ?> </li>
                            	<li> Status : <?php 
                                $st= $row['user_st']; 
                                if ($st==1) {
                                    echo 'Active';
                                }
                                else{

                                    echo 'Deactive';
                                }

                                ?> </li>
                            	<li> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content End -->

                <!-- About Video Start -->
                <div class="col-lg-4 col-md-12">
                    <div class="about-image text-center">
                        
                      <img src="../pimages/user/<?php echo($row['user_img']);?>" class="img-responsive img-thumbnail rounded" alt="Image" style=" border: 4px solid #11f7d4;" />
                    </div>
                </div>
                <!-- About Video End -->
            </div>

            <!-- About Fretutes Start -->
            <div class="about-feature-area">
                <div class="row">
                    <!-- Single Fretutes Start -->
                    <div class="col-lg-12">
                        <div class="about-feature-item active">
                            <i class="fa fa-home"></i>
                            
                        </div>
                    </div>
                    <!-- Single Fretutes End -->

                </div>
            </div>
            <!-- About Fretutes End -->
        </div>
    </section>
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
    <?php require('common/alljs.php'); ?>
    

</body>

</html>

<?php } ?>