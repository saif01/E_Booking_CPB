<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin_inventory'])==0)
  { 
header('location:../admin');
}
else{  

include('../db/config.php');


// For pie Chart of ******Complains 
$query2="SELECT `status`, COUNT(*) AS number FROM `cms_hard_complain` GROUP BY `status`";
$result2 = mysqli_query($con, $query2);
 

//  pie Chart of *****user
$query3="SELECT user.user_name, COUNT(cms_hard_complain.hard_id) AS number FROM `cms_hard_complain` LEFT JOIN user ON cms_hard_complain.user_id=user.user_id GROUP BY user.user_name";
$result3 = mysqli_query($con, $query3);

//Total Users
$sql=mysqli_query($con,"SELECT * FROM `user` WHERE `user_cms_st`='1'");
$users=mysqli_num_rows($sql);


//Total Complains
$sql4=mysqli_query($con,"SELECT * FROM `cms_hard_complain`");
$complains=mysqli_num_rows($sql4);

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
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info" style="background-color: ;"><i class="ion-connection-bars"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $complains; ?></span>
                                        Total Complain's
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix bx-shadow">
                                    
                                    <span class="mini-stat-icon bg-success"><i class="md-assignment-ind"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $users; ?></span>
                                        Total Users
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                                
                            </div>

                            
                        </div> 
                        <!-- End row-->


                        <div class="row">
                             
                            <div class="col-lg-6">
                                <div class="portlet"><!-- /portlet heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark text-uppercase">
                                            Complain Chart
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                            <span class="divider"></span>
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                            <span class="divider"></span>
                                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="portlet2" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="pie-chart">
                                                        <div id="carChart" style="height:300px;"></div>
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /Portlet -->
                            </div> <!-- end col -->


                            <div class="col-lg-6">
                                <div class="portlet"><!-- /portlet heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark text-uppercase">
                                            User Chart
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                            <span class="divider"></span>
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#portlet3"><i class="ion-minus-round"></i></a>
                                            <span class="divider"></span>
                                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="portlet3" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="pie-chart">
                                                         <div id="userChart" style="height:300px;"></div>
                                                    </div>

                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /Portlet -->
                            </div> <!-- end col -->

                        </div> <!-- End row -->



                            
                        </div> <!-- end row -->

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


       

        <!-- Counter-up -->
        <script src="assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>


        <!--************* Google Pai Chart Link *****************-->
    <script  src="../assets/js/g_pi_chart/chart.js" ></script>
    <!-- <script  src="../assets/js/g_pi_chart/jquery-1.12.4.js" ></script> -->
    <script  src="../assets/js/g_pi_chart/loader.js" ></script>

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

                    title: 'Percentage of Complain Processing', 'width':'auto', 'height':'auto',
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
                    title: 'Percentage of User By Complain', 'width':'auto', 'height':'auto',
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('userChart'));
                chart.draw(data, options);
            }
        </script>




    
    </body>
</html>

<?php } ?>