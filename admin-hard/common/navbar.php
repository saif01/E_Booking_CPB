<div class="topbar">
 <?php 
    $admin_id= $_SESSION['admin_id'];
    $query=mysqli_query($con,"SELECT `admin_name`, `admin_img` FROM `admin` WHERE `admin_id`='$admin_id'");
   $row=$query->fetch_assoc();
     ?>
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index" class="logo"> <span style="font-size: 140%;">CPB.Hardware </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>


                    
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li>

                    <?php if (strlen($_SESSION['admin-redirect']) !=0 ) 
                    {?>
                     <a href="../admin/project_direct/"><button class="btn btn-danger">Home</button></a>
                    <?php }?> </li>
                                 
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../pimages/admin/<?php echo $row['admin_img']; ?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        
                                        <li><a href="change-password"><i class="md md-lock"></i>Change Password</a></li>
                                        <li><a href="logout"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>




                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>