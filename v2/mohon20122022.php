<?php
include("header.php");
include("conn.php");

$now = date("Y-m-d H:i:s");
#$harini = date('Y-m-d H:i:s');
#$now = date('Y-m-d H:i:s', strtotime($harini . " -5 days"));

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

if(isset($_GET['bulan']) && ($_GET['bulan'] >= 1 && $_GET['bulan'] <= 12)){
	$bulan = $_GET['bulan'];
	$cond03 = "SUBSTR(k_sdate,6,2) LIKE '$bulan' AND";	
}else{
	$bulan = "";
	$cond03 = "";
}
?>
<div id="content">
<?php
if(isset($_GET['terai']) && $_GET['terai'] == "2"){
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#no2").click(function (e) {
        e.preventDefault();
    });
    $('#no2').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_GET['terai']) && $_GET['terai'] == "3"){

$_SESSION['asrama'] =  $_GET['asrama'];
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#no3").click(function (e) {
        e.preventDefault();
    });
    $('#no3').trigger('click');
});
});//]]> 
</script>
<?php
}else{}
?>
<a href="mohon_semakprofil.php?kid=<?php print $_GET['kid']; ?>" rel="#overlay" id="no2"></a>
<a href="mohon_submit.php?kid=<?php print $_GET['kid']; ?>" rel="#overlay" id="no3"></a>

<form action="" method="GET">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr><td style="font-weight:bold">MOHON KURSUS</td></tr>
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
SELECT COUNT(b_id) AS total
FROM kluster a, kursus b
WHERE $cond01 $cond02 $cond03 a.b_id=b.k_bid AND (b.k_sdate > '$now' OR b.k_wlkin = '1') AND b.k_sdate > '2020-12-31 00:00:00' AND b.k_status = '7'
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

<table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="5%" align="center"><strong>No.</strong></div></td>
<td width="40%" nowrap><strong>Kursus</strong></div></td>
<td width="15%" align="center" nowrap><strong>Kluster</strong></div></td>
<td width="10%" align="center" nowrap><strong>Mula Kursus</></strong></div></td>
<td width="10%" align="center" nowrap><strong>Tamat Kursus</strong></div></td>
<td width="10%" align="center" nowrap><strong>Status</strong></div></td>
<td width="10%" align="center" nowrap><strong>Sijil</strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM kluster a, kursus b
WHERE $cond01 $cond02 $cond03 a.b_id=b.k_bid AND (b.k_sdate > '$now' OR b.k_wlkin = '1') AND b.k_sdate > '2020-12-31 00:00:00' AND b.k_status = '7'
ORDER BY b.k_sdate ASC,a.b_id ASC
LIMIT $offset, $list_perpage
";

$result = mysql_query($select) or die("Query failed");
$i=1;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 

$tkhmula = date("Ymd", strtotime($row["k_sdate"]));
$tkhharini = date("Ymd");
#$tkhharini = date('Ymd', strtotime(date(Ymd) . " -5 days"));
$tkhbeza = $tkhmula-$tkhharini;
if($row['k_status'] == '14'){
$status="<font color='gray'><b>BATAL</b></font>";
}else{
if($tkhbeza > "0" || $row['k_wlkin'] == "1"){
$status="<font color='green'><b>BUKA</b></font>";
}else{
$status="<font color='red'><b>TUTUP</b></font>";
}
}
	
$tdbg = "class=tbl1";
if($colorow) {
$tdbg = "class=tbl2";



}
?>
<tr>
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $i+($page-1)*20 ?></font></td>
<?php
if($row['k_status'] == '14'){
?>
<td <?php print $tdbg; ?>><?php print $row["k_name"]; ?></td>
<?php
}else{
?>
<td <?php print $tdbg; ?>><a href="kursus_pilih.php?kid=<?php print $row['k_id']; ?>" rel="#overlay"><?php print $row["k_name"]; ?></a></td>
<?php
}
?>
<td <?php print $tdbg; ?> nowrap><font class='txt_caption'><?php print $row["b_name"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print date("d-m-Y", strtotime($row["k_sdate"])); ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print date("d-m-Y", strtotime($row["k_edate"])); ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $status; ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php if($row['p_status'] == "5" && $row['p_hadir'] == "9"){?><a href="sijil.php?pid=<?php print $row['p_id']; ?>" rel="#overlay"><font class='txt_caption'>CETAK</font></a><?php }else{ ?> - <?php } ?></font></td>
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
function paging($limit,$pageno,$row_count=0,$pagename='mohon.php',$adressvalue='')  
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
$condition = "WHERE $cond01 $cond02 $cond03 a.b_id=b.k_bid AND (b.k_sdate > '$now' OR b.k_wlkin = '1') AND b.k_sdate > '2020-12-31 00:00:00' ORDER BY b.k_sdate ASC,a.b_id ASC"; //If you have a condition write here
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
print paging($limit,$page,$row_count,"mohon.php?show=files&search=$search&kluster=$kluster&bulan=$bulan");  

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