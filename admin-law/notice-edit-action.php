<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');
$currentTime = date('Y-m-d H:i:s', time ());//H, Time in 24 hours show , h, for 12
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

$notice_id=$_GET['notice_id'];

if (isset($_POST['submit'])) {

$subject=$_POST['subject'];
$details=$_POST['details'];
$show_st=$_POST['show_st'];

$file=$_FILES['photo']['tmp_name'];

	if ($file !=="") 
	{

		// For delete file
	$query2=mysqli_query($con,"SELECT `photo` FROM `legal_notice` WHERE `notice_id`='$notice_id' ");
	while($row=mysqli_fetch_array($query2))
	    {

	    	$file="../pimages/notice/".$row['photo'];
	    	$delphoto=unlink($file);

	   	}
		//Store New Image
		$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['photo']['name']);
	    $storeFile="../pimages/notice/".$file_name;
	    $fileuniq=$_FILES['photo']['tmp_name'];
	    move_uploaded_file($fileuniq,$storeFile);

	    $query=mysqli_query($con,"UPDATE `legal_notice` SET `subject`='$subject',`details`='$details',`photo`='$file_name',`show_st`='$show_st',`last_up`='$currentTime' WHERE `notice_id`='$notice_id'");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Legal Notice Update Completed!",
			          type: "success",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			            window.location.href = "notice-all.php";
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
			          text: "Legal Notice Not Update Properly!",
			          type: "error",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	history.back();
			            //window.location.href = "notice-all.php";
			          }
			        }); },0);

			</script>

		    <?php
		}
	}

	else
	{
		 $query=mysqli_query($con,"UPDATE `legal_notice` SET `subject`='$subject',`details`='$details',`show_st`='$show_st',`last_up`='$currentTime' WHERE `notice_id`='$notice_id'");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Legal Notice Update Completed!",
			          type: "success",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			            window.location.href = "notice-all.php";
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
			          text: "Legal Notice Not Update Properly!",
			          type: "error",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			            window.location.href = "notice-all.php";
			          }
			        }); },0);

			</script>

		    <?php
		}
	}





	} 


 }?>