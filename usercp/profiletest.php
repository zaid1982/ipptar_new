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

mysql_select_db($database_coonect, $coonect);
$query_viewprofile = "SELECT * FROM u_profile, ua_academic, win_info where u_profile.u_id='$id' and ua_academic.ua_acd_id='$id' and win_info.win_id='$id' ";
$viewprofile = mysql_query($query_viewprofile, $coonect) or die(mysql_error());
$row_viewprofile = mysql_fetch_assoc($viewprofile);
$totalRows_viewprofile = mysql_num_rows($viewprofile);

$alamatpej1=$row_viewprofile['u_offcity']; 
$alamatpej2=$row_viewprofile['u_city']; 
$poskodpej=$row_viewprofile['u_postcode']; 
$statepej=$row_viewprofile['u_state']; 
$alamatpejabatfull=$alamatpej1.' '.$alamatpej2.' '.$poskodpej.' '.$statepej;
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
	  <form class="standard-form" action="" method="post">
        <div class="description">
          <div class="field">
            <label for="nama"><strong>Nama:</strong></label>
            
            <?php echo $row_viewprofile['u_name']; ?></div>
          <div class="field">
            <label for="nama"><strong>No. Kad Pengenalan:</strong></label>
            
            <?php echo $row_viewprofile['u_idnum']; ?></div>
          <div class="field">
            <label for="nama"><strong>E-mel:</strong></label>
            
            <?php echo $row_viewprofile['u_email']; ?></div>
          <div class="field">
            <label for="nama"><strong>Tarikh Lahir:</strong></label>
            
            <?php echo $row_viewprofile['u_dob']; ?></div>
          <div class="field">
            <label for="nama"><strong>Jantina:</strong></label>
            
            <?php echo $row_viewprofile['u_gender']; ?></div>
          <div class="field">
            <label for="nama"><strong>No. Tel. Bimbit:</strong></label>
            
            <?php echo $row_viewprofile['u_telhp']; ?></div>
          <div class="field">
            <label for="nama"><strong>Alamat Tetap:</strong></label>
            
         <? echo $fulladrress; ?> <?php echo $row_viewprofile['u_address']; ?></div>
          <div class="field">
            <label for="nama"><strong>Kementerian / Jabatan:</strong></label>
            
            <?php echo $row_viewprofile['u_offaddress']; ?></div>
          <div class="field">
            <label for="nama"><strong>Alamat Tempat Bertugas:</strong></label>
            
            <?php echo $alamatpejabatfull; ?></div>
          <div class="field">
            <label for="nama"><strong>No. Tel. Pejabat:</strong></label>
            
            <?php echo $row_viewprofile['u_offnum']; ?></div>
          <div class="field">
            <label for="nama"><strong>No. Faks Pejabat:</strong></label>
            
            <?php echo $row_viewprofile['u_offfaks']; ?></div>
          <div class="field">
            <label for="nama"><strong>Jawatan Sekarang:</strong></label>
            
            <?php echo $row_viewprofile['win_pos']; ?></div>
          <div class="field">
            <label for="nama"><strong>Gred Jawatan:</strong></label>
            
            <?php echo $row_viewprofile['win_gred']; ?></div>
          <div class="field">
            <label for="nama"><strong>Tempoh Berkhidmat Dalam Jawatan:</strong></label>
            
            <?php echo $row_viewprofile['win_nowtime']; ?> Tahun</div>
          <div class="field">
            <label for="nama"><strong>Tempoh Berkhidmat Dalam Kerajaan:</strong></label>
            
            <?php echo $row_viewprofile['win_govtime']; ?> Tahun</div>
          <div class="field">
            <label for="nama"><strong>Tugas Sekarang:</strong></label>
            
            <?php echo $row_viewprofile['win_descpos']; ?></div>
          <div class="field">
            <label for="nama"><strong>Kelulusan Akademik Tertinggi:</strong></label>
           
            <?php echo $row_viewprofile['ua_unicourse']; ?></div>
          <div class="field">
            <label for="nama"><strong>Pusat Pengajian Akademik:</strong></label>
            
            <?php echo $row_viewprofile['ua_uni']; ?></div>
          <div class="field">
            <label for="nama"></label>
            <div align="right">
              
              <a href="profilform.php?iduser=<? echo $row_viewprofile['u_id']; ?>" title="Kemaskini Profil"><img src="edit-icon.png" alt="Kemaskini Maklumat" width="37" height="38" border="0" /></a></div>
          </div>
          <div class="clear"></div>
        </div>
	   
	    <div class="clear"></div>
	    </form>
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
mysql_free_result($viewprofile);




?>