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

if(isset($_GET['terai']) && $_GET['terai'] == "kurdel"){

$_SESSION['terai'] = $_GET['terai'];	
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];

$_SESSION['kid']	=	$_POST['kid'];
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#kurdel").click(function (e) {
        e.preventDefault();
    });
    $('#kurdel').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "kurnew"){

$_SESSION['terai'] = $_POST['terai'];	
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];
$_SESSION['k_code']	=	$_POST['k_code'];
$_SESSION['k_name']	=	$_POST['k_name'];
$_SESSION['k_obj']	=	$_POST['k_obj'];
$_SESSION['k_loc']	=	$_POST['k_loc'];
$_SESSION['k_duration']	=	$_POST['k_duration'];
$_SESSION['st']	=	$_POST['st'];
$_SESSION['sm']	=	$_POST['sm'];
$_SESSION['sh']	=	$_POST['sh'];
$_SESSION['et']	=	$_POST['et'];
$_SESSION['em']	=	$_POST['em'];
$_SESSION['eh']	=	$_POST['eh'];
$_SESSION['k_bid']	=	$_POST['k_bid'];
$_SESSION['k_terms']	=	$_POST['k_terms'];
$_SESSION['k_fee']	=	$_POST['k_fee'];
$_SESSION['k_status']	=	$_POST['k_status'];
$_SESSION['k_aid']	=	$_POST['k_aid'];
$_SESSION['k_wlkin']	=	$_POST['k_wlkin'];
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#kurnew").click(function (e) {
        e.preventDefault();
    });
    $('#kurnew').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "kuredit"){

$_SESSION['terai'] = $_POST['terai'];	
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];

$_SESSION['kid']	=	$_POST['kid'];
$_SESSION['k_code']	=	$_POST['k_code'];
$_SESSION['k_name']	=	$_POST['k_name'];
$_SESSION['k_obj']	=	$_POST['k_obj'];
$_SESSION['k_loc']	=	$_POST['k_loc'];
$_SESSION['k_duration']	=	$_POST['k_duration'];
$_SESSION['st']	=	$_POST['st'];
$_SESSION['sm']	=	$_POST['sm'];
$_SESSION['sh']	=	$_POST['sh'];
$_SESSION['et']	=	$_POST['et'];
$_SESSION['em']	=	$_POST['em'];
$_SESSION['eh']	=	$_POST['eh'];
$_SESSION['k_terms']	=	$_POST['k_terms'];
$_SESSION['k_fee']	=	$_POST['k_fee'];
$_SESSION['k_status']	=	$_POST['k_status'];
$_SESSION['k_remark']	=	$_POST['k_remark'];
$_SESSION['k_aid']	=	$_POST['k_aid'];
$_SESSION['k_wlkin']	=	$_POST['k_wlkin'];
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#kuredit").click(function (e) {
        e.preventDefault();
    });
    $('#kuredit').trigger('click');
});
});//]]> 
</script>
<?php }else{} ?>
<div id="content">
<a href="kursus_edit.php" rel="#overlay" id="kurdel"></a>
<a href="kursus_new.php" rel="#overlay" id="kurnew"></a>
<a href="kursus_edit.php" rel="#overlay" id="kuredit"></a>

<form action="" method="GET">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr>
<td>
<input name="search" id="search" type="text" class="form_field" size="30" style="height:21px" value="" placeholder="&nbsp;Taip carian di sini" />

<select name="tahun" id="tahun">
<?php if(isset($_GET['tahun']) && $_GET['tahun'] == "2022"){ ?>
<option value='' disabled>Tahun</option>
<option value='2022' selected>2022</option>
<option value='2023'>2023</option>
<?php }else{ ?>
<option value='' disabled selected>Tahun</option>
<option value='2022'>2022</option>
<option value='2023'>2023</option>

<?php } ?>
</select>

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
#start cek tahun kursus
if(isset($_GET['tahun']) && $_GET['tahun'] == "2020")
{
	$tahun = "2020";
}
else if(isset($_GET['tahun']) && $_GET['tahun'] == "2021")
{
	$tahun = "2021";
}
else if(isset($_GET['tahun']) && $_GET['tahun'] == "2022")
{
	$tahun = "2022";
}

else 
{
	$tahun = "2023";
}
#end cek tahun kursus


$querysum = "
SELECT COUNT(b_id) AS total
FROM kluster a, kursus b
WHERE $cond01 $cond02 a.b_id=b.k_bid $lvl02 AND k_sdate LIKE '$tahun%'
ORDER BY a.b_id ASC
";
$resultsum = mysql_query($querysum) or die("Query failed");
$rowsum = mysql_fetch_assoc($resultsum);
?>

<div align="right">[ terdapat <?php print $rowsum['total']; ?> rekod ditemui ] <?php if($_SESSION['MyLevel'] == "5"){}else{ ?> [ <a href="kursus_new.php" rel="#overlay">Tambah Kursus ?</a> ]<?php } ?></div>
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
<td width="65%" nowrap><strong>Kursus</strong></div></td>
<td width="30%" align="center" nowrap><strong>Kluster</></strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM kluster a, kursus b
WHERE $cond01 $cond02 a.b_id=b.k_bid $lvl02 AND k_sdate LIKE '$tahun%'
ORDER BY a.b_id, b.k_sdate ASC
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
<td <?php print $tdbg; ?>><a href="kursus_edit.php?kid=<?php print $row['k_id']; ?>" rel="#overlay"><font class='txt_caption1'><?php print $row["k_name"]; ?></font></a></td>
<!--<td <?php print $tdbg; ?> nowrap><font class='txt_caption'><?php print $row["k_name"]; ?></font></td>-->
<td <?php print $tdbg; ?>  align='center'><font class='txt_caption'><?php print $row["b_name"]; ?></font></td>
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
$condition = "WHERE $cond01 $cond02 a.b_id=b.k_bid $lvl02 AND k_sdate LIKE '$tahun%' ORDER BY a.b_id, b.k_sdate ASC"; //If you have a condition write here
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
print paging($limit,$page,$row_count,"katalog.php?show=files&search=$search&kluster=$kluster&tahun=$tahun");  

?>	
</td>
</tr>
</table>
</form>

</td>
</tr>
</table>

</div><!--close content-->

<?php
include("footer.php");
?>
