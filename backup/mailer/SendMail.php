<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require 'vendor/autoload.php';
	function sendMail($email, $body){

			$mail = new PHPMailer(true);
			// if ($_POST)
			try {
			    //Server settings
			    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'Smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = 'pass.hastudents@gmail.com';                     // SMTP username
			    $mail->Password   = '@@hatest';                               // SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			    $mail->Port       = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom($email, 'HA STUDENT');
			    $mail->addAddress($email, 'Joe User');     // Add a recipient
			    $mail->Subject = 'Xac minh gmail';
			    $mail->Body    =  $body;
			    $mail->AltBody = 'gmail xác minh này chưa hỗ trợ plain text!';
			    $mail->send();
			} catch (Exception $e) {
			    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		
	}
?>