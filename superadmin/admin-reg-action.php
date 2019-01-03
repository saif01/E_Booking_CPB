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

$admin_login = $_POST['admin_login'];
$admin_name = $_POST['admin_name'];
$admin_pass = $_POST['admin_pass'];
$admin_dept = $_POST['admin_dept'];
$admin_contact =$_POST['admin_contact'];
$admin_contract = $_POST['admin_contract'];
$admin_officeId = $_POST['admin_officeId'];
$admin_st_ch = $_POST['admin_st'];




          $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['admin_img']['name']);
            $storeFile="../pimages/admin/".$file_name;
            $fileName=$_FILES['admin_img']['tmp_name'];

            move_uploaded_file($fileName,$storeFile);


            if ($admin_st_ch =='carpool') {

                $admin_st='1';
                $admin_car_st='1';
                $admin_room_st='0';
                $admin_super_st='0';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_super_st')");

                ?>
                <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Car Section Admin Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "admin-all.php";
                                  }
                                }); },0);
                       
                      </script>
                
                <?php
                exit();
               
            }

             elseif ($admin_st_ch=='room') {

               $admin_st='1';
                $admin_car_st='0';
                $admin_room_st='1';
                $admin_super_st='0';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_super_st')");

                ?>
               <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Section Admin Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "admin-all.php";
                                  }
                                }); },0);
                       
                      </script>
                <?php
                exit();
               
            }

            elseif ($admin_st_ch=='car_room') {

              $admin_st='1';
                $admin_car_st='1';
                $admin_room_st='1';
                $admin_super_st='0';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_super_st')");

                ?>
               <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Car & Room Section Admin Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "admin-all.php";
                                  }
                                }); },0);
                       
                      </script>
                <?php
                exit();
               
            }

            elseif ($admin_st_ch=='super') {

                $admin_st='1';
                $admin_car_st='1';
                $admin_room_st='1';
                $admin_super_st='1';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_super_st')");

                ?>
                <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Super Admin Registration Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "admin-all.php";
                                  }
                                }); },0);
                       
                      </script>
                <?php
               exit();
            }

            else{
               ?>
                <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Sorry!",
                                  text: "Data Not Registered!",
                                  type: "error",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "admin-all.php";
                                  }
                                }); },0);
                       
                      </script>
                <?php
            }


    } 

}?>