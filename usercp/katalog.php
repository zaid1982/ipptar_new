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
	    <script type="text/javascript" src="js/top_up-min.js"></script>   
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

<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 
	

<div id="container">

<div id="header">
	 <? include('userheader.php');?>

</div><!-- header -->
	
		
		
		
	<div id="content" >
	
	
	
	
	
	

	<div id="main-content">

	<div id="title">
		
		<h1>KATEGORI KURSUS</h1>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area">
      <form id="checklist-options" method="post" action="http://haryzat.launchlist.net/checklist-settings.php">
        <div id="description"></div>
        <div class="clear"></div>
        <div id="template-selection">
          <h3 id="select-template-title">Pilih kategori kursus. Sila klik pada ikon kursus.</h3>
          <div id="select-template">
            <div id="template-holder" style="visibility: visible; overflow-x: hidden; overflow-y: hidden; position: relative; z-index: 2; left: 0px; width: 612px; ">
              <ul style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; position: relative; list-style-type: none; z-index: 1; width: 1224px; left: 0px; ">
                <li class="selectable" title="Bahagian Kejuruteraan TV" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="status.php" toptions=" shaded = 1, type = iframe, effect = fade, width = 900, height = 600, layout = quicklook" ><img src="screen-icon.png" alt="Bahagian Kejuruteraan TV" /></a></span><span class="name">Bahagian Kejuruteraan TV<span class="field-no">Kejuruteraan</span></span></li>
                <li class="selectable" title="Bahagian Rancangan TV" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="ranctv.html" target="_blank"><img src="screen-icon.png" alt="Bahagian Rancangan TV" /></a></span><span class="name">Bahagian Rancangan TV<span class="field-no">Rancangan</span></span></li>
                <li class="selectable" title="Bahagian Kejuruteraan Radio" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="kejradio.html" target="_blank"><img src="mobile-icon.png" alt="Bahagian Kejuruteraan Radio" /></a></span><span class="name">Bahagian Kejuruteraan Radio<span class="field-no">Kejuruteraan</span></span></li>
                <li class="selectable" title="Bahagian Rancangan Radio" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="rancradio.html" target="_blank"><img src="mobile-icon.png" alt="Bahagian Rancangan Radio" /></a></span><span class="name">Bahagian Rancangan Radio<span class="field-no">Rancangan</span></span></li>
                
                 <li class="selectable" title="Bahagian Kej Asas Pemancar" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="kejasas.html" target="_blank"><img src="migrate-icon.png" alt="Bahagian Kej Asas Pemancar" /></a></span><span class="name">Bahagian Kej Asas Pemancar<span class="field-no">Kejuruteraan</span></span></li>
                 
                  <li class="selectable" title="Bahagian Pembangunan Teras Dan Pembangunan Rancangan" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="pembangunan.html" target="_blank"><img src="people-icon.png" alt="Bahagian Pembangunan Teras Dan Pembangunan Rancangan" /></a></span><span class="name">Bahagian Pembangunan Teras Dan Pembangunan Rancangan<span class="field-no">Pembangunan</span></span></li>
                  
                  <li class="selectable" title="ICT" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="ict.html" target="_blank"><img src="world-icon.png" alt="ICT" /></a></span><span class="name">ICT<span class="field-no">ICT</span></span></li>
                   
                <li class="selectable" title="Lain-lain" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="lain-lain.html" target="_blank"><img src="mail-icon.png" alt="Lain-lain" /></a></span><span class="name">Lain-lain<span class="field-no">Lain-lain</span></span></li>
                
                
                <li style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "></li>
                <li style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "></li>
                <li style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "></li>
              </ul>
            </div>
            <a href="" name="prev-templates" class="disabled" id="prev-templates"></a><a href="" id="next-templates" class=""></a> </div>
        </div>
        <input type="hidden" id="template_id" name="template" value="1185" />
        <div id="collaborators"> </div>
        
        <p class="cancel">&nbsp;</p>
      </form>
	  </div>
	</div>
	<!-- main-content -->
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