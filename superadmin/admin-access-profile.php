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


$query=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_id`='$admin_id' ");

$row=$query->fetch_assoc();

if (isset($_POST['submit'])) {

	$Allque=mysqli_query($con,"UPDATE `admin` SET `admin_car_st`='1',`admin_room_st`='1',`admin_law_st`='1' WHERE `admin_id`='$admin_id' ");


				if ($Allque) 
			            {
			            		?>
		                  	<script>	                  		
		                        setTimeout(function () { 
		                                swal({
		                                  title: "Successfully!",
		                                  text: "Give All Access To This Admin !!",
		                                  type: "success",
		                                  confirmButtonText: "OK"
		                                },
		                                function(isConfirm){
		                                  if (isConfirm) {
										        window.opener.location.reload();
												window.close();
		                                    //window.location.href = "user-all-info.php";
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
			                                  text: "Data Not Updated Successfully!",
			                                  type: "error",
			                                  confirmButtonText: "OK"
			                                },
			                                function(isConfirm){
			                                  if (isConfirm) {
			                                   window.opener.location.reload();
												window.close();
			                                  }
			                                }); },0);
			                       
			                      </script>
	            					<?php
			            }

}




?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php include('common/title.php'); ?>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />
        <style type="text/css">
            .user-s {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                overflow: hidden;
                position: absolute;
                top: calc(20px/2);
                left: calc(50% - 50px);
                margin-top: -90px;
            }
        </style>


    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
                <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auto-form-wrapper">

                                <img class="user-s" src="../pimages/admin/<?php echo($row['admin_img']);?>" class="img-responsive" alt="Image" />

<?php if ($row['admin_car_st'] =='0' || $row['admin_room_st'] =='0' || $row['admin_law_st'] =='0') {
	?>

<div class="row float-right">
<form method="post" >
	
	<input type="submit" name="submit" class="btn btn-danger " value="Give All Access" >
	
</form>
</div>
<?php }?>

                                <table>

                                    <td>
                                        <h4>Admin Detail's: </h4>
                                    </td>


                                     <tr>
                                        <td> Admin ID:</td>
                                        <th> <strong><?php echo $row['admin_login'];?></strong> </th>
                                    </tr>
                                    <tr>
                                        <td> Admin Name:</td>
                                        <th> <strong><?php echo $row['admin_name'];?></strong> </th>
                                    </tr>

                                     <tr>
                                        <td> Admin Department:</td>
                                        <th> <strong><?php echo $row['admin_dept'];?></strong> </th>
                                    </tr>

                                    <tr>
                                        <td> Admin Contract:</td>
                                        <th> <strong><?php echo $row['admin_contact'];?></strong> </th>
                                    </tr>


                                    

                                    <tr>
                                        <td> User Status:</td>
                                        <th> <strong><?php $st =$row['admin_st'];

									          if ($st==1) {
									            echo "Active";
									          }
									          else{
									            echo "Deactive";
									          }?>
									            
									          </strong> </th>
                                    </tr>


                                </table>

                                


                            </div>

                            <?php include('common/footer.php') ?>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->

       

    </body>

    </html>

    <?php } ?>