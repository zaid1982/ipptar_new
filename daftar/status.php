<?php require_once('../Connections/coonect.php'); ?>
<? include 'usercp/userconfig.php'; ?>
<? include 'usercp/userlogout.php'; ?>
<? include 'usercp/userrestric.php'; ?>


<?php
$colname_viewpro = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_viewpro = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
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
	<link rel="stylesheet" href="reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="style.css" media="screen,projection" type="text/css" /> 
	 
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
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="icourse"; // Database name 
$tbl_name="costu_all"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

	//include('config.php');	// include your code to connect to DB.

	//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 1;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "status.php"; 	//your file name  (the name of this file)
	$limit = 5; 								//how many items to show per page
	$page = addslashes($_GET['page']);
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	 $sql = " select costu_appid,costu_id,costu_uid,costu_status,costu_date,costu_filename from costu_all where costu_uid='$iduser' order by costu_appid DESC LIMIT $start, $limit";
/*"SELECT *
FROM leave_details,staff_profile
WHERE staff_profile.stf_id=leave_details.lstf_id AND staff_profile.stf_dpart='administrator' AND leave_details.lstatus = 'in process' or leave_details.lstatus = 'posted' order by lnosiries DESC  LIMIT $start, $limit"; */
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>
		
		
		
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
			<?	while($data=mysql_fetch_array($result)){?>
			
          <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td width="12%" valign="top" scope="col"><div align="center" class="style3"><?=$data[costu_appid]?></div></td>
            <td width="12%" valign="top" class="style5" scope="col"><div align="center"><span class="style3"><?=$data[costu_date]?></span></div></td>
           <? 
						 
						$tempcat=$data['costu_id'];
						$tempfile=$data['costu_appid'];
						$query_sercat = "SELECT co_name FROM co_info where co_id='$tempcat'";
						$sercat2=mysql_query($query_sercat);	
						$rows_sercat=mysql_fetch_array($sercat2);
						
						
						$query_serfile = "SELECT costu_filename FROM costu_all where costu_appid='$tempfile'";
						$sercatfile=mysql_query($query_serfile);	
						$rows_sercatfile=mysql_fetch_array($sercatfile);
						$namefile=$rows_sercatfile['costu_filename'];
						?>
		    <td width="32%" valign="top" scope="col"><div align="center">
               <? echo $rows_sercat['co_name']?> 
            </div></td>
                        
            <td width="13%" valign="top" scope="col"><div align="center"><span class="style3"><?=$data[costu_id]?></span></div></td>
            <td width="19%" valign="top" scope="col"><div align="center"><?=$data[costu_status]?></div></td>
            <td valign="top" scope="col"><table width="68" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="34"><a href="pdf/<? echo $namefile;?>"><img src="aktifkursus.png" alt="Muat Turun Fail" width="30" height="30" /></td>
                <td width="51"><a href="katalog.php" toptions=" shaded = 1, type = iframe, effect = fade, width = 900, height = 600, layout = quicklook"><img src="padamkursus.png" alt="Lihat Kursus" width="30" height="30" /></a></td>
              </tr>
            </table></td>
            </tr>	<?
		}
	?>
			 <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td colspan="6" valign="top" scope="col"><div align="center"><span class="cancel">
              <?=$pagination?>
            </span></div></td>
            </tr>
        </table>
		   <p class="cancel">&nbsp;</p>
	    </form>
	</div>
    
    
	</div><!-- main-content -->
	<div id="side-content"> <a href="admincp.html" id="feature-btn" title="Menu utama">MENU UTAMA</a>
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