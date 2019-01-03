<?php 
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date('Y-m-d H:i:s', time ());//H, Time in 24 hours show , h, for 12
include('../../db/config.php');
require('../common/UserInfo.php');

if(isset($_POST['submit']))
{
    $admin_login=$_POST['admin_login'];
    $admin_pass=$_POST['admin_pass'];

 
$adminRes=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_login`='$admin_login' AND `admin_pass`='$admin_pass' ");

 $rowcount=mysqli_num_rows($adminRes);  

//$row=mysqli_fetch_array($ret);

if($rowcount>0 )
            
            {   

    while($row=mysqli_fetch_array($adminRes))
                {   

                    $admin_login=$row['admin_login'];
                    $admin_name=$row['admin_name'];
                    $admin_dept=$row['admin_dept'];

                    $st=$row['admin_st'];
                    $st2=$row['super_admin_st'];

                    $ip= UserInfo::get_ip();
                    $os= UserInfo::get_os();
                    $browser= UserInfo::get_browser();
                    $device= UserInfo::get_device();

                    if ($st==1 && $st2==1) 
                    {  


                        $_SESSION['S_admin_login']=$_POST['admin_login'];
                        $_SESSION['S_admin_name']=$row['admin_name'];
                        $S_status=1;
                              
                                            
                        $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_dept`, `login_browser`, `login_os`, `login_device`, `login_time`, `login_st`) VALUES ('$admin_login','$admin_name','$admin_dept','$browser','$os','$device','$currentTime','$S_status')");
                                        
                         header("Location:../superadmin");
                        exit(); 

                        }

                elseif ($st==1 && $st2==0) 
                    {  


                        $_SESSION['admin-all-login']=$_POST['admin_login'];
                        $_SESSION['admin_name']=$row['admin_name'];
                        $A_status=1;

                        // $admin_status=$row['admin_status'];
                        // $ip= UserInfo::get_ip();
                        // $os= UserInfo::get_os();
                        // $browser= UserInfo::get_browser();
                        // $device= gethostname();

                              
                       $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_dept`, `login_browser`, `login_os`, `login_device`, `login_time`, `login_st`) VALUES ('$admin_login','$admin_name','$admin_dept','$browser','$os','$device','$currentTime','$A_status')");
                                        
                         header("Location:index");
                        exit();         

                }





            else
                {
                    $_SESSION['errmsg']="Your ID Was Blocked.!!! Contract With IT Department";
                    $B_status=0;
                    // $_SESSION['adminName']=$_POST['adminName'];
                    // $admin_status=$row['admin_status'];
                    //  $ip= UserInfo::get_ip();
                    //  $os= UserInfo::get_os();
                    //  $browser= UserInfo::get_browser();
                    //  $device= UserInfo::get_device();
                                           
                    $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_dept`, `login_browser`, `login_os`, `login_device`, `login_time`, `login_st`) VALUES ('$admin_login','$admin_name','$admin_dept','$browser','$os','$device','$currentTime','$B_status')");

                     header("location: login");
                    exit();
                   
                 }

                
            }
        }

 else{

                    $_SESSION['errmsg']="Username Or Password Not Match.!!!";       
                          $E_status=0;            
                     // $ip= UserInfo::get_ip();
                     // $os= UserInfo::get_os();
                     // $browser= UserInfo::get_browser();
                     // $device= UserInfo::get_device();
                                           
                     $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_browser`, `login_os`, `login_device`, `login_time`, `login_st`) VALUES ('$admin_login','$browser','$os','$device','$currentTime','$E_status')");

                     header("location: login");
                    exit();

                }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CPB.RoomBooking</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">


                            <form action="" method="post">
                                <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>


                                <div class="form-group">
                                    <label class="label">Username</label>
                                    <div class="input-group">
                                        <input type="text" name="admin_login" class="form-control" placeholder="Username">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="admin_pass" class="form-control" placeholder="*********">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                                </div>


                            </form>
                        </div>

                        <?php include('common/footer.php') ?>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
</body>

</html>