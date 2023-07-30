<?php require_once('../Connections/coonect.php'); ?>
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
$adminakses=$row_viewad['ad_akses'];
?>
<?php
// first if 
if ($_POST['krsup']) {
  $co_catid   = addslashes($_POST['kategori']);
  $cat        = addslashes($_POST['catid']);
  $hiddencat  = $cat;
if ($co_catid != "") { 
  $kategorikursus = $co_catid; 
}
elseif ($co_catid == "") { 
  $kategorikursus = $hiddencat;
}

$carryid        = addslashes($_POST['carryid']);
$co_name        = strtoupper(addslashes($_POST['tajukkursus']));
$co_sdate       = strtoupper(addslashes($_POST['tarikhmula']));
$co_edate       = strtoupper(addslashes($_POST['tarikhakhir']));
$co_trggroup    = strtoupper(addslashes($_POST['kumpsasaran']));
$co_loc         = strtoupper(addslashes($_POST['lokasi']));
$co_fee         = strtoupper(addslashes($_POST['yuran']));
$co_quo         = strtoupper(addslashes($_POST['kuota']));
$co_obj         = strtoupper(addslashes($_POST['objektif']));
$co_waktulapor  = strtoupper(addslashes($_POST['melapor']));
$co_creatorid   = "MASTER";

$costa_off1     = strtoupper(addslashes($_POST['npegawai1']));
$costa_off1tel  = strtoupper(addslashes($_POST['telpegawai1']));
$costa_off1mail = addslashes($_POST['emelpegawai1']);
$costa_off2     = strtoupper(addslashes($_POST['npegawai2']));
$costa_off2tel  = strtoupper(addslashes($_POST['telpegawai2']));
$costa_off2mail = addslashes($_POST['emelpegawai2']);

// DATE TIMESTAMP
$am='am';
$dateorder=(date("d/m/Y")); 
$timeorder=(date("H:i:s"));

if ($adminakses==$hiddencat) {
$sqlupdatecourse= "UPDATE co_info SET co_name='$co_name',co_loc='$co_loc',co_fee='$co_fee',co_obj='$co_obj',co_sdate='$co_sdate',co_edate='$co_edate',co_trggroup='$co_trggroup',co_catid='$kategorikursus',co_quo='$co_quo',co_waktulapor='$co_waktulapor' where co_id='$carryid'";
$result1=mysql_query($sqlupdatecourse);

$sqlupdateoff="UPDATE costa_off SET costa_off1='$costa_off1',costa_off1tel='$costa_off1tel',costa_off1mail='$costa_off1mail',costa_off2='$costa_off2',costa_off2tel='$costa_off2tel',costa_off2mail='$costa_off2mail' where costa_id='$carryid'";

$result2=mysql_query($sqlupdateoff);

mysql_free_result($viewad);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='selesai.php?validation=yes & idkur=$carryid'</script>";
}
if ($adminakses!=$hiddencat) { 

mysql_free_result($viewad);
echo "<script>alert('PERHATIAN: Maaf Tahap Akses Anda Tidak Boleh Untuk Meneruskan Proses ini. Untuk Mengemas Kini Kategori Kursus Sila Rujuk Bahagian Kategori Asal Kursus Untuk Mengemas Kini Kategori Kursus.')</script>";
echo "<script>window.location.href='adeditkursus.php?validation=yes & idkur=$carryid'</script>";
}
}
?>
