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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "kurnew"){

$sdate = $_SESSION['st']."-".$_SESSION['sm']."-".$_SESSION['sh'];
$edate = $_SESSION['et']."-".$_SESSION['em']."-".$_SESSION['eh'];
	
#ckh wlkin reg
if(isset($_SESSION['k_wlkin'])){
	$wlkin = "1";
}else{
	$wlkin = "0";
}

$sql = "INSERT INTO kursus(k_code,k_name,k_obj,k_loc,k_duration,k_sdate,k_edate,k_bid,k_fee,k_terms,k_status,k_aid,k_wlkin)
VALUES ('$_SESSION[k_code]','$_SESSION[k_name]','$_SESSION[k_obj]','$_SESSION[k_loc]','$_SESSION[k_duration]','$sdate','$edate','$_SESSION[k_bid]','$_SESSION[k_fee]','$_SESSION[k_terms]','$_SESSION[k_status]','$_SESSION[k_aid]','$wlkin')";
$result = mysql_query($sql) or die(mysql_error());

$kID = mysql_insert_id();
$tkhins = date('Y-m-d H:i:s');

$sql = "INSERT INTO kursus_log (kid, date, status, uid, uname)
	VALUES ('$kID', '$tkhins', 'Insert', '$_SESSION[MyID]', '$_SESSION[MyNama]' )";
$result = mysql_query($sql) or die(mysql_error());

	unset($_SESSION['terai']);

	$_SESSION['alert'] = "Tambah kursus baru berjaya.";
	$_SESSION['redirek'] = "katalog.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kursus Baru';
	include("../kosong.php");
	exit;

}else{}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="katalog.php">
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<tr><td colspan="3" align="center" style="font-weight:bold">MAKLUMAT KURSUS BARU</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<!--
<tr>
<td align="right" width="15%">Kod</td>
<td> : </td>
<td><input type="text" name="k_code" id="k_code" value="<?php print $row['k_code'] ?>" size="10"></td>
</tr>
-->

<tr>
<td align="right">Kluster</td>
<td> : </td>
<td>
<select name="k_bid" id="k_bid">
<?php
if($_SESSION['MyLevel'] == "1" || $_SESSION['MyLevel'] == "5"){
	$lvl = "WHERE b_id < '15'";
}elseif($_SESSION['MyLevel'] == "2"){
	$lvl = "WHERE b_id = '1'";
}elseif($_SESSION['MyLevel'] == "3"){
	$lvl = "WHERE b_id = '2'";
}elseif($_SESSION['MyLevel'] == "4"){
	$lvl = "WHERE b_id = '3'";


}elseif($_SESSION['MyLevel'] == "6"){
	$lvl = "WHERE b_id = '4'";
}elseif($_SESSION['MyLevel'] == "7"){
	$lvl = "WHERE b_id = '5'";
}elseif($_SESSION['MyLevel'] == "8"){
	$lvl = "WHERE b_id = '6'";
}elseif($_SESSION['MyLevel'] == "9"){
	$lvl = "WHERE b_id = '7'";
}elseif($_SESSION['MyLevel'] == "10"){
	$lvl = "WHERE b_id = '8'";
}elseif($_SESSION['MyLevel'] == "11"){
	$lvl = "WHERE b_id = '9'";
}elseif($_SESSION['MyLevel'] == "12"){
	$lvl = "WHERE b_id = '10'";
}elseif($_SESSION['MyLevel'] == "13"){
	$lvl = "WHERE b_id = '11'";
}else{
	$lvl = "WHERE b_id = '4'";
}

$sqls = "SELECT * FROM kluster $lvl ORDER BY b_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
print "<option value='$rows[b_id]' id='$rows[b_id]'>$rows[b_name]</option>";
}
?>
</select>
</td>
</tr>
<!--<tr>
<td align="right">Kod Kursus</td>
<td> : </td>
<td><input type="text" name="k_code" id="k_code" value="<?php print $row['k_code'] ?>" size="70"></td>
</tr>
-->
<tr>
<td align="right" width="15%">Kursus</td>
<td> : </td>
<td><input type="text" name="k_name" id="k_name" value="<?php print $row['k_name'] ?>" size="70"></td>
</tr>
<tr>
<td align="right">Objektif</td>
<td> : </td>
<td>&nbsp;<textarea id="k_obj" name="k_obj" cols="60" rows="5"><?php print $row['k_obj']?></textarea></td>
</tr>
<tr>
<td align="right">Lokasi</td>
<td> : </td>
<td><input type="text" name="k_loc" id="k_loc" value="<?php print $row['k_loc'] ?>" size="20"></td>
</tr>
<tr>
<td align="right">Yuran(RM)</td>
<td> : </td>
<td><input type="text" name="k_fee" id="k_fee" value="<?php print $row['k_fee'] ?>" size="5"> <i>bayaran adalah secara online</i></td>
</tr>
<tr>
<td align="right">Jangkamasa</td>
<td> : </td>
<td><input type="text" name="k_duration" id="k_duration" value="<?php print $row['k_duration'] ?>" size="1"></td>
</tr>
<tr>
<td align="right">Tarikh Mula</td>
<td> : </td>
<td>
<?php 
$pieces01 = explode("-", $row['k_sdate']);
$stahun = $pieces01[0];
$sbulan = $pieces01[1];
$shari = substr($pieces01[2],0,2);
?>
<select name="sh">
<option value="" disabled selected>hari</option>
<?php
$sqlsh = "SELECT * FROM hari ORDER BY h_id ASC";	
$resultsh = mysql_query($sqlsh) or die(mysql_error());

while ($rowsh = mysql_fetch_assoc($resultsh)) {
if($rowsh['h_name'] == $shari){
	$tunjuksh = "selected";
}else{
	$tunjuksh = "";
}
print "<option value='$rowsh[h_name]' $tunjuksh>$rowsh[h_name]</option>";
}
?>
</select>
<select name="sm">
<option value="" disabled selected>bulan</option>
<?php
$sqlsm = "SELECT * FROM bulan ORDER BY m_id ASC";	
$resultsm = mysql_query($sqlsm) or die(mysql_error());

while ($rowsm = mysql_fetch_assoc($resultsm)) {
if($rowsm['m_code'] == $sbulan){
	$tunjuksm = "selected";
}else{
	$tunjuksm = "";
}
print "<option value='$rowsm[m_code]' $tunjuksm>$rowsm[m_name]</option>";
}
?>
</select>
<select name="st">
<option value="" disabled selected>tahun</option>
<?php
$sqlst = "SELECT * FROM tahun WHERE t_name >= '2019' ORDER BY t_id ASC";	
$resultst = mysql_query($sqlst) or die(mysql_error());

while ($rowst = mysql_fetch_assoc($resultst)) {
if($rowst['t_name'] == $stahun){
	$tunjukst = "selected";
}else{
	$tunjukst = "";
}
print "<option value='$rowst[t_name]' $tunjukst>$rowst[t_name]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">Tarikh Tamat</td>
<td> : </td>
<td>
<?php 
$pieces02 = explode("-", $row['k_edate']);
$etahun = $pieces02[0];
$ebulan = $pieces02[1];
$ehari = substr($pieces02[2],0,2);
?>
<select name="eh">
<option value="" disabled selected>hari</option>
<?php
$sqleh = "SELECT * FROM hari ORDER BY h_id ASC";	
$resulteh = mysql_query($sqleh) or die(mysql_error());

while ($roweh = mysql_fetch_assoc($resulteh)) {
if($roweh['h_name'] == $ehari){
	$tunjukeh = "selected";
}else{
	$tunjukeh = "";
}
print "<option value='$roweh[h_name]' $tunjukeh>$roweh[h_name]</option>";
}
?>
</select>
<select name="em">
<option value="" disabled selected>bulan</option>
<?php
$sqlem = "SELECT * FROM bulan ORDER BY m_id ASC";	
$resultem = mysql_query($sqlem) or die(mysql_error());

while ($rowem = mysql_fetch_assoc($resultem)) {
if($rowem['m_code'] == $sbulan){
	$tunjukem = "selected";
}else{
	$tunjukem = "";
}
print "<option value='$rowem[m_code]' $tunjukem>$rowem[m_name]</option>";
}
?>
</select>
<select name="et">
<option value="" disabled selected>tahun</option>
<?php
$sqlet = "SELECT * FROM tahun WHERE t_name >= '2019' ORDER BY t_id ASC";	
$resultet = mysql_query($sqlet) or die(mysql_error());

while ($rowet = mysql_fetch_assoc($resultet)) {
if($rowet['t_name'] == $etahun){
	$tunjuket = "selected";
}else{
	$tunjuket = "";
}
print "<option value='$rowet[t_name]' $tunjuket>$rowet[t_name]</option>";
}
?>
</select>
</td>
</tr>
<!--
<tr>
<td align="right">Masa</td>
<td> : </td>
<td><input type="text" name="k_time" id="k_time" value="<?php print $row['k_time'] ?>" size="10"></td>
</tr>
-->
<tr>
<td align="right">Terma</td>
<td> : </td>
<td>&nbsp;<textarea id="k_terms" name="k_terms" cols="60" rows="5"><?php print $row['k_terms']?></textarea></td>
</tr>
<tr>
<td align="right">Status</td>
<td> : </td>
<td>
<select name="k_status" id="k_status" onchange="showhideremark(this)">
<?php  	
$sqls = "SELECT * FROM status WHERE s_id IN ('7','8','14') ORDER BY s_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
if($rows['s_id'] == $row['k_status']){
	$tunjuks = "selected";
}else{
	$tunjuks = "";
}
print "<option value='$rows[s_id]' id='$rows[s_id]' $tunjuks>$rows[s_name]</option>";
}
?>
</select>
</td>
</tr>

<tr>
<td align="right">Penyelaras</td>
<td> : </td>
<td>

<select name="k_aid" id="k_aid">
<?php  	
//$sqls = "SELECT * FROM admin  WHERE a_level = '$_SESSION[MyLevel]' ORDER BY a_id ASC";	
$sqls = "SELECT * FROM admin  WHERE a_status = '1' ORDER BY a_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
print "<option value='$rows[a_id]' id='$rows[a_id]'>$rows[a_nama]</option>";
}
?>
</select>
</td>
</tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="kurnew" />
<input type="submit" name="submit" id="submit" value="  TAMBAH  ">
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>