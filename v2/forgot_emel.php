<?php
                   
//$emelkepada=$_SESSION[ID];
//$emel01
////////////////////emel

require_once 'mailerClass/PHPMailerAutoload.php';
 
 $mail = new PHPMailer;
 
 //Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
    
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "ekursus_support@ipptar.gov.my";

//Password to use for SMTP authentication
$mail->Password = "molbkzsvedwpgvxy";

//Set who the message is to be sent from
$mail->setFrom('ekursus@ipptar.gov.my', 'Webmaster eKursus IPPTAR');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to

$mail->addAddress("$emelkepada", 'Pengguna');


//Set the subject line
$mail->Subject = "Penukaran Kata Laluan e-Kursus IPPTAR";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = "

Tuan/Puan,
<br/><br/>
Sila klik di <a href=http://ekursus.ipptar.gov.my/v2/forgot_new.php?id=$row[u_idnum]>sini</a> untuk reset kata laluan semula.
<br/><br/>
Sebarang masalah sila maklumkan kembali.
<br/><br/>
Sekian, terima kasih.
<br/><br/><br/>
Urusetia Kursus
<br/>
Institut Penyiaran Dan Penerangan Tun  Abdul Razak (IPPTAR)
<br/>
Kementerian Komunikasi dan Multimedia Malaysia.
 
";

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
	#$_SESSION['alert'] = "Error! Message could not be sent. Mailer Error:$mail->ErrorInfo; Please try again.";
	#$_SESSION['redirek'] = "../index.php";
	#$pageTitle   = 'Subscribe';
	#include("kosong.php");
	#exit;

} else{

	
	#$_SESSION['alert'] = "Your submission is successful. Please check your email ($usr_emel) to verify. Thank you.";
	#$_SESSION['redirek'] = "../index.php";
	#$pageTitle   = 'Subscribe';
	#include("kosong.php");
	#exit;


}



?>



