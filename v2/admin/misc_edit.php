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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "penedit") {
	
	/* $select = "
	SELECT *
	FROM pengarah
	WHERE p_id LIKE '$_SESSION[pid]'
	ORDER BY p_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result);
	$numrows = mysql_num_rows($result); */

	// add parameterized query
	$row = sqlSelect(
		'SELECT * FROM pengarah WHERE p_id LIKE ? ORDER BY p_id ASC', 
		array($_SESSION['pid'])
	);
	$rowCount	= sqlSelect(
		'SELECT count(*) AS total FROM pengarah WHERE p_id LIKE ? ORDER BY p_id ASC', 
		array($_SESSION['pid'])
	);

	// if($numrows == "1"){
	if($rowCount['total'] == 1){

		/* $sql = "UPDATE pengarah SET p_nama = '$_SESSION[nama]', p_sign = '$_SESSION[sign]' WHERE p_id = '$_SESSION[pid]'";
		$result = mysql_query($sql) or die(mysql_error()); */

		// add parameterized query
		$result = sqlUpdate(
			'UPDATE pengarah SET p_nama = ?, p_sign = ? WHERE p_id = ?', 
			array($_SESSION['nama'], $_SESSION['sign'], $_SESSION['pid'])
		);
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] 		= "Kemaskini pengarah berjaya.";
		$_SESSION['redirek'] 	= "misc.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle = 'Kemaskini Pengarah';
		include("../kosong.php");
		exit;
		
	}else{
		
		/* $sql = "INSERT INTO admin (p_nama,p_sign)
		VALUES ('$_SESSION[nama]', '$_SESSION[sign]')";
		$result = mysql_query($sql) or die(mysql_error()); */

		// add parameterized query
		$result = sqlInsert(
			'INSERT INTO admin (p_nama, p_sign) VALUES (?, ?)', 
			array($_SESSION['nama'], $_SESSION['sign'])
		);
		
		unset($_SESSION['terai']);
		
		$_SESSION['alert'] 		= "Tambah pengarah berjaya.";
		$_SESSION['redirek']	= "misc.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle = 'Tambah Pengarah';
		include("../kosong.php");
		exit;
		
	}
	
} else {	
	
	#SQL Injection fix
	$pid = addslashes($_GET["pid"]);
	if (strlen($pid) > 11){
		exit;
	}
	$pid = (int)$pid;
		
	/* $select = "
	SELECT *
	FROM pengarah
	WHERE p_id LIKE '$pid'
	ORDER BY p_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result); */

	// add parameterized query
	$row = sqlSelect(
		'SELECT * FROM pengarah WHERE p_id LIKE ? ORDER BY p_id ASC', 
		array($pid)
	);

}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="misc.php">
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<tr><td height="100">&nbsp;</td></tr>
<tr><td align="center" style="font-weight:bold">KEMASKINI MAKLUMAT PENGARAH</td></tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td align="center">Nama : <input type="text" name="nama" id="nama" value="<?php print $row['p_nama'] ?>" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="center">Digital Signature : <input type="text" name="sign" id="sign" value="<?php print $row['p_sign'] ?>" size="40"></td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
<td align="center">
<input type="hidden" name="terai" id="terai" value="penedit" />
<input type="hidden" name="pid" id="pid" value="<?php print $pid; ?>">
<input type="submit" name="button" id="button" value="  HANTAR  ">&nbsp;
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>