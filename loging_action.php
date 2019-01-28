<?php
session_start();
error_reporting(0);
require('db/config.php');
require('assets/coustom/UserInfo.php');
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () ); // h=12 hours H=24 hours

if(isset($_POST['submit']))
{
    $user_login=$_POST['user_login'];
    $password=$_POST['password'];

$UserSql=mysqli_query($con,"SELECT * FROM `user` WHERE `user_login`='$user_login' AND `user_pass`='$password'");
   
$num=mysqli_num_rows($UserSql);


if($num>0)
{   
    while($row=mysqli_fetch_array($UserSql))
                {   
        

        //*********** User Login Log valus ************//
            $ip= UserInfo::get_ip();
            $os= UserInfo::get_os();
            $browser= UserInfo::get_browser();
            $device= UserInfo::get_device();
            $user_id=$row['user_id'];
            $user_name=$row['user_name'];

            $user_car_st=$row['user_car_st'];
            $user_room_st=$row['user_room_st'];
            $user_law_st=$row['user_law_st'];
            $user_cms_st=$row['user_cms_st'];
            $st=$row['user_st'];

// ************** For All Section user **********************////

                if ($st=='1') 
                    { 

            //*********** Store Session Value ************//
                    $_SESSION['user_redirect']=$row['user_login'];
                    $_SESSION['user_id']=$row['user_id'];

                    $_SESSION['user_name']=$row['user_name'];
                                                                
                        $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_ip`, `login_os`, `login_browser`, `login_device`, `login_time`, `login_st`) VALUES ('$user_login','$user_name','$ip','$os','$browser','$device','$currentTime','$st')");                        
                                                                
                         header("Location:user-all");
                       
                        }


                    else
                    {   
                       $_SESSION['errmsg']="Your Account Has been blocked .Please contact IT  !!!";
                       $log=mysqli_query($con,"INSERT INTO `loginlog`(`user_name`, `user_id`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`) VALUES ('$user_name','$user_id','$ip','$os','$browser','$device','$st')");

                        // echo "<script>
                        // alert('Your Account Has been blocked .Please contact IT  !!!');
                        // window.open('index','_self'); </script>";
                       header("location:index");
                        exit();
                    }
                    

                }

            }
else
    {
        $_SESSION['errmsg']="Invalid username or password";       
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

}

?>