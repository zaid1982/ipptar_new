<?php
#emel start	
require_once '../mailerClass/PHPMailerAutoload.php';
/////////////////////////////////////////////////////////
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
$mail->setFrom('ekursus_support@ipptar.gov.my', 'Webmaster eKursus IPPTAR');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to

$mail->AddAddress("$_SESSION[u_kemel]", "$_SESSION[u_knama]"); //To address who will receive this email


//Set the subject line
$mail->Subject = "Keputusan Permohonan Mengikuti Kursus ".$_SESSION[k_name]; //Subject od your mail
$mail->AddCC("$_SESSION[u_emel]", "$_SESSION[u_nama]");
$mail->AddBCC("ekursus_support@ipptar.gov.my", "ADMIN IPPTAR");
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Body = "
Tuan/Puan,
<br/><br/><br/>
Saya dengan segala hormatnya merujuk kepada perkara tersebut di atas.
<br/><br/>
2.   Dukacita dimaklumkan bahawa pegawai dari jabatan tuan/puan, <b>$_SESSION[u_nama]</b> tidak terpilih untuk mengikuti kursus/bengkel  $_SESSION[k_name] dari <b>$_SESSION[k_sdate]</b> hingga <b>$_SESSION[k_edate]</b> bertempat di <b>$_SESSION[k_loc]</b>. 
<br/><br/>
3.   Status permohonan pegawai tuan/puan boleh disemak melalui URL http://ekursus.ipptar.gov.my/v2/status.php.
<br/><br/>
BERKHIDMAT UNTUK NEGARA
<br/><br/>
Saya yang menjalankan amanah,
<br/><br/>
Urusetia Kursus
<br/>
Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR).
<br/><br/>
<i>E-mel maklum ini dijana menerusi sistem. Oleh itu, tanda tangan tidak diperlukan.</i>
"; //Put your body of the message you can place html code here
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  

if (!$mail->send()) {
  #$_SESSION['alert'] = "Error! Message could not be sent. Mailer Error:$mail->ErrorInfo; Please try again.";
  #$_SESSION['redirek'] = "../index.php";
  #$pageTitle   = 'Subscribe';
  #include("kosong.php");
  #exit;
  $_SESSION['xxx'] = "xok";
    
}else{
  

  #$_SESSION['alert'] = "Your submission is successful. Please check your email ($usr_emel) to verify. Thank you.";
  #$_SESSION['redirek'] = "../index.php";
  #$pageTitle   = 'Subscribe';
  #include("kosong.php");
  #exit;
  $_SESSION['xxx'] = "ok";  
}
#emel end
?>
