<?php
include("header2.php");
include("../conn.php");

$qstr   = $_SERVER['QUERY_STRING'];
$kid    = addslashes($_GET['kid']);
?>
<div id="content">

<table border="0" width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr><td colspan=6 bgcolor="lightgray"><b>SENARAI KEHADIRAN PESERTA <?php print strtoupper($_GET['k']); ?></b></td></tr>
<tr><td colspan=6>&nbsp;</td></tr>
</table>
<table border="1" width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" style="border-collapse: collapse">
<tr>
<td width="2%" align="center"><strong>Bil.</strong></td>
<td nowrap><strong>Nama</strong></td>
<td width="3%" nowrap><strong>Gred</strong></td>
<td nowrap><strong>Jawatan</strong></td>
<td nowrap><strong>Jabatan</strong></td>
<td nowrap><strong>Emel</strong></td>
<td nowrap><strong>Telefon</strong></td>
<td align="center" nowrap><strong>Kedatangan</></strong></td>
<td align="center" nowrap><strong>Status Yuran</></strong></td>
<td align="center" nowrap><strong>Tandatangan</strong></td>
</tr>

<?php
$select = "SELECT * FROM pilih WHERE p_kid = $kid ORDER BY p_id ASC";
//echo $select;
$result = mysql_query($select) or die("Query failed");
$i=1;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
 $p_uid = $row['p_uid'];
 $p_hadir = $row['p_hadir']
?>
<tr>
<td align="center"><?php print $i ?></td>
<td><?php 
$select1 = "SELECT * FROM user WHERE u_id  = $p_uid";
$result1 = mysql_query($select1) or die("Query failed");
while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) { 
$u_nama = $row1['u_nama'];
$u_jwtgred = $row1['u_jwtgred'];
$u_jwtklas = $row1['u_jwtklas'];
$u_jwt = $row1['u_jwt'];
$u_jab = $row1['u_jab'];
$u_tel = $row1['u_tel'];
$u_emel = $row1['u_emel'];

}
echo $u_nama; 
?> </td>
<td><?php 
$select3 = "SELECT * FROM klasifikasi WHERE k_id  = $u_jwtklas";
$result3 = mysql_query($select3) or die("Query failed");
while ($row3 = mysql_fetch_array($result3, MYSQL_ASSOC)) { 
$k_code = $row3['k_code'];
}
$select4 = "SELECT * FROM gred WHERE g_id  = $u_jwtgred";
$result4 = mysql_query($select4) or die("Query failed");
while ($row4 = mysql_fetch_array($result4, MYSQL_ASSOC)) { 
$g_code = $row4['g_code'];
}
echo $k_code.$g_code ;?> </td>
<td><?php echo $u_jwt ;?> </td>
<td><?php echo $u_jab ;?> </td>
<td><?php echo $u_emel;?> </td>
<td><?php echo $u_tel;?> </td>
<td><?php 
$select2 = "SELECT * FROM status WHERE s_id  = $p_hadir";
$result2 = mysql_query($select2) or die("Query failed");
while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)) { 
$s_name = $row2['s_name'];
}
echo $s_name; 
?>  </td>
<td></td>
<td> </td>
</tr>
<?php 
$i++;
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
