<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php
if(isset($_GET['print']) && $_GET['print'] == "true"){
?>
<style type="text/css" media="print">
@media screen {
   #printbr {display: none;}
              }
@media print {
   #printbr {display: block; margin-top: 100px;}
   .dontprint { display: none; }
             }

.printbreak {
page-break-before: always;
}
</style>
<script type="text/javascript">
window.print();
</script>
<?php }else{} ?>
</head>
<body>
<div id="container2">
<?php
include("../conn.php");

$select = "SELECT * FROM pilih WHERE p_kid LIKE '$_GET[kid]' AND p_hadir = '9' AND p_status = '5' ORDER BY p_id ASC";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$jumorg = mysql_num_rows($result);

$select = "SELECT * FROM kursus WHERE k_id LIKE '$_GET[kid]' ORDER BY k_id ASC";
$result = mysql_query($select) or die("Query failed");
$row0 = mysql_fetch_assoc($result);

$select = "SELECT * FROM ticer WHERE t_kid LIKE '$_GET[kid]' ORDER BY t_id ASC";
$result3 = mysql_query($select) or die("Query failed");
#$row1 = mysql_fetch_assoc($result);

?>
<div id="content"> 

<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" class="printbreak">
<tr><td colspan="3" align="center" style="font-weight:bold">MAKLUMAT ePENILAIAN</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center"><b><?php /*print $row0['k_code'];*/ ?><?php print $row0['k_name']; ?></b></td></tr>
<tr><td colspan="3" align="center"><b><?php print date("d-m-Y", strtotime($row0["k_sdate"])); ?> sehingga <?php print date("d-m-Y", strtotime($row0["k_edate"])); ?></b></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center">skala : 1 - Amat Lemah , 2 - Lemah, 3 - Sederhana, 4 - Baik, 5 - Amat Baik</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc01.php?kid=<?php print $_GET[kid]; ?>" width="600" height="280" style="border:none;"></iframe></td></tr>

<tr><td colspan="3" align="center"><b>OBJEKTIF KURSUS</b></td></tr>

<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc02.php?kid=<?php print $_GET[kid]; ?>" width="600" height="280" style="border:none;"></iframe></td></tr>

</table>
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" class="printbreak">

<tr><td colspan="3" align="center"><b>PENAMBAHAN PENGETAHUAN DAN KEMAHIRAN</b></td></tr>

<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc03.php?kid=<?php print $_GET[kid]; ?>" width="600" height="560" style="border:none;"></iframe></td></tr>

</table>
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" class="printbreak">

<tr><td colspan="3" align="center"><b>ISI KANDUNGAN</b></td></tr>

<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc04.php?kid=<?php print $_GET[kid]; ?>" width="600" height="1120" style="border:none;"></iframe></td></tr>

</table>
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" class="printbreak">

<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc04b.php?kid=<?php print $_GET[kid]; ?>" width="600" height="1120" style="border:none;"></iframe></td></tr>

</table>
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" class="printbreak">

<tr><td colspan="3" align="center"><b>TEKNIK LATIHAN </b></td></tr>

<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc05.php?kid=<?php print $_GET[kid]; ?>" width="600" height="1120" style="border:none;"></iframe></td></tr>

</table>
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" class="printbreak">

<tr><td colspan="3" align="center"><b>PENGURUSAN KURSUS & KEMUDAHAN</b></td></tr>

<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc06.php?kid=<?php print $_GET[kid]; ?>" width="600" height="1120" style="border:none;"></iframe></td></tr>

</table>
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" class="printbreak">

<tr><td colspan="3" align="center"><b>PENCERAMAH</b></td></tr>

<?php while ($row1 = mysql_fetch_array($result3, MYSQL_ASSOC)) { ?>
	
<tr><td colspan="3" align="center"><a href="http://ekursus.ipptar.gov.my/v2/admin/penilaian.php?kid=<?php print $_GET[kid]; ?>&tid=<?php print $row1[t_id]; ?>&terai=pentic" rel="#overlay"><?php print $row1['t_nama']; ?></a></td></tr>

<?php } ?>

<tr><td colspan="3" align="center">&nbsp;</td></tr>

</table>
<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" class="printbreak">

<tr><td colspan="3" align="center"><b>FAEDAH KURSUS</b></td></tr>

<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc08.php?kid=<?php print $_GET[kid]; ?>" width="600" height="560" style="border:none;"></iframe></td></tr>

</table>


<br/>

<!-- mula butang cetak -->
<table width="90%" border="0" align="center">
<tr>
<td align="center">
<a href="penilaian_det.php?kid=<?php print $_GET[kid]; ?>&print=true" target="_blank"><button class="dontprint">&nbsp;&nbsp;PRINT&nbsp;&nbsp;</button</a>
<!--<input type="button" value="   PRINT   " onClick="window.print()" class="dontprint">-->
</td>
</tr>
</table>
<!-- end butang cetak -->
<br/>
<br/>
</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>

