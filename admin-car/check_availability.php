<?php 
include('../db/config.php');
if(!empty($_POST["check_value"])) 
{
	$check_value= $_POST["check_value"];
	
	
		$result =mysqli_query($con,"SELECT  `driver_name` FROM `car_driver` WHERE `driver_name` ='$check_value'");
		$count=mysqli_num_rows($result);
		if($count>0)
		{
		 echo "<span style='color:red'> Name already exists .</span>";
			// echo "<span style='color:red'><a href='abc.php?id= $check_value2'> Name already exists <button class='btn btn-danger' > Show </button></a>  .</span>";

		 // echo "<script>alert('are you see ????? '); </script>";

		 echo "<script>$('#submit').prop('disabled',true);</script>";
		} 
		else
		{
			
			echo "<span style='color:green'> Name available for Registration .</span>";
		    echo "<script>$('#submit').prop('disabled',false);</script>";
		}
}





?>
