<?php session_start(); ?>
<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript">
function showhideremark(obj) {
var txt = document.getElementById('k_status').options[document.getElementById('k_status').options.selectedIndex].value;
if ( txt == '14' ) {
document.getElementById('k_remark').disabled = false;
}else{
document.getElementById('k_remark').disabled = true;
}
}
</script>
</head>
<body>
<div id="container2">
<?php
include("../conn.php");

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "kurdel"){

$sql = "DELETE FROM kursus WHERE k_id = '$_SESSION[kid]'";
$result = mysql_query($sql) or die(mysql_error());

$tkhdel = date('Y-m-d H:i:s');

$sql = "INSERT INTO kursus_log (kid, date, status, uid, uname)
	VALUES ('$_SESSION[kid]', '$tkhdel', 'Delete', '$_SESSION[MyID]', '$_SESSION[MyNama]' )";
$result = mysql_query($sql) or die(mysql_error());

	unset($_SESSION['terai']);

	$_SESSION['alert'] = "Rekod kursus telah berjaya dihapus.";
	$_SESSION['redirek'] = "katalog.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Hapus Kursus';
	include("../kosong.php");
	exit;

}elseif(isset($_SESSION['terai']) && $_SESSION['terai'] == "kuredit"){

$sdate = $_SESSION['st']."-".$_SESSION['sm']."-".$_SESSION['sh'];
$edate = $_SESSION['et']."-".$_SESSION['em']."-".$_SESSION['eh'];
	
#ckh wlkin reg
#print "xxx".$_SESSION['k_wlkin'];
if(isset($_SESSION['k_wlkin'])){
	$wlkin = "1";
}else{
	$wlkin = "0";
}

$sql = "UPDATE kursus SET k_code = '$_SESSION[k_code]', k_name = '$_SESSION[k_name]', k_obj = '$_SESSION[k_obj]', k_loc = '$_SESSION[k_loc]', k_duration = '$_SESSION[k_duration]', k_sdate = '$sdate', k_edate = '$edate', k_fee = '$_SESSION[k_fee]', k_terms = '$_SESSION[k_terms]', k_status = '$_SESSION[k_status]', k_remark = '$_SESSION[k_remark]', k_aid = '$_SESSION[k_aid]', k_wlkin = '$wlkin' WHERE k_id = '$_SESSION[kid]'";
$result = mysql_query($sql) or die(mysql_error());

$tkhupd = date('Y-m-d H:i:s');

$sql = "INSERT INTO kursus_log (kid, date, status, uid, uname)
	VALUES ('$_SESSION[kid]', '$tkhupd', 'Update', '$_SESSION[MyID]', '$_SESSION[MyNama]' )";
$result = mysql_query($sql) or die(mysql_error());

	unset($_SESSION['terai']);

	$_SESSION['alert'] = "Kemaskini berjaya.";
	$_SESSION['redirek'] = "katalog.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kemaskini Kursus';
	include("../kosong.php");
	exit;

}else{
	
#SQL Injection fix
$kid = addslashes($_GET['kid']);
if (strlen($kid)>11){
exit;
}
$kid = (int)$kid;
	
$select = "
SELECT *
FROM kursus
WHERE k_id LIKE '$kid'
ORDER BY k_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="katalog.php">
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<tr><td colspan="3" align="center" style="font-weight:bold">KEMASKINI MAKLUMAT KURSUS</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<!--
<tr>
<td align="right" width="15%">Kod</td>
<td> : </td>
<td><input type="text" name="k_code" id="k_code" value="<?php print $row['k_code'] ?>" size="10"></td>
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
<td>
<textarea id="k_obj" name="k_obj" cols="60" rows="5"><?php print $row['k_obj']?></textarea>
<!--&nbsp;<div class="editor" id="k_obj" name="k_obj"><?php print $row['k_obj']?></div>-->
</td>
</tr>
<tr>
<td align="right">Lokasi</td>
<td> : </td>
<td><input type="text" name="k_loc" id="k_loc" value="<?php print $row['k_loc'] ?>" size="20"></td>
</tr>
<tr>
<td align="right">Bayaran (RM)</td>
<td> : </td>
<td><input type="text" name="k_fee" id="k_fee" value="<?php print $row['k_fee'] ?>" size="5"></td>
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
$sqlst = "SELECT * FROM tahun WHERE t_name >= '2016' ORDER BY t_id ASC";	
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
if($rowem['m_code'] == $ebulan){
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
$sqlet = "SELECT * FROM tahun WHERE t_name >= '2016' ORDER BY t_id ASC";	
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
&nbsp;&nbsp;
<?php
if($row['k_wlkin'] == "1"){
	$tunjuks = "checked";
}else{
	$tunjuks = "";
}
?>
<input type="checkbox" name="k_wlkin" value="1" <?php print $tunjuks; ?>>&nbsp;Walk-In Registration
</td>
</tr>

<tr>
<td align="right">Remark</td>
<td> : </td>
<td><input type="text" name="k_remark" id="k_remark" disabled="true" size="70" /></td>
</tr>

<tr>
<td align="right">Penyelaras Bertugas</td>
<td> : </td>
<td>
<select name="k_aid" id="k_aid" onchange="showhideremark(this)">
<?php  
if($_SESSION[MyLevel] == "1"){
	$chklvl = "a_level IN ('1','2','3','4')";
}else{
	$chklvl = "a_level = '$_SESSION[MyLevel]'";
}
$sqls = "SELECT * FROM admin WHERE $chklvl ORDER BY a_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
if($rows['a_id'] == $row['k_aid']){
	$tunjuks = "selected";
}else{
	$tunjuks = "";
}
print "<option value='$rows[a_id]' id='$rows[a_id]' $tunjuks>$rows[a_nama]</option>";
}
?>
</select>
</td>
</tr>

<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="kid" id="kid" value="<?php print $kid; ?>">
<input type="hidden" name="terai" id="terai" value="kuredit" />
<input type="submit" name="submit" id="submit" value="  KEMASKINI  ">
<!--input type="button" name="button1" id="button1" value="  DELETE  " onclick="location.href='http://google.com';window.close()"-->
<button type="submit" name="delete" formaction="katalog.php?terai=kurdel">DELETE</button>
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container-->

<script src="../editor/build/ckeditor.js"></script>
<script>
	ClassicEditor
	.create( document.querySelector( '#k_obj' ), {		
		licenseKey: '',						
	} )
	.then( editor => {
		window.editor = editor;	
	} );
</script>
<script>
	ClassicEditor
	.create( document.querySelector( '#k_terms' ), {		
		licenseKey: '',						
	} )
	.then( editor => {
		window.editor = editor;	
	} );
</script>

<?php include("bottom.php"); ?>