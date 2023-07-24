

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ekursus IPPTAR</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	    
	<link rel="stylesheet" href="template/style/reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="template/style/style.css" media="screen,projection" type="text/css" /> 
     <link rel="stylesheet" href="paginationstyle.css" media="screen,projection" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico" /> 
    
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {color: #FFFFFF; font-weight: bold; }
-->
    </style>
</head>
<body>

<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 
	

<div id="container">
  <!-- header -->
  <div id="title">
    <p>
      <? 
	$val=$_GET['val']; 
	//echo $val;
	if( $val=="true" ) 
	{	echo "<script>alert('Sila log masuk untuk memohon kursus')</script>";}
?> 
    </p>
    <table width="100%" border="0">
      
					  
 <?php
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where co_status='Buka'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "katalogkursus.php?"; 	//your file name  (the name of this file)
		$limit =100; 							//how many items to show per page
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
	 
	
	  $sql = " select * from co_info where co_status='Buka' order by  co_info.co_catid ASC  LIMIT $start, $limit";
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
		if ($page < $counter - 1) {
	
			$pagination.= "<a href=\"$targetpage page=$next\">next »</a>"; }
		else {
	
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		}
	}$counter=1;
?> 
      <tr>
        <td width="1%" scope="col">&nbsp;</td>
        <td width="8%" scope="col"><div align="center" class="style2">ID Kursus  </div></td>
        <td width="8%" scope="col"><div align="center" class="style2">Mula</div></td>
        <td width="8%" scope="col"><div align="center" class="style2">Tamat</div></td>
        <td width="36%" scope="col"><div align="center" class="style2">Kategori Kursus</div></td>
        <td width="34%" scope="col"><div align="center" class="style2">Nama Kursus</div></td>
        <td width="5%" scope="col"><div align="center" class="style2">Mohon</div></td>
      </tr>
	   
      
        <tr>
          <td scope="col">&nbsp;</td>
          <td colspan="6" scope="col">.............................................................................................................................................................................................</td>
        </tr> <?	while($data=mysql_fetch_array($result)){?>
      <tr>
        <td scope="col"><span class="style1"></span></td>
        <td scope="col"><div align="center" class="style1">   <?=$data[co_id]?></div></td>
        <td class="style1" scope="col"><div align="center">
          <?=$data[co_sdate]?>
        </div></td>
		 <td class="style1" scope="col"><div align="center">
		   <?=$data[co_edate]?>
	     </div></td>
		 <? 
						 
						$tempcat=$data[co_catid];
						$query_sercat = "SELECT * FROM cat_category where cat_id='$tempcat'";
						$sercat=mysql_query($query_sercat);	
						$rows_sercat=mysql_fetch_array($sercat);
						?>
        <td scope="col"><span class="style1"><? echo $rows_sercat['cat_name']?></span></td>
        <td scope="col">  <span class="style1">
          <?=$data[co_name]?>
        </span></td>
        <td scope="col"><div align="center"><a href="katalogkursus.php? val=true"><img src="edit-icon.png" width="37" height="38" border="0" /></a></div></td>
      </tr> 
	  
	        <?
		}
	?>
	    <tr>
          <td height="76" colspan="7" scope="col"> <div align="center">
            <?=$pagination?>
          </div></td>
        </tr>
    </table>
    <p>&nbsp;</p>
  </div>
  <!-- content -->
  
<div class="push"></div>
    
</div><!-- container -->
<script src="template/js/jquery-1.4.2.min.js" type="text/javascript"></script> 
<script src="template/js/jcarousellite_1.0.1.min.js" type="text/javascript"></script>
<script src="template/js/jquery.mousewheel.min.js" type="text/javascript"></script>
<script src="template/js/jquery.easing.1.1.js" type="text/javascript"></script>
<script src="template/js/checklist-settings.js" type="text/javascript"></script>
<script src="template/js/jquery.blockUI.js" type="text/javascript"></script>
<script src="template/js/general.js" type="text/javascript"></script>

</body>
</html>