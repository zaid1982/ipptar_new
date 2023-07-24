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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "admprofil"){
	
$pwd = md5($_SESSION['pwd']);

$key = $_SESSION['kodrawak']; 
$number = $_SESSION['vercode'];
# start captcha
if(($number!=$key)||($number=="")){
	
	session_destroy();
			
	$_SESSION['alert'] = "Kod tidak valid. Sila cuba sekali lagi.";
	$_SESSION['redirek'] = "admin_profil.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kemaskini Profil';
	include("../kosong.php");
	exit;
	
} else {}
# end captcha	

$select = "
SELECT *
FROM admin
WHERE a_id LIKE '$_SESSION[MyID]'
ORDER BY a_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$numrows = mysql_num_rows($result);

	if($numrows == "1"){

		$sql = "UPDATE admin SET a_pwd = '$pwd', a_nama = '$_SESSION[nama]', a_tel = '$_SESSION[tel]', a_emel = '$_SESSION[emel]', a_level = '$_SESSION[level]' WHERE a_id = '$_SESSION[MyID]'";
		$result = mysql_query($sql) or die(mysql_error());
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Kemaskini admin berjaya.";
		$_SESSION['redirek'] = "admin_profil.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Kemaskini Admin';
		include("../kosong.php");
		exit;
		
	}else{
		
		$sql = "INSERT INTO admin (a_pwd, a_idnum, a_nama, a_tel, a_emel, a_level, a_status)
		VALUES ('$pwd', '$_SESSION[idnum]', '$_SESSION[nama]', '$_SESSION[tel]', '$_SESSION[emel]', '$_SESSION[level]', '1')";
		$result = mysql_query($sql) or die(mysql_error());
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Tambah admin berjaya.";
		$_SESSION['redirek'] = "admin_profil.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Kemaskini Admin';
		include("../kosong.php");
		exit;
		
	}
	
}elseif(isset($_SESSION['terai']) && $_SESSION['terai'] == "admbaru"){
	
$pwd = md5($_SESSION['pwd']);
	
$key = $_SESSION['kodrawak']; 
$number = $_SESSION['vercode'];
# start captcha
if(($number!=$key)||($number=="")){
	
	session_destroy();
			
	$_SESSION['alert'] = "Kod tidak valid. Sila cuba sekali lagi.";
	$_SESSION['redirek'] = "admin_list.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kemaskini Admin';
	include("../kosong.php");
	exit;
	
} else {}
# end captcha	

$select = "
SELECT *
FROM admin
WHERE a_idnum LIKE '$_SESSION[idnum]'
ORDER BY a_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$numrows = mysql_num_rows($result);

	if($numrows == "1"){

		#print $sql = "UPDATE admin SET a_pwd = '$_SESSION[pwd]', a_nama = '$_SESSION[nama]', a_tel = '$_SESSION[tel]', a_emel = '$_SESSION[emel]' WHERE a_id = '$_SESSION[aid]'";
		#$result = mysql_query($sql) or die(mysql_error());
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Maaf. No kad pengenalan ini telah didaftarkan.";
		$_SESSION['redirek'] = "admin_list.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Gagal Tambah Admin Baru';
		include("../kosong.php");
		exit;
		
	}else{
		
		$sql = "INSERT INTO admin (a_pwd, a_idnum, a_nama, a_tel, a_emel, a_level, a_status)
		VALUES ('$pwd', '$_SESSION[idnum]', '$_SESSION[nama]', '$_SESSION[tel]', '$_SESSION[emel]', '$_SESSION[level]', '1')";
		$result = mysql_query($sql) or die(mysql_error());
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Tambah admin berjaya.";
		$_SESSION['redirek'] = "admin_list.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Tambah Admin Baru';
		include("../kosong.php");
		exit;
		
	}	

}else{ session_destroy(); }
?>
<div id="content"> 

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>