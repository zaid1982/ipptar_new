<?php
#edit
session_start();
?>
<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="container2">
<?php
include("../conn.php");

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "usredit") {
	
	$key 		= $_SESSION['kodrawak']; 
	$number = $_SESSION['vercode'];
	# start captcha
	if(($number!=$key) || ($number=="")) {
		
		session_destroy();
				
		$_SESSION['alert'] 		= "Kod tidak valid. Sila cuba sekali lagi.";
		$_SESSION['redirek'] 	= "user_list.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle = 'Kemaskini User';
		include("../kosong.php");
		exit;
		
	} else {}
	# end captcha	

	/* $select = "
	SELECT *
	FROM user
	WHERE u_id LIKE '$_SESSION[uid]'
	ORDER BY u_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result);
	$numrows = mysql_num_rows($result); */

	// add parameterized query
	$row = sqlSelect(
		'SELECT * FROM user WHERE u_id LIKE ? ORDER BY u_id ASC', 
		array($_SESSION['uid'])
	);
	$rowCount	= sqlSelect(
		'SELECT count(*) AS total FROM user WHERE u_id LIKE ? ORDER BY u_id ASC', 
		array($_SESSION['uid'])
	);

	// if($numrows == "1"){
	if ($rowCount['total'] == 1) {

		/* $sql = "UPDATE user SET u_pwd = '$_SESSION[pwd]', u_idnum = '$_SESSION[idnum]', u_nama = '$_SESSION[nama]', u_tel = '$_SESSION[tel]', u_emel = '$_SESSION[emel]' WHERE u_id = '$_SESSION[uid]'";
		$result = mysql_query($sql) or die(mysql_error()); */

		// add parameterized query
		$result = sqlUpdate(
			'UPDATE user SET u_pwd = ?, u_idnum = ?, u_nama = ?, u_tel = ?, u_emel = ? WHERE u_id = ?', 
			array(
				$_SESSION['pwd'], 
				$_SESSION['idnum'], 
				$_SESSION['nama'], 
				$_SESSION['tel'],
				$_SESSION['emel'],
				$_SESSION['uid']
			)
		);
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] = "Kemaskini user berjaya.";
		$_SESSION['redirek'] = "user_list.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Kemaskini User';
		include("../kosong.php");
		exit;
		
	}else{
		
		/* $sql = "INSERT INTO user (u_pwd,u_idnum,u_nama,u_tel,u_emel)
		VALUES ('$_SESSION[pwd]', '$_SESSION[idnum]', '$_SESSION[nama]', '$_SESSION[tel]', '$_SESSION[emel]')";
		$result = mysql_query($sql) or die(mysql_error()); */

		// add parameterized query
		$result = sqlInsert(
			'INSERT INTO user (u_pwd, u_idnum, u_nama, u_tel, u_emel) VALUES (?, ?, ?, ?, ?)', 
			array(
				$_SESSION['pwd'], 
				$_SESSION['idnum'], 
				$_SESSION['nama'], 
				$_SESSION['tel'], 
				$_SESSION['emel']
			)
		);
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] 		= "Tambah user berjaya.";
		$_SESSION['redirek'] 	= "user_list.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle = 'Kemaskini User';
		include("../kosong.php");
		exit;
		
	}
	
}else{	
	
$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.

#SQL Injection fix
$uid = addslashes($_GET["uid"]);
if (strlen($uid)>11){
exit;
}
$uid = (int)$uid;
	
$select = "
SELECT *
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7">
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center" style="font-weight:bold">KEMASKINI MAKLUMAT USER</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td align="right" width="20%">No K/P Baru</td>
<td> : </td>
<td><input type="text" name="idnum" id="idnum" value="<?php print $row['u_idnum'] ?>" size="12" maxlength="12" required></td>
</tr>
<tr>
<td align="right">Kata Laluan</td>
<td> : </td>
<td><input type="password" name="pwd" id="pwd" value="<?php print $row['u_pwd'] ?>" size="40"></td>
</tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td><input type="text" name="nama" id="nama" value="<?php print $row['u_nama'] ?>" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">No Telefon Bimbit</td>
<td> : </td>
<td><input type="text" name="tel" id="tel" value="<?php print $row['u_tel'] ?>" size="15" maxlength="11" onchange="javascript:this.value=this.value.toUpperCase()" onkeyup="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td><input type="email" name="emel" id="emel" value="<?php print $row['u_emel'] ?>" size="40"></td>
</tr>

<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="2"></td><td><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value="<?php print $rawak ?>" readonly="true" style="font-family:comic sans ms; font-size:25px; font-style:italic; color:black; border:0;  text-align:center" size="9" disabled></td></tr>
<tr><td colspan="2"></td><td>Sila taip kembali kod seperti di atas.<br /><input name="vercode" type="text" maxlength="6" placeholder="Code" required /></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="usredit" />
<input type="hidden" name="uid" id="uid" value="<?php print $uid; ?>">
<input type="submit" name="button" id="button" value="  HANTAR  ">&nbsp;
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>