<?php
include('../db/config.php');

if ($_GET['car_id']) {
	
$id=$_GET['car_id'];

// For delete file
$query2=mysqli_query($con,"SELECT * FROM `tbl_car` WHERE `car_id`='$id' ");
while($row=mysqli_fetch_array($query2))
    {

    	$file1="../pimages/car/".$row['car_img1'];
    	unlink($file1);
    	$file2="../pimages/car/".$row['car_img2'];
    	unlink($file2);
    	$file3="../pimages/car/".$row['car_img3'];
    	unlink($file3);

   	}

// For delete database record
	$query=mysqli_query($con,"DELETE FROM `tbl_car` WHERE `car_id`='$id' ");

?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->

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

?>