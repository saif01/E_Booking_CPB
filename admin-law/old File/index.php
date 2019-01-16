<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-law-login'])==0)
  { 
header('location:../admin');
}
else{ 
 
include('../db/config.php');
 

// For pie Chart of ******Legal 
$query2="SELECT `status` , COUNT(*) as number FROM `law_report` WHERE `show_st`='1' GROUP BY `status`";
$result2 = mysqli_query($con, $query2);
 

//  pie Chart of *****Legal department
$query3="SELECT `case_dept` , COUNT(*) as number FROM `law_report` WHERE `show_st`='1' GROUP BY `case_dept`";
$result3 = mysqli_query($con, $query3);
//Total Users
$sql=mysqli_query($con,"SELECT * FROM `user` WHERE `user_st`='1' AND `user_law_st`='1'");
$users=mysqli_num_rows($sql);

//Total 
$sql3=mysqli_query($con,"SELECT * FROM `advisor`");
$advisor=mysqli_num_rows($sql3);
//Total Cases
$sql4=mysqli_query($con,"SELECT * FROM `law_report`");
$cases=mysqli_num_rows($sql4);

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
                                                    <p class="mb-0 text-right">Total Cases</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $cases; ?>
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
                                    <a href="advisor-all">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <i class="mdi mdi-gavel text-warning icon-lg"></i>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 text-right">Total Advisor</p>
                                                    <div class="fluid-container">
                                                        <h3 class="font-weight-medium text-right mb-0">
                                                            <?php echo $advisor; ?>
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
                                    <a href="#">
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
                                        <h4 class="card-title">Case chart</h4>
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
                                        <h4 class="card-title">Department chart</h4>
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
    <script type="text/javascript" src="../assets/js/g_pi_chart/chart.js" ></script>
    <script type="text/javascript" src="../assets/js/g_pi_chart/jquery-1.12.4.js" ></script>
    <script type="text/javascript" src="../assets/js/g_pi_chart/loader.js" ></script>



        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(carChart);

            function carChart() {
                var data = google.visualization.arrayToDataTable([
                    ['status', 'Number'],  
                          <?php  
                          while($row2 = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row2["status"]."', ".$row2["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {

                    title: 'Percentage of Case Processing', 'width':'auto', 'height':'auto',
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
                    ['case_dept', 'Number'],  
                          <?php  
                          while($row3 = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row3["case_dept"]."', ".$row3["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {
                    title: 'Percentage of Department By Cases', 'width':'auto', 'height':'auto',
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