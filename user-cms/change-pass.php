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
require('../db/config.php');

if(isset($_POST['submit']))
{

$user_id=$_SESSION['user_id'];
$password= $_POST['password'];
$newpassword= $_POST['newpassword'];

$sql=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id`='$user_id' AND `user_pass`='$password'");
$num=mysqli_fetch_array($sql);

//print_r($num);


if($num>0)
    {
        $con=mysqli_query($con,"UPDATE `user` SET `user_pass`='$newpassword'  WHERE `user_id`='$user_id' ");

                //**********Start Sweet Alert and redirect other Page ***********// 
                      ?>
                      <script type="text/javascript">
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Your Password Changed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "index.php";
                                  }
                                }); }, 1000);
                      </script>
                      <?php
          //**********End Sweet Alert and redirect other Page ***********// 
                       
    }
else
    {

        $errormsg="Old Password not match !!";
    }

}


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
                        <h2>Change Your Password</h2>
                        <span class="title-line"><i class="fa fa-chain-broken" aria-hidden="true"></i></span>
                       <!--  <p>C.P. Bangladesh Car List.. </p> -->
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

     <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>Change Password</h3>

                        <?php if($successmsg)
                                    {?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Well done!</b>
                                    <?php echo htmlentities($successmsg);?>
                                </div>
                                <?php }?>

                                <?php if($errormsg)
                                    {?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Oh snap!</b>
                                    <?php echo htmlentities($errormsg);?>
                                </div>
                                <?php }?>


                            <form action="" method="post" name="chngpwd" onSubmit="return valid();"  >
                                
                                <div class="password">
                                    <input type="Password" name="password" placeholder="Enter Current Password">
                                </div>
                                <div class="password">
                                    <input type="Password" name="newpassword" placeholder="Enter New Password">
                                </div>
                                <div class="password">
                                    <input type="password" name="confirmpassword" placeholder=" Retype New Password">
                                </div>
                                <div class="log-btn">
                                    <button type="submit" name="submit" ><i class="fa fa-check-square"></i> Change Password</button>
                                </div>
                            </form>
                        </div>
                        
                       
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Login Page Content End ==-->

    <script type="text/javascript">
            function valid() {
                if (document.chngpwd.password.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.password.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
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