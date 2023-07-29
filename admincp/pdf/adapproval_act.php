<?php require_once('../../Connections/coonect.php'); ?>
<? include '../adconfig.php'; ?>
<? include '../adrestric.php'; ?>
<? include '../adlogout.php'; ?>

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
$appid = addslashes($_POST['hiddenappid']);
$catid = addslashes($_POST['catid']);
$adminakses=$row_viewad['ad_akses']
//echo $appid;
?>
<? 
if ($_POST['tolak']) // first if 
{ 

if ($adminakses==$catid) 
{
$appid = addslashes($_POST['hiddenappid']);
//echo $appid;
$sqlupdatecstatus="UPDATE costu_all SET costu_status='DITOLAK' where costu_all.costu_appid='$appid'";
$resultrejectcourse=mysql_query($sqlupdatecstatus);
$try="UPDATE costu_all SET costu_offerfile='' where costu_appid='$appid'";
$tryresult=mysql_query($try);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='../selesai.php? idapp=$appid & validation=yes'</script>";
}
if ($adminakses!=$catid)
{
echo "<script>alert('PERHATIAN: Maaf Tahap Akses Anda Tidak Boleh Untuk Meneruskan Proses ini.')</script>";
echo "<script>window.location.href='../adapprovalapp.php? idapp=$appid & validation=yes'</script>";
}
}
?>

<? 
if ($_POST['lulus']) // first if 
{ 

if ($adminakses==$catid) 
{
$appid = addslashes($_POST['hiddenappid']);
$nopermohonanuser = addslashes($_POST['hiddenappid']);
$sqlapprove="UPDATE costu_all SET costu_status='LULUS' where costu_all.costu_appid='$appid'";
$resultapprove=mysql_query($sqlapprove);

include 'offerpdfcreate.php';
$try="UPDATE costu_all SET costu_offerfile='$filename' where costu_appid='$applicationid'";
$tryresult=mysql_query($try);

echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='../selesai.php? idapp=$appid & validation=yes'</script>";
}
if ($adminakses!=$catid)
{
echo "<script>alert('PERHATIAN: Maaf Tahap Akses Anda Tidak Boleh Untuk Meneruskan Proses ini.')</script>";
echo "<script>window.location.href='../adapprovalapp.php? idapp=$appid & validation=yes'</script>";
}
}
?>