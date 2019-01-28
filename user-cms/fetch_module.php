<?php
 require('../db/config.php');
$soft_id=$_POST[soft_id];


$soft = '';
$query = "SELECT * FROM `cms_app_module` WHERE `soft_id`='$soft_id' ORDER BY `mod_name`";
$result = mysqli_query($con, $query);
$soft= '<option value="">Select Software Module Name</option>';
while($row = mysqli_fetch_array($result))
{
 
 $soft .= '<option value="'.$row["mod_id"].'">'.$row["mod_name"].'</option>';
}

echo $soft;
?>