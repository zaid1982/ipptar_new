<?php
include("header.php");
include("../conn.php");

$rawak = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 6); //set your characters or numbers and the amount of text here.
?>
<?php
#start cari keyword
if(isset($_POST['search']) && $_POST['search'] != ""){
	$search = $_POST['search'];
	$cond01 = "AND (u_nama LIKE '%$search%' OR u_emel LIKE '%$search%' OR u_idnum LIKE '%$search%')";
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

if(isset($_POST['terai']) && $_POST['terai'] == "usrdel"){

	
$_SESSION['terai'] = $_POST['terai'];
$_SESSION['uid']	=	$_POST['uid'];
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#usrdel").click(function (e) {
        e.preventDefault();
    });
    $('#usrdel').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "usredit"){

$_POST['nama'] = str_replace("'", "&#39;", $_POST['nama']); #add on 20170710

	
$_SESSION['terai'] = $_POST['terai'];
$_SESSION['kodrawak'] = $_POST['kodrawak']; 
$_SESSION['vercode'] = $_POST['vercode'];
	
$_SESSION['uid']	=	$_POST['uid'];
$_SESSION['idnum']	=	$_POST['idnum'];
$_SESSION['pwd']	=	md5($_POST['pwd']);
$_SESSION['nama']	=	$_POST['nama'];
$_SESSION['tel']	=	$_POST['tel'];
$_SESSION['emel']	=	$_POST['emel'];

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#usredit").click(function (e) {
        e.preventDefault();
    });
    $('#usredit').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "usrstat"){
	
$_SESSION['terai'] = $_POST['terai'];
	
$_SESSION['uid']	=	$_POST['uid']	;
$_SESSION['status']	=	$_POST['status']	;

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#usrstat").click(function (e) {
        e.preventDefault();
    });
    $('#usrstat').trigger('click');
});
});//]]> 
</script>
<?php
}else{}
?>
<div id="content">
<a href="user_edit.php" rel="#overlay" id="usredit"></a>
<a href="user_status.php" rel="#overlay" id="usrstat"></a>

<div id="admin_menu">
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tr><td align="right" height="24px" style="color:white;font-weight:bold">
<?php if($_SESSION['MyLevel'] == "1"){ ?>
<a href="misc.php" style="font-weight:bold;text-decoration:none;color:white">PENGARAH</a> | 
<a href="admin_list.php" style="font-weight:bold;text-decoration:none;color:white">SENARAI ADMIN</a> | 
<a href="admin_new.php" style="font-weight:bold;text-decoration:none;color:white">TAMBAH ADMIN</a> |
<a href="user_list.php" style="font-weight:bold;text-decoration:none;color:yellow">SENARAI USER</a> | 
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
SELECT COUNT(u_id) AS total
FROM user a, status b
WHERE a.u_status = b.s_id AND b.s_id IN ('1','2') $cond01
ORDER BY u_id ASC
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
<td width="35%" nowrap><strong>Nama</strong></div></td>
<td width="15%" align="center" nowrap><strong>No Kad Pengenalan</strong></div></td>
<td width="20%" align="center" nowrap><strong>Emel</></strong></div></td>
<td width="10%" align="center" nowrap><strong>No Telefon</strong></div></td>
<td width="10%" align="center" nowrap><strong>Status</strong></div></td>
<td width="10%" align="center" nowrap><strong>Padam</strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM user a, status b
WHERE a.u_status = b.s_id AND b.s_id IN ('1','2') $cond01
ORDER BY u_id ASC
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
<td <?php print $tdbg; ?>><a href="user_edit.php?uid=<?php print $row['u_id']; ?>" rel="#overlay"><?php print $row["u_nama"]; ?></a></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $row["u_idnum"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $row["u_emel"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $row["u_tel"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><a href="user_status.php?uid=<?php print $row['u_id']; ?>" rel="#overlay"<font class='txt_caption'><?php print strtoupper($row["s_name"]); ?></font></td>
<td <?php print $tdbg; ?> align='center'><a href="user_del.php?uid=<?php print $row['u_id']; ?>" rel="#overlay"<font class='txt_caption'>PADAM</font></td>
</tr>
<?php 
$i++;
$colorow = !$colorow;
}
?>
<tr>
<td colspan="6" align="center">
<?php 
function paging($limit,$pageno,$row_count=0,$pagename='user_list.php',$adressvalue='')  
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
$condition = "WHERE a.u_status = b.s_id AND b.s_id IN ('1','2') $cond01 ORDER BY u_id ASC"; //If you have a condition write here
$my_table = 'user a, status b';  //your table name

//Calculating total record count
$query = mysql_query("SELECT COUNT(u_id) FROM $my_table $condition");           
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
print paging($limit,$page,$row_count,"user_list.php?show=files");  

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