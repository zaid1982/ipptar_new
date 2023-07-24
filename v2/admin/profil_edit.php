<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="data/favicon.ico" >
<link rel="icon" type="image/gif" href="data/animated_favicon1.gif" >
<title>Status Permohonan</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/subModal.css" />
<script type="text/javascript" src="../css/subModal.js"></script>
</head>
<body>
<div id="container2">
<?php
#include("header.php");
include("../conn.php");

if(isset($_POST['submit'])){

$sql = "UPDATE user SET u_status = '$_POST[status]' WHERE u_id = '$_POST[uid]'";
$result = mysql_query($sql) or die(mysql_error());

	$_SESSION['alert'] = "Kemaskini berjaya.";
	$_SESSION['redirek'] = "profil_list.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Kemaskini Pemohon';
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

if($row['u_status'] == "AKTIF"){
	$pilih01 = "selected";
	$pilih02 = "";
	$pilih03 = "";
}elseif($row['u_status'] == "TIDAK AKTIF"){
	$pilih01 = "";
	$pilih02 = "selected";
	$pilih03 = "";
}else{
	$pilih01 = "";
	$pilih02 = "";
	$pilih03 = "selected";
}

}
?>
<div id="content"> 

<form id="form1" name="form1" method="post" action="">
<table align="center" width="90%" border="0" cellpadding="0" cellspacing="7">
<tr><td>&nbsp;</td></tr>
<tr><td align="center" style="font-weight:bold">KEMASKINI MAKLUMAT PEMOHON</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">Status :
<select name="status">
<option value="" <?php print $pilih03 ?>>---</option>
<option value="AKTIF" <?php print $pilih01 ?>>AKTIF</option>
<option value="TIDAK AKTIF" <?php print $pilih02 ?>>TIDAK AKTIF</option>
</select>
</td>
</tr>

<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">
<input type="hidden" name="uid" id="uid" value="<?php print $uid; ?>">
<input type="submit" name="submit" id="submit" value="  KEMASKINI  ">
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>

</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bott