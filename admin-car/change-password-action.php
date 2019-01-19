<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-car-login'])==0)
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

$admin_login=$_SESSION['admin-car-login'];
$admin_pass= $_POST['admin_pass'];
$newpassword= $_POST['newpassword'];



$sql=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_login`='$admin_login' AND `admin_pass`='$admin_pass'");
$num=mysqli_num_rows($sql);

	if($num>0)
    {
        $query=mysqli_query($con,"UPDATE `admin` SET `admin_pass`='$newpassword' WHERE `admin_login`='$admin_login'");

			if ($query) 
			{
				?>		
				<script>
				setTimeout(function () { 
				        swal({
				          title: "Successfully!",
				          text: "Your Password Change Completed!",
				          type: "success",
				          confirmButtonText: "OK"
				        },
				        function(isConfirm){
				          if (isConfirm) {
				          	//history.back();
				            window.location.href = "logout.php";
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
				          text: "Your Password Change Completed!",
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
				//echo '<script language="javascript">';
				//echo 'alert("Error !!!!.. Data Not Inserted")';
				//echo '</script>';

				?>		
				<script>
				setTimeout(function () { 
				        swal({
				          title: "Error Genareted!",
				          text: "Your Password Change Completed!",
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


 }?>