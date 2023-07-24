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
$mail->Subject = "Keputusan Permohonan Mengikuti Kursus ".$_SESSION[k_name]; //Subject od your mail
$mail->AddAddress("$_SESSION[u_kemel]", "$_SESSION[u_knama]"); //To address who will receive this email
$mail->AddCC("$_SESSION[u_emel]", "$_SESSION[u_nama]");
#$mail->AddBCC("encikbakar@yahoo.com", "ADMIN IPPTAR");
$mail->AddBCC("ekursus_support@ipptar.gov.my", "ADMIN IPPTAR");
$mail->MsgHTML("
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
"); //Put your body of the message you can place html code here
$send = $mail->Send(); //Send the mails
if($send){
	
	#$_SESSION['alert'] = "Your submission is successful. Please check your email ($usr_emel) to verify. Thank you.";
	#$_SESSION['redirek'] = "../index.php";
	#$pageTitle   = 'Subscribe';
	#include("kosong.php");
	#exit;
	$_SESSION['xxx'] = "ok";
		
}else{
	
	#$_SESSION['alert'] = "Error! Message could not be sent. Mailer Error:$mail->ErrorInfo; Please try again.";
	#$_SESSION['redirek'] = "../index.php";
	#$pageTitle   = 'Subscribe';
	#include("kosong.php");
	#exit;
	$_SESSION['xxx'] = "xok";
	
}
#emel end
?>