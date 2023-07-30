<?php session_start(); ?>
<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container2">
<?php
include("conn.php");

if(isset($_POST['pid'])){

$tkhisi = date('Y-m-d');
	
$key 	= addslashes($_POST['kodrawak']); 
$number = addslashes($_POST['vercode']);

# start captcha
if(($number!=$key)||($number=="")){
			
	$_POST['alert'] = "Kod tidak valid. Sila cuba sekali lagi.";
	$_POST['redirek'] = "penilaian.php";
	$_POST['toplus'] = "";
	$pageTitle = 'Kemaskini Kursus';
	#include("../kosong.php");
	exit;
	
} else {}
# end captcha	

print $select = "
SELECT COUNT(e_pid) AS total
FROM epenilaian
WHERE e_pid LIKE '$_POST[pid]'
ORDER BY e_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

	if($row['total'] > "0"){
		
		print "satu";
		$sql = "UPDATE epenilaian SET e_j1 = '$_POST[j1]', e_j2 = '$_POST[j2]', e_j3 = '$_POST[j3]', e_j4 = '$_POST[j4]', e_j5 = '$_POST[j5]', e_j6 = '$_POST[j6]', e_j7 = '$_POST[j7]', e_j8 = '$_POST[j8]', e_j9 = '$_POST[j9]', e_j10 = '$_POST[j10]', e_j11 = '$_POST[j11]', e_j12 = '$_POST[j12]', e_j13 = '$_POST[j13]', e_j14 = '$_POST[j14]', e_j15 = '$_POST[j15]', e_j16 = '$_POST[j16]', e_j20 = '$_POST[j20]', e_j21 = '$_POST[j21]', e_j22 = '$_POST[j22]', e_date = '$tkhisi' WHERE e_pid = '$_POST[pid]'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$select = "
		SELECT COUNT(e_pid) AS total
		FROM epenilaian_ticer
		WHERE e_pid LIKE '$_POST[pid]'
		ORDER BY e_id ASC
		";
		$result = mysql_query($select) or die("Query failed");
		$row = mysql_fetch_assoc($result);
		
			if($row['total'] > "0"){
				
				print "dua";
				
				#start update nilai ticer						
				print "i".$item_idCount = $_POST["i"];
			    
			    for($i=0; $i<$item_idCount; $i++) {
			        
			        $sql = "UPDATE epenilaian_ticer SET e_j17='".$_POST["j17"][$i]."', e_j18='".$_POST["j18"][$i]."', e_j19='".$_POST["j19"][$i]."' WHERE e_pid = '$_POST[pid]' AND e_tid ='".$_POST["tid"][$i]."'";
			        $result = mysql_query( $sql );
			        
			    }							
				#end update nilai ticer
				
			}else{
			
				print "tiga";
				
				#start insert nilai ticer			
				$item_idCount = $_POST["i"];
			    
			    for($i=0; $i<$item_idCount; $i++) {
				
				    $sql = "INSERT INTO epenilaian_ticer (e_pid, e_tid, e_j17, e_j18, e_j19, e_date) VALUES ('$_POST[pid]','".$_POST["tid"][$i]."','".$_POST["j17"][$i]."','".$_POST["j18"][$i]."','".$_POST["j19"][$i]."','$tkhisi')";
					$result = mysql_query($sql) or die(mysql_error());
				}
				#end insert nilai ticer
		
			}
	
	}else{
		
		$sql = "INSERT INTO epenilaian (e_pid, e_j1, e_j2, e_j3, e_j4, e_j5, e_j6, e_j7, e_j8, e_j9, e_j10, e_j11, e_j12, e_j13, e_j14, e_j15, e_j16, e_j20, e_j21, e_j22, e_date)
		VALUES ('$_POST[pid]', '$_POST[j1]', '$_POST[j2]', '$_POST[j3]', '$_POST[j4]', '$_POST[j5]', '$_POST[j6]', '$_POST[j7]', '$_POST[j8]', '$_POST[j9]', '$_POST[j10]', '$_POST[j11]', '$_POST[j12]', '$_POST[j13]', '$_POST[j14]', '$_POST[j15]', '$_POST[j16]', '$_POST[j20]', '$_POST[j21]', '$_POST[j22]', '$tkhisi')";
		$result = mysql_query($sql) or die(mysql_error());
		
		#start insert nilai ticer			
		$item_idCount = $_POST["i"];
	    
	    for($i=0; $i<$item_idCount; $i++) {
		
		    $sql = "INSERT INTO epenilaian_ticer (e_pid, e_tid, e_j17, e_j18, e_j19, e_date) VALUES ('$_POST[pid]','".$_POST["tid"][$i]."','".$_POST["j17"][$i]."','".$_POST["j18"][$i]."','".$_POST["j19"][$i]."','$tkhisi')";
			$result = mysql_query($sql) or die(mysql_error());
		}
		#end insert nilai ticer
			    		
	}
	
	if($_POST['j1'] > 0 && $_POST['j2'] > 0 && $_POST['j3'] > 0 && $_POST['j4'] > 0 && $_POST['j5'] > 0 && $_POST['j6'] > 0 && $_POST['j7'] > 0 && $_POST['j8'] > 0 && $_POST['j9'] > 0 && $_POST['j10'] > 0 && $_POST['j11'] > 0 && $_POST['j12'] > 0 && $_POST['j13'] > 0 && $_POST['j14'] > 0 && $_POST['j15'] > 0 && $_POST['j16'] > 0 && $_POST['j20'] > 0 && $_POST['j21'] > 0 && $_POST['j22'] != ""){
		
		$sql = "UPDATE pilih SET p_epstatus = '12' WHERE p_id = '$_POST[pid]'";
		$result = mysql_query($sql) or die(mysql_error());
		
	}else{}

	$_POST['alert'] = "Maklumat anda telah direkodkan.";
	$_POST['redirek'] = "penilaian.php";
	$_POST['toplus'] = "";
	$pageTitle = 'ePenilaian';
	#include("kosong.php");
	exit;
	
}else{ print "sini ke"; }
?>

<div id="content"> 

</div><!--close content-->

</div><!--close container2-->

<?php
include("bottom.php");
?>