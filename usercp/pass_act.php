<?php require_once('../Connections/coonect.php'); ?>
<? include 'userconfig.php'; ?>
<? include 'userlogout.php'; ?>
<? include 'userrestric.php'; ?>

<?php
$colname_viewpro = "-1";
if (isset($_SESSION['MM_User'])) {
  $colname_viewpro = (get_magic_quotes_gpc()) ? $_SESSION['MM_User'] : addslashes($_SESSION['MM_User']);
}
mysql_select_db($database_coonect, $coonect);
$query_viewpro = sprintf("SELECT u_name, u_idnum,u_pwd FROM u_profile WHERE u_idnum = '%s'", $colname_viewpro);
$viewpro = mysql_query($query_viewpro, $coonect) or die(mysql_error());
$row_viewpro = mysql_fetch_assoc($viewpro);
$totalRows_viewpro = mysql_num_rows($viewpro);
?>
<? 
$kpuser=$row_viewpro['u_idnum'];
$passnow=$row_viewpro['u_pwd'];
$passold= $_POST['asal'];
$passnew= $_POST['baru'];
//echo $passold;
//echo $passnow;
if ($passnow==$passold)
{

$changepass="UPDATE u_profile SET u_pwd='$passnew' where u_idnum='$kpuser'  ";
mysql_query($changepass);

// *** Logout the current user.
$logoutGoTo2 = "../index.php";
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
echo "<script>window.location.href='$logoutGoTo2'</script>";
exit;

}

if ($passnow!=$passold)
{
echo "<script>window.location.href='tukarlaluan.php?validation=yes'</script>";
}
?>
<?php
mysql_free_result($viewpro);
?>