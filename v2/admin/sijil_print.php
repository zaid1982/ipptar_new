<?php
include("../conn.php");


$pid = (int)$_GET['pid'];
header("Refresh:0; url=sijil_print.php?pid=$pid");
$select = "
SELECT *
FROM pilih a, user b, kursus c, kluster d
WHERE a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND p_id LIKE '$pid' 
ORDER BY p_id ASC
LIMIT 1
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

$select2 = "
SELECT *
FROM pengarah 
ORDER BY p_id ASC
LIMIT 1
";
$result2 = mysql_query($select2) or die("Query failed");
$row2 = mysql_fetch_assoc($result2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sijil Peserta Kursus @ IPPTAR</title>
<style>
@media screen {
   #printbr {display: none;}
   .dontshow { display: none; }
}
@media print {
   #printbr {display: block; margin-top: 115px;}
   #printbr2 {display: block; margin-top: 3px;}
   .dontprint { display: none; }
   .blkg {
	background-image: url('http://ekursus.ipptar.gov.my/v2/admin/images/sijil5.png');
	background-repeat: no-repeat;
   }
}
</style>
 <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>
</head>
<body>
<table width="100%" border="0" align="center" class="blkg dontprint">
<tr>
<td align="left" style="padding-left:50px">
<div style="font-size:22px;"><a href=""><i>refresh</i></a> laman ini untuk cetak (sekiranya tiada paparan latar belakang sijil di <i>window print</i>)</div>
</td>
</tr>
</table>

<table width="100%" border="0" align="center" class="blkg dontshow">
<tr>
<td align="left" style="padding-left:50px">
<div id="printbr">&nbsp;</div>
<div id="printbr">&nbsp;</div>
<div style="font-size:22px;">Sijil ini dianugerahkan kepada</div>
<br/>
<div style="font-size:28px;font-weight:bold"><?php print $row['u_nama'] ?></div>
<br/>
<div style="font-size:22px;">telah menghadiri</div>
<br/>
<div style="font-size:28px;font-weight:bold"><?php print strtoupper($row['k_name']) ?></div>
<br/>
<div style="font-size:22px;">pada <?php print date("d", strtotime($row["k_sdate"])); ?>&nbsp;-&nbsp;<?php $terai = date("d F Y", strtotime($row["k_edate"]));$terai = str_replace("October","Oktober",$terai);$terai = str_replace("February","Februari",$terai); echo $terai; ?>,</div>
<div style="font-size:22px;">dianjurkan oleh<br/>Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</div>
</td>
</tr>
<tr>
<td align="center" style="padding-right:50px;padding-left:500px;">
<div class="dontshow"><img src="http://ekursus.ipptar.gov.my/v2/admin/images/<?php print strtolower($row2['p_sign']) ?>" border="0" width="129"></div>
<div id="printbr2">&nbsp;</div>
<div style="font-size:24px;font-weight:bold"><?php print strtoupper($row2['p_nama']) ?></div>
<div style="font-size:16px;">b.p PENGARAH</div>
<div style="font-size:16px;">INSTITUT PENYIARAN DAN PENERANGAN TUN ABDUL RAZAK</div>
<div style="font-size:16px;">KEMENTERIAN KOMUNIKASI DAN DIGITAL</div>
<br/>
<br/>
</td>
</tr>
</table>
</body>
</html>
