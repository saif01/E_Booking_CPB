<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
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

if ($_GET['user_id']) {
	
$id=$_GET['user_id'];


// For delete file
$query2=mysqli_query($con,"SELECT `user_img` FROM `user` WHERE `user_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file="../pimages/user/".$row['user_img'];
    	$delphoto=unlink($file);

   	}

// For delete database record
	$delquery=mysqli_query($con,"DELETE FROM `user` WHERE `user_id`='$id' ");

			if ($delquery && $delphoto) 
			            {
			            		?>
		                  	<script>
		                        setTimeout(function () { 
		                                swal({
		                                  title: "Successfully!",
		                                  text: "User Delete Completed!",
		                                  type: "success",
		                                  confirmButtonText: "OK"
		                                },
		                                function(isConfirm){
		                                  if (isConfirm) {
		                                    window.location.href = "user-all.php";
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
			                                  text: "User Or All Data Not Deleted!",
			                                  type: "error",
			                                  confirmButtonText: "OK"
			                                },
			                                function(isConfirm){
			                                  if (isConfirm) {
			                                    window.location.href = "user-all.php";
			                                  }
			                                }); },0);
			                       
			                      </script>
	            					<?php
			            }
		 }

}?>

