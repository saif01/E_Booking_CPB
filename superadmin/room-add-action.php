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

$room_name=$_POST['room_name'];
$room_capicity=$_POST['room_capicity'];
$room_details=$_POST['room_details'];
$projector=$_POST['projector'];
$show_st=1;


    $file_name1=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img1']['name']);
    $storeFile1="../pimages/room/".$file_name1;
    $fileName1=$_FILES['room_img1']['tmp_name'];
    move_uploaded_file($fileName1,$storeFile1);

    $file_name2=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img2']['name']);
    $storeFile2="../pimages/room/".$file_name2;
    $fileName2=$_FILES['room_img2']['tmp_name'];
    move_uploaded_file($fileName2,$storeFile2);

    $file_name3=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img3']['name']);
    $storeFile3="../pimages/room/".$file_name3;
    $fileName3=$_FILES['room_img3']['tmp_name'];
    move_uploaded_file($fileName3,$storeFile3);


$query=mysqli_query($con,"INSERT INTO `room`(`room_name`, `room_img1`, `room_img2`, `room_img3`, `room_capicity`, `projector`, `room_details`, `show_st`) VALUES ('$room_name','$file_name1','$file_name2','$file_name3','$room_capicity','$projector','$room_details','$show_st')");

?>		
		<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "room-all.php";
                                  }
                                }); },0);
                       
                      </script>
    

    <?php } 

}?>
