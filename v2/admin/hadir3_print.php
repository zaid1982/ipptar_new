<?php
include("header2.php");
include("../conn.php");

$qstr=$_SERVER['QUERY_STRING'];

#1st
if($_SESSION['MyLevel'] == "1"){
	$lvl = "WHERE b_id < '4'";
	$lvl02 = "AND b_id < '4'";
}elseif($_SESSION['MyLevel'] == "2"){
	$lvl = "WHERE b_id = '1'";
	$lvl02 = "AND b_id = '1'";
}elseif($_SESSION['MyLevel'] == "3"){
	$lvl = "WHERE b_id = '2'";
	$lvl02 = "AND b_id = '2'";
}else{
	$lvl = "WHERE b_id = '3'";
	$lvl02 = "AND b_id = '3'";
}
$queryb = mysql_query("SELECT b_id, b_name FROM kluster $lvl ORDER BY b_id ASC"); 

#2nd
#SQL Injection fix
$b_id = $_GET["b_id"];
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
$tahun = $_GET["tahun"];
if (strlen($tahun)>4){
exit;
}
$tahun = $tahun;

if(isset($tahun) && ($tahun >= 2020 && $tahun <= 2022)){
	$tahun = $tahun;
	$cond07 = " AND SUBSTR(k_sdate,1,4) LIKE $tahun";	
}else{
	$tahun = "2021";
	$cond07 = " AND SUBSTR(k_sdate,1,4) LIKE 2021";
}
#end cari tahun

if(strlen($b_id) > 0){
	$queryk = mysql_query("SELECT k_id, k_code, k_name FROM kursus WHERE k_bid=$b_id $cond07 ORDER BY k_id ASC"); 
}else{
	$queryk = mysql_query("SELECT k_id, k_code, k_name FROM kursus WHERE k_bid=$b_id ORDER BY k_id ASC");
}
 
#start cari keyword
if(isset($_GET['search']) && $_GET['search'] != ""){
	$search = $_GET['search'];
	$cond01 = " AND (u_nama LIKE '%$search%' OR b_name LIKE '%$search%' OR k_code LIKE '%$search%' OR k_name LIKE '%$search%')";
}else{
	$search = "";
	$cond01 = "";
}
#end cari keyword

#start cari kluster
#SQL Injection fix
$kluster = $_GET["kluster"];
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
$kursus = $_GET["kursus"];
if (strlen($kursus)>11){
exit;
}
$kursus = (int)$kursus;

if(isset($kursus) && ($kursus >= 1 && $kursus <= 500)){
	$kursus = $kursus;
	$cond03 = " AND k_id LIKE '$kursus'";	
}else{
	$kursus = "";
	$cond03 = "";
}
#end cari kursus

#start cari bulan
#SQL Injection fix
$bulan = $_GET["bulan"];
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
$status = $_GET["status"];
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
$hadir = $_GET["hadir"];
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
?>
<div id="content">

<table border="0" width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr><td colspan=6 bgcolor="lightgray"><b>SENARAI SEMAK KEPERLUAN PENGINAPAN BAGI <?php print strtoupper($_GET['k']); ?></b></td></tr>
<tr><td colspan=6>&nbsp;</td></tr>
</tr>
<table border="1" width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" style="border-collapse: collapse">
<tr>
<td width="5%" align="center"><strong>Bil.</strong></td>
<td width="25%" nowrap><strong>Nama</strong></td>
<td width="10%" nowrap><strong>No.K/P</strong></td>
<td width="30%" nowrap><strong>Alamat</strong></td>
<td width="10%" nowrap><strong>Emel</strong></td>
<td width="10%" nowrap><strong>Tel.Bimbit</strong></td>
<td width="10%" nowrap><strong>Jabatan</strong></td>
</tr>
<?php
$select = "
SELECT *
FROM pilih a, user b, kursus c, kluster d, status e, asrama f
WHERE a.p_uid = b.u_id AND a.p_kid = c.k_id AND c.k_bid = d.b_id AND a.p_status = e.s_id $cond01 $cond02 $cond03 $cond04 $cond05 $cond06 $cond07
AND b.u_id = f.a_uid AND c.k_id = f.a_kid AND f.a_status = 1 AND a.p_epstatus != '14'
ORDER BY p_id ASC
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
<td <?php print $tdbg; ?> align='center' valign='middle' nowrap><font class='txt_caption'><?php print $i ?></font></td>
<td <?php print $tdbg; ?>><?php print $row["u_nama"]; ?></td>
<td <?php print $tdbg; ?>><?php print $row["u_idnum"]; ?></td>
<td <?php print $tdbg; ?>><?php print $row["u_jabaddr1"]; ?>,<?php print $row["u_jabaddr2"]; ?>,<?php print $row["u_jabpkod"]; ?> <?php print $row["u_jabbandar"]; ?>,<?php print $row["u_jabnegeri"]; ?></td>
<td <?php print $tdbg; ?>><?php print $row["u_emel"]; ?></td>
<td <?php print $tdbg; ?>><?php print $row["u_tel"]; ?></td>
<td <?php print $tdbg; ?>><?php print $row["u_jab"]; ?></td>

</tr>
<?php 
$i++;
$colorow = !$colorow;
}
?>
</table>
</td>
</tr>
</table>

</div><!--close content-->

<br/><br/>

</div><!--close container-->

</body>
</html>
