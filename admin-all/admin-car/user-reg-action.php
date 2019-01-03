<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-all-login'])==0)
  { 
header('location:../../admin');
}
else{ 
include('../../db/config.php');
?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../../assets/coustom/swwetalert/jslib.js"></script>
<script src="../../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->

<?php

if (isset($_POST['submit'])) {

$user_login=$_POST['user_login'];
$user_pass=$_POST['user_pass'];
$user_name=$_POST['user_name'];
$user_dept=$_POST['user_dept'];
$user_contact=$_POST['user_contact'];
$user_office_id=$_POST['user_office_id'];
$user_st_ch=$_POST['user_st_ch'];
$user_st = 1;


$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['user_img']['name']);
    $storeFile="../../pimages/user/".$file_name;
    $fileName=$_FILES['user_img']['tmp_name'];

    move_uploaded_file($fileName,$storeFile);

    if ($user_st_ch=='carpool') 
        {   
            $user_car_st='1';
            $user_room_st='0';

      $query=mysqli_query($con,"INSERT INTO `user`(`user_login`, `user_pass`, `user_name`, `user_img`, `user_dept`, `user_contact`, `user_office_id`, `user_st`, `user_car_st`, `user_room_st`) VALUES ('$user_login','$user_pass','$user_name','$file_name','$user_dept','$user_contact','$user_office_id','$user_st','$user_car_st','$user_room_st')");
        ?>
                  <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Car Pool User Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-all-info.php";
                                  }
                                }); },0);
                       
                      </script>
            
            <?php
        }

        elseif ($user_st_ch=='room') 
        {   
            $user_car_st='0';
            $user_room_st='1';

            $query=mysqli_query($con,"INSERT INTO `user`(`user_login`, `user_pass`, `user_name`, `user_img`, `user_dept`, `user_contact`, `user_office_id`, `user_st`, `user_car_st`, `user_room_st`) VALUES ('$user_login','$user_pass','$user_name','$file_name','$user_dept','$user_contact','$user_office_id','$user_st','$user_car_st','$user_room_st')");
        ?>
            <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Booking User Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-all-info.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
        }
         elseif ($user_st_ch=='car_room') 
        {   
            $user_car_st='1';
            $user_room_st='1';

            $query=mysqli_query($con,"INSERT INTO `user`(`user_login`, `user_pass`, `user_name`, `user_img`, `user_dept`, `user_contact`, `user_office_id`, `user_st`, `user_car_st`, `user_room_st`) VALUES ('$user_login','$user_pass','$user_name','$file_name','$user_dept','$user_contact','$user_office_id','$user_st','$user_car_st','$user_room_st')");
        ?>
                    <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Car And Room Booking User Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-all-info.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
        }

        else{
            ?>
                   <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Error!",
                                  text: "User Registration Not Completed!",
                                  type: "error",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "user-all-info.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
        }

 }

             
}?>
