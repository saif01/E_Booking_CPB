<?php
include('../../db/config.php');

if (isset($_POST['submit'])) {
	$start_date=$_POST['start_date'];
	//****** Time **********//
	$start_time=$_POST['start_time'];
	$return_time=$_POST['return_time'];

	$booking_start=$_POST['start_date'] . ' ' . $_POST['start_time'];
	$booking_end=$_POST['start_date'] . ' ' . $_POST['return_time'];
  	$purpose=$_POST['purpose'];
	$booking_st=1;

  //Start Time Subtraction and convert to days.
        $ts1    =   strtotime($booking_start);
        $ts2    =   strtotime($booking_end);
        $seconds    = abs($ts2 - $ts1); # difference will always be positive
        //$days = round($seconds/(60*60*24));
        $hours=round($seconds/(60*60));
  //Start Time Subtraction and convert to days.


//****** Booked info Check **********//
	$bookedCh=mysqli_query($con,"SELECT * FROM `booking` WHERE `booking_st`='1' AND '$booking_start' BETWEEN `booking_start` AND `booking_end`");
	$booked=mysqli_num_rows($bookedCh);


	if ($booking_start < $currentTime) 
	{
		$_SESSION['error']="timeError";
	}

	elseif ($booked>0) 
	{
		$_SESSION['error']="booked";
	}

	else
	{

	$storeData=mysqli_query($con,"INSERT INTO `room_booking`(`room_id`, `booking_start`, `booking_end`, `purpose`, `hours`, `booking_st`, `user_id`) VALUES ('$room_id','$booking_start','$booking_end','$purpose','$hours','$booking_st','$user_id')");

						  ?>
                     		<script>
                              alert('Update successfull..  !');
                              window.open('meeting-room.php','_self');
                              </script>
                          <?php 
	

      }


}



?>