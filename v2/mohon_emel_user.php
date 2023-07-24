<?php
#emel start 
////////////////////

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
$mail->setFrom('ekursus_support@ipptar.gov.my', 'Webmaster eKursus IPPTAR');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to

$mail->addAddress("$_SESSION[u_emel]", "$_SESSION[u_nama]");


//Set the subject line
$mail->Subject = "Permohonan Mengikuti ".$_SESSION[k_name];

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Body = "
<table width=100% border=0>
  <tr>
    <td>No. Kad Pengenalan</td>
    <td>:</td>
    <td>$_SESSION[u_idnum]</td>
    <td>Tarikh</td>
    <td>:</td>
    <td>$tkhmohon</td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td>$_SESSION[u_nama]</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>:</td>
    <td>$_SESSION[u_jab]</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=6>Tuan/Puan,</td>
  </tr>
  <tr>
    <td colspan=6>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=6><b>PERMOHONAN KURSUS/BENGKEL $_SESSION[k_code] - $_SESSION[k_name]</b></td>
  </tr>
  <tr>
    <td colspan=6>&nbsp;</td>
  </tr>
  <tr>
    <td><b>TARIKH</b></td>
    <td>:</td>
    <td colspan=4>$_SESSION[k_sdate] sehingga $_SESSION[k_edate]</td>
  </tr>
  <tr>
    <td><b>TEMPAT</b></td>
    <td>:</td>
    <td colspan=4>$_SESSION[k_loc]</td>
  </tr>
  <tr>
    <td colspan=6>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=6>Adalah dimaklumkan bahawa permohonan tuan/puan telah didaftar dan akan diproses. Sekiranya berjaya, surat tawaran akan dikeluarkan.</b>. </td>
  </tr>
  <tr>
    <td colspan=6>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=6>2. Tuan/puan boleh menyemak status permohonan kursus yang dipohon melalui akaun sistem ekursus di http://ekursus.ipptar.gov.my atau akaun email yang telah didaftarkan. </td>
  </tr>
  <tr>
    <td colspan=6>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=6>Sekian, terima kasih. </td>
  </tr>
  <tr>
    <td colspan=6>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=6><b>BERKHIDMAT UNTUK NEGARA</b></td>
  </tr>
  <tr>
    <td colspan=6>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=6>Urusetia Kursus</td>
  </tr>
  <tr>
    <td colspan=6>IPPTAR</td>
  </tr>
  <tr>
    <td colspan=6>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=6><b>Nota:</b></td>
  </tr>
  <tr>
    <td colspan=6>Sebarang pertanyaan mengenai permohonan ini sila hubungi: </td>
  </tr>
  <tr>
    <td colspan=6>No.Tel : 03-22957555 </td>
  </tr>
  <tr>
    <td colspan=6>Emel : webmaster[at]ipptar[dot]gov[dot]my</td>
  </tr>
</table>
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