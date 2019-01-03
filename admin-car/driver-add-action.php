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

if (isset($_POST['submit'])) {

$driver_name=$_POST['driver_name'];
$for_car=$_POST['for_car'];
$driver_phone=$_POST['driver_phone'];
$driver_nid=$_POST['driver_nid'];
$driver_license=$_POST['driver_license'];
$driver_st=1;

$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['driver_img']['name']);
    $storeFile="../pimages/driver/".$file_name;
    $fileName=$_FILES['driver_img']['tmp_name'];

    move_uploaded_file($fileName,$storeFile);



 $query=mysqli_query($con,"INSERT INTO `car_driver`(`car_id`, `driver_name`, `driver_phone`, `driver_img`, `driver_license`, `driver_nid`, `driver_status`) VALUES ('$for_car','$driver_name','$driver_phone','$file_name','$driver_license','$driver_nid','$driver_st')");


?>
    				<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Driver Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "driver-all.php";
                                  }
                                }); },0);
                       
                      </script>
                      
    <?php } 


 }?>