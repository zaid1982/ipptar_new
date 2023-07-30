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

$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.

#SQL Injection fix
$pid = addslashes($_GET["pid"]);
if (strlen($pid)>11){
exit;
}
$pid = (int)$pid;

if(isset($pid)){

$select = "
SELECT *
FROM epenilaian
WHERE e_pid LIKE '$pid'
ORDER BY e_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

if($row['e_j1'] == "1"){$j11 = "checked";$j12 = "";$j13 = "";$j14 = "";$j15 = "";$j16 = "";$j17 = "";}elseif($row['e_j1'] == "2"){$j12 = "checked";$j11 = "";$j13 = "";$j14 = "";$j15 = "";$j16 = "";$j17 = "";}elseif($row['e_j1'] == "3"){$j13 = "checked";$j11 = "";$j12 = "";$j14 = "";$j15 = "";$j16 = "";$j17 = "";}elseif($row['e_j1'] == "4"){$j14 = "checked";$j11 = "";$j12 = "";$j13 = "";$j15 = "";$j16 = "";$j17 = "";}elseif($row['e_j1'] == "5"){$j15 = "checked";$j11 = "";$j12 = "";$j13 = "";$j14 = "";$j16 = "";$j17 = "";}else{$j11 = "";$j12 = "";$j13 = "";$j14 = "";$j15 = "";$j16 = "";$j17 = "";}

if($row['e_j2'] == "1"){$j21 = "checked";$j22 = "";$j23 = "";$j24 = "";$j25 = "";}elseif($row['e_j2'] == "2"){$j21 = "";$j23 = "";$j24 = "";$j25 = "";$j22 = "checked";}elseif($row['e_j2'] == "3"){$j21 = "";$j22 = "";$j24 = "";$j25 = "";$j23 = "checked";}elseif($row['e_j2'] == "4"){$j21 = "";$j22 = "";$j23 = "";$j25 = "";$j24 = "checked";}elseif($row['e_j2'] == "5"){$j21 = "";$j22 = "";$j23 = "";$j24 = "";$j25 = "checked";}else{$j21 = "";$j22 = "";$j23 = "";$j24 = "";$j25 = "";}

if($row['e_j3'] == "1"){$j31 = "checked";$j32 = "";$j33 = "";$j34 = "";$j35 = "";}elseif($row['e_j3'] == "2"){$j32 = "checked";$j31 = "";$j33 = "";$j34 = "";$j35 = "";}elseif($row['e_j3'] == "3"){$j33 = "checked";$j31 = "";$j32 = "";$j34 = "";$j35 = "";}elseif($row['e_j3'] == "4"){$j34 = "checked";$j31 = "";$j32 = "";$j33 = "";$j35 = "";}elseif($row['e_j3'] == "5"){$j35 = "checked";$j31 = "";$j32 = "";$j33 = "";$j34 = "";}else{$j31 = "";$j32 = "";$j33 = "";$j34 = "";$j35 = "";}

if($row['e_j4'] == "1"){$j41 = "checked";$j42 = "";$j43 = "";$j44 = "";$j45 = "";}elseif($row['e_j4'] == "2"){$j42 = "checked";$j41 = "";$j43 = "";$j44 = "";$j45 = "";}elseif($row['e_j4'] == "3"){$j43 = "checked";$j41 = "";$j42 = "";$j44 = "";$j45 = "";}elseif($row['e_j4'] == "4"){$j44 = "checked";$j41 = "";$j42 = "";$j43 = "";$j45 = "";}elseif($row['e_j4'] == "5"){$j45 = "checked";$j41 = "";$j42 = "";$j43 = "";$j44 = "";}else{$j41 = "";$j42 = "";$j43 = "";$j44 = "";$j45 = "";}

if($row['e_j5'] == "1"){$j51 = "checked";$j52 = "";$j53 = "";$j54 = "";$j55 = "";}elseif($row['e_j5'] == "2"){$j52 = "checked";$j51 = "";$j53 = "";$j54 = "";$j55 = "";}elseif($row['e_j5'] == "3"){$j53 = "checked";$j51 = "";$j52 = "";$j54 = "";$j55 = "";}elseif($row['e_j5'] == "4"){$j54 = "checked";$j51 = "";$j52 = "";$j53 = "";$j55 = "";}elseif($row['e_j5'] == "5"){$j55 = "checked";$j51 = "";$j52 = "";$j53 = "";$j54 = "";}else{$j51 = "";$j52 = "";$j53 = "";$j54 = "";$j55 = "";}

if($row['e_j6'] == "1"){$j61 = "checked";$j62 = "";$j63 = "";$j64 = "";$j65 = "";}elseif($row['e_j6'] == "2"){$j62 = "checked";$j61 = "";$j63 = "";$j64 = "";$j65 = "";}elseif($row['e_j6'] == "3"){$j63 = "checked";$j61 = "";$j62 = "";$j64 = "";$j65 = "";}elseif($row['e_j6'] == "4"){$j64 = "checked";$j61 = "";$j62 = "";$j63 = "";$j65 = "";}elseif($row['e_j6'] == "5"){$j65 = "checked";$j61 = "";$j62 = "";$j63 = "";$j64 = "";}else{$j61 = "";$j62 = "";$j63 = "";$j64 = "";$j65 = "";}

if($row['e_j7'] == "1"){$j71 = "checked";$j72 = "";$j73 = "";$j74 = "";$j75 = "";}elseif($row['e_j7'] == "2"){$j72 = "checked";$j71 = "";$j73 = "";$j74 = "";$j75 = "";}elseif($row['e_j7'] == "3"){$j73 = "checked";$j71 = "";$j72 = "";$j74 = "";$j75 = "";}elseif($row['e_j7'] == "4"){$j74 = "checked";$j71 = "";$j72 = "";$j73 = "";$j75 = "";}elseif($row['e_j7'] == "5"){$j75 = "checked";$j71 = "";$j72 = "";$j73 = "";$j74 = "";}else{$j71 = "";$j72 = "";$j73 = "";$j74 = "";$j75 = "";}

if($row['e_j8'] == "1"){$j81 = "checked";$j82 = "";$j83 = "";$j84 = "";$j85 = "";}elseif($row['e_j8'] == "2"){$j82 = "checked";$j81 = "";$j83 = "";$j84 = "";$j85 = "";}elseif($row['e_j8'] == "3"){$j83 = "checked";$j81 = "";$j82 = "";$j84 = "";$j85 = "";}elseif($row['e_j8'] == "4"){$j84 = "checked";$j81 = "";$j82 = "";$j83 = "";$j85 = "";}elseif($row['e_j8'] == "5"){$j85 = "checked";$j81 = "";$j82 = "";$j83 = "";$j84 = "";}else{$j81 = "";$j82 = "";$j83 = "";$j84 = "";$j85 = "";}

if($row['e_j9'] == "1"){$j91 = "checked";$j92 = "";$j93 = "";$j94 = "";$j95 = "";}elseif($row['e_j9'] == "2"){$j92 = "checked";$j91 = "";$j93 = "";$j94 = "";$j95 = "";}elseif($row['e_j9'] == "3"){$j93 = "checked";$j91 = "";$j92 = "";$j94 = "";$j95 = "";}elseif($row['e_j9'] == "4"){$j94 = "checked";$j91 = "";$j92 = "";$j93 = "";$j95 = "";}elseif($row['e_j9'] == "5"){$j95 = "checked";$j91 = "";$j92 = "";$j93 = "";$j94 = "";}else{$j91 = "";$j92 = "";$j93 = "";$j94 = "";$j95 = "";}

if($row['e_j10'] == "1"){$j101 = "checked";$j102 = "";$j103 = "";$j104 = "";$j105 = "";}elseif($row['e_j10'] == "2"){$j102 = "checked";$j101 = "";$j103 = "";$j104 = "";$j105 = "";}elseif($row['e_j10'] == "3"){$j103 = "checked";$j101 = "";$j102 = "";$j104 = "";$j105 = "";}elseif($row['e_j10'] == "4"){$j104 = "checked";$j101 = "";$j102 = "";$j103 = "";$j105 = "";}elseif($row['e_j10'] == "5"){$j105 = "checked";$j101 = "";$j102 = "";$j103 = "";$j104 = "";}else{$j101 = "";$j102 = "";$j103 = "";$j104 = "";$j105 = "";}

if($row['e_j11'] == "1"){$j111 = "checked";$j112 = "";$j113 = "";$j114 = "";$j115 = "";}elseif($row['e_j11'] == "2"){$j112 = "checked";$j111 = "";$j113 = "";$j114 = "";$j115 = "";}elseif($row['e_j11'] == "3"){$j113 = "checked";$j111 = "";$j112 = "";$j114 = "";$j115 = "";}elseif($row['e_j11'] == "4"){$j114 = "checked";$j111 = "";$j112 = "";$j113 = "";$j115 = "";}elseif($row['e_j11'] == "5"){$j115 = "checked";$j111 = "";$j112 = "";$j113 = "";$j114 = "";}else{$j111 = "";$j112 = "";$j113 = "";$j114 = "";$j115 = "";}

if($row['e_j12'] == "1"){$j121 = "checked";$j122 = "";$j123 = "";$j124 = "";$j125 = "";}elseif($row['e_j12'] == "2"){$j122 = "checked";$j121 = "";$j123 = "";$j124 = "";$j125 = "";}elseif($row['e_j12'] == "3"){$j123 = "checked";$j121 = "";$j122 = "";$j124 = "";$j125 = "";}elseif($row['e_j12'] == "4"){$j124 = "checked";$j121 = "";$j122 = "";$j123 = "";$j125 = "";}elseif($row['e_j12'] == "5"){$j125 = "checked";$j121 = "";$j122 = "";$j123 = "";$j124 = "";}else{$j121 = "";$j122 = "";$j123 = "";$j124 = "";$j125 = "";}

if($row['e_j13'] == "1"){$j131 = "checked";$j132 = "";$j133 = "";$j134 = "";$j135 = "";}elseif($row['e_j13'] == "2"){$j132 = "checked";$j131 = "";$j133 = "";$j134 = "";$j135 = "";}elseif($row['e_j13'] == "3"){$j133 = "checked";$j131 = "";$j132 = "";$j134 = "";$j135 = "";}elseif($row['e_j13'] == "4"){$j134 = "checked";$j131 = "";$j132 = "";$j133 = "";$j135 = "";}elseif($row['e_j13'] == "5"){$j135 = "checked";$j131 = "";$j132 = "";$j133 = "";$j134 = "";}else{$j131 = "";$j132 = "";$j133 = "";$j134 = "";$j135 = "";}

if($row['e_j14'] == "1"){$j141 = "checked";$j142 = "";$j143 = "";$j144 = "";$j145 = "";}elseif($row['e_j14'] == "2"){$j142 = "checked";$j141 = "";$j143 = "";$j144 = "";$j145 = "";}elseif($row['e_j14'] == "3"){$j143 = "checked";$j141 = "";$j142 = "";$j144 = "";$j145 = "";}elseif($row['e_j14'] == "4"){$j144 = "checked";$j141 = "";$j142 = "";$j143 = "";$j145 = "";}elseif($row['e_j14'] == "5"){$j145 = "checked";$j141 = "";$j142 = "";$j143 = "";$j144 = "";}else{$j141 = "";$j142 = "";$j143 = "";$j144 = "";$j145 = "";}

if($row['e_j15'] == "1"){$j151 = "checked";$j152 = "";$j153 = "";$j154 = "";$j155 = "";}elseif($row['e_j15'] == "2"){$j152 = "checked";$j151 = "";$j153 = "";$j154 = "";$j155 = "";}elseif($row['e_j15'] == "3"){$j153 = "checked";$j151 = "";$j152 = "";$j154 = "";$j155 = "";}elseif($row['e_j15'] == "4"){$j154 = "checked";$j151 = "";$j152 = "";$j153 = "";$j155 = "";}elseif($row['e_j15'] == "5"){$j155 = "checked";$j151 = "";$j152 = "";$j153 = "";$j154 = "";}else{$j151 = "";$j152 = "";$j153 = "";$j154 = "";$j155 = "";}

if($row['e_j16'] == "1"){$j161 = "checked";$j162 = "";$j163 = "";$j164 = "";$j165 = "";}elseif($row['e_j16'] == "2"){$j162 = "checked";$j161 = "";$j163 = "";$j164 = "";$j165 = "";}elseif($row['e_j16'] == "3"){$j163 = "checked";$j161 = "";$j162 = "";$j164 = "";$j165 = "";}elseif($row['e_j16'] == "4"){$j164 = "checked";$j161 = "";$j162 = "";$j163 = "";$j165 = "";}elseif($row['e_j16'] == "5"){$j165 = "checked";$j161 = "";$j162 = "";$j163 = "";$j164 = "";}else{$j161 = "";$j162 = "";$j163 = "";$j164 = "";$j165 = "";}

if($row['e_j20'] == "1"){$j201 = "checked";$j202 = "";$j203 = "";$j204 = "";$j205 = "";}elseif($row['e_j20'] == "2"){$j202 = "checked";$j201 = "";$j203 = "";$j204 = "";$j205 = "";}elseif($row['e_j20'] == "3"){$j203 = "checked";$j201 = "";$j202 = "";$j204 = "";$j205 = "";}elseif($row['e_j20'] == "4"){$j204 = "checked";$j201 = "";$j202 = "";$j203 = "";$j205 = "";}elseif($row['e_j20'] == "5"){$j205 = "checked";$j201 = "";$j202 = "";$j203 = "";$j204 = "";}else{$j201 = "";$j202 = "";$j203 = "";$j204 = "";$j205 = "";}

if($row['e_j21'] == "1"){$j211 = "checked";$j212 = "";$j213 = "";$j214 = "";$j215 = "";}elseif($row['e_j21'] == "2"){$j212 = "checked";$j211 = "";$j213 = "";$j214 = "";$j215 = "";}elseif($row['e_j21'] == "3"){$j213 = "checked";$j211 = "";$j212 = "";$j214 = "";$j215 = "";}elseif($row['e_j21'] == "4"){$j214 = "checked";$j211 = "";$j212 = "";$j213 = "";$j215 = "";}elseif($row['e_j21'] == "5"){$j215 = "checked";$j211 = "";$j212 = "";$j213 = "";$j214 = "";}else{$j211 = "";$j212 = "";$j213 = "";$j214 = "";$j215 = "";}

$j22 = $row['e_j22'];

$select2 = "
SELECT *
FROM pilih a, kursus b
WHERE a.p_id LIKE '$pid' AND a.p_kid = b.k_id
ORDER BY p_id ASC
";
$result2 = mysql_query($select2) or die("Query failed");
$row2 = mysql_fetch_assoc($result2);

}else{ print ""; }
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="penilaian.php">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" style="border-style:collapse;">
  <tr>
    <td align="left"><img src="images/kkmm.png" border="0" width="200"></td>
    <td align="center"><img src="images/jata.png" border="0" width="100"></td>
    <td align="right"><img src="images/ipptar.png" border="0" width="200"></td>
  </tr>
  <tr>
  	<td colspan="3" align="center"><b>BORANG PENILAIAN KURSUS</b></td>
  </tr>
</table>
<br/>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" style="border-style:collapse;background-color:#f2f2f0">
  <tr>
    <td>NAMA KURSUS:</td>
    <td colspan="7"><b><?php /*print $row2['k_code'];*/ ?><?php print $row2['k_name']; ?></b></td>
  </tr>
  <tr>
    <td>TARIKH:</td>
    <td colspan="7"><b><?php print date("d-m-Y", strtotime($row2["k_sdate"])); ?> sehingga <?php print date("d-m-Y", strtotime($row2["k_edate"])); ?></b></td>
  </tr>
  <tr>
    <td width="30%">DARI MANA ANDA MENDAPAT MAKLUM TENTANG KURSUS INI<br />(Loretkan mana yang berkenaan)</td>
    <td width="10%" valign="top"><input type="radio" name="j1" value="1" <?php print $j11; ?>> <em>Facebook </em>IPPTAR RASMI</td>
    <td width="10%" valign="top"><input type="radio" name="j1" value="2" <?php print $j12; ?>> Laman Sesawang IPPTAR</td>
    <td width="10%" valign="top"><input type="radio" name="j1" value="3" <?php print $j13; ?>> <em>Blast Email </em></td>
    <td width="10%" valign="top"><input type="radio" name="j1" value="4" <?php print $j14; ?>> Jadual Tahunan IPPTAR</td>
    <td width="10%" valign="top"><input type="radio" name="j1" value="5" <?php print $j15; ?>> Rakan Rakan</td>
    <td width="10%" valign="top"><input type="radio" name="j1" value="6" <?php print $j16; ?>> Hebahan Surat</td>
    <td width="10%" valign="top"><input type="radio" name="j1" value="7" <?php print $j17; ?>> TV/Radio/Surat Khabar</td>
  </tr>
</table>
<br/>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" style="border-style:collapse;background-color:#f2f2f0">
  <tr>
    <td width="30%">OBJEKTIF KURSUS</td>
    <td width="40%">Adakah kursus ini mencapai objektif?</td>
    <td width="15%" colspan="3"><input type="radio" name="j2" value="1" <?php print $j21; ?>> YA</td>
    <td width="15%" colspan="3"><input type="radio" name="j2" value="2" <?php print $j22; ?>> TIDAK</td>
  </tr>
  <tr>
    <td rowspan="2"><p>PENAMBAHAN PENGETAHUAN DAN KEMAHIRAN</p></td>
    <td>Pengetahuan yang berkaitan</td>
    <td><input type="radio" name="j3" value="1" <?php print $j31; ?>>1</td>
    <td><input type="radio" name="j3" value="2" <?php print $j32; ?>>2</td>
    <td colspan="2"><input type="radio" name="j3" value="3" <?php print $j33; ?>>3</td>
    <td><input type="radio" name="j3" value="4" <?php print $j34; ?>>4</td>
    <td><input type="radio" name="j3" value="5" <?php print $j35; ?>>5</td>
  </tr>
  <tr>
    <td>Kemahiran di dalam bidang yang berkaitan</td>
    <td><input type="radio" name="j4" value="1" <?php print $j41; ?>> 1</td>
    <td><input type="radio" name="j4" value="2" <?php print $j42; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j4" value="3" <?php print $j43; ?>> 3</td>
    <td><input type="radio" name="j4" value="4" <?php print $j44; ?>> 4</td>
    <td><input type="radio" name="j4" value="5" <?php print $j45; ?>> 5</td>
  </tr>
  <tr>
    <td rowspan="4">ISI KANDUNGAN</td>
    <td>Kesesuaian pemilihan kursus</td>
    <td><input type="radio" name="j5" value="1" <?php print $j51; ?>> 1</td>
    <td><input type="radio" name="j5" value="2" <?php print $j52; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j5" value="3" <?php print $j53; ?>> 3</td>
    <td><input type="radio" name="j5" value="4" <?php print $j54; ?>> 4</td>
    <td><input type="radio" name="j5" value="5" <?php print $j55; ?>> 5</td>
  </tr>
  <tr>
    <td>Kesinambungan topik-topik</td>
    <td><input type="radio" name="j6" value="1" <?php print $j61; ?>> 1</td>
    <td><input type="radio" name="j6" value="2" <?php print $j62; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j6" value="3" <?php print $j63; ?>> 3</td>
    <td><input type="radio" name="j6" value="4" <?php print $j64; ?>> 4</td>
    <td><input type="radio" name="j6" value="5" <?php print $j65; ?>> 5</td>
  </tr>
  <tr>
    <td>Penekanan kepada teori</td>
    <td><input type="radio" name="j7" value="1" <?php print $j71; ?>> 1</td>
    <td><input type="radio" name="j7" value="2" <?php print $j72; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j7" value="3" <?php print $j73; ?>> 3</td>
    <td><input type="radio" name="j7" value="4" <?php print $j74; ?>> 4</td>
    <td><input type="radio" name="j7" value="5" <?php print $j75; ?>> 5</td>
  </tr>
  <tr>
    <td>Penekanan kepada praktis</td>
    <td><input type="radio" name="j8" value="1" <?php print $j81; ?>> 1</td>
    <td><input type="radio" name="j8" value="2" <?php print $j82; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j8" value="3" <?php print $j83; ?>> 3</td>
    <td><input type="radio" name="j8" value="4" <?php print $j84; ?>> 4</td>
    <td><input type="radio" name="j8" value="5" <?php print $j85; ?>> 5</td>
  </tr>
  <tr>
    <td rowspan="4">TEKNIK LATIHAN </td>
    <td>Perbincangan Kumpulan</td>
    <td><input type="radio" name="j9" value="1" <?php print $j91; ?>> 1</td>
    <td><input type="radio" name="j9" value="2" <?php print $j92; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j9" value="3" <?php print $j93; ?>> 3</td>
    <td><input type="radio" name="j9" value="4" <?php print $j94; ?>> 4</td>
    <td><input type="radio" name="j9" value="5" <?php print $j95; ?>> 5</td>
  </tr>
  <tr>
    <td>Syarahan / Ceramah</td>
    <td><input type="radio" name="j10" value="1" <?php print $j101; ?>> 1</td>
    <td><input type="radio" name="j10" value="2" <?php print $j102; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j10" value="3" <?php print $j103; ?>> 3</td>
    <td><input type="radio" name="j10" value="4" <?php print $j104; ?>> 4</td>
    <td><input type="radio" name="j10" value="5" <?php print $j105; ?>> 5</td>
  </tr>
  <tr>
    <td>Latih Amal</td>
    <td><input type="radio" name="j11" value="1" <?php print $j111; ?>> 1</td>
    <td><input type="radio" name="j11" value="2" <?php print $j112; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j11" value="3" <?php print $j113; ?>> 3</td>
    <td><input type="radio" name="j11" value="4" <?php print $j114; ?>> 4</td>
    <td><input type="radio" name="j11" value="5" <?php print $j115; ?>> 5</td>
  </tr>
  <tr>
    <td>Nota</td>
    <td><input type="radio" name="j12" value="1" <?php print $j121; ?>> 1</td>
    <td><input type="radio" name="j12" value="2" <?php print $j122; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j12" value="3" <?php print $j123; ?>> 3</td>
    <td><input type="radio" name="j12" value="4" <?php print $j124; ?>> 4</td>
    <td><input type="radio" name="j12" value="5" <?php print $j125; ?>> 5</td>
  </tr>
  <tr>
    <td rowspan="4">PENGURUSAN KURSUS &amp; KEMUDAHAN</td>
    <td>Tempoh masa kursus</td>
    <td><input type="radio" name="j13" value="1" <?php print $j131; ?>> 1</td>
    <td><input type="radio" name="j13" value="2" <?php print $j132; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j13" value="3" <?php print $j133; ?>> 3</td>
    <td><input type="radio" name="j13" value="4" <?php print $j134; ?>> 4</td>
    <td><input type="radio" name="j13" value="5" <?php print $j135; ?>> 5</td>
  </tr>
  <tr>
    <td>Makanan</td>
    <td><input type="radio" name="j14" value="1" <?php print $j141; ?>> 1</td>
    <td><input type="radio" name="j14" value="2" <?php print $j142; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j14" value="3" <?php print $j143; ?>> 3</td>
    <td><input type="radio" name="j14" value="4" <?php print $j144; ?>> 4</td>
    <td><input type="radio" name="j14" value="5" <?php print $j145; ?>> 5</td>
  </tr>
  <tr>
    <td>Penginapan *(Abaikan jika tidak berkaitan)</td>
    <td><input type="radio" name="j15" value="1" <?php print $j151; ?>> 1</td>
    <td><input type="radio" name="j15" value="2" <?php print $j152; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j15" value="3" <?php print $j153; ?>> 3</td>
    <td><input type="radio" name="j15" value="4" <?php print $j154; ?>> 4</td>
    <td><input type="radio" name="j15" value="5" <?php print $j155; ?>> 5</td>
  </tr>
  <tr>
    <td>Komputer/Peralatan *(Abaikan jika tidak berkaitan)</td>
    <td><input type="radio" name="j16" value="1" <?php print $j161; ?>> 1</td>
    <td><input type="radio" name="j16" value="2" <?php print $j162; ?>> 2</td>
    <td colspan="2"><input type="radio" name="j16" value="3" <?php print $j163; ?>> 3</td>
    <td><input type="radio" name="j16" value="4" <?php print $j164; ?>> 4</td>
    <td><input type="radio" name="j16" value="5" <?php print $j165; ?>> 5</td>
  </tr>
  <tr><td colspan="8"><hr size="1"></td></tr>
<?php
$select = "
SELECT COUNT(e_pid) AS total
FROM epenilaian_ticer
WHERE e_pid LIKE '".$pid."'
ORDER BY e_pid DESC
";
$result = mysql_query($select) or die("Query failed...");
$row = mysql_fetch_assoc($result);

if($row['total'] > "0"){
	
	$select = "
	SELECT *
	FROM epenilaian_ticer a, ticer b
	WHERE e_tid = b.t_id AND e_pid LIKE '".$pid."'
	ORDER BY e_pid DESC
	";
	$result = mysql_query($select) or die("Query failed...");
	$i=0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
?>

	  <tr>
	    <td rowspan="3">PENCERAMAH : <?php print $row['t_nama']; ?><input type="hidden" name="tid[<?php print $i; ?>]" value="<?php print $row['t_id']; ?>"></td>
	    <td>Ketepatan kandungan ceramah dengan tajuk latihan</td>
	    <td>			<input type="radio" name="j17[<?php print $i; ?>]" value="1" <?php if($row['e_j17']=="1") {echo "checked";}else{}?>> 1</td>
	    <td>			<input type="radio" name="j17[<?php print $i; ?>]" value="2" <?php if($row['e_j17']=="2") {echo "checked";}else{}?>> 2</td>
	    <td colspan="2"><input type="radio" name="j17[<?php print $i; ?>]" value="3" <?php if($row['e_j17']=="3") {echo "checked";}else{}?>> 3</td>
	    <td>			<input type="radio" name="j17[<?php print $i; ?>]" value="4" <?php if($row['e_j17']=="4") {echo "checked";}else{}?>> 4</td>
	    <td>			<input type="radio" name="j17[<?php print $i; ?>]" value="5" <?php if($row['e_j17']=="5") {echo "checked";}else{}?>> 5</td>
	  </tr>
	  <tr>
	    <td>Keberkesanan persembahan dan pendekatan</td>
	    <td>			<input type="radio" name="j18[<?php print $i; ?>]" value="1" <?php if($row['e_j18']=="1") {echo "checked";}else{}?>> 1</td>
	    <td>			<input type="radio" name="j18[<?php print $i; ?>]" value="2" <?php if($row['e_j18']=="2") {echo "checked";}else{}?>> 2</td>
	    <td colspan="2"><input type="radio" name="j18[<?php print $i; ?>]" value="3" <?php if($row['e_j18']=="3") {echo "checked";}else{}?>> 3</td>
	    <td>			<input type="radio" name="j18[<?php print $i; ?>]" value="4" <?php if($row['e_j18']=="4") {echo "checked";}else{}?>> 4</td>
	    <td>			<input type="radio" name="j18[<?php print $i; ?>]" value="5" <?php if($row['e_j18']=="5") {echo "checked";}else{}?>> 5</td>
	  </tr>
	  <tr>
	    <td>Pengetahuan kepakaran mengenai tajuk ceramah</td>
	    <td>			<input type="radio" name="j19[<?php print $i; ?>]" value="1" <?php if($row['e_j19']=="1") {echo "checked";}else{}?>> 1</td>
	    <td>			<input type="radio" name="j19[<?php print $i; ?>]" value="2" <?php if($row['e_j19']=="2") {echo "checked";}else{}?>> 2</td>
	    <td colspan="2"><input type="radio" name="j19[<?php print $i; ?>]" value="3" <?php if($row['e_j19']=="3") {echo "checked";}else{}?>> 3</td>
	    <td>			<input type="radio" name="j19[<?php print $i; ?>]" value="4" <?php if($row['e_j19']=="4") {echo "checked";}else{}?>> 4</td>
	    <td>			<input type="radio" name="j19[<?php print $i; ?>]" value="5" <?php if($row['e_j19']=="5") {echo "checked";}else{}?>> 5</td>
	  </tr>	

<?php	
	
	$i++;
	}
	
}else{
	
	$select = "
	SELECT *
	FROM pilih a, ticer b
	WHERE a.p_id LIKE '$pid' AND a.p_kid = b.t_kid
	ORDER BY a.p_id DESC
	";
	$result = mysql_query($select) or die("Query failed...");
	$i=0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
			
?>  
	  <tr>
	    <td rowspan="3">PENCERAMAH : <?php print $row['t_nama']; ?><input type="hidden" name="tid[<?php print $i; ?>]" value="<?php print $row['t_id']; ?>"></td>
	    <td>Ketepatan kandungan ceramah dengan tajuk latihan</td>
	    <td>			<input type="radio" name="j17<?php print $i; ?>" value="1"> 1</td>
	    <td>			<input type="radio" name="j17<?php print $i; ?>" value="2"> 2</td>
	    <td colspan="2"><input type="radio" name="j17<?php print $i; ?>" value="3"> 3</td>
	    <td>			<input type="radio" name="j17<?php print $i; ?>" value="4"> 4</td>
	    <td>			<input type="radio" name="j17<?php print $i; ?>" value="5"> 5</td>
	  </tr>
	  <tr>
	    <td>Keberkesanan persembahan dan pendekatan</td>
	    <td>			<input type="radio" name="j18<?php print $i; ?>" value="1"> 1</td>
	    <td>			<input type="radio" name="j18<?php print $i; ?>" value="2"> 2</td>
	    <td colspan="2"><input type="radio" name="j18<?php print $i; ?>" value="3"> 3</td>
	    <td>			<input type="radio" name="j18<?php print $i; ?>" value="4"> 4</td>
	    <td>			<input type="radio" name="j18<?php print $i; ?>" value="5"> 5</td>
	  </tr>
	  <tr>
	    <td>Pengetahuan kepakaran mengenai tajuk ceramah</td>
	    <td>			<input type="radio" name="j19<?php print $i; ?>" value="1"> 1</td>
	    <td>			<input type="radio" name="j19<?php print $i; ?>" value="2"> 2</td>
	    <td colspan="2"><input type="radio" name="j19<?php print $i; ?>" value="3"> 3</td>
	    <td>			<input type="radio" name="j19<?php print $i; ?>" value="4"> 4</td>
	    <td>			<input type="radio" name="j19<?php print $i; ?>" value="5"> 5</td>
	  </tr>
	  
<?php

	$i++;
	}

}
?>
  <tr><td colspan="8"><hr size="1"></td></tr>
  <tr>
    <td rowspan="2">FAEDAH KURSUS</td>
    <td>Adakah anda telah mendapat manfaat dari menghadiri kursus ini?</td>
    <td colspan="3"><input type="radio" name="j20" value="1" <?php print $j201; ?>> YA</td>
    <td colspan="3"><input type="radio" name="j20" value="2" <?php print $j202; ?>> TIDAK</td>
  </tr>
  <tr>
    <td>Adakah anda ingin memperakukan kursus ini kepada orang lain?</td>
    <td colspan="3"><input type="radio" name="j21" value="1" <?php print $j211; ?>> YA </td>
    <td colspan="3"><input type="radio" name="j21" value="2" <?php print $j212; ?>> TIDAK </td>
  </tr>
</table>
<br />
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" style="border-style:collapse;background-color:#f2f2f0">
  <tr>
    <td width="30%">CADANGAN ATAU KOMEN MEMBINA</td>
    <td valign="top"><textarea name="j22" rows="4" cols="50"><?php print $j22; ?></textarea></td>
  </tr>
</table>
<br />
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" style="border-style:collapse;">
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center"><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value="<?php print $rawak ?>" readonly="true" style="font-family:comic sans ms; font-size:25px; font-style:italic; color:black; border:0;  text-align:center" size="9" disabled></td></tr>
<tr><td colspan="3" align="center">Sila taip kembali kod seperti di atas.<br /><input name="vercode" type="text" maxlength="6" placeholder="Code" required /></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="pensemak" />
<input type="hidden" name="pid" id="pid" value="<?php print $pid; ?>">
<input type="hidden" name="i" id="i" value="<?php print $i; ?>">
<input type="submit" name="button" id="button" value="  HANTAR  ">&nbsp;
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container2-->

<?php
include("bottom.php");
?>