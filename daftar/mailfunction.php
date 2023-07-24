<?
// MAKLUMAT USER
  $name=$row_serid['u_name'];
// MAKLUMAT KOD KURSUS
  $ic=$row_serid['u_idnum'];
// MAKLUMAT ID KURSUS
  $password=$row_serid['u_pwd'];
// MAKLUMAT EMAIL PEMOHON
  $emelpenggunanoti=$row_serid['u_email']; 
// MAKLUMAT NOTA ARAHAN
  $nota = "Tahniah! Akaun e-Kursus IPPTAR anda telah dicipta. Berikut adalah butiran login ke akaun anda:"; 
  $nota2 = "Sila log masuk pada sistem aplikasi e-Kursus untuk memohon kursus dan mengemaskini akaun anda di : http://ekursus.ipptar.gov.my/"; 
 // MAKLUMAT ADMIN PENGIRIM
  $nama = "Pentadbir e-Kursus";
  $emeladmin = "webmaster@ipptar.gov.my";

mail( "$emelpenggunanoti", "Akaun e-Kursus IPPTAR Anda! ",

" $nota\n\n Nama: $name\n\n No Kad Pengenalan: $ic\n\n Kata Laluan: $password\n\n 
  Nota: $nota2\n\n Sekian, Terima kasih.",

"From: $nama<$emeladmin>");
?>