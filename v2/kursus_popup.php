<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container2">
<?php
include("conn.php");

$kid = (int)$_GET['kid'];

$select = "
SELECT *
FROM kursus
WHERE k_id LIKE '$kid'
ORDER BY k_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

$tkhmula = date("Ymd", strtotime($row["k_sdate"]));
$tkhharini = date("Ymd");
$tkhbeza = $tkhmula-$tkhharini;
if($tkhbeza > 0){
$status="<font color='green'><b>BUKA</b></font>";
$disabled_but = "";
}else{
$status="<font color='red'><b>TUTUP</b></font>";
$disabled_but = "disabled";
}

$kaid = $row['k_aid'];


$select = "
SELECT *
FROM admin
WHERE a_id = '$kaid'
ORDER BY a_id ASC
";
$result = mysql_query($select) or die("Query failed2");
$row2 = mysql_fetch_assoc($result);
?>
<div id="content">
 
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
<tr><td colspan="3" style="font-weight:bold">MAKLUMAT KURSUS</td></tr>
<!--
<tr>
<td class=tbl1 align="right" width="15%">Kod</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print $row['k_code'] ?></td>
</tr>
-->
<tr>
<td class=tbl2 align="right" width="15%">Kursus</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $row['k_name'] ?></td>
</tr>
<tr>
<td class=tbl1 align="right" valign="top">Objektif</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print $row['k_obj']?></td>
</tr>
<tr>
<td class=tbl2 align="right">Lokasi</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $row['k_loc'] ?></td>
</tr>
<tr>
<td class=tbl1 align="right">Jangkamasa</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print $row['k_duration'] ?> hari</td>
</tr>
<tr>
<td class=tbl2 align="right">Tarikh Mula</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print date("d-m-Y", strtotime($row["k_sdate"])); ?></td>
</tr>
<tr>
<td class=tbl1 align="right">Tarikh Tamat</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print date("d-m-Y", strtotime($row["k_edate"])); ?></td>
</tr>
<tr>
<td class=tbl2 align="right">Masa</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $row['k_time'] ?></td>
</tr>
<!--
<tr>
<td class=tbl1 align="right" valign="top">Terma</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print $row['k_terms']?></td>
</tr>
-->
<tr>
<td class=tbl1 align="right">Bayaran</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle">RM <?php print $row['k_fee'] ?></td>
</tr>
<tr>
<td class=tbl2 align="right">Status</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $status ?></td>
</tr>
<tr>
<td class=tbl1 align="right">Penyelaras Bertugas</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print $row2['a_nama'] ?><br/><?php print $row2['a_emel'] ?> (emel)<br/><?php print $row2['a_tel'] ?> (telefon)</td>
</tr>
</table>

</div><!--close content-->