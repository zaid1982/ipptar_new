<?php
include("header.php");
include("../conn.php");

$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.
?>
<?php
if($_SESSION['MyLevel'] == "1" && $_SESSION['MyLevel'] == "5"){
	$lvl = "c.k_bid < '4'";
}elseif($_SESSION['MyLevel'] == "2"){
	$lvl = "c.k_bid = '1'";
}elseif($_SESSION['MyLevel'] == "3"){
	$lvl = "c.k_bid = '2'";
}else{
	$lvl = "c.k_bid = '3'";
}

#start cari keyword
if(isset($_GET['search']) && $_GET['search'] != ""){
	$search = $_GET['search'];
	$cond01 = "AND t_nama LIKE '%$search%' OR k_name LIKE '%$search%'";
}else{
	$search = "";
	$cond01 = "";
}
#end cari keyword

#start cari kursus
if(isset($_GET['kursus']) && ($_GET['kursus'] >= 1 && $_GET['kursus'] <= 200)){
	$kursus = $_GET['kursus'];
	$cond02 = " AND c.k_id LIKE '$kursus'";	
}else{
	$kursus = "";
	$cond02 = "";
}
#end cari kursus

#start paging
$list_perpage = 20;

$page=isset($_GET["page"])?$_GET["page"]:"1";

if ($page != 1){
	$offset = ($page * $list_perpage) - $list_perpage ;
}
else {
	$offset = 0;
}
#end paging

if(isset($_POST['terai']) && $_POST['terai'] == "ticedit"){

$_POST['nama'] = str_replace("'", "&#39;", $_POST['nama']); #add on 20170710
	
$_SESSION['terai'] = $_POST['terai'];
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];
	
$_SESSION['tid']	=	$_POST['tid'];
$_SESSION['nama']	=	$_POST['nama'];
$_SESSION['kursus']	=	$_POST['kursus'];

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#ticedit").click(function (e) {
        e.preventDefault();
    });
    $('#ticedit').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "ticstat"){
	
$_SESSION['terai'] = $_POST['terai'];
	
$_SESSION['tid']	=	$_POST['tid'];
$_SESSION['status']	=	$_POST['status'];

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#ticstat").click(function (e) {
        e.preventDefault();
    });
    $('#ticstat').trigger('click');
});
});//]]> 
</script>
<?php
}else{}
?>
<div id="content">
<a href="ticer_edit.php" rel="#overlay" id="ticedit"></a>
<a href="ticer_status.php" rel="#overlay" id="ticstat"></a>

<div id="admin_menu">
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tr><td align="right" height="24px" style="color:white;font-weight:bold">
<?php if($_SESSION['MyLevel'] == "1"){ ?>
<a href="misc.php" style="font-weight:bold;text-decoration:none;color:white">PENGARAH</a> | 
<a href="admin_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI ADMIN</a> | 
<a href="admin_new.php" style="font-weight:bold;text-decoration:none;color:white">TAMBAH ADMIN</a> |
<a href="user_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI USER</a> |
<?php }else{} ?>
<a href="ticer_list.php" style="font-weight:bold;text-decoration:none;color:yellow">SENARAI PENGAJAR</a> | 
<a href="ticer_new.php" style="font-weight:bold;text-decoration:none;color:white">TAMBAH PENGAJAR</a>&nbsp;&nbsp;
</td></tr>
</table>  
</div> 

<table width="100%" align="center" cellpadding="3" cellspacing="1">
<form method="POST" action="">
<tr><td>&nbsp;</td></tr>
<tr>
<td style="padding:10px 0 20px 12px">
<strong><span>Carian</span></strong>&nbsp;
<input name="search" id="search" type="text" class="form_field" size="30" style="height:21px" value="" />&nbsp;

<select name="kursus">
<option value="" disabled selected>kursus</option>
<?php
if($_SESSION['MyLevel'] == "1"){
	$lvl = "k_bid < '4'";
}elseif($_SESSION['MyLevel'] == "2"){
	$lvl = "k_bid = '1'";
}elseif($_SESSION['MyLevel'] == "3"){
	$lvl = "k_bid = '2'";
}else{
	$lvl = "k_bid = '3'";
}

$sqlm01 = "SELECT * FROM kursus WHERE $lvl ORDER BY k_id ASC";	
$resultm01 = mysql_query($sqlm01) or die(mysql_error());

while ($rowm01 = mysql_fetch_assoc($resultm01)) {
if($rowm01['k_id'] == '0'){
	$tunjukm01 = "selected";
}else{
	$tunjukm01 = "";
}
print "<option value='$rowm01[k_id]' $tunjukm01>$rowm01[k_name]</option>";
}
?>
</select>

<input type="submit" name="submit" value="Klik" />

<?php #buat query dari table pilih
$querysum = "
SELECT COUNT(t_id) AS total
FROM ticer a, status b, kursus c
WHERE a.t_status = b.s_id AND a.t_kid = c.k_id AND $lvl AND b.s_id IN ('1','2') $cond01 $cond02
ORDER BY t_id ASC
";
$resultsum = mysql_query($querysum) or die("Query failed");
$rowsum = mysql_fetch_assoc($resultsum);
?>

<div align="right">[ terdapat <?php print $rowsum['total']; ?> rekod ditemui ]</div>
</td>
</tr>  
</form> 
</table>

<table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="5%" align="center"><strong>No.</strong></div></td>
<td width="25%" nowrap><strong>Nama</strong></div></td>
<td width="35%" align="center" nowrap><strong>Kursus</strong></div></td>
<td width="20%" align="center" nowrap><strong>Kluster</strong></div></td>
<td width="15%" align="center" nowrap><strong>Status</strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM ticer a, status b, kursus c, kluster d
WHERE a.t_status = b.s_id AND a.t_kid = c.k_id AND c.k_bid = d.b_id AND $lvl AND b.s_id IN ('1','2') $cond01 $cond02
ORDER BY t_id ASC
LIMIT $offset, $list_perpage
";

$result = mysql_query($select) or die("Query failed");
$i=1;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$tdbg = "class=tbl1";
if($colorow) {
$tdbg = "class=tbl2";
}
?>
<tr>
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $i+($page-1)*20 ?></font></td>
<td <?php print $tdbg; ?>><a href="ticer_edit.php?tid=<?php print $row['t_id']; ?>" rel="#overlay"><?php print $row["t_nama"]; ?></a></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $row["k_name"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $row["b_name"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><a href="ticer_status.php?tid=<?php print $row['t_id']; ?>" rel="#overlay"><font class='txt_caption'><?php print strtoupper($row["s_name"]); ?></font></td>
</tr>
<?php 
$i++;
$colorow = !$colorow;
}
?>
<tr>
<td colspan="6" align="center">
<?php 
function paging($limit,$pageno,$row_count=0,$pagename='ticer_list.php',$adressvalue='')  
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
$condition = "WHERE a.t_status = b.s_id AND a.t_kid = c.k_id AND $lvl AND b.s_id IN ('1','2') $cond01 $cond02 ORDER BY t_id ASC"; //If you have a condition write here
$my_table = 'ticer a, status b, kursus c';  //your table name

//Calculating total record count
$query = mysql_query("SELECT COUNT(t_id) FROM $my_table $condition");           
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
print paging($limit,$page,$row_count,"ticer_list.php?show=files&b_id=$b_id&k_id=$k_id");  

?>	
</td>
</tr>
</table>
<br/>
</td>
</tr>
</table>

</div><!--close content-->

<?php
include("footer.php");
?>
