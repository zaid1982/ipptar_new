<?php session_start(); ?>
<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="container2">
<?php
include("../conn.php");

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "ticbaru"){
	
$key = $_SESSION['kodrawak']; 
$number = $_SESSION['vercode'];
# start captcha
if(($number!=$key)||($number=="")){
	
	session_destroy();
			
	$_SESSION['alert'] = "Kod tidak valid. Sila cuba sekali lagi.";
	$_SESSION['redirek'] = "ticer_list.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Tambah Pengajar Baru';
	include("../kosong.php");
	exit;
	
} else {}
# end captcha

$sql = "INSERT INTO ticer (t_nama, t_kid, t_status)
VALUES ('$_SESSION[nama]', '$_SESSION[kursus]', '1')";
$result = mysql_query($sql) or die(mysql_error());
	
$_SESSION['alert'] = "Tambah pengajar berjaya.";
$_SESSION['redirek'] = "ticer_list.php";
$_SESSION['toplus'] = "";
$pageTitle = 'Tambah Pengajar Baru';
include("../kosong.php");
exit;
	
}else{ session_destroy(); }
?>
<div id="content"> 

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>