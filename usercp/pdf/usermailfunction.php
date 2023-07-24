<?
$namapegawai=strtoupper($_POST['namapegawai']);
// JAWATAN KETUA JABATAN
$jawatanpegawai=strtoupper($_POST['jawatanpegawai']);
// EMEL KETUA JABATAN
$emelpegawai=$_POST['emelpegawai'];
$asrama=strtoupper($_POST['asrama']);
// NAMA PEMOHON
$namauser=$rows_seausername['u_name'];
// NO KP PEMOHON
$kpuser=$rows_seausername['u_idnum'];
//JAWATAN PEMOHON
$jawatanuser=$rows_seausername['win_pos'];
$jabatanuser=$rows_seausername['u_offaddress'];
//EMEL PEMOHON
$emeluser=$rows_seausername['u_email'];
$hpuser=$rows_seausername['u_telhp'];
$telpejuser=$rows_seausername['u_offnum'];
$co_waktulapor=$rows_seacourse['co_waktulapor'];
// TAJUK KURSUS
$co_name=$rows_seacourse['co_name'];
// YURAN KURSUS
$co_fee=$rows_seacourse['co_fee'];
// TARIKH MULA KURSUS
$co_sdate=$rows_seacourse['co_sdate'];
// TARIKH TAMAT KURSUS
$co_edate=$rows_seacourse['co_edate'];
//LOKASI KURSUS
$co_loc=$rows_seacourse['co_loc'];
//ID KURSUS
$co_idkursus=$rows_seacourse['co_id'];
// KOD KURSUS
$co_kodkursus=$rows_seacourse['co_coursecode'];
// NAMA KATEGORI KURSUS
$categorycourse=$rows_seacategory['cat_name'];

$co_catid=$rows_seacourse['co_catid'];
$co_regtime=$rows_seacourse['co_regtime'];


//echo $namapegawai;
//echo $emelpegawai;
//echo $hpuser;
//echo $co_idkursus;


// MAKLUMAT NOTA ARAHAN
  $nota = "Salam Sejahtera dan Salam 1 Malaysia. Untuk makluman kakitangan di bawah seliaan tuan telah memohon untuk mengikuti kursus di Institut Penyiaran dan Penerangan Tun Abdul Razak. Berikut adalah butiran permohonan kursus beliau:"; 
  $nota2 = "Sekian, Terima Kasih. "; 
 // MAKLUMAT ADMIN PENGIRIM
  $nama = "Pentadbir e-Kursus";
  $emeladmin = "webipptar@kpkk.gov.my";

mail( "$emelpegawai", "Makluman Permohonan Kursus Kakitangan di Institut Penyiaran dan Penerangan Tun Abdul Razak ",

"$nota\n\n Nama Kakitangan: $namauser\n\n Jawatan: $jawatanuser\n\n Tajuk Kursus: $co_name\n\n Kod Kursus: $co_kodkursus\n\n ID Kursus: $co_idkursus\n\n Tarikh Mula: $co_sdate\n\n Tarikh Tamat: $co_edate\n\n $nota2\n\n",

"From: $nama<$emeladmin>"); 
?>