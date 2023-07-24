<?php
include("../conn.php");

$pid = (int)$_GET['pid'];

$select = "
SELECT *
FROM pilih a, user b, kursus c, kluster d
WHERE a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND p_id LIKE '$pid' 
ORDER BY p_id ASC
LIMIT 1
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

$select2 = "
SELECT *
FROM pengarah 
ORDER BY p_id ASC
LIMIT 1
";
$result2 = mysql_query($select2) or die("Query failed");
$row2 = mysql_fetch_assoc($result2);
?>

<?php
require('pdf/fpdf.php');

$terai = date("d F Y", strtotime($row["k_edate"]));
$terai = str_replace("October","Oktober",$terai);
$terai = str_replace("February","Februari",$terai); 
$terai = str_replace("March","Mac",$terai);
$terai;

#$text1 = "Sijil ini dianugerahkan kepada";
$text2 = $row['u_nama'];
$text3 = "telah menghadiri kursus";
$text4 = strtoupper($row['k_name']);
$text5 = "pada ".date('d', strtotime($row['k_sdate']))." - ".$terai.",";
$text6 = "dianjurkan oleh";
$text7 = "Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)";
$text8 = strtoupper($row2['p_nama']);
$text9 = "b.p PENGARAH";
$text10 = "INSTITUT PENYIARAN DAN PENERANGAN TUN ABDUL RAZAK";
$text11 = "KEMENTERIAN KOMUNIKASI DAN DIGITAL";

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/sijil.png',0,0,297);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(80);
    // Title
    //$this->Cell(30,10,'Title',1,0,'C');
    // Line break
    //$this->Ln(20);
    //sign
    $this->Image('images/signkumaran.png',190,140,40);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    //$this->SetY(-15);
    // Arial italic 8
    //$this->SetFont('Arial','I',8);
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf=new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$pdf->Ln(65);
#$pdf->Cell(0,12,$text1,0,1);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,15,$text2,0,1);
$pdf->SetFont('Arial','',16);
$pdf->Cell(0,10,$text3,0,1);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,15,$text4,0,1);
$pdf->SetFont('Arial','',16);
$pdf->Cell(0,7,$text5,0,1);
$pdf->Cell(0,7,$text6,0,1);
$pdf->Cell(0,7,$text7,0,1);
$pdf->Ln(38);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(400,4,$text8,0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(400,4,$text9,0,1,'C');
$pdf->Cell(400,4,$text10,0,1,'C');
$pdf->Cell(400,3,$text11,0,1,'C');
$pdf->Output();
?>