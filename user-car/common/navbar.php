<style type="text/css">
.r_user {
    border-radius:50%;
    border: 2px solid #ffd000;   
    width: 40px;
    height: 30px;
}
.notification:hover {
  background: #ffd000;
}
.notification{
 position: absolute;
  top: -5px;
  right: -10px;
  padding:3px 8px;
  border-radius: 50%;
  background-color: red;
  color: white;
  margin-right: 10px;
}
</style>


<div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">


                            <ul>


                              <li>
                                 <?php
$user_id=$_SESSION['user_id'];
      
      date_default_timezone_set('Asia/Dhaka');// change according timezone            
      $currentdate = date('Y-m-d');                
            $notify=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `user_id`='$user_id' AND `comit_st`='' AND `boking_status`='1' AND date(`start_date`) <= date('$currentdate') ");
                  $number=mysqli_num_rows($notify);
                  ?>
                                   
                    <a href="user-notclosed-car" style="float:right;" >
                      <?php
                      if ($number>0) {?>
                        <span class="notification"><?php echo $number; ?></span>
                      <?php }?>
                      <i class="far fa-bell" style="font-size:32px;"></i>
                    </a>   

                               </li>


                      <li class="active">
                                <a href="index">Home </a>
                                </li>
                                
                                <li> 

                                 <?php
                                                               
$query2=mysqli_query($con,"SELECT `user_img` FROM `user` WHERE `user_id`='$user_id'");
                        $row2=$query2->fetch_assoc();?>

                                  <a href="#">                             
                        <img src="../pimages/user/<?php echo $row2['user_img']; ?>" class="img-responsive r_user" alt="Image" /> </a>
                                    <ul>
                                        <li><a href="user-booked-car">My Booked Car</a></li>
                                        <li><a href="user-notclosed-car">Not Closed Comment</a></li>
                                        <li><a href="user-info">My Profile</a></li>
                                        <li><a href="user-history">My Booking History</a></li>                                        
                                         <li><a href="user-changePass">Change Password</a></li>
                                        <li><a href="logout"> logout</a></li>
                                    </ul> 
                                 </li>   

                                <li><a href="#"> Car List </a>
                                    <ul>
                                        <li><a href="car-list-reg">Regular Car</a></li>
                                        <li><a href="car-list-temp">Temporary Car</a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="logout">Log Out</a></li>
                                <li>
       <!--  <a data-toggle="modal" href="index"  data-target="#advanceSearch"><i class="fas fa-search" style="font-size:32px;"></i></a> -->
       <a href="advance-search"><i class="fas fa-search" style="font-size:32px;"></i></a>
                                
                              </li>
                            </ul>
                        </nav>
                    </div>





