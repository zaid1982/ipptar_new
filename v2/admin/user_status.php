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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "usrstat"){

$uid = (int)$_SESSION['uid'];

$sql = "UPDATE user SET u_status = '$_SESSION[status]' WHERE u_id = '$uid'";
$result = mysql_query($sql) or die(mysql_error());

	unset($_SESSION['terai']);

	$_SESSION['alert'] = "Kemaskini user berjaya.";
	$_SESSION['redirek'] = "user_list.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kemaskini User';
	include("../kosong.php");
	exit;

}else{

#SQL Injection fix
$uid = $_GET["uid"];
if (strlen($uid)>11){
exit;
}
$uid = (int)$uid;
	
$select = "
SELECT u_status
FROM user
WHERE u_id LIKE '$uid'
ORDER BY u_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="user_list.php">
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<tr><td height="100">&nbsp;</td></tr>
<tr><td align="center" style="font-weight:bold">KEMASKINI STATUS USER</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">Status :
<select name="status">
<?php  	
$sqls = "SELECT * FROM status WHERE s_id IN ('1','2','15') ORDER BY s_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
if($rows['s_id'] == $row['u_status']){
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
<input type="hidden" name="terai" id="terai" value="usrstat" />
<input type="hidden" name="uid" id="uid" value="<?php print $uid; ?>">
<input type="submit" name="submit" id="submit" value="  KEMASKINI  ">
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>

</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>