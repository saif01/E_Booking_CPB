<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-law-login'])==0)
  { 
header('location:../admin');
  }
else{ 
include('../db/config.php');
//mail send
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

$user_login=$_POST['user_login'];
$user_pass=$_POST['user_pass'];
$user_name=$_POST['user_name'];
$user_mail=$_POST['user_mail'];
$user_dept=$_POST['user_dept'];
$user_contact=$_POST['user_contact'];
$user_office_id=$_POST['user_office_id'];
$user_st=$_POST['show_st'];
$user_car_st=$_POST['user_car_st'];
$user_room_st=$_POST['user_room_st'];
$user_law_st=$_POST['user_law_st'];
$user_cms_st=$_POST['user_cms_st'];


$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['photo']['name']);
    $storeFile="../pimages/user/".$file_name;
    $fileunq=$_FILES['photo']['tmp_name'];
    move_uploaded_file($fileunq,$storeFile);



$query=mysqli_query($con,"INSERT INTO `user`(`user_login`, `user_pass`, `user_name`, `user_mail`, `user_img`, `user_dept`, `user_contact`, `user_office_id`, `user_st`, `user_car_st`, `user_room_st`, `user_law_st`, `user_cms_st`) VALUES ('$user_login','$user_pass','$user_name','$user_mail','$file_name','$user_dept','$user_contact','$user_office_id','$user_st','$user_car_st','$user_room_st','$user_law_st','$user_cms_st')");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "User Add Completed!",
			          type: "success",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	//history.back();
			            window.location.href = "user-all.php";
			          }
			        }); },0);

			</script>

		    <?php
		}

		else
		{
			//echo '<script language="javascript">';
			//echo 'alert("Error !!!!.. Data Not Inserted")';
			//echo '</script>';

			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Error Genareted!",
			          text: "User Not Added Properly!",
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

// Send Mail User Id And Password
		$sub="C.P.B. It-Portal";
		$to=$user_mail;
		$msg=" 
        <html>
        <body>
            <font size='5' color='green'>Dear $user_name, This Is Your C.P. BAngladesh It-Portal User Account Details.</font><br><br><hr>
		  <font size='4' color='blue'>Your LogIn ID : <b>$user_login</b>, </font><br>
		  <font size='3' color='red'>Your Password :  <b>$user_pass </b>.</font><br>

		 <hr><br><br>

         
            </body>
        </html>";

        send_mail($sub,$msg,$to);


	} 


 }?>