<?php
// Get required files.
require 'fpdf/fpdf.php';
require 'configpdf.php';

$applicationid=$nopermohonanuser;
//echo $applicationid;
$search="select * from costu_all where costu_appid=$applicationid";
$seaname=mysql_query($search);	
$rows_seaname=mysql_fetch_array($seaname);

$nosiripermohonan=$rows_seaname['costu_appid'];
$ic=$rows_seaname['costu_uid'];
$noiduser=$rows_seaname['costu_numid'];
$idcourse=$rows_seaname['costu_id'];
$date=$rows_seaname['costu_date'];
//echo $nosiripermohonan;
$norujukan=$rows_seaname['costu_appid'];
$tarikh=$rows_seaname['costu_date'];
$name=$rows_seaname['costu_uid'];
//select user information
$searchname="select * from u_profile,win_info where u_profile.u_idnum='$ic' AND win_info.win_id='$noiduser'";
$seausername=mysql_query($searchname);	
$rows_seausername=mysql_fetch_array($seausername);

$namauser=$rows_seausername['u_name'];
$kpuser=$rows_seausername['u_idnum'];
$jawatanuser=$rows_seausername['win_pos'];
$jabatanuser=$rows_seausername['u_offaddress'];
$emeluser=$rows_seausername['u_email'];
$hpuser=$rows_seausername['u_telhp'];
$telpejuser=$rows_seausername['u_offnum'];

// SEARCH COURSE INFORMATION
$searchcourse="select * from co_info where co_id='$idcourse'";
$seacourse=mysql_query($searchcourse);	
$rows_seacourse=mysql_fetch_array($seacourse);

$co_waktulapor=$rows_seacourse['co_waktulapor'];
$co_name=$rows_seacourse['co_name'];
$co_fee=$rows_seacourse['co_fee'];
$co_sdate=$rows_seacourse['co_sdate'];
$co_edate=$rows_seacourse['co_edate'];
$co_loc=$rows_seacourse['co_loc'];
$co_idkursus=$rows_seacourse['co_id'];
$co_kodkursus=$rows_seacourse['co_coursecode'];
$co_catid=$rows_seacourse['co_catid'];
$co_regtime=$rows_seacourse['co_regtime'];

//SEARCH KATEGORI 

$searchcategory="select cat_id,cat_name from cat_category where cat_id='$co_catid'";
$seacategory=mysql_query($searchcategory);	
$rows_seacategory=mysql_fetch_array($seacategory);

$categorycourse=$rows_seacategory['cat_name'];

$norujukan2=$date.'/'.$norujukan;
$random= rand(5000000000000000000, 6000000000000000000);
$filenumber=$random.$name;
$type=".pdf";
$filename=$filenumber.$type;
//echo $filename;

$try="UPDATE costu_all SET costu_filename='$filename' where costu_appid='$nosiripermohonan'";
//$try="insert into costu_all (costu_filename)  values ('$filename')  where costu_appid='4000046' ";
$tryresult=mysql_query($try);
$author = "MUHAMMAD WIRA IZKANDAR BIN ZULZAHARY";
$x = 36;
$xx = 100;
$xxx = 250;
$xxxx = 200;
$xxxxx = 350;
// Create fpdf object
$pdf = new FPDF('P', 'pt', 'Letter');
// Set base font to start
$pdf->SetFont('Times', 'B', 12);
// Add a new page to the document
$pdf->addPage();
// Set the x,y coordinates of the cursor
$pdf->Image('headerletter.jpg', 30, 10, 500, 112.5, 'JPG');
// set xy for reference number

// MAKLUMAT PEMOHON
$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY($x,50);
$pdf->Write(180,'MAKLUMAT PEMOHON:');
$pdf->SetXY($x,55);
$pdf->Write(180,'________________________________________________________________________________________________');  
$pdf->SetFont('Times', '', 10);
$pdf->SetXY($x,80);
$pdf->Write(180,'NAMA PEMOHON: '.$namauser);
$pdf->SetXY($x,95);
$pdf->Write(180,'NO. KAD PENGENALAN: '.$kpuser);
$pdf->SetXY($x,110);
$pdf->Write(180,'JAWATAN: '.$jawatanuser);
$pdf->SetXY($x,125);
$pdf->Write(180,'KEMENTERIAN / JABATAN: '.$jabatanuser);
$pdf->SetXY($x,140);
$pdf->Write(180,'E-MEL: '.$emeluser);
$pdf->SetXY($x,155);
$pdf->Write(180,'NO. TEL (BIMBIT): '.$hpuser);
$pdf->SetXY($xxx,155);
$pdf->Write(180,'NO. TEL (PEJABAT): '.$telpejuser);


// MAKLUMAT KURSUS DIPOHON
$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY($x,180);
$pdf->Write(180,'MAKLUMAT KURSUS YANG DIPOHON:');
$pdf->SetXY($x,185);
$pdf->Write(180,'________________________________________________________________________________________________');  
$pdf->SetXY($x,210);
$pdf->SetFont('Times', '', 10);
$pdf->Write(180,'KURSUS: '.$co_name);
$pdf->SetXY($x,225);
$pdf->Write(180,'KATEGORI: '.$categorycourse);
$pdf->SetXY($x,240);
$pdf->Write(180,'LOKASI: '.$co_loc);
$pdf->SetXY($x,255);
$pdf->Write(180,'TARIKH MULA: '.$co_sdate);
$pdf->SetXY($xxx,255);
$pdf->Write(180,'TARIKH TAMAT: '.$co_edate);
$pdf->SetXY($x,270);
$pdf->Write(180,'ID KURSUS: '.$co_idkursus);
$pdf->SetXY($xxx,270);
$pdf->Write(180,'KOD KURSUS: '.$co_kodkursus);
$pdf->SetXY($x,285);
$pdf->Write(180,'KEPERLUAN ASRAMA: '.$asrama);

// MAKLUMAT KURSUS PENGESAHAN
$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY($x,310);
$pdf->Write(180,'MAKLUMAT PENGESAHAN SOKONGAN DAN KEBENARAN KETUA JABATAN: (DIWAJIBKAN)');
$pdf->SetXY($x,315);
$pdf->Write(180,'________________________________________________________________________________________________');  
$pdf->SetXY($x,340);
$pdf->SetFont('Times', '', 10);
$pdf->Write(180,'NAMA: ');
$pdf->SetXY($x,355);
$pdf->Write(180,'JAWATAN:');
$pdf->SetXY($x,370);
$pdf->Write(180,'SOKONGAN: (DISOKONG / TIDAK DISOKONG)');
$pdf->SetXY($x,385);
$pdf->Write(180,'TARIKH:');
$pdf->SetXY($x,400);
$pdf->Write(180,'CATATAN:');
$pdf->SetXY($x,440);
$pdf->Write(180,'TANDATANGAN:');
$pdf->SetXY($xxx,445);
$pdf->Write(180,'CAP RASMI:');
$pdf->SetXY($x,540);
$pdf->Write(180,'* SILA KEMBALIKAN BORANG PERMOHONAN INI KEPADA URUSETIA KURSUS.');  
$pdf->Output($filename,'F');

// FUNCTION EMAIL NOTIFICATION..KALAU XBOLEH DISABLE JADIKAN COMMENT.
include 'usermailfunction.php'; 
?>