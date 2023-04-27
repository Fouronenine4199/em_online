<?php
require "./PHPMailer-5.2-stable/PHPMailerAutoload.php";


// The Receivers Email
$em = "victornd321@gmail.com";


// The senders email
$email_from = "fouronenine4199@gmail.com";



$to   = array($em);
function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.gmail.com';     // change host name
        $mail->Port = 465;     // you may have to change the port
        $mail->Username = $from;    // The senders email
        $mail->Password = 'zgrqhyaaygsxijvk';     // email password
   
  //   $path = 'reseller.pdf';
  //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From=$from;       //sender email
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="error";
            echo $error; 
        }
        else 
        {
            $error = "success";  
            echo $error;
        }
    }
        
foreach($to as $em_to){
    $from = $email_from;
    $name = 'fourone nine';
    $subj = 'test';
    $msg = "This is a test email";
    $filename = './msg.html';
    $file_contents = file_get_contents($filename);
    // $file_contents = str_replace('blank', $email_msg, $file_contents);
    // $msg = $filename;
    $error=smtpmailer($em_to,$from, $name ,$subj, $msg);
}

    
?>