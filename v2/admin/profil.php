<?php session_start(); ?>
<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="container2">
<?php
include("../conn.php");

$qstr=$_SERVER['QUERY_STRING'];

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "profil") {

	$tkhlahir 	= $_SESSION['tltahun']."-".$_SESSION['tlbulan']."-".$_SESSION['tlhari'];
	$tkhlantik 	= $_SESSION['tahun_lantik']."-".$_SESSION['bulan_lantik']."-".$_SESSION['hari_lantik'];	

	/* $select = "
	SELECT *
	FROM user
	WHERE u_idnum LIKE '$_SESSION[idnum]'
	ORDER BY u_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result);
	$numrows = mysql_num_rows($result); */

	// add parameterized query
	$rowCount = sqlSelect(
		'SELECT count(*) AS total FROM user WHERE u_idnum = ? ORDER BY u_id ASC', 
		array($_SESSION['idnum'])
	);
	$result = sqlSelect(
		'SELECT * FROM user WHERE u_idnum = ? ORDER BY u_id ASC', 
		array($_SESSION['idnum'])
	);

	// if($numrows == "1") {
	if ($rowCount['total'] == 1) {

		/* $sql = "UPDATE user SET u_nama = '$_SESSION[nama]', u_jantina = '$_SESSION[jantina]', u_dob = '$tkhlahir', u_tel = '$_SESSION[tel]', u_jwt = '$_SESSION[jawatan]', u_jwttingkat = '$_SESSION[peringkat]', u_jwtklas = '$_SESSION[klasifikasi]', u_jwtgred = '$_SESSION[gred]', u_jwttaraf = '$_SESSION[taraf]', u_jkhidmat = '$_SESSION[khidmat]', u_tkhlantik = '$tkhlantik', u_emel = '$_SESSION[emel]', u_knama = '$_SESSION[ketua]', u_kjwt = '$_SESSION[ketuajwt]', u_kemel = '$_SESSION[ketuaemel]', u_alamatkjab = '$_SESSION[alamatkjab]', u_jab = '$_SESSION[jab]', u_jabaddr1 = '$_SESSION[jabaddr1]', u_jabaddr2 = '$_SESSION[jabaddr2]', u_jabpkod = '$_SESSION[jabpkod]', u_jabbandar = '$_SESSION[jabbandar]', u_jabnegeri = '$_SESSION[jabnegeri]', u_jabtel = '$_SESSION[jabtel]', u_jabfax = '$_SESSION[jabfax]', u_skop = '$_SESSION[skop]' WHERE u_idnum = '$_SESSION[idnum]'";
		$result = mysql_query($sql) or die(mysql_error()); */

		// add parameterized query
		$sql = sqlUpdate(
			'UPDATE user SET u_nama = ?, u_jantina = ?, u_dob = ?, u_tel = ?, u_jwt = ?, u_jwttingkat = ?, u_jwtklas = ?, u_jwtgred = ?, u_jwttaraf = ?, u_jkhidmat = ?, u_tkhlantik = ?, u_emel = ?, u_knama = ?, u_kjwt = ?, u_kemel = ?, u_alamatkjab = ?, u_jab = ?, u_jabaddr1 = ?, u_jabaddr2 = ?, u_jabpkod = ?, u_jabbandar = ?, u_jabnegeri = ?, u_jabtel = ?, u_jabfax = ?, u_skop = ? WHERE u_idnum = ?', 
			array(
				$_SESSION['nama'], 
				$_SESSION['jantina'], 
				$tkhlahir, 
				$_SESSION['tel'], 
				$_SESSION['jawatan'], 
				$_SESSION['peringkat'], 
				$_SESSION['klasifikasi'], 
				$_SESSION['gred'], 
				$_SESSION['taraf'], 
				$_SESSION['khidmat'], 
				$tkhlantik, 
				$_SESSION['emel'], 
				$_SESSION['ketua'], 
				$_SESSION['ketuajwt'], 
				$_SESSION['ketuaemel'], 
				$_SESSION['alamatkjab'], 
				$_SESSION['jab'], 
				$_SESSION['jabaddr1'], 
				$_SESSION['jabaddr2'], 
				$_SESSION['jabpkod'], 
				$_SESSION['jabbandar'], 
				$_SESSION['jabnegeri'], 
				$_SESSION['jabtel'], 
				$_SESSION['jabfax'], 
				$_SESSION['skop'], 
				$_SESSION['idnum']
			)
		);
		
	} else {
		
		/* $sql = "INSERT INTO user (u_idnum, u_nama, u_jantina, u_dob, u_tel, u_jwt, u_jwttingkat, u_jwtklas, u_jwtgred, u_jwttaraf, u_jkhidmat, u_tkhlantik, u_emel, u_knama, u_kjwt, u_kemel, u_alamatkjab, u_jab, u_jabaddr1, u_jabaddr2, u_jabpkod, u_jabbandar, u_jabnegeri, u_jabtel, u_jabfax)
		VALUES ('$_SESSION[idnum]', '$_SESSION[nama]', '$_SESSION[jantina]', '$tkhlahir','$_SESSION[tel]','$_SESSION[jawatan]','$_SESSION[peringkat]','$_SESSION[klasifikasi]','$_SESSION[gred]','$_SESSION[taraf]','$_SESSION[khidmat]','$tkhlantik','$_SESSION[emel]','$_SESSION[ketua]','$_SESSION[ketuajwt]','$_SESSION[ketuaemel]','$_SESSION[alamatkjab]','$_SESSION[jab]','$_SESSION[jabaddr1]','$_SESSION[jabaddr2]','$_SESSION[jabpkod]','$_SESSION[jabbandar]','$_SESSION[jabnegeri]','$_SESSION[jabtel]','$_SESSION[jabfax]')";
		$result = mysql_query($sql) or die(mysql_error()); */

		// add parameterized query
		$sql = sqlInsert(
			'INSERT INTO user (u_idnum, u_nama, u_jantina, u_dob, u_tel, u_jwt, u_jwttingkat, u_jwtklas, u_jwtgred, u_jwttaraf, u_jkhidmat, u_tkhlantik, u_emel, u_knama, u_kjwt, u_kemel, u_alamatkjab, u_jab, u_jabaddr1, u_jabaddr2, u_jabpkod, u_jabbandar, u_jabnegeri, u_jabtel, u_jabfax) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
			array(
				$_SESSION['idnum'],
				$_SESSION['nama'],
				$_SESSION['jantina'],
				$tkhlahir,
				$_SESSION['tel'],
				$_SESSION['jawatan'],
				$_SESSION['peringkat'],
				$_SESSION['klasifikasi'],
				$_SESSION['gred'],
				$_SESSION['taraf'],
				$_SESSION['khidmat'],
				$tkhlantik,
				$_SESSION['emel'],
				$_SESSION['ketua'],
				$_SESSION['ketuajwt'],
				$_SESSION['ketuaemel'],
				$_SESSION['alamatkjab'],
				$_SESSION['jab'],
				$_SESSION['jabaddr1'],
				$_SESSION['jabaddr2'],
				$_SESSION['jabpkod'],
				$_SESSION['jabbandar'],
				$_SESSION['jabnegeri'],
				$_SESSION['jabtel'],
				$_SESSION['jabfax']
			)
		);
	}
	
	unset($_SESSION['terai']);

	$_SESSION['alert'] = "Maklumat anda telah direkodkan.";
	$_SESSION['redirek'] = "mohon.php?".$_SESSION['qstr'];
	$_SESSION['toplus'] = "";
	$pageTitle = 'Add Profile';
	include("../kosong.php");
	exit;

} else {
	
	/* $select = "
	SELECT *
	FROM user
	WHERE u_idnum LIKE '$_GET[idnum]'
	ORDER BY u_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result); */

	// add parameterized query
	$row = sqlSelect(
		'SELECT * FROM user WHERE u_idnum LIKE ? ORDER BY u_id ASC', 
		array(addslashes($_GET['idnum']))
	);

	$pieces01 = explode("-", $row['u_dob']);
	$dtahun = $pieces01[0];
	$dbulan = $pieces01[1];
	$dhari = $pieces01[2];

	$pieces02 = explode("-", $row['u_tkhlantik']);
	$ltahun = $pieces02[0];
	$lbulan = $pieces02[1];
	$lhari = $pieces02[2];
}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="mohon.php">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr><td colspan="3" align="center" style="font-weight:bold">KEMASKINI MAKLUMAT PEMOHON</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Pemohon</td></tr>
<tr>
<td align="right" width="20%">No K/P Baru</td>
<td> : </td>
<td><input type="text" name="idnum" id="idnum" value="<?php print $row['u_idnum'] ?>" size="12" maxlength="12" required></td>
</tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td><input type="text" name="nama" id="nama" value="<?php print $row['u_nama'] ?>" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Jantina</td>
<td> : </td>
<td>
<select name="jantina" required>
<option value="" disabled selected>jantina</option>
<?php
$sqlj = "SELECT * FROM jantina ORDER BY j_id ASC";	
$resultj = mysql_query($sqlj) or die(mysql_error());

while ($rowj = mysql_fetch_assoc($resultj)) {
if($rowj['j_name'] == $row['u_jantina']){
	$tunjukj = "selected";
}else{
	$tunjukj = "";
}
print "<option value='$rowj[j_name]' $tunjukj>$rowj[j_name]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">Tarikh Lahir</td>
<td> : </td>
<td>
<select name="tlhari" required>
<option value="" disabled selected>hari</option>
<?php
$sqlh01 = "SELECT * FROM hari ORDER BY h_id ASC";	
$resulth01 = mysql_query($sqlh01) or die(mysql_error());

while ($rowh01 = mysql_fetch_assoc($resulth01)) {
if($rowh01['h_name'] == $dhari){
	$tunjukh01 = "selected";
}else{
	$tunjukh01 = "";
}
print "<option value='$rowh01[h_name]' $tunjukh01>$rowh01[h_name]</option>";
}
?>
</select>
<select name="tlbulan" required>
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
<input type="text" name="tltahun" id="tltahun" value="<?php print $dtahun; ?>" size="8" maxlength="4"  placeholder="&nbsp;Tahun" required>
</td>
</tr>
<tr>
<td align="right">No Telefon Bimbit</td>
<td> : </td>
<td><input type="text" name="tel" id="tel" value="<?php print $row['u_tel'] ?>" size="15" maxlength="11" onchange="javascript:this.value=this.value.toUpperCase()" onkeyup="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>

<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Perkhidmatan</td></tr>
<tr>
<td align="right">Jawatan</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jawatan" id="jawatan" value="<?php print $row['u_jwt'] ?>" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Peringkat</td>
<td> : </td>
<td>
<select name="peringkat" required>
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
<td>
<select name="klasifikasi" required>
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
<td>
<select name="gred" required>
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
<td>
<select name="taraf" required>
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
<td>
<select name="khidmat" required>
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
<td align="right">Skop Kerja</td>
<td> : </td>
<td>&nbsp;<input type="text" name="skop" id="skop" value="<?php print $row['u_skop'] ?>" size="60" required></td>
</tr>

<tr>
<td align="right">Tarikh Lantikan Ke Jawatan Ini</td>
<td> : </td>
<td>
<select name="hari_lantik" required>
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
<select name="bulan_lantik" required>
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
<input type="text" name="tahun_lantik" id="tahun_lantik" value="<?php print $ltahun; ?>" size="8" maxlength="4"  placeholder="&nbsp;Tahun" required>
</td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td>&nbsp;<input type="text" name="emel" id="emel" value="<?php print $row['u_emel'] ?>" size="40" required></td>
</tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Pegawai Yang Meluluskan (Pegawai Penyelia) </td></tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td>&nbsp;<input type="text" name="ketua" id="ketua" value="<?php print $row['u_knama'] ?>" size="50" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Jawatan</td>
<td> : </td>
<td>&nbsp;<input type="text" name="ketuajwt" id="ketuajwt" maxlength="50" value="<?php print $row['u_kjwt'] ?>" size="50" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required> ( Contoh: Pengarah, Ketua Unit, Setiausaha dll)</td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td>&nbsp;<input type="text" name="ketuaemel" id="ketuaemel" value="<?php print $row['u_kemel'] ?>" size="40" required></td>
</tr>
<tr>
<td align="right">Alamat Pegawai Jabatan</td>
<td> : </td>
<td>&nbsp;<input type="text" name="alamatkjab" id="alamatkjab" value="<?php print $row['u_alamatkjab'] ?>" size="65" required></td>
</tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Tempat Bertugas</td></tr>
<tr>
<td align="right">Nama Jabatan</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jab" id="jab" value="<?php print $row['u_jab'] ?>" size="55" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Alamat Jabatan</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jabaddr1" id="jabaddr1" value="<?php print $row['u_jabaddr1'] ?>" size="65" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right"></td>
<td></td>
<td>&nbsp;<input type="text" name="jabaddr2" id="jabaddr2" value="<?php print $row['u_jabaddr2'] ?>" size="65" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">Poskod</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jabpkod" id="jabpkod" value="<?php print $row['u_jabpkod'] ?>" size="7" required></td>
</tr>
<tr>
<td align="right">Bandar</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jabbandar" id="jabbandar" value="<?php print $row['u_jabbandar'] ?>" size="30" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Negeri</td>
<td> : </td>
<td>
<select name="jabnegeri" required>
<option value="" disabled selected>negeri</option>
<?php
$sqln = "SELECT * FROM negeri ORDER BY n_id ASC";	
$resultn = mysql_query($sqln) or die(mysql_error());

while ($rown = mysql_fetch_assoc($resultn)) {
if($rown['n_name'] == $row['u_jabnegeri']){
	$tunjukn = "selected";
}else{
	$tunjukn = "";
}
print "<option value='$rown[n_name]' $tunjukn>$rown[n_name]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">No Telefon Pejabat</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jabtel" id="jabtel" value="<?php print $row['u_jabtel'] ?>" size="15" maxlength="12" required></td>
</tr>
<tr>
<td align="right">No Fax Pejabat</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jabfax" id="jabfax" value="<?php print $row['u_jabfax'] ?>" size="15" maxlength="12" required></td>
</tr>

<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="profil" />
<input type="hidden" name="qstr" id="qstr" value="<?php print $qstr; ?>">
<input type="submit" name="button" id="button" value="  KEMASKINI  ">&nbsp;
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>