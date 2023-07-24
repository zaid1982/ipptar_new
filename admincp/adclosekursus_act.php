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

if ($_POST['closekursus']) // first if 
{
$am='am';
$dateorder=(date("d/m/Y")); 
$timeorder=(date("H:i:s"));
$co_id=$_POST['idkursus'];
$idcat=$_POST['idcat'];

if ($adminakses==$idcat) // first if 
{

// DATE TIMESTAMP
$sqlupdatecourse= "UPDATE co_info SET co_status='TUTUP' where co_id='$co_id'";
$result1=mysql_query($sqlupdatecourse);

mysql_free_result($viewad);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='selesai.php?validation=yes & idkur=$co_id'</script>";

}
 if ($adminakses!=$idcat) // first if 
{

// DATE TIMESTAMP

mysql_free_result($viewad);
echo "<script>alert('Maaf Tahap Akses Anda Tidak Boleh Untuk Meneruskan Proses ini.')</script>";
echo "<script>window.location.href='adclosekursus.php?validation=yes & idkur=$co_id'</script>";

} 
}?>



<? // PADAM KURSUS 
if ($_POST['padamkursus']) // first if 
{
$am='am';
$dateorder=(date("d/m/Y")); 
$timeorder=(date("H:i:s"));
$co_id=$_POST['idkursus'];
$idcat=$_POST['idcat'];

if ($adminakses==$idcat) // first if 
{

// DATE TIMESTAMP
$sqldeletecourse= "delete from co_info where co_id='$co_id'";
$result1=mysql_query($sqldeletecourse);
$sqldeletecourseoff= "delete from costa_off where costa_id='$co_id'";
$result1off=mysql_query($sqldeletecourseoff);

mysql_free_result($viewad);
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='selesai.php?validation=yes & idkur=$co_id'</script>";

}
 if ($adminakses!=$idcat) // first if 
{

// DATE TIMESTAMP

mysql_free_result($viewad);
echo "<script>alert('Maaf Tahap Akses Anda Tidak Boleh Untuk Meneruskan Proses ini.')</script>";
echo "<script>window.location.href='adclosekursus.php?validation=yes & idkur=$co_id'</script>";

} 
}?>