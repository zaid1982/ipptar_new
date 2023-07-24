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
	$pager = new PS_Pagination($conn, $sql, 10, 5, "param1=valu1&param2=value2");
	
	/*
	 * Enable debugging if you want o view query errors
	*/
	$pager->setDebug(true);
	
	/*
	 * The paginate() function returns a mysql result set
	 * or false if no rows are returned by the query
	*/
	$rs = $pager->paginate();
	if(!$rs) die(mysql_error());
	while($row = mysql_fetch_assoc($rs)) {
		echo $row['costu_appid'],"<br />\n";
	}
	
	//Display the full navigation in one go
	echo $pager->renderFullNav();
	
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