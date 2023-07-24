<?php
include("conn.php");

if(isset($_GET['pid']) && isset($_GET['kid']) && isset($_GET['s'])){

if(strlen($_GET['pid']) > 7){ exit; } else {}

if(strlen($_GET['kid']) > 7){ exit; } else {}

if(strlen($_GET['s']) > 2){ exit; } else {}

$pid= (int)$_GET['pid'];
$kid= (int)$_GET['kid'];
$s= (int)$_GET['s'];

$select = "
SELECT p_id
FROM pilih
WHERE p_id LIKE '$pid' AND p_kid LIKE '$kid'
ORDER BY p_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$numrows = mysql_num_rows($result);

  if($numrows != "0"){

        if($s == 1) { $status = "4"; } elseif($s == 2) { $status = "13"; } else { $status = "13"; }
     
        $sql = "UPDATE pilih SET p_status= '$status' WHERE p_id = '$row[p_id]'";
	$result = mysql_query($sql) or die(mysql_error());

	$_SESSION['alert'] = "Pengesahan telah berjaya.";
	$_SESSION['redirek'] = "index.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Pengesahan Permohonan';
	include("kosong.php");
	exit;

  }else{
        
        $_SESSION['alert'] = "Tiada rekod.";
	$_SESSION['redirek'] = "index.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Pengesahan Permohonan';
	include("kosong.php");
	exit;
  
  }

}else{

$_SESSION['alert'] = "Maaf, tiada rekod.";
$_SESSION['redirek'] = "index.php";
$_SESSION['toplus'] = "";
$pageTitle = 'Pengesahan Permohonan';
include("kosong.php");
exit;

}
?>