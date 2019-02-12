<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'Y-m-d H:i:s', time () );// h=12 hours H=24 hours
if(strlen($_SESSION['cms_login_id'])==0)
  { 
header('location:../index');
}
else{ 
 require('../db/config.php');
 //For Send Mail
 require('../mail/sendmail.php');
 require('../mail/address.php');
?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php

if (isset($_POST['submit'])) {

$user_id=$_SESSION['user_id'];
$cat_id=$_POST['cat_id'];
$sub_id=$_POST['sub_id'];
$details=$_POST['details'];
$status='Not Process';

$toolsall=$_POST['tools'];
$tools= implode(",",$toolsall); 


$fileName1=$_FILES['document']['tmp_name'];
 if ($fileName1 !=="") 
     {

		$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['document']['name']);
		    $storeFile="../pimages/hard/".$file_name;
		    $fileenq=$_FILES['document']['tmp_name'];
		    move_uploaded_file($fileenq,$storeFile);


		$query=mysqli_query($con,"INSERT INTO `cms_hard_complain`(`user_id`, `cat_id`, `sub_id`, `tools`, `details`, `documents`, `status`) VALUES('$user_id','$cat_id','$sub_id','$tools','$details','$file_name','$status')");





		//Count Complain Number
		$sql=mysqli_query($con,"SELECT `hard_id` FROM `cms_hard_complain` ORDER BY `hard_id` DESC LIMIT 1");
		while($row=mysqli_fetch_array($sql))
		    {
		     $cmpn=$row['hard_id'];
		    }

				if ($query) 
				{
					?>		
					<script>
					setTimeout(function () { 
					        swal({
					          title: "Your Complain Number <?php echo($cmpn); ?> ",
					          text: "Complain Added Successfully !!!",
					          type: "success",
					          confirmButtonText: "OK"
					        },
					        function(isConfirm){
					          if (isConfirm) {
					          	//history.back();
					            window.location.href = "complain-submit.php";
					          }
					        }); },0);

					</script>

				    <?php
				}

				else
				{
					

					?>		
					<script>
					setTimeout(function () { 
					        swal({
					          title: "Error Genareted!",
					          text: "Report Not Added Properly!",
					          type: "error",
					          confirmButtonText: "OK"
					        },
					        function(isConfirm){
					          if (isConfirm) {
					          	window.location.href = "complain-submit.php";
					            
					          }
					        }); },0);

					</script>

				    <?php
				}
			}

			else
			{
		$query=mysqli_query($con,"INSERT INTO `cms_hard_complain`(`user_id`, `cat_id`, `sub_id`, `tools`, `details`, `status`) VALUES('$user_id','$cat_id','$sub_id','$tools','$details','$status')");

		//Count Complain Number
		$sql=mysqli_query($con,"SELECT `hard_id` FROM `cms_hard_complain` ORDER BY `hard_id` DESC LIMIT 1");
		while($row=mysqli_fetch_array($sql))
		    {
		     $cmpn=$row['hard_id'];
		    }

				if ($query) 
				{
					?>		
					<script>
					setTimeout(function () { 
					        swal({
					          title: "Your Complain Number <?php echo($cmpn); ?> ",
					          text: "Complain Added Successfully !!!",
					          type: "success",
					          confirmButtonText: "OK"
					        },
					        function(isConfirm){
					          if (isConfirm) {
					          	//history.back();
					            window.location.href = "complain-submit.php";
					          }
					        }); },0);

					</script>

				    <?php
				}

				else
				{
					

					?>		
					<script>
					setTimeout(function () { 
					        swal({
					          title: "Error Genareted!",
					          text: "Report Not Added Properly!",
					          type: "error",
					          confirmButtonText: "OK"
					        },
					        function(isConfirm){
					          if (isConfirm) {
					          	window.location.href = "complain-submit.php";
					            
					          }
					        }); },0);

					</script>

				    <?php
				}
			}

//Start Mail Send code

	$mailSQL=mysqli_query($con,"SELECT cms_hard_complain.hard_id, cms_hard_complain.details, cms_hard_category.category, cms_hard_subcategory.subcategory, user.user_name, user.user_dept, user.bu_mail, bu_location.location_name FROM cms_hard_complain INNER JOIN cms_hard_subcategory ON cms_hard_complain.sub_id=cms_hard_subcategory.sub_id INNER JOIN cms_hard_category ON cms_hard_complain.cat_id=cms_hard_category.cat_id INNER JOIN user ON cms_hard_complain.user_id=user.user_id INNER JOIN bu_location ON bu_location.bul_id=user.user_location WHERE cms_hard_complain.hard_id='$cmpn'");

	$mailrow=$mailSQL->fetch_assoc();
	$category=$mailrow['category'];
	$subcategory=$mailrow['subcategory'];
	$user_name=$mailrow['user_name'];
	$user_dept=$mailrow['user_dept'];
	$details=$mailrow['details'];
	$user_location=$mailrow['location_name'];

	$cc=$mailrow['bu_mail'];

	 $to="syful.cse.bd@gmail.com";

    $sub="Hardware Complain no: $cmpn";
    $msg=" 
    <html>
    <body>
        <font size='5' color='green'>This is a Hardware Problems.</font><br><br><hr>

        <font size='4' color='blue'>Take action, Please. </font><br>
        <font size='4' color='#307221'>Problem in : **<b> $category  ** of ** $subcategory **. </b></font><br>
        <font size='3' color='#307221'>Complaint Name : **<b> $user_name   ** of ** $user_dept  ** </b></font><br>
         <font size='3' color='#307221'>User Location : **<b> $user_location. </b></font>
        
         <hr>
        <font size='3' color='#778899'>Complain Details : <b> $details </b></font>

         <br><br><br>
         $ADDRESS
        </body>
    </html> "; 

        //send_mail($sub,$msg,$to);

        send_mail_withCC($sub,$msg,$to,$cc);
// End Mail Code





	} 


 }?>