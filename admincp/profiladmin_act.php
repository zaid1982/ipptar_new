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

if($_POST['kemaskiniadmin']) {

$hiddenadminid=strtoupper($_POST['hiddenadminid']);
$adname=strtoupper($_POST['adnama']);
$adpos=strtoupper($_POST['adjawatan']);
$adgred=strtoupper($_POST['adgred']);
$adjabatan=strtoupper($_POST['adjabatan']);
$adkp=strtoupper($_POST['adkp']);
$ademel=$_POST['ademel'];
$adtelhp=strtoupper($_POST['adtelhp']);
$adteloff=strtoupper($_POST['adteloff']);

//$a=$_POST[''];

/*update user profile

$day= substr($nokadpengenalan,4,-6);
$month = substr($nokadpengenalan,2,-8);
$year = substr($nokadpengenalan,0,-10);
$fullborn=$day.'/'.$month.'/'.'19'.$year;
$gender= substr($nokadpengenalan,11);


if ( $gender!="1" || $gender!="3"  || $gender!="5" || $gender!="7" || $gender!="9" )
{
$u_gender="P"; 
}

if ( $gender=="1" || $gender=="3"  || $gender=="5" || $gender=="7" || $gender=="9" )
{
$u_gender="L"; 
}
echo $gender;*/

$sqladmin="UPDATE a_pro SET ad_name='$adname', ad_pos='$adpos', ad_department='$adjabatan', ad_gred='$adgred', ad_ic='$adkp', ad_telhp='$adtelhp', ad_teloff='$adteloff', ad_email='$ademel'  where ad_id='$hiddenadminid' ";
mysql_query($sqladmin);

}

?>
<? 
echo "<script>alert('Proses Selesai')</script>";
echo "<script>window.location.href='kemaskiniadmin.php'</script>"; ?>