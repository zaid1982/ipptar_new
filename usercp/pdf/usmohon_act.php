<?php require_once('../../Connections/coonect.php'); ?>
<? include '../userconfig.php'; ?>
<? include '../userlogout.php'; ?>
<? include '../userrestric.php'; ?>


<?php
$colname_viewpro = "-1";
if (isset($_SESSION['MM_User'])) {
  $colname_viewpro = (get_magic_quotes_gpc()) ? $_SESSION['MM_User'] : addslashes($_SESSION['MM_User']);
}
mysql_select_db($database_coonect, $coonect);
$query_viewpro = sprintf("SELECT u_name, u_idnum,u_id FROM u_profile WHERE u_idnum = '%s'", $colname_viewpro);
$viewpro = mysql_query($query_viewpro, $coonect) or die(mysql_error());
$row_viewpro = mysql_fetch_assoc($viewpro);
$totalRows_viewpro = mysql_num_rows($viewpro);
$iduser=$row_viewpro['u_idnum'];
//echo $iduser;
?>
<?php
$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_User'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_SESSION['MM_User'] : addslashes($_SESSION['MM_User']);
}
mysql_select_db($database_coonect, $coonect);
$query_Recordset1 = sprintf("SELECT u_idnum,u_id FROM u_profile WHERE u_idnum = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $coonect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_cek = "-1";
if (isset($_SESSION['MM_User'])) {
  $colname_cek = (get_magic_quotes_gpc()) ? $_SESSION['MM_User'] : addslashes($_SESSION['MM_User']);
}
$sdate=$_POST['sdate'];
$courseid=$_POST['idkurhidden'];
$kodkursus=$_POST['idcodehidden'];
$status="Proses";
$iduser=$row_Recordset1['u_idnum'];
$username=$row_viewpro['u_name'];
$costu_numid=$row_viewpro['u_id'];

mysql_select_db($database_coonect, $coonect);
$query_cek = sprintf("SELECT costu_appid, costu_id, costu_uid, costu_numid, costu_date, costu_time, costu_sdate FROM costu_all WHERE costu_uid = '%s' AND costu_id='$courseid' ", $colname_cek);
$cek = mysql_query($query_cek, $coonect) or die(mysql_error());
$row_cek = mysql_fetch_assoc($cek);
$totalRows_cek = mysql_num_rows($cek);
$idkursus=$row_cek['costu_id'];
$idusercek=$row_cek['costu_uid'];

if (($idkursus=="") && ($idusercek=="")) {
?>



<? 
   include 'datecode.php';
?>


<? 
$sdate=$_POST['sdate'];
$courseid=$_POST['idkurhidden'];
$kodkursus=$_POST['idcodehidden'];
$namapegawai=strtoupper($_POST['namapegawai']);
$jawatanpegawai=strtoupper($_POST['jawatanpegawai']);
$emelpegawai=$_POST['emelpegawai'];
$asrama=strtoupper($_POST['asrama']);
$status="PROSES";
$iduser=$row_Recordset1['u_idnum'];
$username=$row_viewpro['u_name'];
$costu_numid=$row_viewpro['u_id'];
//echo $sdate;
$month = substr($sdate,3,-5);
//echo $month;
$sqlall="insert into costu_all (costu_numid, costu_id,costu_coursecode,costu_uname,costu_uid,costu_status,costu_date,costu_time,costu_sdate,costu_mth,costu_pegnama,costu_pegjawatan,costu_pegemail,costu_asrama) values ('$costu_numid','$courseid','$kodkursus','$username','$iduser','$status','$date','$time','$sdate','$month','$namapegawai','$jawatanpegawai','$emelpegawai','$asrama')";

$result=mysql_query($sql);
$resultmonth=mysql_query($sqlall);

$cariappid="select costu_appid from costu_all where (costu_id='$courseid' and costu_uid='$iduser')";
$cariappidcourse=mysql_query($cariappid);	
$rows_cariappidcourse=mysql_fetch_array($cariappidcourse);
$nopermohonanuser=$rows_cariappidcourse['costu_appid'];
//echo $nopermohonanuser;

include 'pdfcreate.php'; 
$try="UPDATE costu_all SET costu_filename='$filename' where costu_appid='$applicationid'";
//$try="insert into costu_all (costu_filename)  values ('$filename')  where costu_appid='4000046' ";
$tryresult=mysql_query($try);
?>

<?php

?>
<div align="center">
  <p>PROSES SELESAI</p>
  <p>KLIK PADA PAUTAN MUAT TURUN UNTUK MUAT TURUN SURAT PERMOHONAN- <a href="<? echo $filename; ?>" target="_blank">MUAT TURUN FAIL PDF</a> </p>
</div>
<? } ?>

<? if (($idkursus!="") && ($idusercek!="")) {
echo "<script>alert('Maaf Kursus ini pernah di pohon, Sila rujuk bahagian status permohonan')</script>";
echo "<script>window.location.href='../umohon.php?idkur=$courseid'</script>";
}
?>
<?php
mysql_free_result($Recordset1);
mysql_free_result($cek);
mysql_free_result($viewpro);
?>