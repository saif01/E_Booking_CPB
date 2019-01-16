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

$department=$_POST['department'];

$query=mysqli_query($con,"INSERT INTO `case_dept`(`department`) VALUES ('$department')");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Case Department Add Completed!",
			          type: "success",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			            window.location.href = "case-dept-add.php";
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
			          text: "Case Department Add Not Completed!",
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