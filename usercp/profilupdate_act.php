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
$query_viewpro = sprintf("SELECT u_name, u_idnum, u_id FROM u_profile WHERE u_idnum = '%s'", $colname_viewpro);
$viewpro = mysql_query($query_viewpro, $coonect) or die(mysql_error());
$row_viewpro = mysql_fetch_assoc($viewpro);
$id=$row_viewpro['u_id'];

$totalRows_viewpro = mysql_num_rows($viewpro);


$nama         = strtoupper(addslashes($_POST['nama']));
$emel         = addslashes($_POST['emel']);
$notelefon    = strtoupper(addslashes($_POST['notelefon']));
$alamat       = strtoupper(addslashes($_POST['alamat']));
$kementerian  = strtoupper(addslashes($_POST['kementerian']));

//alamat jabatan

$alamatjabatan1     = strtoupper(addslashes($_POST['alamatjabatan1']));
$alamatjabatan2     = strtoupper(addslashes($_POST['alamatjabatan2']));
$poskodjabatan      = strtoupper(addslashes($_POST['poskodalamatjabatan']));
$negerijabatanform  = strtoupper(addslashes($_POST['negerijabatanform']));

$negerialamatjabatan = strtoupper(addslashes($_POST['negeri']));

if ($negerialamatjabatan!="")
{
$negerijabatan=$negerialamatjabatan;
}

if($negerialamatjabatan=="")
{
$negerijabatan=$negerijabatanform;
}


// end of department
$notelpejabat     = strtoupper(addslashes($_POST['notelpejabat']));
$fakspejabat      = strtoupper(addslashes($_POST['fakspejabat']));
$jawatansekarang  = strtoupper(addslashes($_POST['jawatansekarang']));
$tarafjawatan     = strtoupper(addslashes($_POST['tarafjawatan']));
$tempohberkhidmat = strtoupper(addslashes($_POST['tempohberkhidmat']));
$khidmatkerajaan  = strtoupper(addslashes($_POST['khidmatkerajaan']));
$tugas            = strtoupper(addslashes($_POST['tugas']));
$akademik         = strtoupper(addslashes($_POST['akademik']));
$pusatakademik    = strtoupper(addslashes($_POST['pusatakademik']));

//update user profile

$day      = substr($nokadpengenalan,4,-6);
$month    = substr($nokadpengenalan,2,-8);
$year     = substr($nokadpengenalan,0,-10);
$fullborn = $day.'/'.$month.'/'.'19'.$year;
$gender   = substr($nokadpengenalan,11);
//echo $gender;

if ( $gender!="1" || $gender!="3"  || $gender!="5" || $gender!="7" || $gender!="9" )
{
$u_gender="P"; 
}

if ( $gender=="1" || $gender=="3"  || $gender=="5" || $gender=="7" || $gender=="9" )
{
$u_gender="L"; 
}

$sqluser="UPDATE u_profile SET u_name='$nama',u_offaddress='$kementerian',u_address='$alamat',u_telhp='$notelefon',u_email='$emel',u_offnum='$notelpejabat',u_offfaks='$fakspejabat',u_offcity='$alamatjabatan1',u_gender='$u_gender',u_city='$alamatjabatan2',u_postcode='$poskodjabatan',u_state='$negerijabatan' where u_id='$id' ";
mysql_query($sqluser);

//update academic
$sqluser2="UPDATE ua_academic SET ua_uni='$pusatakademik', ua_unicourse='$akademik' where ua_acd_id='$id'";
mysql_query($sqluser2);
//update working experience
$sqluser3="UPDATE win_info SET win_gred='$tarafjawatan', win_pos='$jawatansekarang', win_nowtime='$tempohberkhidmat', win_govtime='$khidmatkerajaan', win_descpos='$tugas' where win_id='$id'";
mysql_query($sqluser3);

?>
<? echo "<script>window.location.href='profiletest.php'</script>"; ?>