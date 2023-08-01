<?php
include("header.php");
include("conn.php");

if(isset($_POST['terai']) && $_POST['terai'] == "profil"){
	
	$_SESSION['terai'] 				=	addslashes($_POST['terai']);
	$_SESSION['kodrawak'] 		= addslashes($_POST['kodrawak']); 
	$_SESSION['vercode'] 			= addslashes($_POST['vercode']);
		
	$_SESSION['idnum']				=	addslashes($_POST['idnum']);
	$_SESSION['pwd']					=	$_POST['pwd'];
	$_SESSION['nama']					=	addslashes($_POST['nama']);
	$_SESSION['jantina']			=	addslashes($_POST['jantina']);
	$_SESSION['tltahun']			=	addslashes($_POST['tltahun']);
	$_SESSION['tlbulan']			=	addslashes($_POST['tlbulan']);
	$_SESSION['tlhari']				=	addslashes($_POST['tlhari']);
	$_SESSION['tel']					=	addslashes($_POST['tel']);
	$_SESSION['jawatan']			=	addslashes($_POST['jawatan']);
	$_SESSION['peringkat']		=	addslashes($_POST['peringkat']);
	$_SESSION['klasifikasi']	=	addslashes($_POST['klasifikasi']);
	$_SESSION['gred']					=	addslashes($_POST['gred']);
	$_SESSION['taraf']				=	addslashes($_POST['taraf']);
	$_SESSION['khidmat']			=	addslashes($_POST['khidmat']);
	$_SESSION['tahun_lantik']	=	addslashes($_POST['tahun_lantik']);
	$_SESSION['bulan_lantik']	=	addslashes($_POST['bulan_lantik']);
	$_SESSION['hari_lantik']	=	addslashes($_POST['hari_lantik']);
	$_SESSION['emel']					=	addslashes($_POST['emel']);
	$_SESSION['ketua']				=	addslashes($_POST['ketua']);
	$_SESSION['ketuajwt']			=	addslashes($_POST['ketuajwt']);
	$_SESSION['ketuaemel']		=	addslashes($_POST['ketuaemel']);
	$_SESSION['alamatkjab']		=	addslashes($_POST['alamatkjab']);
	$_SESSION['jab']					=	addslashes($_POST['jab']);
	$_SESSION['jabaddr1']			=	addslashes($_POST['jabaddr1']);
	$_SESSION['jabaddr2']			=	addslashes($_POST['jabaddr2']);
	$_SESSION['jabpkod']			=	addslashes($_POST['jabpkod']);
	$_SESSION['jabbandar']		=	addslashes($_POST['jabbandar']);
	$_SESSION['jabnegeri']		=	addslashes($_POST['jabnegeri']);
	$_SESSION['jabtel']				=	addslashes($_POST['jabtel']);
	$_SESSION['jabfax']				=	addslashes($_POST['jabfax']);

	?>
	<script type='text/javascript'>//<![CDATA[
	$(window).load(function(){
	$(document).ready(function () {

			$("#profil").click(function (e) {
					e.preventDefault();
			});
			$('#profil').trigger('click');
	});
	});//]]> 
	</script>
	<?php
} else {
	
	$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.

	/* $select = "
	SELECT *
	FROM user
	WHERE u_id LIKE '$_SESSION[UsrID]'
	ORDER BY u_id ASC
	";
	$result = mysql_query($select) or die("Query failed");
	$row = mysql_fetch_assoc($result); */

	// add parameterized query
	$row = sqlSelect(
		'SELECT * FROM user WHERE u_id LIKE ? ORDER BY u_id ASC', 
		array(addslashes($_SESSION['UsrID']))
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
<a href="profil_semak.php" rel="#overlay" id="profil"></a>

<form id="form1" name="form1" method="POST" action="">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr><td colspan="3" style="font-weight:bold">MAKLUMAT PEMOHON (Sila Kemaskini Sekiranya Perlu)</td></tr>
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
<input type="number" name="tltahun" id="tltahun" value="<?php print $dtahun; ?>" size="8" maxlength="4"  placeholder="&nbsp;Tahun" required>
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
<input type="number" name="tahun_lantik" id="tahun_lantik" value="<?php print $ltahun; ?>" size="8" maxlength="4" placeholder="&nbsp;Tahun" required>
</td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td>&nbsp;<input type="email" name="emel" id="emel" value="<?php print $row['u_emel'] ?>" size="40" required></td>
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
<td>&nbsp;<input type="email" name="ketuaemel" id="ketuaemel" value="<?php print $row['u_kemel'] ?>" size="40" required></td>
</tr>
<tr>
<td align="right">Alamat Pegawai Jabatan</td>
<td> : </td>
<td>&nbsp;<input type="text" name="alamatkjab" id="alamatkjab" value="<?php print $row['u_alamatkjab'] ?>" size="80" required></td>
</tr>
<tr><td colspan="3" align="center" style="background-color:#ccc">Maklumat Tempat Bertugas</td></tr>
<tr>
<td align="right">Nama Jabatan</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jab" id="jab" value="<?php print $row['u_jab'] ?>" size="70" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right">Alamat Jabatan</td>
<td> : </td>
<td>&nbsp;<input type="text" name="jabaddr1" id="jabaddr1" value="<?php print $row['u_jabaddr1'] ?>" size="80" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()" required></td>
</tr>
<tr>
<td align="right"></td>
<td></td>
<td>&nbsp;<input type="text" name="jabaddr2" id="jabaddr2" value="<?php print $row['u_jabaddr2'] ?>" size="80" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">Poskod</td>
<td> : </td>
<td>&nbsp;<input type="number" name="jabpkod" id="jabpkod" value="<?php print $row['u_jabpkod'] ?>" size="7" required></td>
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
<tr><td colspan="2"></td><td><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value="<?php print $rawak ?>" readonly="true" style="font-family:comic sans ms; font-size:25px; font-style:italic; color:black; border:0;  text-align:center" size="9" disabled></td></tr>
<tr><td colspan="2"></td><td>Sila taip kembali kod seperti di atas.<br /><input name="vercode" type="text" maxlength="6" placeholder="Code" required /></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="profil" />
<input type="submit" name="button" id="button" value="  KEMASKINI  ">&nbsp;
<!--<input type="button" name="button2" id="button2" value="  BATAL  " onclick="window.parent.location.reload();window.close()">
-->
<input type="button" name="button2" id="button2" value="  BATAL  " onclick="location.href = 'index.php';">

</td>
</tr>
</table>
</form>

</div><!--close content-->

<?php
include("footer.php");
?>