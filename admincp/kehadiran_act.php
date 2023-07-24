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
$catid=$_POST['catid'];
$appid=$_POST['hiddenappid'];
//echo $appid;
$adminakses=$row_viewad['ad_akses'];
 
if ($_POST['Tidak']) // first if 
{ 
if ($adminakses==$catid) 
{
$appid=$_POST['hiddenappid'];
$sqlupdatecstatus="UPDATE costu_all SET costu_att='TIDAK HADIR' where costu_all.costu_appid='$appid'";
$resultrejectcourse=mysql_query($sqlupdatecstatus);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='selesai.php? idapp=$appid & validation=yes'</script>";
}
if ($adminakses!=$catid) 
{
echo "<script>alert('PERHATIAN: Maaf Tahap Akses Anda Tidak Boleh Untuk Meneruskan Proses ini.')</script>";
echo "<script>window.location.href='adviewkehadiran.php? idapp=$appid & validation=yes'</script>";
}
}

if ($_POST['Hadir']) // first if 
{ 

if ($adminakses==$catid) 
{
$appid=$_POST['hiddenappid'];
$sqlapprove="UPDATE costu_all SET costu_att='HADIR' where costu_all.costu_appid='$appid'";
$resultapprove=mysql_query($sqlapprove);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='selesai.php? idapp=$appid & validation=yes'</script>";
}
if ($adminakses!=$catid) 
{
echo "<script>alert('PERHATIAN: Maaf Tahap Akses Anda Tidak Boleh Untuk Meneruskan Proses ini.')</script>";
echo "<script>window.location.href='adviewkehadiran.php? idapp=$appid & validation=yes'</script>";
}
}
?>
<? mysql_free_result($viewad); ?>