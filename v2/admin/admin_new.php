<?php
include("header.php");
include("../conn.php");

if(isset($_POST['terai']) && $_POST['terai'] == "admbaru"){

$_POST['nama'] = str_replace("'", "&#39;", $_POST['nama']); #add on 20170710
	
$_SESSION['terai'] = $_POST['terai'];
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];
	
$_SESSION['idnum']	=	$_POST['idnum'];
$_SESSION['pwd']	=	$_POST['pwd'];
$_SESSION['nama']	=	$_POST['nama'];
$_SESSION['tel']	=	$_POST['tel'];
$_SESSION['emel']	=	$_POST['emel'];
$_SESSION['level']	=	$_POST['level'];

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#admbaru").click(function (e) {
        e.preventDefault();
    });
    $('#admbaru').trigger('click');
});
});//]]> 
</script>
<?php
}else{

$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.

}
?>
<div id="content">
<a href="admin_profil_semak.php" rel="#overlay" id="admbaru"></a>

<div id="admin_menu">
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tr><td align="right" height="24px" style="color:white;font-weight:bold">
<?php if($_SESSION['MyLevel'] == "1"){ ?>
<a href="misc.php" style="font-weight:bold;text-decoration:none;color:white">PENGARAH</a> | 
<a href="admin_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI ADMIN</a> | 
<a href="admin_new.php" style="font-weight:bold;text-decoration:none;color:yellow">TAMBAH ADMIN</a> |
<a href="user_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI USER</a> |
<?php }else{} ?>
<a href="ticer_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI PENGAJAR</a> | 
<a href="ticer_new.php" style="font-weight:bold;text-decoration:none;color:white">TAMBAH PENGAJAR</a>&nbsp;&nbsp;
</td></tr>
</table>  
</div> 

<form id="form1" name="form1" method="POST" action="">
<table width="100%" align="center" cellpadding="3" cellspacing="1">
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
<td align="right" width="20%">No K/P Baru</td>
<td> : </td>
<td><input type="text" name="idnum" id="idnum" value="" size="12" maxlength="12" required></td>
</tr>
<tr>
<td align="right">Kata Laluan</td>
<td> : </td>
<td><input type="password" name="pwd" id="pwd" value="" size="40"></td>
</tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td><input type="text" name="nama" id="nama" value="" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">No Telefon Bimbit</td>
<td> : </td>
<td><input type="text" name="tel" id="tel" value="" size="15" maxlength="11" onchange="javascript:this.value=this.value.toUpperCase()" onkeyup="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">E-mel</td>
<td> : </td>
<td><input type="email" name="emel" id="emel" value="<?php print $row['a_emel'] ?>" size="40"></td>
</tr>
<tr>
<td align="right">Level</td>
<td> : </td>
<td>
<select name="level">
<option value="" disabled selected>level</option>
<?php
$sqlm01 = "SELECT * FROM level ORDER BY l_id ASC";	
$resultm01 = mysql_query($sqlm01) or die(mysql_error());

while ($rowm01 = mysql_fetch_assoc($resultm01)) {
if($rowm01['l_id'] == '0'){
	$tunjukm01 = "selected";
}else{
	$tunjukm01 = "";
}
print "<option value='$rowm01[l_id]' $tunjukm01>$rowm01[l_name]</option>";
}
?>
</select>
</td>
</tr>

<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="2"></td><td><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value="<?php print $rawak ?>" readonly="true" style="font-family:comic sans ms; font-size:25px; font-style:italic; color:black; border:0;  text-align:center" size="9" disabled></td></tr>
<tr><td colspan="2"></td><td>Sila taip kembali kod seperti di atas.<br /><input name="vercode" type="text" maxlength="6" placeholder="Code" required /></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="admbaru" />
<input type="submit" name="button" id="button" value="  HANTAR  ">&nbsp;
<input type="button" name="button2" id="button2" value="  RESET  " onclick="window.parent.location.reload();">
</td>
</tr>
</table>
</form>

</div><!--close content-->

<?php
include("footer.php");
?>

