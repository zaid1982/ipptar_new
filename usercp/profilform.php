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
$iduser=$_GET['iduser'];

if ($id==$iduser){
//echo werawawesome;
mysql_select_db($database_coonect, $coonect);
$query_Recordset1 = "SELECT * FROM u_profile, ua_academic, win_info where u_profile.u_id='$id' and ua_academic.ua_acd_id='$id' and win_info.win_id='$id' ";
$Recordset1 = mysql_query($query_Recordset1, $coonect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

}

if ($id!=$iduser){
//echo errorrr;
}
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
    <script type="text/javascript" src="../validation.js"></script>
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

    <script type="text/JavaScript">

    </script>
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
		
		<h1>PROFIL</h1>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	  <form class="standard-form" id="standard-form"action="profilupdate_act.php" method="post">
        <div class="description">
          <div class="field">
            <label for="nama">Nama Penuh:</label>
            <input name="nama" type="text" id="Nama" value="<?php echo $row_Recordset1['u_name']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">E-mel:</label>
            <input name="emel" type="text" id="Emel" value="<?php echo $row_Recordset1['u_email']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">No. Tel. Bimbit:</label>
            <input name="notelefon" type="text" id="No Telefon Bimbit" value="<?php echo $row_Recordset1['u_telhp']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Alamat Tetap / Rumah:</label>
            <input name="alamat" type="text" id="Alamat Lengkap" value="<?php echo $row_Recordset1['u_address']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Nama Jabatan:</label>
            <input name="kementerian" type="text" id="Kementerian/Jabatan" value="<?php echo $row_Recordset1['u_offaddress']; ?>" />
            
          </div>
         
          <div class="field">
            <label for="nama">No. Tel. Pejabat:</label>
            <input name="notelpejabat" type="text" id="No Telefon Pejabat" value="<?php echo $row_Recordset1['u_offnum']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">No. Faks Pejabat:</label>
            <input name="fakspejabat" type="text" id="No Faks Pejabat" value="<?php echo $row_Recordset1['u_offfaks']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Jawatan Sekarang:</label>
            <input name="jawatansekarang" type="text" id="Jawatan Sekarang" value="<?php echo $row_Recordset1['win_pos']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Gred Jawatan:</label>
            <input name="tarafjawatan" type="text" id="Gred Jawatan" value="<?php echo $row_Recordset1['win_gred']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Tempoh Berkhidmat Dalam Jawatan:</label>
            <input name="tempohberkhidmat" type="text" id="Tempoh Berkhidmat Dalam Jawatan" value="<?php echo $row_Recordset1['win_nowtime']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Tempoh Berkhidmat Dalam Kerajaan:</label>
            <input name="khidmatkerajaan" type="text" id="Tempoh Berkhidmat Dalam Kerajaan" value="<?php echo $row_Recordset1['win_govtime']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Tugas Sekarang:</label>
            <input name="tugas" type="text" id="Tugas/Pengalaman" value="<?php echo $row_Recordset1['win_descpos']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Kelulusan Akademik Tertinggi:</label>
            <input name="akademik" type="text" id="Akademik" value="<?php echo $row_Recordset1['ua_unicourse']; ?>" />
            
          </div>
          <div class="field">
            <label for="nama">Pusat Pengajian Akademik:</label>
            <input name="pusatakademik" type="text" id="Pusat Akademik" value="<?php echo $row_Recordset1['ua_uni']; ?>" />
            
          </div>
		   <div class="field">
            <label for="nama">Alamat Tempat Bertugas (Ruangan 1):</label>
            <input name="alamatjabatan1" type="text" id="Alamat Bertugas Ruangan 1" value="<?php echo $row_Recordset1['u_offcity']; ?>" />
            
          </div>
		   <div class="field">
            <label for="nama">Poskod:</label>
            <input name="poskodalamatjabatan" type="text" id="Poskod Tempat Bertugas" value="<?php echo $row_Recordset1['u_postcode']; ?>" />
            
          </div>
		   <div class="field">
           <label for="nama">Alamat Tempat Bertugas (Ruangan 2):</label>
            <input name="alamatjabatan2" type="text" id="Alamat Bertugas Ruangan 2" value="<?php echo $row_Recordset1['u_city']; ?>" />
			 <input name="negerijabatanform" type="hidden" id="Alamat Bertugas" value="<?php echo $row_Recordset1['u_state']; ?>" />
			
            
          </div>
		   <div class="field">
             <label for="nama">Alamat Tempat Bertugas:</label>
           <select name="negeri">
                          <option value="">== Pilih Negeri ==</option>
                          <option value="JOHOR">Johor</option>
                          <option value="KEDAH">Kedah</option>
                          <option value="KELANTAN">Kelantan</option>
                          <option value="MELAKA">Melaka</option>
                          <option value="NEGERI SEMBILAN">Negeri Sembilan</option>
                          <option value="PAHANG">Pahang</option>
                          <option value="PERAK">Perak</option>
                          <option value="PERLIS">Perlis</option>
                          <option value="PULAU PINANG">Pulau Pinang</option>
                          <option value="SABAH">Sabah</option>
                          <option value="SARAWAK">Sarawak</option>
                          <option value="SELANGOR">Selangor</option>
                          <option value="TERENGGANU">Terengganu</option>
                          <option value="WILAYAH PERSEKUTUAN KUALA LUMPUR">Wilayah Persekutuan Kuala Lumpur</option>
                          <option value="WILAYAH PERSEKUTUAN PUTRAJAYA">Wilayah Persekutuan Putrajaya</option>
                          <option value="WILAYAH PERSEKUTUAN LABUAN">Wilayah Persekutuan Labuan</option>
              </select>
            
          </div>
          <div class="clear"></div>
        </div>
	    <button name="submit_account" value="Update" type="submit" id="submit_account" onclick="MM_validateForm('Nama','','R','Emel','','RisEmail','Umur','','RisNum','No Telefon Bimbit','','RinRange10:11','Alamat Lengkap','','R','Kementerian/Jabatan','','R','No Telefon Pejabat','','RinRange9:10','No Faks Pejabat','','RinRange9:10','Jawatan Sekarang','','R','Gred Jawatan','','R','Tempoh Berkhidmat Dalam Jawatan','','RisNum','Tempoh Berkhidmat Dalam Kerajaan','','RisNum','Tugas/Pengalaman','','R','Akademik','','R','Pusat Akademik','','R','Alamat Bertugas (Ruangan 1)','','Ruangan 1','Poskod Tempat Bertugas','','RisNum','Alamat Bertugas (Ruangan 2)','','Ruangan 2');MM_validateForm('Alamat Bertugas Ruangan 1','','R','Alamat Bertugas Ruangan 2','','R');return document.MM_returnValue">SIMPAN</button>
	    <div class="clear"></div>
	    </form>
	</div>
	
	</div><!-- main-content -->
<div id="side-content"> <a href="profiletest.php" id="feature-btn" title="Maklumat Profil">PROFIL </a>
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
mysql_free_result($Recordset1);
?>