<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */
require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['phone']) ) {
	//Important - UPDATE YOUR RECEIVER EMAIL ID, NAME AND SUBJECT
		
	// Please enter your email ID 	
	$to_email = 'your_name@domain.com';
	// Please enter your name		
	$to_name ="Your Name";
	// Please enter your Subject
	$subject="Your Subject";
	
	$sender_name = $_POST['name'];
	$from_mail = $_POST['email'];		
	$sender_phone = $_POST['phone'];
	$sender_message = $_POST['message'];
	$mail->SetFrom( $from_mail , $sender_name );
	$mail->AddReplyTo( $from_mail , $sender_name );
	$mail->AddAddress( $to_email , $to_name );
	$mail->Subject = $subject;
	
	$received_content = "SENDER NAME : ". $sender_name ."</br> SENDER EMAIL : ".$from_mail."</br> SENDER PHONE : ".$sender_phone . "</br> SENDER MESSAGE: </br/> ".$sender_message;
	
	$mail->MsgHTML( $received_content );
	
	echo $mail->Send();
	exit;	
}