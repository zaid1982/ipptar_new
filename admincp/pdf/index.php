
<?php
// Get required files.
require 'fpdf/fpdf.php';

// Set some document variables
$author = "Me McMe";
//$x = 50;


// Create fpdf object
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
$pdf->Write(180,'NAMA PEMOHON:');
$pdf->SetXY($x,95);
$pdf->Write(180,'NO. KAD PENGENALAN:');
$pdf->SetXY($x,110);
$pdf->Write(180,'JAWATAN:');
$pdf->SetXY($x,125);
$pdf->Write(180,'KEMENTERIAN / JABATAN:');
$pdf->SetXY($x,140);
$pdf->Write(180,'E-MEL:');
$pdf->SetXY($x,155);
$pdf->Write(180,'NO. TEL HP:');
$pdf->SetXY($xxx,155);
$pdf->Write(180,'NO. TEL PEJ:');


// MAKLUMAT KURSUS DIPOHON
$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY($x,180);
$pdf->Write(180,'MAKLUMAT KURSUS YANG DIPOHON:');
$pdf->SetXY($x,185);
$pdf->Write(180,'________________________________________________________________________________________________');  
$pdf->SetXY($x,210);
$pdf->SetFont('Times', '', 10);
$pdf->Write(180,'KURSUS: ');
$pdf->SetXY($x,225);
$pdf->Write(180,'KATEGORI:');
$pdf->SetXY($x,240);
$pdf->Write(180,'LOKASI:');
$pdf->SetXY($x,255);
$pdf->Write(180,'TARIKH MULA:');
$pdf->SetXY($xxx,255);
$pdf->Write(180,'TARIKH TAMAT:');
$pdf->SetXY($x,270);
$pdf->Write(180,'ID KURSUS:');
$pdf->SetXY($xxx,270);
$pdf->Write(180,'KOD KURSUS:');


// MAKLUMAT KURSUS PENGESAHAN
$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY($x,295);
$pdf->Write(180,'MAKLUMAT PENGESAHAN SOKONGAN DAN KEBENARAN KETUA JABATAN:');
$pdf->SetXY($x,300);
$pdf->Write(180,'________________________________________________________________________________________________');  
$pdf->SetXY($x,325);
$pdf->SetFont('Times', '', 10);
$pdf->Write(180,'NAMA: ');
$pdf->SetXY($x,340);
$pdf->Write(180,'JAWATAN:');
$pdf->SetXY($x,355);
$pdf->Write(180,'SOKONGAN: (DISOKONG / TIDAK DISOKONG)');
$pdf->SetXY($x,370);
$pdf->Write(180,'TARIKH:');
$pdf->SetXY($x,385);
$pdf->Write(180,'CATATAN:');
$pdf->SetXY($x,425);
$pdf->Write(180,'TANDATANGAN:');
$pdf->SetXY($xxx,425);
$pdf->Write(180,'COP RASMI:');
$pdf->SetXY($x,550);
$pdf->Write(180,'* SILA KEMBALIKAN SURAT TAWARAN YANG DISAHKAN KEPADA URUSETIA UNTUK PENAWARAN KURSUS.');  
// Close the document and save to the filesystem with the name simple.pdf
$pdf->Output('simple.pdf','F');
?>