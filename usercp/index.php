<?php require_once('../Connections/coonect.php'); ?>
<? include 'userconfig.php'; ?>
<? include 'userlogout.php'; ?>
<? include 'userrestric.php'; ?>
<? include 'checker.php'; ?>


<?php
$colname_viewpro = "-1";
if (isset($_SESSION['MM_User'])) {
  $colname_viewpro = (get_magic_quotes_gpc()) ? $_SESSION['MM_User'] : addslashes($_SESSION['MM_User']);
}
mysql_select_db($database_coonect, $coonect);
$query_viewpro = sprintf("SELECT u_name, u_idnum FROM u_profile WHERE u_idnum = '%s'", $colname_viewpro);
$viewpro = mysql_query($query_viewpro, $coonect) or die(mysql_error());
$row_viewpro = mysql_fetch_assoc($viewpro);
$totalRows_viewpro = mysql_num_rows($viewpro);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ekursus IPPTAR</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	    
	<link rel="stylesheet" href="template/style/reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="template/style/style.css" media="screen,projection" type="text/css" /> 
	<link rel="shortcut icon" href="favicon.ico" /> 
    <link href="colorbox-v=1279188384.css" rel="stylesheet" type="text/css" />

<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->
 
<script type="text/javascript" src="jquery/jquery.js"></script> 

<script type="text/javascript" src="jquery/common.js"></script> 
<script type="text/javascript" src="jquery/js/txt.js"></script>

<script type="text/javascript" src="public/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="public/fancybox/jquery.fancybox-1.3.1.pack.js"></script> 
<script type="text/javascript" src="jquery/jquery.colorbox-min.js"></script> 
<script type="text/javascript" src="public/js/jquery.validate.min.js"></script> 
<script type="text/javascript" src="public/js/jquery.hoverIntent.minified.js"></script> 
<script type="text/javascript" src="public/js/functions.js"></script> 
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

</head>
<body>

<noscript><p>Log outLooks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 
	

<div id="container">

<div id="header">
	 <? include('userheader.php');?>
</div><!-- header -->
	
		
		
		
	<div id="content" >
	
	
	
	
	
	

	<div id="main-content">

	<div id="title">
		
		<h1>IPPTAR EKURSUS</h1>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	
		<div id="templates-holder">
	
			<a href="profiletest.php" title="Kemas kini profil anda" class="template"><span class="icon"><img src="people-icon.png" alt="Kemas kini profil anda" /></span><span class="name">Profil<span class="field-no">Kemas kini profil anda</span></span><span href="profil.php"> </a><a href="katalogtest.php" title="Lihat katalog kursus" class="template"><span class="icon"><img src="book-icon.png" alt="Lihat katalog kursus" /></span><span class="name">Katalog Kursus <span class="field-no">Untuk melihat senarai kursus</span></span><span href="status.php"> </a><a href="status.php" title="Periksa status" class="template"><span class="icon"><img src="check-icon.png" alt="Periksa status" /></span><span class="name">Status Permohonan <span class="field-no">Semak status pemohonan kursus anda</span></span><span href="rekod.html"> </a><a href="userrekod.php" title="Lihat rekod kursus" class="template"><span class="icon"><img src="document-icon.png" alt="Lihat rekod kursus" /></span><span class="name">Rekod Kursus <span class="field-no">Senarai rekod kursus anda di IPPTAR</span></span><span href="rekod.html"> </a><a href="tukarlaluan.php" title="Tukar kata laluan" class="template"><span class="icon"><img src="migrate-icon.png" alt="Lihat rekod kursus" width="24" height="24" /></span><span class="name">Tukar Kata Laluan  <span class="field-no">Tukar kata laluan </span></span></a><a href="kursusaktif.php?idcat=0" title="Senarai kursus dibuka" class="template"><span class="icon"><img src="io-icon.png" alt="Lihat rekod kursus" width="24" height="24" /></span><span class="name">Senarai Kursus Dibuka <span class="field-no">Senarai kursus dibuka </span></span> </a>
		    <div class="clear"></div> 

		</div>
	</div>
	
	</div><!-- main-content -->
<div id="side-content"> <a href="kursusaktif.php?idcat=0" id="feature-btn" title="Mohon Kursus">MOHON KURSUS </a>
      <h3>KURSUS SEDANG BERLANGSUNG</h3>
	 <? include('sedangberlangsung.php');?>
	  </div>
	<!-- side-content -->
<div class="clear"></div> 






</div><!-- content -->
  
<div class="push"></div>
    
</div><!-- container -->
 
<div id="footer">

    <div id="footer-inner">
		
    <? include('footerusercp.php');?>
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
mysql_free_result($viewpro);
?>