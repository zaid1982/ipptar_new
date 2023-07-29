<?php session_start(); ?>
<html>
<head>
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container2">
<?php
include("conn.php");

$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.

if(isset($_SESSION['terai']) && $_SESSION['terai'] == "register"){
	
$pwd = md5($_SESSION['pwd']);

$tkhmohon = date('Y-m-d');

$tkhlahir = $_SESSION['tltahun']."-".$_SESSION['tlbulan']."-".$_SESSION['tlhari'];

$tkhlantik = $_SESSION['tahun_lantik']."-".$_SESSION['bulan_lantik']."-".$_SESSION['hari_lantik'];
	
$key = $_SESSION['kodrawak']; 
$number = $_SESSION['vercode'];

# start captcha
if(($number!=$key)||($number=="")){
	
	session_destroy();
			
	$_SESSION['alert'] = "Kod tidak valid. Sila cuba sekali lagi.";
	$_SESSION['redirek'] = "login.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Daftar Pengguna';
	include("kosong.php");
	exit;
	
} else {}
# end captcha	

$select = "
SELECT *
FROM user
WHERE u_idnum LIKE '$_SESSION[idnum]'
ORDER BY u_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);
$numrows = mysql_num_rows($result);

	if($numrows == "1"){

		#$sql = "UPDATE user SET u_nama = '$_SESSION[nama]', u_pwd = '$pwd', u_jantina = '$_SESSION[jantina]', u_dob = '$tkhlahir', u_tel = '$_SESSION[tel]', u_jwt = '$_SESSION[jawatan]', u_jwttingkat = '$_SESSION[peringkat]', u_jwtklas = '$_SESSION[klasifikasi]', u_jwtgred = '$_SESSION[gred]', u_jwttaraf = '$_SESSION[taraf]', u_jkhidmat = '$_SESSION[khidmat]', u_tkhlantik = '$tkhlantik', u_emel = '$_SESSION[emel]', u_knama = '$_SESSION[ketua]', u_kjwt = '$_SESSION[ketuajwt]', u_kemel = '$_SESSION[ketuaemel]', u_alamatkjab = '$_SESSION[alamatkjab]', u_bhgn = '$_SESSION[bhgn]', u_jab = '$_SESSION[jab]', u_jabaddr1 = '$_SESSION[jabaddr1]', u_jabaddr2 = '$_SESSION[jabaddr2]', u_jabpkod = '$_SESSION[jabpkod]', u_jabbandar = '$_SESSION[jabbandar]', u_jabnegeri = '$_SESSION[jabnegeri]', u_jabtel = '$_SESSION[jabtel]', u_jabfax = '$_SESSION[jabfax]', u_status = '1', u_skop='$_SESSION[skop]' WHERE u_idnum = '$_SESSION[idnum]'";
		#$result = mysql_query($sql) or die(mysql_error());
		
		session_destroy();
	       
        $_SESSION['alert'] = "Rekod pengguna telah wujud. Sila Log In.";
		$_SESSION['redirek'] = "login.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Rekod Pengguna Telah Wujud';
		include("kosong.php");
		exit;
		
	}else{
		
		$sql = "INSERT INTO user (u_idnum,u_pwd,u_nama,u_jantina,u_dob,u_tel,u_jwt,u_jwttingkat,u_jwtklas,u_jwtgred,u_jwttaraf,u_jkhidmat,u_tkhlantik,u_emel,u_knama,u_kjwt,u_kemel,u_alamatkjab,u_bhgn,u_jab,u_jabaddr1,u_jabaddr2,u_jabpkod,u_jabbandar,u_jabnegeri,u_jabtel,u_jabfax,u_status,u_skop)
		VALUES ('$_SESSION[idnum]', '$pwd', '$_SESSION[nama]', '$_SESSION[jantina]', '$tkhlahir','$_SESSION[tel]','$_SESSION[jawatan]','$_SESSION[peringkat]','$_SESSION[klasifikasi]','$_SESSION[gred]','$_SESSION[taraf]','$_SESSION[khidmat]','$tkhlantik','$_SESSION[emel]','$_SESSION[ketua]','$_SESSION[ketuajwt]','$_SESSION[ketuaemel]','$_SESSION[alamatkjab]','$_SESSION[bhgn]','$_SESSION[jab]','$_SESSION[jabaddr1]','$_SESSION[jabaddr2]','$_SESSION[jabpkod]','$_SESSION[jabbandar]','$_SESSION[jabnegeri]','$_SESSION[jabtel]','$_SESSION[jabfax]','1','$_SESSION[skop]')";
		$result = mysql_query($sql) or die(mysql_error());
		
		
		#$MyID = mysql_insert_id();

		#$sql = "INSERT INTO asrama (a_uid, a_kid, a_status) VALUES ('$MyID', '$_POST[kid]', '$_POST[asrama]')";
		#$result = mysql_query($sql) or die(mysql_error());
		
		
		session_destroy();
	       
        $_SESSION['alert'] = "Maklumat anda telah direkodkan.";
		$_SESSION['redirek'] = "login.php";
		$_SESSION['toplus'] = "";
		$pageTitle = 'Tambah Pengguna Baru';
		include("kosong.php");
		exit;
		
	}

}else{}
?>
<div id="content"> 

<form id="form1" name="form1" method="POST" action="login.php">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr><td colspan="3" align="center" style="font-weight:bold">MAKLUMAT PEMOHON (Sila Klik Butang HANTAR Untuk Proses Seterusnya)</td></tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Pemohon <?php echo $_SESSION['tltahun']; ?></td></tr>
<tr>
<td align="right" width="20%">No K/P Baru</td>
<td> : </td>
<td><input type="text" name="idnum" id="idnum" value="" size="12" maxlength="12" required> (digunakan untuk daftar masuk)</td>
</tr>
<tr>
<td align="right">Kata Laluan</td>
<td> : </td>
<td><input type="password" name="pwd" id="pwd" value="" size="40" required></td>
</tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td><input type="text" name="nama" id="nama" value="" size="55" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
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
if($rowh01['h_id'] == $dhari){
	$tunjukh01 = "selected";
}else{
	$tunjukh01 = "";
}
print "<option value='$rowh01[h_id]' $tunjukh01>$rowh01[h_name]</option>";
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
<input type="number" name="tltahun" id="tltahun" value="<?php print $dtahun; ?>" size="8" maxlength="4"  placeholder="&nbsp;tahun" required>
</td>
</tr>
<tr>
<td align="right">No Telefon Bimbit</td>
<td> : </td>
<td><input type="text" name="tel" id="tel" value="" size="15" maxlength="11" onchange="javascript:this.value=this.value.toUpperCase()" onkeyup="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>

<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Perkhidmatan</td></tr>
<tr>
<td align="right">Jawatan</td>
<td> : </td>
<td><input type="text" name="jawatan" id="jawatan" value="" size="55" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
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
<td><input type="text" name="skop" id="skop" size="55" value="" required></td>
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
if($rowh02['h_id'] == $lhari){
	$tunjukh02 = "selected";
}else{
	$tunjukh02 = "";
}
print "<option value='$rowh02[h_id]' $tunjukh02>$rowh02[h_name]</option>";
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
<input type="number" name="tahun_lantik" id="tahun_lantik" value="" size="8" maxlength="4" placeholder="&nbsp;tahun" required>


</td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td><input type="email" name="emel" id="emel" value="" size="40" required></td>
</tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Pegawai Yang Meluluskan (Pegawai Penyelia) </td></tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td><input type="text" name="ketua" id="ketua" value="" size="50" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Jawatan</td>
<td> : </td>
<td><input type="text" name="ketuajwt" id="ketuajwt" maxlength="50" value="" size="50" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required> ( Contoh: Pengarah, Ketua Unit, Setiausaha dll)</td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td><input type="email" name="ketuaemel" id="ketuaemel" value="" size="40" required></td>
</tr>
<tr>
<td align="right">Alamat Pegawai Jabatan</td>
<td> : </td>
<td><input type="text" name="alamatkjab" id="alamatkjab" value="" size="65" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Tempat Bertugas</td></tr>
<tr>
<td align="right">Nama Bahagian</td>
<td> : </td>
<td><input type="text" name="bhgn" id="bhgn" value="" size="55" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Nama Jabatan</td>
<td> : </td>
<td><input type="text" name="jab" id="jab" value="" size="55" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Alamat Jabatan</td>
<td> : </td>
<td><input type="text" name="jabaddr1" id="jabaddr1" value="" size="65" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right"></td>
<td></td>
<td><input type="text" name="jabaddr2" id="jabaddr2" value="" size="65" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">Poskod</td>
<td> : </td>
<td><input type="number" name="jabpkod" id="jabpkod" value="" size="7" required></td>
</tr>
<tr>
<td align="right">Bandar</td>
<td> : </td>
<td><input type="text" name="jabbandar" id="jabbandar" value="" size="30" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Negeri</td>
<td> : </td>
<td>
<select name="jabnegeri" required>
<option value="" disabled selected>negeri</option>
<?php
$sqln = "SELECT * FROM negeri ORDER BY n_name ASC";	
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
<td><input type="text" name="jabtel" id="jabtel" value="" size="15" maxlength="12" required></td>
</tr>
<tr>
<td align="right">No Fax Pejabat</td>
<td> : </td>
<td><input type="text" name="jabfax" id="jabfax" value="" size="15" maxlength="12" required></td>
</tr>
<!--
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Keperluan Penginapan</td></tr>
<tr>
    <td colspan="3">
	Adakah anda memerlukan penginapan asrama semasa kursus?
	<input type="radio" name="asrama" value="1"> YA
	<input type="radio" name="asrama" value="2"> TIDAK 
    </td>
</tr>
-->
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="2"></td><td><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value="<?php print $rawak ?>" readonly="true" style="font-family:comic sans ms; font-size:25px; font-style:italic; color:black; border:0;  text-align:center" size="9" disabled></td></tr>
<tr><td colspan="2"></td><td>Sila taip kembali kod seperti di atas.<br /><input name="vercode" type="text" maxlength="6" placeholder="Code" required /></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="register" />
<input type="submit" name="button" id="button" value="  HANTAR  ">&nbsp;
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
</td>
</tr>
</table>
</form>

</div><!--close content-->

</div><!--close container-->

<?php include("bottom.php"); ?>