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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ekursus IPPTAR</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	    
	<link rel="stylesheet" href="template/style/reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="template/style/style.css" media="screen,projection" type="text/css" /> 
    <script type="text/javascript" src="../validation.js"></script>
	<link rel="shortcut icon" href="favicon.ico" /> 
    
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #333333; }
-->
    </style>
    <script type="text/JavaScript">

    </script>
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
		
		<h1>DAFTAR PENTADBIR </h1>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	  <form id="checklist-options" method="post" action="adpro_act.php">
        <div id="description"></div>
	    <div class="clear"></div>
	    <table cellspacing="0" cellpadding="0">
	      
          <tr>
            <td width="19">&nbsp;</td>
            <td width="103" valign="top">Nama</td>
            <td width="8" valign="top"><div align="left">:</div></td>
            <td width="522">
              <input name="adnama" id="Nama Admin" type="text" />            </td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Jawatan Dipegang </td>
            <td valign="top"><div align="left">:</div></td>
            <td>
              <input name="adjawatan" id="Jawatan Dipegang"  type="text" />            </td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Gred Jawatan </td>
            <td valign="top"><div align="left">:</div></td>
            <td>
            <input name="adgred" id="Gred Jawatan" type="text" />            </td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Jabatan </td>
            <td valign="top"><div align="left">:</div></td>
            <td><input name="adjabatan" id="Jabatan Bertugas" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">No. Kad Pengenalan </td>
            <td valign="top"><div align="left">:</div></td>
            <td><input name="adkp" id="Kad Pengenalan" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">ID Pentadbir  </td>
            <td valign="top"><div align="left">:</div></td>
            <td><input name="adids" id="ID Admin" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">E-mel </td>
            <td valign="top"><div align="left">:</div></td>
            <td>
              <input name="ademel" id="Emel Admin" type="text" />            </td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">No. Tel (Pejabat)  </td>
            <td valign="top"><div align="left">:</div></td>
            <td><input name="adoff" id="No Tel Pejabat" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">No. Tel (Bimbit) </td>
            <td valign="top"> 
              <div align="left">:</div></td>
            <td><input name="adhp" id="No Tel Bimbit" type="text" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">Kata Laluan </td>
            <td valign="top"><div align="left">:</div></td>
            <td><input name="adpass" id="Kata Laluan" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Tahap Akses </td>
            <td valign="top"><div align="left">:</div></td>
            <td><label>
              <select name="adakses" size="7" id="select">
                <option>== Pilih Kategori Kursus ==</option>
                <option value="1">BAHAGIAN KEJURUTERAAN TV</option>
                <option value="2">BAHAGIAN RANCANGAN TV</option>
                <option value="3">BAHAGIAN KEJURUTERAAN RADIO</option>
                <option value="4">BAHAGIAN RANCANGAN RADIO</option>
                <option value="5">BAHAGIAN KEJURUTERAAN ASAS PEMANCAR DAN BERSEPADU</option>
                <option value="6">BAHAGIAN PEMBANGUNAN TERAS DAN PEMBANGUNAN RANCANGAN</option>
                <option value="7">BAHAGIAN ICT</option>
                <option value="8">LAIN-LAIN</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td> 
              <div align="left"></div></td>
            <td> 
              <label>
              <input name="addftadmin" type="submit" id="button" onclick="MM_validateForm('Nama Admin','','R','Jawatan Dipegang','','R','Gred Jawatan','','R','Jabatan Bertugas','','R','Kad Pengenalan','','RinRangeI12:12','ID Admin','','R','Emel Admin','','RisEmail','No Tel Pejabat','','RinRangeO9:10','No Tel Bimbit','','RinRangeH10:10','Tahap Akses','','RisNum','Kata Laluan','','R');return document.MM_returnValue" value="Daftar Admin" />
              </label></td>
          </tr>
          <tr>
            <td> </td>
            <td colspan="3"><label> </label></td>
          </tr>
	      </table>
	    <p class="cancel">&nbsp;</p>
	    </form>
	</div>
    
    
	</div><!-- main-content -->
	<div id="side-content"> <a href="adhome.php" id="feature-btn" title="Menu utama">MENU UTAMA</a>
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