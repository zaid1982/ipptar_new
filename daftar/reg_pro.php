<?php require_once('../Connections/coonect.php'); ?>
<?php

if ($_POST['hantar']) // first if 
{
$checklulus=strtoupper($_POST['checklulus']);
$checkbenar=strtoupper($_POST['checkbenar']);
$u_idnum=strtoupper($_POST['kp']);

mysql_select_db($database_coonect, $coonect);
$query_findvaliduser = "SELECT u_idnum FROM u_profile where u_idnum='$u_idnum'";
$findvaliduser = mysql_query($query_findvaliduser, $coonect) or die(mysql_error());
$row_findvaliduser = mysql_fetch_assoc($findvaliduser);
$totalRows_findvaliduser = mysql_num_rows($findvaliduser);
$existuser=$row_findvaliduser['u_idnum'];


if ( $existuser=="") {
// USER PROFILE ATTRIBUTES
$u_name=strtoupper($_POST['name']);
$u_idnum=strtoupper($_POST['kp']);
$u_status="AKTIF";
$u_pwd=strtoupper($_POST['u_password']);
$u_repwd=strtoupper($_POST['u_repassword']);
$u_dob=strtoupper($_POST['dob']);
//$u_age=strtoupper($_POST['age']);
$u_offaddress=strtoupper($_POST['offaddress']);
$u_address=strtoupper($_POST['alamatrumah']);
//$u_postcode=strtoupper($_POST['poskod']);
$u_city=strtoupper($_POST['bandar2']);
//$u_state=strtoupper($_POST['negeri']);
$u_telnum=strtoupper($_POST['telrumah']);
$u_telhp=strtoupper($_POST['hp']);
$u_email=$_POST['email'];
$u_offnum=strtoupper($_POST['telpej']);
$u_offfaks=strtoupper($_POST['nofaks']);
//alamat pejabat
$u_offcity=strtoupper($_POST['bandarpej1']);
$u_city=strtoupper($_POST['bandarpej2']);
$u_postcode=strtoupper($_POST['poskodpej']);
$u_state=strtoupper($_POST['negeri']);
$checklulus=strtoupper($_POST['checklulus']);
$checkbenar=strtoupper($_POST['checkbenar']);

$ua_uni=strtoupper($_POST['universiti']);
$ua_unicourse=strtoupper($_POST['ijazah']);


// USER WORKING INFORMATION

$win_gred=strtoupper($_POST['gred']);
$win_pos=strtoupper($_POST['jawatan']);
$win_poslevel=strtoupper($_POST['trfjawatan']);
$win_nowtime=strtoupper($_POST['tempoh']);
$win_govtime=strtoupper($_POST['tempohker']);
$win_descpos=strtoupper($_POST['tugas']);
$win_exp=strtoupper($_POST['pengalaman']);

// DATE TIMESTAMP

$am='am';
$dateorder=(date("d/m/Y")); 
$timeorder=(date("H:i:s"));


$u_idnum=$_POST['kp'];
$day= substr($u_idnum,4,-6);
$month = substr($u_idnum,2,-8);
$year = substr($u_idnum,0,-10);
$fullborn=$day.'/'.$month.'/'.'19'.$year;
$gender= substr($u_idnum,11);
//echo $gender;


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
