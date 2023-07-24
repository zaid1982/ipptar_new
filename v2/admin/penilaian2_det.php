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

$select = "SELECT * FROM pilih WHERE p_kid LIKE '$_SESSION[kid]' AND p_hadir = '9' AND p_status = '5' ORDER BY p_id ASC";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$jumorg = mysql_num_rows($result);

$select = "SELECT * FROM kursus WHERE k_id LIKE '$_SESSION[kid]' ORDER BY k_id ASC";
$result = mysql_query($select) or die("Query failed");
$row0 = mysql_fetch_assoc($result);

$select = "SELECT * FROM ticer WHERE t_kid LIKE '$_SESSION[kid]' ORDER BY t_id ASC";
$result3 = mysql_query($select) or die("Query failed");
#$row1 = mysql_fetch_assoc($result);

?>
<div id="content"> 

<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1">
<!--
<tr><td colspan="3" align="center" style="font-weight:bold">MAKLUMAT ePENILAIAN</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center"><b><?php /*print $row0['k_code'];*/ ?><?php print $row0['k_name']; ?></b></td></tr>
<tr><td colspan="3" align="center"><b><?php print date("d-m-Y", strtotime($row0["k_sdate"])); ?> sehingga <?php print date("d-m-Y", strtotime($row0["k_edate"])); ?></b></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center">skala : 1 - Amat Lemah , 2 - Lemah, 3 - Sederhana, 4 - Baik, 5 - Amat Baik</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr><td colspan="3" align="center"><b>PENCERAMAH</b></td></tr>
-->
<tr><td colspan="3" align="center" style="padding-left:20px"><iframe src="http://ekursus.ipptar.gov.my/v2/admin/pc07.php?kid=<?php print $_SESSION[kid]; ?>" width="600" height="900" style="border:none;"></iframe></td></tr>

</table>


<br/>

<!-- mula butang cetak -->
<table width="90%" border="0" align="center">
<tr>
<td align="center">
<a href="penilaian2_det.php?kid=<?php print $_SESSION[kid]; ?>&print=true" target="_blank"><button class="dontprint">&nbsp;&nbsp;PRINT&nbsp;&nbsp;</button</a>
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

