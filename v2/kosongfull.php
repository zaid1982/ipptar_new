<?php
#include("header.php");

$alert = $_SESSION["alert"];
$redirek = $_SESSION["redirek"];
$toplus = $_SESSION["toplus"];

if (isset($toplus) && $toplus == "http://localhost/ekursus/index.php") {
	$okkeyes = "  Yes  ";
	$kansel = "&nbsp;&nbsp;<input type=\"button\" onclick=\"location.href='http://localhost/ekursus/index.php';\" value=\"  No  \" />";
} else {
	$okkeyes = "  OK  ";
	$kansel = "";
}

?>
<div id="content">

<strong><p>&nbsp;</p></strong>

<form method="POST" action="<?php print $redirek; ?>" id="form1" name="form1" target="_parent">
<table width="100%" border="0" cellpadding="3" cellspacing="0">
<tr><td>
<center>
<b>
<?php print $alert; ?>
<br/><br/>
<input type="submit" name="submit" value="<?php print $okkeyes; ?>" tabindex="-1"><?php print $kansel; ?>
</b>
</center>
</td></tr>
</table>
</form>

</div><!--close content-->
<?php
include("footer.php");
exit;
?>