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
	<link rel="stylesheet" href="template/style/style2.css" media="screen,projection" type="text/css" /> 
    <link rel="stylesheet" href="template/style/paginationstyle.css" media="screen,projection" type="text/css" /> 
	<link href="colorbox-v=1279188384.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico" /> 
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
<? include('adminheader.php');?>

</div><!-- header -->
	
		
		
		
	<div id="content" >
	
	
	
	
	
	

	<div id="main-content">

	<div id="title">
		
		<h1>PERMOHONAN</h1>
	    <div id="sort-lists">
          <p>
            <label></label>
          </p>
		  <table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <td>No. Kod Kursus </td>
              <td><form id="form1" name="form1" method="get" action="permohonanterkini.php">
                  <input type="text" name="nokursus" />
                </form>
</td>
            </tr>
          </table>
		  <p>
            <label> </label>
          </p>
	    </div>

	</div>
	
	<div class="clear"></div> 
	
	<div class="content-area holder">
	  <form id="checklist-options" method="post" action="">
        <div id="description"></div>
	    <div class="clear"></div>
			 <?php	

//$kategori=$_GET['cat'];
$nokursus=$_GET['nokursus'];
if ( $nokursus=='') { 
include '../configpagi.php';
$tbl_name="costu_all"; // Table name 

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
	$query = "SELECT COUNT(*)  as num FROM $tbl_name where costu_status='Proses' ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "permohonanterkini.php?"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	 $sql = " select * from costu_all where costu_status='Proses' order by costu_appid LIMIT $start, $limit";

	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 15;					//if no page var is given, default to 1.
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
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>

	    <table width="92%" border="0">
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><div align="center" class="style4">No. Siri </div></td>
            <td scope="col"><div align="center" class="style4">Nama </div></td>
            <td scope="col"><div align="center" class="style4">No.Kad Pengenalan</div></td>
            <td scope="col"><div align="center"><strong>Kod Kursus </strong></div></td>
            <td width="12%" colspan="3" scope="col"><div align="center" class="style4">Tindakan</div></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td colspan="7" scope="col">..............................................................................................................................................................</td>
            </tr>
         
		 <?	while($data=mysql_fetch_array($result)){?>
		  <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td width="16%" scope="col"><div align="center" class="style3"><?=$data['costu_appid'];?></div></td>
            <td width="34%" class="style1" scope="col"><div align="center" class="style3">
              <div align="left"> <?=$data['costu_uname'];?> </div>
            </div></td>
            <td width="17%" scope="col"><div align="center"><span class="style3">
              <?=$data['costu_uid'];?>
            </span></div></td>
            <td width="20%" scope="col"><div align="center"> <?=$data['costu_coursecode'];?></div></td>
            <td colspan="3" valign="top" scope="col"><table width="68" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="51" valign="top" scope="col"><div align="center"><a href="adviewapp.php?idapp=<?=$data['costu_appid'];?> & page=1" class="buy" title="Maklumat Permohonan"><img src="lanjut.png" alt="Lihat Permohonan" width="37" height="38" border="0" /></a></div></td>
                <td width="34" valign="top" scope="col"><div align="center"><a href="adapprovalapp.php?idapp=<?=$data['costu_appid'];?>" class="buy" title="Urus Permohonan"><img src="approve.png" alt="Urus Permohonan" width="37" height="38" border="0" /></a></div></td>
               
              </tr>
			  
            </table></td>
          </tr>
		  
		  <? }?>
            
          <tr>
            <td scope="col"><span class="style1"></span></td>
            <td colspan="7" scope="col"> <div align="center">
              <?=$pagination?>
              &nbsp;</div></td>
            </tr>
        </table>
		<?  } ?>
		   <?php	

//$kategori=$_GET['cat'];
$nokursus=$_GET['nokursus'];
if ( $nokursus!='') { 
include '../configpagi.php';
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
	$query = "SELECT COUNT(*)  as num FROM $tbl_name where costu_status='Proses' AND costu_coursecode='$nokursus'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "permohonanterkini.php?nokursus=$nokursus&"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	 $sql = " select * from costu_all where costu_status='Proses' AND costu_coursecode='$nokursus' order by costu_appid LIMIT $start, $limit";

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
			$pagination.= "<a href=\"$targetpage page=$prev\">� previous</a>";
		else
			$pagination.= "<span class=\"disabled\">� previous</span>";	
		
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
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage page=$next\">next �</a>";
		else
			$pagination.= "<span class=\"disabled\">next �</span>";
		$pagination.= "</div>\n";		
	}
?>

	    <table width="92%" border="0">
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><div align="center" class="style4">No. Siri </div></td>
            <td scope="col"><div align="center" class="style4">Nama </div></td>
            <td scope="col"><div align="center" class="style4">No.Kad Pengenalan</div></td>
            <td scope="col"><div align="center"><strong>Kod Kursus </strong></div></td>
            <td width="12%" colspan="3" scope="col"><div align="center" class="style4">Tindakan</div></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td colspan="7" scope="col">..............................................................................................................................................................</td>
            </tr>
         
		 <?	while($data=mysql_fetch_array($result)){?>
		  <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td width="16%" scope="col"><div align="center" class="style3"><?=$data['costu_appid'];?></div></td>
            <td width="34%" class="style1" scope="col"><div align="center" class="style3">
              <div align="left"> <?=$data['costu_uname'];?> </div>
            </div></td>
            <td width="17%" scope="col"><div align="center"><span class="style3">
              <?=$data['costu_uid'];?>
            </span></div></td>
            <td width="20%" scope="col"><div align="center"> <?=$data['costu_coursecode'];?></div></td>
            <td colspan="3" valign="top" scope="col"><table width="68" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="51" valign="top" scope="col"><div align="center"><a href="adviewapp.php?idapp=<?=$data['costu_appid'];?> & page=1" class="buy" title="Maklumat Permohonan"><img src="lanjut.png" alt="Lihat Permohonan" width="37" height="38" border="0" /></a></div></td>
                <td width="34" valign="top" scope="col"><div align="center"><a href="adapprovalapp.php?idapp=<?=$data['costu_appid'];?>" class="buy" title="Urus Permohonan"><img src="approve.png" alt="Urus Permohonan" width="37" height="38" border="0" /></a></div></td>
               
              </tr>
			  
            </table></td>
          </tr>
		  
		  <? }?>
            
          <tr>
            <td scope="col"><span class="style1"></span></td>
            <td colspan="7" scope="col"> <div align="center">
              <?=$pagination?>
              &nbsp;</div></td>
            </tr>
        </table>
		<?  } ?>
	    <p class="cancel">&nbsp;</p>
	    </form>
	</div>
    
    
	</div><!-- main-content -->
	<div id="side-content"><a href="adhome.php" id="feature-btn" title="Menu utama">MENU UTAMA</a>
	  <h3>KURSUS SEDANG BERLANGSUNG</h3>
	 <? include('adsedangberlangsung.php');?></div>
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



</body>
</html>
<?php
mysql_free_result($viewad);

mysql_free_result($serupro);
?>