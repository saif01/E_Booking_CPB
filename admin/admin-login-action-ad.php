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

    //Checking from AD Sarver
    $ldaphost = "10.64.1.3"; 
    $ldapuser = $admin_login."@cpbd.co.bd";
    // connect to active directory
    $ldapconn = @ldap_connect($ldaphost);

    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
    $ldapbind = @ldap_bind($ldapconn, $ldapuser, $admin_pass);
    if ($ldapbind) 
    {
        // echo json_encode(['STATUS'=>'OK']);

 
$adminSql=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_login`='$admin_login' ");

// $adminSql=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_login`='$admin_login' AND `admin_pass`='$admin_pass'");

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
                    $admin_law_st= $row['admin_law_st'];
                    $admin_super_st= $row['admin_super_st'];


             // ****** For Login Log Value **********//       
                    $ip= UserInfo::get_ip();
                    $os= UserInfo::get_os();
                    $browser= UserInfo::get_browser();
                    $device= UserInfo::get_device();
                    $admin_login=$row['admin_login'];
                    $admin_name=$row['admin_name'];

                    

        // ***********Only Car Pool Admin Section ************//

                     if($admin_st=='1' && $admin_super_st=='0') {  


                        $_SESSION['admin-redirect']=$_POST['admin_login'];
                        $_SESSION['admin_id']=$row['admin_id'];
                         
                        $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`,`login_st`) VALUES ('$admin_login','$admin_name','$ip',' $os','$browser','$device','$currentTime','$admin_st')");
                                        
                         header("Location:project_direct");
                        exit(); 

                }

     


     // *********** Super Admin Section ************//

                 elseif($admin_st=='1' && $admin_super_st=='1') { 

                        $_SESSION['admin_id']=$row['admin_id'];
                        $_SESSION['admin-redirect']=$_POST['admin_login'];
                        $_SESSION['admin-room-login']=$_POST['admin_login'];
                        $_SESSION['admin-car-login']=$_POST['admin_login'];
                        $_SESSION['admin-law-login']=$_POST['admin_login'];
                        $_SESSION['admin-super-login']=$_POST['admin_login'];
                        $_SESSION['admin_hard_login']=$_POST['admin_login'];
                        $_SESSION['admin_app_login']=$_POST['admin_login'];
                        $_SESSION['admin_inventory']=$_POST['admin_login'];

                        
                         
                         $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`,`login_st`) VALUES ('$admin_login','$admin_name','$ip',' $os','$browser','$device','$currentTime','$admin_st')");
                                        
                         header("Location:../superadmin");
                        exit();      

                }

            elseif($admin_st=='0')
                {
                    $_SESSION['errmsg']="Your ID Was Blocked.!!! Contract With IT Department";       
                    $_SESSION['adminName']=$_POST['adminName'];
                    $admin_status=$row['admin_status'];
                     
                                           
                     $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`,`login_st`) VALUES ('$admin_login','$admin_name','$ip',' $os','$browser','$device','$currentTime','$admin_st')");

                     header("location: index");
                    exit();
                   
                 }

                 else{

                    $_SESSION['errmsg']="Somthing Going Wrong .!!! Please Contact With C.P.B. IT";      
                    $_SESSION['adminName']=$_POST['adminName'];
                                       
                     $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_ip`, `user_os`, `user_browser`, `user_device`) VALUES ('".$_SESSION['adminName']."','$ip','$rowcount','$browser','$device')");

                     header("location: index");
                    exit();                   

                 }
            }
        }

    else{

                    $_SESSION['errmsg']="Admin ID Not Avaiable in CPB-IT Portal.!!!";       
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
         else 
    { 
        // echo json_encode(['STATUS'=>'ERROR']);

        $_SESSION['errmsg']="Invalid AD UseID or Password";       
        $_SESSION['logIn_id']=$_POST['logIn_id'];
      
         $ip= UserInfo::get_ip();
         $os= UserInfo::get_os();
         $browser= UserInfo::get_browser();
         $device= UserInfo::get_device();
         $status_E=0;                         
         $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`) VALUES ('".$_SESSION['logIn_id']."','$ip','$os','$browser','$device','$status_E')");

         header("location:index");
        exit();
    } 
    @ldap_unbind($ldapconn);
    @ldap_close($ldapconn);
    


}
?>
