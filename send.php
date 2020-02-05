<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Variable GET
$fromname = $_GET['fromname'];
$frommail = $_GET['frommail'];
$to = $_GET['to'];
$html = $_GET['isHTML'];
$subject = $_GET['subject'];
$pesan = $_GET['pesan'];

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'your_smtp_server';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'your_smtp_username';                     // SMTP username
    $mail->Password   = 'your_smtp_password';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($frommail, $fromname);
    $mail->addAddress($to);               // Name is optional
    //$mail->addReplyTo('donot-reply@wisnu.live', 'donot-reply');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    /* $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name */

    // Content
    $mail->isHTML($html);                                  // Set email format to HTML
    $mail->Subject = $subject;
    if ($html == 'true'){
		$mail->Body    = $pesan;
	} else {
		$mail->AltBody = $pesan;
	}
	//$mail->Body    = 'Mail body with <b>HTML</b> tag';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}