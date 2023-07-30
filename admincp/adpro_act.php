<?php require_once('../Connections/coonect.php'); ?>
<? include 'adconfig.php'; ?>
<? include 'adrestric.php'; ?>
<? include 'adlogout.php'; ?>
<? include 'datecode.php'; ?>

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



if ($_POST['addftadmin']) // first if 
{

$adnama       = strtoupper(addslashes($_POST['adnama']));
$adjawatan    = strtoupper(addslashes($_POST['adjawatan']));
$adgred       = strtoupper(addslashes($_POST['adgred']));
$adjabatan    = strtoupper(addslashes($_POST['adjabatan']));
$adkp         = strtoupper(addslashes($_POST['adkp']));
$adids        = strtoupper(addslashes($_POST['adids']));
$ademel       = addslashes($_POST['ademel']);
$adhp         = strtoupper(addslashes($_POST['adhp']));
$adoff        = strtoupper(addslashes($_POST['adoff']));
$adakses      = strtoupper(addslashes($_POST['adakses']));
$adpass       = strtoupper(addslashes($_POST['adpass']));
$co_creatorid = strtoupper(addslashes($row_viewad['ad_ic']));
//$randompassword= rand(5000, 100000);

mysql_select_db($database_coonect, $coonect);
$query_dft = "SELECT ad_idstaff FROM a_pro where ad_idstaff='$adids'";
$dft = mysql_query($query_dft, $coonect) or die(mysql_error());
$row_dft = mysql_fetch_assoc($dft);
$totalRows_dft = mysql_num_rows($dft);
$tempstf=$row_dft['ad_idstaff'];
// DATE TIMESTAMP

//$am='am';
//$dateorder=(date("d/m/Y")); 
//$timeorder=(date("H:i:s"));
if ($tempstf==""){
$sqlupdatecourse="insert into a_pro ( ad_name,ad_pos,ad_gred,ad_department,ad_ic,ad_status,ad_idstaff,ad_telhp,ad_teloff,ad_pwd,ad_email,ad_date,ad_time,ad_akses,ad_creator) values ('$adnama','$adjawatan','$adgred','$adjabatan','$adkp','AKTIF','$adids','$adhp','$adoff','$adpass','$ademel','$date','$time','$adakses','$co_creatorid')";
$result1=mysql_query($sqlupdatecourse);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='daftaradmin.php?validation=yes & idkur=$co_id'</script>";
}

if ($tempstf!=""){

mysql_free_result($viewad); 
echo "<script>alert('PERHATIAN::Maaf ID Pentadbir $adids Sudah Ada Dalam Simpanan Sistem.Sila Masukan ID Pentadbir Yang Baru.')</script>";
echo "<script>window.location.href='daftaradmin.php?validation=yes & idkur=$co_id'</script>";
}
}
mysql_free_result($dft);
?>