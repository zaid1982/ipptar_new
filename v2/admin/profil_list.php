<?php
include("header.php");
include("../conn.php");
?>
<?php
#start cari keyword
if(isset($_GET['search']) && $_GET['search'] != ""){
	$search = $_GET['search'];
	$cond01 = "WHERE u_nama LIKE '%$search%' OR u_emel LIKE '%$search%'";
}else{
	$search = "";
	$cond01 = "";
}
#end cari keyword

#start paging
$list_perpage = 30;

$page=isset($_GET["page"])?$_GET["page"]:"1";

if ($page != 1){
	$offset = ($page * $list_perpage) - $list_perpage ;
}
else {
	$offset = 0;
}
#end paging
?>
<div id="content">

<form action="" method="GET">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#ccc">
<tr>
<td style="padding:10px 0 10px 12px">
<strong><span>Carian</span></strong>&nbsp;<input name="search" id="search" type="text" class="form_field" size="30" style="height:21px" value="" />&nbsp;<input type="submit" name="submit" value="Klik" />
</td>
</tr>
</table>      
</form> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php #buat query dari table pilih
$querysum = "
SELECT SUM(u_id)
FROM user
$cond01
ORDER BY u_id ASC
";
$resultsum = mysql_query($querysum) or die("Query failed");
$rowsum = mysql_fetch_assoc($resultsum);
?>
<tr><td align="right" nowrap><?php print $rowsum['SUM(u_id)']; ?> rekod ditemui</td></tr>
</table>

<table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr bgcolor="#FFFFFF">
<td width="5%" align="center"><strong>No.</strong></div></td>
<td width="35%" nowrap><strong>Nama</strong></div></td>
<td width="15%" align="center" nowrap><strong>No Kad Pengenalan</strong></div></td>
<td width="20%" align="center" nowrap><strong>Emel</></strong></div></td>
<td width="15%" align="center" nowrap><strong>No Telefon</strong></div></td>
<td width="15%" align="center" nowrap><strong>Status</strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM user
$cond01
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

if($row["u_status"] == ""){
	$row["u_status"] = "BARU";
}else{}
?>
<tr>
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $i+($page-1)*30 ?></font></td>
<td <?php print $tdbg; ?>><a class='submodal-850-730' href="profil.php?idnum=<?php print $row['u_idnum']; ?>"><?php print $row["u_nama"]; ?></a></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $row["u_idnum"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print $row["u_emel"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'>+<?php print $row["u_tel"]; ?></font></td>
<td <?php print $tdbg; ?> align='center'><a class='submodal-450-220' href="profil_edit.php?uid=<?php print $row['u_id']; ?>"><font class='txt_caption'><?php print $row["u_status"]; ?></font></td>
</tr>
<?php 
$i++;
$colorow = !$colorow;
}
?>
<tr>
<td colspan="5">
<?php 
function paging($limit,$pageno,$row_count=0,$pagename='profil_list.php',$adressvalue='')  
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

$limit = 3; //Limit that you want to list results in a page
$condition = "$cond01 ORDER BY u_id ASC"; //If you have a condition write here
$my_table = 'user';  //your table name

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
print "Page : ".paging($limit,$page,$row_count,"profil_list.php?show=files&b_id=$b_id&k_id=$k_id");  

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
