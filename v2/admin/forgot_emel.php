<?php
#emel start	
include '../mailer/library.php'; // include the library file
include "../mailer/class.phpmailer.php"; // include the class name

$mail = new PHPMailer; // call the class 
$mail->IsSMTP(); 
$mail->Host = SMTP_HOST; //Hostname of the mail server
$mail->Port = SMTP_PORT; //Port of the SMTP like to be 25, 80, 465 or 587
$mail->SMTPAuth = false; //Whether to use SMTP authentication
$mail->Username = SMTP_UNAME; //Username for SMTP authentication any valid email created in your domain
$mail->Password = SMTP_PWORD; //Password for SMTP authentication
$mail->SetFrom("ekursus@ipptar.gov.my", "Webmaster eKursus IPPTAR"); //From address of the mail
// put your while loop here like below,
$mail->Subject = "Subjek"; //Subject od your mail
$mail->AddAddress("$_SESSION[emel]", ""); //To address who will receive this email
$mail->AddBCC("encikbakar@yahoo.com", "ADMIN IPPTAR");
$mail->AddBCC("ekursus_support@ipptar.gov.my", "ADMIN IPPTAR");
$mail->MsgHTML("
Yang Berhormat,
<br/><br/>
Sila klik di <a href=http://ekursus.ipptar.gov.my/v2/admin/forgot_new.php?id=$row[a_idnum]>sini</a> untuk reset kata laluan semula.
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
"); //Put your body of the message you can place html code here
$send = $mail->Send(); //Send the mails
if($send){
	
	#$_SESSION['alert'] = "Your submission is successful. Please check your email ($usr_emel) to verify. Thank you.";
	#$_SESSION['redirek'] = "../index.php";
	#$pageTitle   = 'Subscribe';
	#include("kosong.php");
	#exit;
		
}else{
	
	#$_SESSION['alert'] = "Error! Message could not be sent. Mailer Error:$mail->ErrorInfo; Please try again.";
	#$_SESSION['redirek'] = "../index.php";
	#$pageTitle   = 'Subscribe';
	#include("kosong.php");
	#exit;
	
}
#emel end
?>