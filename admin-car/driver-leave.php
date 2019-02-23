<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-car-login'])==0)
  { 
header('location:../admin');
}
else{ 

include('../db/config.php');

$driver_id=$_GET['driver_id'];
$car_id=$_GET['car_id'];

$query=mysqli_query($con,"SELECT * FROM `car_driver` WHERE `driver_id`='$driver_id' ");

$row=$query->fetch_assoc();


?>
  <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php include('common/title.php'); ?>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
       
        <link rel="stylesheet" href="css/style.css">
        <!-- endinject -->
        <?php include('common/icon.php'); ?>
        <style type="text/css">
            .user-s {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                overflow: hidden;
                position: absolute;
                top: calc(20px/2);
                left: calc(60% - 50px);
                margin-top: -70px;

            }
        </style>


    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
                <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auto-form-wrapper">

                                <img class="user-s" src="../pimages/driver/<?php echo($row['driver_img']);?>" class="img-responsive" alt="Image" />
                                <table>


                                    <tr>
                                        <td> Driver Name:</td>
                                        <th> <strong><?php echo $row['driver_name'];?></strong> </th>
                                    </tr>


                                    <tr>
                                        <td>Last Leave Status:</td>
                                        <th>
                                            <?php
          if ($row['leave_start']=='') {
            echo "No Data Avaiable";
          }
          else{
            echo date("M j, Y", strtotime($row['leave_start'])); ?> - To -
                                                <?php echo date("M j, Y", strtotime($row['leave_end'])); }?>


                                        </th>

                                        <th>
                                            <?php 

                                        if ($row['leave_start']=='') {
                                            
                                        }
                                        else{
                                        ?>

<form action="driver-leave-action.php?driver_id=<?php echo $driver_id;?>&car_id=<?php echo $car_id;?>" method="post">
                                <button type="submit" name="leave_cancel" class="btn btn-outline-danger">Cancel</button>
            </form>
                                            <?php } ?>
                                        </th>


                                    </tr>


                                </table>

                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <h4 class="card-title">Car Add Form</h4> -->
                                            <!-- <button class="card-title btn btn-outline btn-block ">Driver Leave Form</button> -->

    <form action="driver-leave-action.php?driver_id=<?php echo $driver_id;?>&car_id=<?php echo $car_id;?>" method="post">

<div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Leave Start :</label>
                        <div class="col-sm-6">
                            <input type="date" name="leave_satart" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Leave End :</label>
                        <div class="col-sm-6">
                            <input type="date" name="leave_end" class="form-control" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Leave Type :</label>
                        <div class="col-sm-6">
<select  name="leaveType" class="form-control" required>
<option value="" disabled selected >Select Type </option>
        <option value="personal">Personal Leave</option>
        <option value="police">Police Requsition</option>
        <option value="maintenance">Car Maintenance</option>


                    </select>
                        </div>
                    </div>
                </div>
          

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"> Leave Time :</label>
                        <div class="col-sm-6">
<select id="time_show" class="form-control" onChange="return show();" >
<option value="">Full Day</option>
<option value="manual_input">Manual Input</option>

                    </select>
                        </div>
                    </div>
                </div>


            <div id="manual_input_show" style="display:none;"> 
                <div class="col-md-6">
            <div class="form-group row">
<label class="col-sm-4 col-form-label">Start Time:</label>
        <div class="col-sm-6">
<select  name="start_time" class="form-control"> 
    <option value="01:01:01">Default Time </option>
        <option value="09:00:00">9.00 AM </option>
        <option value="10:00:00">10.00 AM </option>
        <option value="11:00:00">11.00 AM </option>
        <option value="12:00:00">12.00 PM (Noon)</option>
        <option value="13:00:00">01.00 PM </option>
        <option value="14:00:00">02.00 PM </option>
        <option value="15:00:00">03.00 PM </option>
        <option value="16:00:00">04.00 PM </option>
        <option value="17:00:00">05.00 PM </option>
        <option value="18:00:00">06.00 PM </option>
        <option value="19:00:00">07.00 PM </option>
        <option value="20:00:00">08.00 PM </option>
        <option value="21:00:00">09.00 PM </option>
        <option value="22:30:00">10.00 PM </option>
        <option value="23:00:00">11.00 PM </option>

        <option value="23:59:00">12.00 AM (Night) </option>
        <option value="01:00:00">01.00 AM </option>
        <option value="02:00:00">02.00 AM </option>
        <option value="03:00:00">03.00 AM </option>
        <option value="04:00:00">04.00 AM </option>
        <option value="05:00:00">05.00 AM </option>
        <option value="06:00:00">06.00 AM </option>
        <option value="07:00:00">07.00 AM </option>
        <option value="08:00:00">08.00 AM </option>
                                              
     </select>
                        
                </div>
            </div>
         </div>
                <div class="col-md-6">
                    <div class="form-group row">
<label class="col-sm-4 col-form-label">End Time:</label>
<div class="col-sm-6">
    <select  name="return_time" class="form-control"> 
    <option value="23:59:01">Default Time </option>
        <option value="09:00:00">9.00 AM </option>
        <option value="10:00:00">10.00 AM </option>
        <option value="11:00:00">11.00 AM </option>
        <option value="12:00:00">12.00 PM (Noon)</option>
        <option value="13:00:00">01.00 PM </option>
        <option value="14:00:00">02.00 PM </option>
        <option value="15:00:00">03.00 PM </option>
        <option value="16:00:00">04.00 PM </option>
        <option value="17:00:00">05.00 PM </option>
        <option value="18:00:00">06.00 PM </option>
        <option value="19:00:00">07.00 PM </option>
        <option value="20:00:00">08.00 PM </option>
        <option value="21:00:00">09.00 PM </option>
        <option value="22:30:00">10.00 PM </option>
        <option value="23:00:00">11.00 PM </option>

        <option value="23:59:00">12.00 AM (Night) </option>
        <option value="01:00:00">01.00 AM </option>
        <option value="02:00:00">02.00 AM </option>
        <option value="03:00:00">03.00 AM </option>
        <option value="04:00:00">04.00 AM </option>
        <option value="05:00:00">05.00 AM </option>
        <option value="06:00:00">06.00 AM </option>
        <option value="07:00:00">07.00 AM </option>
        <option value="08:00:00">08.00 AM </option>
                                              
     </select>
                        </div>
                    </div>
                </div>
            </div>
</div>


            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Update Status</button>
                    
                </div>
            </div>


        </form>

    </div>
</div>
</div>


                            </div>

                            <?php include('common/footer.php') ?>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->

                <script>
                    function show() {
                        var selectBox = document.getElementById('time_show');
                        var userInput = selectBox.options[selectBox.selectedIndex].value;
                        if (userInput == 'manual_input') 
                        {
                          document.getElementById('manual_input_show').style.display = 'block';
                            
                        }  
                        else {
                            document.getElementById('manual_input_show').style.display = 'none';
                        }

                        return false;

                    }

                </script>



    </body>

    </html>

    <?php } ?>