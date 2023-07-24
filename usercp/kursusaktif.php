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
	    
	<link rel="stylesheet" href="template/style/reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="template/style/style.css" media="screen,projection" type="text/css" /> 
    <link rel="stylesheet" href="template/style/paginationstyle.css" media="screen,projection" type="text/css" />
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


<script src="template/js/jcarousellite_1.0.1.min.js" type="text/javascript"></script>
<script src="template/js/jquery.mousewheel.min.js" type="text/javascript"></script>
<script src="template/js/jquery.easing.1.1.js" type="text/javascript"></script>
<script src="template/js/checklist-settings.js" type="text/javascript"></script>
<script src="template/js/jquery.blockUI.js" type="text/javascript"></script>
<script src="template/js/general.js" type="text/javascript"></script>
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
          <p>&nbsp;</p>
	      <table width="247" border="0" align="right">
            <tr>
              <td width="113"> <p>Papar</p>
	            <div id="checklist-type" class="selection"> <span class="drop-select">Semua</span>
              <ul>
                <li><a href="kursusaktif.php?idcat=0" title="Semua">Semua</a></li>
                <li><a href="kursusaktif.php?idcat=1" title="Kejuruteraan TV">Kejuruteraan TV</a></li>
                <li><a href="kursusaktif.php?idcat=2" title="Rancangan TV">Rancangan TV</a></li>
                <li><a href="kursusaktif.php?idcat=3" title="Kejuruteraan Radio">Kejuruteraan Radio</a></li>
                <li><a href="kursusaktif.php?idcat=4" title="Rancangan Radio">Rancangan Radio</a></li>
                <li><a href="kursusaktif.php?idcat=5" title="Kejuruteraan Asas">Kejuruteraan Asas</a></li>
                <li><a href="kursusaktif.php?idcat=6" title="Pengurusan Teras dan Pembangunan Rancangan">Pengurusan Teras &amp; Pembangunan Rancangan</a></li>
                <li><a href="kursusaktif.php?idcat=7" title="ICT">ICT</a></li>
                <li><a href="kursusaktif.php?idcat=8" title="Lain-lain Agensi">Lain-lain Agensi</a></li>
            </ul>
          </div></td>
            </tr>
          </table>
	     
        </div>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	  <form id="checklist-options" method="post" action="">
        <div id="description"></div>
	    <div class="clear"></div>
	    <table width="70%" border="0">
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><div align="center"><span class="style4">Nama Kursus</span></div></td>
            <td scope="col"><div align="center" class="style4">Tarikh Mula </div></td>
            <td scope="col"><div align="center"><strong>Tarikh Tamat </strong></div></td>
            <td scope="col"><div align="center" class="style4">Kategori </div></td>
            <td scope="col"><div align="center" class="style4">
              <div align="left">Mohon</div>
            </div></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td colspan="5" scope="col">.................................................................................................................................................................</td>
          </tr>
          <?php
					  
$numcat=$_GET["idcat"];	
if ( $numcat!=""){
//echo $numcat;		  
$numcat2=$numcat;
include '../configpagi.php';
$tbl_name="co_info"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

	//include('config.php');	// include your code to connect to DB.

	//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 0;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where co_catid='$numcat' and co_status='Buka'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "kursusaktif.php? idcat=$numcat&"; 	//your file name  (the name of this file)
		$limit =15; 							//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	//if ($numcat="ALL")
	// {
	// $sql = " select * from co_info order by co_info.co_id desc  LIMIT $start, $limit";
	// }
	 
	 if ($numcat2!=0)
	 {
	  $sql1 = " select * from co_info where co_catid='$numcat' and co_status='Buka' order by co_info.co_id desc  LIMIT $start, $limit";
	  $result = mysql_query($sql1);
	  $query = "SELECT COUNT(*) as num FROM $tbl_name  where co_catid='$numcat' and co_status='Buka'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	 }
	 
	  elseif ($numcat2==0)
	 {
	  $sql2 = "select * from co_info  where co_status='Buka' order by co_info.co_id  LIMIT $start, $limit";
	   $result = mysql_query($sql2);
	    $query = "SELECT COUNT(*) as num FROM $tbl_name  where co_status='Buka' order by co_info.co_id";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	 }

	
	
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
			$pagination.= "<a href=\"$targetpage page=$prev\">« previous</a>";
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
					$pagination.= "<a href=\"$targetpage page=$counter\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) {
	
			$pagination.= "<a href=\"$targetpage page=$next\">next »</a>"; }
		else {
	
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		}
	}$counter=1;
?>

          <?	while($data=mysql_fetch_array($result)){?>
          <tr>
            <td width="3" scope="col"><span class="style1"></span></td>
            <td width="274" class="style1" scope="col"><span class="style3">
              <?=$data[co_name]?>
            </span></td>
            <td width="67" class="style1" scope="col"><div align="center" class="style3">
              <?=$data[co_sdate]?>
            </div></td>
            <td width="125" scope="col"><div align="center" class="style3">
              <?=$data[co_edate]?>
            </div></td>
            <? 
						 
						$tempcat=$data[co_catid];
						$query_sercat = "SELECT * FROM cat_category where cat_id='$tempcat'";
						$sercat=mysql_query($query_sercat);	
						$rows_sercat=mysql_fetch_array($sercat);
						?>
            <td width="155" scope="col"><div align="center"><span class="style3"><? echo $rows_sercat['cat_name']?></span></div></td>
            <td width="49"><div align="left"><a href="umohon.php?idkur=<?=$data[co_id]?>" title="Mohon Kursus" class="buy"><img src="edit-icon.png" border="0" /></a></div></td>
          </tr>
          <?
		}
	?>
          <tr>
            <td scope="col"><span class="style1"></span></td>
            <td colspan="5" scope="col">&nbsp;</td>
          </tr>
		  <tr>
		    <td scope="col">&nbsp;</td>
		    <td colspan="5" scope="col">&nbsp;</td>
		    </tr><? } ?>
		  <tr>
		    <td scope="col">&nbsp;</td>
		    <td colspan="5" scope="col"><div align="center">
		      <?=$pagination?>
		      
		      </div></td>
		    </tr> 
        </table>
	    <p class="cancel">&nbsp;</p>
	    </form>
	</div>
	</div><!-- main-content -->
	<div id="side-content"> <a href="index.php" id="feature-btn" title="Menu utama">MENU UTAMA</a>
        <h3>KURSUS SEDANG BERLANGSUNG</h3>
	<? include('sedangberlangsung.php');?>
      </div>
	  </div>
	<!-- side-content -->
<div class="clear"></div> 
</div>
	<!-- content -->
  
<div class="push"></div>
    
</div><!-- container -->
 
<div id="footer">

    <div id="footer-inner">
		<? include('footerusercp.php');?>
    
    </div>

</div>


</body>
</html>
<?php
mysql_free_result($viewpro);
?>