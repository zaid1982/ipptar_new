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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "profil"){

	$tkhmohon = date('Y-m-d');
	$tkhlahir = $_SESSION[tltahun]."-".$_SESSION[tlbulan]."-".$_SESSION[tlhari];
	$tkhlantik = $_SESSION[tahun_lantik]."-".$_SESSION[bulan_lantik]."-".$_SESSION[hari_lantik];
		
	$key = $_SESSION['kodrawak']; 
	$number = $_SESSION['vercode'];
	
	# start captcha
	if(($number!=$key)||($number=="")){
	
		session_destroy();
				
		$_SESSION['alert'] = "Kod tidak valid. Sila cuba sekali lagi.";
		$_SESSION['redirek'] = "katalog.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Kemaskini Kursus';
		include("../kosong.php");
		exit;
		
	} else {}
	# end captcha	
	
	$select = "
	SELECT *
	FROM user
	WHERE u_id LIKE '$_SESSION[UsrID]'
	ORDER BY u_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result);
	$numrows = mysql_num_rows($result);
	
		if($numrows == "1"){
	
			$sql = "UPDATE user SET u_nama = '$_SESSION[nama]', u_jantina = '$_SESSION[jantina]', u_dob = '$tkhlahir', u_tel = '$_SESSION[tel]', u_jwt = '$_SESSION[jawatan]', u_jwttingkat = '$_SESSION[peringkat]', u_jwtklas = '$_SESSION[klasifikasi]', u_jwtgred = '$_SESSION[gred]', u_jwttaraf = '$_SESSION[taraf]', u_jkhidmat = '$_SESSION[khidmat]', u_tkhlantik = '$tkhlantik', u_emel = '$_SESSION[emel]', u_knama = '$_SESSION[ketua]', u_kjwt = '$_SESSION[ketuajwt]', u_kemel = '$_SESSION[ketuaemel]', u_alamatkjab = '$_SESSION[alamatkjab]', u_jab = '$_SESSION[jab]', u_jabaddr1 = '$_SESSION[jabaddr1]', u_jabaddr2 = '$_SESSION[jabaddr2]', u_jabpkod = '$_SESSION[jabpkod]', u_jabbandar = '$_SESSION[jabbandar]', u_jabnegeri = '$_SESSION[jabnegeri]', u_jabtel = '$_SESSION[jabtel]', u_jabfax = '$_SESSION[jabfax]' WHERE u_idnum = '$_SESSION[idnum]'";
			$result = mysql_query($sql) or die(mysql_error());
			
		}else{
			
			$sql = "INSERT INTO user (u_idnum,u_nama,u_jantina,u_dob,u_tel,u_jwt,u_jwttingkat,u_jwtklas,u_jwtgred,u_jwttaraf,u_jkhidmat,u_tkhlantik,u_emel,u_knama,u_kjwt,u_kemel,u_alamatkjab,u_jab,u_jabaddr1,u_jabaddr2,u_jabpkod,u_jabbandar,u_jabnegeri,u_jabtel,u_jabfax)
			VALUES ('$_SESSION[idnum]', '$_SESSION[nama]', '$_SESSION[jantina]', '$tkhlahir','$_SESSION[tel]','$_SESSION[jawatan]','$_SESSION[peringkat]','$_SESSION[klasifikasi]','$_SESSION[gred]','$_SESSION[taraf]','$_SESSION[khidmat]','$tkhlantik','$_SESSION[emel]','$_SESSION[ketua]','$_SESSION[ketuajwt]','$_SESSION[ketuaemel]','$_SESSION[alamatkjab]','$_SESSION[jab]','$_SESSION[jabaddr1]','$_SESSION[jabaddr2]','$_SESSION[jabpkod]','$_SESSION[jabbandar]','$_SESSION[jabnegeri]','$_SESSION[jabtel]','$_SESSION[jabfax]')";
			$result = mysql_query($sql) or die(mysql_error());
			
			$UsrID = mysql_insert_id();
	
			$sql = "INSERT INTO pilih (p_uid, p_kid, p_status, p_tkhmohon)
					VALUES ('$UsrID', '$_SESSION[kid]', '3', '$tkhmohon')";
			$result = mysql_query($sql) or die(mysql_error());
		    		
		}
	
	$_SESSION['alert'] = "Maklumat anda telah direkodkan.";
	#$_SESSION['redirek'] = "index.php";
	$_SESSION['redirek'] = "";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Add Profile';
	include("kosong.php");
	exit;

}else{ session_destroy(); }
?>
<div id="content"> 

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>