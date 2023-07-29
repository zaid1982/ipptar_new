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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "admedit"){
	
$select = "
SELECT *
FROM admin
WHERE a_id LIKE '$_SESSION[aid]'
ORDER BY a_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$numrows = mysql_num_rows($result);

	if($numrows == "1"){

		$sql = "UPDATE admin SET a_pwd = '$_SESSION[pwd]', a_nama = '$_SESSION[nama]', a_tel = '$_SESSION[tel]', a_emel = '$_SESSION[emel]', a_level = '$_SESSION[level]' WHERE a_id = '$_SESSION[aid]'";
		$result = mysql_query($sql) or die(mysql_error());
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Kemaskini admin berjaya.";
		$_SESSION['redirek'] = "admin_list.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Kemaskini Admin';
		include("../kosong.php");
		exit;
		
	}else{
		
		$sql = "INSERT INTO admin (a_pwd,a_idnum,a_nama,a_tel,a_emel,a_level)
		VALUES ('$_SESSION[pwd]', '$_SESSION[idnum]', '$_SESSION[nama]', '$_SESSION[tel]', '$_SESSION[emel]', '$_SESSION[level]')";
		$result = mysql_query($sql) or die(mysql_error());
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Tambah admin berjaya.";
		$_SESSION['redirek'] = "admin_list.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Kemaskini Admin';
		include("../kosong.php");
		exit;
		
	}
	
}else{	
	
#SQL Injection fix
$aid = addslashes($_GET["aid"]);
if (strlen($aid)>11){
exit;
}
$aid = (int)$aid;
	
$select = "
SELECT *
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7">
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center" style="font-weight:bold">KEMASKINI MAKLUMAT ADMIN</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td align="right" width="20%">No K/P Baru</td>
<td> : </td>
<td><input type="text" name="idnum" id="idnum" value="<?php print $row['a_idnum'] ?>" size="12" maxlength="12" required></td>
</tr>
<tr>
<td align="right">Kata Laluan</td>
<td> : </td>
<td><input type="password" name="pwd" id="pwd" value="<?php print $row['a_pwd'] ?>" size="40"></td>
</tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td><input type="text" name="nama" id="nama" value="<?php print $row['a_nama'] ?>" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">No Telefon Bimbit</td>
<td> : </td>
<td><input type="text" name="tel" id="tel" value="<?php print $row['a_tel'] ?>" size="15" maxlength="11" onchange="javascript:this.value=this.value.toUpperCase()" onkeyup="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td><input type="email" name="emel" id="emel" value="<?php print $row['a_emel'] ?>" size="40"></td>
</tr>

<tr>
<td align="right">Level</td>
<td> : </td>
<td>
<select name="level" required>
<option value="" disabled selected>level</option>
<?php
$sqlm01 = "SELECT * FROM level ORDER BY l_id ASC";	
$resultm01 = mysql_query($sqlm01) or die(mysql_error());

while ($rowm01 = mysql_fetch_assoc($resultm01)) {
if($rowm01['l_id'] == $row['a_level']){
	$tunjukm01 = "selected";
}else{
	$tunjukm01 = "";
}
print "<option value='$rowm01[l_id]' $tunjukm01>$rowm01[l_name]</option>";
}
?>
</select>
</td>
</tr>

<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="admedit" />
<input type="hidden" name="aid" id="aid" value="<?php print $aid; ?>">
<input type="submit" name="button" id="button" value="  HANTAR  ">&nbsp;
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>