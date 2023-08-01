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
if(isset($_SESSION['terai']) && $_SESSION['terai'] == "still") {
	
	$_SESSION['alert'] 		= "Anda sedang log masuk.";
	$_SESSION['redirek'] 	= "index.php";
	$_SESSION['toplus'] 	= "";
	$pageTitle = 'Laman eKursus';
	include("kosong.php");
	exit;
		
} elseif(isset($_SESSION['terai']) && $_SESSION['terai'] == "lo") {
	
	unset($_SESSION['UsrID']);
	unset($_SESSION['UsrNama']);
	
	session_destroy();
	
	$_SESSION['alert'] 		= "Anda telah log keluar.";
	$_SESSION['redirek'] 	= "login.php";
	$_SESSION['toplus'] 	= "";
	$pageTitle = 'Laman eKursus';
	include("kosong.php");
	exit;
	
} elseif(isset($_SESSION['terai']) && $_SESSION['terai'] == "login") {

	$key 		= $_SESSION['kodrawak']; 
	$number = $_SESSION['vercode'];
	
	# start captcha
	if(($number!=$key) || ($number=="")) {
		
		session_destroy();
				
		$_SESSION['alert'] 		= "Kod tidak valid. Sila cuba sekali lagi.";
		$_SESSION['redirek'] 	= "login.php";
		$pageTitle = 'Login';
		include("kosong.php");
		exit;
		
	} else {}
	# end captcha

	$idnum 	= $_SESSION['ID'];
	$pwd 	= md5($_SESSION['PWord']);
	//$pwd = md5(strtolower($_SESSION['PWord']));
	
	$UsrID 	= 0;
	
	/* $sql = "SELECT u_id, u_nama FROM user WHERE u_idnum = '$idnum' AND u_pwd = '$pwd' AND u_status = '1' LIMIT 1";
	$result = mysql_query($sql) or die(mysql_error()); */

	// add parameterized query
	$rowCount = sqlSelect(
		'SELECT count(u_id) AS total FROM user WHERE u_idnum = ? AND u_pwd = ? AND u_status = ?', 
		array($idnum, $pwd, 1)
	);
	$row = sqlSelect(
		'SELECT u_id, u_nama FROM user WHERE u_idnum = ? AND u_pwd = ? AND u_status = ?', 
		array($idnum, $pwd, 1)
	);

	// if (mysql_num_rows($result) == 0) {
	if ($rowCount['total'] == 0) {
		// FOR TESTING
		$_SESSION['UsrID'] 		= '803';
		$_SESSION['UsrNama'] 	= 'MAZLINA BINTI MOHD YUSOFF';

		$_SESSION['alert'] 		= "Akses berjaya!";
		$_SESSION['redirek']	= "index.php";
		$pageTitle = 'Login';
		include("kosong.php");
		exit;
		// END FOR TESTING
		
		session_destroy();

		$_SESSION['alert'] 		= "Akses akaun anda gagal! Sila masukkan No Kad Pengenalan dan Kata Laluan yang betul.";
		$_SESSION['redirek'] 	= "login.php";
		$pageTitle = 'Login';
		include("kosong.php");
		exit;
	} else {
		// $row = mysql_fetch_row($result);
		$_SESSION['UsrID'] 		= $row[0];
		$_SESSION['UsrNama'] 	= $row[1];
	 	
		$_SESSION['alert'] 		= "Akses berjaya!";
		$_SESSION['redirek'] 	= "index.php";
		$pageTitle 						= 'Login';
		include("kosong.php");
		exit;
	}
	
	/* if (mysql_num_rows($result) == 0) {
		
		//session_destroy();
		
		$_SESSION['alert'] 		= "Akses akaun anda gagal! Sila masukkan No Kad Pengenalan dan Kata Laluan yang betul.";
		$_SESSION['redirek'] 	= "login.php";
		$pageTitle 				= 'Login';
		include("kosong.php");
		exit;
	 	 
		} else {
	 	
	 	$row = mysql_fetch_row($result);
	 	$_SESSION['UsrID'] = $row[0];
		$_SESSION['UsrNama'] = $row[1];
	 	
		$_SESSION['alert'] 		= "Akses berjaya!.";
		$_SESSION['redirek'] 	= "index.php";
		$pageTitle 				= 'Login';
		include("kosong.php");
		exit;
	} */
	

}else{ session_destroy(); }
?>
<div id="content"> 

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>