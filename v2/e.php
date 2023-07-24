<?php



                    


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
//$mail->Username = "japen.btm@gmail.com";
//$mail->Username = "makluman@inform.gov.my";
$mail->Username = "ekursus_support@ipptar.gov.my";

//Password to use for SMTP authentication
//$mail->Password = "btm@japen2016";
//$mail->Password = "syfqyddgbqwzwffh";
$mail->Password = "molbkzsvedwpgvxy";

//Set who the message is to be sent from
$mail->setFrom('no-reply@email.com', 'Pentadbir Emel BTD');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to

//$mail->addAddress('knizam@inform.gov.my', 'Nizam');
$mail->addAddress("$_SESSION[u_emel]", "$_SESSION[u_nama]");

//Set the subject line
$mail->Subject = "Testing Emel";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = "

<h2>Testing</h2><br>

Assalamualaikum dan Salam Sejahtera,<br>
Kami telah menerima permohonan anda
<br>
<br><br>Sekian, terima kasih.

<br><br>BERKHIDMAT UNTUK NEGARA

<br>Saya yang menurut perintah,

<br><br>       t.t.

<br>( Pentadbir Emel )
<br>Bahagian Teknologi Digital,
<br>Jabatan Penerangan Malaysia. 
<br>Samb. Telefon : 3555 / 3479

";

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 



?>


