<?php
#emel start 
////////////////////emel

require_once '../mailerClass/PHPMailerAutoload.php';
 
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

$mail->addAddress("$_SESSION[u_kemel]", "$_SESSION[u_knama]");
$mail->addCC("$_SESSION[u_emel]", "$_SESSION[u_nama]");

//Set the subject line
$mail->Subject = "Tawaran Mengikuti Kursus ".$_SESSION[k_name];

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = "
Tuan/Puan,
<br/><br/><br/>
Saya dengan segala hormatnya merujuk kepada perkara tersebut di atas.
<br/><br/>
2.   Sukacita dimaklumkan bahawa pegawai dari jabatan tuan/puan, <b>$_SESSION[u_nama]</b> telah dipilih untuk mengikuti kursus/bengkel  $_SESSION[k_name] dari <b>$_SESSION[k_sdate]</b> hingga <b>$_SESSION[k_edate]</b> bertempat di <b>$_SESSION[k_loc]</b>. Sehubungan dengan itu, tuan/puan boleh mencetak surat tawaran dan mengesahkan kehadiran menerusi pautan berikut:-
<br/><br/>
[ <a href=http://ekursus.ipptar.gov.my/v2/surat_tawaran.php?pid=$_SESSION[pid]>CETAK SURAT TAWARAN</a> ]
<br/><br/>
3.   Ketua jabatan dimohon agar memberi pelepasan dari tugas pejabat kepada pegawai di sepanjang tempoh kursus berlangsung.
<br/><br/>
'BERKHIDMAT UNTUK NEGARA'
<br/><br/>
Saya yang menjalankan amanah,
<br/><br/>
Urus setia kursus
<br/>
Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR).
<br/><br/>
<i>Emel makluman ini dijana menerusi sistem dan tanda tangan tidak diperlukan.</i>
";  //Put your body of the message you can place html code here
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