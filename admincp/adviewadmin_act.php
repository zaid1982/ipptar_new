<?php require_once('../Connections/coonect.php'); ?>
<? include 'adconfig.php'; ?>
<? include 'adrestric.php'; ?>
<? include 'adlogout.php'; ?>

<?php
$colname_viewad = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_viewad = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_coonect, $coonect);
$query_viewad = sprintf("SELECT * FROM a_pro WHERE ad_idstaff = '%s'", $colname_viewad);
$viewad = mysql_query($query_viewad, $coonect) or die(mysql_error());
$row_viewad = mysql_fetch_assoc($viewad);
$totalRows_viewad = mysql_num_rows($viewad);
$appid=$_POST['hiddenappid'];
//echo $appid;
?>
<? 
if ($_POST['TidakAktif']) // first if 
{ 
$appid=$_POST['hiddenid'];
//echo $appid;
$sqlupdatecstatus="UPDATE a_pro SET ad_status='TIDAK AKTIF' where a_pro.ad_id='$appid'";
$resultrejectcourse=mysql_query($sqlupdatecstatus);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='adviewadmin.php? idad=$appid'</script>";
}
?>

<? 
if ($_POST['Aktifkan']) // first if 
{ 
$appid=$_POST['hiddenid'];
$sqlapprove="UPDATE a_pro SET ad_status='AKTIF' where a_pro.ad_id='$appid'";
$resultapprove=mysql_query($sqlapprove);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='adviewadmin.php? idad=$appid'</script>";
}
?>