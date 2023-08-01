<?php 
session_start();
include("conn.php");
include("top.php");
?>
<body>
<div id="container2">
<?php
if(isset($_GET['kid'])){

	/* $select = "SELECT p_id
	FROM pilih
	WHERE p_uid LIKE '$_SESSION[UsrID]' AND p_kid LIKE '$_GET[kid]' AND p_epstatus != '14'
	ORDER BY p_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result);
	$numrows = mysql_num_rows($result); */

	// add parameterized query
	$row = sqlSelect(
		'SELECT p_id FROM pilih WHERE p_uid LIKE ? AND p_kid LIKE ? AND p_epstatus != ? ORDER BY p_id ASC', 
		array(addslashes($_SESSION['UsrID']), addslashes($_GET['kid']), 14)
	);
	$rowCount	= sqlSelect(
		'SELECT count(p_id) AS total FROM pilih WHERE p_uid LIKE ? AND p_kid LIKE ? AND p_epstatus != ? ORDER BY p_id ASC', 
		array(addslashes($_SESSION['UsrID']), addslashes($_GET['kid']), 14)
	);

  if($rowCount['total'] == 0){

		$_SESSION['k_sdate'] = date('d-m-Y', strtotime($_SESSION['k_sdate']));
		$_SESSION['k_edate'] = date('d-m-Y', strtotime($_SESSION['k_edate']));
		$tkhmohon = date('Y-m-d');

		/* $sql = "INSERT INTO pilih (p_uid, p_kid, p_status, p_tkhmohon) VALUES ('$_SESSION[UsrID]', '$_GET[kid]', '3', '$tkhmohon')";
		$result = mysql_query($sql) or die(mysql_error()); */
		
		// $pid = mysql_insert_id();

		/* $sql = "INSERT INTO asrama (a_uid, a_kid, a_status) VALUES ('$_SESSION[UsrID]', '$_GET[kid]', '$_SESSION[asrama]')";
		$result = mysql_query($sql) or die(mysql_error()); */

		// add parameterized query
		$result = sqlInsert(
			'INSERT INTO pilih (p_uid, p_kid, p_status, p_tkhmohon) VALUES (?, ?, ?, ?)', 
			array($_SESSION['UsrID'], $_GET['kid'], 3, $tkhmohon)
		);
		$pid = $result;

		// add parameterized query
		$result = sqlInsert(
			'INSERT INTO asrama (a_uid, a_kid, a_status) VALUES (?, ?, ?)', 
			array($_SESSION['UsrID'], $_GET['kid'], $_SESSION['asrama'])
		);

		include("mohon_emel_user.php");
		include("mohon_emel_peg.php");
		
		$_SESSION['alert'] 		= "Terima Kasih kerana memohon berkursus di IPPTAR.<br>Sila semak status permohonan terkini dari masa kesemasa melalui email yang telah didaftarkan ataupun akaun sistem ekursus anda.";
		$_SESSION['redirek'] 	= "mohon.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle 						= 'Mohon Kursus';
		include("kosong.php");
		exit;
	
  } else {
  
		$_SESSION['alert'] 		= "Anda telah membuat permohonan bagi kursus ini sebelum ini. Pastikan anda membuat semakan bagi permohonan anda. Terima kasih.";
		$_SESSION['redirek'] 	= "mohon.php";
		$_SESSION['toplus'] 	= "";
		$pageTitle	 					= 'Mohon Kursus';
		include("kosong.php");
		exit;
	
  }
}
?>