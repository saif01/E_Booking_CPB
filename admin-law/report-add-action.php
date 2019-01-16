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

	$case_no=$_POST['case_no'];
	$customer=$_POST['customer'];
	$case_dept=$_POST['case_dept'];
	$complaint=$_POST['complaint'];
	$filling=$_POST['filling'];
	$hearing=$_POST['hearing'];
	$last_hearing=$_POST['last_hearing'];
	$pre_balance=$_POST['pre_balance'];
	$remarks=$_POST['remarks'];
	$pr_balance=$_POST['pr_balance'];
	$status=$_POST['status'];
	$show_st=$_POST['show_st'];


$legal=mysqli_query($con,"INSERT INTO `law_report`(`case_no`, `customer`, `complaint`, `case_dept`, `filling`, `hearing`, `last_hearing`, `pre_balance`, `pr_balance`, `remarks`, `status`, `show_st`) VALUES ('$case_no','$customer','$complaint','$case_dept','$filling','$hearing','$last_hearing','$pre_balance','$pr_balance','$remarks','$status','$show_st')");

$legalRemark=mysqli_query($con,"INSERT INTO `case_remarks`(`case_number`, `filling`, `hearing`, `last_hearing`, `remarks`, `status`) VALUES ('$case_no','$filling','$hearing','$last_hearing','$remarks','$status')");




	if ($legal && $legalRemark) 
	{
		?>		
		<script>
		setTimeout(function () { 
		        swal({
		          title: "Successfully!",
		          text: "Legal Report Add Completed!",
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
		?>		
		<script>
		setTimeout(function () { 
		        swal({
		          title: "Error!",
		          text: "Legal Report Not Add Completed!",
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