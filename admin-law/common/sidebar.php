<?php
include('../db/config.php');
$sqlcountrow=mysqli_query($con,"SELECT * FROM `law_report` WHERE `status`='In Process'"); 
$countrow=mysqli_num_rows($sqlcountrow);
$sqlcountsatt=mysqli_query($con,"SELECT * FROM `law_report` WHERE `status`='Sattaled'"); 
$countsatt=mysqli_num_rows($sqlcountsatt);
?>


<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index" class="waves-effect active"><i class="md md-home text-success"></i><span>Dashboard</span></a>
                            </li>

                             <li>
                                <a href="inprocess-case" class="waves-effect">
                                    <i class="md md-repeat text-danger"></i>
                                    <span>In Process Cases</span>
                                    <span class="badge badge-danger"><?php echo $countrow; ?></span>
                                </a>
                            </li>

                             <li>
                                <a href="sattaled-case" class="waves-effect">
                                    <i class="md md-repeat-one text-warning"></i>
                                    <span>Sattaled Cases</span>
                                    <span class="badge badge-warning"><?php echo $countsatt; ?></span>
                                </a>
                            </li>

                             <li>
                                <a href="closed-case" class="waves-effect">
                                    <i class="md md-repeat text-success"></i>
                                    <span>Closed Cases</span>
                                    
                                </a>
                            </li>

                            <li>
                                <a href="report-all" class="waves-effect">
                                    <i class="md md-folder-open text-danger"></i>
                                    <span>Report All</span>
                                    
                                </a>
                            </li>

                            <li>
                                <a href="report_add" class="waves-effect">
                                    <i class="md md-edit text-success"></i>
                                    <span>Report Add</span>
                                    
                                </a>
                            </li>


                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-assignment-ind text-success"></i><span>Advisor Section </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">

                                    <li><a href="advisor-all">
                                        <i class="md md-folder-open text-danger"></i>
                                            <span> All Advisor Info. </span></a>
                                    </li>
                                    <li><a href="advisor-add">
                                        <i class="md md-edit text-success"></i>
                                            <span>Add Advisor</span></a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-notifications-on text-danger"></i><span>Notice Section</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">

                                    <li><a href="notice-all">
                                        <i class="md md-folder-open text-danger"></i>
                                            <span>All Notice </span></a>
                                    </li>
                                    <li><a href="notice-add">
                                        <i class="md md-edit text-success"></i>
                                            <span>Add Notice</span></a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="case-dept-add" class="waves-effect">
                                    <i class="md md-edit text-success"></i>
                                    <span>Case Department Add</span>
                                    
                                </a>
                            </li>

                           
                            

                            


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>