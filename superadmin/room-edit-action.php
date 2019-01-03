<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin/index');
}
else{ 

include('../db/config.php');
$room_id=$_GET['room_id'];

?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php

 
if (isset($_POST['submit'])) {

$room_capicity=$_POST['room_capicity'];
$room_details=$_POST['room_details'];
$projector=$_POST['projector'];

$fileName1=$_FILES['room_img1']['tmp_name'];
$fileName2=$_FILES['room_img2']['tmp_name'];
$fileName3=$_FILES['room_img3']['tmp_name'];

        if ($fileName1 !=="" && $fileName2 !=="" && $fileName3 !=="") 
        {
             
             $sql=mysqli_query($con,"SELECT `room_img1`, `room_img2`, `room_img3` FROM `room` WHERE `room_id`='$room_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/room/".$row2['room_img1'];
                        unlink($file);
                        $file="../pimages/room/".$row2['room_img2'];
                        unlink($file);
                        $file="../pimages/room/".$row2['room_img3'];
                        unlink($file);
                    }
              


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

                           
                $query2=mysqli_query($con,"UPDATE `room` SET `room_img1`='$file_name1',`room_img2`='$file_name2',`room_img3`='$file_name3',`room_capicity`='$room_capicity',`room_details`='$room_details',`projector`='$projector' WHERE `room_id`='$room_id' ");

                ?>
                	<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Update Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "room-all.php";
                                  }
                                }); },0);
                       
                      </script>
           
            <?php
        
                 } 

                 elseif ($fileName1 !=="") 
            {
            
             $sql=mysqli_query($con,"SELECT `room_img1` FROM `room` WHERE `room_id`='$room_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/room/".$row2['room_img1'];
                        unlink($file);
                    }
                         
             $file_name1=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img1']['name']);

                $storeFile1="../pimages/room/".$file_name1;
                $fileName1=$_FILES['room_img1']['tmp_name'];
                move_uploaded_file($fileName1,$storeFile1);

                           

                $query2=mysqli_query($con,"UPDATE `room` SET `room_img1`='$file_name1',`room_capicity`='$room_capicity',`room_details`='$room_details',`projector`='$projector' WHERE `room_id`='$room_id' ");

                ?>
            		<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Update Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "room-all.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
        
                 } 

                 elseif ($fileName2 !=="") 
             {
             
             $sql=mysqli_query($con,"SELECT `room_img2` FROM `room` WHERE `room_id`='$room_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/room/".$row2['room_img2'];
                        unlink($file);
                    }
                      
              $file_name2=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img2']['name']);
                $storeFile2="../pimages/room/".$file_name2;
                $fileName2=$_FILES['room_img2']['tmp_name'];
                move_uploaded_file($fileName2,$storeFile2);

                           

                $query2=mysqli_query($con,"UPDATE `room` SET `room_img2`='$file_name2',`room_capicity`='$room_capicity',`room_details`='$room_details',`projector`='$projector' WHERE `room_id`='$room_id' ");

                ?>
            		<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Update Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "room-all.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
        
                 } 

                 elseif ($fileName3 !=="") 
            {
             
             $sql=mysqli_query($con,"SELECT `room_img3` FROM `room` WHERE `room_id`='$room_id'");
               while($row2=mysqli_fetch_array($sql))
                   {
                       $file="../pimages/room/".$row2['room_img3'];
                        unlink($file);
                    }
              
            
             $file_name3=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['room_img3']['name']);
                $storeFile3="../pimages/room/".$file_name3;
                $fileName3=$_FILES['room_img3']['tmp_name'];
                move_uploaded_file($fileName3,$storeFile3);
                           

                $query2=mysqli_query($con,"UPDATE `room` SET `room_img3`='$file_name3',`room_capicity`='$room_capicity',`room_details`='$room_details',`projector`='$projector' WHERE `room_id`='$room_id'");

                ?>
            		<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Update Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "room-all.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
        
                 } 

            else{
  
                $query=mysqli_query($con,"UPDATE `room` SET `room_capicity`='$room_capicity',`room_details`='$room_details',`projector`='$projector' WHERE `room_id`='$room_id'");

            ?>
            	<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Room Update Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "room-all.php";
                                  }
                                }); },0);
                       
                      </script>
            <?php
            }
        
	}

}?>