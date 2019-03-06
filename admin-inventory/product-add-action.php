<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');
$currentTime = date('Y-m-d H:i:s', time ());//H, Time in 24 hours show , h, for 12
if(strlen($_SESSION['admin_inventory'])==0)
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

$cat_id=$_POST['cat_id'];
$sub_id=$_POST['sub_id'];
$brand=$_POST['brand'];
$serial=$_POST['serial'];
$warranty=$_POST['warranty'];
$remarks=$_POST['remarks'];


$file=$_FILES['file']['tmp_name'];

	if ($file !=="") 
	{
		$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['file']['name']);
			    $storeFile="../pimages/product_file/".$file_name;
			    $fileunq=$_FILES['file']['tmp_name'];
			    move_uploaded_file($fileunq,$storeFile);

		$query=mysqli_query($con,"INSERT INTO `inv_products`(`cat_id`, `sub_id`, `brand`, `serial`, `warranty`, `remarks`, `file`) VALUES ('$cat_id','$sub_id','$brand','$serial','$warranty','$remarks','$file_name')");

	}

	else{
		$query=mysqli_query($con,"INSERT INTO `inv_products`(`cat_id`, `sub_id`, `brand`, `serial`, `warranty`, `remarks`) VALUES ('$cat_id','$sub_id','$brand','$serial','$warranty','$remarks')");

	}

		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Product Add Completed!",
			          type: "success",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	//history.back();
			            window.location.href = "product-all";
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
			          text: "Product Add Not Completed!",
			          type: "error",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	//history.back();
			            window.location.href = "product-all";
			          }
			        }); },0);

			</script>

		    <?php
		}


	} 


 }?>