<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-all-login'])==0)
  { 
header('location:../../admin');
}
else{ 
$driver_id=$_GET['driver_id'];
include('../../db/config.php');
?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../../assets/coustom/swwetalert/jslib.js"></script>
<script src="../../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php


if (isset($_POST['submit'])) {

$driver_name=$_POST['driver_name'];
$for_car=$_POST['for_car'];
$driver_phone=$_POST['driver_phone'];
$driver_nid=$_POST['driver_nid'];
$driver_license=$_POST['driver_license'];
$driver_st=1;


$fileName=$_FILES['driver_img']['tmp_name'];

        if ($fileName !=="") 
        {
             $user_id=$_GET['user_id'];
             $sql=mysqli_query($con,"SELECT `driver_img` FROM `car_driver` WHERE `driver_id`='$driver_id' ");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../../pimages/driver/".$row2['driver_img'];
                        unlink($file);
                    }
              
            
            $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['driver_img']['name']);
                $storeFile="../../pimages/driver/".$file_name;
                $fileName=$_FILES['driver_img']['tmp_name'];

                move_uploaded_file($fileName,$storeFile);

                           
                $query2=mysqli_query($con,"UPDATE `car_driver` SET `driver_name`='$driver_name',`driver_phone`='$driver_phone', `driver_img`='$file_name',`driver_license`='$driver_license',`driver_nid`='$driver_nid',`driver_status`='$driver_st' WHERE `driver_id` ='$driver_id'");

                ?>
            		<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Driver Update Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                   window.location.href = "driver-all.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
        
       

        } 
            else{

                
               $query=mysqli_query($con,"UPDATE `car_driver` SET `driver_name`='$driver_name',`driver_phone`='$driver_phone',`driver_license`='$driver_license',`driver_nid`='$driver_nid',`driver_status`='$driver_st' WHERE `driver_id` ='$driver_id'");

            ?>
            		<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Driver Update Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                   window.location.href = "driver-all.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
            }

 	}

 } ?>