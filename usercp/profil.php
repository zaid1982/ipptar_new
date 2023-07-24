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
	    
	<link rel="stylesheet" href="template/style/reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="template/style/style.css" media="screen,projection" type="text/css" /> 
    
	<link rel="shortcut icon" href="favicon.ico" /> 
    
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

</head>
<body>

<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 
	

<div id="container">

<div id="header">
  <? include('userheader.php');?>
</div>
<!-- header -->
	
		
		
		
	<div id="content" >
	
	
	
	
	
	

	<div id="main-content">

	<div id="title">
		
		<h1>PROFIL</h1>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	  <form class="standard-form" action="http://haryzat.launchlist.net/account" method="post">
        <div class="description">
          <div class="field">
            <label for="nama">Nama:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          Muhammad Wira Izkandar Bin Zulzahary </div>
          <div class="field">
            <label for="nama">No kad pengenalan anda:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          870824055549</div>
          <div class="field">
            <label for="nama">Emel:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          weraw.hayek@gmail.com</div>
          <div class="field">
            <label for="nama">Tarikh lahir:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          24/08/2011</div>
          <div class="field">
            <label for="nama">Umur:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          24</div>
          <div class="field">
            <label for="nama">Jantina:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          Lelaki</div>
          <div class="field">
            <label for="nama">No telefon:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          0172777134</div>
          <div class="field">
            <label for="nama">Alamat tetap lengkap:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          ukay perdana </div>
          <div class="field">
            <label for="nama">Kementerian / Jabatan:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          ICT Putrajaya </div>
          <div class="field">
            <label for="nama">Alamat tempat bertugas:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          Putrajaya</div>
          <div class="field">
            <label for="nama">No telefon pejabat:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          0314245623</div>
          <div class="field">
            <label for="nama">No faks pejabat:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          3232323232</div>
          <div class="field">
            <label for="nama">Jawatan sekarang:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
            Penolong Pengarah 
          </div>
          <div class="field">
            <label for="nama">Taraf jawatan:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          Penolong Pengarah          </div>
          <div class="field">
            <label for="nama">Tempoh berkhidmat dalam jawatan:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          2 Tahun </div>
          <div class="field">
            <label for="nama">Tempoh berkhidmat dalam kerajaan:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          s</div>
          <div class="field">
            <label for="nama">Tugas sekarang / pengalaman:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          Menyelenggara</div>
          <div class="field">
            <label for="nama">Taraf akademik tertinggi:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          Ijazah Sarajana Muda </div>
          <div class="field">
            <label for="nama">Pusat akademik Universiti / Kolej / Sekolah:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          Universiti Putra Malaysia </div>
          <div class="field">
            <label for="nama">Kata laluan:</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          </div>
          <div class="clear"></div>
        </div>
	    <button type="submit" id="submit_account" name="submit_account" value="Update">SIMPAN</button>
	    <div class="clear"></div>
	    </form>
	</div>
	
	</div><!-- main-content -->
<div id="side-content"> <a href="kursusaktif.php?idcat=0" id="feature-btn" title="Mohon Kursus">MOHON KURSUS </a>
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