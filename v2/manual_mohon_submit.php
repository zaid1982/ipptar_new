<?php 
session_start();
include("conn.php");
include("top.php");
?>
<body>
<div id="container2">
<?php
$select = "
SELECT p_uid, p_kid
FROM pilih
WHERE p_id LIKE '$_GET[pid]'
ORDER BY p_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$numrows = mysql_num_rows($result);

$pid = $_GET[pid];

$select1 = "
SELECT u_id, u_nama, u_emel, u_idnum, u_jab, u_knama, u_kemel
FROM user
WHERE u_id LIKE '$row[p_uid]'
ORDER BY u_id ASC
";
$result1 = mysql_query($select1) or die("Query failed");
$row1 = mysql_fetch_assoc($result1);

$_SESSION[UsrID] = $row1['u_id'];

$_SESSION['u_nama'] = $row1['u_nama'];
$_SESSION['u_emel'] = $row1['u_emel'];
$_SESSION['u_idnum'] = $row1['u_idnum'];
$_SESSION['u_jab'] = $row1['u_jab'];
$_SESSION['u_knama'] = $row1['u_knama'];
$_SESSION['u_kemel'] = $row1['u_kemel'];

$select2 = "
SELECT k_id, k_name, k_sdate, k_edate, k_loc, k_code, k_bid 
FROM kursus
WHERE k_id LIKE '$row[p_kid]'
ORDER BY k_id ASC
";
$result2 = mysql_query($select2) or die("Query failed");
$row2 = mysql_fetch_assoc($result2);

#$_SESSION['k_id'] = $row2['k_id'];
$_GET['kid'] = $row2['k_id'];

$_SESSION['k_name'] = $row2['k_name'];
$_SESSION['k_sdate'] = $row2['k_sdate'];
$_SESSION['k_edate'] = $row2['k_edate'];
$_SESSION['k_loc'] = $row2['k_loc'];
$_SESSION['k_code'] = $row2['k_code'];

$_SESSION['k_sdate'] = date('d-m-Y', strtotime($_SESSION['k_sdate']));
$_SESSION['k_edate'] = date('d-m-Y', strtotime($_SESSION['k_edate']));
$tkhmohon = date('Y-m-d');


$_SESSION['terai_thn'] = date('Y', strtotime($_SESSION['k_edate']));
$_SESSION['terai_bid'] = $row2['k_bid'];

if($numrows == "0"){

	$sql = "INSERT INTO pilih (p_uid, p_kid, p_status, p_tkhmohon) VALUES ('$_SESSION[UsrID]', '$_GET[kid]', '3', '$tkhmohon')";
	$result = mysql_query($sql) or die(mysql_error());
	
	$pid = mysql_insert_id();

	$sql = "INSERT INTO asrama (a_uid, a_kid, a_status) VALUES ('$_SESSION[UsrID]', '$_GET[kid]', '0')";
	$result = mysql_query($sql) or die(mysql_error());
	
	include("mohon_emel_user.php");
	include("mohon_emel_peg.php");
	
	$_SESSION['alert'] = "Terima Kasih kerana memohon berkursus di IPPTAR.<br>Sila semak status permohonan terkini dari masa kesemasa melalui email yang telah didaftarkan ataupun akaun sistem ekursus anda.";
	#$_SESSION['redirek'] = "index.php";
	$_SESSION['redirek'] = "../admin/mohon.php?search=&tahun=".$_SESSION['terai_thn']."&kluster=".$_SESSION['terai_bid']."&kursus=".$_GET['kid']."&submit=Klik";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Mohon Kursus';
	include("kosong.php");
	exit;
	
  }else{
  
  	#$sql = "UPDATE pilih SET p_status='3' WHERE p_id = '$pid'";
  	#$result = mysql_query( $sql );

	include("mohon_emel_user.php");
	include("mohon_emel_peg.php");

   	$_SESSION['alert'] = "Terima Kasih kerana memohon berkursus di IPPTAR.<br>Sila semak status permohonan terkini dari masa kesemasa melalui email yang telah didaftarkan ataupun akaun sistem ekursus anda.";
	#$_SESSION['redirek'] = "index.php";
	$_SESSION['redirek'] = "../admin/mohon.php?search=&tahun=".$_SESSION['terai_thn']."&kluster=".$_SESSION['terai_bid']."&kursus=".$_GET['kid']."&submit=Klik";
	$_SESSION['toplus'] = "";
	$pageTitle =' Mohon Kursus';
	include("kosong.php");
	exit;
	
  }

?>