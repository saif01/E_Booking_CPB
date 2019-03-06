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

$hard_id=$_GET['hard_id'];
$admin_id=$_SESSION['admin_id'];

$name= $_POST['name'];
$contact= $_POST['contact']; 

$remarks= $_POST['remarks'];
$delivery= 'Delivered';
$status='Delivered';



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
        <font size='5' color='green'>Dear $user_name, This Is Your Product Delivery update's.</font><br><br><hr>
		  <font size='4' color='blue'>Your Product Receiver Name : <b>$name</b> </font><br>
		  <font size='3' color='#307221'>Your Product Receiver Contact :  <b>$contact </b>.</font><br>
		  <font size='3' color='#FF4500'>Your Product Delivery Remarks :  <b>$remarks </b>.</font><br><br>
	 <hr><br><br>
      $ADDRESS
        </body>
    </html> ";

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




	 if ( $fileName1 !=="" ) 
	     {

		$file_name=uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['document']['name']);
		    $storeFile="../pimages/hardaction/".$file_name;
		    $fileenq=$_FILES['document']['tmp_name'];
		    $store= move_uploaded_file($fileenq,$storeFile);

			// Store Data in CMS Hardware Remarks Table
		$query=mysqli_query($con,"INSERT INTO `cms_hard_remarks`(`hard_id`, `status`, `remarks`, `document`, `action_by`) VALUES ('$hard_id','$status','$remarks','$file_name','$admin_id')");
			
			// Store Data in CMS Delivery Table
		$query1=mysqli_query($con,"INSERT INTO `cms_delivery`(`hard_id`, `name`, `contact`, `remarks`, `action_by`) VALUES('$hard_id','$name','$contact','$remarks','$admin_id')");

		
			// Store Data in CMS Hardware Complain Table
		$query2=mysqli_query($con,"UPDATE `cms_hard_complain` SET `delivery`='$delivery', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");

			//For Reload and Close Function
				if ( $query && $query1 && $query2 && $mail && $store ) {
					backto();
				}else{
					backtoError();
				}
		
		}



// If File Note Selected Then Run
		elseif ( $fileName1 =="" ){

		// Store Data in CMS Hardware Remarks Table
		$query=mysqli_query($con,"INSERT INTO `cms_hard_remarks`(`hard_id`, `status`, `remarks`, `action_by`) VALUES ('$hard_id','$status','$remarks','$admin_id')");

			// Store Data in CMS Delivery Table
		$query1=mysqli_query($con,"INSERT INTO `cms_delivery`(`hard_id`, `name`, `contact`, `remarks`, `action_by`) VALUES ('$hard_id','$name','$contact','$remarks','$admin_id')");

		// Store Data in CMS Hardware Complain Table
		$query2=mysqli_query($con,"UPDATE `cms_hard_complain` SET `delivery`='$delivery', `last_up`='$currentTime' WHERE `hard_id`='$hard_id'");


			//For Reload and Close Function
				if ( $query && $query1 && $query2 && $mail ) {
					backto();
				}else{
					backtoError();
				}
					

		}

		else{
			backtoError();
		}


			 
	}// Submit IF Condition END

 }?>