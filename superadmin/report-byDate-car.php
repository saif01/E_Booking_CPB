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

         <!--Excel DataTables -->
    <link href="assets/datatables/excel/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/excel/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

          
        
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
                                        <h3 class="panel-title">Car Booking Report Show By Date</h3>
                                    </div>
                                    <div class="panel-body">

                                       
    <form class="form-horizontal" action="" method="post" >

	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">
                  <input type="date"  name="start_date" class="form-control" required>
            	 
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">End Date</label>
                <div class="col-sm-9">
                  <input type="date"  name="end_date" class="form-control" required>
            	 
                </div>
            </div>
            
    </div>

	<div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Car</label>
                <div class="col-sm-9">
                  <select name="car_id" class="form-control">
         		 <option value="pick"> Select Car </option>
<?php
				$query2=mysqli_query($con,"SELECT `car_id`, `car_name`, `car_namePlate` FROM `tbl_car` ");
			while ($row2 = mysqli_fetch_array($query2))
			{
echo "<option value='". $row2['car_id'] ."'>" .$row2['car_name'] ." -- ". $row2['car_namePlate']. "</option>" ;
}
?>
                </select>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                  <button type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">View Report</button>
                </div>
            </div>
    </div>
   

                 </form>


                                    </div> <!-- Panel-body -->
                                    
                                </div> <!-- Panel -->
                            </div> <!-- col-->
                            
                        </div> <!-- End row -->



<?php 
if(isset($_POST['submit']))
{
     $start_date= $_POST['start_date'];
     $end_date=$_POST['end_date'];
     $car_id=$_POST['car_id'];


?> 

                        <!-- Start Widget -->
                        <div class="row">
                           
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Report Show By Date</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive ">

                                     	



                    <table id="datatable" class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                               
                            <th>Car</th>
                            <th>Booking Start</th>
                            <th>Booking Ends</th>
                            <th>Location</th>
                            <th>Purpose</th>
                            <th>User</th>
                            <th>Driver</th>
                            <th>Days</th>
                            <th>Status</th>
                            <th>Cost</th>
                            <th>Milage</th>
                            <th>Rating</th>

          
                        </tr>
                        </thead>

                 
                        <tbody>
    <?php 
    $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id'  AND   `start_date` >= '$start_date' AND `end_date`<= '$end_date' ORDER BY `booking_id` DESC");

	while($row=mysqli_fetch_array($query))
	{?>

   
                                                    <tr>
                                

       <td>
		        <a href="javascript:void(0);" onClick="popUpWindow('car-profile.php?car_id=<?php echo htmlentities($row['car_id']);?>');" title="View Driver Info.">

		            <?php echo htmlentities($row['car_name']. '- '.$row['car_number'] ) ; ?>
		        </a>

		    </td>


		    <td>
		        <?php echo date("F j, Y, g:i a", strtotime($row['start_date'])); ?>
		    </td>

		    <td class="center">
		        <?php echo date("F j, Y, g:i a", strtotime($row['end_date'])); ?>
		    </td>


		    <td class="center">
		        <?php echo htmlentities($row['location']); ?>
		    </td>
		    <td class="center">
		        <?php echo htmlentities($row['purpose']); ?>
		    </td>

		    <td class="center">
		        <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?user_id=<?php echo htmlentities($row['user_id']);?>');" title="View User Info.">

		            <?php echo htmlentities($row['user_name']); ?> </a>

		    </td>
		    <td class="center">
<?php
$driver_id=$row['driver_id'];
$sql=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' ");
$row2=$sql->fetch_assoc();
?>
<a href="javascript:void(0);" onClick="popUpWindow('driver-profile.php?driver_id=<?php echo $driver_id;?>');" title="View Driver Info.">

<?php echo htmlentities($row2['driver_name']); ?> </a>

            </td>

            <td class="center">
                <?php echo htmlentities($row['day_count']); ?>
            </td>
            <td class="center">

                <?php $st=$row['boking_status']; 
                if($st=='1')
                    {echo "Booked";}
                  else{
                    echo "Canceled";
                  }
                ?>

            </td>
            <td class="center">
                <?php echo htmlentities($row['booking_cost']); ?>
            </td>
            <td>
                <?php echo htmlentities($row['start_mileage']. '- '.$row['end_mileage'] ) ; ?> </td>

            <td class="center">
                <?php echo htmlentities($row['driver_rating']); ?>
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
 <?php } ?>





                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    <?php include('common/footer.php') ?>
                </footer>

            </div>
          


            

        </div>
        <!-- END wrapper -->


    
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

        <!-- <script src="assets/datatables/jquery.dataTables.min.js"></script> -->
        <!-- <script src="assets/datatables/dataTables.bootstrap.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script> -->

        <!--*************** For Data Table  EXcel JS ****************--> 
        <script src="assets/datatables/excel/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/excel/dataTables.buttons.min.js"></script>
        <script src="assets/datatables/excel/jszip.min.js"></script> 
        <script src="assets/datatables/excel/buttons.html5.min.js"></script>        
 
 


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
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 780 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
</script>  

       
   
    
    </body>
</html>

<?php } ?>