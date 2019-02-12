<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');
$currentTime = date('Y-m-d H:i:s', time ());//H, Time in 24 hours show , h, for 12
if(strlen($_SESSION['admin_app_login'])==0)
  { 
header('location:../admin');
  }
else{ 
include('../db/config.php');

//For Send Mail
require('../mail/sendmail.php');
require('../mail/address.php');


?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php

if (isset($_POST['submit'])) {

$app_id=$_GET['app_id'];
$admin_id=$_SESSION['admin_id'];

$status= $_POST['status'];
$remarks= $_POST['remarks'];

// Store Data in CMS App Remarks Table
$sql=mysqli_query($con,"INSERT INTO `cms_app_remarks`(`app_id`, `status`, `remarks`, `action_by`) VALUES ('$app_id','$status','$remarks','$admin_id')");
// Store Data in CMS App Complain Table
$sql2=mysqli_query($con,"UPDATE `cms_app_complain` SET `status`='$status',`last_up`='$currentTime' WHERE `app_id`='$app_id'");

			if($sql && $sql2)
		    {

				?>		
				<script>
				setTimeout(function () { 
				        swal({
				          title: "Successfully!",
				          text: "Remarks Uddated Completed!",
				          type: "success",
				          confirmButtonText: "OK"
				        },
				        function(isConfirm){
				          if (isConfirm) {
				          	//history.back();
				            //window.location.href = "not-process";
				            window.opener.location.reload();
				          	window.close();

    
				          }
				        }); },0);

				</script>

			    <?php
			}

			else
			{
				

				?>		
				<script>
				setTimeout(function () { 
				        swal({
				          title: "Error Genareted!",
				          text: "Remarks Not Uddated Completed!",
				          type: "error",
				          confirmButtonText: "OK"
				        },
				        function(isConfirm){
				          if (isConfirm) {
				          	history.back();
				            //window.location.href = "advisor-all.php";
				          }
				        }); },0);

				</script>

			    <?php
			}

//SQL For Mail Sending
$mailSQL=mysqli_query($con,"SELECT user.user_name, user.user_mail, user.bu_mail FROM user INNER JOIN cms_app_complain ON user.user_id=cms_app_complain.user_id  WHERE cms_app_complain.app_id='$app_id'");
	$mailrow=$mailSQL->fetch_assoc();

	$user_name=$mailrow['user_name'];
	$to=$mailrow['user_mail'];
	$cc=$mailrow['bu_mail'];
    $sub="Application Complain no: $app_id";

    $msg=" 
        <html>
        <body>
           <font size='5' color='green'>Dear $user_name,This is your Application Complain update.</font><br><br><hr>
            <font size='4' color='blue'>Your Complain Status is : <b>$status.</b></font><br>
            <font size='3' color='#307221'>Your Complain remarks is : <b> $remarks.</b>.</font><hr><br><br>

           $APP_ADDRESS
            </body>
        </html> ";

        send_mail_withCC($sub,$msg,$to,$cc);
// End Mail Code



 
	} // Emd Submit


 }?>