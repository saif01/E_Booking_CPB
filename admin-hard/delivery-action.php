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

// For atchment send
require '../mail/mail/PHPMailerAutoload.php';
require '../mail/frommail.php';

?>
<!--*********start Sweet alert For Submiting data **********-->
<script src="../assets/coustom/swwetalert/jslib.js"></script>
<script src="../assets/coustom/swwetalert/dev.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/coustom/swwetalert/sweetalert.css">
<!--*********end Sweet alert For Submiting data **********-->
<?php

if (isset($_POST['submit'])) {

$hard_id=$_GET['hard_id'];
$admin_id=$_SESSION['admin_id'];

$name= $_POST['name'];
$contact= $_POST['contact'];

$remarks= $_POST['remarks'];
$delivery= 'Delivered';

//SQL For Mail Sending
$mailSQL=mysqli_query($con,"SELECT  user.user_name, user.user_mail FROM user INNER JOIN cms_hard_complain ON user.user_id=cms_hard_complain.user_id WHERE cms_hard_complain.hard_id='$hard_id'");
	$mailrow=$mailSQL->fetch_assoc();

	$user_name=$mailrow['user_name'];
	$to=$mailrow['user_mail'];
    $sub="Hardware Complain no: $hard_id";


// Mail Sending Message
		$msg=" 
        <html>
        <body>
            <font size='5' color='green'>Dear $user_name, This Is Your Product Delivery update's.</font><br><br><hr>
		  <font size='4' color='blue'>Your Product Receiver Name : <b>$name</b> </font><br>
		  <font size='3' color='#307221'>Your Product Receiver Contact :  <b>$contact </b>.</font><br>
		  <font size='3' color='#FF4500'>Your Product Delivery Remarks :  <b>$remarks </b>.</font><br>

		 <hr><br><br>

           <address> 
           <b> Support Team: </b><br>
           <font size='' color='#1E90FF'>
            Md. Moniruzzaman <br>
            Contract: 01787692529 <br>
            Md. Polash Mahamud <br>
            Contract: 01787692530 <br>
       
            Holding No: E-236, Ward No: 007 <br>
            Chandra, Kaliyakor, Gazipur <br>
            </font>
            <font size='2' color=''> Thank you.</font><br>
            </address>
            </body>
        </html>";
	
	
// Mail Send With file
		 $mail = new PHPMailer;
            $mail->isSMTP();                                      // Set mailer to use 
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP 
            $mail->Username =FROM_MAIL;                 // SMTP username
            $mail->Password =PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS 
            $mail->Port = 587;                                    // TCP port to connect 
            $mail->setFrom('saifulislamw60@gmail.com', 'Test Mail');
            $mail->addAddress($to);    
           $mail->addAttachment($_FILES['document']['tmp_name'], $_FILES['document']['name']);        
            $mail->isHTML(true);                                 
            $mail->Subject = $sub;
            $mail->Body    = $msg;
            $mail->send();
// End Mail Send Code



	$fileName1=$_FILES['document']['tmp_name'];
	 if ($fileName1 !=="") 
	     {


		$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['document']['name']);
		    $storeFile="../pimages/delivery/".$file_name;
		    $fileenq=$_FILES['document']['tmp_name'];
		    move_uploaded_file($fileenq,$storeFile);

	
			// Store Data in CMS Delivery Table
		$sql=mysqli_query($con,"INSERT INTO `cms_delivery`(`hard_id`, `name`, `contact`, `remarks`, `file`, `action_by`) VALUES('$hard_id','$name','$contact','$remarks','$file_name','$admin_id')");

		
		// Store Data in CMS Hardware Complain Table
		$sql2=mysqli_query($con,"UPDATE `cms_hard_complain` SET `delivery`='$delivery', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");

		


					if($sql && $sql2)
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


						else
						{
							
							?>		
							<script>
							setTimeout(function () { 
							        swal({
							          title: "Error Genareted! fil",
							          text: "Remarks Not Uddated Completed!",
							          type: "error",
							          confirmButtonText: "OK"
							        },
							        function(isConfirm){
							          if (isConfirm) {
							          	history.back();
							            //window.location.href = "advisor-all.php";
							          }
							        }); },0);

							</script>

						    <?php
						}



		}



// If File Note Selected Then Run
		else{

			// Store Data in CMS Delivery Table
		$sql3=mysqli_query($con,"INSERT INTO `cms_delivery`(`hard_id`, `name`, `contact`, `remarks`, `action_by`) VALUES ('$hard_id','$name','$contact','$remarks','$admin_id')");
		// Store Data in CMS Hardware Complain Table
		$sql4=mysqli_query($con,"UPDATE `cms_hard_complain` SET `delivery`='$delivery', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");



					if($sql3 && $sql4)
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


						else
						{
							
							?>		
							<script>
							setTimeout(function () { 
							        swal({
							          title: "Error Genareted!",
							          text: "Remarks Not Uddated Completed!",
							          type: "error",
							          confirmButtonText: "OK"
							        },
							        function(isConfirm){
							          if (isConfirm) {
							          	history.back();
							            //window.location.href = "advisor-all.php";
							          }
							        }); },0);

							</script>

						    <?php
						}

		}





			 
	}// Submit IF Condition END

 }?>