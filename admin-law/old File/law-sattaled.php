<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['admin-law-login'])==0)
  { 
header('location:../admin');
}
else{ 
include('../db/config.php');

$case_no=$_GET['case_no'];

$lawreport=mysqli_query($con,"SELECT * FROM `law_report` WHERE `case_no`='$case_no'");

$row2=$lawreport->fetch_assoc();

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
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <?php include('common/navbar.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <?php include('common/sidebar.php'); ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
						<div class="row">


                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">All Booked Information </h4> -->
                                        <button class="card-title btn btn-outline btn-block ">Sattaled Case Action</button>
                                        <div class="table-responsive ">
           							 <table class="table" >
                                                <thead>
                                                    <tr>
                                                 
                                                        <th>Case No.</th>
                                                        <th>Customer</th>  
                                                        <th>Complaint</th>          
                                                        <th>Filling</th>
                                                        <th>Hearing</th>
                                                        <th>Previous</th>
                                                        <th>Department</th>
                                                        

                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
          <?php 
    $query=mysqli_query($con,"SELECT case_remarks.case_number, case_remarks.filling, case_remarks.hearing, case_remarks.last_hearing, case_remarks.remarks, case_remarks.status, law_report.customer, law_report.complaint, law_report.case_dept, law_report.pre_balance, law_report.pr_balance FROM case_remarks INNER JOIN law_report ON case_remarks.case_number=law_report.case_no WHERE case_remarks.case_number='$case_no' ORDER BY case_remarks.case_id DESC");

    while($row=mysqli_fetch_array($query))
    {

?>
                                                    <tr>

                              
                                 <td><?php echo $row['case_number']; ?></td>
                                 <td><?php echo $row['customer']; ?></td>
                                 <td><?php echo $row['complaint']; ?></td>
          
        <td><?php echo date("M j, Y", strtotime($row['filling'])); ?></td>
         <td><?php echo date("M j, Y", strtotime($row['last_hearing'])); ?></td>
          
                                 <td><?php echo $row['pre_balance']; ?></td>  
                                 <td><?php echo $row['case_dept']; ?></td>
                                 
                                 


                                                        
                                                    </tr>
                                                    <?php } ?>



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                       <!--  <h4 class="card-title">Location</h4> -->

                 	<button class="card-title btn btn-outline btn-block ">Sattaled Case Update</button>

        <form class="form-sample" 
        action="law-process-action.php?case_number=<?php echo $case_no; ?>
        &filling=<?php echo $row2['filling']; ?>
        &hearing=<?php echo $row2['hearing']; ?>" 
        method="post">

   
                 <div class="row">
       
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Hearing Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="last_hearing" class="form-control" required />
                            <span class="badge badge-pill badge-primary">Last Hearing : <?php echo date("F j, Y", strtotime($row2['last_hearing'])); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Present Balance</label>
                        <div class="col-sm-9">
                            <input type="number" name="pr_balance" class="form-control" value="<?php echo $row2['pr_balance']; ?>" required />

                            <span class="badge badge-pill badge-success">Present :  <?php echo $row2['pr_balance']; ?> /= Tk</span>
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="row">
    
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Remarks</label>
                        <div class="col-sm-9">
                        	<textarea type="text" class="form-control" name="remarks" rows="3" required><?php echo $row2['remarks']; ?></textarea>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
            	<div class="form-group row">
            		<label class="col-sm-3 col-form-label">Case Status</label>
            		<div class="col-sm-9">
            			<select name="status" class="form-control" required>
            				<option value="In Process">In Process</option>
                            <option value="Sattaled">Sattaled</option>
            				<option value="Closed">Closed</option>
            			</select>
                	
                    </div>
                 </div>
               </div>

                 

            </div>

            
            <hr>

    <div class="row">
        <div class="col-12 text-center">
            <button type="submit" name="submit" class="btn btn-outline-success btn-block btn-rounded">Report Update</button>
            <button class="btn btn-light btn-block btn-rounded">Reset</button>

            <a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
        </div>
    </div>


   </form>




                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <!-- content-wrapper ends -->





                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <?php include('common/footer.php') ?>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->

         

    </body>

    </html>

    <?php } ?>