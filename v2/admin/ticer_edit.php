<?php session_start(); ?>
<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="container2">
<?php
include("../conn.php");

#SQL Injection fix
$adm = addslashes($_GET["adm"]);
if (strlen($adm)>11){
exit;
}
$adm = (int)$adm;

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "ticedit"){
	
$key = $_SESSION['kodrawak']; 
$number = $_SESSION['vercode'];
# start captcha
if(($number!=$key)||($number=="")){
	
	session_destroy();
			
	$_SESSION['alert'] = "Kod tidak valid. Sila cuba sekali lagi.";
	$_SESSION['redirek'] = "ticer_list.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kemaskini Pengajar';
	include("../kosong.php");
	exit;
	
} else {}
# end captcha	

$select = "
SELECT *
FROM ticer
WHERE t_id LIKE '$_SESSION[tid]'
ORDER BY t_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$numrows = mysql_num_rows($result);

	if($numrows == "1"){

		$sql = "UPDATE ticer SET t_nama = '$_SESSION[nama]', t_kid = '$_SESSION[kursus]' WHERE t_id = '$_SESSION[tid]'";
		$result = mysql_query($sql) or die(mysql_error());
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Kemaskini maklumat pengajar berjaya.";
		$_SESSION['redirek'] = "ticer_list.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Kemaskini Pengajar';
		include("../kosong.php");
		exit;
		
	}else{
		
		$sql = "INSERT INTO ticer (t_nama,t_kid)
		VALUES ('$_SESSION[nama]', '$_SESSION[kid]')";
		$result = mysql_query($sql) or die(mysql_error());
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Tambah pengajar baru telah berjaya.";
		$_SESSION['redirek'] = "ticer_list.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Tambah Pengajar Baru';
		include("../kosong.php");
		exit;
		
	}
	
}elseif(isset($adm) && $adm == "1"){
	
	$row['t_id'] = "";
	$row['t_nama'] = "";
	$row['t_kid'] = "";
		
}else{	
	
$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.

if($_SESSION['MyLevel'] == "1" && $_SESSION['MyLevel'] == "5"){
	$lvl = "k_bid < '4'";
}elseif($_SESSION['MyLevel'] == "2"){
	$lvl = "k_bid = '1'";
}elseif($_SESSION['MyLevel'] == "3"){
	$lvl = "k_bid = '2'";
}else{
	$lvl = "k_bid = '3'";
}

#SQL Injection fix
$tid = addslashes($_GET["tid"]);
if (strlen($tid)>11){
exit;
}
$tid = (int)$tid;
	
$select = "
SELECT *
FROM ticer a, kursus b
WHERE a.t_kid = b.k_id AND a.t_id LIKE '$tid' AND b.$lvl
ORDER BY a.t_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="misc.php">
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<tr><td height="100">&nbsp;</td></tr>
<tr><td align="center" style="font-weight:bold">KEMASKINI MAKLUMAT PENGAJAR</td></tr>
<tr><td >&nbsp;</td></tr>

<tr>
<td align="center">Nama : <input type="text" name="nama" id="nama" value="<?php print $row['t_nama'] ?>" size="54" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="center">Kursus : 
<select name="kursus">
<?php  	
$sqls = "SELECT * FROM kursus WHERE $lvl ORDER BY k_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
if($rows['k_id'] == $row['t_kid']){
	$tunjuks = "selected";
}else{
	$tunjuks = "";
}
print "<option value='$rows[k_id]' $tunjuks>$rows[k_name]</option>";
}
?>
</select>
</td>
</tr>

<tr><td>&nbsp;</td></tr>
<tr><td align="center"><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value="<?php print $rawak ?>" readonly="true" style="font-family:comic sans ms; font-size:25px; font-style:italic; color:black; border:0;  text-align:center" size="9" disabled></td></tr>
<tr><td align="center">Sila taip kembali kod seperti di atas.<br /><input name="vercode" type="text" maxlength="6" placeholder="Code" required /></td></tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td align="center">
<input type="hidden" name="terai" id="terai" value="ticedit" />
<input type="hidden" name="tid" id="tid" value="<?php print $tid; ?>">
<input type="submit" name="button" id="button" value="  HANTAR  ">&nbsp;
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>