<?php session_start(); ?>
<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container2">
<?php
include("conn.php");
#print "xxx".$_SESSION['terai'];
if(isset($_SESSION['terai']) && $_SESSION['terai'] == "pensemak"){
	
	$_SESSION['alert'] = "Penilaian anda telah direkodkan.";
	$_SESSION['redirek'] = "penilaian.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kemaskini Penilaian';
	include("kosong.php");
	exit;
		
}else{ session_destroy(); }
?>
<div id="content"> 

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>

