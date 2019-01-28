<?php
include('../db/config.php');
//Not Process Count
$sqlcout1=mysqli_query($con,"SELECT * FROM `cms_hard_complain` WHERE `status`='Not Process'"); 
$notprocess=mysqli_num_rows($sqlcout1);
//In Process Count
$sqlcount2=mysqli_query($con,"SELECT * FROM `cms_hard_complain` WHERE `status`='Processing'"); 
$proseccing=mysqli_num_rows($sqlcount2);
//Closed Count
$sqlcount3=mysqli_query($con,"SELECT * FROM `cms_hard_complain` WHERE `status`='Closed'"); 
$closed=mysqli_num_rows($sqlcount3);
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
                                <a href="not-process" class="waves-effect">
                                    <i class="md md-repeat text-danger"></i>
                                    <span>Not Process</span>
                                    <span class="badge badge-danger"><?php echo $notprocess; ?></span>
                                </a>
                            </li>

                             <li>
                                <a href="process" class="waves-effect">
                                    <i class="md md-repeat text-warning"></i>
                                    <span>In Process</span>
                                    <span class="badge badge-warning"><?php echo $proseccing; ?></span>
                                </a>
                            </li>

                             <li>
                                <a href="closed" class="waves-effect">
                                    <i class="md md-repeat-one text-success"></i>
                                    <span>Closed</span>
                                    <span class="badge badge-success"><?php echo $closed; ?></span>
                                </a>
                            </li>

                            <li>
                                <a href="damage" class="waves-effect">
                                    <i class="md  md-highlight-remove text-danger"></i>
                                    <span>Damaged Product</span>
                                    
                                </a>
                            </li>

                           <!--  <li>
                                <a href="not-delivered" class="waves-effect">
                                    <i class="md md-folder-open text-danger"></i>
                                    <span>Not Delivered</span>
                                    
                                </a>
                            </li> -->


                            <li>
                                <a href="report-all" class="waves-effect">
                                    <i class="md md-folder-open text-danger"></i>
                                    <span>Report All</span>
                                    
                                </a>
                            </li>

                             <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-arrow-forward text-success"></i><span>Delivery Section</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">

                                    <li>
                                        <a href="not-delivered" class="waves-effect">
                                    <i class="md md-folder-open text-danger"></i>
                                    <span>Not Delivered</span>
                                    
                                         </a>
                                    </li>
                                    <li>
                                        <a href="delivered" class="waves-effect">
                                    <i class="md md-folder-open text-danger"></i>
                                    <span>Delivered</span>
                                    
                                         </a>
                                    </li>
                                    
                                </ul>
                            </li>




                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-assignment-ind text-success"></i><span>Hardware Section</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">

                                    <li><a href="add-category">
                                        <i class="md md-folder-open text-danger"></i>
                                            <span> Add Category</span></a>
                                    </li>
                                    <li><a href="add-subcategory">
                                        <i class="md md-edit text-success"></i>
                                            <span>Add Subcategory</span></a>
                                    </li>
                                    
                                </ul>
                            </li>

                           <!--  <li class="has_sub">
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
                            </li> -->

                           
                            

                            


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>