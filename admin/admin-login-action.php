<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date('Y-m-d H:i:s', time()); // h=12 hours H=24 hours
require('../db/config.php');
require('../assets/coustom/UserInfo.php');


if(isset($_POST['submit']))
{
    $admin_login=$_POST['admin_login'];
    $admin_pass=$_POST['admin_pass'];

 
$adminSql=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_login`='$admin_login' AND `admin_pass`='$admin_pass'");

 $rowcount=mysqli_num_rows($adminSql);  

    //$row=mysqli_fetch_array($ret);

    if($rowcount>0 )
            
     {   
         while($row=mysqli_fetch_array($adminSql))
        {   

               // ****** For Admin check Value **********//       
                    $admin_st= $row['admin_st'];
                    $admin_car_st= $row['admin_car_st'];
                    $admin_room_st= $row['admin_room_st'];
                    $admin_super_st= $row['admin_super_st'];


             // ****** For Login Log Value **********//       
                    $ip= UserInfo::get_ip();
                    $os= UserInfo::get_os();
                    $browser= UserInfo::get_browser();
                    $device= UserInfo::get_device();
                    $admin_login=$row['admin_login'];
                    $admin_name=$row['admin_name'];

                    

        // *********** Car Pool Admin Section ************//

                    if ($admin_st=='1' && $admin_car_st=='1' && $admin_room_st=='0' && $admin_super_st=='0') 
                    {  


                        $_SESSION['admin-car-login']=$_POST['admin_login'];
                        $_SESSION['admin_id']=$row['admin_id'];
                         
                        $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`,`login_st`) VALUES ('$admin_login','$admin_name','$ip',' $os','$browser','$device','$currentTime','$admin_st')");
                                        
                         header("Location:../admin-car");
                        exit(); 



                }

     // *********** Room Booking Admin Section ************//

                elseif($admin_st=='1' && $admin_car_st=='0' && $admin_room_st=='1' && $admin_super_st=='0') 
                    {  


                        $_SESSION['admin-room-login']=$_POST['admin_login'];
                        $_SESSION['admin_id']=$row['admin_id'];
                         
                         $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`,`login_st`) VALUES ('$admin_login','$admin_name','$ip',' $os','$browser','$device','$currentTime','$admin_st')");
                                        
                         header("Location:../admin-room");
                        exit();      

                }

     // *********** Super Admin Section ************//

                elseif($admin_st=='1' && $admin_car_st=='1' && $admin_room_st=='1' && $admin_super_st=='1') 
                    {  


                        $_SESSION['admin-super-login']=$_POST['admin_login'];
                        $_SESSION['admin_id']=$row['admin_id'];
                         
                         $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`,`login_st`) VALUES ('$admin_login','$admin_name','$ip',' $os','$browser','$device','$currentTime','$admin_st')");
                                        
                         header("Location:../superadmin");
                        exit();      

                }





            elseif($st==0)
                {
                    $_SESSION['errmsg']="Your ID Was Blocked.!!! Contract With IT Department";       
                    $_SESSION['adminName']=$_POST['adminName'];
                    $admin_status=$row['admin_status'];
                     
                                           
                     $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`,`login_st`) VALUES ('$admin_login','$admin_name','$ip',' $os','$browser','$device','$currentTime','$admin_st')");

                     header("location: login");
                    exit();
                   
                 }

                 else{

                    $_SESSION['errmsg']="Username Or Password Not Match.!!!";       
                    $_SESSION['adminName']=$_POST['adminName'];
                    
                     
                                           
                     $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_ip`, `user_os`, `user_browser`, `user_device`) VALUES ('".$_SESSION['adminName']."','$ip','$rowcount','$browser','$device')");

                     header("location: login");
                    exit();
                   

                 }
            }
        }

    else{

                    $_SESSION['errmsg']="UserID Or Password Not Match.!!!";       
                    $admin_login=$_POST['admin_login'];
                    
                     $ip= UserInfo::get_ip();
                     $os= UserInfo::get_os();
                     $browser= UserInfo::get_browser();
                     $device= UserInfo::get_device();
                     $logError='0';
                                           
                     $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`, `login_st`) VALUES ('$admin_login','$ip','$os','$browser','$device','$currentTime','$logError')");

                     header("location: index");
                    exit();

        }

}
?>