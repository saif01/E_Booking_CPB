<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Dhaka');
$currentTime = date('Y-m-d H:i:s', time ());//H, Time in 24 hours show , h, for 12
if(strlen($_SESSION['admin_hard_login'])==0)
  { 
header('location:../admin');
  }
else{ 
	
include('../db/config.php');
//For Send Mail
include('../mail/mail/PHPMailerAutoload.php');
//Send from which mail Adress 
include('../mail/frommail.php');
//CPB Hardware Adress 
include('../mail/address.php');

$hard_id=$_GET['hard_id'];
$admin_id=$_SESSION['admin_id'];

//SQL For Mail Sending
$mailSQL=mysqli_query($con,"SELECT  user.user_name, user.user_mail, user.bu_mail FROM user INNER JOIN cms_hard_complain ON user.user_id=cms_hard_complain.user_id WHERE cms_hard_complain.hard_id='$hard_id'");
	$mailrow=$mailSQL->fetch_assoc();


?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php

if (isset($_POST['submit'])) {


$status= $_POST['status'];
$remarks= $_POST['remarks'];
$delivery= $_POST['delivery'];


$user_name=$mailrow['user_name'];
$to=$mailrow['user_mail'];
$cc=$mailrow['bu_mail'];
$sub="Hardware Complain no: $hard_id";

 //File Have or Not
  $fileName1=$_FILES['document']['tmp_name'];


	$mail = new PHPMailer;
    $mail->isSMTP();                                       
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                                
    $mail->Username =FROM_MAIL;                 
    $mail->Password =PASS;                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                     
    $mail->setFrom($fromMailAddress, $mailNam);
    // Add Multiple Address for To
    $arrayto = explode(",",$to);
    $nbto = count($arrayto);
    for ($t=0;$t<$nbto;$t++) { $mail->addAddress($arrayto[$t]); }
    // Add Multiple Address for CC
    $array = explode(",",$cc);
    $nb = count($array);
    for ($i=0;$i<$nb;$i++) { $mail->addCC($array[$i]); }
    $mail->addAttachment($_FILES['document']['tmp_name'], $_FILES['document']['name']);  
    $mail->isHTML(true);                                 
    $mail->Subject = $sub;

    	$msg=" 
        <html>
        <body>
            <font size='5' color='green'>Dear $user_name, This Is Your Complain update's.</font><br><br><hr>
		  <font size='4' color='blue'>Your Complain Status is : <b>$status</b> </font><br>
		  <font size='3' color='#307221'>Your Complain Remarks is :  <b>$remarks </b>.</font><br>

		 <hr><br><br>

          $ADDRESS
            </body>
        </html>";

    $mail->Body = $msg;
    $mail->send();


//Successfully Back
function backto()
	{
	?>		
	<script>
	setTimeout(function () { 
	        swal({
	          title: "Successfully!",
	          text: "Remarks Uddated Completed!",
	          type: "success",
	          confirmButtonText: "OK"
	        },
	        function(isConfirm){
	          if (isConfirm) {
	          	//history.back();
	            //window.location.href = "not-process";
	            window.opener.location.reload();
	          	window.close();


	          }
	        }); },0);

	</script>

<?php
 }

//Error Back
 function backtoError()
	{
	?>		
	<script>
	setTimeout(function () { 
	        swal({
	          title: "Error Generated!",
	          text: "Remarks Not Uddated Completed!",
	          type: "error",
	          confirmButtonText: "OK"
	        },
	        function(isConfirm){
	          if (isConfirm) {
	          	//history.back();
	            //window.location.href = "not-process";
	            window.opener.location.reload();
	          	window.close();


	          }
	        }); },0);

	</script>

<?php
 }



//IF Complain Closed and File Not have 
	if ( $status=='Closed' && $fileName1 =='' ) {
		// Store Data in CMS Hardware Remarks Table
	$query=mysqli_query($con,"INSERT INTO `cms_hard_remarks`(`hard_id`, `status`, `remarks`, `action_by`) VALUES ('$hard_id','$status','$remarks','$admin_id')");
	// Store Data in CMS Hardware Complain Table
	$query1=mysqli_query($con,"UPDATE `cms_hard_complain` SET `status`='$status', `delivery`='$delivery', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");

		//For Reload and Close Function
		if ( $query && $query1 && $mail ) {
			backto();
		}else{
			backtoError();
		}

					
	}


	//IF Complain Closed and 
	elseif ($status=='Closed' && $fileName1 !=='') {

		$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['document']['name']);
		    $storeFile="../pimages/hardaction/".$file_name;
		    $fileenq=$_FILES['document']['tmp_name'];
		    $store= move_uploaded_file($fileenq,$storeFile);

	// Store Data in CMS Hardware Remarks Table
	$query=mysqli_query($con,"INSERT INTO `cms_hard_remarks`(`hard_id`, `status`, `remarks`, `document`, `action_by`) VALUES ('$hard_id','$status','$remarks','$file_name','$admin_id')");
	// Store Data in CMS Hardware Complain Table
	$query1=mysqli_query($con,"UPDATE `cms_hard_complain` SET `status`='$status', `delivery`='$delivery', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");

		//For Reload and Close Function
		if ($query && $query1 && $store && $mail) {
			backto();
		}else{
			backtoError();
		}

					
	}


//Processing + Document
elseif ($status=='Processing' && $fileName1 !==''){

		$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['document']['name']);
		    $storeFile="../pimages/hardaction/".$file_name;
		    $fileenq=$_FILES['document']['tmp_name'];
		   $store= move_uploaded_file($fileenq,$storeFile);

	// Store Data in CMS Hardware Remarks Table
	$query=mysqli_query($con,"INSERT INTO `cms_hard_remarks`(`hard_id`, `status`, `remarks`, `document`, `action_by`) VALUES ('$hard_id','$status','$remarks','$file_name','$admin_id')");
	// Store Data in CMS Hardware Complain Table
	$query1=mysqli_query($con,"UPDATE `cms_hard_complain` SET `status`='$status', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");

			//For Reload and Close Function
		if ( $query && $query1 && $store && $mail) {
			backto();
		}else{
			backtoError();
		}					

	}


//Processing + No Document
elseif ($status=='Processing' && $fileName1 ==''){

	// Store Data in CMS Hardware Remarks Table
	$query=mysqli_query($con,"INSERT INTO `cms_hard_remarks`(`hard_id`, `status`, `remarks`, `action_by`) VALUES ('$hard_id','$status','$remarks','$admin_id')");
	// Store Data in CMS Hardware Complain Table
	$query1=mysqli_query($con,"UPDATE `cms_hard_complain` SET `status`='$status', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");

			//For Reload and Close Function
		if ( $query && $query1 && $mail ) {
			backto();
		}else{
			backtoError();
		}					

	}


	//Damaged + Document
	elseif ( $status=='Damaged' && $fileName1 !=='' ){

	$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['document']['name']);
	    $storeFile="../pimages/hardaction/".$file_name;
	    $fileenq=$_FILES['document']['tmp_name'];
	    $store= move_uploaded_file($fileenq,$storeFile);

	// Store Data in CMS Hardware Remarks Table
	$query=mysqli_query($con,"INSERT INTO `cms_hard_remarks`(`hard_id`, `status`, `remarks`, `document`, `action_by`) VALUES ('$hard_id','$status','$remarks','$file_name','$admin_id')");
	// Store Data in CMS Hardware Complain Table
	$query1=mysqli_query($con,"UPDATE `cms_hard_complain` SET `status`='$status', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");

			//For Reload and Close Function
		if ( $query && $query1 && $store && $mail ) {
			backto();
		}else{
			backtoError();
		}					

	}

	//Damaged + Document
	elseif ( $status=='Damaged' && $fileName1 =='' ){

	// Store Data in CMS Hardware Remarks Table
	$query=mysqli_query($con,"INSERT INTO `cms_hard_remarks`(`hard_id`, `status`, `remarks`, `action_by`) VALUES ('$hard_id','$status','$remarks','$admin_id')");
	// Store Data in CMS Hardware Complain Table
	$query1=mysqli_query($con,"UPDATE `cms_hard_complain` SET `status`='$status', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");

			//For Reload and Close Function
		if ( $query && $query1 && $mail ) {
			backto();
		}else{
			backtoError();
		}					

	}
// IF Any condition Not Satisfied
else{
	
	backtoError();
		
	}
	

			 
	}// Submit IF Condition END

 }?>