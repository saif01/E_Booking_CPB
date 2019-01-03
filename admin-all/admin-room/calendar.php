<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-all-login'])==0)
  { 
header('location:../../admin');
}
else{ 
include('../../db/config.php');


//*********** 2 table join ******************//
//***********Start Calendar Data Show ************//
$calData=array();
$calenderSql=mysqli_query($con,"SELECT room_booking.r_booking_id, room_booking.booking_start, room_booking.booking_end, user.user_name, user.user_dept, room.room_name FROM room_booking INNER JOIN user ON room_booking.user_id=user.user_id INNER JOIN room ON room_booking.room_id=room.room_id WHERE room_booking.booking_st='1'");

while ($cal_row = $calenderSql->fetch_assoc()) 
{
  $calData[]=array(

    'id'=> $cal_row["r_booking_id"],
    'title'=> $cal_row["room_name"].' || '. $cal_row["user_name"].' || '. $cal_row["user_dept"],
    'start'=> $cal_row["booking_start"],
    'end'=> $cal_row["booking_end"],
  );  
}
//***********End Calendar Data Show ************//

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CPB.RoomBooking</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />


    </head>
     <body>
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <?php include('common/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">

                <!-- partial:partials/_sidebar.html -->
                <?php include('common/sidebar.php'); ?>
                <!-- partial -->
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">


                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                              <button class="card-title btn btn-outline btn-block ">All Booked Information Show By Calendar</button>
                                     

                                        <div id='calendar'></div>


                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <?php include('common/footer.php') ?>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>

         <!-- For Calendar Load Links -->
        <link href='cal/fullcalendar.min.css' rel='stylesheet' />
        <link href='cal/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <script src='cal/lib/moment.min.js'></script>
        <script src='cal/lib/jquery.min.js'></script>
        <script src='cal/fullcalendar.min.js'></script>
        <script src='cal/locale-all.js'></script>



	 <script>
	  $(document).ready(function() {

	    $('#calendar').fullCalendar({
	      header: {
	        left: 'prev,next today',
	        center: 'title',
	        right: 'month,agendaWeek,agendaDay,listWeek'
	      },
	      //defaultDate: '2018-03-12',
	      navLinks: true, // can click day/week names to navigate views

	      weekNumbers: true,
	      weekNumbersWithinDays: true,
	      weekNumberCalculation: 'ISO',

	      //editable: true,
	      eventLimit: true, // allow "more" link when too many events
	      events: <?php echo json_encode($calData); ?>
	        
	    });    
	  });
	</script>






         </body>

    </html>

    <?php } ?>