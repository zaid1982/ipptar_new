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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "admstat"){

	$aid = (int)$_SESSION['aid'];

	/* $sql = "UPDATE admin SET a_status = '$_SESSION[status]' WHERE a_id = '$aid'";
	$result = mysql_query($sql) or die(mysql_error()); */

	// add parameterized query
	$result = sqlUpdate(
		'UPDATE admin SET a_status = ? WHERE a_id = ?', 
		array($_SESSION['status'], $aid)
	);

	unset($_SESSION['terai']);

	$_SESSION['alert'] 		= "Kemaskini berjaya.";
	$_SESSION['redirek'] 	= "admin_list.php";
	$_SESSION['toplus'] 	= "";
	$pageTitle = 'Kemaskini Admin';
	include("../kosong.php");
	exit;

} else {

#SQL Injection fix
$aid = addslashes($_GET["aid"]);
if (strlen($aid)>11) {
	exit;
}
$aid = (int)$aid;
	
/* $select = "
SELECT a_status
FROM admin
WHERE a_id LIKE '$aid'
ORDER BY a_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result); */

// add parameterized query
$row = sqlSelect(
	'SELECT a_status FROM admin WHERE a_id LIKE ? ORDER BY a_id ASC', 
	array($aid)
);

}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="admin_list.php">
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<tr><td height="100">&nbsp;</td></tr>
<tr><td align="center" style="font-weight:bold">KEMASKINI STATUS ADMIN</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">Status :
<select name="status">
<?php  	
$sqls = "SELECT * FROM status WHERE s_id IN ('1','2') ORDER BY s_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
if($rows['s_id'] == $row['a_status']){
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
<input type="hidden" name="terai" id="terai" value="admstat" />
<input type="hidden" name="aid" id="aid" value="<?php print $aid; ?>">
<input type="submit" name="submit" id="submit" value="  KEMASKINI  ">
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>

</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>