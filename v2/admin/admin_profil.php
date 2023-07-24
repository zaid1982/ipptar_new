<?php
include("header.php");
include("../conn.php");

if(isset($_POST['terai']) && $_POST['terai'] == "admprofil"){
	
$_SESSION['terai'] = $_POST['terai'];
	
$_SESSION['aid']	=	$_POST['aid'];
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

    $("#admprofil").click(function (e) {
        e.preventDefault();
    });
    $('#admprofil').trigger('click');
});
});//]]> 
</script>
<?php
}else{
	
$select = "
SELECT *
FROM admin
WHERE a_id LIKE '$_SESSION[MyID]'
ORDER BY a_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);	
}
?>
<div id="content">
<a href="admin_profil_semak.php" rel="#overlay" id="admprofil"></a>

<form id="form1" name="form1" method="POST" action="">
<table width="100%" align="center" cellpadding="3" cellspacing="1">
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
<td align="right" width="20%">No K/P Baru</td>
<td> : </td>
<td><input type="text" name="idnum" id="idnum" value="<?php print $row['a_idnum'] ?>" size="12" maxlength="12" required></td>
</tr>
<tr>
<td align="right">Kata Laluan</td>
<td> : </td>
<td><input type="password" name="pwd" id="pwd" value="<?php print $row['a_pwd'] ?>" size="40"></td>
</tr>
<tr>
<td align="right">Nama</td>
<td> : </td>
<td><input type="text" name="nama" id="nama" value="<?php print $row['a_nama'] ?>" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td align="right">No Telefon Bimbit</td>
<td> : </td>
<td><input type="text" name="tel" id="tel" value="<?php print $row['a_tel'] ?>" size="15" maxlength="11" onchange="javascript:this.value=this.value.toUpperCase()" onkeyup="javascript:this.value=this.value.toUpperCase()"></td>
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
if($_SESSION['MyLevel'] == "1"){
$sqlm01 = "SELECT * FROM level ORDER BY l_id ASC";	
}else{
$sqlm01 = "SELECT * FROM level WHERE l_id = ".$_SESSION['MyLevel']." ORDER BY l_id ASC";
} 
$resultm01 = mysql_query($sqlm01) or die(mysql_error());

while ($rowm01 = mysql_fetch_assoc($resultm01)) {
if($rowm01['l_id'] == $row['a_level']){
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

<tr>
<td colspan="3" align="center">
<input type="hidden" name="terai" id="terai" value="admprofil" />
<input type="hidden" name="aid" id="aid" value="<?php print $_GET['aid']; ?>">
<input type="submit" name="button" id="button" value="  KEMASKINI  ">&nbsp;
<input type="button" name="button2" id="button2" value="  RESET  " onclick="window.parent.location.reload();">
</td>
</tr>
</table>
</form>

</div><!--close content-->

<?php
include("footer.php");
?>
