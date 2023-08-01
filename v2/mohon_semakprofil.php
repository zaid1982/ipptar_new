<?php 
session_start();
include("conn.php");
include("top.php");
?>
<body>
<div id="container2">
<?php
$kid = (int)$_GET['kid'];
	
/* $select = "
SELECT *
FROM user
WHERE u_id LIKE '$_SESSION[UsrID]'
ORDER BY u_id ASC
LIMIT 1
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result); */

// add parameterized query
$row = sqlSelect('SELECT * FROM user WHERE u_id = ? ORDER BY u_id ASC', array(addslashes($_SESSION['UsrID'])));

$pieces01 = explode("-", $row['u_dob']);
$dtahun = $pieces01[0];
$dbulan = $pieces01[1];
$dhari = $pieces01[2];

$pieces02 = explode("-", $row['u_tkhlantik']);
$ltahun = $pieces02[0];
$lbulan = $pieces02[1];
$lhari = $pieces02[2];

/* $select2 = "
SELECT *
FROM kursus
WHERE k_id LIKE '$kid'
ORDER BY k_id ASC
LIMIT 1
";
$result2 = mysql_query($select2) or die("Query failed");
$row2 = mysql_fetch_assoc($result2); */

// add parameterized query
$row2 = sqlSelect('SELECT * FROM kursus WHERE k_id LIKE ? ORDER BY k_id ASC', array(addslashes($kid)));

?>
<div id="content"> 

<form id="form1" name="form1" method="GET" action="mohon.php">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
<tr><td colspan="3" style="font-weight:bold">MAKLUMAT PEMOHON</td></tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Pemohon</td></tr>
<tr>
<td align="right" width="20%">No K/P Baru</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_idnum'] ?></td>
</tr>
<tr>
<td align="right">Nama</td>
<td>  : </td>
<td>&nbsp;<?php print $row['u_nama'] ?></td>
</tr>
<tr>
<td align="right">Jantina</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jantina'] ?></td>
</tr>
<tr>
<td align="right">Tarikh Lahir</td>
<td> : </td>
<!--<td>&nbsp;<?php print $row['u_dob'] ?></td>-->
<td>
<select name="tlhari">
<option value="" disabled selected>hari</option>
<?php
/* $sqlh01 = "SELECT * FROM hari ORDER BY h_id ASC";	
$resulth01 = mysql_query($sqlh01) or die(mysql_error()); */

// add parameterized query
$resulth01 = sqlSelect('SELECT * FROM hari ORDER BY h_id ASC', NULL, true);

foreach ($resulth01 as $rowh01) {
// while ($rowh01 = mysql_fetch_assoc($resulth01)) {
if($rowh01['h_name'] == $dhari){
	$tunjukh01 = "selected";
}else{
	$tunjukh01 = "";
}
print "<option value='$rowh01[h_name]' $tunjukh01>$rowh01[h_name]</option>";
}
?>
</select>
<select name="tlbulan">
<option value="" disabled selected>bulan</option>
<?php
$sqlm01 = "SELECT * FROM bulan ORDER BY m_id ASC";	
$resultm01 = mysql_query($sqlm01) or die(mysql_error());

while ($rowm01 = mysql_fetch_assoc($resultm01)) {
if($rowm01['m_code'] == $dbulan){
	$tunjukm01 = "selected";
}else{
	$tunjukm01 = "";
}
print "<option value='$rowm01[m_code]' $tunjukm01>$rowm01[m_name]</option>";
}
?>
</select>
<input type="number" name="tltahun" id="tltahun" value="<?php print $dtahun; ?>" size="8" maxlength="4"  placeholder="&nbsp;Tahun">
</td>
</tr>
<tr>
<td align="right">No Telefon Bimbit</td>
<td> :</td>
<td>&nbsp;<?php print $row['u_tel'] ?></td>
</tr>

<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Perkhidmatan</td></tr>
<tr>
<td align="right">Jawatan</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jwt'] ?></td>
</tr>
<tr>
<td align="right">Peringkat</td>
<td> : </td>
<!--<td>&nbsp;<?php print $row['u_jwttingkat'] ?></td>-->
<td>
<select name="peringkat">
<option value="" disabled selected>peringkat</option>
<?php
$sqlr = "SELECT * FROM peringkat ORDER BY r_id ASC";	
$resultr = mysql_query($sqlr) or die(mysql_error());

while ($rowr = mysql_fetch_assoc($resultr)) {
if($rowr['r_id'] == $row['u_jwttingkat']){
	$tunjukr = "selected";
}else{
	$tunjukr = "";
}
print "<option value='$rowr[r_id]' $tunjukr>$rowr[r_name]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">Klasifikasi Perkhidmatan</td>
<td> : </td>
<!--<td>&nbsp;<?php print $row['u_jwtklas'] ?></td>-->
<td>
<select name="klasifikasi">
<option value="" disabled selected>klasifikasi</option>
<?php
$sqlk = "SELECT * FROM klasifikasi ORDER BY k_id ASC";	
$resultk = mysql_query($sqlk) or die(mysql_error());

while ($rowk = mysql_fetch_assoc($resultk)) {
if($rowk['k_id'] == $row['u_jwtklas']){
	$tunjukk = "selected";
}else{
	$tunjukk = "";
}
print "<option value='$rowk[k_id]' $tunjukk>$rowk[k_name]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">Gred Jawatan</td>
<td> : </td>
<!--<td>&nbsp;<?php print $row['u_jwtgred'] ?></td>-->
<td>
<select name="gred">
<option value="" disabled selected>gred</option>
<?php
$sqlg = "SELECT * FROM gred ORDER BY g_id ASC";	
$resultg = mysql_query($sqlg) or die(mysql_error());

while ($rowg = mysql_fetch_assoc($resultg)) {
if($rowg['g_id'] == $row['u_jwtgred']){
	$tunjukg = "selected";
}else{
	$tunjukg = "";
}
print "<option value='$rowg[g_id]' $tunjukg>$rowg[g_name]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">Taraf Perjawatan</td>
<td> : </td>
<!--<td>&nbsp;<?php print $row['u_jwttaraf'] ?></td>-->
<td>
<select name="taraf">
<option value="" disabled selected>taraf</option>
<?php
$sqltj = "SELECT * FROM tarafjwt ORDER BY t_id ASC";	
$resulttj = mysql_query($sqltj) or die(mysql_error());

while ($rowtj = mysql_fetch_assoc($resulttj)) {
if($rowtj['t_id'] == $row['u_jwttaraf']){
	$tunjuktj = "selected";
}else{
	$tunjuktj = "";
}
print "<option value='$rowtj[t_id]' $tunjuktj>$rowtj[t_name]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">Jenis Perkhidmatan</td>
<td> : </td>
<!--<td>&nbsp;<?php print $row['u_jkhidmat'] ?></td>-->
<td>
<select name="khidmat">
<option value="" disabled selected>jenis</option>
<?php
$sqljk = "SELECT * FROM jnskhidmat ORDER BY j_id ASC";	
$resultjk = mysql_query($sqljk) or die(mysql_error());

while ($rowjk = mysql_fetch_assoc($resultjk)) {
if($rowjk['j_id'] == $row['u_jwttaraf']){
	$tunjukjk = "selected";
}else{
	$tunjukjk = "";
}
print "<option value='$rowjk[j_id]' $tunjukjk>$rowjk[j_name]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">Tarikh Lantikan Ke Jawatan Ini</td>
<td> : </td>
<!--<td>&nbsp;<?php print $row['u_tkhlantik'] ?></td>-->
<td>
<select name="hari_lantik">
<option value="" disabled selected>hari</option>
<?php
$sqlh02 = "SELECT * FROM hari ORDER BY h_id ASC";	
$resulth02 = mysql_query($sqlh02) or die(mysql_error());

while ($rowh02 = mysql_fetch_assoc($resulth02)) {
if($rowh02['h_name'] == $lhari){
	$tunjukh02 = "selected";
}else{
	$tunjukh02 = "";
}
print "<option value='$rowh02[h_name]' $tunjukh02>$rowh02[h_name]</option>";
}
?>
</select>
<select name="bulan_lantik">
<option value="" disabled selected>bulan</option>
<?php
$sqlm02 = "SELECT * FROM bulan ORDER BY m_id ASC";	
$resultm02 = mysql_query($sqlm02) or die(mysql_error());

while ($rowm02 = mysql_fetch_assoc($resultm02)) {
if($rowm02['m_code'] == $lbulan){
	$tunjukm02 = "selected";
}else{
	$tunjukm02 = "";
}
print "<option value='$rowm02[m_code]' $tunjukm02>$rowm02[m_name]</option>";
}
?>
</select>
<input type="number" name="tahun_lantik" id="tahun_lantik" value="<?php print $ltahun; ?>" size="8" maxlength="4"  placeholder="&nbsp;Tahun">
</td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_emel'] ?></td>
</tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Pegawai Yang Meluluskan (Pegawai Penyelia) </td></tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_knama'] ?></td>
</tr>
<tr>
<td align="right">Jawatan</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_kjwt'] ?></td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_kemel'] ?></td>
</tr>
<tr>
<td align="right">Alamat Pegawai Jabatan</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_alamatkjab'] ?></td>
</tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Tempat Bertugas</td></tr>
<tr>
<td align="right">Nama Jabatan</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jab'] ?></td>
</tr>
<tr>
<td align="right">Alamat Jabatan</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jabaddr1'] ?></td>
</tr>
<tr>
<td align="right"></td>
<td>&nbsp;</td>
<td>&nbsp;<?php print $row['u_jabaddr2'] ?></td>
</tr>
<tr>
<td align="right">Poskod</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jabpkod'] ?></td>
</tr>
<tr>
<td align="right">Bandar</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jabbandar'] ?></td>
</tr>
<tr>
<td align="right">Negeri</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jabnegeri'] ?></td>
</tr>
<tr>
<td align="right">No Telefon Pejabat</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jabtel'] ?></td>
</tr>
<tr>
<td align="right">No Fax Pejabat</td>
<td> : </td>
<td>&nbsp;<?php print $row['u_jabfax'] ?></td>
</tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Keperluan Penginapan</td></tr>
<tr>
    <td colspan="3">
	Adakah anda memerlukan penginapan asrama semasa kursus?
	<input type="radio" name="asrama" value="1"> YA
	<input type="radio" name="asrama" value="2" required> TIDAK 
    </td>
</tr>
<!--
<tr>
<td colspan="3" align="center">
<input type="hidden" name="kid" id="kid" value="<?php print $kid ?>">
<input type="hidden" name="u_idnum" id="u_idnum" value="<?php print $row['u_idnum'] ?>">
<input type="hidden" name="u_nama" id="u_nama" value="<?php print $row['u_nama'] ?>">
<input type="hidden" name="u_emel" id="u_emel" value="<?php print $row['u_emel'] ?>">
<input type="hidden" name="u_jab" id="u_jab" value="<?php print $row['u_jab'] ?>">
<input type="hidden" name="u_knama" id="u_knama" value="<?php print $row['u_knama'] ?>">
<input type="hidden" name="u_kemel" id="u_kemel" value="<?php print $row['u_kemel'] ?>">
<input type="hidden" name="k_code" id="k_code" value="<?php print $row2['k_code'] ?>">
<input type="hidden" name="k_name" id="k_name" value="<?php print $row2['k_name'] ?>">
<input type="hidden" name="k_loc" id="k_loc" value="<?php print $row2['k_loc'] ?>">
<input type="hidden" name="k_obj" id="k_obj" value="<?php print $row2['k_obj'] ?>">
<input type="hidden" name="k_sdate" id="k_sdate" value="<?php print $row2['k_sdate'] ?>">
<input type="hidden" name="k_edate" id="k_edate" value="<?php print $row2['k_edate'] ?>">
<input type="hidden" name="k_time" id="k_time" value="<?php print $row2['k_time'] ?>">
<input type="submit" name="button" id="button" value="  MOHON KURSUS  ">
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">

</td>
</tr>
-->
<tr>
<td colspan="3" align="center">
<?php $_SESSION['u_idnum'] 	=  $row['u_idnum'] ?>
<?php $_SESSION['u_nama'] 	=  $row['u_nama'] ?>
<?php $_SESSION['u_emel'] 	=  $row['u_emel'] ?>
<?php $_SESSION['u_jab'] 		=  $row['u_jab'] ?>
<?php $_SESSION['u_knama'] 	=  $row['u_knama'] ?>
<?php $_SESSION['u_kemel'] 	=  $row['u_kemel'] ?>
<?php $_SESSION['k_code'] 	=  $row2['k_code'] ?>
<?php $_SESSION['k_name'] 	=  $row2['k_name'] ?>
<?php $_SESSION['k_loc'] 		=  $row2['k_loc'] ?>
<?php $_SESSION['k_obj'] 		=  $row2['k_obj'] ?>
<?php $_SESSION['k_sdate'] 	=  $row2['k_sdate'] ?>
<?php $_SESSION['k_edate'] 	=  $row2['k_edate'] ?>
<?php $_SESSION['k_time'] 	=  $row2['k_time'] ?>
<input type="hidden" name="kid" id="kid" value="<?php print $kid ?>">
<input type="hidden" name="terai" id="terai" value="3">
<input type="submit" name="button" id="button" value="  MOHON KURSUS  ">
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