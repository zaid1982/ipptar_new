<?
// MAKLUMAT TAJUK KURSUS
  $tajukkursusnoti = $rows_seacourse['co_name'];
// MAKLUMAT KOD KURSUS
  $kodkursusnoti = $rows_seaname['costu_coursecode'];
// MAKLUMAT ID KURSUS
  $idkursusnoti = $rows_seaname['costu_id'];
// MAKLUMAT TARIKH MULA KURSUS
  $tarikhmulanoti = $rows_seacourse['co_sdate'];
// MAKLUMAT TARIKH TAMAT KURSUS
  $tarikhtamatnoti = $rows_seacourse['co_edate'];
// MAKLUMAT EMAIL PEMOHON
 $emelpenggunanoti = $rows_seausername['u_email']; 
 //   $emelpenggunanoti = "weraw.hayek@gmail.com"; 
// MAKLUMAT NOTA ARAHAN
  $nota = "Tahniah! Permohonan kursus anda telah diterima. Berikut adalah butiran kursus yang ditawarkan:"; 
  $nota2 = "Sila log masuk pada sistem aplikasi ekursus untuk maklumat lanjut dan memuat turun surat tawaran di : http://www.ipptar.gov.my/ekursusonline/ "; 
 // MAKLUMAT ADMIN PENGIRIM
  $nama = "Pentadbir e-Kursus";
  $emeladmin = "webipptar@kpkk.gov.my";

mail( "$emelpenggunanoti", "Surat Tawaran Menghadiri Kursus di Institut Penyiaran dan Penerangan Tun Abdul Razak ",

" $nota\n\n Tajuk Kursus: $tajukkursusnoti\n\n Kod Kursus: $kodkursusnoti\n\n ID Kursus: $idkursusnoti\n\n Tarikh Mula: $tarikhmulanoti\n\n Tarikh Tamat: $tarikhtamatnoti\n\n Nota: $nota2\n\n Sekian, Terima kasih.",

"From: $nama<$emeladmin>");
?>