<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-car-login'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');


//start For Load data for show on calender.......................
$calData = array();

$calenderSql =mysqli_query($con,"SELECT car_booking.booking_id, car_booking.start_date, car_booking.end_date, car_booking.location, car_booking.car_number, user.user_name, user.user_dept FROM car_booking INNER JOIN user ON car_booking.user_id=user.user_id WHERE car_booking.boking_status='1'");

while ($cal_row = $calenderSql->fetch_assoc()) 
{
  $calData[]=array(

    'id'=> $cal_row["booking_id"],
    'title'=> $cal_row["car_number"].' || '. $cal_row["location"].' || '. $cal_row["user_name"].' || '.$cal_row["user_dept"],
    'start'=> $cal_row["start_date"],
    'end'=> $cal_row["end_date"],
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
        <?php include('common/title.php'); ?>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
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
                                        <!-- <h4 class="card-title">All Booked Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">All Booked Information Show By Calendar</button>
                                        <!--     <div class="table-responsive"> -->


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
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->


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