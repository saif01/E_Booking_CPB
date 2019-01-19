<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
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
$admin_id=$_GET['admin_id'];

if (isset($_POST['submit'])) {

$admin_name = $_POST['admin_name'];
$admin_dept = $_POST['admin_dept'];
$admin_contact =$_POST['admin_contact'];
$admin_st='1';

$fileName=$_FILES['admin_img']['tmp_name'];

        if ($fileName !=="") 
        {
        // ******** Delete Img File From Folder ********//
            $sql=mysqli_query($con,"SELECT `admin_img` FROM `admin` WHERE `admin_id`='$admin_id' ");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/admin/".$row2['admin_img'];
                        unlink($file);
                    }
        //******** Store Img On Folder ****************//
          $file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['admin_img']['name']);
            $storeFile="../pimages/admin/".$file_name;
            $fileName=$_FILES['admin_img']['tmp_name'];

            move_uploaded_file($fileName,$storeFile);
        //******** Store value on Data Base *************//
            
            $query=mysqli_query($con,"UPDATE `admin` SET `admin_name`='$admin_name',`admin_img`='$file_name',`admin_dept`='$admin_dept',`admin_contact`='$admin_contact',`admin_st`='$admin_st' WHERE `admin_id`='$admin_id'");

               if ($query) 
                        {
                                ?>
                            <script>
                                setTimeout(function () { 
                                        swal({
                                          title: "Successfully!",
                                          text: "Admin Update Completed!",
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
                                              text: "User Update Not Completed!",
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

              $query=mysqli_query($con,"UPDATE `admin` SET `admin_name`='$admin_name',`admin_dept`='$admin_dept',`admin_contact`='$admin_contact',`admin_st`='$admin_st' WHERE `admin_id`='$admin_id'");

            if ($query) 
                        {
                                ?>
                            <script>
                                setTimeout(function () { 
                                        swal({
                                          title: "Successfully!",
                                          text: "Admin Update Completed!",
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
                                              text: "Admin Update Not Completed!",
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

    }

}?>






