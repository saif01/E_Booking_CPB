<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_app_login'])==0)
  { 
header('location:../admin');
}
else{  

include('../db/config.php');
$app_id=$_GET['app_id'];


// 4 table Join for generate  report         
$query=mysqli_query($con,"SELECT cms_app_complain.app_id, cms_app_complain.user_id, cms_app_complain.com_details, cms_app_complain.reg, cms_app_complain.last_up, cms_app_soft.soft_name, cms_app_module.mod_name ,user.user_name, user.user_dept FROM cms_app_complain INNER JOIN cms_app_soft ON cms_app_complain.soft_id=cms_app_soft.soft_id INNER JOIN cms_app_module ON cms_app_complain.mod_id=cms_app_module.mod_id INNER JOIN user ON cms_app_complain.user_id=user.user_id WHERE cms_app_complain.app_id='$app_id' ");


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
                  
                  <h4 class="text-center m-t-10 text-danger">Complain Number: <?php echo $app_id; ?></h4>

                  <table class="table table-striped">
                  	<tr> 
                  		<th>Sofware:</th>
                  		<td><?php echo $row['soft_name'];?></td>
                  	
                  		<th>Module:</th>
                  		<td><?php echo $row['mod_name'];?></td>
                  	</tr>
                  	
                  </table>

               
                  
                  
                </div> 


                <div class="panel-body">
             
               
              <form  action="update-action.php?app_id=<?php echo ($app_id); ?>" method="post" >
 
				  <div class="form-group">
				    <label >Process:</label>
				    <select class="form-control" name="status" >
				      <option value="Processing" >Processing</option>
				      <option value="Closed" >Closed</option>
				      
				    </select>
				  </div>
				  
				  <div class="form-group">
				    <label>Remarks</label>
				    <textarea class="form-control" type="text" name="remarks" rows="3" required></textarea>
				  </div>
				  <input id="btnSubmit" type="submit" name="submit" value="Hit To Update" class="btn btn-block btn-rounded btn-success">
				</form>
                 		

                </div>                                 
                
           
        </div>

<script src="../assets/coustom/ajax/3.3.1_jquery.min.js"></script>
<!-- Bubmit Button Disable After submit form -->
<script type="text/javascript">
    $(document).ready(function () {
    $('form').submit(function () {
        setTimeout(function () { disableButton(); },0);
    });

    function disableButton() {
        $("#btnSubmit").prop('disabled', true);
    }
});
</script>
       
	
	</body>
</html>

<?php } ?>