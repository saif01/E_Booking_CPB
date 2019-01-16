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

$advisor_id=$_GET['advisor_id'];

if (isset($_POST['submit'])) {

$name=$_POST['name'];
$contact=$_POST['contact'];
$details=$_POST['details'];
$status=$_POST['show_st'];
$court=$_POST['court'];


$file=$_FILES['photo']['tmp_name'];

	if ($file !=="") 
	{

	  // For delete file
		$query2=mysqli_query($con,"SELECT `photo` FROM `advisor` WHERE `advisor_id`='$advisor_id' ");
		while($row=mysqli_fetch_array($query2))
		    {

		    	$file="../pimages/advisor/".$row['photo'];
		    	$delphoto=unlink($file);

		   	}
			//Store New Image



			$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['photo']['name']);
			    $storeFile="../pimages/advisor/".$file_name;
			    $fileunq=$_FILES['photo']['tmp_name'];
			    move_uploaded_file($fileunq,$storeFile);



			$query=mysqli_query($con,"UPDATE `advisor` SET `name`='$name',`photo`='$file_name',`contact`='$contact',`details`='$details',`court`='$court',`status`='$status',`last_up`='$currentTime' WHERE `advisor_id`='$advisor_id'");
			

					if ($query) 
					{
						?>		
						<script>
						setTimeout(function () { 
						        swal({
						          title: "Successfully!",
						          text: "Legal Advisor Update Completed!",
						          type: "success",
						          confirmButtonText: "OK"
						        },
						        function(isConfirm){
						          if (isConfirm) {
						          	//history.back();
						            window.location.href = "advisor-all.php";
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
						          text: "Legal Advisor Not Update Properly!",
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
					$query=mysqli_query($con,"UPDATE `advisor` SET `name`='$name',`contact`='$contact',`details`='$details',`court`='$court',`status`='$status',`last_up`='$currentTime' WHERE `advisor_id`='$advisor_id'");


					if ($query) 
					{
						?>		
						<script>
						setTimeout(function () { 
						        swal({
						          title: "Successfully!",
						          text: "Legal Advisor Update Completed!",
						          type: "success",
						          confirmButtonText: "OK"
						        },
						        function(isConfirm){
						          if (isConfirm) {
						          	//history.back();
						            window.location.href = "advisor-all.php";
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
						          text: "Legal Advisor Not Update Properly!",
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