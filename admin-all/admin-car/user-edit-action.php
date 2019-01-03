<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-all-login'])==0)
  { 
header('location:../../admin');
}
else{
include('../../db/config.php');
$user_id=$_GET['user_id'];

?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../../assets/coustom/swwetalert/jslib.js"></script>
<script src="../../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php

if (isset($_POST['submit'])) {


$user_office_id=$_POST['user_office_id'];
$user_name=$_POST['user_name'];
$user_dept=$_POST['user_dept'];
$user_contact=$_POST['user_contact'];
$user_st = '1';


$fileName=$_FILES['user_img']['tmp_name'];

        if ($fileName !=="") 
        {
             
             $sql=mysqli_query($con,"SELECT `user_img` FROM `user` WHERE `user_id`='$user_id' ");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../../pimages/user/".$row2['user_img'];
                        unlink($file);
                    }
              
            
             $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['user_img']['name']);

                $storeFile="../../pimages/user/".$file_name;
                $fileName=$_FILES['user_img']['tmp_name'];
                move_uploaded_file($fileName,$storeFile);

                           

                $query2=mysqli_query($con,"UPDATE `user` SET `user_name`='$user_name',`user_img`='$file_name',`user_dept`='$user_dept',`user_contact`='$user_contact',`user_office_id`='$user_office_id',`user_st`='1' WHERE `user_id`='$user_id'");

                ?>
                <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "User Registration Completed!",
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
        else
        {

                
                $query=mysqli_query($con,"UPDATE `user` SET `user_name`='$user_name',`user_dept`='$user_dept',`user_contact`='$user_contact',`user_office_id`='$user_office_id',`user_st`='1' WHERE `user_id`='$user_id'");

            ?>
                    <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "User Registration Completed!",
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

		}
}

?>
