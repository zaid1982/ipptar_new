<?php
include("header.php");
include("../conn.php");

#print $myUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$qstr=$_SERVER["QUERY_STRING"];
$para = explode('&',$qstr);	
$qstr2a = $para[0]."&".$para[1];
$qstr2b = $para[1]."&".$para[2];

$coba = substr($para[0], 0, 3);
/*
if($coba == "pid"){
$qstr2 = $qstr2b;
}else{
$qstr2 = $qstr2a;
} 
*/
$qstr2 = $qstr;

#1st
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
$queryb = mysql_query("SELECT b_id, b_name FROM kluster $lvl ORDER BY b_id ASC"); 

#2nd
#SQL Injection fix
$b_id = addslashes($_GET["b_id"]);
if (strlen($b_id)>11){
exit;
}
$b_id = (int)$b_id;

if(isset($b_id) && $b_id != ""){
	$b_id=$b_id;
}else{ 
	$b_id="0";
}

#start cari tahun
#SQL Injection fix
$tahun = addslashes($_GET["tahun"]);
if (strlen($tahun)>4){
exit;
}
$tahun = $tahun;

if(isset($tahun) && ($tahun >= 2020 && $tahun <= 2022)){
	$tahun = $tahun;
	$cond07 = " AND SUBSTR(k_sdate,1,4) LIKE $tahun";	
}else{
	$tahun = "2023";
	$cond07 = " AND SUBSTR(k_sdate,1,4) LIKE 2023";
}
#end cari tahun

if(strlen($b_id) > 0){
	$queryk = mysql_query("SELECT k_id, k_code, k_name FROM kursus WHERE k_bid=$b_id $cond07 ORDER BY k_id ASC"); 
}else{
	$queryk = mysql_query("SELECT k_id, k_code, k_name FROM kursus WHERE k_bid=$b_id ORDER BY k_id ASC");
}
 
#start cari keyword
if(isset($_GET['search']) && $_GET['search'] != ""){
	$search = addslashes($_GET['search']);
	$cond01 = " AND (u_nama LIKE '%$search%' OR b_name LIKE '%$search%' OR k_code LIKE '%$search%' OR k_name LIKE '%$search%')";
}else{
	$search = "";
	$cond01 = "";
}
#end cari keyword



#start cari kluster
#SQL Injection fix
$kluster = addslashes($_GET["kluster "]);
if (strlen($kluster)>11){
exit;
}
$kluster = (int)$kluster;

if(isset($kluster) && ($kluster >= 1 && $kluster <= 10)){
	$kluster = $kluster;
	$cond02 = " AND b_id LIKE '$kluster'";	
}else{
	$kluster = "";
	$cond02 = "";
}
#end cari kluster

#start cari kursus
#SQL Injection fix
$kursus = addslashes($_GET["kursus"]);
if (strlen($kursus)>11){
exit;
}
$kursus = (int)$kursus;

if(isset($kursus) && ($kursus >= 1 && $kursus <= 1000)){
	$kursus = $kursus;
	$cond03 = " AND k_id LIKE '$kursus'";	
}else{
	$kursus = "";
	$cond03 = "";
}
#end cari kursus

#start cari bulan
#SQL Injection fix
$bulan = addslashes($_GET["bulan"]);
if (strlen($bulan)>2){
exit;
}
$bulan = $bulan;

if(isset($bulan) && ($bulan >= 1 && $bulan <= 12)){
	$bulan = $bulan;
	$cond04 = " AND SUBSTR(k_sdate,6,2) LIKE '$bulan'";	
}else{
	$bulan = "";
	$cond04 = "";
}
#end cari bulan

#start cari status
#SQL Injection fix
$status = addslashes($_GET["status"]);
if (strlen($status)>11){
exit;
}
$status = (int)$status;

if(isset($status) && ($status >= 3 && $status <= 6)){
	$status = $status;
	$cond05 = " AND p_status LIKE '$status'";	
}else{
	$status = "";
	$cond05 = "";
}
#end cari status

#start cari hadir
#SQL Injection fix
$hadir = addslashes($_GET["hadir"]);
if (strlen($hadir)>11){
exit;
}
$hadir = (int)$hadir;

if(isset($hadir) && ($hadir >= 9 && $hadir <= 10)){
	$hadir = $hadir;
	$cond06 = " AND p_hadir LIKE '$hadir'";	
}else{
	$hadir = "";
	$cond06 = "";
}
#end cari hadir

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

if(isset($_POST['terai']) && $_POST['terai'] == "profil"){

$_POST['nama'] 			= str_replace("'", "&#39;", $_POST['nama']); #add on 20170710
$_POST['ketua'] 		= str_replace("'", "&#39;", $_POST['ketua']); #add on 20170710
	
$_SESSION['terai'] 		= addslashes($_POST['terai']);
$_SESSION['kodrawak'] 	= addslashes($_POST['kodrawak']); 
$_SESSION['vercode'] 	= addslashes($_POST['vercode']);
	
$_SESSION['idnum']			= addslashes($_POST['idnum']);
$_SESSION['pwd']			= $_POST['pwd'];
$_SESSION['nama']			= addslashes($_POST['nama']);
$_SESSION['jantina']		= addslashes($_POST['jantina']);
$_SESSION['tltahun']		= addslashes($_POST['tltahun']);
$_SESSION['tlbulan']		= addslashes($_POST['tlbulan']);
$_SESSION['tlhari']			= addslashes($_POST['tlhari']);
$_SESSION['tel']			= addslashes($_POST['tel']);
$_SESSION['jawatan']		= addslashes($_POST['jawatan']);
$_SESSION['peringkat']		= addslashes($_POST['peringkat']);
$_SESSION['klasifikasi']	= addslashes($_POST['klasifikasi']);
$_SESSION['gred']			= addslashes($_POST['gred']);
$_SESSION['taraf']			= addslashes($_POST['taraf']);
$_SESSION['khidmat']		= addslashes($_POST['khidmat']);
$_SESSION['tahun_lantik']	= addslashes($_POST['tahun_lantik']);
$_SESSION['bulan_lantik']	= addslashes($_POST['bulan_lantik']);
$_SESSION['hari_lantik']	= addslashes($_POST['hari_lantik']);
$_SESSION['emel']			= addslashes($_POST['emel']);
$_SESSION['ketua']			= addslashes($_POST['ketua']);
$_SESSION['ketuajwt']		= addslashes($_POST['ketuajwt']);
$_SESSION['ketuaemel']		= addslashes($_POST['ketuaemel']);
$_SESSION['alamatkjab']		= addslashes($_POST['alamatkjab']);
$_SESSION['jab']			= addslashes($_POST['jab']);
$_SESSION['jabaddr1']		= addslashes($_POST['jabaddr1']);
$_SESSION['jabaddr2']		= addslashes($_POST['jabaddr2']);
$_SESSION['jabpkod']		= addslashes($_POST['jabpkod']);
$_SESSION['jabbandar']		= addslashes($_POST['jabbandar']);
$_SESSION['jabnegeri']		= addslashes($_POST['jabnegeri']);
$_SESSION['jabtel']			= addslashes($_POST['jabtel']);
$_SESSION['jabfax']			= addslashes($_POST['jabfax']);
$_SESSION['qstr'] 			= addslashes($_POST['qstr']);
$_SESSION['skop']			= addslashes($_POST['skop']);
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#profil").click(function (e) {
        e.preventDefault();
    });
    $('#profil').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "mohedit"){
	
$_SESSION['terai'] 		= addslashes($_POST['terai']);
$_SESSION['kodrawak'] 	= addslashes($_POST['kodrawak']); 
$_SESSION['vercode'] 	= addslashes($_POST['vercode']);
	
$_SESSION['pid']		= addslashes($_POST['pid']);
$_SESSION['status']		= addslashes($_POST['status']);
$_SESSION['k_sdate']	= addslashes($_POST['k_sdate']);
$_SESSION['k_edate']	= addslashes($_POST['k_edate']);
$_SESSION['k_name']		= addslashes($_POST['k_name']);
$_SESSION['u_kemel']	= addslashes($_POST['u_kemel']);
$_SESSION['u_knama']	= addslashes($_POST['u_knama']);
$_SESSION['u_emel']		= addslashes($_POST['u_emel']);
$_SESSION['u_nama']		= addslashes($_POST['u_nama']);
$_SESSION['k_loc']		= addslashes($_POST['k_loc']);
$_SESSION['qstr'] 		= addslashes($_POST['qstr']);

?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#mohedit").click(function (e) {
        e.preventDefault();
    });
    $('#mohedit').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "mohdel"){
	
$_SESSION['terai'] 		= addslashes($_POST['terai']);
$_SESSION['kodrawak'] 	= addslashes($_POST['kodrawak']); 
$_SESSION['vercode'] 	= addslashes($_POST['vercode']);
	
$_SESSION['pid']		= addslashes($_POST['pid']);
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#mohdel").click(function (e) {
        e.preventDefault();
    });
    $('#mohdel').trigger('click');
});
});//]]> 
</script>
<?php
}elseif(isset($_POST['terai']) && $_POST['terai'] == "haredit"){
	
$_SESSION['terai'] 		= addslashes($_POST['terai']);
$_SESSION['kodrawak'] 	= addslashes($_POST['kodrawak']); 
$_SESSION['vercode'] 	= addslashes($_POST['vercode']);
	
$_SESSION['pid']		= addslashes($_POST['pid']);
$_SESSION['status']		= addslashes($_POST['status']);
$_SESSION['qstr'] 		= addslashes($_POST['qstr']);
?>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function () {

    $("#haredit").click(function (e) {
        e.preventDefault();
    });
    $('#haredit').trigger('click');
});
});//]]> 
</script>
<?php
}else{}
?>
<div id="content">
<a href="profil.php" rel="#overlay" id="profil"></a>
<a href="mohon_edit.php" rel="#overlay" id="mohedit"></a>
<a href="mohon_del.php" rel="#overlay" id="mohdel"></a>
<a href="hadir_edit.php" rel="#overlay" id="haredit"></a>

<form action="" method="GET">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="dontprint">
<tr>
<td>
<input name="search" id="search" type="text" class="form_field" size="20" style="height:21px" value="" placeholder="&nbsp;Taip carian di sini" />

<select name="tahun" id="tahun">
<?php if(isset($_GET['tahun']) && $_GET['tahun'] == "2022"){ ?>
<option value='' disabled>Tahun</option>
<option value='2022' selected>2022</option>
<option value='2023'>2023</option>
<?php }elseif(isset($_GET['tahun']) && $_GET['tahun'] == "2023"){ ?>
<option value='' disabled>Tahun</option>
<option value='2022'>2022</option>
<option value='2023'selected>2023</option>

<?php }else{ ?>
<option value='' disabled selected>Tahun</option>
<option value='2022'>2022</option>
<option value='2023'>2023</option>
<?php } ?>
</select>

<select name='kluster' onchange="reload1(this.form)" style='width:150px'><option value='' disabled selected>Kluster</option>
<?php
while($ek = mysql_fetch_array($queryb)) { 
	if($ek['b_id']==@$b_id){
		print "<option selected value='$ek[b_id]' style=color:red>$ek[b_name]</option>";
	}else{
		print "<option value='$ek[b_id]'>$ek[b_name]</option>";
	}
}
?>
</select>

<?php if(isset($b_id)) { ?>
<select name='kursus' style='width:200px'><option value='' disabled selected>Kursus</option>
<?php
while($ek = mysql_fetch_array($queryk)) { 
	if($ek['k_id']==@$k_id){
		#print "<option selected value='$ek[k_id]'>$ek[k_code]&nbsp;-&nbsp;$ek[k_name]</option>"."<BR>";
		print "<option selected value='$ek[k_id]'>$ek[k_name]</option>"."<BR>";
	}else{
		#print  "<option value='$ek[k_id]'>$ek[k_code]&nbsp;-&nbsp;$ek[k_name]</option>";
		print  "<option value='$ek[k_id]'>$ek[k_name]</option>";
	}
}
?>
</select>
<?php } else {} ?>

<select name="bulan" id="bulan" placeholder="Bulan">
<option value="" disabled selected>Bulan</option><option value="01" >01</option><option value="02" >02</option><option value="03" >03</option><option value="04" >04</option><option value="05" >05</option><option value="06" >06</option><option value="07" >07</option><option value="08" >08</option><option value="09" >09</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option>
</select>

<select name="status" id="status" placeholder="Status">
<option value="" disabled selected>Status</option><option value="3">BARU</option><option value="4">DISOKONG</option><option value="5">LULUS</option><option value="6">GAGAL</option></select>

<select name="hadir" id="hadir" placeholder="Kehadiran">
<option value="" disabled selected>Kehadiran</option><option value="9">HADIR</option><option value="10">TIDAK HADIR</option></select>

<input type="submit" name="submit" value="Klik" />

<?php 
#buat query dari table pilih
$querysum = "
SELECT COUNT(p_id) as total
FROM pilih a, user b, kursus c, kluster d, status e
WHERE a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id $lvl02 $cond01 $cond02 $cond03 $cond04 $cond05 $cond06 $cond07 AND a.p_epstatus != '14'
ORDER BY p_id ASC
";
$resultsum = mysql_query($querysum) or die("Query failed");
$rowsum = mysql_fetch_assoc($resultsum);
?>

<div align="right"><br/>[ terdapat <?php print $rowsum['total']; ?> rekod ditemui ]</div>
</td>
</tr>
</table>      
</form> 

<table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr><td colspan=6><div id="bolehprint"><b>SENARAI SEMAK KEHADIRAN PESERTA KURSUS</b></div></td></tr>
<tr>
<td width="5%" align="center"><strong>No.</strong></td>
<td width="30%" nowrap><strong>Nama</strong></td>
<td width="35%" nowrap><strong>Kursus</strong></td>
<td width="10%" align="center" nowrap><strong>Status Mohon</></strong></td>
<td width="10%" align="center" nowrap><strong>Kehadiran</strong></td>
<td width="10%" align="center" nowrap><div id="bolehprint">Semak</div><div class="dontprint"><strong>Sijil</strong></div></td>
<?php
if($_SESSION['MyLevel'] == "1"){
?>
<td align="center" nowrap><div id="bolehprint">Semak</div><div class="dontprint"><strong>Padam</strong></div></td>
<td align="center" nowrap><div id="bolehprint">Semak</div><div class="dontprint"><strong>Resend</strong></div></td>
<?php 
}else{}
?>
</tr>
<?php
$select = "
SELECT *
FROM pilih a, user b, kursus c, kluster d, status e
WHERE a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id $lvl02 $cond01 $cond02 $cond03 $cond04 $cond05 $cond06 $cond07 AND a.p_epstatus != '14'
ORDER BY p_id ASC
LIMIT $offset, $list_perpage
";

$result = mysql_query($select) or die("Query failed");
$i=1;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
$k_id = $row['k_id'];
$kname = $row['k_name'];
	
$tdbg = "class=tbl1";
if($colorow) {
$tdbg = "class=tbl2";
}

	
$sql_h = "SELECT s_name FROM status WHERE s_id IN ('9','10') AND s_id = '$row[p_hadir]' ORDER BY s_id ASC";	
$result_h = mysql_query($sql_h) or die(mysql_error());
$row_h = mysql_fetch_assoc($result_h);

?>
<tr>
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $i+($page-1)*20 ?></font></td>
<td <?php print $tdbg; ?>><a href="profil.php?idnum=<?php print $row['u_idnum']; ?>" rel="#overlay"><?php print $row["u_nama"]; ?></a></td>
<td <?php print $tdbg; ?>><a href="../kursus_popup.php?kid=<?php print $row['k_id']; ?>" rel="#overlay"><font class='txt_caption'><?php print $row["k_name"]; ?></font></a></td>
<td <?php print $tdbg; ?> align='center'><a href="mohon_edit.php?pid=<?php print $row['p_id']; ?>&<?php print $qstr2 ?>" rel="#overlay"><font class='txt_caption'><?php print $row["s_name"]; ?></font></a></td>
<td <?php print $tdbg; ?> align='center'><a href="hadir_edit.php?pid=<?php print $row['p_id']; ?>" rel="#overlay"><font class='txt_caption'><?php print $row_h["s_name"]; ?></font></a></td>
<td <?php print $tdbg; ?> align='center'><div id="bolehprint">&#9634;</div><div class="dontprint"><?php if($row['p_status'] == "5" && $row['p_hadir'] == "9"){?><a href="sijil.php?pid=<?php print $row['p_id']; ?>" target="_blank"><font class='txt_caption'>CETAK</font></a><?php }else{ ?> - <?php } ?></div></td>
<?php
if($_SESSION['MyLevel'] == "1"){
?>
<td <?php print $tdbg; ?> align='center'><div id="bolehprint">&#9634;</div><div class="dontprint"><a href="mohon_del.php?pid=<?php print $row['p_id']; ?>" rel="#overlay"><font class='txt_caption'>X</font></a></div></td>
<td <?php print $tdbg; ?> align='center'><div id="bolehprint">&#9634;</div><div class="dontprint"><a href="../manual_mohon_submit.php?pid=<?php print $row['p_id']; ?>" rel="#overlay"><font class='txt_caption'>R</font></a></div></td>
<?php 
}else{}
?>
</tr>
<?php 
$i++;
$colorow = !$colorow;
}
?>
<tr><td colspan="6">&nbsp;</td></tr>
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
    $paging .= ' <b><a href="'.$pagename.'page=1'.$adressvalue.'" style="text-decoration:none"><b>1</b></a>........</b> ';  
                 
    for($i=$from; $i <= $to; $i++)  
    {                          
      if($i == $pageno)  
      {          
        $paging .= ' <b>['.$i.']</b> ';                          
      } else {          
        $paging .= ' <a href="'.$pagename.'page='.$i.$adressvalue.'" style="text-decoration:none">'.$i.'</a> ';                          
      }                  
    }        
    if ($to < $page_count)  
    {  
      $paging .= ' <b>........ <a href="'.$pagename.'page='.$page_count.$adressvalue.'" style="text-decoration:none">'.$page_count.'</a></b> ';  
    }  
  }          
  if($paging == "")  
  {                  
    $paging = '';          
  }          
  return $paging;  
}  

$limit = 20; //Limit that you want to list results in a page
$condition = "WHERE a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id $lvl02 $cond01 $cond02 $cond03 $cond04 $cond05 $cond06 $cond07 AND a.p_epstatus != '14' ORDER BY p_id ASC"; //If you have a condition write here
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
#print paging($limit,$page,$row_count,"mohon.php?show=files&b_id=$b_id&k_id=$k_id");  

if(isset($search) && $search != ""){
$sch = "search=$search&";
}else{
$sch = "";
}
if(isset($kluster) && $kluster != ""){
$klu = "kluster=$kluster&";
}else{
$klu = "";
}
if(isset($kursus) && $kursus != ""){
$kur = "kursus=$kursus&";
}else{
$kur = "";
}
if(isset($bulan) && $bulan != ""){
$bln = "bulan=$bulan&";
}else{
$bln = "";
}
if(isset($status) && $status != ""){
$sta = "status=$status&";
}else{
$sta = "";
}
if(isset($hadir) && $hadir != ""){
$hdr = "hadir=$hadir&";
}else{
$hdr = "";
}
if(isset($tahun) && $tahun != ""){
$thn = "tahun=$tahun&";
}else{
$thn = "";
}

print paging($limit,$page,$row_count,"mohon.php?$sch$klu$kur$bln$sta$hdr$thn");  
?>	
</td>
</tr>
<tr><td colspan="6" align="right">&nbsp;</td></tr>
</table>

<table width="100%" align="center" cellpadding="3" cellspacing="1">
<tr><td colspan="6" align="right">&nbsp;</td></tr>
<tr><td colspan="6" align="right">
<?php if(isset($_GET['kursus']) && $rowsum['total'] != "0"){ ?>
<a href="hadir_print.php?kid=<?php print $k_id ?>&k=<?php print $kname; ?>&<?php print $_SERVER['QUERY_STRING'];?>" target="_blank" style="text-decoration:none;font-size:12px"><button>   CETAK SENARAI PILIHAN   </button></a>
<a href="hadir2_print.php?kid=<?php print $k_id ?>&k=<?php print $kname; ?>&<?php print $_SERVER['QUERY_STRING'];?>" target="_blank" style="text-decoration:none;font-size:12px"><button>   CETAK SENARAI KEHADIRAN   </button></a>
<a href="hadir3_print.php?kid=<?php print $k_id ?>&k=<?php print $kname; ?>&<?php print $_SERVER['QUERY_STRING'];?>" target="_blank" style="text-decoration:none;font-size:12px"><button>   CETAK SENARAI SEMAK PENGINAPAN   </button></a>
<?php }else{ ?>
<button style="text-decoration:none;color:gray;font-size:12px">   CETAK SENARAI PILIHAN   </button>
<button style="text-decoration:none;color:gray;font-size:12px">   CETAK SENARAI KEHADIRAN   </button>
<button style="text-decoration:none;color:gray;font-size:12px">   CETAK SENARAI SEMAK PENGINAPAN   </button>
<?php } ?>
</td></tr>

</table>

</td>
</tr>
</table>

</div><!--close content-->

<?php
include("footer.php");
?>
