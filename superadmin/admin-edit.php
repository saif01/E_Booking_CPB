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

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>

        <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availabe_admin.php",
                    data: 'check_value=' + $("#check_value").val(),
                    type: "POST",
                    success: function(data) {
                        $("#user-availability-status1").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <?php include('common/navbar.php'); ?>
            <!-- Top Bar End -->


           <!-- Left Sidebar Start --> 

            <?php include('common/sidebar.php'); ?>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Admin Information Update</h3>
            </div>
            <div class="panel-body">

<?php  
$admin_id=$_GET['admin_id'];
$query=mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_id`='$admin_id'");
$row=$query->fetch_assoc();
?>
<form class="form-horizontal" action="admin-edit-action.php?admin_id=<?php echo($admin_id); ?>" method="post" enctype="multipart/form-data">

	
<div class="row"> 
	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Admin LogIn ID</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo($row['admin_login']); ?>" name="admin_login" class="form-control" readonly>
            	  
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Admin Name</label>
                <div class="col-sm-9">
                   <input type="text" name="admin_name" value="<?php echo($row['admin_name']); ?>" class="form-control"  required>
                </div>
            </div>
            
    </div>
  
	
    <div class="col-md-6"> 
    		<div class="form-group">
                <label class="col-sm-3 control-label">Admin Email</label>
                <div class="col-sm-9">
                   <input type="email" name="admin_mail" class="form-control" value="<?php echo($row['admin_mail']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Admin Contact</label>
                <div class="col-sm-9">
                   <input type="text" name="admin_contact" class="form-control" value="<?php echo($row['admin_contact']); ?>" >
                </div>
            </div>            
    </div>

</div>
<div class="row">
    <div class="col-md-6">
    		<div class="form-group">
                <label class="col-sm-3 control-label">Admin Office ID</label>
                <div class="col-sm-9">
                   <input type="text" name="admin_office_id" class="form-control" value="<?php echo($row['admin_office_id']); ?>" >
                </div>
            </div> 
    		
            <div class="form-group">
                <label class="col-sm-3 control-label">Department</label>
                <div class="col-sm-9">
                   <input type="text" name="admin_dept" class="form-control" value="<?php echo($row['admin_dept']); ?>" required>
                </div>
            </div>            
    </div>

    <div class="col-md-6">

     <div class="form-group">
                <label class="col-sm-3 control-label">Admin Image</label>
                        <div class="col-sm-9">
                        <input name="photo" type="file" class="form-control file-upload-info" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" >
                        <p style="color:red;">Resolution 250*300 pixels</p>  
                </div>
            </div> 
        </div>
 </div>
 
 <div class="row"> 

 <div class="col-md-6"> 
               <div class="form-group">
                <label class="col-sm-3 control-label">Active</label>
                        <div class="col-sm-9">
                             <div class="radio radio-info radio-inline">
                                <input type="radio" id="inlineRadio1" value="1" name="admin_st" 
                                 <?php 
                                if ($row['admin_st']=='1') {
                                    echo "checked";
                                }?>
                                >
                                <label> Yes </label>
                            </div>
                            <div class="radio radio-inline">
                                <input type="radio" id="inlineRadio2" value="0" name="admin_st"
                                 <?php 
                                if ($row['admin_st']=='0') {
                                    echo "checked";
                                }?>
                                >
                                <label> No </label>
                            </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Admin Access</label>
                <div class="col-sm-9">
                   <div class="checkbox checkbox-success checkbox-inline">
                    <input type="checkbox" name="admin_car_st" value="1"
                     <?php 
                        if ($row['admin_car_st']=='1') {
                            echo "checked";
                        }?>
                        >
                    <label> Car </label>
                    </div>
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" name="admin_room_st" value="1"
                         <?php 
                        if ($row['admin_room_st']=='1') {
                            echo "checked";
                        }?>
                        >
                        <label> Room </label>
                    </div>
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" name="admin_law_st"  value="1"
                        <?php 
                        if ($row['admin_law_st']=='1') {
                            echo "checked";
                        }?>
                        >
                        <label> Legal </label>
                    </div>
                     <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" name="admin_app_st"  value="1"
                        <?php 
                        if ($row['admin_app_st']=='1') {
                            echo "checked";
                        }?>
                        >
                        <label> Application </label>
                    </div>
                     <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" name="admin_hard_st"  value="1"
                        <?php 
                        if ($row['admin_hard_st']=='1') {
                            echo "checked";
                        }?>
                        >
                        <label> Hardware </label>
                    </div>
                     <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" name="admin_super_st"  value="1"
                        <?php 
                        if ($row['admin_super_st']=='1') {
                            echo "checked";
                        }?>
                        >
                        <label for="inlineCheckbox4"> Super </label>
                    </div>

                    
                    
                </div>
            </div>
         
    </div>  

   <div class="col-md-6"> 
    		
           <!--  <div class="form-group">
                <label class="col-sm-3 control-label">Admin Image</label>
                        <div class="col-sm-9">
                        <input name="photo" type="file" class="form-control file-upload-info" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" >
    					<p style="color:red;">Resolution 250*300 pixels</p>	 
                </div>
            </div>  -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Photo Priview</label>
                <div class="col-sm-9">                
                  <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Old</th>
                            <th>New</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <img src="../pimages/admin/<?php echo($row['admin_img']);?>" width="120" height="120" class="img-responsive center-block" alt="Image">
                        </td>
                          <td><img id="preview1" alt="Image Not Selected" class="img-responsive center-block" width="120" height="120" >
                          </td>
                    </tbody>
                  </table>
                </div>
            </div>         
    </div>
</div>




    <div class="col-md-12">         
       <div class="form-group m-b-0">    
<button type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Hit For Admin Info. Update</button>

<a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
           </div>
    </div>

                                        </form>






			</div> <!-- Panel-body -->
            
        </div> <!-- Panel -->
    </div> <!-- col-->
    
</div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    <?php include('common/footer.php') ?>
                </footer>

            </div>
          


            

        </div>
        <!-- END wrapper -->


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

        
        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>




   
    
    </body>
</html>

<?php } ?>