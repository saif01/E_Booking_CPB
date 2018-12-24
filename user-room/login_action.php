<?php 
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date('Y-m-d H:i:s', time ());// h=12 hours H=24 hours
require('db/config.php');
require('common/UserInfo.php');

if(isset($_POST['submit']))
{
    $user_login=$_POST['user_login'];
    $user_pass=$_POST['user_pass'];

$ret=mysqli_query($con,"SELECT * FROM `user` WHERE `user_login`='$user_login' AND `user_pass`='$user_pass' ");
   
$num=mysqli_num_rows($ret);
if($num>0)
{   

    //$ret= mysqli_query($con,"SELECT * FROM `user` WHERE `logIn_id` ='$logIn_id'");
    while($row=mysqli_fetch_array($ret))
                {   
 

                	$login_id=$row['user_login'];
                	$user_name=$row['user_name'];
                	$user_dept=$row['user_dept'];

                		$_SESSION['user_id']=$row['user_id'];
                        $_SESSION['user_login']=$login_id;
                        $_SESSION['user_name']=$user_name;
                        $ip= UserInfo::get_ip();
                        $os= UserInfo::get_os();
                        $browser= UserInfo::get_browser();
                        $device= UserInfo::get_device();

                    if ($row['user_st']==1) 
                    {  
                                                      
                        //$hostname=$_ENV['COMPUTERNAME'];                      
                        $status=1;

                        $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_dept`, `login_browser`, `login_os`, `login_device`, `login_time`, `login_st`) VALUES ('$login_id','$user_name','$user_dept','$browser','$os','$device','$currentTime','$status')");
                                                                
                         header("Location: meeting-room");
                        exit();
                        }

                        elseif ($st==0)
                    {   
             
                        //$hostname=$_ENV['COMPUTERNAME'];                      
                        $B_status=0;

                       $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_name`, `login_dept`, `login_browser`, `login_os`, `login_device`, `login_time`, `login_st`) VALUES ('$login_id','$user_name','$user_dept','$browser','$os','$device','$currentTime','$B_status')");

                        echo "<script>
                        alert('Your Account Has been blocked .Please contact Admin  !!!');
                        window.open('index','_self'); </script>";

                    }

                }

            }
else
    {
        $_SESSION['errmsg']="Invalid username or password";       
        
      
         $ip= UserInfo::get_ip();
         $os= UserInfo::get_os();
         $browser= UserInfo::get_browser();
         $device= UserInfo::get_device();
         $E_status=0;                         
         $log=mysqli_query($con,"INSERT INTO `login_log`(`login_id`, `login_browser`, `login_os`, `login_device`, `login_time`) VALUES ('$user_login','$browser','$os','$device','$currentTime')");

         header("location:index");
        exit();
       
     }

}

?>