<?php
include("header.php");
include("conn.php");

$qstr=$_SERVER['QUERY_STRING'];
if(strlen($qstr) > 9){
	exit;
}

$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.

if(substr($qstr,0,2) == "lo"){

$_SESSION['terai'] = "lo";	
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#logout").click(function (e) {
        e.preventDefault();
    });
    $('#logout').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "login"){

$_SESSION['terai'] = $_POST['terai'];	
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];

$_SESSION['ID'] = $_POST['ID'];
$_SESSION['PWord'] = $_POST['PWord'];
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#login").click(function (e) {
        e.preventDefault();
    });
    $('#login').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "forgot"){

$_SESSION['terai'] = $_POST['terai'];	
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];
$_SESSION['ID'] = $_POST['ID'];
$_SESSION['nokp'] = $_POST['nokp'];

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#forgot").click(function (e) {
        e.preventDefault();
    });
    $('#forgot').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "register"){

$_POST['nama'] = str_replace("'", "&#39;", $_POST['nama']); #add on 20170710
$_POST['ketua'] = str_replace("'", "&#39;", $_POST['ketua']); #add on 20170710
	
$_SESSION['terai'] = $_POST['terai'];
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];
	
$_SESSION['idnum']	=	$_POST['idnum'];
$_SESSION['pwd']	=	$_POST['pwd'];
$_SESSION['nama']	=	$_POST['nama'];
$_SESSION['jantina']	=	$_POST['jantina'];
$_SESSION['tltahun']	=	$_POST['tltahun'];
$_SESSION['tlbulan']	=	$_POST['tlbulan'];
$_SESSION['tlhari']	=	$_POST['tlhari'];
$_SESSION['tel']	=	$_POST['tel'];
$_SESSION['jawatan']	=	$_POST['jawatan'];
$_SESSION['skop']	=	$_POST['skop'];
$_SESSION['peringkat']	=	$_POST['peringkat'];
$_SESSION['klasifikasi']	=	$_POST['klasifikasi'];
$_SESSION['gred']	=	$_POST['gred'];
$_SESSION['taraf']	=	$_POST['taraf'];
$_SESSION['khidmat']	=	$_POST['khidmat'];
$_SESSION['tahun_lantik']	=	$_POST['tahun_lantik'];
$_SESSION['bulan_lantik']	=	$_POST['bulan_lantik'];
$_SESSION['hari_lantik']	=	$_POST['hari_lantik'];
$_SESSION['emel']	=	$_POST['emel'];
$_SESSION['ketua']	=	$_POST['ketua'];
$_SESSION['ketuajwt']	=	$_POST['ketuajwt'];
$_SESSION['ketuaemel']	=	$_POST['ketuaemel'];
$_SESSION['alamatkjab']	=	$_POST['alamatkjab'];
$_SESSION['bhgn']	=	$_POST['bhgn'];
$_SESSION['jab']	=	$_POST['jab'];
$_SESSION['jabaddr1']	=	$_POST['jabaddr1'];
$_SESSION['jabaddr2']	=	$_POST['jabaddr2'];
$_SESSION['jabpkod']	=	$_POST['jabpkod'];
$_SESSION['jabbandar']	=	$_POST['jabbandar'];
$_SESSION['jabnegeri']	=	$_POST['jabnegeri'];
$_SESSION['jabtel']	=	$_POST['jabtel'];
$_SESSION['jabfax']	=	$_POST['jabfax'];

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#register").click(function (e) {
        e.preventDefault();
    });
    $('#register').trigger('click');
});
});//]]> 
</script>
<?php
}else{print "";}
?>
<div id="content">
<a href="login_semak.php" rel="#overlay" id="still"></a>
<a href="login_semak.php" rel="#overlay" id="logout"></a>
<a href="login_semak.php" rel="#overlay" id="login"></a>
<a href="forgot.php" rel="#overlay" id="forgot"></a>
<a href="register.php" rel="#overlay" id="register"></a>


<form method='POST' action='login.php'>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr>
<td rowspan="7" valign="top" width="50%">
<b>Log Masuk Ke Sistem eKursus</b>
<br/><br/>
Sila masukkan kata nama dan kata laluan untuk mengakses akaun anda. Setelah selesai anda akan dibawakan ke ruangan profil dan anda boleh membuat permohonan kursus, kemas kini dan periksa status permohonan.
<br/><br/>
Jika anda terlupa kata laluan, sila klik di <a href="forgot.php" rel="#overlay">sini</a>.
<br/><br/>
Bagi pemohon yang belum mendaftar, sila klik di <a href="register.php" rel="#overlay">sini</a>.
<br/><br/>
<?php if (substr(getenv('REMOTE_ADDR'),0,8) == "192.168."){ ?>
Bagi pentadbir sistem, sila klik di <a href="admin/">sini</a>.
<?php }else{} ?>
</td>
<td>
<br/><br/>
<font color="#565656">Masukkan No. Kad Pengenalan :</font><br/><input type='text' name='ID' size='25' maxlength="12" required></td></tr>
<tr><td><font color="#565656">Kata Laluan :</font><br/><input type='password' name='PWord' size='10' required></td></tr>

<tr><td><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value="<?php print $rawak ?>" readonly="true" style="font-family:comic sans ms; font-size:25px; font-style:italic; color:black; border:0;  text-align:center" size="9" disabled></td></tr>
<tr><td>Sila taip kembali kod seperti di atas.<br /><input name="vercode" type="text" maxlength="6" placeholder="Code" required /></td></tr>

<tr><td align='center'><input type="hidden" name="terai" id="terai" value="login" /><input type='submit' name="Login" value='Log Masuk'></td></tr>
</table>
</form>

</div><!--close content-->

<?php
include("footer.php");
?>
