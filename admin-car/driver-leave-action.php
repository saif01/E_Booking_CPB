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

$driver_id=$_GET['driver_id'];
$car_id=$_GET['car_id'];

$query=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' ");

$row=$query->fetch_assoc();

if (isset($_POST[submit])) 
{
   
    $leave_satart= $_POST['leave_satart'] . ' ' . $_POST['start_time'];
    $leave_end = $_POST['leave_end'] . ' ' . $_POST['return_time'];
    $leaveType = $_POST['leaveType'];
   $leave_status='1';

    if ($leaveType=='personal') 
    {
//************* Driver leave Table data store SQl *****************//     
   $sql2=mysqli_query($con,"INSERT INTO `driver_leave`(`driver_id`, `driver_leave_start`, `driver_leave_end`, `leave_status`) VALUES ('$driver_id','$leave_satart','$leave_end','$leave_status')");

//************* Car Driver Table data Update SQL *****************//
   $sql=mysqli_query($con,"UPDATE `car_driver` SET `leave_start`='$leave_satart',`leave_end`='$leave_end' WHERE `driver_id`='$driver_id'");

               
    }

    elseif ($leaveType=='police') 
    {
//************ Police Recogition Data Store In Database ***************//
        $req_st='1';
        $police_recog_Sql=mysqli_query($con,"INSERT INTO `police_req`(`req_start`, `req_end`, `driver_id`, `car_id`, `req_st`) VALUES ('$leave_satart','$leave_end','$driver_id','$car_id','$req_st')");

        
        
    }

   


}


//**************** Driver Leave Cancel Update *********************//
if (isset($_POST['leave_cancel'])) 
{
    
    $leave_status=0;

    //for clearing booking value in driver table 
    $sql3=mysqli_query($con,"UPDATE `car_driver` SET `leave_start`='',`leave_end`='' WHERE `driver_id`='$driver_id'");
    $sql4=mysqli_query($con,"UPDATE `driver_leave` SET `leave_status`='$leave_status' WHERE `driver_id`='$driver_id' ORDER BY `driver_leave_id` DESC LIMIT 1");

            
}

					?>
    				<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Update Completed!",
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
                      
<?php }?>