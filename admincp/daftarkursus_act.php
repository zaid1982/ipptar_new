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
$adminakses=$row_viewad['ad_akses'];
?>
<?php
// first if 
if ($_POST['krshantar']) {

  $co_catid = strtoupper($_POST['kategori']);

  // DATE TIMESTAMP
  //$am='am';
  //$dateorder=(date("d/m/Y")); 
  //$timeorder=(date("H:i:s"));

  if ($adminakses==$co_catid) {
    $co_coursecode  = strtoupper(addslashes($_POST['kodkursus']));
    $co_name        = strtoupper(addslashes($_POST['tajukkursus']));
    $co_catid       = strtoupper(addslashes($_POST['kategori']));
    $co_sdate       = strtoupper(addslashes($_POST['tarikhmula']));
    $co_edate       = strtoupper(addslashes($_POST['tarikhakhir']));
    $co_trggroup    = strtoupper(addslashes($_POST['kumpsasaran']));
    $co_loc         = strtoupper(addslashes($_POST['lokasi']));
    $co_fee         = strtoupper(addslashes($_POST['yuran']));
    $co_quo         = strtoupper(addslashes($_POST['kuota']));
    $co_obj         = strtoupper(addslashes($_POST['objektif']));
    $co_waktulapor  = strtoupper(addslashes($_POST['waktulapor']));
    $co_creatorid   = strtoupper(addslashes($row_viewad['ad_ic']));

    $costa_off1     = strtoupper(addslashes($_POST['npegawai1']));
    $costa_off1tel  = strtoupper(addslashes($_POST['telpegawai1']));
    $costa_off1mail = addslashes($_POST['emelpegawai1']);
    $costa_off2     = strtoupper(addslashes($_POST['npegawai2']));
    $costa_off2tel  = strtoupper(addslashes($_POST['telpegawai2']));
    $costa_off2mail = addslashes($_POST['emelpegawai2']);

    $sqlcourse="insert into co_info(co_coursecode,co_name,co_loc,co_fee,co_obj,co_sdate,co_edate,co_trggroup,co_catid,co_creatorid,co_quo,co_totalapp,co_waktulapor) 
    VALUES ('$co_coursecode','$co_name','$co_loc','$co_fee','$co_obj','$co_sdate','$co_edate','$co_trggroup','$co_catid','$co_creatorid','$co_quo','$co_totalapp','$co_waktulapor') ";
    $result1=mysql_query($sqlcourse);

    $sql="SELECT co_id FROM co_info where co_name='$co_name' AND co_coursecode='$co_coursecode' AND co_sdate='$co_sdate'";
    $result=mysql_query($sql);
    $row_serid=mysql_fetch_array($result);
    //select id to insert data.

    $idcourse=$row_serid['co_id'];
    //echo $idcourse;

    $sqlofficer="insert into costa_off (costa_id,costa_off1,costa_off1tel,costa_off1mail,costa_off2,costa_off2tel,costa_off2mail) VALUES ('$idcourse','$costa_off1','$costa_off1tel','$costa_off1mail','$costa_off2','$costa_off2tel','$costa_off2mail')";
    $result2=mysql_query($sqlofficer);

    echo "<script>alert('Proses Selesai')</script>";
    echo "<script>window.location.href='daftarkursus.php'</script>"; 
  }
  if ($adminakses!=$co_catid) {
    echo "<script>alert('PERHATIAN: Maaf Tahap Akses Anda Tidak Boleh Untuk Meneruskan Proses ini.Pentadbir Hanya Boleh Mendaftar Kursus Mengikut Kategori Kursus Dan Tahap Akses yang telah ditetap')</script>";
    echo "<script>window.location.href='daftarkursus.php'</script>";
  }
}
?>
