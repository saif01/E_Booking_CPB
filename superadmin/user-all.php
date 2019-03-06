<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin');
}
else{  
 
include('../db/config.php');

// For User Location 
$location = '';
$query = "SELECT * FROM `bu_location` ORDER BY `location_name`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $location .= '<option value="'.$row["bul_id"].'">'.$row["location_name"].'</option>';
}

// Department
$department = '';
$query1 = "SELECT * FROM `department` ORDER BY `dept_name`";
$result1 = mysqli_query($con, $query1);
while($row = mysqli_fetch_array($result1))
{
 $department .= '<option value="'.$row["dept_name"].'">'.$row["dept_name"].'</option>';
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

       <!--  <script src="js/modernizr.min.js"></script> -->

  <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
         <!--Excel DataTables -->
  <!--   <link href="assets/datatables/excel/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/excel/buttons.dataTables.min.css" rel="stylesheet" type="text/css" /> -->

   

    <style type="text/css">
        img {
          border: 1px solid #0000CD;
          border-radius: 10%;
          margin: 0 auto;
          padding: 2px;
          width: 80px;
          height: 80px;
        }

        img:hover {
          box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }

       #datatable i{
            font-size: 40px;
        }
    </style>      
        
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

                        <!-- Start Widget -->
                        <div class="row">
                           

                             <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"> 
                                       <!-- <a href="user-reg" class="btn btn-sm btn-info" style="float: right;">Add New</a> -->
                                       <button type="button" class="btn btn-sm btn-success view_data" style="float: right;">Add New</button> 
                                        <h3 class="panel-title">All User Information</h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
            <table id="datatable" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                    <th>Actions</th>                                                        
                    <th>Legal</th>
                    <th>Car</th>
                    <th>Room</th>
                    <th>CMS</th>
                    <th>Image</th>
                    <th>LogIn Id</th>
                    <th>Name</th>
                    <th>Department</th>
                               
                </tr>
                </thead>

         
                <tbody>
   <?php 
    $query=mysqli_query($con,"SELECT * FROM `user` ORDER BY `user_id` DESC");

    while($row=mysqli_fetch_array($query))
    { ?>
                  <tr>
                                

                <td>

  <a href="user-delete.php?user_id=<?php echo $row['user_id']?>" id="delete" title="Delete"> <i class="fa fa-trash text-danger" ></i></a>

  <a href="user-edit?user_id=<?php echo ($row['user_id']);?>" title="Edit"
><i class="fa fa-edit text-warning"></i> </a>
                            <?php
//************* User Bolck/Unblock Section                                               
         if($row['user_st']=='1')
         {?>
<a href="user-status.php?h_user_id=<?php echo ($row['user_id']);?>" id="hide" title="Hide"> <i class="fa fa-eye text-success" ></i></a>
            
        <?php } else {?>

<a href="user-status.php?s_user_id=<?php echo ($row['user_id']);?>" id="show" title="Show"> <i class="fa fa-eye-slash text-danger"></i></a> 
            <?php } 

          ?>
          

                        </td>

                         <td>
                  <?php
//************** Legal OR law Status Show ****************//
         if($row['user_law_st']==1)
         {?>
<a href="user-status.php?h_user_law_id=<?php echo ($row['user_id']);?>" id="remove" title="Hide"> <i class="fa  fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="user-status.php?s_user_law_id=<?php echo ($row['user_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td>
                        
                        <td>
                  <?php
//************** Car Pool Status Show ****************//
         if($row['user_car_st']==1)
         {?>
<a href="user-status.php?h_user_car_id=<?php echo ($row['user_id']);?>" id="remove" title="Hide"><i class="fa  fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="user-status.php?s_user_car_id=<?php echo ($row['user_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td>

                        <td>
                  <?php
//************** Room Booking Status Show ****************//
         if($row['user_room_st']==1)
         {?>
<a href="user-status.php?h_user_room_id=<?php echo ($row['user_id']);?>" id="remove" title="Hide"><i class="fa  fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="user-status.php?s_user_room_id=<?php echo ($row['user_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td>

                        <td>
                  <?php
//************** CMS Status Show ****************//
         if($row['user_cms_st']==1)
         {?>
<a href="user-status.php?h_user_cms_id=<?php echo ($row['user_id']);?>" id="remove" title="Hide"><i class="fa  fa-check-square-o text-success" ></i></a>
            
        <?php } else {?>

<a href="user-status.php?s_user_cms_id=<?php echo ($row['user_id']);?>" id="give" title="Show"> <i class="fa fa-times-circle text-danger" ></i></a> 
            <?php } ?>

                        </td>
                        

                        

                        <td>
<a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?user_id=<?php echo $row['user_id'];?>');" title="View User Info."><img src="../pimages/user/<?php echo $row['user_img'];?>" class="img-responsive" alt="Image" style=" max-width:60%;" /> </a>
                        </td>
                        <td>
                            <?php echo ($row['user_login']); ?>
                        </td>
                       <td>
                            <?php echo ($row['user_name']); ?>
                        </td>
                        <td>
                            <?php echo ($row['user_dept']); ?>
                        </td>



                     
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                            
                        </div> <!-- end row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    <?php include('common/footer.php') ?>
                </footer>

            </div>
 
        </div>
        <!-- END wrapper -->




<!--  Modal content for the above example -->
    <div id="dataModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"  class="close text-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                </div>
                <div class="modal-body">
                  <!-- action="user-reg-action.php"   -->

  <form data-toggle="validator" role="form" action="user-reg-action.php" method="post" enctype="multipart/form-data">
        <div class="row"> 
            <div class="col-md-4"> 
                <div class="form-group has-feedback"> 
                    <label for="check_value" class="control-label">User ID</label> 
                    <input type="text" id="check_value" onBlur="userAvailability()" name="user_login" class="form-control"  placeholder="Enter User Login ID" pattern="([^A-Z]*[a-z])" data-error="Put Valid ID" required="required">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <span id="user-availability-status1" style="font-size:12px;"></span>

                 <div class="help-block with-errors"></div>

                <!--  pattern="([^A-Z]*[a-z]{3,}).[a-z]{3}$" 
                 Only put lower case alfabet then dout then 3 character lowercase letter -->
                </div> 
            </div> 

            <div class="col-md-4">

               <div class="form-group"> 
                    <label for="password" class="control-label">Password</label> 
                    <input id="password" type="password" name="user_pass" class="form-control" placeholder="Default Password" value="12345" disabled="disabled">
                   
                </div> 
              
            </div>
            
            <div class="col-md-4"> 
                <div class="form-group has-feedback"> 
                    <label for="user_name" class="control-label">User Name</label> 
                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter User Full Name" maxlength="15" required="required" />
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>                        
            </div> 



     </div>


     <div class="row"> 
            <div class="col-md-4 "> 
                <div class="form-group has-feedback"> 
                    <label for="user_contact" class="control-label">User Contact</label> 
                   <input id="user_contact" type="tel" pattern="^[0-9]{11}$"  name="user_contact" placeholder="Enter User Phone Number" class="form-control" data-error="Put 11 digits number" required="required" />
                   <span class="glyphicon form-control-feedback" aria-hidden="true"></span>  
                   <div class="help-block with-errors"></div> 

                </div> 
            </div> 
            <div class="col-md-4"> 
                <div class="form-group has-feedback"> 
                    <label for="user_mail" class="control-label">User Email</label> 
                    <input type="email" id="user_mail" name="user_mail" class="form-control" placeholder="Enter User Email Address" data-error="Put valid Email" required="required" />
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                                           
                </div> 
            </div> 
            <div class="col-md-4"> 
                <div class="form-group has-feedback"> 
                    <label for="bu_mail" class="control-label">B.U. Email</label> 
                    <input type="text" id="bu_mail" name="bu_mail" class="form-control" placeholder="Enter User B.U. Head Email Address" required="required" />
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                   
                </div> 
            </div> 
     </div>

     <div class="row"> 
            <div class="col-md-4"> 
                <div class="form-group has-feedback"> 
                    <label for="user_office_id" class="control-label">User Office ID</label> 
                    <input type="text" id="user_office_id" name="user_office_id" class="form-control" placeholder="Enter User Office ID" pattern="^[A-Z]{2}[0-9]{7}$" data-error="Start with BD and Put 7 digits ID" required="required" />
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                       
                    <div class="help-block with-errors"></div>
            
                </div> 
            </div> 
            <div class="col-md-4"> 
                <div class="form-group has-feedback"> 
                    <label for="user_location" class="control-label">User Location</label> 
                    <select id="user_location" class="form-control" name="user_location" data-error="Choose One Option" required="required">
                      <option value="" disabled selected>Select Location Name</option>
                          <?php echo $location; ?>
                  </select>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                   <div class="help-block with-errors"></div>
                </div> 
            </div> 
            <div class="col-md-4"> 
                <div class="form-group has-feedback"> 
                    <label for="user_dept" class="control-label">Department</label> 
                    <select id="user_dept" class="form-control" name="user_dept" data-error="Choose One Option" required="required">
                            <option value="" disabled selected>Select Location Name</option>
                          <?php echo $department; ?>
                        </select> 
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span> 
                        <div class="help-block with-errors"></div>
                </div> 
            </div> 
     </div>

     <div class="row"> 
            <div class="col-md-4"> 
                <div class="form-group"> 
                    <label class="control-label">Active</label> 
                    <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="1" name="show_st" checked>
                        <label for="inlineRadio1"> Yes </label>
                    </div>
                    <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio2" value="0" name="show_st">
                        <label for="inlineRadio2"> No </label>
                    </div>
            
                </div>


                <div class="form-group"> 
                    <label class="control-label">Access</label> 
                    <div class="checkbox checkbox-success checkbox-inline">
                    <input type="checkbox" name="user_car_st" value="1">
                    <label for="inlineCheckbox1"> Car </label>
                  </div>
                  <div class="checkbox checkbox-success checkbox-inline">
                      <input type="checkbox" name="user_room_st" value="1">
                      <label for="inlineCheckbox2"> Room </label>
                  </div>
                  <div class="checkbox checkbox-success checkbox-inline">
                      <input type="checkbox" name="user_law_st"  value="1">
                      <label for="inlineCheckbox3"> Legal </label>
                  </div>
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" name="user_cms_st"  value="1">
                        <label for="inlineCheckbox3"> CMS </label>
                    </div>
                    
                </div>


            </div> 
            <div class="col-md-4"> 

              <div class="form-group"> 
                    <label for="photo" class="control-label">User Image</label> 
                     <input name="photo" id="photo" type="file" class="form-control file-upload-info" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" accept="image/x-png,image/jpeg" required="required" />  
                </div> 
                 
            </div> 
            <div class="col-md-4"> 

               <div class="form-group"> 
                    <label class="control-label">Photo Preview</label> 
                     <img id="preview1" alt="Image Not Selected" class="rounded mx-auto d-block" width="100" height="100" />  
                </div> 
                
            </div> 
     </div> 

     <div class="row">
        <div class="form-group">    
          <button id="btnSubmit" type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Submit </button>
        </div>       
     </div>       
</form>



 <div class="modal-footer">
                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Close</button>
                    
                </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    
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

       <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

      <!-- Bootstrap Form VAlidation Plugins -->
        <script src="../assets/coustom/BootstrapValidator/0.11.9.validator.min.js"></script>

       <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script> -->
       
        <!-- Data TAble -->
        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>

        <script type="text/javascript">
           jQuery(document).ready(function() {
                $('#datatable').dataTable({
                    "order": []
                });
            } );
        </script>

        

    
 
   
     <script type="text/javascript">
        //Modal Show Data
         jQuery(document).ready(function(){  
              jQuery('.view_data').click(function(){  
                   jQuery('#dataModal').modal("show");  
                  
              }); 

              //After submit Form submit button disabled
              jQuery('form').on("submit", function(){

                setTimeout(function(){
                  setTimeout(function() { disableButton();},100);

                  function disableButton(){
                     jQuery("#btnSubmit").prop('disabled', true);
                  }
                })
                  
                   
                 });

         });  
    </script>

     <script>
        function userAvailability() {
            jQuery("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availabe_user.php",
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

   





	<script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 780 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
  </script>  

  
 <!-- sweet alerts -->
        <script src="assets/sweet-alert/coustom_swalert_saif.js"></script>

<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->

<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#hide", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Block This User?",
                  text: "If Block !!, Youser Can't Login !",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->

<!--**************** Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#show", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to UnBlock This User?",
                  text: "If UnBlock !!, Youser Can Login !",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->

<!--****************  Admin Start Sweet Alert Script code *******************-->
<script>  
         $(document).on("click", "#give", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Give This Access ???",
                  text: "If  Give !,This User Can Get This Access !",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>

<script>  
         $(document).on("click", "#remove", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Remove This Access ???",
                  text: "If Removed !!, This User Can't Get This Access  !",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<!--**************** End Sweet Alert Script code *******************-->      
   

 
<!-- 
 <script type="text/javascript">
        $(document).ready(function(){
 
    $('#simple_form input').jqBootstrapValidation({
     preventSubmit: true,
     submitSuccess: function($form, event){     
      event.preventDefault();
      $this = $('#send_button');
      $this.prop('disabled', true);
      var form_data = $("#simple_form").serialize();
      $.ajax({
       url:"reg-action.php",
       method:"POST",
       data:form_data,
       success:function(){
        $('#success').html("<div class='alert alert-success'><strong>Your message has been sent. </strong></div>");
        $('#simple_form').trigger('reset');
       },
       error:function(){
        $('#success').html("<div class='alert alert-danger'>There is some error</div>");
        $('#simple_form').trigger('reset');
       },
       complete:function(){
        setTimeout(function(){
         $this.prop("disabled", false);
         $('#success').html('');
        }, 5000);
       }
      });
     },
    });

});
    </script> -->



    
    </body>
</html>

<?php } ?>