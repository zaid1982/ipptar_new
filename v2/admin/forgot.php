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

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "forgot") {

	$key 		= $_SESSION['kodrawak']; 
	$number = $_SESSION['vercode'];

	# start captcha
	if(($number!=$key) || ($number=="")) {
		
		session_destroy();
				
		$_SESSION['alert'] 		= "Kod tidak valid. Sila cuba sekali lagi.";
		$_SESSION['redirek'] 	= "status.php";
		$pageTitle 						= 'Semak Status';
		include("kosong.php");
		exit;
		
	} else {}
	# end captcha

	/* $select = "
	SELECT a_idnum
	FROM admin
	WHERE a_emel = '$_SESSION[emel]'
	ORDER BY a_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result); */

	// add parameterized query
	$rowCount = sqlSelect(
		'SELECT count(a_idnum) AS total FROM admin WHERE a_emel = ? ORDER BY a_id ASC', 
		array($_SESSION['emel'])
	);
	$result = sqlSelect(
		'SELECT a_idnum FROM admin WHERE a_emel = ? ORDER BY a_id ASC', 
		array($_SESSION['emel'])
	);

	// if (mysql_num_rows($result) == 1) {
	if ($rowCount['total'] == 1) {

		/* $sql = "UPDATE admin SET a_status = '2' WHERE a_emel = '$_SESSION[emel]'";
		$result = mysql_query($sql) or die(mysql_error()); */

		// add parameterized query
		$result = sqlUpdate(
			'UPDATE admin SET a_status = ? WHERE a_emel = ?', 
			array('2', $_SESSION['emel'])
		);

		include("forgot_emel.php");

		session_destroy();

		$_SESSION['alert'] 		= "Emel telah berjaya dihantar.";
		$_SESSION['redirek'] 	= "index.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle = 'Lupa Kata Laluan';
		include("../kosong.php");
		exit;

	} else {
		
	session_destroy();

		$_SESSION['alert'] 		= "Emel tidak wujud. Sila hubungi Webmaster.";
		$_SESSION['redirek'] 	= "index.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle = 'Lupa Kata Laluan';
		include("../kosong.php");
		exit;

	}

} else {  
	
	$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.
	session_destroy(); 

}
?> 
<div id="content"> 

<form id="form1" name="form1" method="POST" action="login.php">
<table align="center" width="100%" border="0" cellpadding="3" cellspacing="1">
<tr><td height="100">&nbsp;</td></tr>
<tr><td align="center" style="font-weight:bold">LUPA KATA LALUAN</td></tr>
<tr><td align="center">Masukkan Emel :<br><input type='text' name='emel' size='25'></td></tr>

<tr><td align="center"><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value="<?php print $rawak ?>" readonly="true" style="font-family:comic sans ms; font-size:25px; font-style:italic; color:black; border:0;  text-align:center" size="9" disabled></td></tr>
<tr><td align="center">Sila taip kembali kod seperti di atas.<br /><input name="vercode" type="text" maxlength="6" placeholder="Code" required /></td></tr>


<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">
<input type="hidden" name="terai" id="terai" value="forgot" />
<input type="submit" name="submit" id="submit" value="  HANTAR  ">
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>

</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>