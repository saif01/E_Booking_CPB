<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');
$currentTime = date('Y-m-d H:i:s', time ());//H, Time in 24 hours show , h, for 12
if(strlen($_SESSION['admin-super-login'])==0)
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

$admin_id=$_GET['admin_id'];

if (isset($_POST['submit'])) {


$admin_name=$_POST['admin_name'];
$admin_mail=$_POST['admin_mail'];
$admin_contact=$_POST['admin_contact'];
$admin_office_id=$_POST['admin_office_id'];
$admin_dept=$_POST['admin_dept'];

$admin_st = $_POST['admin_st'];
$admin_car_st=$_POST['admin_car_st'];
$admin_room_st=$_POST['admin_room_st'];
$admin_law_st=$_POST['admin_law_st'];
$admin_hard_st=$_POST['admin_hard_st'];
$admin_app_st=$_POST['admin_app_st'];
$admin_super_st=$_POST['admin_super_st'];


$file=$_FILES['photo']['tmp_name'];

	if ($file!=="") 
	{

	  // For delete file
		$query2=mysqli_query($con,"SELECT `admin_img` FROM `admin` WHERE `admin_id`='$admin_id'");
		while($row=mysqli_fetch_array($query2))
		    {

		    	$file="../pimages/admin/".$row['admin_img'];
		    	$delphoto=unlink($file);

		   	}
			//Store New Image

			$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['photo']['name']);
			    $storeFile="../pimages/admin/".$file_name;
			    $fileunq=$_FILES['photo']['tmp_name'];
			    move_uploaded_file($fileunq,$storeFile);



			$query=mysqli_query($con,"UPDATE `admin` SET `admin_name`='$admin_name',`admin_mail`='$admin_mail',`admin_img`='$file_name',`admin_dept`='$admin_dept',`admin_contact`='$admin_contact',`admin_office_id`='$admin_office_id',`admin_st`='$admin_st',`admin_car_st`='$admin_car_st',`admin_room_st`='$admin_room_st',`admin_law_st`='$admin_law_st',`admin_hard_st`='$admin_hard_st',`admin_app_st`='$admin_app_st',`admin_super_st`='$admin_super_st',`last_up`='$currentTime' WHERE `admin_id`='$admin_id'");

					if ($query) 
					{
						?>		
						<script>
						setTimeout(function () { 
						        swal({
						          title: "Successfully!",
						          text: "Update Completed!",
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
						          text: "Not Update Properly!",
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

			else
			{
			$query=mysqli_query($con,"UPDATE `admin` SET `admin_name`='$admin_name',`admin_mail`='$admin_mail',`admin_dept`='$admin_dept',`admin_contact`='$admin_contact',`admin_office_id`='$admin_office_id',`admin_st`='$admin_st',`admin_car_st`='$admin_car_st',`admin_room_st`='$admin_room_st',`admin_law_st`='$admin_law_st',`admin_hard_st`='$admin_hard_st',`admin_app_st`='$admin_app_st',`admin_super_st`='$admin_super_st',`last_up`='$currentTime' WHERE `admin_id`='$admin_id'");

					if ($query) 
					{
						?>		
						<script>
						setTimeout(function () { 
						        swal({
						          title: "Successfully!",
						          text: "Update Completed!",
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
						          text: "Not Update Properly!",
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


	} 


 }?>