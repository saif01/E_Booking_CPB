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

$hard_id=$_GET['hard_id'];

$query=mysqli_query($con,"SELECT cms_hard_complain.hard_id, cms_hard_complain.tools, cms_hard_complain.details, cms_hard_complain.documents, cms_hard_complain.status, cms_hard_complain.warrenty, cms_hard_complain.delivery, cms_hard_complain.last_up, cms_hard_complain.reg, cms_hard_category.category, cms_hard_subcategory.subcategory FROM cms_hard_complain INNER JOIN cms_hard_category ON cms_hard_complain.cat_id=cms_hard_category.cat_id INNER JOIN cms_hard_subcategory ON cms_hard_complain.sub_id=cms_hard_subcategory.sub_id  WHERE cms_hard_complain.hard_id='$hard_id' ");


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

	<p class="text-info text-center h3" >Application Complain Details of : <?php echo $hard_id ; ?></p>

<table class="table table-striped text-center ">


	<tr>
		<th>Category</th>
		<td><?php echo ($row['category']); ?></td>
	</tr>
	<tr>
		<th>SubCategory</th>
		<td><?php echo ($row['subcategory']); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo ($row['status']); ?></td>
	</tr>
	
	<tr>
		<th>Tools</th>
		<td><?php echo ($row['tools']); ?></td>
	</tr>
	<tr>
		<th>Warrenty</th>
		<td><?php $ws= $row['warrenty']; 
		
		if ( $ws=='s_w' ) {
			echo "Send to Warrenty";
		}
		elseif ( $ws=='a_s_w' ) {
			echo "Again send to Warrenty";
		}
		elseif ( $ws=='b_w' ) {
			echo "Back from Warrenty";
		}?></td>
	</tr>
	<tr>
		<th>Delivery</th>
		<td><?php echo ($row['delivery']); ?></td>
	</tr>
	<tr>
		<th>Last Update</th>
		<td><?php
			if ($row['last_up']=='') {
				echo "No Updates";
			}
			else
			{
				echo date("M j, Y", strtotime($row['last_up'])); 
			}?>

		 </td>
	</tr>
	<tr>
		<th>Documents</th>
		<td><?php 
		if ($row['documents']!='') 
		{
			echo "Yes, You Send";
		}
		else
		{
			echo "No, You Don't Send";
		} ?>
			
		</td>
	</tr>
	
	<tr>
		<th>Details</th>
		<td><?php echo ($row['details']); ?></td>
	</tr>
	


</table>	
</div>



</body>

</html>

<?php } ?>