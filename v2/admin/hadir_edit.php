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

$qstr=$_SERVER['QUERY_STRING'];

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "haredit"){

$tkhedit = date('Y-m-d H:i:s');

$sql = "UPDATE pilih SET p_hadir = '$_SESSION[status]' WHERE p_id = '$_SESSION[pid]'";
$result = mysql_query($sql) or die(mysql_error());

$sql = "INSERT INTO pilih_log (p_hadir, p_id, p_aid, p_aname, p_tkhedit, p_action)
		VALUES ('$_SESSION[status]', '$_SESSION[pid]', '$_SESSION[MyID]', '$_SESSION[MyNama]', '$tkhedit', 'Status Kehadiran' )";
$result = mysql_query($sql) or die(mysql_error());

	unset($_SESSION['terai']);

	$_SESSION['alert'] = "Kemaskini berjaya.";
	$_SESSION['redirek'] = "mohon.php?".$_SESSION['qstr'];
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kemaskini Permohonan';
	include("../kosong.php");
	exit;

}else{

#SQL Injection fix
$pid = $_GET["pid"];
if (strlen($pid)>11){
exit;
}
$pid = (int)$pid;
	
$select = "
SELECT p_hadir
FROM pilih
WHERE p_id LIKE '$pid'
ORDER BY p_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="mohon.php">
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<tr><td height="100">&nbsp;</td></tr>
<tr><td align="center" style="font-weight:bold">KEMASKINI KEHADIRAN PESERTA KURSUS</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">Status :
<select name="status">
<?php  	
$sqls = "SELECT * FROM status WHERE s_id IN ('9','10') ORDER BY s_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
if($rows['s_id'] == $row['p_hadir']){
	$tunjuks = "selected";
}else{
	$tunjuks = "";
}
print "<option value='$rows[s_id]' $tunjuks>$rows[s_name]</option>";
}
?>
</select>
</td>
</tr>

<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">
<input type="hidden" name="terai" id="terai" value="haredit" />
<input type="hidden" name="pid" id="pid" value="<?php print $pid; ?>">
<input type="hidden" name="qstr" id="qstr" value="<?php print $qstr; ?>">
<input type="submit" name="submit" id="submit" value="  KEMASKINI  ">
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>

</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>