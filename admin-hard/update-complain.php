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
             
               
      <form  action="update-action.php?hard_id=<?php echo ($hard_id); ?>" method="post" >

  <?php 
  if($row['tools'] !='') {
  ?>
           <div class="form-group">
           
                  <div class="checkbox checkbox-success checkbox-inline">
                      <input type="checkbox"  name="tools[]" value="Mouse">
                      <label> Mouse </label>
                  </div>
                  <div class="checkbox checkbox-success checkbox-inline">
                      <input type="checkbox"  name="tools[]" value="Power Cord">
                      <label>Cord</label>
                  </div>
                   <div class="checkbox checkbox-success checkbox-inline">
                      <input type="checkbox"  name="tools[]" value="AC Adeptar">
                      <label>Adeptar</label>
                  </div>
                  <div class="checkbox checkbox-success checkbox-inline">
                      <input type="checkbox"  name="tools[]" value="VGA Cord">
                      <label>VGA</label>
                  </div>
                  <div class="checkbox checkbox-success checkbox-inline">
                       <input type="checkbox"  name="tools[]" value="USB Cord">
                      <label>USB</label>
                  </div>
                  <div class="checkbox checkbox-success checkbox-inline">
                      <input type="checkbox"  name="tools[]" value="Power Supply"> 
                      <label>Power Supply</label>
                  </div>
                  <input type="text" name="tools[]" placeholder="Others product that you provide mention here" value=""  class="form-control form-control-sm">
      </div>
<?php } ?> 
				  <div class="form-group">
				    <label>Select Process:</label>
				    <select id="show_Close" class="form-control" name="status" >
				      <option value="Processing" >Processing</option>
				      <option value="Closed">Closed</option> 
				    </select>
				  </div>


          <div class="form-group text-center" id="showforClose" style="display:none;">
              <label class="col-sm-3 control-label text-danger">Deliverable:</label>
                <div class="col-sm-9">
                   <div class="radio radio-info radio-inline">
                        <input type="radio"  name="delivery"  value="Deliverable">
                        <label>Yes</label>
                    </div>
                    <div class="radio radio-inline">
                        <input type="radio"  name="delivery" value="" checked>
                        <label>No</label>
                    </div>
                </div>
          </div>




        
         <div class="form-group text-center" id="forCloseWarranty">
          <label class="col-sm-3 control-label">Warranty Status:</label>
            <div class="col-sm-9">
               <div class="radio radio-info radio-inline">
                    <input type="radio" onclick="show(1)"  name="warranty"  value="1">
                    <label>Yes</label>
                </div>
                <div class="radio radio-inline">
                    <input type="radio"  onclick="show(0)"  name="warranty" value="0" checked>
                    <label>No</label>
                </div>
            </div>
          </div>


          <div class="form-group" id="show_st" style="display:none;" >
            <label>Select Warranty Status:</label>
            <select class="form-control" name="warranty_st" >
              <option value="s_w">Sent To Warranty </option>
              <!-- <option value="b_w">Back From Warranty </option> -->
            </select>
          </div>
				  
				  <div class="form-group">
				    <label>Remarks</label>
				    <textarea class="form-control" type="text" name="remarks" rows="3" placeholder="Write Somthing about this problem...... Like How Many days require to solve this issue." required="required"></textarea>
				  </div>
				  <input id="btnSubmit" type="submit" name="submit" value="Hit To Update" class="btn btn-block btn-rounded btn-success">
				</form>
                 		

      </div>                                 
                
           
        </div>


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
       <!--  <script src="js/jquery.min.js"></script> -->
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

        <script>
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
              

        // For Change Drop Down Option
  $("#show_Close").on("change", function () {        
      
      if($(this).val() == 'Closed'){
          document.getElementById('showforClose').style.display = 'block';
           document.getElementById('forCloseWarranty').style.display = 'none';
      }
      else{
        document.getElementById('showforClose').style.display = 'none';
        document.getElementById('forCloseWarranty').style.display = 'block';

      }

      
  });

          </script>


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