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
#print "xxx".$_SESSION['terai'];
if(isset($_SESSION['terai']) && $_SESSION['terai'] == "still") {
	
	$_SESSION['alert'] 		= "Anda sedang log masuk.";
	$_SESSION['redirek'] 	= "index.php";
	$_SESSION['toplus'] 	= "";
	$pageTitle = 'Laman eKursus';
	include("../kosong.php");
	exit;
		
} elseif(isset($_SESSION['terai']) && $_SESSION['terai'] == "lo") {
	
	unset($_SESSION['MyID']);
	unset($_SESSION['MyNama']);
	
	session_destroy();
	
	$_SESSION['alert'] 		= "Anda telah log keluar.";
	$_SESSION['redirek'] 	= "login.php";
	$_SESSION['toplus'] 	= "";
	$pageTitle = 'Laman eKursus';
	include("../kosong.php");
	exit;
	
} elseif(isset($_SESSION['terai']) && $_SESSION['terai'] == "login") {

	$key 	= $_SESSION['kodrawak']; 
	$number = $_SESSION['vercode'];
	
	# start captcha
	if(($number!=$key) || ($number=="")) {
		
		session_destroy();
				
		$_SESSION['alert'] 		= "Kod tidak valid. Sila cuba sekali lagi.";
		$_SESSION['redirek'] 	= "login.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle = 'Login';
		include("../kosong.php");
		exit;
		
	} else {}
	# end captcha

	$idnum 	= $_SESSION['ID'];
	$pwd 		= md5(strtolower($_SESSION['PWord']));
	
	$MyID = 0;
	
	/* $sql = "SELECT a_id, a_nama, a_level FROM admin WHERE a_idnum = '$idnum' AND a_pwd = '$pwd' AND a_status = '1' LIMIT 1";
	$result = mysql_query($sql) or die(mysql_error());	 */

	// add parameterized query
	$rowCount = sqlSelect(
		'SELECT count(a_id) FROM admin WHERE a_idnum = ? AND a_pwd = ? AND a_status = ? LIMIT 1', 
		array($idnum, $pwd, 1)
	);
	$row = sqlSelect(
		'SELECT a_id, a_nama, a_level FROM admin WHERE a_idnum = ? AND a_pwd = ? AND a_status = ? LIMIT 1', 
		array($idnum, $pwd, 1)
	);
	
	// if (mysql_num_rows($result) == 0) {
	if ($rowCount['total'] == 0) {
		// FOR TESTING
		$_SESSION['MyID'] 		= '1';
		$_SESSION['MyNama'] 	= 'MOHD DANIAL SAIFULLAH BIN SULAIMAN';
		$_SESSION['MyLevel']	= '1';

		$_SESSION['login_time'] = time();

		$_SESSION['alert'] = "Akses berjaya!";
		$pageTitle = 'Login';
		print "<meta HTTP-EQUIV='REFRESH' content='0; url=index.php'>";
		exit;
		// END FOR TESTING
		
		session_destroy();
		
		$_SESSION['alert'] = "Akses akaun anda gagal! Sila masukkan No Kad Pengenalan dan Kata Laluan yang betul.";
		$_SESSION['redirek'] = "login.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Login';
		include("../kosong.php");
		exit;
	} else {
		// $row = mysql_fetch_row($result);
		$_SESSION['MyID'] 		= $row[0];
		$_SESSION['MyNama'] 	= $row[1];
		$_SESSION['MyLevel'] 	= $row[2];
		
		$_SESSION['login_time'] = time();
		
		$_SESSION['alert'] = "Akses berjaya!";
		#$_SESSION['redirek'] = "index.php";
		#$_SESSION['toplus'] = "";
		$pageTitle = 'Login';
		#include("../kosong.php");
		print "<meta HTTP-EQUIV='REFRESH' content='0; url=index.php'>";
		exit;
	}
} else { session_destroy(); }
?>
<div id="content"> 

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>