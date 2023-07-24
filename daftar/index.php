<?php require_once('../Connections/coonect.php'); ?>
<?php
mysql_select_db($database_coonect, $coonect);
$query_Recordset1 = "SELECT ad_id FROM a_pro";
$Recordset1 = mysql_query($query_Recordset1, $coonect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html lang="en"> 
<head> 
<meta charset="utf-8" />
<title>Pendaftaran eKursus</title>
<link rel="stylesheet" href="css/daftar.css" media="screen,projection" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Economica:400,700|Open+Sans:300,700|Open+Sans+Condensed:300,700|Oswald' rel='stylesheet' type='text/css'>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script src="../validation.js" type="text/javascript"></script>
<script type="text/javascript"> question_number = 28; </script>
</head>
<body>
<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript>
<div id="wrapper">    

<header>  
    <div id="header-in">
      <div id="header-l">
     <h1> PENDAFTARAN</h1>
     </div>
     </div>
<div class="clear"></div>
<div id="header-shade"></div>
</header>


<section id="mid">
  <div id="mid-in">
     <h4>NOTA : </h4>
Anda hanya perlu membuat pendaftaran ini sekali sahaja untuk sepanjang masa. Sila isikan maklumat di bawah dengan tepat sehingga selesai dan lengkap. Pastikan anda menekan butang 'Cipta Akaun' sebagai tanda selesai mengisi borang. Butang 'Cipta Akaun' ada di bahagian bawah sekali. Sila skrol sehingga tamat. Maklumat yang disertakan ini bakal digunakan semasa anda memohon sebarang kursus yang dianjurkan oleh IPPTAR. Anda perlu login ke akaun yang berjaya anda cipta sebentar lagi jika ingin memohon sebarang kursus di IPPTAR ketika ini dan pada masa akan datang. Anda juga dinasihatkan agar mengemas kini segala butiran dari semasa ke semasa melalui profil akaun yang telah dicipta. Sila rekod dan simpan kata laluan anda untuk tujuan log masuk akaun dan memohon kursus. </div>
     <div class="hrx"></div>
</div>

<section id="content">   
<div id="content-in">
    
<form id="evaluate_form" action="reg_pro.php" method="post">
<input class="out-of-view" title="Validation Check" style="display: none" name="important" type="text" />
            
<div class="field">
    <label for="project-name">Nama Penuh:</label>
    <input name="name" type="text" id="Nama Pemohon" value="" />
</div>
                    
<div class="field">
    <label for="kp">No. Kad Pengenalan Baru (Tanpa Sengkang &quot;-&quot;):</label>
    <input name="kp" type="text" id="Kad Pengenalan" />
</div>
                    
<div class="field">
<label for="katalaluan">Kata Laluan:</label>
<input type="password" id="Kata Laluan" name="u_password" />
</div>
                    
<div class="field">
<label for="katalaluansah">Sahkan Kata Laluan:</label>
<input type="password" id="Pengesahan Kata Laluan" name="u_repassword" />
</div>
                    
<div class="field">
<label for="emel">E-mel:</label>
<input name="email" type="text" id="Emel" size="email" />
</div>
                    
 <div class="field">
 <label for="telefon">No. Telefon Bimbit:</label>
<input type="text" id="No Telefon Bimbit " name="hp" />
</div>
                    
<div class="field">
<label for="alamattetap">Alamat Tetap / Rumah:</label>
<input type="text" id="Alamat Rumah" name="alamatrumah" />
 </div>
                
<div class="field">
<label for="jabatan">Nama Jabatan:</label>
 <input type="text" id="Kementerian/Jabatan" name="offaddress" />
</div>
                    
<div class="field">
<label for="alamatpejabat">Alamat Tempat Bertugas:</label>
<input type="text" id="Tempat Bertugas Ruangan 1" name="bandarpej1" />
</div>
					
<div class="field">
<label for="alamatpejabat2">
 <input type="text" id="Tempat Bertugas Ruangan 2" name="bandarpej2" />
</label>
</div>
					
<div class="field">
<label for="poskod">Poskod:</label>
<input type="text" id="Poskod Tempat Bertugas" name="poskodpej" />
 </div>
                    
<div class="field">
 <label for="negeri">Negeri Tempat Bertugas:</label>
 <label>
 <select name="negeri">
                          <option selected>== Pilih Negeri ==</option>
                          <option value="JOHOR">Johor</option>
                          <option value="KEDAH">Kedah</option>
                          <option value="KELANTAN">Kelantan</option>

                          <option value="MELAKA">Melaka</option>
                          <option value="NEGERI SEMBILAN">Negeri Sembilan</option>
                          <option value="PAHANG">Pahang</option>
                          <option value="PERAK">Perak</option>
                          <option value="PERLIS">Perlis</option>
                          <option value="PULAU PINANG">Pulau Pinang</option>

                          <option value="SABAH">Sabah</option>
                          <option value="SARAWAK">Sarawak</option>
                          <option value="SELANGOR">Selangor</option>
                          <option value="TERENGGANU">Terengganu</option>
                          <option value="WP KUALA LUMPUR">WP Kuala Lumpur</option>
                          <option value="WP PUTRAJAYA">WP Putrajaya</option>

                          <option value="WP LABUAN">WiP Labuan</option>
</select>
</label>
</div>
					
<div class="field">
<label for="telpejabat">No. Telefon Pejabat: (Tanpa Sengkang &quot;-&quot;) Contoh: 0341436728 </label>
<input type="text" id="No Telefon Pejabat" name="telpej" />
 </div>
                    
<div class="field">
<label for="faks">No. Faks Pejabat: (Tanpa Sengkang &quot;-&quot;) Contoh: 0341436728 </label>
<input type="text" id="No Faks Pejabat" name="nofaks" />
</div>
                    
<div class="field">
<label for="jawatan">Gelaran Jawatan:</label>
<input type="text" id="Jawatan Dipegang" name="jawatan" />
</div>
                    
<div class="field">
<label for="tarafjaw">Gred Jawatan:</label>
<input type="text" id="Taraf Jawatan" name="gred" />
</div>

<div class="field">
<label for="tempoh">Tempoh Berkhidmat Dalam Jawatan: (Tahun Dalam Bentuk Digit Sahaja) Contoh:20</label>
 <input type="text" id="Tempoh Berkhidmat Dalam Jawatan" name="tempoh" />
</div>
                    
<div class="field">
<label for="tempohkerajaan">Tempoh Berkhidmat Dalam Kerajaan: (Tahun Dalam Bentuk Digit Sahaja) Contoh:20 </label>
<input type="text" id="Tempoh Berkhidmat Dalam Kerajaan" name="tempohker" />
</div>
                    
 <div class="field">
<label for="tugas">Tugas Sekarang:</label>
<input type="text" id="Tugas Sekarang" name="tugas" />
</div>

<div class="field">
<label for="tugas">Pengalaman Kerja:</label>
<input type="text" id="Pengalaman Kerja" name="pengalaman" />
</div>

<div class="field">
<label for="akedemik">Kelulusan Akademik Tertinggi:</label>
<input type="text" id="Akademik" name="ijazah" />
</div>
                    
<div class="field">
<label for="pusatakedemik">Pusat Pengajian Akademik Universiti / Kolej / Sekolah:</label>
<input type="text" id="Pusat Pengajian" name="universiti" />
</div> 
					

<div id="confirm">
<h5>Perakuan Pemohon: </h5>

<p>Sila klik pada kedua- dua kotak klik perakuan pemohon untuk meneruskan pendaftaran. </p>
<p>
<input  type="checkbox" name="checklulus" value="YA" id="Input1">
Saya telah mendapat kelulusan Ketua Jabatan apabila memohon sebarang kursus yang dijalankan oleh IPPTAR . </p>
<p> 
<input  type="checkbox" name="checkbenar" value="YA" id="Input2">
 Saya mengaku bahawa keterangan dan maklumat yang dinyatakan dalam permohonan ini adalah BENAR. </p>
</div> 


                
 <div id="checklist">
<div id="checklist-end">
<p id="max-fields" style="display:none">Max 10 fields, <span></span> remaining.</p>
<div align="center">
 <input name="hantar" type="submit" id="add-field-btn" title="Cipta Akaun Ekursus Anda" onClick="MM_validateForm('Nama Pemohon','','R','Kad Pengenalan','','RinRangeI12:12','Emel','','RisEmail','No Telefon Bimbit ','','RinRangeH10:10','Alamat Rumah','','R','Kementerian/Jabatan','','R','Tempat Bertugas Ruangan 1','','R','Tempat Bertugas Ruangan 2','','R','No Telefon Pejabat','','NinRangeO9:10','No faks Pejabat','','RinRangeO9:10','Jawatan Dipegang','','R','Taraf Jawatan','','R','Tempoh Berkhidmat Dalam Jawatan','','RisNum','Tempoh Berkhidmat Dalam Kerajaan','','RinRange1:2','Tugas Sekarang','','R','Pengalaman Kerja','','R','Akademik','','R','Pusat Pengajian','','R','Kata Laluan','','R','Pengesahan Kata Laluan','','R');return document.MM_returnValue" value="Cipta Akaun">
</div>
</div>
            
            
</form>
</div>
</section>


<!-- JavaScript : Include and embedded version -->
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script> 
<script src="js/functions.js" type="text/javascript"></script>

<footer>
<div class="credit">&copy; 2011 Hak cipta terpelihara Institut Penyiaran dan Penerangan Tun Abdul Razak | Sistem oleh : <a href="http://www.maximajuta.com.my" target="_blank"#">iZZat Network<</a></div>
</footer>
</div><!-- end wrapper -->
</body>
</html>
