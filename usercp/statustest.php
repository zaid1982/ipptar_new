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
$iduser=$row_viewpro['u_idnum'];
//echo $iduser;
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
	 
    <link rel="stylesheet" href="template/style/paginationstyle.css" media="screen,projection" type="text/css" /> 
	<link rel="shortcut icon" href="favicon.ico" /> 
   
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #333333; }
.style4 {color: #333333; font-weight: bold; }
.style5 {color: #85C4FF; }
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
		
		<h1>STATUS PERMOHONAN </h1>
	</div>	
	<div class="clear"></div> 	
	<div class="content-area holder">
	  <form id="checklist-options" method="post" action="http://haryzat.launchlist.net/checklist-settings.php">
        <div id="description"></div>
	    <div class="clear"></div>
		
		  
		
		<?php
	//Include the PS_Pagination class
	$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="icourse"; // Database name 
$tbl_name="costu_all"; // Table name 
	include('ps_pagination.php');
	
	//Connect to mysql db
	$conn = mysql_connect("$host","$username","$password");
	if(!$conn) die("Failed to connect to database!");
	$status = mysql_select_db("$db_name", $conn);
	if(!$status) die("Failed to select database!");
	$sql = 'SELECT * FROM costu_all';
	
	/*
	 * Create a PS_Pagination object
	 * 
	 * $conn = MySQL connection object
	 * $sql = SQl Query to paginate
	 * 10 = Number of rows per page
	 * 5 = Number of links
	 * "param1=valu1&param2=value2" = You can append your own parameters to paginations links
	 */
	$pager = new PS_Pagination($conn, $sql, 5, 5, "param1=valu1&param2=value2");
	
	/*
	 * Enable debugging if you want o view query errors
	*/
	$pager->setDebug(true);
	
	/*
	 * The paginate() function returns a mysql result set
	 * or false if no rows are returned by the query
	*/
	$rs = $pager->paginate();
	if(!$rs) die(mysql_error()); ?>
		
	    <table width="98%" border="0" cellpadding="0" cellspacing="0">
         
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><div align="center" class="style4">Id Prmohonan  </div></td>
            <td scope="col"><div align="center" class="style4">Tarikh Mohon </div></td>
            <td scope="col"><div align="center"><strong>Nama Kursus </strong></div></td>
            <td scope="col"><div align="center" class="style4">Kod Kursus</div></td>
            <td scope="col"><div align="center"><strong>Status</strong></div></td>
            <td width="11%" scope="col"><div align="center" class="style4">Tindakan</div></td>
          </tr>
		   <tr>
            <td scope="col">&nbsp;</td>
            <td colspan="6" scope="col">..............................................................................................................................................................</td>
            </tr>
		<?	while($row = mysql_fetch_assoc($rs)) { ?>
			
          <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td width="12%" valign="top" scope="col"><div align="center" class="style3"><? echo $row['costu_appid']; ?></div></td>
            <td width="12%" valign="top" class="style5" scope="col"><div align="center"><span class="style3"><? echo $row[costu_date]?></span></div></td>
           <? 
						 
						$tempcat=$row['costu_id'];
						$tempfile=$row['costu_appid'];
						$query_sercat = "SELECT co_name FROM co_info where co_id=$tempcat";
						$sercat=mysql_query($query_sercat);	
						$rows_sercat=mysql_fetch_array($sercat);
						
						
						$query_serfile = "SELECT costu_filename FROM costu_all where costu_appid=$tempfile";
						$sercatfile=mysql_query($query_serfile);	
						$rows_sercatfile=mysql_fetch_array($sercatfile);
						$namefile=$rows_sercatfile['costu_filename'];
						?>
		    <td width="32%" valign="top" scope="col"><div align="center">
               <? echo $rows_sercat['co_name']?> 
            </div></td>
                        
            <td width="13%" valign="top" scope="col"><div align="center"><span class="style3"><? echo $row['costu_id'];?></span></div></td>
            <td width="19%" valign="top" scope="col"><div align="center"><? echo $row['costu_status']; ?></div></td>
            <td valign="top" scope="col"><table width="68" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="34"><a href="pdf/<? echo $namefile;?>"><img src="aktifkursus.png" alt="Muat Turun Fail" width="37" height="38" /></td>
                <td width="51"><a href="index.php"  class="buy" type="button" id="launchin-btn"><img src="padamkursus.png" alt="Lihat Kursus" width="37" height="38" border="0" /></a></td>
              </tr>
            </table></td>
            </tr>	

			 <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td colspan="6" valign="top" scope="col"><div align="center"><span class="cancel">
              
              </span>	
                <?
	}//Display the full navigation in one go
	//echo $pager->renderFullNav();
	
	echo "<br />\n";
	
	/*
	 * Or you can display the individual links for more
	 * control over HTML rendering.
	 * 
	*/
	
	//Display the link to first page: First
	echo $pager->renderFirst();
	
	//Display the link to previous page: <<
	echo $pager->renderPrev();
	
	/*
	 * Display page links: 1 2 3
	 * $prefix = Will be prepended to the page link (optional)
	 * $suffix = Will be appended to the page link (optional)
	 * 
	*/
	echo $pager->renderNav('<span>', '</span>');
	
	//Display the link to next page: >>
	echo $pager->renderNext();
	
	//Display the link to last page: Last
	echo $pager->renderLast();
?>
            </div></td>
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
<script type="text/javascript" src="jquery/jquery.js"></script> 

<script type="text/javascript" src="jquery/common.js"></script> 
<script type="text/javascript" src="jquery/js/txt.js"></script>

<script type="text/javascript" src="public/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="public/fancybox/jquery.fancybox-1.3.1.pack.js"></script> 
<script type="text/javascript" src="jquery/jquery.colorbox-min.js"></script> 
<script type="text/javascript" src="public/js/jquery.validate.min.js"></script> 
<script type="text/javascript" src="public/js/jquery.hoverIntent.minified.js"></script> 
<script type="text/javascript" src="public/js/functions.js"></script> 
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