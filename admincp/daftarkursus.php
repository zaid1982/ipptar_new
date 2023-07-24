<?php require_once('../Connections/coonect.php'); ?>
<? include 'adconfig.php'; ?>
<? include 'adrestric.php'; ?>
<? include 'adlogout.php'; ?>

<?php
$colname_viewad = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_viewad = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_coonect, $coonect);
$query_viewad = sprintf("SELECT * FROM a_pro WHERE ad_idstaff = '%s'", $colname_viewad);
$viewad = mysql_query($query_viewad, $coonect) or die(mysql_error());
$row_viewad = mysql_fetch_assoc($viewad);
$totalRows_viewad = mysql_num_rows($viewad);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ekursus IPPTAR</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	    
	<link rel="stylesheet" href="template/style/reset.css" media="screen,projection" type="text/css" /> 
	<link rel="stylesheet" href="template/style/style.css" media="screen,projection" type="text/css" /> 
    
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link rel="stylesheet" type="text/css" media="all" href="datepick/jsDatePick_ltr.min.css" />
    </script>	
	<script type="text/javascript" src="../validation.js"></script>
<script type="text/javascript" src="datepick/jsDatePick.min.1.3.js"></script>


<script type="text/javascript">

window.onload = function(){

		   new JsDatePick({

        useMode:2,

        target:"Tarikh Mula Kursus",

	

        dateFormat:"%d/%m/%Y",

        isStripped:false,

        selectedDate:{

            year:2011,

            month:7,

            day:16

       	},

		

        yearsRange: new Array(1971,2100),

      limitToToday:false,

		

    });



	};

	

	function date(){
		   new JsDatePick({
        useMode:2,
        target:"Tarikh Tamat Kursus",
        dateFormat:"%d/%m/%Y",

        isStripped:false,

        selectedDate:{

            year:2011,

            month:7,

            day:16

       	},
        yearsRange: new Array(1971,2100),

        limitToToday:false,

    });
	};
</script>
	<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->

    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #333333; }
-->
    </style>
</head>
<body>

<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 
	

<div id="container">

<div id="header">
	 <? include('adminheader.php');?>
</div><!-- header -->
	
		
		
		
	<div id="content" >
	
	
	
	
	
	

	<div id="main-content">

	<div id="title">
		
		<h1>DAFTAR KURSUS</h1>
	</div>
	
		
	<div class="clear"></div> 
	
	<div class="content-area holder">
	  <form id="checklist-options" method="post" action="daftarkursus_act.php">
        <div id="description"></div>
	    <div class="clear"></div>
	    <table cellspacing="0" cellpadding="0">
	      
          <tr>
            <td>&nbsp;</td>
            <td valign="top">Kod Kursus </td>
            <td valign="top">:</td>
            <td><label>
              <input name="kodkursus" id="Kod Kursus" type="text" />
            </label></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Tajuk Kursus </td>
            <td valign="top">:</td>
            <td><label>
              <input name="tajukkursus" id="Tajuk Kursus" type="text" />
            </label></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Kategori Kursus </td>
            <td valign="top">:</td>
            <td><label>
            <select name="kategori" size="7" id="select">
              <option>== Pilih Kategori Kursus ==</option>
              <option value="1">BAHAGIAN KEJURUTERAAN TV</option>
              <option value="2">BAHAGIAN RANCANGAN TV</option>
              <option value="3">BAHAGIAN KEJURUTERAAN RADIO</option>
              <option value="4">BAHAGIAN RANCANGAN RADIO</option>
              <option value="5">BAHAGIAN KEJURUTERAAN ASAS</option>
              <option value="6">BAHAGIAN PENGURUSAN TERAS DAN PEMBANGUNAN RANCANGAN</option>
              <option value="7">BAHAGIAN ICT</option>
              <option value="8">LAIN-LAIN</option>
            </select>
</label></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td><p>Tarikh Mula Kursus:</p>
              <p>
                 <input name="tarikhmula" type="text" id="Tarikh Mula Kursus" readonly="true">
              <p>Tarikh Tamat Kursus:</p>
              <p>
                 <input name="tarikhakhir" type="text" id="Tarikh Tamat Kursus" onclick ="date()" readonly="true">
                </p></td>
          </tr>
		  <tr>
            <td> </td>
            <td valign="top">Waktu Melapor  </td>
            <td valign="top">:</td>
            <td><input name="waktulapor" id="Waktu Melapor" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Kumpulan Sasaran </td>
            <td valign="top">:</td>
            <td><input name="kumpsasaran" id="Kumpulan Sasaran" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Lokasi Kursus </td>
            <td valign="top">:</td>
            <td><input name="lokasi" id="Lokasi Kursus" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Yuran</td>
            <td valign="top">:</td>
            <td><input name="yuran" id="Yuran Kursus" type="text" />
              Ringgit Malaysia Sahaja </td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Kuota Pemohon </td>
            <td valign="top">:</td>
            <td><label>
              <input name="kuota" id="Kuota Pemohon" type="text" />
            </label></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Objektif Kursus </td>
            <td valign="top">:</td>
            <td><textarea name="objektif" id="Objektif Kursus" cols="50" rows="5"></textarea></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top"> </td>
            <td valign="top"> </td>
            <td> </td>
          </tr>
          
          <tr>
            <td> </td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td> 
              <p>Penyelaras Kursus:</p></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Nama</td>
            <td valign="top">:</td>
            <td><input name="npegawai1" id="Nama Pegawai Urusetia 1" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">No. Telefon </td>
            <td valign="top">:</td>
            <td><input name="telpegawai1" id="No Telefon Pegawai Urusetia 1" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Alamat E-mel </td>
            <td valign="top">:</td>
            <td><input name="emelpegawai1" id="Emel Pegawai Urusetia 1" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top"> </td>
            <td valign="top"> </td>
            <td> </td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td> 
              <p>Penyelaras Kursus:</p>              </td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Nama</td>
            <td valign="top">:</td>
            <td><input name="npegawai2" id="Nama Pegawai Urusetia 2" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">No. Telefon </td>
            <td valign="top">:</td>
            <td><input name="telpegawai2" id="No Telefon Pegawai Urusetia 2" type="text" /></td>
          </tr>
          <tr>
            <td> </td>
            <td valign="top">Alamat E-mel </td>
            <td valign="top">:</td>
            <td><input name="emelpegawai2" id="Emel Pegawai Urusetia 2" type="text" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> 
              <label>
              <input name="krshantar" type="submit" id="button" onclick="MM_validateForm('Kod Kursus','','R','Tajuk Kursus','','R','Tarikh Mula Kursus','','R','Tarikh Tamat Kursus','','R','Waktu Melapor','','R','Kumpulan Sasaran','','R','Lokasi Kursus','','R','Yuran Kursus','','R','Kuota Pemohon','','RisNum','Nama Pegawai Urusetia 1','','R','No Telefon Pegawai Urusetia 1','','RinRangeU9:12','Emel Pegawai Urusetia 1','','RisEmail','Nama Pegawai Urusetia 2','','R','No Telefon Pegawai Urusetia 2','','RinRangeU9:12','Emel Pegawai Urusetia 2','','RisEmail','Objektif Kursus','','R');return document.MM_returnValue" value="Daftar Kursus" />
              </label></td>
          </tr>
          <tr>
            <td> </td>
            <td colspan="3"><label> </label></td>
          </tr>
	      </table>
	    <p class="cancel">&nbsp;</p>
	    </form>
	</div>
    
    
	</div><!-- main-content -->
	<div id="side-content"> <a href="adhome.php" id="feature-btn" title="Menu utama">MENU UTAMA</a>
      <h3>KURSUS SEDANG BERLANGSUNG</h3>
	  <? include('adsedangberlangsung.php');?>
	  </div>
	<!-- side-content -->
<div class="clear"></div> 






</div><!-- content -->
  
<div class="push"></div>
    
</div><!-- container -->
 
<div id="footer">

    <div id="footer-inner">
		<? include('adminfooter.php');?>
    </div>

</div>



<script src="template/js/jquery-1.4.2.min.js" type="text/javascript"></script> 
<script src="template/js/jcarousellite_1.0.1.min.js" type="text/javascript"></script>
<script src="template/js/jquery.mousewheel.min.js" type="text/javascript"></script>
<script src="template/js/jquery.easing.1.1.js" type="text/javascript"></script>
<script src="template/js/checklist-settings.js" type="text/javascript"></script>
<script src="template/js/jquery.blockUI.js" type="text/javascript"></script>
<script src="template/js/general.js" type="text/javascript"></script>

</body>
</html>
<?php
mysql_free_result($viewad);
?>