<?php
include("conn.php");

#SQL Injection fix
$pid = addslashes($_GET["pid"]);
if (strlen($pid)>11){
exit;
}
$pid = (int)$pid;

$bulan = array(
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Mac',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Jun',
		'07' => 'Julai',
		'08' => 'Ogos',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',		
		'12' => 'Disember');

$select = "
SELECT *
FROM pilih a, user b, kursus c, kluster d
WHERE a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND p_id LIKE '$pid' 
ORDER BY p_id ASC
LIMIT 1
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

$d1 = substr($row["p_tkhlulus"], 8, 2);
$m1 = substr($row["p_tkhlulus"], 5, 2);
$y1 = substr($row["p_tkhlulus"], 0, 4);

$d2 = substr($row["k_sdate"], 8, 2);
$m2 = substr($row["k_sdate"], 5, 2);
$y2 = substr($row["k_sdate"], 0, 4);

$d3 = substr($row["k_edate"], 8, 2);
$m3 = substr($row["k_edate"], 5, 2);
$y3 = substr($row["k_edate"], 0, 4);
		
$p_tkhlulus = $d1." ".$bulan[$m1]." ".$y1;
$k_sdate = $d2." ".$bulan[$m2]." ".$y2;
$k_edate = $d3." ".$bulan[$m3]." ".$y3;

$bid = $row[b_id] + 1;

$select2 = "
SELECT *
FROM admin
WHERE a_level = '$bid' AND a_id = '$row[k_aid]'
ORDER BY a_id ASC
LIMIT 1
";
$result2 = mysql_query($select2) or die("Query failed");
$row2 = mysql_fetch_assoc($result2);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Surat Tawaran Kursus @ IPPTAR</title>
<style>
div.PageBreak { page-break-after: always; }
body,table {font-family:Arial, Helvetica, sans-serif;}
</style>
</head>
<body>
<!-- Mula Table untuk Header Surat -->
<table width="90%" border="0" align="center">
<tr>
<td><img src="images/jata.png" height="70"></td>
<td valign=top style=font-size:10px><b>INSTITUT PENYIARAN DAN PENERANGAN TUN ABDUL RAZAK (IPPTAR)</b><br/>Kementerian Komunikasi dan Multimedia Malaysia,

<table>
<tr>
<td>
Peti Surat 12163,<br/>Jalan Pantai Baharu,<br/>59700, Kuala Lumpur.
</td>
<td>
&#9742; 03-22957555<br/>&#128224; 03-22957575 / 03-22824796<br/>&#9993; webmaster[at]ipptar[dot]gov[dot]my
</td>
</tr>
</table>
</td>

<td><img src="images/ipptar.png" height="70"></td>
</tr>
<tr><td colspan=4><hr size=1></td></tr>
</table>
<!-- tamat table untuk header surat -->
&nbsp;
<!-- Mula table untuk rujukan surat -->
<table width="30%" border="0" align="right">
<tr>
<td style="text-align: left">
Ruj. Tuan	: 	<br/>
Ruj. Kami	: 	IPPTAR/EK/<?php print $row[b_id]; ?>/<?php print $row[k_id]; ?>/<?php print $row[p_id]; ?><br />
Tarikh		:	<?php print $p_tkhlulus; ?>
</td>
</tr>
</table>
<!-- tamat table untuk rujukan surat -->
<!-- Mula table untuk alamat peserta -->
<table width="90%" border="0" align="center">
<tr>
<td>
<b><?php print $row["u_nama"]; ?></b>
<br />
<br />
Tuan/ Puan,
<br/>
<br/>
<b>TAWARAN MENYERTAI <?php print strtoupper($row['k_name']) ?> PADA <?php print strtoupper($k_sdate); ?>&nbsp;HINGGA&nbsp;<?php print strtoupper($k_edate); ?></b>
<br/>
<br/>
Dengan segala hormatnya saya diarahkan merujuk perkara di atas.
<br/>
<br/>
2. Sukacita dimaklumkan bahawa tuan/puan telah dipilih untuk menyertai kursus tersebut pada tarikh dan tempat seperti berikut : <br><br>
<table width="90%" border="0" align="left" cellspacing="1">
<tr>
<td width="10%">&nbsp;</td>
<td width="10%">Tarikh</td>
<td width="1%">:</td>
<td width="69%"><?php print date("d-m-Y", strtotime($row["k_sdate"])); ?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>Masa</td>
<td>:</td>
<td><?php print $row['k_time'] ?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>Tempat</td>
<td>:</td>
<td><?php print $row['k_loc'] ?></td>
</tr>
</table>
</td>
</tr>
</table>
<!-- tamat table untuk alamat pemohon dan para 2 -->
<br/>
<!-- Mula table untuk maklumat kursus -->
<table width="90%" border="0" align="center">
<tr>
<td>
Pendaftaran dan taklimat kursus akan diadakan pada tarikh dan tempat seperti berikut :   
</td>
</tr>    
<tr>
<td>
<br/>
<table width="90%" border="0" align="left" cellspacing="1">
<tr>
<td width="10%">&nbsp;</td>
<td width="10%">Tarikh</td>
<td width="1%">:</td>
<td width="69%"><?php print date("d-m-Y", strtotime($row["k_sdate"])); ?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>Masa</td>
<td>:</td>
<td><?php print $row['k_time'] ?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>Tempat</td>
<td>:</td>
<td><?php print $row['k_loc'] ?></td>
</tr>
</table>
</td>
</tr>
</table>
<!-- Tamat table untuk maklumat kursus -->
<br/>
<!-- Mula untuk para yuran  -->
<table width="90%" border="0" align="center">
<tr>
<td>
3. Kerjasama pihak tuan/puan adalah dipohon agar dapat mengemukakan yuran kursus sebanyak <b>RM<?php print $row['k_fee'] ?>.00 secara tunai.</b> Pembayaran hendaklah dibuat kepada Urus Setia Kursus semasa sesi pendaftaran kursus.
</td>
</tr>
</table>
<!-- Tamat table para yuran  -->

<br/>
<!-- Mula table Para 4 -->
<table width="90%" border="0" align="center">
<tr>
<td>
4. <b>Peserta adalah diwajibkan untuk hadir sepenuh masa mengikuti jadual kursus yang ditetapkan dan mematuhi Etika Pakaian Pegawai Awam Semasa Bertugas.</b>
<?php if($row["k_terms"] != ""){ ?>
Peserta dimohon untuk membawa bersama : <br/><?php print $row["k_terms"]; ?>
<?php }else{}?>
</td>
</tr>
</table>
<!-- Tamat table para 4 -->
<br/>
<!-- Mula table Para 5 -->
<table width="90%" border="0" align="center">
<tr>
<td>
5.  Sila sahkan penyertaan kursus ini dengan melengkapkan Borang Pengesahan Kehadiran yang disertakan dan difakskan ke talian 03-22824379.
</td>
</tr>
</table>
<!-- Tamat table Para 5  -->
<br/>
<!-- Mula table Para 6 -->
<table width="90%" border="0" align="center">
<tr>
<td>
6.  Sekiranya tuan mempunyai kemusykilan mengenai perkara ini, sila hubungi penyelaras kursus di talian:
<br/>
<ul type="none">
<li><?php print $row2["a_nama"]; ?> 	- 	<?php print $row2["a_tel"]; ?><br />Penyelaras Kursus</li>
<br />
<li>Puan Saniah Abu		-	03-2295 7555 (samb: 143)<br />Penyelia Asrama</li>
</ul>
</td></tr></table>
<!-- Tamat table Para 6  -->
<br />
<!-- Mula table Para 6 -->
<table width="90%" border="0" align="center">
<tr>
<td>
Perhatian tuan berhubung perkara ini amat dihargai dan didahului dengan ucapan terima kasih.
</td></tr></table>
<!-- Tamat table Para 6  -->
<br/>
<table width="90%" border="0" align="center">
<tr>
<td>
Sekian.
<br/><br/>
<strong>&quot;BERKHIDMAT UNTUK NEGARA&quot;</strong>
<br/>
<br/>
Saya yang menjalankan amanah,
<br/>
<br/>
<br/>
<br/>
<b>( <?php print $row2["a_nama"]; ?> )</b><br/>
<?php print $row["b_name"]; ?><br/>
b.p. Pengarah<br/>
Institut Penyiaran Dan Penerangan Tun  Abdul Razak (IPPTAR)<br/>
Kementerian Komunikasi dan Multimedia Malaysia.
</td>
</tr>
</table>
<!-- Tamat table  -->
<br/><br/>
<!-- Page Break -->
<div class="PageBreak">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font size="-1"><i>Surat tawaran ini dijana menerusi sistem. Oleh itu, tanda tangan tidak diperlukan.</i></font>
</div>
<br/>
<!-- Mula table Untuk Lampiran A -->
<table width="90%" border="0" align="center">
<tr>
<td width="100%">
Pengarah<br />
Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)<br />
Peti Surat 12163<br />
Jalan Pantai Baharu<br />
59700 Kuala Lumpur<br />
(u. p.: Unit Keurusetian dan Fasiliti)
<br/>
<br />
Tuan / Puan,
<br/>
<br/>
<b>PENGESAHAN KEHADIRAN KURSUS ANJURAN INSTITUT PENYIARAN DAN PENERANGAN TUN ABDUL RAZAK (IPPTAR)</b>
<br/>
<table cellspacing="0" width="100%" border="0">
<tr>
<td width="15%"><b>TAJUK KURSUS</b></td>
<td width="5%"><b>:</b></td>
<td><b><?php print $row['k_name'] ?></b></td>
</tr>
<tr>
<td><b>TARIKH</b></td>
<td width="5%"><b>:</b></td>
<td><b><?php print date("d-m-Y", strtotime($row["k_sdate"])); ?> sehingga <?php print date("d-m-Y", strtotime($row["k_edate"])); ?></b></td>
</tr>
<tr>
<td><b>TEMPAT</b></td>
<td width="5%"><b>:</b></td>
<td><b><?php print $row['k_loc'] ?></b></td>
</tr>
</table>
<br />
Dengan hormatnya saya merujuk kepada perkara di atas.
<br />
<br />
2.	Dimaklumkan bahawa:
<br/>
<br />
<table cellspacing="0" width="90%" border="0" align="center">
<tr><td colspan="2">Nama: <?php print strtoupper($row['u_nama']) ?></td></tr>
<tr><td colspan="2">Jawatan: <?php print $row['u_jwt'] ?></td></tr>
<tr>
<td width="30%">Akan hadir ke kursus</td>
<td>
<table cellspacing="0" width="20%" border="1">
<tr><td>&nbsp;</td></tr>
</table>
</td>
</tr>
<tr>
<td>Tidak hadir (sila nyatakan sebab di ruang yang disediakan)</td>
<td>
<table cellspacing="0" width="20%" border="1">
<tr><td>&nbsp;</td></tr>
</table>
</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>&nbsp;</td><td align="left">................................................................................</td></tr>

</table>

<br/>
<br/>
Sekian, terima kasih.
<br/>
<br/>
<b>&quot;BERKHIDMAT UNTUK NEGARA&quot;</b>
<br />
<br />
<br />
Saya yang menjalankan amanah,
<br />
<br />
<br />
...........................................
<table width="100%" border="0">
<tr><td width="13%">Nama</td>
<td width="87%">:</td>
</tr>
<tr><td>Jawatan / Gred</td><td> :</td></tr>
<tr><td>Tarikh</td><td> :</td></tr>
<tr><td>Cap Jabatan</td><td> :</td></tr>
<tr><td>No. Tel & Faks</td><td> :</td></tr>
</table>
<br />
<br />
<b>*&nbsp; (SILA FAKS KE 03-22824379 PADA ATAU SEBELUM <?php print strtoupper(date('d-m-Y', strtotime($row[k_sdate] . " -7 days"))); ?>)</b></td>
</tr>
</table>
</body>
</html>