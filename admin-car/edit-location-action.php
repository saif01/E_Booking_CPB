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
$location_id=$_GET['location_id'];

if (isset($_POST['submit'])) {

$location=$_POST['location'];

 $query=mysqli_query($con,"UPDATE `location` SET `location`='$location' WHERE `location_id`='$location_id'");

?>
    				<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Location Update Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.opener.location.reload();
							        window.close();
                                  }
                                }); },0);
                       
                      </script>
                      
    <?php } 


 }?>