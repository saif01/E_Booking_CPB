<?php
 require('../db/config.php');
$cat_id=$_POST[cat_id];


$output = '';
$query = "SELECT * FROM `cms_hard_subcategory` WHERE `cat_id`='$cat_id' ORDER BY `subcategory`";
$result = mysqli_query($con, $query);
$output= '<option value="">Select Subcategory Name</option>';
while($row = mysqli_fetch_array($result))
{
 
 $output .= '<option value="'.$row["sub_id"].'">'.$row["subcategory"].'</option>';
}

echo $output;
?>