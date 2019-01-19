<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin');
}
else{  
 
include('../db/config.php');
$user_id=$_GET['user_id'];

$query=mysqli_query($con,"SELECT * FROM `user` WHERE `user_id`='$user_id' ");

$row=$query->fetch_assoc();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="syful.cse.bd@gmail.com">
        <meta name="author" content="Saif">

        <link rel="shortcut icon" href="images/cpb.png">

        <?php include('common/title.php'); ?>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect --> 
        <link href="css/waves-effect.css" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>

        <style type="text/css">
            .user-s {
                width: 120px;
                height: 120px;
                border-radius: 20%;
                overflow: hidden;
                position: absolute;
                top: calc(90px/2);
                left: calc(50% - 50px);
                margin-top: -90px;
            }
        </style>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading text-center"> 
                    <!-- <div class="bg-overlay"></div> -->
                  <!--  <h3 class="text-center m-t-10 text-white">Profile Information</h3> -->
                   <img src="../pimages/user/<?php echo($row['user_img']);?>" alt="Image" class="user-s">
                </div> 


                <div class="panel-body">
                 <table class="table text-center table-striped">
                 	
                    <tr>
                        <th>ID</th>
                        <td><?php echo $row['user_login'];?></td>
                        
                    </tr>
                 	<tr>
                 		<th>Name</th>
                 		<td><?php echo $row['user_name'];?></td>
                		
                 	</tr>
                    <tr>
                        <th>E-mail</th>
                        <td><?php echo $row['user_mail'];?></td>
                        
                    </tr>
                 	<tr>
                 		<th>Department</th>
                 		<td><?php echo $row['user_dept'];?></td>
                		
                 	</tr>
                 	<tr>
                 		<th>Contract</th>
                 		<td><?php echo $row['user_contact'];?></td>
                		
                 	</tr>
                 	<tr>
                 		<th>Office ID</th>
                 		<td><?php echo $row['user_office_id'];?></td>
                		
                 	</tr>
                 	<tr>
                 		<th>Status</th>
                 		<td><?php $st =$row['user_st'];

				          if ($st==1) {
				            echo "Active";
				          }
				          else{
				            echo "Deactive";
				          }?></td>
                		
                 	</tr>
                 	
                 </table>
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>
	
	</body>
</html>

<?php } ?>