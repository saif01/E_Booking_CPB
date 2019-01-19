<?php 
include('../db/config.php');
if(!empty($_POST["check_value"])) 
{
	$check_value= $_POST["check_value"];
	
		$result =mysqli_query($con,"SELECT * FROM `user` WHERE `user_login`='$check_value'");
		$count=mysqli_num_rows($result);
		if($count>0)
		{
		echo "<span style='color:red'> User ID already exists .</span>";
		 echo "<script>$('#submit').prop('disabled',true);</script>";
		} 
		else
		{
			
			echo "<span style='color:green'> User ID available for Registration .</span>";
		    echo "<script>$('#submit').prop('disabled',false);</script>";
		}
}


 


?>
