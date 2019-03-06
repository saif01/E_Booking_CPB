<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_inventory'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');

//Location
$location = '';
$query = "SELECT * FROM `bu_location` ORDER BY `bul_id`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $location .= '<option value="'.$row["location_name"].'">'.$row["location_name"].'</option>';
}

// Department
$department = '';
$query = "SELECT * FROM `department` ORDER BY `dept_name`";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
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

        <!-- <script src="js/modernizr.min.js"></script> -->

         <!--Excel DataTables -->
    <link href="assets/datatables/excel/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/excel/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

      <script src="../assets/coustom/ajax_3.2.1-jquery.min.js"></script>

 

   <script>  

 //Show Data
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"given-data.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#data_show').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  


//Print Specific Div Section

  function printDiv(divName) 
  		{
	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;
	     document.body.innerHTML = printContents;
	     window.print();
	     document.body.innerHTML = originalContents;
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

                        <!-- Start Widget -->
                        <div class="row">
                           

                             <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        
                                        <h3 class="panel-title">All Stock Product Reports</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">
                                                <table id="datatable" class="table table-striped table-bordered text-center">
                                                    <thead>
                                                        <tr>

                                                        <th>Action</th>
                                                        <th>Receiever Name</th>
                                                        <th>B.U. location</th>
                                                        <th>Department</th>
                                                        <th>Contact</th>
                                                        <th>Designation</th>
                                                        <th>Quentity</th>
                                                        <th>Category</th>
                                                        <th>Subcategory</th>
                                                        <th>Brand</th>  
                                                        <th>Serial</th>          
                                                        <th>Remarks</th>
                                                        <th>Registration</th>
                                                        

                                      
                                                    </tr>
                                                    </thead>

                                             
                                                    <tbody>
        <?php 
      
    $query=mysqli_query($con,"SELECT * FROM `inv_product_give` ORDER BY `id` DESC");

    while($row=mysqli_fetch_array($query))
    { ?>
                                                    <tr>
                               <td>

  <input type="button" name="view" value="view" class="btn btn-info btn-xs view_data" id="<?php echo $row["id"]; ?>" />

        						</td>
                                 <td><?php echo $row['name']; ?> </td>
                                 <td><?php echo $row['b_u_location']; ?></td>
                                 <td><?php echo $row['dept']; ?> </td>
                                 <td><?php echo $row['contact']; ?></td>
                                 <td><?php echo $row['position']; ?> </td>
                                 <td><?php echo $row['quentity']; ?> </td>
                                 <td><?php echo $row['category']; ?> </td>
                                 <td><?php echo $row['subcategory']; ?></td>
                                 <td><?php echo $row['brand']; ?></td>
                                 <td><?php echo $row['serial']; ?></td>
                                 <td><?php echo $row['remarks']; ?></td>
        
        					<td><?php echo date("M j, Y", strtotime($row['reg'])); ?></td>

        
                                                        
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
<div id="data_edit_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button"  class="close text-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                <h4 class="modal-title" id="myLargeModalLabel">Product Give Form</h4>
            </div>
            <div class="modal-body text-center">


          <form method="post" action="product-give-action.php"> 
            <div style="box-shadow: 0px 2px 15px red; padding: 8px;">
            	<div class="row"> 
            		 <div class="col-md-3"> 
                        <div class="form-group"> 
                            <label  class="control-label">Category</label> 
                            <input type="text" class="form-control" id="category" name="category" readonly> 
                        </div> 
                    </div> 
                    <div class="col-md-3"> 
                        <div class="form-group"> 
                            <label  class="control-label">Subcategory</label> 
                            <input type="text" class="form-control" id="subcategory" name="subcategory" readonly> 
                        </div> 
                    </div>

                    <div class="col-md-3"> 
                        <div class="form-group"> 
                            <label  class="control-label">Brand Name</label> 
                            <input type="text" class="form-control" id="brand" name="brand" readonly> 
                        </div> 
                    </div> 
                    <div class="col-md-3"> 
                        <div class="form-group"> 
                            <label  class="control-label">Serial Number</label> 
                            <input type="text" class="form-control" id="serial" name="serial" readonly> 
                        </div> 
                    </div>

                    <input type="hidden" name="pro_id" id="pro_id">  

            	</div>
            </div>

           <div style="box-shadow: 0px 3px 25px blue; margin-top:10px; padding: 5px; ">

            	<div class="row">


            		<div class="col-md-4"> 
                        <div class="form-group"> 
                            <label  class="control-label">B.U. Location</label> 
                           <select class="form-control " name="b_u_location" id="category" required="required">
					      <option value="" disabled selected>Select Location</option>
					      <?php echo $location; ?>
					     
					    </select>
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label  class="control-label">Department</label> 
                           <select class="form-control " name="dept" id="category" required="required">
					      <option value="" disabled selected>Select Department</option>
					      <?php echo $department; ?>
					     
					    </select>
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label  class="control-label">Receiever Name</label> 
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Receiever Name" required="required"> 
                        </div> 
                    </div>

            		
            	</div>	

            	<div class="row">


            		<div class="col-md-4"> 
                        <div class="form-group"> 
                            <label  class="control-label">Contact Number</label> 
                           <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter Receiever Contact Number" required="required">
                        </div> 
                    </div> 
                    
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label  class="control-label">Designation</label> 
                            <input type="text" class="form-control" id="position" name="position" placeholder="Enter Receiever Designation" required="required"> 
                        </div> 
                    </div>

                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label  class="control-label">Product Quentity</label> 
                            <input type="number" class="form-control" id="quentity" name="quentity" placeholder="Enter Product Quentity" required="required"> 
                        </div> 
                    </div>

            		
            	</div>

            	<div class="row">

            		<div class="col-md-12"> 
                        <div class="form-group"> 
                            <label  class="control-label">Remarks</label> 
                            <textarea name="remarks" class="form-control" placeholder="Enter some remarks about Product or Receiever........."></textarea>
                            
                        </div> 
                    </div>
            		
            	</div>

            	<div class="row">

            		<div class="col-md-12"> 
                         <div class="form-group m-b-0">    
<button id="btnSubmit" type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Submit</button>
							</div>
                    </div>
            		
            	</div>

        </div>

        </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




 <!-- sample modal content Show-->
    <div id="dataModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"  class="close text-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                    <h4 class="modal-title" id="myModalLabel">Given Product And Receiever Details</h4>
                </div>
                <div  id="printThis" class="printMe" style="box-shadow: 0px 2px 15px blue; padding: 8px;">

                	
                <div class="modal-body" id="data_show">
                    
                </div>
            </div>
                <div class="modal-footer">

                	<!--  <button type="button" class="btn btn-primary" onclick="printDiv('data_show')">Print</button> -->
                	
                    <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Close</button>
                    
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
        <!-- <script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script> -->
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- <script src="assets/jquery-blockui/jquery.blockUI.js"></script> -->

       
       <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

        <!--*************** For Data Table  EXcel JS ****************--> 
        <script src="assets/datatables/excel/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/excel/dataTables.buttons.min.js"></script>
        <script src="assets/datatables/excel/jszip.min.js"></script> 
        <script src="assets/datatables/excel/buttons.html5.min.js"></script> 

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  -->      




<script type="text/javascript">
    
    $(document).ready( function() {
    $('#datatable').DataTable( {
        "order": [],
        dom: 'Bfrtip',
        buttons: [ {
            extend: 'excelHtml5',
            customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
 
                $('row c[r^="C"]', sheet).attr( 's', '1' );
            }
        } ]
    } );
} );

</script>


 <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 730 + ',height=' + 680 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
            }
        </script> 

  

        
    
    </body>
</html>

<?php } ?>