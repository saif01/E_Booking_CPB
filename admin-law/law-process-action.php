<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
$currDate=date('Y-m-d');
if(strlen($_SESSION['admin-law-login'])==0)
  { 
header('location:../admin');
}
else{  

$case_number=$_GET['case_number'];
$filling=$_GET['filling'];
$hearing=$_GET['hearing'];

include('../db/config.php');
?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php

if (isset($_POST['submit'])) {

	$last_hearing=$_POST['last_hearing'];
	$remarks=$_POST['remarks'];
	$pr_balance=$_POST['pr_balance'];
	$status=$_POST['status'];



$legal=mysqli_query($con,"UPDATE `law_report` SET `last_hearing`='$last_hearing',`pr_balance`='$pr_balance',`remarks`='$remarks',`status`='$status',`last_up`='$currDate' WHERE `case_no`='$case_number'");

$legalRemark=mysqli_query($con,"INSERT INTO `case_remarks`(`case_number`, `filling`, `hearing`, `last_hearing`, `remarks`, `status`) VALUES ('$case_number','$filling','$hearing','$last_hearing','$remarks','$status')");




	if ($legal && $legalRemark) 
	{
		?>		
		<script>
		setTimeout(function () { 
		        swal({
		          title: "Successfully!",
		          text: "Legal Report Update Completed!",
		          type: "success",
		          confirmButtonText: "OK"
		        },
		        function(isConfirm){
		          if (isConfirm) {
		            window.location.href = "report-all.php";
		          }
		        }); },0);

		</script>

	    <?php
	}

	else
	{
		// echo '<script language="javascript">';
		// echo 'alert("Error !!!!.. Data Not Inserted")';
		// echo '</script>';

		?>		
		<script>
		setTimeout(function () { 
		        swal({
		          title: "Error !",
		          text: "Legal Report Not Update Completed!",
		          type: "error",
		          confirmButtonText: "OK"
		        },
		        function(isConfirm){
		          if (isConfirm) {
		          	history.back();
		            //window.location.href = "report-all.php";
		          }
		        }); },0);

		</script>

	    <?php
	}



	 } 

}?>