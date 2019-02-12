<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_hard_login'])==0)
  { 
header('location:../admin');
}
else{  

include('../db/config.php'); 
$hard_id=$_GET['hard_id'];


// 4 table Join for generate  report         
$query=mysqli_query($con,"SELECT cms_hard_complain.hard_id, cms_hard_complain.user_id, cms_hard_complain.tools, cms_hard_complain.details, cms_hard_complain.documents, cms_hard_complain.status, cms_hard_complain.warrenty, cms_hard_complain.delivery, cms_hard_complain.last_up, cms_hard_complain.reg, cms_hard_category.category, cms_hard_subcategory.subcategory, user.user_name, user.user_dept FROM cms_hard_complain INNER JOIN cms_hard_category ON cms_hard_complain.cat_id=cms_hard_category.cat_id INNER JOIN cms_hard_subcategory ON cms_hard_complain.sub_id=cms_hard_subcategory.sub_id INNER JOIN user ON cms_hard_complain.user_id=user.user_id WHERE cms_hard_complain.hard_id='$hard_id'");


$row=$query->fetch_assoc();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="syful.cse.bd@gmail.com">
        <meta name="author" content="Saif">

        <?php include('common/icon.php'); ?>

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

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        
    </head>
    <body>


        <div class="wrapper-page">
            
                <div class="row col-sm-6"> 
                  
                  <h4 class="text-center m-t-10 text-danger">Complain Number:<?php echo $hard_id ; ?></h4>

                  <table class="table table-striped" >
                  	<tr> 
                  		<th class="col-md-2">Category:</th>
                  		  <td class="col-md-4"><?php echo $row['category'];?></td>
                      <th class="col-md-2">Subcategory:</th>
                        <td class="col-md-4"><?php echo $row['subcategory'];?></td>		
                  	</tr>                  	
                  </table>

                </div> 


  <div class="panel-body">
             
               
      <form  action="delivery-action.php?hard_id=<?php echo ($hard_id); ?>" method="post"  enctype="multipart/form-data">

 
           		<div class="form-group">
				    <label>Receiver's Name</label>
				    <input type="text" class="form-control" name="name" placeholder="Enter Product Receiver Name" required>
				</div>
				<div class="form-group">
				    <label>Receiver's Contract</label>
				    <input type="Number" class="form-control" name="contact" placeholder="Enter Product Receiver Phone Number" required>
				</div>
				
				  <div class="form-group">
				    <label>Remarks</label>
				    <textarea class="form-control" type="text" name="remarks" rows="3" placeholder="Write Somthing about this...... Like, Location Of Receiving Product." required="required"></textarea>
				  </div>
				  <div class="form-group">
				    <label>Any File</label>
				    <input type="file" class="form-control" name="document" >
				</div>

				  <input type="submit" name="submit" value="Hit To Update" class="btn btn-block btn-rounded btn-success">
				</form>
                 		

      </div>                                 
                
           
        </div>


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>
        <script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>

        
               

	</body>
</html>

<?php } ?>