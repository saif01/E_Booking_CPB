<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );//H, Time in 24 hours show , h, for 12 hours 
$currentDate=date('Y-m-d');

if(strlen($_SESSION['car_logIn_id'])==0)
  { 
header('location:../index');
}
else{

include('../db/config.php');

 


if (isset($_POST['submit'])) 
{

	$end_book= $_POST['end_date'] . ' ' . $_POST['return_time'];

	if ($start > $end_book) {
		 $_SESSION['error']="sameTime";
	}

	else{
						?>
						<script>
                        setTimeout(function () { 
                                swal({
                                  title: "Successfully!",
                                  text: "Your End Booking Time Changed!",
                                  type: "success",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                   window.opener.location.reload();
				          		   window.close();
                                  }
                                }); },0);
                         
                      </script>
                      <?php

	}

	
	
}




$booking_id=$_GET['booking_id'];

$sql=mysqli_query($con,"SELECT car_booking.start_date, car_booking.end_date, tbl_car.car_name, tbl_car.car_namePlate, tbl_car.temp_car, car_driver.driver_name FROM car_booking INNER JOIN car_driver ON car_booking.car_id=car_driver.car_id INNER JOIN tbl_car ON car_booking.car_id=tbl_car.car_id WHERE booking_id='$booking_id'"); 

$row=$sql->fetch_assoc();
             
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/cpb.ico" type="image/x-icon" />

    
    <?php require('common/title.php'); ?> 
    <?php require('common/allcss.php'); ?> 


    <script type="text/javascript">

        function Validate(objForm) {

      //   	var value1 = document.getElementById('Input1').value;
		    // var value2 = document.getElementById('Input2').value;
		    // var end = value1 + " " + value2;
      //   	var start =<?php// echo $row['start_date']; ?>;

        	// var end =3 ;
        	// var start =5;
            if( 5 > 3)
            {

            	alert("Hello! Error box!!");
   
      //       swal({
      //             title: "Invalid Input",
      //             text: "You Can't Input Same Time !!",
      //             type: "warning",
      //             buttons: true,
      //             dangerMode: true,
      //           });
    		return false;
            }

            return true;
        }

</script>

</head>

<body>

	<div class="container border border-danger " style="margin-top: 20%; ">

		<p class="text-center h3"> Modify Booking End Time</p>

		<table class="table table-striped">
			<tr>
				<th>car</th>
				<td><?php echo $row['car_name']." - ".$row['car_namePlate'] ; ?></td>
				<th>Driver</th>
				<td><?php echo $row['driver_name']; ?></td>
			</tr>
			<tr>
				<th>Booking Start </th>
				<td> <?php echo date("M j, Y, g:i a", strtotime($row['start_date'])); ?></td>
				<th>Booking End </th>
				<td> <?php echo date("M j, Y, g:i a", strtotime($row['end_date'])); ?></td>
			</tr>
			
		</table>


		<?php 
                      if ($_SESSION['error']=="") 
                      {
          						  echo htmlentities($_SESSION['error']="");

          						}
                      if($_SESSION['error']=="dateError")
                        {?>
          						<div class="alert">
          						  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          						  <strong>Sorry!</strong> Select Correct Date And time!!!.
          						</div>
          						<?php
          						echo htmlentities($_SESSION['error']="");
          						 }?>

		<form method="post" action="booking-modify-action.php?booking_id=<?php echo($booking_id); ?>" >
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    <label >Booking End Date</label>
					    <input type="date" id="Input1" name="end_date" class="form-control" required="required">
					     
					  </div>
					
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					    <label >Booking End Time</label>

					    	<select class="custom-select" id="Input2" name="end_time"  required="required">
						   <option value="" disabled selected >Select Time </option>

					    <?php if ($row['temp_car'] ==0) {?>
					   
					    
                                <option value="09:00:00">9.00 AM </option>
                                <option value="09:30:00">9.30 AM </option>
                                <option value="10:00:00">10.00 AM </option>
                                <option value="10:30:00">10.30 AM </option>
                                <option value="11:00:00">11.00 AM </option>
                                <option value="11:30:00">11.30 AM </option>
                                <option value="12:00:00">12.00 PM (Noon)</option>
                                <option value="12:30:00">12.30 PM</option>
                                <option value="13:00:00">01.00 PM </option>
                                <option value="13:30:00">01.30 PM </option>
                                <option value="14:00:00">02.00 PM </option>
                                <option value="14:30:00">02.30 PM </option>
                                <option value="15:00:00">03.00 PM </option>
                                <option value="15:30:00">03.30 PM </option>
                                <option value="16:00:00">04.00 PM </option>
                                <option value="16:30:00">04.30 PM </option>
                                <option value="17:00:00">05.00 PM </option>
                                <option value="17:30:00">05.30 PM </option>
                                <option value="18:00:00">06.00 PM </option>
                                <option value="18:30:00">06.30 PM </option>
                                <option value="19:00:00">07.00 PM </option>
                                <option value="19:30:00">07.30 PM </option>
                                <option value="20:00:00">08.00 PM </option>
                                <option value="20:30:00">08.30 PM </option>
                                <option value="21:00:00">09.00 PM </option>
                                <option value="21:30:00">09.30 PM </option>
                                <option value="22:00:00">10.00 PM </option>
                                <option value="22:30:00">10.30 PM </option>
                                <option value="23:00:00">11.00 PM </option>
                                <option value="23:30:00">11.30 PM </option>

                                <option value="23:59:00">12.00 AM (Night) </option>
                                <option value="01:00:00">01.00 AM </option>
                                <option value="01:30:00">01.30 AM </option>
                                <option value="02:00:00">02.00 AM </option>
                                <option value="02:30:00">02.30 AM </option>
                                <option value="03:00:00">03.00 AM </option>
                                <option value="03:30:00">03.30 AM </option>
                                <option value="04:00:00">04.00 AM </option>
                                <option value="04:30:00">04.30 AM </option>
                                <option value="05:00:00">05.00 AM </option>
                                <option value="05:30:00">05.30 AM </option>
                                <option value="06:00:00">06.00 AM </option>
                                <option value="06:30:00">06.30 AM </option>
                                <option value="07:00:00">07.00 AM </option>
                                <option value="07:30:00">07.30 AM </option>
                                <option value="08:00:00">08.00 AM </option>
                                <option value="08:30:00">08.30 AM </option>
						

				<?php } else { ?>

                                         
                                <option value="09:30:00">9.30 AM </option>
                                <option value="10:00:00">10.00 AM </option>
                                <option value="10:30:00">10.30 AM </option>
                                <option value="11:00:00">11.00 AM </option>
                                <option value="11:30:00">11.30 AM </option>
                                <option value="12:00:00">12.00 PM </option>
                                <option value="12:30:00">12.30 PM </option>
                                <option value="13:00:00">1.00 PM </option>
                                <option value="13:30:00">1.30 PM </option>
                                <option value="14:00:00">2.00 PM </option>
                                <option value="14:30:00">2.30 PM </option>
                                <option value="15:00:00">3.00 PM </option>
                                <option value="15:30:00">3.30 PM </option>
                                <option value="16:00:00">4.00 PM </option>
                                <option value="16:30:00">4.30 PM </option>
                                <option value="17:00:00">5.00 PM </option>

                    <?php } ?>
                                                                                  
                                         </select>




					     
					  </div>
					
				</div>
				
			
			
			  
			  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
		</form>
		

	</div>



</body>

</html>

<?php } ?>