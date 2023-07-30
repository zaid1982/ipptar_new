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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "mohedit"){

$_SESSION['k_sdate'] = date('d-m-Y', strtotime($_SESSION['k_sdate']));
$_SESSION['k_edate'] = date('d-m-Y', strtotime($_SESSION['k_edate']));
$tkhlulus = date('Y-m-d');
$tkhedit = date('Y-m-d H;i;s');

#$sql = "UPDATE pilih SET p_status = '$_SESSION[status]', p_tkhlulus = '$tkhlulus' WHERE p_id = '$_SESSION[pid]'";
#$result = mysql_query($sql) or die(mysql_error());

#$sql = "INSERT INTO pilih_log (p_status, p_tkhlulus, p_id, p_aid, p_aname, p_tkhedit, p_action) VALUES ('$_SESSION[status]', '$tkhlulus', '$_SESSION[pid]', '$_SESSION[MyID]', '$_SESSION[MyNama]', '$tkhedit', 'Status Mohon' )";
#$result = mysql_query($sql) or die(mysql_error());

if($_SESSION['status'] == '5'){
include("mohon_emel_lulus.php");
//include("e.php");
}elseif($_SESSION['status'] == '6'){
include("mohon_emel_gagal.php");
}else{}

unset($_SESSION['terai']);


if($_SESSION['xxx'] != "ok"){

$sql = "UPDATE pilih SET p_status = '$_SESSION[status]', p_tkhlulus = '$tkhlulus' WHERE p_id = '$_SESSION[pid]'";
$result = mysql_query($sql) or die(mysql_error());

$sql = "INSERT INTO pilih_log (p_status, p_tkhlulus, p_id, p_aid, p_aname, p_tkhedit, p_action)
		VALUES ('$_SESSION[status]', '$tkhlulus', '$_SESSION[pid]', '$_SESSION[MyID]', '$_SESSION[MyNama]', '$tkhedit', 'Status Mohon' )";
$result = mysql_query($sql) or die(mysql_error());

$_SESSION['alert'] = "Kemaskini berjaya.";
}else{
$_SESSION['alert'] = "Kemaskini tidak berjaya. Sila cuba sebentar lagi.";
}
$_SESSION['redirek'] = "mohon.php?".$_SESSION['qstr'];
$_SESSION['toplus'] = "";
$pageTitle = 'Kemaskini Permohonan';
include("../kosong.php");
exit;

}else{

#SQL Injection fix
$pid = addslashes($_GET["pid"]);
if (strlen($pid)>11){
exit;
}
$pid = (int)$pid;
	
$select = "
SELECT *
FROM pilih a, user b, kursus c
WHERE a.p_uid = b.u_id AND a.p_kid = c.k_id AND p_id LIKE '$pid'
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
<tr><td align="center" style="font-weight:bold">KEMASKINI STATUS PEMOHON</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">Status :
<select name="status">
<?php  	
$sqls = "SELECT * FROM status WHERE s_id IN ('3','4','13','5','6') ORDER BY s_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
if($rows['s_id'] == $row['p_status']){
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
<input type="hidden" name="pid" id="pid" value="<?php print $pid; ?>">
<input type="hidden" name="u_kemel" id="u_kemel" value="<?php print $row['u_kemel']; ?>">
<input type="hidden" name="u_knama" id="u_knama" value="<?php print $row['u_knama']; ?>">
<input type="hidden" name="u_emel" id="u_emel" value="<?php print $row['u_emel']; ?>">
<input type="hidden" name="u_nama" id="u_nama" value="<?php print $row['u_nama']; ?>">
<input type="hidden" name="k_name" id="k_name" value="<?php print $row['k_name']; ?>">
<input type="hidden" name="k_sdate" id="k_sdate" value="<?php print $row['k_sdate']; ?>">
<input type="hidden" name="k_edate" id="k_edate" value="<?php print $row['k_edate']; ?>">
<input type="hidden" name="k_loc" id="k_loc" value="<?php print $row['k_loc']; ?>">
<input type="hidden" name="k_loc" id="k_loc" value="<?php print $row['k_loc']; ?>">
<input type="hidden" name="terai" id="terai" value="mohedit" />
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