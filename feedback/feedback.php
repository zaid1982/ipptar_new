<?php
include("feedback2-function.php");

$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.

if (isset($_POST['hantar'])) {

usrFeedback();
		
} else {}
?>
<html>
<head><title>Feedback IPPTAR</title></head>
<body topmargin="0">
<form name="myform" action="<?php print $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateForm()" enctype='multipart/form-data'>
<table width='75%' border='0' align='center' cellpadding='5' cellspacing='1' class='latar'>
<tr><td colspan="3"><img src="Header Web Ipptar.png" border="0"></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><a href="http://www.ipptar.gov.my/">Kembali ke Laman Utama IPPTAR</a></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><b>VIEWERS FEEDBACK</b><br><font size="1" color="#565656">(Fill in your details to proceed)</font></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td>Name<font color="red"> *</font></td><td> : </td><td><input type="text" name="uname" size="60"></td></tr>
<tr><td>Email Address<font color="red"> *</font></td><td> : </td><td><input type="text" name="emel" size="60"></td></tr>
<tr><td>Phone No.<font color="red"> *</font></td><td> : </td><td><input type="text" name="fon" size="40"></td></tr>
<tr><td>Message<font color="red"> *</font></td><td> : </td><td><textarea name="comments" rows="10" wrap="on" cols="60"></textarea></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

<tr><td colspan="3" align="left" style="padding-left:30px"><input type="hidden" name="kodrawak" value="<?php print $rawak ?>" maxlength="6" /><input type="text" name="randomkey" value='<?php print $rawak;?>' readonly="true" style="font-family:comic sans ms; font-size:32px; font-style:italic; color:black; border:0; text-align:center" size="8" disabled></td></tr>
<tr><td colspan="3" align="left" style="padding-left:30px">Please insert the code above.<font color="red"> *</font><br/><br/><input name="vercode" type="text" maxlength="6"" /></td></tr>

<tr><td colspan="3"><br><br><font size="2" color="red">* Please be informed that only feedback on IPPTAR will be entertained.<br>* All field are required.</font></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><input type="submit" name="hantar" value="Submit"></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>

</table>
</form>
</body>
</html>


