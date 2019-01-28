<?php

 require 'mail/PHPMailerAutoload.php';
 require 'frommail.php';



 function send_mail($sub,$msg,$to){

 //$file=$_FILES["file"];
        //$sendFile=$_FILES["sendFile"]["name"];
        //move_uploaded_file($_FILES["sendFile"]["tmp_name"],"files/".$_FILES["sendFile"]["name"]);

        //echo $msg;
   
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
           $mail->addAttachment($_FILES['sendFile']['tmp_name'], $_FILES['sendFile']['name']);        
            $mail->isHTML(true);                                 
            $mail->Subject = $sub;
            $mail->Body    = $msg;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();


 }

        

       













?>