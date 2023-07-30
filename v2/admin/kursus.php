<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="data/favicon.ico" >
<link rel="icon" type="image/gif" href="data/animated_favicon1.gif" >
<title>Profil</title>
<link rel="stylesheet" type="text/css" href="../data/style.css">
</head>
<body>
<div id="container">
<?php
#include("header.php");
include("../conn.php");

if(isset($_POST['idnum'])){

$sql = "INSERT INTO user (u_idnum,u_nama,u_jantina,u_dob,u_tel,u_jwt,u_jwttingkat,u_jwtklas,u_jwtgred,u_jwttaraf,u_jkhidmat,u_tkhlantik,u_emel,u_knama,u_kjwt,u_kemel,u_alamatkjab,u_jab,u_jabaddr1,u_jabaddr2,u_jabpkod,u_jabbandar,u_jabnegeri,u_jabtel,u_jabfax)
VALUES ('$_POST[idnum]', '$_POST[nama]', '$_POST[jantina]', '$_POST[tlhari].$_POST[tlbulan].$_POST[tltahun]','$_POST[tel]','$_POST[jawatan]','$_POST[peringkat]','$_POST[klasifikasi]','$_POST[gred]','$_POST[taraf]','$_POST[khidmat]','$_POST[hari_lantik].$_POST[bulan_lantik].$_POST[tahun_lantik]','$_POST[emel]','$_POST[ketua]','$_POST[ketuajwt]','$_POST[ketuaemel]''$_POST[jab]','$_POST[jabaddr1]','$_POST[jabaddr2]','$_POST[jabpkod]','$_POST[jabbandar]','$_POST[jabnegeri]','$_POST[jabnegeri]','$_POST[jabtel]','$_POST[jabfax]')";
$result = mysql_query($sql) or die(mysql_error());

}else{
	
$select = "
SELECT *
FROM user
WHERE u_idnum LIKE '%$_GET[idnum]%'
ORDER BY u_id ASC
";
$result = mysql_query($select) or die("Query failed");
$row = mysql_fetch_assoc($result);

}
?>
<div id="content"> 

<strong><p>Profil</p></strong>

<form id="form1" name="form1" method="post" action="">
<table width="100%" border="0" cellpadding="3" cellspacing="0">
<!--
<tr>
<td colspan="4" align="left"><p>PERHATIAN : </p>
<ul>
<li>Tidak menggunakan simbol seperti<span class="style11 style12"> '</span>,<span class="style11 style12"> &amp;</span>,<span class="style11 style12">*</span>,<span class="style11 style12">"</span>,<span class="style11 style12">$</span> dan<span class="style11 style12"> %</span> untuk mengelakkan maklumat kemaskini anda terjejas </li>
</ul>
</td>
</tr>
-->
<tr><td colspan="4" align="center">Maklumat Pemohon</td></tr>
<tr>
<td colspan="2" align="right"><strong>No K/P Baru : </strong></td>
<td colspan="2" align="left" valign="middle">&nbsp;<input type="text" name="idnum" id="idnum" value="<?php print $row['u_idnum'] ?>" size="12" maxlength="12" onfocus="this.blur()" readonly="True/"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Nama : </strong></td>
<td colspan="2" align="left" valign="middle">&nbsp;<input type="text" name="nama" id="nama" value="<?php print $row['u_nama'] ?>" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Jantina: </strong></td>
<td colspan="2">&nbsp;<select name="jantina"><option value="">&lt;-- Select --&gt;</option><option value="Lelaki" selected="">Lelaki</option><option value="Perempuan">Perempuan</option></select></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Tarikh Lahir : </strong></td>
<td colspan="2">&nbsp;
<select name="tlhari">
<option value="">---</option>
<option value="1" selected="">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>    </select>
<select name="tlbulan">
<option value="">-----</option>
<option value="JAN">JAN</option><option value="FEB">FEB</option><option value="MAR">MAR</option><option value="APR">APR</option><option value="MAY">MAY</option><option value="JUN">JUN</option><option value="JUL" selected="">JUL</option><option value="AUG">AUG</option><option value="SEP">SEP</option><option value="OCT">OCT</option><option value="NOV">NOV</option><option value="DEC">DEC</option></select>
<input type="text" name="tltahun" id="tltahun" value="" size="8" maxlength="4">
</td>
</tr>
<tr>
<td colspan="2" align="right"><strong>No Telefon Bimbit :</strong></td>
<td colspan="2">&nbsp;<input type="text" name="tel" id="tel" value="" size="15" maxlength="11" onchange="javascript:this.value=this.value.toUpperCase()" onkeyup="javascript:this.value=this.value.toUpperCase()"></td>
</tr>

<tr><td colspan="4" align="center">Maklumat Perkhidmatan</td></tr>
<tr>
<td colspan="2" align="right"><strong>Jawatan : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="jawatan" id="jawatan" value="" size="60" onkeyup="javascript:this.value=this.value.toUpperCase()" onchange="javascript:this.value=this.value.toUpperCase()"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Peringkat : </strong></td>
<td colspan="2">&nbsp;<select name="peringkat"><option value="">&lt;- Select -&gt;</option><option value="Kumpulan Pengurusan Tertinggi">Kumpulan Pengurusan Tertinggi</option><option value="Kumpulan Pengurusan Dan Profesional" selected="">Kumpulan Pengurusan Dan Profesional</option><option value="Kumpulan Sokongan">Kumpulan Sokongan</option><option value="Lain-lain">Lain-lain</option></select></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Klasifikasi Perkhidmatan : </strong></td>
<td colspan="2">&nbsp;<select name="klasifikasi"><option value="">&lt;- Select -&gt;</option><option value="(A) Pengangkutan">(A) Pengangkutan</option><option value="(B) Bakat dan Seni">(B) Bakat dan Seni</option><option value="(C) Sains">(C) Sains</option><option value="(D) Pendidikan">(D) Pendidikan</option><option value="(E) Ekonomi">(E) Ekonomi</option><option value="(F) Teknologi Maklumat" selected="">(F) Teknologi Maklumat</option><option value="(G) Pertanian">(G) Pertanian</option><option value="(H) Kemahiran">(H) Kemahiran</option><option value="(J) Kejuruteraan">(J) Kejuruteraan</option><option value="(K) Keselamatan dan Bomba">(K) Keselamatan dan Bomba</option><option value="(L) Perundangan">(L) Perundangan</option><option value="(M) Tadbir dan Diplomatik">(M) Tadbir dan Diplomatik</option><option value="(N) Pentadbiran">(N) Pentadbiran</option><option value="Pencegahan">Pencegahan</option><option value="(Q) Penyelidikan,Pembangunan dan Inovasi">(Q) Penyelidikan,Pembangunan dan Inovasi</option><option value="(S) Sosial dan Kerohanian">(S) Sosial dan Kerohanian</option><option value="(U) Perubatan dan Kesihatan">(U) Perubatan dan Kesihatan</option><option value="(W) Kewangan">(W) Kewangan</option><option value="(X) Penguatkuasaan Maritim">(X) Penguatkuasaan Maritim</option><option value="(Y) Polis Diraja Malaysia">(Y) Polis Diraja Malaysia</option><option value="(ZA) Angkatan Tentera Malaysia">(ZA) Angkatan Tentera Malaysia</option><option value="Lain-lain">Lain-lain</option></select></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Gred Jawatan : </strong></td>
<td colspan="2">&nbsp;<select name="gred"><option value="">&lt;- Select -&gt;</option><option value="Gred 01">Gred 01</option><option value="Gred 02">Gred 02</option><option value="Gred 03">Gred 03</option><option value="Gred 04">Gred 04</option><option value="Gred 05">Gred 05</option><option value="Gred 06">Gred 06</option><option value="Gred 07">Gred 07</option><option value="Gred 08">Gred 08</option><option value="Gred 09">Gred 09</option><option value="Gred 10">Gred 10</option><option value="Gred 11 [Gred 5-1]">Gred 11 [Gred 5-1]</option><option value="Gred 12">Gred 12</option><option value="Gred 13">Gred 13</option><option value="Gred 14 [Gred 5-2]">Gred 14 [Gred 5-2]</option><option value="Gred 15">Gred 15</option><option value="Gred 16 [Gred 5-3]">Gred 16 [Gred 5-3]</option><option value="Gred 17 [Gred 4-1]">Gred 17 [Gred 4-1]</option><option value="Gred 18">Gred 18</option><option value="Gred 19 [Gred 4-2]">Gred 19 [Gred 4-2]</option><option value="Gred 20">Gred 20</option><option value="Gred 21">Gred 21</option><option value="Gred 22 [Gred 4-3]">Gred 22 [Gred 4-3]</option><option value="Gred 23">Gred 23</option><option value="Gred 24 [Gred 4-4]">Gred 24 [Gred 4-4]</option><option value="Gred 25">Gred 25</option><option value="Gred 26 [Gred 4-5]">Gred 26 [Gred 4-5]</option><option value="Gred 27 [Gred 3-1]">Gred 27 [Gred 3-1]</option><option value="Gred 28">Gred 28</option><option value="Gred 29 [Gred 2-1]">Gred 29 [Gred 2-1]</option><option value="Gred 30">Gred 30</option><option value="Gred 31">Gred 31</option><option value="Gred 32 [Gred 2-2/3-2]">Gred 32 [Gred 2-2/3-2]</option><option value="Gred 33">Gred 33</option><option value="Gred 34 [Gred 2-3/3-3]">Gred 34 [Gred 2-3/3-3]</option><option value="Gred 35">Gred 35</option><option value="Gred 36 [Gred 2-4/3-4]">Gred 36 [Gred 2-4/3-4]</option><option value="Gred 37">Gred 37</option><option value="Gred 38 [Gred 2-5]">Gred 38 [Gred 2-5]</option><option value="Gred 39">Gred 39</option><option value="Gred 40 [Gred 2-6]">Gred 40 [Gred 2-6]</option><option value="Gred 41 [Gred 1-1]" selected="">Gred 41 [Gred 1-1]</option><option value="Gred 42">Gred 42</option><option value="Gred 43">Gred 43</option><option value="Gred 44 [Gred 1-2]">Gred 44 [Gred 1-2]</option><option value="Gred 45">Gred 45</option><option value="Gred 46">Gred 46</option><option value="Gred 47">Gred 47</option><option value="Gred 48 [Gred 1-4]">Gred 48 [Gred 1-4]</option><option value="Gred 49">Gred 49</option><option value="Gred 50">Gred 50</option><option value="Gred 51">Gred 51</option><option value="Gred 52 [Gred 1-5]">Gred 52 [Gred 1-5]</option><option value="Gred 53">Gred 53</option><option value="Gred 54 [Gred 1-6]">Gred 54 [Gred 1-6]</option><option value="Gred 55">Gred 55</option><option value="VK5">VK5</option><option value="VK6">VK6</option><option value="VK7">VK7</option><option value="KSN">KSN</option><option value="Gred Utama Turus I">Gred Utama Turus I</option><option value="Gred Utama Turus II">Gred Utama Turus II</option><option value="Gred Utama Turus III">Gred Utama Turus III</option><option value="VU5">VU5</option><option value="VU6">VU6</option><option value="VU7">VU7</option><option value="Lain-Lain">Lain-Lain</option></select></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Taraf Perjawatan : </strong></td>
<td colspan="2">&nbsp;<select name="taraf"><option value="">&lt;- Select -&gt;</option><option value="Dalam Percubaan">Dalam Percubaan</option><option value="Tetap" selected="">Tetap</option><option value="Kontrak">Kontrak</option><option value="Sementara">Sementara</option><option value="Lain-lain">Lain-lain</option></select></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Jenis Perkhidmatan : </strong></td>
<td colspan="2">&nbsp;<select name="khidmat"><option value="">&lt;- Select -&gt;</option><option value="Perkhidmatan Awam Persekutuan">Perkhidmatan Awam Persekutuan</option><option value="Kerajaan Tempatan">Kerajaan Tempatan</option><option value="Negeri">Negeri</option><option value="Badan Berkanun" selected="">Badan Berkanun</option><option value="Lain-Lain">Lain-Lain</option></select></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Tarikh Lantikan Ke Jawatan Ini : </strong></td>
<td colspan="2">&nbsp;<select name="hari_lantik"><option value="">---</option><option value="1" selected="">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>    </select>
<select name="bulan_lantik"><option value="">-----</option><option value="JAN">JAN</option><option value="FEB">FEB</option><option value="MAR" selected="">MAR</option><option value="APR">APR</option><option value="MAY">MAY</option><option value="JUN">JUN</option><option value="JUL">JUL</option><option value="AUG">AUG</option><option value="SEP">SEP</option><option value="OCT">OCT</option><option value="NOV">NOV</option><option value="DEC">DEC</option>      </select>
<strong><input name="tahun_lantik" type="text" id="tahun_lantik" value="2008" size="8" maxlength="4"></strong>
</td>
</tr>
<tr>
<td colspan="2" align="right"><strong>E-mel : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="emel" id="emel" value="" size="40"></td>
</tr>
<tr><td colspan="4" align="center">Maklumat Pegawai Yang Meluluskan (Pegawai Penyelia) </td></tr>
<tr>
<td colspan="2" align="right"><strong>Nama : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="ketua" id="ketua" value="" size="50"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Jawatan : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="ketuajwt" id="ketuajwt" maxlength="50" value="" size="50"> ( Contoh: Pengarah, Ketua Unit, Setiausaha dll)</td>
</tr>
<tr>
<td colspan="2" align="right"><strong>E-mel  : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="ketuaemel" id="ketuaemel" value="" size="40"></td>
</tr>
<tr><td colspan="4" align="center">Maklumat Tempat Bertugas</td></tr>
<tr>
<td colspan="2" align="right"><strong>Nama Jabatan : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="jab" id="jab" value="" size="70"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Alamat Jabatan: </strong></td>
<td colspan="2">&nbsp;<input type="text" name="jabaddr1" id="jabaddr1" value="" size="80"></td>
</tr>
<tr>
<td colspan="2" align="right"></td>
<td colspan="2">&nbsp;<input type="text" name="jabaddr2" id="jabaddr2" value="" size="80"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Poskod : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="jabpkod" id="jabpkod" value="" size="7"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Bandar : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="jabbandar" id="jabbandar" value="" size="30"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>Negeri : </strong></td>
<td colspan="2">&nbsp;<select name="jabnegeri"><option value="">&lt;- Select -&gt;</option><option value="JOHOR">JOHOR</option><option value="KEDAH">KEDAH</option><option value="KELANTAN">KELANTAN</option><option value="MELAKA">MELAKA</option><option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option><option value="PAHANG">PAHANG</option><option value="PERAK">PERAK</option><option value="PERLIS">PERLIS</option><option value="PULAU PINANG">PULAU PINANG</option><option value="SELANGOR">SELANGOR</option><option value="TERENGGANU">TERENGGANU</option><option value="SABAH">SABAH</option><option value="SARAWAK">SARAWAK</option><option value="W. P. KUALA LUMPUR" selected="">W. P. KUALA LUMPUR</option><option value="W.P. LABUAN">W.P. LABUAN</option><option value="W.P. PUTRAJAYA">W.P. PUTRAJAYA</option><option value="LUAR NEGARA">LUAR NEGARA</option><option value="LAIN-LAIN">LAIN-LAIN</option></select></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>No Telefon Pejabat: </strong></td>
<td colspan="2">&nbsp;<input type="text" name="jabtel" id="jabtel" value="" size="15" maxlength="12"></td>
</tr>
<tr>
<td colspan="2" align="right"><strong>No Fax Pejabat : </strong></td>
<td colspan="2">&nbsp;<input type="text" name="jabfax" id="jabfax" value="" size="15" maxlength="12"></td>
</tr>
</table>
<!--
<table width="100%" border="0" align="center">
<tr>
<td width="100%"><hr size="1"></td>
</tr>
<tr>
<td align="center">
<input type="submit" name="button" id="button" value="Hantar">
<input type="button" name="button2" id="button2" value="  Batal  " onclick="window.location=&#39;index.php&#39;">
</td>
</tr>
</table>
-->
</form>

</div><!--close content-->

<?php
include("footer.php");
?>