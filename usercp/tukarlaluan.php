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
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
    </style>
   
</head>
<body>
<noscript><p>Log outLooks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 


<div id="container">

<div id="header">
<? include('userheader.php');?>

</div><!-- header -->
	
		
		
		
	<div id="content" >
	
	
	
	
	
	

	<div id="main-content" onfocus="MM_validateForm('Katalaluan Asal','','R','katalaluan Baru','','R');return document.MM_returnValue">

	<div id="title">
		
		<h1>PROFIL</h1>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	  <form class="standard-form" id="standard-form" action="pass_act.php" method="post">
        <div class="description">
          <div class="field" onfocus="MM_validateForm('Katalaluan Asal','','R','katalaluan Baru','','R');return document.MM_returnValue">
            <label for="nama">Kata Laluan Lama:</label>
            <input name="asal" type="password" id="Katalaluan Asal" value="" />
            
          </div>
          <div class="field">
            <label for="nama">Kata Laluan Baru:</label>
            <input name="baru" type="password" id="katalaluan Baru" value="" />
         
          </div>
		   <div class="field">
            <label for="nama"><? 
$valid=$_GET['validation'];
if ($valid=="yes") {
 ?>
<p align="center" class="style1">Maaf kata laluan lama anda tidak sepadan.</p> 
<? } ?>	

</label>
            <input type="hidden" name="email_original" value="haryzatzulzahary@gmail.com" />
          </div>
          <div class="clear"></div>
        </div>
	    <button name="submit_account" value="Update" type="submit" id="submit_account" onclick="MM_validateForm('Katalaluan Asal','','R','katalaluan Baru','','R');return document.MM_returnValue">SIMPAN</button>
	    <div class="clear"></div>
	    </form>
	</div>
	
	</div><!-- main-content -->
<div id="side-content"> <a href="index.php" id="feature-btn" title="Menu Utama">MENU UTAMA </a>
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
//mysql_free_result($Recordset1);
?>