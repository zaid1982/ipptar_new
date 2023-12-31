<?php
include("header.php");
include("conn.php");

$list_perpage = 20;

$page=isset($_GET["page"])?$_GET["page"]:"1"; //page stuff

if ($page != 1){
	$offset = ($page * $list_perpage) - $list_perpage ;
}
else {
	$offset = 0;
}

if(isset($_GET['search']) && $_GET['search'] != ""){
	$search = addslashes($_GET['search']);
	$cond01 = "(b_name LIKE '%$search%' OR k_code LIKE '%$search%' OR k_name LIKE '%$search%') AND";
}else{
	$search = "";
	$cond01 = "";
}

if(isset($_GET['kluster']) && $_GET['kluster'] != ""){
	$kluster = (int)addslashes($_GET['kluster']);
	$cond02 = "f.b_id LIKE $kluster AND";
}else{
	$kluster = "";
	$cond02 = "";
}

if(isset($_GET['bulan']) && ($_GET['bulan'] >= 1 && $_GET['bulan'] <= 12)){
	$bulan = addslashes($_GET['bulan']);
	$cond03 = "SUBSTR(k_sdate,6,2) LIKE '$bulan' AND";	
}else{
	$bulan = "";
	$cond03 = "";
}
?>
<div id="content"> 

<form action="" method="GET">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr><td style="font-weight:bold">SEMAK STATUS PERMOHONAN KURSUS</td></tr>
<tr>
<td>
<input name="search" id="search" type="text" class="form_field" size="30" style="height:21px" value="" placeholder="&nbsp;Taip carian di sini" />

<select name="kluster" id="kluster">
<option value='' disabled selected>Kluster</option>
<?php  	
$sqls = "SELECT b_id, b_name FROM kluster ORDER BY b_id ASC";	
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

<select name="bulan" id="bulan" placeholder="Bulan">
<option value="">Bulan</option><option value="01" >01</option><option value="02" >02</option><option value="03" >03</option><option value="04" >04</option><option value="05" >05</option><option value="06" >06</option><option value="07" >07</option><option value="08" >08</option><option value="09" >09</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option>
</select>

<input type="submit" name="submit" value="Klik" />

<?php
$querysum = "
SELECT COUNT(p_id) AS total
FROM pilih a, user b, kursus c, bidang d, status e, kluster f
WHERE $cond01 $cond02 $cond03 f.b_id=c.k_bid AND a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id AND b.u_id LIKE '$_SESSION[UsrID]' AND c.k_sdate > '2018-12-31 00:00:00'
ORDER BY p_id DESC
";
$resultsum = mysql_query($querysum) or die("Query failed1");
$rowsum = mysql_fetch_assoc($resultsum);
?>

<div align="right">[ terdapat <?php print $rowsum['total']; ?> rekod ditemui ]</div>
</td>
</tr>
</table>
</form> 

<table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="5%" align="center"><strong>ID</strong></div></td>
<td width="25%"><strong>Nama</strong></div></td>
<td width="30%"><strong>Kursus</strong></div></td>
<td width="10%" align="center" nowrap><strong>Mula Kursus</></strong></div></td>
<td width="10%" align="center" nowrap><strong>Tamat Kursus</strong></div></td>
<td width="10%" align="center" nowrap><strong>Status</strong></div></td>
<td width="10%" align="center" nowrap><strong>Sijil</strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM pilih a, user b, kursus c, bidang d, status e, kluster f
WHERE $cond01 $cond02 $cond03 f.b_id=c.k_bid AND a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id AND b.u_id LIKE '$_SESSION[UsrID]' AND c.k_sdate > '2018-12-31 00:00:00'
ORDER BY p_id DESC
LIMIT $offset, $list_perpage
";
$result = mysql_query($select) or die("Query failed2");

$numrows = mysql_num_rows($result);

if($numrows != "0"){

$i=1;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 

if($row['s_id'] == "5"){
$status="<font color='green'><b>".$row['s_name']."</b></font>";
}elseif($row['s_id'] == "6"){
$status="<font color='red'><b>".$row['s_name']."</b></font>";
}else{
$status="<font color='gray'><b>".$row['s_name']."</b></font>";
}

$tdbg = "class=tbl1";
if($colorow) {
$tdbg = "class=tbl2";
}
?>
<tr>
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $i+($page-1)*30 ?></font></td>
<td <?php print $tdbg; ?>><?php print $row["u_nama"]; ?></td>
<td <?php print $tdbg; ?>><a href="kursus_popup.php?kid=<?php print $row['k_id']; ?>" rel="#overlay"><font class='txt_caption'><?php print $row["k_name"]; ?></font></a></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print date("d-m-Y", strtotime($row["k_sdate"])); ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print date("d-m-Y", strtotime($row["k_edate"])); ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $status; ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php if($row['p_status'] == "5" && $row['p_hadir'] == "9"){?><a href="admin/sijil.php?pid=<?php print $row['p_id']; ?>" target="_blank"><font class='txt_caption'>CETAK</font></a><?php }else{ ?> - <?php } ?></font></td>
</tr>
<?php 
$i++;
$colorow = !$colorow;
}

}else{
		
	$_SESSION['alert'] = "Maaf, tiada rekod dijumpai. Sila cuba sekali lagi.";
	$_SESSION['redirek'] = "status.php";
	$_SESSION['toplus'] = "";
	$pageTitle = 'Semak Status';
	include("kosongfull.php");
	exit;		
		
}
?>
<tr><td colspan="6">&nbsp;</td></tr>
<tr>
<td colspan="6" align="center">
<?php 
function paging($limit,$pageno,$row_count=0,$pagename='status.php',$adressvalue='')  
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
    $paging = '1';          
  }          
  return $paging;  
}  

$limit = 20; //Limit that you want to list results in a page
$condition = "WHERE $cond01 $cond02 $cond03 f.b_id=c.k_bid AND a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id AND b.u_id LIKE '$_SESSION[UsrID]' AND c.k_sdate > '2017-12-31 00:00:00' ORDER BY p_id DESC"; //If you have a condition write here
$my_table = 'pilih a, user b, kursus c, bidang d, status e, kluster f';  //your table name

//Calculating total record count
$query = mysql_query("SELECT COUNT(p_id) FROM $my_table $condition");           
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
print paging($limit,$page,$row_count,"status.php?show=files&search=$search&kluster=$kluster&bulan=$bulan");  

?>	
</td>
</tr>

</table>

</div><!--close content-->

<?php
include("footer.php");
?>