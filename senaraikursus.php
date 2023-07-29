<!DOCTYPE html>
<html lang="en"> 
<head> 
<meta charset="utf-8" />
<title>Senarai Kursus</title>
<link rel="stylesheet" href="css/senaraikursus.css" media="screen,projection" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Economica:400,700|Open+Sans:300,700|Open+Sans+Condensed:300,700|Oswald' rel='stylesheet' type='text/css'>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
</head>
<body id="home">
<div id="wrapper">
 
  <header>
    <div id="header-in">
        <div id="header-l">
        <h1 class="shadow-inside"><a href="#">SENARAI KURSUS</a></h1>
        </div>
        <div id="header-r">
		  <? 
	$val = addslashes($_GET['val']); 
	//echo $val;
	if( $val=="true" ) 
	{	echo "<script>alert('Sila log masuk untuk memohon kursus')</script>";}
?> 
        </div>
    </div>
    <div id="header-shade"></div>
  </header>
  
 <?php
include 'configpagi.php';
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
	$page = addslashes($_GET['page']);
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
<section id="content">
<div id="head-list">
  <ul>
     <li class="w1">Kod</li>
     <li class="w2">Mula</li>
     <li class="w3">Tamat</li>
     <li class="w4">Kategori Kursus</li>
     <li class="w5">Nama Kursus</li>
     <li class="w6">Mohon</li>
    </ul>
<div class="clear"></div>
</div>

<!-- start kursus listing -->

<div id="list-kursus">
<?	while($data=mysql_fetch_array($result)){?>
<div class="loop-kursus">

<ul>

<li class="w1"><?=$data[co_coursecode]?></li>
<li class="w2"><?=$data[co_sdate]?></li>
<li class="w3"><?=$data[co_edate]?></li>

<? 					 
$tempcat=$data[co_catid];
$query_sercat = "SELECT * FROM cat_category where cat_id='$tempcat'";
$sercat=mysql_query($query_sercat);	
$rows_sercat=mysql_fetch_array($sercat);
?>
<li class="w4"><? echo $rows_sercat['cat_name']?></li>
<li class="w5"><?=$data[co_name]?></li>
<li class="w6"><a href="userlogin.php? val=true"><img src="daftar/images/edit-icon.png" width="37" height="38" border="0"></a></li>
</ul>
<?
		}
	?> 
</div>

 

  </div><!-- end list-kursus -->
<div class="clear"></div>
</section>
  
 
<footer>
<div class="credit">&copy; 2011 Hak cipta terpelihara Institut Penyiaran dan Penerangan Tun Abdul Razak | Sistem oleh : <a href="#">iZZat Network<</a></div>
</footer>


</div>
</body>
</html>
