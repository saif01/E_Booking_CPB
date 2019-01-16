<style type="text/css">
.r_user {
    border-radius:50%;
    border: 2px solid #912CEE;
    
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
                                        
                                        <li><a href="profile">My Profile</a></li>                                        
                                         <li><a href="change-pass">Change Password</a></li>
                                        <li><a href="logout"> logout</a></li>
                                    </ul> 
                                 </li>   

                                <li><a href="">Legal</a>
                                    <ul>
                                        <li><a href="law-history">All Cases </a></li>
                                        <li><a href="processing-law">Processing Cases</a></li>
                                        <li><a href="sattaled-law">Sattaled Cases</a></li>
                                        <li><a href="closed-law">Closed Cases</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Departments</a>
                                    <ul>
                                        <?php $dept=mysqli_query($con,"SELECT `department` FROM `case_dept`");
                                        while($row=mysqli_fetch_array($dept))
                                                    {
                                         ?>
                                        <li><a href="case-bydept?dept=<?php echo $row['department']; ?>"><?php echo $row['department']; ?> </a></li>

                                        <?php }?>
                                        
                                    </ul>
                                </li>
                                <li><a href="">Others</a>
                                    <ul>
                                        <li><a href="law-advisors">Advisor</a></li>
                                        <li><a href="notice-all">All Notice</a></li>
                                        
                                    </ul>
                                </li>
                                
                                <li><a href="logout">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>