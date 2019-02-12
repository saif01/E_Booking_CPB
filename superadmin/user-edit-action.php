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

$user_id=$_GET['user_id'];

if (isset($_POST['submit'])) {


$user_name=$_POST['user_name'];
$user_mail=$_POST['user_mail'];
$bu_mail=$_POST['bu_mail'];
$user_dept=$_POST['user_dept'];
$user_location=$_POST['user_location'];
$user_contact=$_POST['user_contact'];
$user_office_id=$_POST['user_office_id'];

$user_st=$_POST['show_st'];
$user_car_st=$_POST['user_car_st'];
$user_room_st=$_POST['user_room_st'];
$user_law_st=$_POST['user_law_st'];
$user_cms_st=$_POST['user_cms_st'];


$file=$_FILES['photo']['tmp_name'];

	if ($file !=="") 
	{

	  // For delete file
		$query2=mysqli_query($con,"SELECT `user_img` FROM `user` WHERE `user_id`='$user_id' ");
		while($row=mysqli_fetch_array($query2))
		    {

		    	$file="../pimages/user/".$row['user_img'];
		    	$delphoto=unlink($file);

		   	}
			//Store New Image

			$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['photo']['name']);
			    $storeFile="../pimages/user/".$file_name;
			    $fileunq=$_FILES['photo']['tmp_name'];
			    move_uploaded_file($fileunq,$storeFile);



			$query=mysqli_query($con,"UPDATE `user` SET `user_name`='$user_name',`user_mail`='$user_mail',`bu_mail`='$bu_mail',`user_img`='$file_name',`user_dept`='$user_dept',`user_location`='$user_location',`user_contact`='$user_contact',`user_office_id`='$user_office_id',`user_st`='$user_st',`user_car_st`='$user_car_st',`user_room_st`='$user_room_st',`user_law_st`='$user_law_st',`user_cms_st`='$user_cms_st',`last_update`='$currentTime' WHERE `user_id`='$user_id'");


			

					if ($query) 
					{
						?>		
						<script>
						setTimeout(function () { 
						        swal({
						          title: "Successfully!",
						          text: "User Information Update Completed!",
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
					
						?>		
						<script>
						setTimeout(function () { 
						        swal({
						          title: "Error Genareted!",
						          text: "User Information Not Update Properly!",
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
				$query=mysqli_query($con,"UPDATE `user` SET `user_name`='$user_name',`user_mail`='$user_mail',`bu_mail`='$bu_mail',`user_dept`='$user_dept',`user_location`='$user_location',`user_contact`='$user_contact',`user_office_id`='$user_office_id',`user_st`='$user_st',`user_car_st`='$user_car_st',`user_room_st`='$user_room_st',`user_law_st`='$user_law_st',`user_cms_st`='$user_cms_st',`last_update`='$currentTime' WHERE `user_id`='$user_id'");


					if ($query) 
					{
						?>		
						<script>
						setTimeout(function () { 
						        swal({
						          title: "Successfully!",
						          text: "User Information Update Completed!",
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
						          text: "User Information Not Update Properly!",
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