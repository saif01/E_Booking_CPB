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
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="syful.cse.bd@gmail.com">
        <meta name="author" content="Saif">

        <link rel="shortcut icon" href="images/cpb.png">

        <?php include('common/title.php'); ?>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect --> 
        <link href="css/waves-effect.css" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>

         <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <?php include('common/navbar.php'); ?>
            <!-- Top Bar End -->


           <!-- Left Sidebar Start --> 

            <?php include('common/sidebar.php'); ?>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Sattled Case Action</h3>
        </div>
        <div class="panel-body">

                            
                                        <div class="table-responsive ">
            <table id="datatable" class="table table-striped table-bordered ">
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
                           
            </div> <!-- Panel-body -->
            
        </div> <!-- Panel -->
    </div> <!-- col-->
    
</div> <!-- End row -->
                            
                        



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sattled Case Update</h3>
            </div>
            <div class="panel-body">


<form class="form-horizontal" 
        action="law-process-action.php?case_number=<?php echo $case_no; ?>
        &filling=<?php echo $row2['filling']; ?>
        &hearing=<?php echo $row2['hearing']; ?>" 
        method="post">

    <div class="col-md-6"> 
            <div class="form-group">
                <label class="col-sm-3 control-label">Last Hearing Date</label>
                <div class="col-sm-9">
                  <input type="date" name="last_hearing" class="form-control" required />
                   <span class="badge badge-pill badge-primary"> <?php echo date("F j, Y", strtotime($row2['last_hearing'])); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Present Balance</label>
                <div class="col-sm-9">
                  <input type="number" name="pr_balance" class="form-control" value="<?php echo $row2['pr_balance']; ?>" required />

                  <span class="badge badge-pill badge-success"><?php echo $row2['pr_balance']; ?> /= Tk</span>
                </div>
            </div>
    </div>
    <div class="col-md-6">

            <div class="form-group">

                <label  class="col-sm-3 control-label">Case Status</label>
                <div class="col-sm-9">
                      <select name="status" class="form-control" required>
                            <option value="In Process">In Process</option>
                            <option value="Sattaled">Sattaled</option>
                            <option value="Closed">Closed</option>
                        </select>
                </div>
            </div> 

            <div class="form-group">
                <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" name="remarks" rows="3" required><?php echo $row2['remarks']; ?></textarea>
                </div>
            </div>
            

        
    </div>
    

    <div class="col-md-12">         
       <div class="form-group m-b-0">    
<button type="submit" name="submit"  class="btn btn-block btn-rounded btn-custom  btn-lg btn-primary waves-effect waves-light">Report Update</button>

<a href="##" onClick="history.go(-1); return false;"> <button class="btn btn-light btn-block btn-rounded " style="background-color:#a08e8e; margin-top: 8px;">Cancel</button></a>
           </div>
    </div>

                                        </form>






            </div> <!-- Panel-body -->
            
        </div> <!-- Panel -->
    </div> <!-- col-->
    
</div> <!-- End row -->

                            
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    <?php include('common/footer.php') ?>
                </footer>

            </div>
          


            

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>
        <script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>

        
        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable({
                        "order": []
                    });
            } );
        </script>


   
    
    </body>
</html>

<?php } ?>