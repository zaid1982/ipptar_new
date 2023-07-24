<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ekursus IPPTAR</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	    
	<link rel="stylesheet" href="template/style/reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="template/style/style.css" media="screen,projection" type="text/css" /> 
    
	<link rel="shortcut icon" href="favicon.ico" /> 
    
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #333333; }
.style4 {color: #333333; font-weight: bold; }
-->
    </style>
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
		
		<h1>SENARAI KURSUS</h1>
	    <div id="sort-lists">
          <p>Papar</p>
	      <div id="checklist-type" class="selection"> <span class="drop-select">Semua</span>
              <ul>
                <li><a href="#" title="Semua">Semua</a></li>
                <li><a href="kursusaktif.php?id=123441231" title="Kejuruteraan TV">Kejuruteraan TV</a></li>
                <li><a href="#" title="Rancangan TV">Rancangan TV</a></li>
                <li><a href="#" title="Kejuruteraan radio">Kejuruteraan radio</a></li>
                <li><a href="#" title="Rancangan radio">Rancangan radio</a></li>
                <li><a href="#" title="Bahagian kejuruteraan asas pemancar">Bahagian kejuruteraan asas pemancar</a></li>
                <li><a href="#" title="Teras dan pembangunan">Teras dan pembangunan</a></li>
                <li><a href="#" title="ICT">ICT</a></li>
                <li><a href="#" title="Lain-lain">Lain-lain</a></li>
        
              
            </ul>
          </div>
	      <p>Susun</p>
	      <div id="checklist-sort" class="selection"> <span class="drop-select">Tarikh</span>
              <ul>
                <li><a href="#" title="Tarikh">Tarikh</a></li>
                <li><a href="#" title="Kategori kursus">Kategori kursus</a></li>
                
              </ul>
          </div>
        </div>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	  <form id="checklist-options" method="post" action="http://haryzat.launchlist.net/checklist-settings.php">
        <div id="description"></div>
	    <div class="clear"></div>
	    <table width="100%" border="0">
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><div align="center" class="style4">Bil </div></td>
            <td scope="col"><div align="center" class="style4">Tarikh</div></td>
            <td scope="col"><div align="center" class="style4">Kategori kursus</div></td>
            <td scope="col"><div align="center" class="style4">Nama kursus</div></td>
            <td scope="col"><div align="center" class="style4">Mohon</div></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td colspan="5" scope="col">.................................................................................................................................................................</td>
            </tr>
          <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td width="4%" scope="col"><div align="center" class="style3">1</div></td>
            <td width="12%" class="style1" scope="col"><div align="center" class="style3">21 Jul 2011</div></td>
            <td width="30%" scope="col"><span class="style3">BAHAGIAN KEJURUTERAAN TV</span></td>
            <td width="46%" scope="col"><span class="style3">KURSUS KENDALIAN KAMERA TUNGGAL (SCP) - SIRI 1</span></td>
            <td width="7%" scope="col"><div align="center" class="style3"><a href="mohonkursus.html" target="_blank"><img src="edit-icon.png" width="37" height="38" border="0" /></a></div></td>
          </tr>
         
          
         
         
          <tr>
            <td colspan="6" scope="col"><span class="style1"></span>
              <div align="center" class="style3"></div></td>
            </tr>
        </table>
	    <p class="cancel">&nbsp;</p>
	    </form>
	</div>
    
    
	</div><!-- main-content -->
	<div id="side-content"> <a href="index.php" id="feature-btn" title="Menu utama">MENU UTAMA</a>
        <h3>KURSUS SEDANG BERLANSUNG</h3>
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