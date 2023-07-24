<?php require_once('../Connections/coonect.php'); ?>
<?php
$maxRows_ser = 10;
$pageNum_ser = 0;
if (isset($_GET['pageNum_ser'])) {
  $pageNum_ser = $_GET['pageNum_ser'];
}
$startRow_ser = $pageNum_ser * $maxRows_ser;
$holder="Berlangsung";
$maxRows_ser = 10;
$pageNum_ser = 0;
if (isset($_GET['pageNum_ser'])) {
  $pageNum_ser = $_GET['pageNum_ser'];
}
$startRow_ser = $pageNum_ser * $maxRows_ser;

mysql_select_db($database_coonect, $coonect);
$query_ser = "SELECT co_id, co_name, co_sdate, co_langsung, co_edate FROM co_info where co_langsung='Berlangsung'";
$query_limit_ser = sprintf("%s LIMIT %d, %d", $query_ser, $startRow_ser, $maxRows_ser);
$ser = mysql_query($query_limit_ser, $coonect) or die(mysql_error());
$row_ser = mysql_fetch_assoc($ser);

if (isset($_GET['totalRows_ser'])) {
  $totalRows_ser = $_GET['totalRows_ser'];
} else {
  $all_ser = mysql_query($query_ser);
  $totalRows_ser = mysql_num_rows($all_ser);
}
$totalPages_ser = ceil($totalRows_ser/$maxRows_ser)-1;
?>
<div id="activity">
  <?php do { ?>
    <p><?php echo $row_ser['co_name']; ?> <span class="activity-datetime"><?php echo $row_ser['co_sdate']; ?> - <?php echo $row_ser['co_edate']; ?></p>
	
    
    <?php } while ($row_ser = mysql_fetch_assoc($ser)); ?>
</div>
 
<?php
mysql_free_result($ser);
?>
