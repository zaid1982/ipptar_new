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
LIMIT 1
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$row['k_aid'] ;
$tkhmula = date("Ymd", strtotime($row["k_sdate"]));
$tkhharini = date("Ymd");
#$tkhharini = date('Ymd', strtotime(date(Ymd) . " -5 days"));
$tkhbeza = $tkhmula-$tkhharini;
if($tkhbeza > "0" || $row['k_wlkin'] == "1"){
$status="<font color='green'><b>BUKA</b></font>";
$disabled_but = "";
}else{
$status="<font color='red'><b>TUTUP</b></font>";
$disabled_but = "disabled";
}
?>
<body>
<div id="container2">

<div id="content"> 

<form id="form1" name="form1" method="GET" action="mohon.php">
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
<td class=tbl2 align="right">Kursus</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $row['k_name'] ?></td>
</tr>
<tr>
<td class=tbl2 align="right" valign="top">Objektif</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $row['k_obj']?></td>
</tr>
<tr>
<td class=tbl2 align="right" valign="top">Terma</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $row['k_terms']?></td>
</tr>

<tr>
<td class=tbl1 align="right">Lokasi</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print $row['k_loc'] ?></td>
</tr>
<tr>
<td class=tbl2 align="right">Jangkamasa</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $row['k_duration'] ?> hari</td>
</tr>
<tr>
<td class=tbl1 align="right">Tarikh Mula</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print date("d-m-Y", strtotime($row["k_sdate"])); ?></td>
</tr>
<tr>
<td class=tbl2 align="right">Tarikh Tamat</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print date("d-m-Y", strtotime($row["k_edate"])); ?></td>
</tr>
<tr>
<td class=tbl1 align="right">Masa</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print $row['k_time'] ?></td>
</tr>
<tr>
<td class=tbl2 align="right">Bayaran</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle">RM <?php print $row['k_fee'] ?></td>
</tr>
<tr>
<td class=tbl1 align="right">Penyelaras</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php 
$penyelaras_id = $row['k_aid'];
$select1 = "
SELECT * FROM admin WHERE a_id LIKE '$penyelaras_id' ";
$result1 = mysql_query($select1) or die("Query failed");
$row1 = mysql_fetch_assoc($result1);
$p1=$row1['a_nama'];
$p2=$row1['a_tel'];
$p3=$row1['a_emel'];

print $p1;
 ?></td>
</tr>

<tr>
<td class=tbl2 align="right">No. Telefon Penyelaras</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $p2;?></td>
</tr>

<tr>
<td class=tbl1 align="right">Emel Penyelaras</td>
<td class=tbl1> : </td>
<td class=tbl1 valign="middle"><?php print $p3;?></td>
</tr>





<tr>
<td class=tbl2 align="right">Status</td>
<td class=tbl2> : </td>
<td class=tbl2 valign="middle"><?php print $status ?></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
<td colspan="3" align="center">
<input type="hidden" name="kid" id="kid" value="<?php print $kid; ?>">
<input type="hidden" name="terai" id="terai" value="2">
<input type="submit" name="submit" id="submit" value="  MOHON KURSUS  " <?php print $disabled_but; ?>>
</td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
</table>
</form>

</div><!--close content-->

</div><!--close container2-->

<?php
include("bottom.php");
?>