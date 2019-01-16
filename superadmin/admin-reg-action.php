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
$admin_st='1';



          $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['admin_img']['name']);
            $storeFile="../pimages/admin/".$file_name;
            $fileName=$_FILES['admin_img']['tmp_name'];

            move_uploaded_file($fileName,$storeFile);


            if ($admin_st_ch == 'carpool') {

                
                $admin_car_st='1';
                $admin_room_st='0';
                $admin_law_st='0';
                $admin_super_st='0';

                $queryCarpool=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_law_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_law_st','$admin_super_st')");

                if ($queryCarpool) 
                  {
                      ?>
                        <script>
                            setTimeout(function () { 
                                    swal({
                                      title: "Successfully!",
                                      text: "Car Pool Admin Registration Completed!",
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
                  }
                  else
                  {
                        ?>
                         <script>
                              setTimeout(function () { 
                                      swal({
                                        title: "Error!",
                                        text: "Admin Registration Not Completed!",
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

             elseif ($admin_st_ch == 'room') {

               $admin_car_st='0';
                $admin_room_st='1';
                $admin_law_st='0';
                $admin_super_st='0';

                $queryroom=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_law_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_law_st','$admin_super_st')");

                if ($queryroom) 
                  {
                      ?>
                        <script>
                            setTimeout(function () { 
                                    swal({
                                      title: "Successfully!",
                                      text: "Room Booking Admin Registration Completed!",
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
                  }
                  else
                  {
                        ?>
                         <script>
                              setTimeout(function () { 
                                      swal({
                                        title: "Error!",
                                        text: "Admin Registration Not Completed!",
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

            elseif ($admin_st_ch == 'law') {

                $admin_car_st='0';
                $admin_room_st='0';
                $admin_law_st='1';
                $admin_super_st='0';

                $querylaw=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_law_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_law_st','$admin_super_st')");

               if ($querylaw) 
                  {
                      ?>
                        <script>
                            setTimeout(function () { 
                                    swal({
                                      title: "Successfully!",
                                      text: "Legal Admin Registration Completed!",
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
                  }
                  else
                  {
                        ?>
                         <script>
                              setTimeout(function () { 
                                      swal({
                                        title: "Error!",
                                        text: "Admin Registration Not Completed!",
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

            elseif ($admin_st_ch=='all') {

               $admin_car_st='1';
                $admin_room_st='1';
                $admin_law_st='1';
                $admin_super_st='0';

                $queryall=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_law_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_law_st','$admin_super_st')");

                if ($queryall) 
                  {
                      ?>
                        <script>
                            setTimeout(function () { 
                                    swal({
                                      title: "Successfully!",
                                      text: "All Section Admin Registration Completed!",
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
                  }
                  else
                  {
                        ?>
                         <script>
                              setTimeout(function () { 
                                      swal({
                                        title: "Error!",
                                        text: "Admin Registration Not Completed!",
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

            elseif ($admin_st_ch == 'super') {

               $admin_car_st='1';
                $admin_room_st='1';
                $admin_law_st='1';
                $admin_super_st='1';

                $querysuper=mysqli_query($con,"INSERT INTO `admin`(`admin_login`, `admin_pass`, `admin_name`, `admin_img`, `admin_dept`, `admin_contact`, `admin_st`, `admin_car_st`, `admin_room_st`, `admin_law_st`, `admin_super_st`) VALUES ('$admin_login','$admin_pass','$admin_name','$file_name','$admin_dept','$admin_contact','$admin_st','$admin_car_st','$admin_room_st','$admin_law_st','$admin_super_st')");

                if ($querysuper) 
                  {
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
                  }
                  else
                  {
                        ?>
                         <script>
                              setTimeout(function () { 
                                      swal({
                                        title: "Error!",
                                        text: "Admin Registration Not Completed!",
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