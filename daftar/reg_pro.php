<?php require_once('../Connections/coonect.php'); ?>
<?php

if ($_POST['hantar']) // first if 
{
$checklulus     = strtoupper(addslashes($_POST['checklulus']));
$checkbenar     = strtoupper(addslashes($_POST['checkbenar']));
$u_idnum        = strtoupper(addslashes($_POST['kp']));

mysql_select_db($database_coonect, $coonect);
$query_findvaliduser = "SELECT u_idnum FROM u_profile where u_idnum='$u_idnum'";
$findvaliduser = mysql_query($query_findvaliduser, $coonect) or die(mysql_error());
$row_findvaliduser = mysql_fetch_assoc($findvaliduser);
$totalRows_findvaliduser = mysql_num_rows($findvaliduser);
$existuser=$row_findvaliduser['u_idnum'];


if ( $existuser=="") {
// USER PROFILE ATTRIBUTES
$u_name         = strtoupper(addslashes($_POST['name']));
$u_idnum        = strtoupper(addslashes($_POST['kp']));
$u_status       ="AKTIF";
$u_pwd          = strtoupper($_POST['u_password']);
$u_repwd        = strtoupper($_POST['u_repassword']);
$u_dob          = strtoupper(addslashes($_POST['dob']));
//$u_age        = strtoupper(addslashes($_POST['age']));
$u_offaddress   = strtoupper(addslashes($_POST['offaddress']));
$u_address      = strtoupper(addslashes($_POST['alamatrumah']));
//$u_postcode   = strtoupper(addslashes($_POST['poskod']));
$u_city         = strtoupper(addslashes($_POST['bandar2']));
//$u_state      = strtoupper(addslashes($_POST['negeri']));
$u_telnum       = strtoupper(addslashes($_POST['telrumah']));
$u_telhp        = strtoupper(addslashes($_POST['hp']));
$u_email        = addslashes($_POST['email']);
$u_offnum       = strtoupper(addslashes($_POST['telpej']));
$u_offfaks      = strtoupper(addslashes($_POST['nofaks']));
//alamat pejabat
$u_offcity      = strtoupper(addslashes($_POST['bandarpej1']));
$u_city         = strtoupper(addslashes($_POST['bandarpej2']));
$u_postcode     = strtoupper(addslashes($_POST['poskodpej']));
$u_state        = strtoupper(addslashes($_POST['negeri']));
$checklulus     = strtoupper(addslashes($_POST['checklulus']));
$checkbenar     = strtoupper(addslashes($_POST['checkbenar']));

$ua_uni         = strtoupper(addslashes($_POST['universiti']));
$ua_unicourse   = strtoupper(addslashes($_POST['ijazah']));


// USER WORKING INFORMATION

$win_gred       = strtoupper(addslashes($_POST['gred']));
$win_pos        = strtoupper(addslashes($_POST['jawatan']));
$win_poslevel   = strtoupper(addslashes($_POST['trfjawatan']));
$win_nowtime    = strtoupper(addslashes($_POST['tempoh']));
$win_govtime    = strtoupper(addslashes($_POST['tempohker']));
$win_descpos    = strtoupper(addslashes($_POST['tugas']));
$win_exp        = strtoupper(addslashes($_POST['pengalaman']));

// DATE TIMESTAMP

$am         = 'am';
$dateorder  = (date("d/m/Y")); 
$timeorder  = (date("H:i:s"));


$u_idnum    = addslashes($_POST['kp']);
$day        = substr($u_idnum,4,-6);
$month      = substr($u_idnum,2,-8);
$year       = substr($u_idnum,0,-10);
$fullborn   = $day.'/'.$month.'/'.'19'.$year;
$gender     = substr($u_idnum,11);

if ( $gender=="2" || $gender=="4"  || $gender=="6" || $gender=="8" || $gender=="0" )
{
$u_gender="P"; 
}

if ( $gender=="1" || $gender=="3"  || $gender=="5" || $gender=="7" || $gender=="9" )
{
$u_gender="L"; 
}

if ( $checklulus=="YA" &&  $checkbenar=="YA") { // checklulus checckbenar

$sqluserprofile="insert into u_profile(u_pwd,u_dob,u_name,u_idnum,u_gender,u_offaddress,u_address,u_telhp,u_email,u_offnum,u_offfaks,u_offcity,u_status,u_city,u_state,u_postcode,u_checklulus,u_checkbenar) 
VALUES ('$u_pwd','$fullborn','$u_name','$u_idnum','$u_gender','$u_offaddress','$u_address','$u_telhp','$u_email','$u_offnum','$u_offfaks','$u_offcity','$u_status','$u_city','$u_state','$u_postcode','$checklulus','$checkbenar')";
$result1=mysql_query($sqluserprofile);

//*select id to insert data.
mysql_select_db($database_coonect, $coonect);
$query_serid = "SELECT * FROM u_profile WHERE u_idnum='$u_idnum'";
$serid = mysql_query($query_serid, $coonect) or die(mysql_error());
$row_serid = mysql_fetch_assoc($serid);
$totalRows_serid = mysql_num_rows($serid);


$iduser=$row_serid['u_id'];

$sqlacademic="insert into ua_academic (ua_acd_id,ua_uni,ua_unicourse) VALUES ('$iduser','$ua_uni','$ua_unicourse')";
$result2=mysql_query($sqlacademic);

$sqlwininfo="insert into win_info (win_id,win_gred,win_pos,win_nowtime,win_govtime,win_descpos,win_exp) VALUES ('$iduser','$win_gred','$win_pos','$win_nowtime','$win_govtime','$win_descpos','$win_exp')";
$result3=mysql_query($sqlwininfo);

echo "<script>alert('Proses Pendaftaran Selesai')</script>";
echo "<script>window.location.href='../registersuccessuserlogin.php'</script>"; 
}
if (( $checklulus!="YA")|| ( $checkbenar!="YA")) 
{ // checklulus checckbenar
echo "<script>alert('PERHATIAN:: Sila Klik Kedua-dua kotak akuan pemohon untuk meneruskan proses pendaftaran')</script>";
echo "<script>window.location.href='index.php'</script>"; 
}// checklulus checckbenar

}// close existuser

//mysql_free_result($serid);


if ( $existuser!="") {
echo "<script>alert('Maaf Maklumat $u_idnum sudah ada dalam simpanan sistem')</script>";
echo "<script>window.location.href='index.php'</script>"; 
} // close existuser
}
mysql_free_result($findvaliduser);

include ("mailfunction.php"); 

?>
