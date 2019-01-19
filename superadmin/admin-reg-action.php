<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-law-login'])==0)
  { 
header('location:../admin');
  }
else{ 
include('../db/config.php');
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
$admin_super_st=$_POST['admin_super_st'];



$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['photo']['name']);
    $storeFile="../pimages/admin/".$file_name;
    $fileunq=$_FILES['photo']['tmp_name'];
    move_uploaded_file($fileunq,$storeFile);


$query=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_mail`, `admin_img`, `admin_dept`, `admin_contact`, `admin_office_id`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_law_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$admin_mail','$file_name','$admin_dept','$admin_contact','$admin_office_id','$admin_st','$admin_car_st','$admin_room_st','$admin_law_st','$admin_super_st')");


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


	} 


 }?>