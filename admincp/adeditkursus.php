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


$idkursus=$_GET['idkur'];
mysql_select_db($database_coonect, $coonect);
$query_uviewkatalog = "SELECT * FROM co_info, costa_off, cat_category where co_info.co_id='$idkursus' AND costa_off.costa_id='$idkursus'";
$uviewkatalog = mysql_query($query_uviewkatalog, $coonect) or die(mysql_error());
$row_uviewkatalog = mysql_fetch_assoc($uviewkatalog);
$totalRows_uviewkatalog = mysql_num_rows($uviewkatalog);
$catid=$row_uviewkatalog['co_catid'];

mysql_select_db($database_coonect, $coonect);
$query_Recordset1 = "SELECT cat_category.cat_id, cat_category.cat_name FROM cat_category where cat_category.cat_id='$catid'";
$Recordset1 = mysql_query($query_Recordset1, $coonect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Sistem Permohonan Kursus IPPTAR</title>


<meta name="description" content="Cipta akaun EKursus IPPTAR." />
<meta name="keywords" content="EKursus IPPTAR" />
<meta name="author" content="EKursus IPPTAR" />

<!-- Favicon -->
<link rel="shortcut icon" href="../daftar/favicon.ico" />

<!-- CSS -->
<link rel="stylesheet" href="../daftar/reset.css" media="screen,projection" type="text/css" />
<link rel="stylesheet" href="../daftar/styleshortfield.css" media="screen,projection" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="datepick/jsDatePick_ltr.min.css" />
 </script>	
<script type="text/javascript" src="datepick/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="../validation.js"></script>

<script type="text/javascript">

	window.onload = function(){

		   new JsDatePick({

        useMode:2,

        target:"inputField",

	

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
        target:"tarikhtamat",
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
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


</head>

<body>
	
    


<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript>




<div id="clouds"></div>
    
    	<div id="header"></div>
        
<form id="evaluate_form" action="adeditkursus_act.php" method="post" >
    
<div id="container">
<div id="project-details">
            	
            	<input class="out-of-view" title="Validation Check" style="display: none" name="important" type="text" />
            	<div id="project-website">
                
    <div class="field">
                    <label for="project-name"><strong>KEMASKINI MAKLUMAT KURSUS: <?php echo $row_uviewkatalog['co_name']; ?></strong></label>
                    <br>
                    <table width="635" border="0" align="center">
                          <tr>
                            <td width="11">&nbsp;</td>
                            <td width="175">&nbsp;</td>
                            <td width="5">&nbsp;</td>
                            <td width="426">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4"><strong>Maklumat Kursus </strong></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Tajuk Kursus </td>
                            <td>:</td>
                            <td><label>
                              <input name="tajukkursus" id="Tajuk Kursus" type="text" value="<?php echo $row_uviewkatalog['co_name']; ?>" />
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Tarikh Mula Kursus </td>
                            <td>:</td>
                            <td><input name="tarikhmula" type="text" id="inputField" value="<?php echo $row_uviewkatalog['co_sdate']; ?>" readonly> </td>
                          </tr>
						   <tr>
                            <td>&nbsp;</td>
                            <td>Tarikh Tamat Kursus </td>
                            <td>:</td>
                            <td><input name="tarikhakhir" type="text" id="tarikhtamat" onClick="date()" value="<?php echo $row_uviewkatalog['co_edate']; ?>" readonly></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Kumpulan Sasaran </td>
                            <td>:</td>
                            <td><input name="kumpsasaran" id="Kumpulan Sasaran" type="text" value="<?php echo $row_uviewkatalog['co_trggroup']; ?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Lokasi Kursus </td>
                            <td>:</td>
                            <td><input name="lokasi" id="Lokasi Kursus" type="text" value="<?php echo $row_uviewkatalog['co_loc']; ?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Yuran</td>
                            <td>:</td>
                            <td><input name="yuran" id="Yuran" type="text" value="<?php echo $row_uviewkatalog['co_fee']; ?>" />
                              Ringgit Malaysia Sahaja </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Kuota Pemohon </td>
                            <td>:</td>
                            <td><label>
                              <input name="kuota" id="Kuota Pemohon" type="text" value="<?php echo $row_uviewkatalog['co_quo']; ?>" />
                            </label></td>
                          </tr>
						  <tr>
                            <td>&nbsp;</td>
                            <td>Waktu Melapor  </td>
                            <td>:</td>
                            <td><label>
                              <input name="melapor" id="Waktu Melapor" type="text" value="<?php echo $row_uviewkatalog['co_waktulapor']; ?>" />
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="top">Kategori Kursus </td>
                            <td>:</td>
                            <td><select name="kategori" size="7" id="select" value="<?php echo $row_uviewkatalog['co_catid']; ?>" >
                              <option>== Pilih Kategori Kursus ==</option>
                              <option value="1">BAHAGIAN KEJURUTERAAN TV</option>
                              <option value="2">BAHAGIAN RANCANGAN TV</option>
                              <option value="3">BAHAGIAN KEJURUTERAAN RADIO</option>
                              <option value="4">BAHAGIAN RANCANGAN RADIO</option>
                              <option value="5">BAHAGIAN KEJURUTERAAN ASAS</option>
                              <option value="6">BAHAGIAN PENGURUSAN TERAS DAN PEMBANGUNAN RANCANGAN</option>
                              <option value="7">BAHAGIAN ICT</option>
                              <option value="8">LAIN-LAIN</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="top">Objektif Kursus </td>
                            <td valign="top">&nbsp;</td>
                            <td><textarea name="objektif" id="Objektif Kursus" cols="50" rows="5"><?php echo $row_uviewkatalog['co_obj']; ?></textarea></td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Penyelaras Kursus</td>
                            <td>:</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input name="npegawai1" id="Nama Pegawai Urusetia 1" type="text" value="<?php echo $row_uviewkatalog['costa_off1']; ?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>No. Telefon </td>
                            <td>:</td>
                            <td><input name="telpegawai1" id="No Tel Urusetia 1" type="text" value="<?php echo $row_uviewkatalog['costa_off1tel']; ?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>E-mel </td>
                            <td>:</td>
                            <td><input name="emelpegawai1" id="Emel Urusetia 1" type="text" value="<?php echo $row_uviewkatalog['costa_off1mail']; ?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Penyelaras Kursus</td>
                            <td>:</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input name="npegawai2" id="Nama Pegawai Urusetia 2" type="text" value="<?php echo $row_uviewkatalog['costa_off2']; ?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>No. Telefon </td>
                            <td>:</td>
                            <td><input name="telpegawai2" id="No Tel Urusetia 2" type="text" value="<?php echo $row_uviewkatalog['costa_off2tel']; ?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>E-mel </td>
                            <td>:</td>
                            <td><input name="emelpegawai2" id="Emel Urusetia 2" type="text" value="<?php echo $row_uviewkatalog['costa_off2mail']; ?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><input name="carryid" type="hidden" value="<?php echo $row_uviewkatalog['co_id'];?>" /></td>
                            <td>&nbsp;</td>
                          <td><input name="catid" type="hidden" value="<?php echo $row_uviewkatalog['co_catid'];?>" />                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3"><label>
                              <input name="krsup" type="submit" onClick="MM_validateForm('Tajuk Kursus','','R','Kumpulan Sasaran','','R','Lokasi Kursus','','R','Yuran','','RisNum','Kuota Pemohon','','RisNum','Nama Pegawai Urusetia 1','','R','No Tel Urusetia 1','','RinRangeA9:11','Emel Urusetia 1','','RisEmail','Nama Pegawai Urusetia 2','','R','No Tel Urusetia 2','','RinRangeA9:11','Emel Urusetia 2','','RisEmail','Objektif Kursus','','R');return document.MM_returnValue" value="Kemas Kini" />
                            </label></td>
                          </tr>
        </table>
    </div>
                    
    </div>
                <!-- project-website -->
                
               
            
</div><!-- project-details -->
            
            <div id="checklist">
            	
            	
            
			<div id="checklist-end">
            
            	
                
                <p id="max-fields" style="display:none">Max 10 fields, <span></span> remaining.</p>
            
           	  </div>
            
            
</div><!-- container -->

 </form> 

<!-- JavaScript : Include and embedded version -->
<script src="../daftar/js/jquery-1.4.2.min.js" type="text/javascript"></script> 
<script src="../daftar/js/functions.js" type="text/javascript"></script>


</body>
</html>
<?php
mysql_free_result($uviewkatalog);
mysql_free_result($viewad);
mysql_free_result($Recordset1);
?>