<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );//H, Time in 24 hours show , h, for 12 hours 
if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{
include('../db/config.php');
include('../line/line_Car_Msg.php');

$car_id= $_GET['car_id'];
$user_login= $_SESSION['car_logIn_id'];
$user_id= $_SESSION['user_id'];

//*********Only User Real Name finding *********//
$Query0=mysqli_query($con,"SELECT `user_name`, `user_dept` FROM `user` WHERE `user_login`='$user_login'");
$S_name=$Query0->fetch_assoc();
$U_realName=$S_name['user_name'];
$dept=$S_name['user_dept'];
$u_dept=str_replace('&', 'and', $dept);


//******************* Car and Driver joining *********************//
$drCarSql=mysqli_query($con,"SELECT tbl_car.car_name, tbl_car.car_namePlate, tbl_car.car_img1, car_driver.driver_id, car_driver.driver_name, car_driver.driver_img FROM tbl_car INNER JOIN car_driver ON tbl_car.car_id=car_driver.car_id WHERE tbl_car.car_id='$car_id' ");
$value=$drCarSql->fetch_assoc();
//*** Car Table Value ****//
$car_name= $value['car_name'];
$car_number=$value['car_namePlate'];
$car_img=$value['car_img1'];
//*** Driver Table Value ****//
$driver_id=$value['driver_id']; 
$dariver_name=$value['driver_name'];
$driver_img=$value['driver_img'];


if (isset($_POST['submit'])) {

   $start_date=$_POST['start_date'];
    $start_book= $_POST['start_date'] . ' ' . $_POST['start_time'];
    $end_book= $_POST['start_date'] . ' ' . $_POST['return_time'];  

    //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($start_book);
        $ts2    =   strtotime($end_book);
        $seconds    = abs($ts2 - $ts1); # difference will always be positive
        $days = round($seconds/(60*60*24));
        //$days2 = $seconds/(60*60*24);
  //Start Time Subtraction and convert to days.
 
        $currentTime = date( 'Y-m-d h:i:s', time () );   
      $ts3   =   strtotime($currentTime);
      $ts4    =   strtotime($start_book);
      $seconds    = abs($ts3 - $ts4); # difference will always be positive
      $afterdays = round($seconds/(60*60*24));

//**************** Driver leave Status Checking ***********************//
 $drivLev=mysqli_query($con,"SELECT * FROM `driver_leave` WHERE `leave_status`='1' AND `driver_id`='$driver_id' AND date('$start_date') BETWEEN date(`driver_leave_start`) AND date(`driver_leave_end`)");
$drivLevs=mysqli_num_rows($drivLev);


//**************** Police Requsition Status Checking ***********************//
 $police_req=mysqli_query($con,"SELECT * FROM `police_req` WHERE `car_id`='$car_id' AND `req_st`='1' AND ( `req_start` BETWEEN '$start_book' AND '$end_book' OR `req_end` BETWEEN '$start_book' AND '$end_book' OR '$start_book' BETWEEN `req_start` AND `req_end` OR '$end_book' BETWEEN `req_start` AND `req_end` )");
$req_num=mysqli_num_rows($police_req);
      
        if(date($start_date) < date('Y-m-d'))
                {
                  $_SESSION['error']="pre";
                  header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
//************For checking Driver leave Status *********//
        elseif($drivLevs>0)
              	{
	               $_SESSION['error']="driverLeave";
	               header('Location: ' . $_SERVER['HTTP_REFERER']);
              	} 
//************ For checking Police Requsition Have or Not *********//
        elseif ($req_num > 0) 
              {
                $_SESSION['error']="ploce_requisition";
              }
              


        else{

           //************* Checking Another booking have or not ******************//
    $sql=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `car_id`='$car_id' AND `boking_status`='1' AND ( `start_date` BETWEEN '$start_book' AND '$end_book' OR `end_date` BETWEEN '$start_book' AND '$end_book' OR '$start_book' BETWEEN `start_date` AND `end_date` OR '$end_book' BETWEEN `start_date` AND `end_date` )");

                $result=mysqli_num_rows($sql);

                if ($result > 0) 
                {   
                    $_SESSION['error']="booked";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);   
                }               
                else
                {                   
                    $start_book= $_POST['start_date'] . ' ' . $_POST['start_time'];
                    $end_book= $_POST['start_date'] . ' ' . $_POST['return_time'];

                    $location=$_POST['location'];
                    $purpose=$_POST['purpose'];

                    $purposeLine = str_replace('&', 'and', $purpose);
                    $locationLine = str_replace('&', 'and', $location);

                    $status=1;

                    $samRecd=mysqli_query($con,"SELECT * FROM `car_booking` WHERE `boking_status`='1' AND `start_date`='$start_book' AND `end_date`='$end_book' AND `location`='$location' AND `user_name`!='$user_login'");
                    $sameResult=mysqli_num_rows($samRecd);

                    if ($sameResult > 0){

                   $query=mysqli_query($con,"INSERT INTO `car_booking`(`car_id`, `user_id`, `user_name`, `car_name`, `car_number`, `car_img`, `start_date`, `end_date`, `location`, `purpose`, `day_count`, `boking_status`) VALUES ('$car_id','$user_id','$user_login','$car_name','$car_number','$car_img','$start_book','$end_book','$location','$purpose','$days','$status')");

  //*************For Sending Line Group Message*******************//
                  $message="Booked Status,%0A Booked By: $U_realName,%0A Department: $u_dept,%0A Destination: $locationLine,%0A Purpose: $purposeLine,%0A Driver: $dariver_name,%0A Car: $car_number,%0A Start: $start_book,%0A End: $end_book.";
                    lineMsg($message);

                  $_SESSION['error']="same_result";
 //************Store Value in SESSION for show same record*********//                
                  $_SESSION['start_book']=$start_book;
                  $_SESSION['end_book']= $end_book;
                  $_SESSION['location']=$location;

                  header('Location: ' . $_SERVER['HTTP_REFERER']);
                        
                      }
                      else
                      {
                        $query=mysqli_query($con,"INSERT INTO `car_booking`(`car_id`, `user_id`, `user_name`, `car_name`, `car_number`, `car_img`, `start_date`, `end_date`, `location`, `purpose`, `day_count`, `boking_status`) VALUES ('$car_id','$user_id','$user_login','$car_name','$car_number','$car_img','$start_book','$end_book','$location','$purpose','$days','$status')");
                        
//*************For Sending Line Group Message*******************//
                      $message="Booked Status,%0A Booked By: $U_realName,%0A Department: $u_dept,%0A Destination: $locationLine,%0A Purpose: $purposeLine,%0A Driver: $dariver_name,%0A Car: $car_number,%0A Start: $start_book,%0A End: $end_book.";
                        lineMsg($message);
                                             
//****************** Start Sweet Alert ********************///
                          ?>

                <!--*********start Sweet alert For Submiting data **********-->
                 <script src="assets/coustom/swwetalert/jslib.js"></script>
                 <script src="assets/coustom/swwetalert/dev.js"></script>
                 <link rel="stylesheet" type="text/css" href="assets/coustom/swwetalert/sweetalert.css">
                <!--*********end Sweet alert For Submiting data **********-->

                      <script>
                        setTimeout(function () { 
                                swal({
                                  title: "Booked Successfully!",
                                  text: "Your Car Booking Completed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "car-list-temp.php";
                                  }
                                }); },0);
                       
                      </script>
                      <?php
//****************** End Sweet Alert ********************///

                           $_SESSION['error']="";
                      }
                    
                }

        }

 }

    
}
 ?>
