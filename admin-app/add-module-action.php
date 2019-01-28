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

$mod_name=$_POST['mod_name'];
$soft_id=$_POST['soft_id'];


$query=mysqli_query($con,"INSERT INTO `cms_app_module`(`soft_id`, `mod_name`) VALUES ('$soft_id','$mod_name')");

		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Application Module Name Add Completed!",
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
			          text: "Application Module Name Add Not Completed!",
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