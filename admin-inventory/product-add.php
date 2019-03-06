<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_inventory'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');

//For Hardware
$category = '';
$query = "SELECT * FROM `cms_hard_category` ORDER BY `category`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $category .= '<option value="'.$row["cat_id"].'">'.$row["category"].'</option>';
}

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
                <h3 class="panel-title">Product Add</h3>
            </div>
            <div class="panel-body">


<form class="form-horizontal" action="product-add-action.php" method="post" enctype="multipart/form-data">
<div class="row"> 
	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Category</label>
                <div class="col-sm-9">
                  <select class="form-control " name="cat_id" id="category" required="required">
                     <option value="" disabled selected>Select Category Name</option>
                          <?php echo $category; ?>
                         
                  </select>
            	  
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Subcategory</label>
                <div class="col-sm-9">
                    <select class="form-control" name="sub_id" id="subcategory" required="required"></select>
                </div>
            </div>
    </div>
  
	
    <div class="col-md-6"> 
    		<div class="form-group">
                <label class="col-sm-3 control-label">Brand Name</label>
                <div class="col-sm-9">
                   <input type="text" name="brand" class="form-control" placeholder="Enter Product Name" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Serial Number</label>
                <div class="col-sm-9">
                   <input type="text" name="serial" class="form-control" placeholder="Enter Product Serial Number" >
                </div>
            </div>            
    </div>

</div>
<div class="row">
    <div class="col-md-6">

             <div class="form-group">
                <label class="col-sm-3 control-label">Remarks</label>
                <div class="col-sm-9">
                    <textarea type="text" name="remarks" class="form-control" placeholder="Enter Product Remarks With Full Details" required="required"></textarea>
                </div>
            </div> 

    		<div class="form-group">
                <label class="col-sm-3 control-label">Warranty</label>
                <div class="col-sm-9">
                   <div class="radio radio-info radio-inline">
                    <input type="radio" onclick="show(1)"  name="warranty_st"  value="1" required="required">
                    <label>Yes</label>
                    </div>
                    <div class="radio radio-inline">
                        <input type="radio"  onclick="show(0)"  name="warranty_st" value="0" >
                        <label>No</label>
                    </div>
                </div>
            </div>

            

    </div>
     <div class="col-md-6">      
            <div class="form-group">
                <label class="col-sm-3 control-label">File</label>
                <div class="col-sm-9">
                   <input type="file" name="file" class="form-control">
                </div>
            </div> 
            <div class="form-group" id="show_st" style="display:none;">
                <label class="col-sm-3 control-label">Expired Date</label>
                <div class="col-sm-9">
                <input type="date" name="warranty" class="form-control">
                </div>
            </div>
                        
    </div>

   
</div>




    <div class="col-md-12">         
       <div class="form-group m-b-0">    
<button id="btnSubmit" type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Submit</button>

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
        <!-- <script src="js/jquery.min.js"></script> -->
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


    // For Hardware DropDow 
$(document).ready(function(){
    $("#category").on("change", function () { 
        var cat_id=$(this).val();
            jQuery.ajax({
        url: "fetch_subcategory.php",
        type: "POST",
        data:{cat_id:cat_id},
        dataType:"text",
        success: function(data) {
            $("#subcategory").html(data);
        }
        
       });
    });
}); 

 
//Show Warrenty Status
 function show(x) {  
                if (x==1) {
                    document.getElementById('show_st').style.display = 'block';
                } 
                else
                 {
                     document.getElementById('show_st').style.display = 'none';
                 }
                return;
              }  
</script>



   
    
    </body>
</html>

<?php } ?>