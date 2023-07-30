<?php require_once('../Connections/coonect.php'); ?>
<? include 'adconfig.php'; ?>
<? include 'adrestric.php'; ?>
<? include 'adlogout.php'; ?>
<? include 'checker.php'; ?>

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

mysql_select_db($database_coonect, $coonect);
$query_countproses = "SELECT COUNT(costu_status) FROM costu_all where costu_status='Proses' ";
$result1 = mysql_query($query_countproses) or die(mysql_error());
$row1 = mysql_fetch_array($result1);
$Permohonanbaru=$row1['COUNT(costu_status)'];


mysql_select_db($database_coonect, $coonect);
$query_countproses2 = "SELECT COUNT(co_langsung) FROM co_info where co_langsung='Berlangsung' ";
$result2 = mysql_query($query_countproses2) or die(mysql_error());
$row2 = mysql_fetch_array($result2);
$langsung=$row2['COUNT(co_langsung)'];

mysql_select_db($database_coonect, $coonect);
$query_countproses3 = "SELECT COUNT(co_status) FROM co_info where co_status='Buka' ";
$result3 = mysql_query($query_countproses3) or die(mysql_error());
$row3 = mysql_fetch_array($result3);
$buka=$row3['COUNT(co_status)'];
$adminakses=$row_viewad['ad_akses'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ekursus IPPTAR</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	  <link rel="stylesheet" href="../jquery.jgrowl.css" type="text/css"/>  
	<link rel="stylesheet" href="template/style/reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="template/style/style.css" media="screen,projection" type="text/css" /> 
	
	<link rel="shortcut icon" href="favicon.ico" /> 
    <link rel="stylesheet" href="../jquery.jgrowl.css" type="text/css"/>
		
<? 
$value = addslashes($_GET['value']);
if ($value=="true") {
?>		
		
		
		<style type="text/css">

			div.jGrowl-notification {
				float: 			centre;
				margin-left: 	6px;
			}

		</style>
	
		
		<script type="text/javascript" src="../jquery-1.4.2.js"></script>
		<script type="text/javascript" src="./jquery.ui.all.js"></script>
		<script type="text/javascript" src="../jquery.jgrowl.js"></script>
		<script type="text/javascript">
 

		(function($){

			$(document).ready(function(){
				
				$.jGrowl.defaults.closer = false;

				if ( !$.browser.safari ) {
					$.jGrowl.defaults.animateOpen = {
						width: 'show'
					};
					$.jGrowl.defaults.animateClose = {
						width: 'hide'
					};
				}

				$.jGrowl("<? echo $Permohonanbaru; ?> Permohonan Baru" , { sticky: true });
				$.jGrowl("<? echo $langsung; ?> Kursus Sedang Berlangsung", { sticky: true });
				$.jGrowl("<? echo $buka; ?> Kursus Dibuka", { sticky: true });
			});
		})(jQuery);
<?  } ?>
		</script>
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

</head>
<body>

<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 
	

<div id="container">

<div id="header">
 <? include('adminheader.php');?>
</div><!-- header -->
	
		
		
		
	<div id="content" >
	
	
	
	
	
	

	<div id="main-content">

	<div id="title">
		
		<h1>IPPTAR EKURSUS  </h1>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	
		<div id="templates-holder">
		
		
		<a href="daftarkursus.php" title="Daftar Kursus" class="template"><span class="icon"><img src="icon/tambahkursus.png" alt="Daftar Kursus" width="24" height="24" /></span><span class="name">Daftar Kursus  <span class="field-no">Daftar ke dalam katalog kursus</span></span><span href="status.html"> </a>
		
		<a href="uruskursus.php" title="Urus Kursus" class="template"><span class="icon"><img src="icon/urus.png" alt="Urus Kursus" width="24" height="24" /></span><span class="name">Urus Kursus<span class="field-no">Urus kursus yang telah didaftar</span></span><span href="rekod.html"> </a>
	
		<a href="permohonanterkini.php" title="Permohonan Kursus" class="template"><span class="icon"><img src="icon/permohonan.png" alt="Permohonan Kursus" width="24" height="24" /></span><span class="name">Pemohon Kursus<span class="field-no">Urus permohonan kursus</span></span><span href="rekod.html"> </a>
		
		
			<a href="kehadiran.php" title="Rekod Kehadiran" class="template"><span class="icon"><img src="icon/kehadiran.png" alt="Rekod Kehadiran" width="24" height="24" /></span><span class="name">Kehadiran Kursus <span class="field-no">Maklumat kehadiran </span></span> </a>
			<? if ($adminakses=="SUPER") {?>
			<a href="makpemohon.php" title="Maklumat Pengguna" class="template"><span class="icon"><img src="userinfo.png" alt="Maklumat Pengguna" width="24" height="24" /></span><span class="name">Maklumat Pengguna <span class="field-no">Urus maklumat pengguna </span></span> </a>
			
		<a href="daftaradmin.php" title="Daftar Admin" class="template"><span class="icon"><img src="adminadd.png" alt="Daftar Pentadbir" width="24" height="24" /></span><span class="name">Daftar Pentadbir  <span class="field-no">Daftar Pentadbir</span></span></a>
				
		<a href="makadmin.php" title="Maklumat Admin" class="template"><span class="icon"><img src="admininfo.png" alt="Maklumat Pentadbir " width="24" height="24" /></span><span class="name">Maklumat Pentadbir <span class="field-no">Urus maklumat admin </span></span></a>
			<? } ?>
		<a href="kemaskiniadmin.php" title="Kemas Kini Admin" class="template"><span class="icon"><img src="admin.png" alt="Kemas Kini Profil Pentadbir" width="24" height="24" /></span><span class="name">Kemas Kini Profil Pentadbir <span class="field-no">Kemas kini maklumat profil </span></span> </a>	
			
			
			
			
			
		    <div class="clear"></div> 

		</div>
	</div>
	
	</div><!-- main-content -->
	<div id="side-content"><a href="adhome.php" id="feature-btn" title="">MENU UTAMA </a>
      <h3>KURSUS SEDANG BERLANGSUNG</h3>
	 <? include('adsedangberlangsung.php');?>
	  </div>
	<!-- side-content -->
<div class="clear"></div> 






</div><!-- content -->
  
<div class="push"></div>
    
</div><!-- container -->
 
<div id="footer">

    <div id="footer-inner">
		<? include('adminfooter.php');?>
    
    </div>

</div>



<script src="template/js/jquery-1.4.2.min.js" type="text/javascript"></script> 
<script src="template/js/jcarousellite_1.0.1.min.js" type="text/javascript"></script>
<script src="template/js/jquery.mousewheel.min.js" type="text/javascript"></script>
<script src="template/js/jquery.easing.1.1.js" type="text/javascript"></script>
<script src="template/js/checklist-settings.js" type="text/javascript"></script>
<script src="template/js/jquery.blockUI.js" type="text/javascript"></script>
<script src="template/js/general.js" type="text/javascript"></script>

</body>
</html>
<?php
mysql_free_result($viewad);


?>