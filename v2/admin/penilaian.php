<?php
include("header.php");
include("../conn.php");
?>
<?php
$list_perpage = 20;

$page=isset($_GET["page"])?$_GET["page"]:"1"; //page stuff

if ($page != 1){
	$offset = ($page * $list_perpage) - $list_perpage ;
}
else {
	$offset = 0;
}

if(isset($_GET['search']) && $_GET['search'] != ""){
	$search = $_GET['search'];
	$cond01 = "(b_name LIKE '%$search%' OR k_code LIKE '%$search%' OR k_name LIKE '%$search%') AND";
}else{
	$search = "";
	$cond01 = "";
}

if(isset($_GET['kluster']) && $_GET['kluster'] != ""){
	$kluster = (int)$_GET['kluster'];
	$cond02 = "b_id LIKE $kluster AND";
}else{
	$kluster = "";
	$cond02 = "";
}


if(isset($_GET['terai']) && $_GET['terai'] == "pentic"){

$_SESSION['terai'] = $_GET['terai'];	
$_SESSION['kid'] = $_GET['kid']; 
$_SESSION['tid'] = $_GET['tid'];
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#pentic").click(function (e) {
        e.preventDefault();
    });
    $('#pentic').trigger('click');
});
});//]]> 
</script>
<?php
}else{}
?>
<div id="content">
<a href="penilaian2_det.php" rel="#overlay" id="pentic"></a>

<form method="GET" action="">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr>
<td>
<input name="search" id="search" type="text" class="form_field" size="30" style="height:21px" value="" placeholder="&nbsp;Taip carian di sini" />

<select name="kluster" id="kluster">
<option value='' disabled selected>Kluster</option>
<?php
if($_SESSION['MyLevel'] == "1" || $_SESSION['MyLevel'] == "5"){
	$lvl = "WHERE b_id < '15'";
	$lvl02 = "AND b_id < '15'";
}elseif($_SESSION['MyLevel'] == "2"){
	$lvl = "WHERE b_id = '1'";
	$lvl02 = "AND b_id = '1'";
}elseif($_SESSION['MyLevel'] == "3"){
	$lvl = "WHERE b_id = '2'";
	$lvl02 = "AND b_id = '2'";
}elseif($_SESSION['MyLevel'] == "4"){
	$lvl = "WHERE b_id = '3'";
	$lvl02 = "AND b_id = '3'";
}elseif($_SESSION['MyLevel'] == "6"){
	$lvl = "WHERE b_id = '4'";
	$lvl02 = "AND b_id = '4'";
}elseif($_SESSION['MyLevel'] == "7"){
	$lvl = "WHERE b_id = '5'";
	$lvl02 = "AND b_id = '5'";
}elseif($_SESSION['MyLevel'] == "8"){
	$lvl = "WHERE b_id = '6'";
	$lvl02 = "AND b_id = '6'";
}elseif($_SESSION['MyLevel'] == "9"){
	$lvl = "WHERE b_id = '7'";
	$lvl02 = "AND b_id = '7'";
}elseif($_SESSION['MyLevel'] == "10"){
	$lvl = "WHERE b_id = '8'";
	$lvl02 = "AND b_id = '8'";
}elseif($_SESSION['MyLevel'] == "11"){
	$lvl = "WHERE b_id = '9'";
	$lvl02 = "AND b_id = '9'";
}elseif($_SESSION['MyLevel'] == "12"){
	$lvl = "WHERE b_id = '10'";
	$lvl02 = "AND b_id = '10'";
}elseif($_SESSION['MyLevel'] == "13"){
	$lvl = "WHERE b_id = '11'";
	$lvl02 = "AND b_id = '11'";
}else{
	$lvl = "WHERE b_id = '4'";
	$lvl02 = "AND b_id = '4'";
}
$sqls = "SELECT b_id, b_name FROM kluster $lvl ORDER BY b_id ASC";	
$results = mysql_query($sqls) or die(mysql_error());

while ($rows = mysql_fetch_assoc($results)) {
if($rows['b_id'] == $kluster){
	$tunjuks = "selected";
}else{
	$tunjuks = "";
}
print "<option value='$rows[b_id]' $tunjuks>$rows[b_name]</option>";
}
?>
</select>

<input type="submit" name="submit" value="Klik" />

<?php
$querysum = "
SELECT COUNT(b_id) AS total
FROM kluster a, kursus b
WHERE $cond01 $cond02 a.b_id=b.k_bid $lvl02
ORDER BY a.b_id ASC
";
$resultsum = mysql_query($querysum) or die("Query failed");
$rowsum = mysql_fetch_assoc($resultsum);
?>

<div align="right">[ terdapat <?php print $rowsum['total']; ?> rekod ditemui ]</div>
</td>
</tr>
</table>      
</form> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><font color="#FF0000">*</font> <span><em>Klik pada nama kursus untuk mengetahui lebih lanjut</em></span></td></tr>
</table>
<table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="5%" align="center"><strong>No.</strong></div></td>
<!--<td width="15%" align="center" nowrap><strong>Kod Kursus</strong></div></td>-->
<td width="50%" nowrap><strong>Kursus</strong></div></td>
<td width="30%" align="center" nowrap><strong>Kluster</strong></div></td>
<td width="15%" align="center" nowrap><strong>Keputusan</strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM kluster a, kursus b
WHERE $cond01 $cond02 a.b_id=b.k_bid $lvl02
ORDER BY a.b_id ASC
LIMIT $offset, $list_perpage
";

$result = mysql_query($select) or die("Query failed");
$i=1;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
	$select2 = "
	SELECT p_kid,p_epstatus
	FROM pilih a, status d
	WHERE a.p_epstatus = d.s_id AND p_kid = '$row[k_id]'
	ORDER BY p_id DESC
	";
	$result2 = mysql_query($select2) or die("Query failed");
	$row2 = mysql_fetch_assoc($result2);

		if($row2['p_epstatus'] == "12"){
		$status = "<a href='penilaian_det.php?kid=".$row2['p_kid']."' rel='#overlay'><font class='txt_caption1'>SEMAK</font></a>";
	    }else{
		$status = "<font class='txt_caption' color='gray'>-</font>";
	    }
			
$tdbg = "class=tbl1";
if($colorow) {
$tdbg = "class=tbl2";
}
?>
<tr>
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $i+($page-1)*30 ?></font></td>
<td <?php print $tdbg; ?>><a href="../kursus_popup.php?kid=<?php print $row['k_id']; ?>" rel="#overlay"><font class='txt_caption1'><?php print $row["k_name"]; ?></font></a></td>
<!--<td <?php print $tdbg; ?> nowrap><font class='txt_caption'><?php print $row["k_name"]; ?></font></td>-->
<td <?php print $tdbg; ?>  align='center'><font class='txt_caption'><?php print $row["b_name"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><?php print $status; ?></td>
</tr>
<?php 
$i++;
$colorow = !$colorow;
}
?>
<tr><td>&nbsp;</td></tr>
<tr>
<td colspan="6" align="center">
<?php 
function paging($limit,$pageno,$row_count=0,$pagename='katalog.php',$adressvalue='')  
{  
  $paging = '';  
  if($row_count > $limit)  
  {                  
    $page_count = $row_count / $limit;                  
    $page_count = ceil($page_count);                  
    if($pageno == $page_count)  
    {                          
      $to = $page_count;                  
    } elseif($pageno == $page_count - 1)  
    {                          
      $to = $pageno + 1;                  
    } elseif($pageno == $page_count - 2)  
    {                          
      $to = $pageno + 2;                  
    } else {                          
      $to = $pageno + 3;                  
    }                
    if($pageno < 4)  
    {                          
      $from = 1;                  
    } else {                          
      $from = $pageno - 3;                  
    }  

    if (4 < $pageno)  
    $paging .= ' <b><a href="'.$pagename.'&page=1'.$adressvalue.'" style="text-decoration:none"><b>1</b></a>........</b> ';  
                 
    for($i=$from; $i <= $to; $i++)  
    {                          
      if($i == $pageno)  
      {          
        $paging .= ' <b>['.$i.']</b> ';                          
      } else {          
        $paging .= ' <a href="'.$pagename.'&page='.$i.$adressvalue.'" style="text-decoration:none">'.$i.'</a> ';                          
      }                  
    }        
    if ($to < $page_count)  
    {  
      $paging .= ' <b>........ <a href="'.$pagename.'&page='.$page_count.$adressvalue.'" style="text-decoration:none">'.$page_count.'</a></b> ';  
    }  
  }          
  if($paging == "")  
  {                  
    $paging = '';          
  }          
  return $paging;  
}  

$limit = 20; //Limit that you want to list results in a page
$condition = "WHERE $cond01 $cond02 a.b_id=b.k_bid $lvl02 ORDER BY b_id ASC"; //If you have a condition write here
$my_table = 'kluster a, kursus b';  //your table name

//Calculating total record count
$query = mysql_query("SELECT COUNT(b_id) FROM $my_table $condition");           
$row_count = mysql_result($query, 0);  

@ $page = abs(intval($_GET['page']));  
if(empty($page) || $page > ceil($row_count/$limit))  
{                  
  $page = 1;                  
  $start = 0;          
} else {                
  $start = ($page - 1) * $limit;          
}  
//query...
$query = mysql_query("SELECT * FROM $my_table $condition LIMIT $start,$limit");      

//And the links...
print paging($limit,$page,$row_count,"penilaian.php?show=files&search=$search&kluster=$kluster");  

?>	
</td>
</tr>
</table>

</td>
</tr>
</table>

</div><!--close content-->

<?php
include("footer.php");
?>