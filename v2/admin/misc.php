<?php
include("header.php");
include("../conn.php");

$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.
?>
<?php
#start cari keyword
if(isset($_POST['search']) && $_POST['search'] != ""){
	$search = $_POST['search'];
	$cond01 = "WHERE p_nama LIKE '%$search%'";
}else{
	$search = "";
	$cond01 = "";
}
#end cari keyword

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

if(isset($_POST['terai']) && $_POST['terai'] == "penedit"){
	
$_SESSION['terai'] = $_POST['terai'];
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];
	
$_SESSION['pid']	=	$_POST['pid'];
$_SESSION['nama']	=	$_POST['nama'];
$_SESSION['sign']	=	$_POST['sign'];

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#penedit").click(function (e) {
        e.preventDefault();
    });
    $('#penedit').trigger('click');
});
});//]]> 
</script>
<?php
}else{}
?>
<div id="content">
<a href="misc_edit.php" rel="#overlay" id="penedit"></a>

<div id="admin_menu">
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tr><td align="right" height="24px" style="color:white;font-weight:bold">
<?php if($_SESSION['MyLevel'] == "1"){ ?>
<a href="misc.php" style="font-weight:bold;text-decoration:none;color:yellow">PENGARAH</a> | 
<a href="admin_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI ADMIN</a> | 
<a href="admin_new.php" style="font-weight:bold;text-decoration:none;color:white">TAMBAH ADMIN</a> |
<a href="user_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI USER</a> | 
<?php }else{} ?>
<a href="ticer_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI PENGAJAR</a> | 
<a href="ticer_new.php" style="font-weight:bold;text-decoration:none;color:white">TAMBAH PENGAJAR</a>&nbsp;&nbsp;
</td></tr>
</table>  
</div> 

<table width="100%" align="center" cellpadding="3" cellspacing="1">
<form method="POST" action="">
<tr><td>&nbsp;</td></tr>
<tr>
<td style="padding:10px 0 20px 12px">
<strong><span>Carian</span></strong>&nbsp;<input name="search" id="search" type="text" class="form_field" size="30" style="height:21px" value="" />&nbsp;<input type="submit" name="submit" value="Klik" />

<?php #buat query dari table pilih
$querysum = "
SELECT COUNT(p_id) AS total
FROM pengarah
$cond01
ORDER BY p_id ASC
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
<td width="45%" nowrap><strong>Nama</strong></div></td>
<td width="50%" align="center" nowrap><strong>Digital Signature</strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM pengarah
$cond01
ORDER BY p_id ASC
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
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $i+($page-1)*30 ?></font></td>
<td <?php print $tdbg; ?>><a href="misc_edit.php?pid=<?php print $row['p_id']; ?>" rel="#overlay"><?php print $row["p_nama"]; ?></a></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $row["p_sign"]; ?></font></td>
</tr>
<?php 
$i++;
$colorow = !$colorow;
}
?>
<tr>
<td colspan="6" align="center">
<?php 
function paging($limit,$pageno,$row_count=0,$pagename='misc.php',$adressvalue='')  
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
$condition = "$cond01 ORDER BY p_id ASC"; //If you have a condition write here
$my_table = 'pengarah';  //your table name

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
print paging($limit,$page,$row_count,"misc.php?show=files&b_id=$b_id&k_id=$k_id");  

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
