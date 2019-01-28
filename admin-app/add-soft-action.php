<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_app_login'])==0)
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

$soft_name=$_POST['soft_name'];

$query=mysqli_query($con,"INSERT INTO `cms_app_soft`(`soft_name`) VALUES ('$soft_name')");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Application Name Add Completed!",
			          type: "success",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	history.back();
			            //window.location.href = "case-dept-add.php";
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
			          text: "Application Name Add Not Completed!",
			          type: "error",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	history.back();
			            //window.location.href = "case-dept-add.php";
			          }
			        }); },0);

			</script>

		    <?php
		}


	} 


 }?>