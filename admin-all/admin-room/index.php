<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-all-login'])==0)
  { 
header('location:../../admin');
}
else{ 

include('../../db/config.php');
 

// Two table Join For pie Chart of ******Room Booking
$query2="SELECT room.room_name, COUNT(room_booking.room_id) as number FROM room_booking LEFT JOIN room ON room_booking.room_id= room.room_id WHERE room_booking.booking_st='1' GROUP BY room_name";
$result2 = mysqli_query($con, $query2);
 

// Two table Join For pie Chart of *****User by Room Booking
$query3="SELECT user.user_name, COUNT(room_booking.user_id) as number FROM room_booking LEFT JOIN user ON room_booking.user_id= user.user_id WHERE room_booking.booking_st='1' GROUP BY user_name";
$result3 = mysqli_query($con, $query3);
//Total Users
$sql=mysqli_query($con,"SELECT * FROM `user`");
$users=mysqli_num_rows($sql);

//Total Rooms
$sql3=mysqli_query($con,"SELECT * FROM `room`");
$rooms=mysqli_num_rows($sql3);
//Total Room Booking
$sql4=mysqli_query($con,"SELECT * FROM `room_booking`");
$booking=mysqli_num_rows($sql4);

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
            <!-- partial:partials/_navbar.html -->
            <?php include('common/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <?php include('common/sidebar.php'); ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">

                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <a href="report-all">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 text-right">Total Booking</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $booking; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="text-muted mt-3 mb-0">
                                                <i class="mdi mdi-cursor-pointer mr-1" aria-hidden="true"></i> Click To Show Report
                                            </p>

                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <a href="room-all">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <i class="mdi mdi-home text-warning icon-lg"></i>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 text-right">Total Rooms</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $rooms; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-muted mt-3 mb-0">
                                                <i class="mdi mdi-cursor-pointer mr-1" aria-hidden="true"></i> Click To Show 
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                           
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <a href="user-all-info">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <i class="mdi mdi-account-location text-info icon-lg"></i>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 text-right">All Users</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $users; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-muted mt-3 mb-0">
                                                <i class="mdi mdi-cursor-pointer mr-1" aria-hidden="true"></i> Click To Show Report
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Car chart</h4>
                                        <div id="carChart" style="height:300px;"></div>
                                        

                                        <div id="chart_wrap">
                                        <div id="chart_div"></div>
                                            </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">User chart</h4>
                                        <div id="userChart" style="height:300px;"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>



                    

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
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

<!--************* Google Pai Chart Link *****************-->
    <script type="text/javascript" src="../../assets/js/g_pi_chart/chart.js" ></script>
    <script type="text/javascript" src="../../assets/js/g_pi_chart/jquery-1.12.4.js" ></script>
    <script type="text/javascript" src="../../assets/js/g_pi_chart/loader.js" ></script>


        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(carChart);

            function carChart() {
                var data = google.visualization.arrayToDataTable([
                    ['car_number', 'Number'],  
                          <?php  
                          while($row2 = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row2["room_name"]."', ".$row2["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {

                    title: 'Percentage of Car Booking', 'width':'auto', 'height':'auto',
                    is3D: true,
                    //pieHole: 0.5  
                };
                var chart = new google.visualization.PieChart(document.getElementById('carChart'));
                chart.draw(data, options);
            }
        </script>

        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(userChart);

            function userChart() {
                var data = google.visualization.arrayToDataTable([
                    ['user_name', 'Number'],  
                          <?php  
                          while($row3 = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row3["user_name"]."', ".$row3["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {
                    title: 'Percentage of User Booking', 'width':'auto', 'height':'auto',
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('userChart'));
                chart.draw(data, options);
            }
        </script>

    


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
        <script src="js/dashboard.js"></script>
        <!-- End custom js for this page-->
    </body>

    </html>
    <?php } ?>