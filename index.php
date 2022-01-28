<?php

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';

	//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Create instance of PHPMailer
	$mail = new PHPMailer();

	//Gmail SMTP configuration:
	$mail->isSMTP(); //Set mailer to use smtp
	$mail->Host = "smtp.gmail.com"; //Define smtp host
	$mail->SMTPAuth = true; //Enable smtp authentication
	$mail->Username = "tanjatest111@gmail.com"; //Set gmail username
	$mail->Password = "Tanjatest111."; //Set gmail password
	$mail->SMTPSecure = "tls"; 	//Set smtp encryption type (ssl/tls)
	$mail->Port = "587"; 	//Port to connect smtp

//Specify PHPMailer headers: 
	$mail->setFrom('tanjatest111@gmail.com'); 	//Set sender email
	$mail->Subject = "Test email using PHPMailer"; 	//Email subject
	$mail->addAddress("tanjatest111@gmail.com"); //Add recipient

	//Enable HTML
	$mail->isHTML(true);

	//Email body
	$mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";

	//Attachment
	$mail->addAttachment('img/attachment.jpg');

	//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: "[$mail->ErrorInfo];
	}

	//Closing smtp connection
	$mail->smtpClose();
