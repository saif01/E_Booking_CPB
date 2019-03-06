<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['cms_login_id'])==0)
  { 
header('location:../index');
}
else{ 
 require('../db/config.php');

 $user_login=$_SESSION['cms_login_id'];

// For Applications
$soft = '';
$query = "SELECT * FROM `cms_app_soft` ORDER BY `soft_name`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $soft .= '<option value="'.$row["soft_id"].'">'.$row["soft_name"].'</option>';
}

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
<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <?php require('common/icon.php'); ?> 

    
    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?>

  

</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="Syful-IT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <?php require('common/topbar.php') ?>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <?php require('common/logo.php'); ?>
                    
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <?php require('common/navbar.php'); ?>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--==************************* Header Area End ****************************************************************************************************************************==-->
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">

                       <h2>Register Your Complain's</h2>
                        <span class="title-line"><i class="fa fa-chain-broken" aria-hidden="true"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->


     <!--== About Page Content Start ==-->
    <section class="section-padding">
        <div class="container ">
           


      <div class="row">
      	<div class="col-md-12 text-center" >

			<div  >
			<label class="text-danger h3">Complain Type</label>
			<select name='type' id='type' class="form-control-lg text-center text-success">
			  <option >Select Which Type Complain's You Have</option>
			  <option value="Hardware" >CPB. Hardware Type Complain's </option>
			  <option value="Application" >CPB. Application Type Complain's</option>
			</select>
			</div>
		</div>
      	
  	</div>

<!-- Hardware Model Modal  -->
<div id="Hardware" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <!-- Main Content show -->
      <div class="modal-body text-success">
      	<form action="hard-register-action.php" method="post" enctype="multipart/form-data">
  			
  		<div class="row col-md-12">
  			<div class="col-md-6">

  				<div class="form-group">
					    <label >Category</label>
					    <select class="form-control " name="cat_id" id="category" required="required">
					      <option value="" disabled selected>Select Category Name</option>
					      <?php echo $category; ?>
					     
					    </select>
					  </div>

  				
  			</div> 
  			<div class="col-md-6">

  				<div class="form-group">
					    <label >Subcategory</label>
					    <select class="form-control" name="sub_id" id="subcategory" required="required">
					        
					    </select>
					  </div>
  				
  			</div>
  	   </div>

 
					  
<div class="form-group">
    <p class="text-muted text-center">Which Accessories are you send in Hardware, Please Select</p>
        <input type="checkbox"  name="tools[]" value="Mouse"> Mouse
        <input type="checkbox"  name="tools[]" value="keybord"> keybord
        <input type="checkbox"  name="tools[]" value="Power Cord"> Power Cord
        <input type="checkbox"  name="tools[]" value="AC Adeptar"> Adeptar
        <input type="checkbox"  name="tools[]" value="VGA Cord"> VGA Cord
        <input type="checkbox"  name="tools[]" value="Usb Cord"> Usb Cord
        <input type="checkbox"  name="tools[]" value="Toner/Cartridge"> Toner/Cartridge
        <input type="text" name="tools[]" placeholder="Others product that you provide mention here" value=""  class="form-control form-control-sm">
                                                    
   </div>

			 
					  <div class="form-group">
					    <label>Complain Detail's </label>
					    <textarea class="form-control" name="details" placeholder="Enter Your Hardware Problem's In Details" rows="3" required="required"></textarea>
					  </div>
					  <div class="form-group">
					    <label >Document's (Photos or PDF)</label>
					    <input type="file" name="document" class="form-control">
					  </div>

					<div class="form-group">
				    
				    <input id="btnSubmit" type="submit" name="submit" class="btn btn-success btn-block" value=" Hit To Hardware Complain Register">
				  </div>

</form>
        </div>

    <div class="modal-footer">  
     <button  type="button" onclick="pagerefresh()" class="btn btn-danger" data-dismiss="modal">Close</button>  
    </div>
  </div>
</div>  	

</div>



<!-- Application Model Modal  -->
<div id="Application" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <!-- Main Content show -->
      <div class="modal-body text-info">
      	<form action="app-register-action.php" method="post" enctype="multipart/form-data">
  			
  		<div class="row col-md-12">
  			<div class="col-md-6">
				  <div class="form-group">
				    <label >Software Select</label>
				    <select class="form-control" name="soft_id" id="soft" required="required">
				      <option value="" disabled selected>Select SoftWare Name</option>
				      <?php echo $soft; ?>
				     
				    </select>
				  </div>
			</div> 
  			<div class="col-md-6">

				  <div class="form-group">
				    <label >Module Select</label>
				    <select class="form-control" name="mod_id" id="soft2" required="required">
				        
				    </select>
				  </div>
			</div>
  	   </div>






<!--     <label >Document's (Photos or PDF)</label>
       <div class="row col-md-12">
            <div class="col-md-6">
              <div class="form-group">
                 <input type="file" id="doc1" name="document1" class="form-control" >

                
              </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <input type="file" id="doc2" name="document2" class="form-control" >
                  
              </select>
            </div>
          </div>
     </div>

      <div class="row col-md-12">
            <div class="col-md-6">
              <div class="form-group">
                 <input type="file" id="doc3" name="document3" class="form-control">
                
              </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <input type="file" id="doc4" name="document4" class="form-control">
                  
              </select>
            </div>
          </div>
     </div> -->

          <div class="form-group">
            <label>Document's (Photos or PDF)</label>
           <input type="file" id="doc1" name="document1" class="form-control" >
          </div>
           <div class="form-group">
           <input type="file" id="doc1" name="document2" class="form-control" >
          </div>

          <div class="form-group">
           <input type="file" id="doc1" name="document3" class="form-control" >
          </div>

           <div class="form-group">
           <input type="file" id="doc1" name="document4" class="form-control" >
          </div>

				 
				  <div class="form-group">
				    <label>Application Complain's Details</label>
				    <textarea class="form-control" name="com_details" rows="2" placeholder="Enter Your Application's Problem In Details" required="required"></textarea>
				  </div>
				 
				  <div class="form-group">
				    
				     <input id="btnSubmit2" type="submit" name="submit" class="btn btn-info btn-block" value=" Hit To Application Complain Register">
				  </div>
				</form>
        </div>

    <div class="modal-footer">  
     <button type="button" onclick="pagerefresh()" class="btn btn-danger" data-dismiss="modal">Close</button>  
    </div>
  </div>
</div>
</div>
            <!-- About Fretutes Start -->
            <div class="about-feature-area">
                <div class="row">
                    <!-- Single Fretutes Start -->
                    <div class="col-lg-12">
                        <div class="about-feature-item active">
                            <i class="fa fa-chain-broken" aria-hidden="true"></i>
                            
                        </div>
                    </div>
                    <!-- Single Fretutes End -->

                </div>
            </div>
            <!-- About Fretutes End -->
        </div>
    </section>
    <!--== About Page Content End ==-->


<!--== Footer Area Start ==-->
    <section id="footer-area">           
        <?php require('common/footer.php'); ?>     
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="Syful-IT">
    </div>
    <!--== Scroll Top Area End ==-->

<script src="../assets/coustom/ajax_3.2.1-jquery.min.js"></script>

<!-- <script src="../assets/coustom/ajax/3.3.1_jquery.min.js"></script> -->

    <!--=======================Javascript============================-->
    <?php require('common/alljs.php'); ?>
    
    
<script type="text/javascript">
// For Change Drop Down Option
	$("#type").on("change", function () {        
	    
	    if($(this).val() == 'Hardware'){
	        $('#Hardware').modal("show");
	    }
	    if($(this).val() == 'Application'){
	        $('#Application').modal("show");
      
	    }
	});


//For Application DropDow	
$(document).ready(function(){
	$("#soft").on("change", function () { 
		var soft_id=$(this).val();
		    jQuery.ajax({
        url: "fetch_module.php",
        type: "POST",
        data:{soft_id:soft_id},
        dataType:"text",
        success: function(data) {
            $("#soft2").html(data);
        }
        
       });
	});
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

function pagerefresh() {
  location.reload();
}


</script>



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

<script type="text/javascript">
    $(document).ready(function () {
    $('form').submit(function () {
        setTimeout(function () { disableButton(); },0);
    });

    function disableButton() {
        $("#btnSubmit2").prop('disabled', true);
    }
});
</script>

<!-- <script type="text/javascript">
  
  
  var document1 = document.getElementById("doc1");
  var document2 = document.getElementById("doc2");
  var document3 = document.getElementById("doc3");
  var document4 = document.getElementById("doc4");

  if (document1.value.length > 0) {

       document.getElementById("doc2").disabled = false;
  }

  else{
    document.getElementById("doc2").disabled = true;
  }



</script> -->


</body>

</html>

<?php } ?>