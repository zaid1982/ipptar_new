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
	$cond02 = "b_id LIKE $kluster AND";
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

if(isset($_POST['terai']) && $_POST['terai'] == "pensemak"){
	
$_SESSION['terai'] = addslashes($_POST['terai']);

$tkhisi = date('Y-m-d');
	
$key 	= addslashes($_POST['kodrawak']); 
$number = addslashes($_POST['vercode']);

# start captcha
if(($number!=$key)||($number=="")){
	
	session_destroy();
			
	$_POST['alert'] = "Kod tidak valid. Sila cuba sekali lagi.";
	$_POST['redirek'] = "penilaian.php";
	$_POST['toplus'] = "";
	$pageTitle = 'Kemaskini Kursus';
	#include("../kosong.php");
	exit;
	
} else {}
# end captcha	

$select = "
SELECT COUNT(e_pid) AS total
FROM epenilaian
WHERE e_pid LIKE '$_POST[pid]'
ORDER BY e_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

	if($row['total'] > "0"){
		
		#print "satu";
		$sql = "UPDATE epenilaian SET e_j1 = '$_POST[j1]', e_j2 = '$_POST[j2]', e_j3 = '$_POST[j3]', e_j4 = '$_POST[j4]', e_j5 = '$_POST[j5]', e_j6 = '$_POST[j6]', e_j7 = '$_POST[j7]', e_j8 = '$_POST[j8]', e_j9 = '$_POST[j9]', e_j10 = '$_POST[j10]', e_j11 = '$_POST[j11]', e_j12 = '$_POST[j12]', e_j13 = '$_POST[j13]', e_j14 = '$_POST[j14]', e_j15 = '$_POST[j15]', e_j16 = '$_POST[j16]', e_j20 = '$_POST[j20]', e_j21 = '$_POST[j21]', e_j22 = '$_POST[j22]', e_date = '$tkhisi' WHERE e_pid = '$_POST[pid]'";
		$result = mysql_query($sql) or die(mysql_error());
		
		$select = "
		SELECT COUNT(e_pid) AS total
		FROM epenilaian_ticer
		WHERE e_pid LIKE '$_POST[pid]'
		ORDER BY e_id ASC
		";
		$result = mysql_query($select) or die("Query failed");
		$row = mysql_fetch_assoc($result);
		
			if($row['total'] > "0"){
				
				#print "dua";
				
				#start update nilai ticer						
				$item_idCount = $_POST["i"];
			    
			    for($i=0; $i<$item_idCount; $i++) {
			        
			        $sql = "UPDATE epenilaian_ticer SET e_j17='".$_POST["j17"][$i]."', e_j18='".$_POST["j18"][$i]."', e_j19='".$_POST["j19"][$i]."' WHERE e_pid = '$_POST[pid]' AND e_tid ='".$_POST["tid"][$i]."'";
			        $result = mysql_query( $sql );
			        
			    }							
				#end update nilai ticer
				
			}else{
			
				#print "tiga";
				
				#start insert nilai ticer			
				$item_idCount = $_POST["i"];
			    
			    for($i=0; $i<$item_idCount; $i++) {
				
				    $sql = "INSERT INTO epenilaian_ticer (e_pid, e_tid, e_j17, e_j18, e_j19, e_date) VALUES ('$_POST[pid]','".$_POST["tid"][$i]."','".$_POST["j17"][$i]."','".$_POST["j18"][$i]."','".$_POST["j19"][$i]."','$tkhisi')";
					$result = mysql_query($sql) or die(mysql_error());
				}
				#end insert nilai ticer
		
			}
	
	}else{
		
		$sql = "INSERT INTO epenilaian (e_pid, e_j1, e_j2, e_j3, e_j4, e_j5, e_j6, e_j7, e_j8, e_j9, e_j10, e_j11, e_j12, e_j13, e_j14, e_j15, e_j16, e_j20, e_j21, e_j22, e_date)
		VALUES ('$_POST[pid]', '$_POST[j1]', '$_POST[j2]', '$_POST[j3]', '$_POST[j4]', '$_POST[j5]', '$_POST[j6]', '$_POST[j7]', '$_POST[j8]', '$_POST[j9]', '$_POST[j10]', '$_POST[j11]', '$_POST[j12]', '$_POST[j13]', '$_POST[j14]', '$_POST[j15]', '$_POST[j16]', '$_POST[j20]', '$_POST[j21]', '$_POST[j22]', '$tkhisi')";
		$result = mysql_query($sql) or die(mysql_error());
		
		#start insert nilai ticer			
		$item_idCount = $_POST["i"];
	    
	    for($i=0; $i<$item_idCount; $i++) {
		
		    $sql = "INSERT INTO epenilaian_ticer (e_pid, e_tid, e_j17, e_j18, e_j19, e_date) VALUES ('$_POST[pid]','".$_POST["tid"][$i]."','".$_POST["j17"][$i]."','".$_POST["j18"][$i]."','".$_POST["j19"][$i]."','$tkhisi')";
			$result = mysql_query($sql) or die(mysql_error());
		}
		#end insert nilai ticer
			    		
	}
	
	if($_POST['j1'] > 0 && $_POST['j2'] > 0 && $_POST['j3'] > 0 && $_POST['j4'] > 0 && $_POST['j5'] > 0 && $_POST['j6'] > 0 && $_POST['j7'] > 0 && $_POST['j8'] > 0 && $_POST['j9'] > 0 && $_POST['j10'] > 0 && $_POST['j11'] > 0 && $_POST['j12'] > 0 && $_POST['j13'] > 0 && $_POST['j14'] > 0 && $_POST['j15'] > 0 && $_POST['j16'] > 0 && $_POST['j20'] > 0 && $_POST['j21'] > 0 && $_POST['j22'] != "" && $_POST['j17'] > 0 && $_POST['j18'] > 0 && $_POST['j19'] > 0){
		
		$sql = "UPDATE pilih SET p_epstatus = '12' WHERE p_id = '$_POST[pid]'";
		$result = mysql_query($sql) or die(mysql_error());
		
	}else{}

	#$_POST['alert'] = "Maklumat anda telah direkodkan.";
	#$_POST['redirek'] = "penilaian.php";
	#$_POST['toplus'] = "";
	#$pageTitle = 'ePenilaian';
	#include("kosong.php");
	#exit;
	
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#pensemak").click(function (e) {
        e.preventDefault();
    });
    $('#pensemak').trigger('click');
});
});//]]> 
</script>
<?php	
}else{}
?>
<div id="content"> 
<a href="penilaian_semak.php" rel="#overlay" id="pensemak"></a>

<form action="" method="GET">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
<tr><td style="font-weight:bold">SEMAK STATUS PERMOHONAN KURSUS</td></tr>
<tr>
<td>
<input name="search" id="search" type="text" class="form_field" size="30" style="height:21px" value="" placeholder="&nbsp;Taip carian di sini" />

<select name="kluster" id="kluster">
<option value='' disabled selected>Kluster</option>
<?php  	
$sqls = "SELECT b_id, b_name FROM kluster WHERE b_id < 5 ORDER BY b_id ASC";	
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
FROM pilih a, user b, kursus c, kluster d, status e
WHERE $cond01 $cond02 $cond03 a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id AND b.u_id LIKE '$_SESSION[UsrID]'
ORDER BY p_id DESC
";
$resultsum = mysql_query($querysum) or die("Query failedz");
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
<td width="30%"><strong>Nama</strong></div></td>
<td width="35%" nowrap><strong>Kursus</strong></div></td>
<td width="10%" align="center" nowrap><strong>Mula Kursus</></strong></div></td>
<td width="10%" align="center" nowrap><strong>Tamat Kursus</strong></div></td>
<td width="15%" align="center" nowrap><strong>Status</strong></div></td>
</tr>
<?php
$select = "
SELECT *
FROM pilih a, user b, kursus c, kluster d, status e
WHERE $cond01 $cond02 $cond03 a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id AND b.u_id LIKE '$_SESSION[UsrID]'
ORDER BY p_id DESC
LIMIT $offset, $list_perpage
";
$result = mysql_query($select) or die("Query failed");

$numrows = mysql_num_rows($result);

if($numrows != "0"){

$i=1;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
	if($row['p_epstatus'] == "12"){ #print $row['p_id'];
		$status = "<font class='txt_caption' color='green'><b>SELESAI</b></font>";
	}elseif($row['p_epstatus'] == "11"){ #print $row2['p_id'];
		$status = "<a href='penilaian_edit.php?pid=".$row['p_id']."' rel='#overlay'><font class='txt_caption' color='red'><b>BELUM SELESAI</b></font></a>";
	}else{
		$status = "<font class='txt_caption' color='gray'>-</font>";
	}	

$tdbg = "class=tbl1";
if($colorow) {
$tdbg = "class=tbl2";
}
?>
<tr>
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $row['p_id']; ?></font></td>
<td <?php print $tdbg; ?>><?php print $row["u_nama"]; ?></td>
<td <?php print $tdbg; ?>><a href="kursus_popup.php?kid=<?php print $row['k_id']; ?>" rel="#overlay"><font class='txt_caption'><?php print $row["k_name"]; ?></font></a></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print date("d-m-Y", strtotime($row["k_sdate"])); ?></font></td>
<td <?php print $tdbg; ?> align='center'><font class='txt_caption'><?php print date("d-m-Y", strtotime($row["k_edate"])); ?></font></td>
<td <?php print $tdbg; ?> align='center'><?php print $status; ?></td>
</tr>
<?php 
$i++;
$colorow = !$colorow;
}

}else{
		
	$_SESSION['alert'] = "Maaf, tiada rekod dijumpai. Sila cuba sekali lagi.";
	$_SESSION['redirek'] = "penilaian.php";
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
function paging($limit,$pageno,$row_count=0,$pagename='penilaian.php',$adressvalue='')  
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
$condition = "WHERE $cond01 $cond02 $cond03 a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id AND b.u_id LIKE '$_SESSION[UsrID]' ORDER BY p_id DESC"; //If you have a condition write here
$my_table = 'pilih a, user b, kursus c, kluster d, status e';  //your table name

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
print paging($limit,$page,$row_count,"penilaian.php?show=files&search=$search&kluster=$kluster&bulan=$bulan");  

?>	
</td>
</tr>

</table>

</div><!--close content-->

<?php
include("footer.php");
?>