<style type="text/css">
.r_user {
    border-radius:50%;
    border: 2px solid #11f7d4;
    
    width: 40px;
    height: 30px;
}

 


</style>


<div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                              


                          <li class="active"><a href="index">Home </a>    
                                </li>
                                
                                <li> 

                                 <?php
                        require('../db/config.php');
                     $user_id=$_SESSION['user_id'];                                       
$query2=mysqli_query($con,"SELECT `user_img` FROM `user` WHERE `user_id`='$user_id'");
                        $row2=$query2->fetch_assoc();?>

                                  <a href="#">                             
                        <img src="../pimages/user/<?php echo $row2['user_img'];?>" class="img-responsive r_user" alt="Image" /> </a>
                                    <ul>
                                        <li><a href="user-booked-room">My Booked Room</a></li>
                                        <li><a href="profile">My Profile</a></li>
                                        <li><a href="booking-history">My Booking History</a></li>                                        
                                         <!-- <li><a href="change-pass">Change Password</a></li> -->
                                        <li><a href="logout"> logout</a></li>
                                    </ul> 
                                 </li>   

                                <li><a href=""> Room List </a>
                                    <ul>
                                        <li><a href="meeting-room">Meeting Room</a></li>
                                        <li><a href="residential-room">Residential Room</a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="logout">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>