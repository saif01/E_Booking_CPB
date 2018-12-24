<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
    $currentDate = date( 'Y-m-d');

if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{  
include('../db/config.php');

 $booking_id=$_GET['booking_id'];
 $driver_id=$_GET['driver_id'];

if (isset($_POST['submit'])) {
    
 $cost=$_POST['cost'];
 $driver_rating=$_POST['driver_rating'];
 $start_mileage=$_POST['start_mileage'];
 $end_mileage=$_POST['end_mileage'];



 $query4=mysqli_query($con,"UPDATE `car_booking` SET `booking_cost`='$cost', `driver_rating`='$driver_rating',`driver_id`='$driver_id' ,`start_mileage`='$start_mileage' ,`end_mileage`='$end_mileage'  WHERE `booking_id` ='$booking_id' ");

                    ?>
                    <script>
                        alert('Update Successfull..!!');
                        //location.reload();
                        window.open('user-notclosed-car','_self');
                        //window.location.reload(history.back());
                        </script>
                    <?php 

}

if (isset($_POST['closeComit'])){

$cost=$_POST['cost'];
 $driver_rating=$_POST['driver_rating'];
 $start_mileage=$_POST['start_mileage'];
 $end_mileage=$_POST['end_mileage'];

$query5=mysqli_query($con,"UPDATE `car_booking` SET `booking_cost`='$cost', `driver_rating`='$driver_rating',`driver_id`='$driver_id' ,`start_mileage`='$start_mileage' ,`end_mileage`='$end_mileage' , `comit_st`='1'  WHERE `booking_id` ='$booking_id' ");

?>
                    <script>
                        
                        //location.reload();
                        window.open('user-notclosed-car','_self');
                        //window.location.reload(history.back());
                        </script>
                    <?php

}
                    
     ?>


<?php 
include('include/header.php');
include('include/social_link_top.php');
include('include/manu.php');
 

?>

<!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">

                       <h2> 
                        <?php echo htmlentities($_SESSION['car_logIn_id']) ?>'s Booked car Commend Section</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->


    <!--== Car List Area Start ==-->
    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">
<!--Start fetch_assoc() array -->
                   <?php
                           $query=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `booking_id`='$booking_id' ");

                           $row=$query->fetch_assoc();
                           {                  
                     ?>

                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="article-thumb">
                                    <a href="car-details.php?car_id=<?php echo htmlentities($row['car_id']);?> ">  <img src="admin/p_img/carImg/<?php echo($row['car_img']);?>" class="img-responsive" alt="Image" /></a>
                                </div>
                            </div>
                            <!-- Articles Thumbnail End -->

                            <!-- Articles Content Start -->
                            <div class="col-lg-5">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                           <!--  <div class="car_model">
                                               <h3><a href="#"> Car Name </a>
                                                <span class="model-s">Model: <b>2013</b></span></h3>  
                                            </div> -->
                                            
                                          

                        

                                            <div class="">
                                            <table class="table ">

                                                <tr>
                                                    <th>Name & Number :</th>
                                                    <td> <?php echo $row['car_name']; ?> -- <b><?php echo $row['car_number']; ?></b></td>
                                                </tr>
                                                
                                                <form method="post" action="" >

                                                
                                                <tr>
                                                    <th>Start Mileage :</th>
                                                    <td><?php echo htmlentities($row['start_mileage']); ?> K.M. </td>
                                                </tr>

                                                <tr>
                                                    <th>End Mileage :</th>
                                                    <td><?php echo htmlentities($row['end_mileage']); ?> K.M. </td>
                                                </tr>

                                                <tr>
                                                    <th>Fuel Cost :</th>
                                                    <td><?php echo htmlentities($row['booking_cost']); ?> Taka </td>
                                                </tr>
                                                <tr>
                                                    <th>Driver Rating :</th>
                                                    <td>
                                                    <?php echo htmlentities($row['driver_rating']); ?> 

                                                     </td>
                                                
                                                </tr>

                                                <tr>
                                                    <th>
                                                    
                                                    
                                                    <button class="readmore-btn" type="button" data-toggle="modal" data-target="#exampleModal"> Update <i class="fa fa-long-arrow-right"></i></button>

                                                   

                                                    </th>
                                                </tr>
                                               </form>
                                            </table>
                                        </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Articles Content End -->

                    <div class="col-lg-2">

                        <?php    
$car_id=$row['car_id'];     
 $query2=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `car_id`='$car_id' LIMIT 1  ");
$row2 = $query2->fetch_assoc();


 
                                    $st= $row2['driver_status'];

                                    if ($st==0) { ?>

                                <div class="article-thumb-s"> 
                                    <a> <img src="admin/p_img/driverimg/dna/absence.jpg" class="img-responsive" alt="Image" /> </a>

                                    <p ><?php echo htmlentities($row2['driver_name']) ; ?> </p> 
                                    <p style="background-color: red;"> Driver Absence </p>                                                                     
                                </div>

                         <?php } 
                        else{ ?>

                                <div class="article-thumb-s">
                                                                      
                                    <a href="driver-details.php?driver_id=<?php echo htmlentities($row2['driver_id']);?>" > <img src="admin/p_img/driverimg/<?php echo($row2['driver_img']);?>" class="img-responsive" alt="Image" /> </a>

                                   
                                    <p><?php echo htmlentities($row2['driver_name']) ; ?> </p> 
                                    <p><i class="fa fa-mobile"></i> <?php echo htmlentities($row2['driver_phone']) ; ?> </p>                                   
                                  
                                </div>

                         <?php } ?>

                

                            </div>



                        </div>
                    </article>
                </div>
                <!-- Single Articles End -->
         
<!--Start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Put Commend Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <form method="post" name="chngpwd" >




          <div class="field form-group">
            <label for="recipient-name" class="col-form-label">Start Mileage :</label>
            <input type="Number"  name="start_mileage" placeholder="Put Meter Reading" class="form-control" value="<?php echo htmlentities($row['start_mileage']); ?>">
            </div>

            <div class="field form-group">
            <label for="recipient-name" class="col-form-label">End Mileage :</label>
            <input type="Number"  name="end_mileage" placeholder="Put Meter Reading" class="form-control" value="<?php echo htmlentities($row['end_mileage']); ?>">
            </div>
            
            <div class="field form-group">
            <label for="recipient-name" class="col-form-label">Fuel Cost :</label>
            <input type="Number" name="cost" placeholder="Amount of Taka" class="form-control" value="<?php echo htmlentities($row['booking_cost']); ?>">
            </div>
            <div class="field form-group">
            <label for="recipient-name" class="col-form-label">Driver Rating :</label>
            <input type="Number"  min="0" max="10" name="driver_rating" placeholder="Put marking out of 10" class="form-control" value="<?php echo htmlentities($row['driver_rating']); ?>">
            </div>
            <div class='actions'>
            <button type="submit" name="submit" class="btn btn-primary" >Update</button>
            
             <input type="submit" name="closeComit" class="btn btn-danger" onClick="return confirm('Are you sure you want to Close This???')" style="float: right;" value="Close Permanently" disabled="disabled" />
            </div>
        </form>
       
      </div>
      
    </div>
  </div>
</div>
<!--End Modal -->


<?php } ?>
<!--End fetch_assoc() array -->




            
            </div>

         
        </div>
    </div>
    <!--== Car List Area End ==-->




  
 <!--== Footer and Common js File start ==-->
<?php include('include/footer.php'); ?> 
 <!--== Footer and Common js File end ==-->



<script type="text/javascript">
   $(document).ready(function() {
    $('.field input').keyup(function() {

        var empty = false;
        $('.field input').each(function() {
            if ($(this).val().length == 0) {
                empty = true;
            }
        });

        if (empty) {
            $('.actions input').attr('disabled', 'disabled');
        } else {
            $('.actions input').removeAttr('disabled');
        }
    });
}); 
</script>




 <?php } ?>