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
	<link rel="stylesheet" href="template/style/paginationstyle.css" media="screen,projection" type="text/css" />
    <link href="colorbox-v=1279188384.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico" /> 
    

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
.style1 {font-weight: bold}
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
		
		<h1>URUS KURSUS</h1>
	    <div id="sort-lists">
          <p>
            <label></label>
          </p>
          <table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
		<td>No. Kod Kursus</td>
              <td><form id="form1" name="form1" method="post" action="uruskursus.php">
			  <input type="text" name="searchnokursus" />
              </form>
              </td>
            </tr>
          </table>
          <p>
            <label>            </label>
          </p>
	    </div>
	</div>
	
	<div class="clear"></div> 
	
	<div class="content-area">
      <form id="checklist-options" method="post" action="http://haryzat.launchlist.net/checklist-settings.php">
        <div id="description"></div>
        <div class="clear"></div>
        <div id="template-selection">
          <h3 id="select-template-title">Sila pilih kategori kursus dan klik pada ikon. </h3>
          <div id="select-template">
            <div id="template-holder" style="visibility: visible; overflow-x: hidden; overflow-y: hidden; position: relative; z-index: 2; left: 0px; width: 612px; ">
              <ul style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; position: relative; list-style-type: none; z-index: 1; width: 1224px; left: 0px; ">
                <li class="selectable" title="Bahagian Kejuruteraan TV" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="uruskursus.php?cat=<? echo 1; ?>" ><img src="screen-icon.png" alt="Bahagian Kejuruteraan TV" /></a></span><span class="name">Kejuruteraan TV</span></li>
                <li class="selectable" title="Bahagian Rancangan TV" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="uruskursus.php?cat=<? echo 2; ?>" ><img src="screen-icon.png" alt="Bahagian Rancangan TV" /></a></span><span class="name">Rancangan TV</span></li>
                <li class="selectable" title="Bahagian Kejuruteraan Radio" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="uruskursus.php?cat=<? echo 3; ?>" ><img src="radio.png" alt="Bahagian Kejuruteraan Radio" width="24" height="24" /></a></span><span class="name">Kejuruteraan Radio</span></li>
                <li class="selectable" title="Bahagian Rancangan Radio" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="uruskursus.php?cat=<? echo 4; ?>" ><img src="radio.png" alt="Bahagian Rancangan Radio" width="24" height="24" /></a></span><span class="name">Rancangan Radio</span></li>
                
                 <li class="selectable" title="Bahagian Kej Asas Pemancar" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="uruskursus.php?cat=<? echo 5; ?>" ><img src="migrate-icon.png" alt="Bahagian Kej Asas Pemancar" /></a></span><span class="name">Kejuruteraan Asas<span class="field-no"></span></span></li>
                 
                  <li class="selectable" title="Bahagian Pembangunan Teras dan Rancangan" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="uruskursus.php?cat=<? echo 6; ?>" ><img src="people-icon.png" alt="Bahagian Pembangunan Teras dan Rancangan" /></a></span><span class="name">Pengurusan Teras dan Pembangunan Rancangan<span class="field-no"></span></span></li>
                  
                  <li class="selectable" title="Bahagian ICT" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="uruskursus.php?cat=<? echo 7; ?>" ><img src="world-icon.png" alt="Bahagian ICT" /></a></span><span class="name">Latihan ICT<span class="field-no"></span></span></li>
                   
                <li class="selectable" title="Lain-lain" style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "><span class="icon"><a href="uruskursus.php?cat=<? echo 8; ?>" ><img src="standard-icon.png"alt="Lain-lain" /></a></span><span class="name">Lain-lain<span class="field-no"></span></span></li>
                
                
                <li style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "></li>
                <li style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "></li>
                <li style="overflow-x: hidden; overflow-y: hidden; float: left; width: 147px; height: 61px; "></li>
              </ul>
            </div>
            <a href="" name="prev-templates" class="disabled" id="prev-templates"></a><a href="" id="next-templates" class=""></a> </div>
        </div>
        <input type="hidden" id="template_id" name="template" value="1185" />
		
		  <?php	

$kategori=$_GET['cat'];
$nokursus=$_POST['searchnokursus'];
if ( $kategori=="1" || $kategori=="2" || $kategori=="3" || $kategori=="4" || $kategori=="5" || $kategori=="6" || $kategori=="7" || $kategori=="8"){

include '../configpagi.php';
$tbl_name="co_info"; // Table name 

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
	$query = "SELECT COUNT(*)  as num FROM $tbl_name where co_catid='$kategori' ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "uruskursus.php? cat=$kategori&"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	 $sql = " select * from co_info where co_catid='$kategori'  LIMIT $start, $limit";

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
		
        <div id="collaborators">
           <table width="98%" border="0" cellpadding="0" cellspacing="0">
         
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><div align="center" class="style4"><strong>ID Kursus  </strong></div></td>
            <td scope="col"><div align="center" class="style4"><strong>Kod Kursus</strong></div></td>
            <td scope="col"><div align="center"><strong>Nama Kursus </strong></div></td>
            <td scope="col"><div align="center"><strong>Status</strong></div></td>
            <td width="20%" scope="col"><div align="center" class="style4"><strong>Tindakan</strong></div></td>
          </tr>
		   <tr>
            <td scope="col">&nbsp;</td>
            <td colspan="5" scope="col">..............................................................................................................................................................</td>
            </tr>
			<?	while($data=mysql_fetch_array($result)){?>
          <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td width="12%" valign="top" scope="col"><div align="center" class="style3"><?=$data['co_id']; ?></div></td>
            <td width="14%" valign="top" class="style5" scope="col"><div align="center"><span class="style3"><?=$data['co_coursecode'];?></span></div></td>
            
						 
					
		    <td width="39%" valign="top" scope="col"><div align="center"><?=$data['co_name']?></div></td>
                        
            <td width="14%" valign="top" scope="col"><div align="center"><?=$data['co_status']; ?></div></td>
            <td valign="top" scope="col"><div align="center"><a href="suntingkursus.html" class="buy"></a>
              <table width="102" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top" scope="col"><div align="center"><a href="adviewkursus.php?idkur=<?=$data['co_id']; ?>" class="buy" title="Maklumat Kursus"><img src="lanjut.png" alt="Lihat Kursus" width="37" height="38" border="0" /></a></div></td>
                  <td valign="top" scope="col"><div align="center"><a href="adeditkursus.php?idkur=<?=$data['co_id']; ?>" class="buy" title="Kemaskini Kursus" ><img src="edit-icon.png" alt="Kemaskini Kursus" width="37" height="38" border="0" /></a></div></td>
                  <td valign="top" scope="col"><div align="center"><a href="adclosekursus.php?idkur=<?=$data['co_id']; ?>" class="buy" title="Urus Kursus"><img src="padamkursus.png" alt="Urus Kursus" width="37" height="38" border="0" /></a></div></td>
                </tr>
              </table>
            </div></td>
          </tr>	
<?
		}}
	?>
			 <tr>
            <td width="1%" scope="col"><span class="style1"></span></td>
            <td colspan="5" valign="top" scope="col"><div align="center"><span class="cancel">
               <?=$pagination?>
              </span>	
    
            </div></td>
			 </tr>
        </table>
		
		<? 
		
		if ($nokursus!=''){
		$nokursus=$_POST['searchnokursus'];
			mysql_select_db($database_coonect, $coonect);
$query_secrecord = "SELECT * FROM co_info where co_coursecode='$nokursus'";
$secrecord = mysql_query($query_secrecord, $coonect) or die(mysql_error());
$row_secrecord = mysql_fetch_assoc($secrecord);
$totalRows_secrecord = mysql_num_rows($secrecord);
$tempid=$row_secrecord['co_id']
		
		?>
           <table width="98%" border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td scope="col">&nbsp;</td>
               <td scope="col"><div align="center" class="style4"><strong>ID Kursus </strong></div></td>
               <td scope="col"><div align="center" class="style4"><strong>Kod Kursus</strong></div></td>
               <td scope="col"><div align="center"><strong>Nama Kursus </strong></div></td>
               <td scope="col"><div align="center" class="style4"><strong>Status</strong></div></td>
               <td width="18%" scope="col"><div align="center"></div>                 <div align="center" class="style4"><strong>Tindakan</strong></div></td>
              </tr>
             <tr>
               <td scope="col">&nbsp;</td>
               <td colspan="5" scope="col">............................................................................................................................................................</td>
             </tr>
			<? if ($tempid!=''){ ?>
			    <tr>
               <td width="2%" scope="col"><span class="style1"></span></td>
               <td width="16%" valign="top" scope="col"><div align="center" class="style3"><?php echo $row_secrecord['co_id']; ?></div></td>
               <td width="25%" valign="top" class="style5" scope="col"><div align="center"><?php echo $row_secrecord['co_coursecode']; ?></div></td>
               <td width="19%" valign="top" scope="col"><div align="center"><?php echo $row_secrecord['co_name']; ?></div></td>
               <td width="20%" valign="top" scope="col"><div align="center"><?php echo $row_secrecord['co_status']; ?></div></td>
               <td valign="top" scope="col"><div align="center"><a href="suntingkursus.html" class="buy"></a>
                 <table width="102" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td valign="top" scope="col"><div align="center"><a href="adviewkursus.php?idkur=<?php echo $row_secrecord['co_id']; ?>" class="buy"><img src="lanjut.png" alt="Lihat Kursus" width="30" height="30" /></a></div></td>
                     <td valign="top" scope="col"><div align="center"><a href="adeditkursus.php?idkur=<?php echo $row_secrecord['co_id']; ?>" class="buy"><img src="edit-icon.png" alt="Lihat Kursus" width="30" height="30" /></a></div></td>
                     <td valign="top" scope="col"><div align="center"><a href="adclosekursus.php?idkur=<?php echo $row_secrecord['co_id']; ?>" class="buy"><img src="padamkursus.png" alt="Lihat Kursus" width="30" height="30" /></a></div></td>
                   </tr>
                 </table>
               </div></td>
              </tr>
			 <? } ?>
             <? if  ($tempid=='') { ?>
             <tr>
               <td colspan="6" scope="col"><span class="style1"></span>
                <div align="center">Maaf rekod <? echo $nokursus;  ?> yang anda cari tiada dalam simpanan sistem</div>                 
                <div align="center"><a href="suntingkursus.html" class="buy"></a></div></td>
              </tr>
			 <? } ?>
      
             <tr>
               <td width="2%" scope="col"><span class="style1"></span></td>
               <td colspan="5" valign="top" scope="col"><div align="center"><span class="cancel">
                
               </span> </div></td>
             </tr>
           </table>
		   <? } ?>
           <p>&nbsp;</p>
        </div>

        <table width="34" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="34">&nbsp;</td>
          </tr>
        </table>
        <p class="cancel">&nbsp;</p>
      </form>
	  </div>
	</div>
	<!-- main-content -->
	<div id="side-content"><a href="adhome.php" id="feature-btn" title="Menu utama">MENU UTAMA</a>
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






</body>
</html>
<?php
//mysql_free_result($secrecord);

//mysql_free_result($viewpro);
?>