<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-super-login'])==0)
  { 
header('location:../admin/index');
}
else{  
 
include('../db/config.php');

//********** For Car Booking Chart *************//
$query2="SELECT `car_number`, COUNT(*) as number FROM `car_booking` WHERE `boking_status`=1 GROUP BY `car_number`";
$result2 = mysqli_query($con, $query2);
// Two table Join For pie Chart of *****User by Car Pool      
$query3="SELECT user.user_name, COUNT(car_booking.user_id) as number FROM car_booking LEFT JOIN user ON car_booking.user_id= user.user_id WHERE car_booking.boking_status='1' GROUP BY user_name";
$result3 = mysqli_query($con, $query3);

// Two table Join For pie Chart of ******Room Booking
$query5="SELECT room.room_name, COUNT(room_booking.room_id) as number FROM room_booking LEFT JOIN room ON room_booking.room_id= room.room_id WHERE room_booking.booking_st='1' GROUP BY room_name";
$result5 = mysqli_query($con, $query5);
 

// Two table Join For pie Chart of *****User by Room Booking
$query6="SELECT user.user_name, COUNT(room_booking.user_id) as number FROM room_booking LEFT JOIN user ON room_booking.user_id= user.user_id WHERE room_booking.booking_st='1' GROUP BY user_name";
$result6 = mysqli_query($con, $query6);

// For pie Chart of ******Legal 
$quer8="SELECT `status` , COUNT(*) as number FROM `law_report` WHERE `show_st`='1' GROUP BY `status`";
$regal_report = mysqli_query($con, $quer8);
 

//  pie Chart of *****Legal department
$quer9="SELECT `case_dept` , COUNT(*) as number FROM `law_report` WHERE `show_st`='1' GROUP BY `case_dept`";
$legal_dept = mysqli_query($con, $quer9);


// For pie Chart of ******Application Complains 
$query11="SELECT `status`, COUNT(*) AS number FROM `cms_app_complain` GROUP BY `status`";
$cmsAppC = mysqli_query($con, $query11);
 

//  pie Chart of *****Application user
$query12="SELECT user.user_name, COUNT(cms_app_complain.app_id) AS number FROM `cms_app_complain` LEFT JOIN user ON cms_app_complain.user_id=user.user_id GROUP BY user.user_name ";
$cmsAppU = mysqli_query($con, $query12);


// For pie Chart of ******CMS Hardware Complains 
$query13="SELECT `status`, COUNT(*) AS number FROM `cms_hard_complain` GROUP BY `status`";
$cmsHardC= mysqli_query($con, $query13);
 

//  pie Chart of *****CMS Hardware user
$query14="SELECT user.user_name, COUNT(cms_hard_complain.hard_id) AS number FROM `cms_hard_complain` LEFT JOIN user ON cms_hard_complain.user_id=user.user_id GROUP BY user.user_name";
$cmsHardU= mysqli_query($con, $query14);


// Count Total User
$sql=mysqli_query($con,"SELECT * FROM `user`");
$users=mysqli_num_rows($sql);
// Count Total Driver
$sql2=mysqli_query($con,"SELECT * FROM `car_driver`");
$drivers=mysqli_num_rows($sql2);
// Count Total Car
$sql3=mysqli_query($con,"SELECT * FROM `tbl_car`");
$cars=mysqli_num_rows($sql3);
// Count Total Booking
$sql4=mysqli_query($con,"SELECT * FROM `car_booking`");
$booking=mysqli_num_rows($sql4);
// Count Total Room Booking
$sql5=mysqli_query($con,"SELECT * FROM `room_booking`");
$room_booking=mysqli_num_rows($sql5);
// Count Total RoomS
$sql6=mysqli_query($con,"SELECT * FROM `room`");
$room_count=mysqli_num_rows($sql6);
// Count Total Legal Reports
$sql7=mysqli_query($con,"SELECT * FROM `law_report`");
$legal_report=mysqli_num_rows($sql7);
// Count Total Legal Notice
$sql8=mysqli_query($con,"SELECT * FROM `legal_notice`");
$legal_notice=mysqli_num_rows($sql8);


//Total CMS Hardware Complains 
$sql9=mysqli_query($con,"SELECT * FROM `cms_hard_complain`");
$CMShadrComp=mysqli_num_rows($sql9);
//Total CMS Hardware Closed Complains 
$sql10=mysqli_query($con,"SELECT * FROM `cms_hard_complain` WHERE `status`='Closed'");
$CMShadrCompClos=mysqli_num_rows($sql10);
//Total CMS Application Complains 
$sql11=mysqli_query($con,"SELECT * FROM `cms_app_complain`");
$CMSappComp=mysqli_num_rows($sql11);
//Total CMS Application Closed Complains 
$sql12=mysqli_query($con,"SELECT * FROM `cms_app_complain` WHERE `status`='Closed'");
$CMSappCompClos=mysqli_num_rows($sql12);
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

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
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-warning" style="background-color: ;"><i class="ion-connection-bars"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $booking; ?></span>
                                       Total Car Bookings
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-warning"><i class="ion-model-s"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $cars; ?></span>
                                        Total Cars
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-warning"><i class="ion-nuclear"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $drivers; ?></span>
                                        Total Drivers
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6 col-sm-6 col-lg-3">
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

                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info" style="background-color: ;"><i class="ion-pie-graph"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $room_booking; ?></span>
                                       Total Room Bookings
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info"><i class="ion-home"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $room_count; ?></span>
                                        Total Rooms
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <a href="">
                                    <span class="mini-stat-icon" style="background-color: #912CEE;" ><i class="ion-stats-bars"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $legal_report; ?></span>
                                        Total Legal Reports
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon" style="background-color: #912CEE;"  ><i class="ion-hammer"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $legal_notice; ?></span>
                                        Total Legal Notice
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </div> 
                        <!-- End row-->


                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info" style="background-color:#228B22 ;"><i class="ion-pie-graph"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $CMShadrComp; ?></span>
                                       Total Hard. Comp.
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info" style="background-color:#228B22 ;"><i class="ion-home"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $CMShadrCompClos; ?></span>
                                        Closed Hard. Comp.
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <a href="">
                                    <span class="mini-stat-icon" style="background-color: #0000CD;" ><i class="ion-stats-bars"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $CMSappComp; ?></span>
                                        Total App. Comp.
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon" style="background-color: #0000CD;"  ><i class="ion-clipboard"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"><?php echo $CMSappCompClos; ?></span>
                                        Closed App. Copm.
                                    </div>
                                    <div class="tiles-progress">
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </div> 
                        <!-- End row-->


<!-- Car Pool Chart -->
            <div class="row">
                 
                <div class="col-lg-6">
                    <div class="portlet"><!-- /portlet heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark text-uppercase">
                                Car Pool Booking Chart
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
                               Car Pool User Chart
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
<!--End Car Booking Chart -->

<!-- Room Booking Chart -->
            <div class="row">
                 
                <div class="col-lg-6">
                    <div class="portlet"><!-- /portlet heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark text-uppercase">
                                Room Booking Chart
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion3" href="#portlet4"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet4" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pie-chart">
                                            <div id="roomChart" style="height:300px;"></div>
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
                              Room Booking User Chart
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion4" href="#portlet5"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet5" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pie-chart">
                                             <div id="room_userChart" style="height:300px;"></div>
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /Portlet -->
                </div> <!-- end col -->

            </div> <!-- End row -->
<!--End Room Booking Chart -->


<!-- Legal Chart -->
            <div class="row">
                 
                <div class="col-lg-6">
                    <div class="portlet"><!-- /portlet heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark text-uppercase">
                                Case Chart
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion5" href="#portlet6"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet6" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pie-chart">
                                            <div id="legal_statusChart" style="height:300px;"></div>
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
                              Department Chart
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion6" href="#portlet7"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet7" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pie-chart">
                                             <div id="legal_deptChart" style="height:300px;"></div>
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /Portlet -->
                </div> <!-- end col -->

            </div> <!-- End row -->
<!--End Legal  Chart -->

<!--CMS Application Chart -->
            <div class="row">
                 
                <div class="col-lg-6">
                    <div class="portlet"><!-- /portlet heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark text-uppercase">
                               CMS Application Chart
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion8" href="#portlet9"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet9" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pie-chart">
                                            <div id="CMSappChartC" style="height:300px;"></div>
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
                              CMS Application User Chart
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion10" href="#portlet11"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet11" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pie-chart">
                                             <div id="CMSappUserChart" style="height:300px;"></div>
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /Portlet -->
                </div> <!-- end col -->

            </div> <!-- End row -->
<!--End CMS Application  Chart -->


<!--CMS Hardware Chart -->
            <div class="row">
                 
                <div class="col-lg-6">
                    <div class="portlet"><!-- /portlet heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark text-uppercase">
                               CMS Hardware Chart
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion13" href="#portlet14"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet14" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pie-chart">
                                            <div id="CMShardChartC" style="height:300px;"></div>
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
                              CMS Hardware User Chart
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion15" href="#portlet16"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet16" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pie-chart">
                                             <div id="CMShardUserChart" style="height:300px;"></div>
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /Portlet -->
                </div> <!-- end col -->

            </div> <!-- End row -->
<!--End CMS Hardware  Chart -->
                            
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


        <!--*************  Google Pai Chart Link *****************-->
    <script  src="../assets/js/g_pi_chart/chart.js" ></script>
    <!-- <script  src="../assets/js/g_pi_chart/jquery-1.12.4.js" ></script> -->
    <script  src="../assets/js/g_pi_chart/loader.js" ></script>
<!--*************  Car Pool Chart Link *****************-->
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
                               echo "['".$row2["car_number"]."', ".$row2["number"]."],";  
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
                    is3D:true,  
                    //pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('userChart'));
                chart.draw(data, options);
            }
        </script>

     <!--******************    For Room Booking Chart **********-->

       <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(userChart);

            function userChart() {
                var data = google.visualization.arrayToDataTable([
                    ['room_name', 'Number'],  
                          <?php  
                          while($row5 = mysqli_fetch_array($result5))  
                          {  
                               echo "['".$row5["room_name"]."', ".$row5["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {
                    title: 'Percentage of Room Booking', 'width':'auto', 'height':'auto',
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('roomChart'));
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
                          while($row6 = mysqli_fetch_array($result6))  
                          {  
                               echo "['".$row6["user_name"]."', ".$row6["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {
                    title: 'Percentage of User Booking', 'width':'auto', 'height':'auto',
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('room_userChart'));
                chart.draw(data, options);
            }
        </script>

<!-- Legal Chart -->

 <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(carChart);

            function carChart() {
                var data = google.visualization.arrayToDataTable([
                    ['status', 'Number'],  
                          <?php  
                          while($row9 = mysqli_fetch_array($regal_report))  
                          {  
                               echo "['".$row9["status"]."', ".$row9["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {

                    title: 'Percentage of Case Processing', 'width':'auto', 'height':'auto',
                    is3D: true,
                    //pieHole: 0.5  
                };
                var chart = new google.visualization.PieChart(document.getElementById('legal_statusChart'));
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
                          while($row99 = mysqli_fetch_array($legal_dept))  
                          {  
                               echo "['".$row99["case_dept"]."', ".$row99["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {
                    title: 'Percentage of Department By Cases', 'width':'auto', 'height':'auto',
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('legal_deptChart'));
                chart.draw(data, options);
            }



// CMS Application Complain Chart

  google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(CMSappChartC);

            function CMSappChartC() {
                var data = google.visualization.arrayToDataTable([
                    ['status', 'Number'],  
                          <?php  
                          while($row11 = mysqli_fetch_array($cmsAppC))  
                          {  
                               echo "['".$row11["status"]."', ".$row11["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {

                    title: 'Percentage of Complain Processing', 'width':'auto', 'height':'auto',
                    is3D: true,
                    //pieHole: 0.5  
                };
                var chart = new google.visualization.PieChart(document.getElementById('CMSappChartC'));
                chart.draw(data, options);
            }

google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(CMSappUserChart);

            function CMSappUserChart() {
                var data = google.visualization.arrayToDataTable([
                    ['user_name', 'Number'],  
                          <?php  
                          while($row12 = mysqli_fetch_array($cmsAppU))  
                          {  
                               echo "['".$row12["user_name"]."', ".$row12["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {
                    title: 'Percentage of User By Complain', 'width':'auto', 'height':'auto',
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('CMSappUserChart'));
                chart.draw(data, options);
            }




// CMS Hardware Complain Chart

  google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(CMShardChartC);

            function CMShardChartC() {
                var data = google.visualization.arrayToDataTable([
                    ['status', 'Number'],  
                          <?php  
                          while($row13 = mysqli_fetch_array($cmsHardC))  
                          {  
                               echo "['".$row13["status"]."', ".$row13["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {

                    title: 'Percentage of Complain Processing', 'width':'auto', 'height':'auto',
                    is3D: true,
                    //pieHole: 0.5  
                };
                var chart = new google.visualization.PieChart(document.getElementById('CMShardChartC'));
                chart.draw(data, options);
            }

google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(CMShardUserChart);

            function CMShardUserChart() {
                var data = google.visualization.arrayToDataTable([
                    ['user_name', 'Number'],  
                          <?php  
                          while($row14 = mysqli_fetch_array($cmsHardU))  
                          {  
                               echo "['".$row14["user_name"]."', ".$row14["number"]."],";  
                          }  
                          ?>  
                ]);
                var options = {
                    title: 'Percentage of User By Complain', 'width':'auto', 'height':'auto',
                    //is3D:true,  
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('CMShardUserChart'));
                chart.draw(data, options);
            }




        </script>





    
    </body>
</html>

<?php } ?>