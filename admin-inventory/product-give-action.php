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


$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$brand=$_POST['brand'];
$serial=$_POST['serial'];
$pro_id=$_POST['pro_id'];
$b_u_location=$_POST['b_u_location'];
$dept=$_POST['dept'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$position=$_POST['position'];
$quentity=$_POST['quentity'];
$remarks=$_POST['remarks'];

$query=mysqli_query($con,"INSERT INTO `inv_product_give`(`category`, `subcategory`, `brand`, `serial`, `pro_id`, `quentity`, `b_u_location`, `dept`, `name`, `contact`, `position`, `remarks`) VALUES ('$category','$subcategory','$brand','$serial','$pro_id','$quentity','$b_u_location','$dept','$name','$contact','$position','$remarks')");


		if ($query) 
		{
			?>		
			<script>
			setTimeout(function () { 
			        swal({
			          title: "Successfully!",
			          text: "Product Giving Update Completed!",
			          type: "success",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	//window.opener.location.reload();
			          	history.back();
						//window.close();
			            
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
			          text: "Product Giving Not Completed!",
			          type: "error",
			          confirmButtonText: "OK"
			        },
			        function(isConfirm){
			          if (isConfirm) {
			          	history.back();
			          	//window.opener.location.reload();
			            //window.location.href = "case-dept-add.php";
			          }
			        }); },0);

			</script>

		    <?php
		}


	} 


 }?>