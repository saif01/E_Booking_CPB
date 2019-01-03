<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin/index');
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

$car_name=$_POST['car_name'];
$car_namePlate=$_POST['car_namePlate'];
$car_type=$_POST['car_type'];
$car_capacity=$_POST['car_capacity'];
$car_gearbox=$_POST['car_gearbox'];
$car_door=$_POST['car_door'];
$car_gps=$_POST['car_gps'];
$temp_car=$_POST['temp_car'];

$car_aircondition=$_POST['car_aircondition'];
$car_power_doorLock=$_POST['car_power_doorLock'];
$car_cd_player=$_POST['car_cd_player'];

$remarks=$_POST['remarks'];

    $file_name1=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgA']['name']);
    $storeFile1="../pimages/car/".$file_name1;
    $fileName1=$_FILES['imgA']['tmp_name'];
    move_uploaded_file($fileName1,$storeFile1);

    $file_name2=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgB']['name']);
    $storeFile2="../pimages/car/".$file_name2;
    $fileName2=$_FILES['imgB']['tmp_name'];
    move_uploaded_file($fileName2,$storeFile2);

    $file_name3=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['imgC']['name']);
    $storeFile3="../pimages/car/".$file_name3;
    $fileName3=$_FILES['imgC']['tmp_name'];
    move_uploaded_file($fileName3,$storeFile3);


$query=mysqli_query($con,"INSERT INTO `tbl_car`(`car_name`, `car_namePlate`, `temp_car`, `car_type`, `car_capacity`, `car_img1`, `car_img2`, `car_img3`, `car_door`, `car_gearbox`, `car_gps`, `car_aircobdition`, `car_power_doorLock`, `car_cdPlayer`, `car_remarks`) VALUES ('$car_name','$car_namePlate','$temp_car','$car_type','$car_capacity','$file_name1','$file_name2','$file_name3','$car_door','$car_gearbox','$car_gps','$car_aircondition','$car_power_doorLock','$car_cd_player','$remarks')");


?>
				<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Car Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "car-all.php";
                                  }
                                }); },0);
                       
                      </script>

                      <?php

                  }

    }?>