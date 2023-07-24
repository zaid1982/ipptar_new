
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
$asrama=$rows_seaname['costu_asrama'];
$ic=$rows_seaname['costu_uid'];
$idcourse=$rows_seaname['costu_id'];
$coursecode=$rows_seaname['costu_coursecode'];
$date=$rows_seaname['costu_date'];
//$date="12/09/2011";
$day= substr($date,0,-8);
$month = substr($date,3,-5);
$year = substr($date,6);

if ($month=="01") { $monthword="JANUARI"; }
if ($month=="02") { $monthword="FEBRUARI"; }
if ($month=="03") { $monthword="MAC"; }
if ($month=="04") { $monthword="APRIL"; }
if ($month=="05") { $monthword="MEI"; }
if ($month=="06") { $monthword="JUN"; }
if ($month=="07") { $monthword="JULAI"; }
if ($month=="08") { $monthword="OGOS"; }
if ($month=="09") { $monthword="SEPTEMBER"; }
if ($month=="10") { $monthword="OKTOBER"; }
if ($month=="11") { $monthword="NOVEMBER"; }
if ($month=="12") { $monthword="DISEMBER"; }

$fulldateword=$day.' '.$monthword.' '.$year;
//GET DATE FORMAT FOR OFFICIAL LETTER



//echo $nosiripermohonan;
$norujukan=$rows_seaname['costu_appid'];
$tarikh=$rows_seaname['costu_date'];
$name=$rows_seaname['costu_uid'];

$searchname="select * from u_profile where u_idnum='$ic'";
$seausername=mysql_query($searchname);	
$rows_seausername=mysql_fetch_array($seausername);
$namauser=$rows_seausername['u_name'];
$namajabatan=$rows_seausername['u_offaddress'];
$alamatpej1=$rows_seausername['u_offcity']; 
$alamatpej2=$rows_seausername['u_city']; 
$poskodpej=$rows_seausername['u_postcode']; 
$statepej=$rows_seausername['u_state']; 
$emailuser=$rows_seausername['u_email']; 
$alamatpejabatfull=$poskodpej.' '.$statepej;


$searchcourse="select * from co_info where co_id='$idcourse'";
$seacourse=mysql_query($searchcourse);	
$rows_seacourse=mysql_fetch_array($seacourse);

$co_waktulapor=$rows_seacourse['co_waktulapor'];
$co_name=$rows_seacourse['co_name'];
$co_fee=$rows_seacourse['co_fee'];
$co_sdate=$rows_seacourse['co_sdate'];
$co_edate=$rows_seacourse['co_edate'];
$co_loc=$rows_seacourse['co_loc'];
$co_regtime=$rows_seacourse['co_regtime'];
$dateper=$rows_seacourse['co_sdate'];
//$date="12/09/2011";
$dayper= substr($dateper,0,-8);
$monthper = substr($dateper,3,-5);
$yearper = substr($dateper,6);

if ($monthper=="01") { $monthwordper="JANUARI"; }
if ($monthper=="02") { $monthwordper="FEBRUARI"; }
if ($monthper=="03") { $monthwordper="MAC"; }
if ($monthper=="04") { $monthwordper="APRIL"; }
if ($monthper=="05") { $monthwordper="MEI"; }
if ($monthper=="06") { $monthwordper="JUN"; }
if ($monthper=="07") { $monthwordper="JULAI"; }
if ($monthper=="08") { $monthwordper="OGOS"; }
if ($monthper=="09") { $monthwordper="SEPTEMBER"; }
if ($monthper=="10") { $monthwordper="OKTOBER"; }
if ($monthper=="11") { $monthwordper="NOVEMBER"; }
if ($monthper=="12") { $monthwordper="DISEMBER"; }

$fulldatewordper=$dayper.' '.$monthwordper.' '.$yearper;
$norujukan2='IPPTAR/KURSUS/'.$norujukan;
$random= rand(5000000000000000000, 6000000000000000000);
//$filenumber=$random=.$ic;
$filenumber=$nosiripermohonan.$random;
$type=".pdf";
$filename=$filenumber.$type;
//echo $filename;

//$try="UPDATE costu_all SET costu_offerfile='$filename' where costu_appid='$nosiripermohonan'";
//$try="insert into costu_all (costu_filename)  values ('$filename')  where costu_appid='4000046' ";
//$tryresult=mysql_query($try);
//$search="select u_name,u_idnum from u_profile";
//$seaname=mysql_query($search);	
//$rows_seaname=mysql_fetch_array($seaname);
//$name=$rows_seaname['u_idnum'];
// Set some document variables
$author = "Me McMe";
$x = 50;
$xx = 80;
$xxx = 150;
$xxxx = 160;
$xxxxx = 350;
// Create fpdf object
$pdf = new FPDF('P', 'pt', 'Letter');
// Set base font to start
$pdf->SetFont('Times', 'B', 12);
// Add a new page to the document
$pdf->addPage();
// Set the x,y coordinates of the cursor
$pdf->Image('headerletter.jpg', $x, 10, 500, 112.5, 'JPG');
// set xy for reference number

// set for no rujukan
$pdf->SetXY(380,50);
$pdf->SetFont('Times', 'B', 8);
$pdf->Write(180,'No. Rujukan :');
$pdf->SetXY(440,50);
$pdf->SetFont('Times', 'B', 8);
$pdf->Write(180,$norujukan2);
// set for tarikh
$pdf->SetXY(380,60);
$pdf->SetFont('Times', 'B', 8);
$pdf->Write(180,'Tarikh           :');
$pdf->SetXY(440,60);
$pdf->SetFont('Times', 'B', 8);
$pdf->Write(180,$fulldateword);

// set for name 
$pdf->SetXY($x,110);
$pdf->SetFont('Times', 'B', 10);
$pdf->Write(180,$namauser);

// set for name 3
$pdf->SetXY($x,150);
$pdf->SetFont('Times', 'B', 10);
$pdf->Write(180,'Melalui:');

// set for name 3
$pdf->SetXY($x,180);
$pdf->SetFont('Times','',10);
$pdf->Write(180,'KETUA JABATAN / KETUA PENGARAH / PENGARAH');
$pdf->SetXY($x,190);
$pdf->Write(180,$namajabatan);
$pdf->SetXY($x,200);
$pdf->Write(180,$alamatpej1);
$pdf->SetXY($x,210);
$pdf->Write(180,$alamatpej2);
$pdf->SetXY($x,220);
$pdf->Write(180,$alamatpejabatfull);

$pdf->SetXY($x,250);
$pdf->Write(180,'Tuan,');

$pdf->SetFont('Times','B',10);
$pdf->SetXY($x,270);
$pdf->Write(180,''.$co_name);
$pdf->SetXY($x,270);
$pdf->Write(180,'');
$pdf->SetXY($x,285);
$pdf->Write(180,'PADA  '.$fulldatewordper.'');
$pdf->SetXY($x,285);
$pdf->Write(180,'');

$pdf->SetFont('Times','',10);
$pdf->SetXY($x,320);
$pdf->Write(180,'Dengan segala hormatnya merujuk seperti nama tuan di atas');

$pdf->SetFont('Times','',10);
$pdf->SetXY($x,350);
$pdf->Write(180,'2.	       Sukacita dimaklumkan, tuan ditawarkan mengikuti kursus di Institut Penyiaran dan Penerangan Tun Abdul  ');  
$pdf->SetXY($x,370);
$pdf->Write(180,'Razak (IPPTAR). Maklumat kursus adalah seperti berikut:');

$pdf->SetFont('Times','B',10);
$pdf->SetXY($xx,400);
$pdf->Write(180,'Tajuk Kursus'); 
$pdf->SetXY($xxx,400);
$pdf->Write(180,':'); 
$pdf->SetXY($xxxx,400);
$pdf->Write(180,$co_name); 
$pdf->SetXY($xx,410);
$pdf->Write(180,'Tarikh Mula'); 
$pdf->SetXY($xxx,410);
$pdf->Write(180,':'); 
$pdf->SetXY($xxxx,410);
$pdf->Write(180,$co_sdate); 
$pdf->SetXY($xx,420);
$pdf->Write(180,'Tarikh Tamat'); 
$pdf->SetXY($xxx,420);
$pdf->Write(180,':'); 
$pdf->SetXY($xxxx,420);
$pdf->Write(180,$co_edate); 
$pdf->SetXY($xx,430);
$pdf->Write(180,'Masa'); 
$pdf->SetXY($xxx,430);
$pdf->Write(180,':'); 
$pdf->SetXY($xxxx,430);
$pdf->Write(180,$co_waktulapor); 
$pdf->SetXY($xx,440);
$pdf->Write(180,'Tempat'); 
$pdf->SetXY($xxx,440);
$pdf->Write(180,':'); 
$pdf->SetXY($xxxx,440);
$pdf->Write(180,$co_loc); 
$pdf->SetXY($xx,450);
$pdf->Write(180,'Yuran'); 
$pdf->SetXY($xxx,450);
$pdf->Write(180,':'); 
$pdf->SetXY($xxxx,450);
$pdf->Write(180,'RM '.$co_fee); 
$pdf->SetXY($xx,460);
$pdf->Write(180,'Asrama'); 
$pdf->SetXY($xxx,460);
$pdf->Write(180,':'); 
$pdf->SetXY($xxxx,460);
$pdf->Write(180,$asrama);

$pdf->SetFont('Times','',10);
$pdf->SetXY($x,490);
$pdf->Write(180,'3.	       Tuan dikehendaki membayar yuran pendaftaran mengikut jumlah seperti di atas semasa melaporkan diri. Bayaran  ');  
$pdf->SetXY($x,510);
$pdf->Write(180,'boleh dituntut kembali di jabatan masing - masing. Sepanjang tempoh kursus tuan dikehendaki berpakaian kemas dan sopan.' );
$pdf->SetXY($x,530);
$pdf->Write(180,'Tuan juga perlu mematuhi peraturan – peraturan seperti berikut:');  


$pdf->addPage();
$pdf->SetXY($xx,10);
$pdf->Write(180,'3.1 	Tidak dibenarkan bercuti rehat atau dipanggil balik ke pejabat');
$pdf->SetXY($xx,30);
$pdf->Write(180,'3.2 	Sekiranya sakit, sijil cuti sakit mestilah disertakan dengan surat yang sah daripada pegawai perubatan');

$pdf->SetXY($x,60);
$pdf->Write(180,'4.	       Bagi peserta dari luar Kuala Lumpur dan Petaling Jaya, kemudahan asrama disediakan di IPPTAR. Peserta boleh ');  
$pdf->SetXY($x,80);
$pdf->Write(180,'melaporkan diri di asrama IPPTAR sehari sebelum kursus bermula selepas pukul 2.00 petang. Kemudahan kudapan');  
$pdf->SetXY($x,100);
$pdf->Write(180,'pagi, makan tengah hari dan minum petang disediakan sepanjang kursus berlangsung.');  

$pdf->SetXY($x,150);
$pdf->Write(180,'Sekian, terima kasih.');  
$pdf->SetXY($x,170);
$pdf->Write(180,'"BERKHIDMAT UNTUK NEGARA"');  
$pdf->SetXY($x,200);
$pdf->Write(180,'Saya yang menurut perintah,');  

$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY($x,250);
$pdf->Write(180,'(DATO ADILAH SHEK OMAR)');
$pdf->SetFont('Times', '', 10);
$pdf->SetXY($x,265);
$pdf->Write(180,'Pengarah'); 
$pdf->SetXY($x,280);
$pdf->Write(180,'Institut Penyiaran dan Penerangan Tun Abdul Razak'); 
$pdf->SetXY($x,295);
$pdf->Write(180,'Kementerian Komunikasi dan Multimedia Malaysia'); 
$pdf->SetXY($x,310);
$pdf->Write(180,'Kuala Lumpur'); 
$pdf->SetXY($x,325);
$pdf->Write(180,'');  

$pdf->SetFont('Times', 'B', 7);
$pdf->SetXY($x,360);
$pdf->Write(180,'** Salinan ini adalah cetakan komputer tidak memerlukan tandatangan.');  

$pdf->Output($filename,'F');

// FUNCTION EMAIL NOTIFICATION..KALAU XBOLEH DISABLE JADIKAN COMMENT.
include 'mailfunction.php'; 
?>