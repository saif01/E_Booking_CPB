<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['cms_login_id'])==0)
  { 
header('location:../index');
}
else{   
include('../db/config.php');

$app_id=$_GET['app_id'];

$query=mysqli_query($con,"SELECT cms_app_complain.app_id,cms_app_complain.com_details, cms_app_complain.document1, cms_app_complain.document2, cms_app_complain.document3, cms_app_complain.document4, cms_app_complain.status, cms_app_complain.reg, cms_app_soft.soft_name, cms_app_module.mod_name FROM cms_app_complain INNER JOIN cms_app_soft ON cms_app_complain.soft_id=cms_app_soft.soft_id INNER JOIN cms_app_module ON cms_app_complain.mod_id=cms_app_module.mod_id WHERE cms_app_complain.app_id='$app_id' ");


$row=$query->fetch_assoc();

?>

<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <?php require('common/icon.php'); ?> 

    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?> 


</head>

<body>
<div class="container" style="margin: 20px;">

	<p class="text-info text-center h3" >Application Complain Details of : <?php echo $app_id ; ?></p>

<table class="table table-striped text-center ">


	<tr>
		<th>Sofware</th>
		<td><?php echo ($row['soft_name']); ?></td>
	</tr>
	<tr>
		<th>Module</th>
		<td><?php echo ($row['mod_name']); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo ($row['status']); ?></td>
	</tr>
	<tr>
		<th>Documents</th>
		<td><?php 
		if ($row['document1']!='') 
		{
			echo "Yes, You Send";
		}
		else
		{
			echo "No, You Don't Send";
		}

		 ?></td>
	</tr>
	<tr>
		<th>Details</th>
		<td><?php echo ($row['com_details']); ?></td>
	</tr>
	


</table>	
</div>



</body>

</html>

<?php } ?>