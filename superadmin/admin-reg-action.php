<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
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

$admin_login = $_POST['admin_login'];
$admin_name = $_POST['admin_name'];
$admin_pass = $_POST['admin_pass'];
$admin_dept = $_POST['admin_dept'];
$admin_mail = $_POST['admin_mail'];
$admin_contact =$_POST['admin_contact'];
$admin_office_id = $_POST['admin_office_id'];
$admin_st = $_POST['admin_st'];
$admin_car_st=$_POST['admin_car_st'];
$admin_room_st=$_POST['admin_room_st'];
$admin_law_st=$_POST['admin_law_st'];
$admin_hard_st=$_POST['admin_hard_st'];
$admin_app_st=$_POST['admin_app_st'];
$admin_super_st=$_POST['admin_super_st'];



$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['photo']['name']);
    $storeFile="../pimages/admin/".$file_name;
    $fileunq=$_FILES['photo']['tmp_name'];
    move_uploaded_file($fileunq,$storeFile);


$query=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_mail`, `admin_img`, `admin_dept`, `admin_contact`, `admin_office_id`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_law_st`, `admin_app_st`, `admin_hard_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$admin_mail','$file_name','$admin_dept','$admin_contact','$admin_office_id','$admin_st','$admin_car_st','$admin_room_st','$admin_law_st','$admin_app_st','$admin_hard_st','$admin_super_st')");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Admin Add Completed!",
			          type: "success",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	//history.back();
			            window.location.href = "admin-all.php";
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
			          text: "Admin Not Added Properly!",
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
		$sub="Welcome To CPB-IT Portal";
		$to=$admin_mail;
		$msg=" 
        <html>
        <body>
            <font size='2' color='green'>Dear $admin_name,<br><br>
             This Is Your C.P. BAngladesh It-Portal Admin Account Details.</font><br><br><hr>
		  <font size='4' color='blue'>Your LogIn ID : <b>$admin_login</b>, </font><br>
		  <font size='4' color='red'>Your Password :  <b>Your Current Password</b>.</font><br>

		 <hr><br><br>


		 <font color='#FF6347'>
		 <i>**It's a auto generated email. Don't replay at this e-mail**</i>
		 </font><br><br>

		 
		 <a href='http://202.51.191.2/cpbit/admin/' <button style='
		 background-color: #4CAF50;
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;'>Click Here For LogIn</button>

         
            </body>
        </html>";

        send_mail($sub,$msg,$to);


	} 


 }?>