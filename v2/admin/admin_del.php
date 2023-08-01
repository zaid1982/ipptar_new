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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "admdel") {

	$tkhedit = date('Y-m-d H:i:s');

	/* $sql = "UPDATE admin SET a_status = '3' WHERE a_id = '$_SESSION[aid]'";
	$result = mysql_query($sql) or die(mysql_error()); */

	// add parameterized query
	$result = sqlUpdate(
		'UPDATE admin SET a_status = ? WHERE a_id = ?', 
		array('3', $_SESSION['aid'])
	);

	unset($_SESSION['terai']);

	$_SESSION['alert'] 		= "Proses padam maklumat admin berjaya.";
	$_SESSION['redirek'] 	= "admin_list.php";
	$_SESSION['toplus'] 	= "";
	$pageTitle = 'Kemaskini Admin';
	include("../kosong.php");
	exit;

}else{

#SQL Injection fix
$aid = addslashes($_GET["aid"]);
if (strlen($aid)>11){
exit;
}
$aid = (int)$aid;
	
$select = "
SELECT a_id
FROM admin
WHERE a_id LIKE '$aid'
ORDER BY a_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="admin_list.php">
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<tr><td height="100">&nbsp;</td></tr>
<tr><td align="center" style="font-weight:bold">PADAM MAKLUMAT ADMIN</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">
<input type="hidden" name="terai" id="terai" value="admdel" />
<input type="hidden" name="aid" id="aid" value="<?php print $aid; ?>">
<input type="submit" name="submit" id="submit" value="  PADAM  ">
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>

</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>