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

$subject=$_POST['subject'];
$details=$_POST['details'];
$show_st=$_POST['show_st'];

$file=$_FILES['photo']['tmp_name'];

	if ($file !=="") 
	{
		$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['photo']['name']);
	    $storeFile="../pimages/notice/".$file_name;
	    $fileuniq=$_FILES['photo']['tmp_name'];
	    move_uploaded_file($fileuniq,$storeFile);

	    $query=mysqli_query($con,"INSERT INTO `legal_notice`(`subject`, `details`, `photo`, `show_st`) VALUES ('$subject','$details','$file_name','$show_st')");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Legal Notice Add Completed!",
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
			          text: "Legal Notice Not Added Properly!",
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

	else
	{
		 $query=mysqli_query($con,"INSERT INTO `legal_notice`(`subject`, `details`, `show_st`) VALUES ('$subject','$details','$show_st')");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Legal Notice Add Completed!",
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
			          text: "Legal Notice Not Added Properly!",
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