<?php
session_start();
error_reporting(0);
include("top.php");


$hari = array(
		'Sunday' => 'Ahad',
		'Monday' => 'Isnin',
		'Tuesday' => 'Selasa',
		'Wednesday' => 'Rabu',
		'Thursday' => 'Khamis',
		'Friday' => 'Jumaat',
		'Saturday' => 'Sabtu');

$bulan = array(
		'January' => 'Januari',
		'February' => 'Februari',
		'March' => 'Mac',
		'April' => 'April',
		'May' => 'Mei',
		'June' => 'Jun',
		'July' => 'Julai',
		'August' => 'Ogos',
		'September' => 'September',
		'October' => 'Oktober',
		'November' => 'November',		
		'December' => 'Disember');
		
$tarikh =  $hari[date("l")].date(", d ").$bulan[date("F")].date(" Y");


$chk_nav=basename($_SERVER['PHP_SELF']);
if($chk_nav == "index.php") {
$nav01 = "id='nav_aktif'";
$nav02 = "id='nav_x'";
$nav03 = "id='nav_x'";
$nav04 = "id='nav_x'";
$nav05 = "id='nav_x'";
$nav06 = "id='nav_x'";
}elseif($chk_nav == "katalog.php") {
$nav01 = "id='nav_x'";
$nav02 = "id='nav_aktif'";
$nav03 = "id='nav_x'";
$nav04 = "id='nav_x'";
$nav05 = "id='nav_x'";
$nav06 = "id='nav_x'";
}elseif($chk_nav == "mohon.php") {
$nav01 = "id='nav_x'";
$nav02 = "id='nav_x'";
$nav03 = "id='nav_aktif'";
$nav04 = "id='nav_x'";
$nav05 = "id='nav_x'";
$nav06 = "id='nav_x'";
}elseif($chk_nav == "penilaian.php") {
$nav01 = "id='nav_x'";
$nav02 = "id='nav_x'";
$nav03 = "id='nav_x'";
$nav04 = "id='nav_aktif'";
$nav05 = "id='nav_x'";
$nav06 = "id='nav_x'";
}elseif($chk_nav == "admin_profil.php" || $chk_nav == "admin_list.php" || $chk_nav == "admin_new.php") {
$nav01 = "id='nav_x'";
$nav02 = "id='nav_x'";
$nav03 = "id='nav_x'";
$nav04 = "id='nav_x'";
$nav05 = "id='nav_aktif'";
$nav06 = "id='nav_x'";
}elseif($chk_nav == "misc.php" || $chk_nav == "admin_list.php" || $chk_nav == "admin_new.php" || $chk_nav == "ticer_list.php" || $chk_nav == "ticer_new.php") {
$nav01 = "id='nav_x'";
$nav02 = "id='nav_x'";
$nav03 = "id='nav_x'";
$nav04 = "id='nav_x'";
$nav05 = "id='nav_x'";
$nav06 = "id='nav_aktif'";
}else{
$nav01 = "id='nav_aktif'";
$nav02 = "id='nav_x'";
$nav03 = "id='nav_x'";
$nav04 = "id='nav_x'";
$nav05 = "id='nav_x'";
$nav06 = "id='nav_x'";
}
?>
<body>
<div id="container">

<div id="header" class="dontprint">
<div id="header-bar"><img src="../images/logo-ipptar-adm.png" border="0"></div>
<?php
$qstr1=basename($_SERVER['PHP_SELF']);
if($qstr1 != "login.php") {
	
if(!isset($_SESSION['MyLevel']) || time() - $_SESSION['login_time'] > 1800){
	print "<META HTTP-EQUIV = 'Refresh' Content = '0; URL =login.php'>";
	#header('Location: index.php');
        exit;
}else{}
?>
<div id="topBar">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
        <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php print /*date("l, d F Y");*/ $tarikh; ?></b></td>
  	<td align="right"><b>
  	<?php if(isset($_SESSION['MyLevel'])){ ?>
	Selamat Datang <?php print $_SESSION['MyNama']; ?> | <a href="login.php?lo" style="text-decoration:none;color:white">Log Keluar</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php }else{} ?>
	</b></td>
  </tr>
</table>
</div>

</div><!--close header-->
<div id="navigation" class="dontprint">
<table width="100%" border="0" cellspacing="20" cellpadding="0">
  <tr>
    <!--<td align="center" width="20%"><a href="index.php" style="color:white;font-weight:bold"><img src="../images/icon_home2.png" <?php print $nav01; ?>></a></td>-->
    <td align="center" width="20%"><a href="katalog.php" style="color:white;font-weight:bold"><img src="../images/icon_catalogue2.png" <?php print $nav02; ?>></a></td>
    <td align="center" width="20%"><a href="mohon.php" style="color:white;font-weight:bold"><img src="../images/icon_status2.png" <?php print $nav03; ?>></a></td>
    <td align="center" width="20%"><?php if($_SESSION['MyLevel'] == "5"){ ?><a href="#" style="color:white;font-weight:bold"><?php } else { ?><a href="penilaian.php" style="color:white;font-weight:bold"><?php } ?><img src="../images/icon_evaluation2.png" <?php print $nav04; ?>></a></td>
    <td align="center" width="20%"><a href="admin_profil.php" style="color:white;font-weight:bold"><img src="../images/icon_profile2.png" <?php print $nav05; ?>></a></td>
    <td align="center" width="20%"><?php if($_SESSION['MyLevel'] == "1"){ ?><a href="misc.php" style="color:white;font-weight:bold"><?php }else{ ?><a href="ticer_list.php" style="color:white;font-weight:bold"><?php } ?><img src="../images/icon_setting2.png" <?php print $nav06; ?>></a></td>
  </tr>
</table>
</div><!--close navigation-->

<?php 
} else {
?>
</div><!--close header-->
<?php 
}
?>