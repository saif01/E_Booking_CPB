<style type="text/css">
.r_user {
    border-radius:50%;
    border: 2px solid #1E90FF;
    
    width: 40px;
    height: 30px;
}

 


</style>


<div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                              
<?php if (strlen($_SESSION['user_redirect']) !=0 ) 
{?>
 <li><a href="../user-all/">Go Another</a></li>
<?php }?> 

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
                                        
                                        <li><a href="profile">My Profile</a></li>
                                                                                
                                         <li><a href="change-pass">Change Password</a></li>
                                        <li><a href="logout"> logout</a></li>
                                    </ul> 
                                 </li>   

                                <li><a href="complain-submit">Complain</a> </li>

                                
                                <li>
                                  <a href="">History</a> 
                                  <ul>
                                    <li><a href="hard-history">Hardware Complains</a></li>
                                    <li><a href="app-history">Application Complains</a></li>
                                  </ul>
                                </li>


                                <li><a href="logout">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>