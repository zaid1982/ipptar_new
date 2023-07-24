<?php require_once('../Connections/coonect.php'); ?>
<? include 'userconfig.php'; ?>
<? include 'userlogout.php'; ?>
<? include 'userrestric.php'; ?>


<?php
$colname_viewpro = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_viewpro = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_coonect, $coonect);
$query_viewpro = sprintf("SELECT u_name, u_idnum FROM u_profile WHERE u_idnum = '%s'", $colname_viewpro);
$viewpro = mysql_query($query_viewpro, $coonect) or die(mysql_error());
$row_viewpro = mysql_fetch_assoc($viewpro);
$totalRows_viewpro = mysql_num_rows($viewpro);

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

<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script src="../validation.js" type="text/javascript"></script>


<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-weight: bold}
-->
</style>
</head>

<body>
	
    


<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript>




<div id="clouds"></div>
    
    	<div id="header"></div>
        
<form action="pdf/usmohon_act.php" method="post" id="evaluate_form" onSubmit="MM_validateForm('Nama Penyelia','','R','Jawatan Penyelia','','R','Emel Penyelia','','R');return document.MM_returnValue" >
    
<div id="container">
<div id="project-details">
            	
            	<input class="out-of-view" title="Validation Check" style="display: none" name="important" type="text" />
            	<div id="project-website">
                
    <div class="field">
                    <label for="project-name"><strong>Maklumat Kursus: </strong></label>
                    <br>
                    <table width="92%" border="0">
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">Status Kursus </td>
            <td class="style1" scope="col">:</td>
            <td colspan="2" scope="col"><?php echo $row_uviewkatalog['co_status']; ?></td>
          </tr>
          <tr>
            <td width="11%" scope="col"><span class="style3"></span></td>
            <td width="20%" scope="col"><div align="center" class="style3">
                <div align="left">Kursus</div>
            </div></td>
            <td width="1%" class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_name']; ?></span></td>
          </tr>
		  <tr>
            <td width="11%" scope="col"><span class="style3"></span></td>
            <td width="20%" scope="col"><div align="center" class="style3">
                <div align="left">ID Kursus </div>
            </div></td>
            <td width="1%" class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_id']; ?></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">Kategori Kursus</span></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><?php echo $row_Recordset1['cat_name']; ?></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Kod Kursus</div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_coursecode']; ?></span></td>
          </tr>
		    <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Tarikh Mula </div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_sdate']; ?></span></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Tarikh Tamat </div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_edate']; ?></span></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Kumpulan Sasaran</div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_trggroup']; ?></span></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Yuran (RM)</div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_fee']; ?></span></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td valign="top" scope="col"><div align="center" class="style3">
                <div align="left">Objektif Kursus</div>
            </div></td>
            <td valign="top" class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><div align="left" class="style3">
              <p><?php echo $row_uviewkatalog['co_obj']; ?></p>
              </div></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Penyelaras Kursus</div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style2"><span class="style3"></span></div></td>
            <td colspan="2" scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">Nama</span></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['costa_off1']; ?></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">No. Telefon</span></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['costa_off1tel']; ?></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">E-mel</span></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['costa_off1mail']; ?></span></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><span class="style3"></span></td>
            <td class="style3" scope="col">&nbsp;</td>
            <td colspan="2" scope="col"><span class="style3"></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Penyelaras Kursus</div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style2"><span class="style3"></span></div></td>
            <td colspan="2" scope="col"><span class="style3"></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">Nama</span></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['costa_off2']; ?></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">No. Telefon</span></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['costa_off2tel']; ?></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">E-mel</span></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><span class="style3"><?php echo $row_uviewkatalog['costa_off2mail']; ?></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
            <td class="style3" scope="col">&nbsp;</td>
            <td colspan="2" scope="col">&nbsp;</td>
          </tr>
		  <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">Maklumat Ketua Jabatan / Penyelia</td>
            <td valign="top" class="style3" scope="col">&nbsp;</td>
            <td colspan="2" scope="col">&nbsp;</td>
          </tr>
        <div id="project-web">
		  <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">Nama Penyelia</td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><input type="text" id="Nama Penyelia" name="namapegawai"></td>
          </tr>
		  
		  <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">Jawatan Penyelia</td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><input type="text" id="Jawatan Penyelia" name="jawatanpegawai"></td>
          </tr>
		  <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">E-mel Penyelia</td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td colspan="2" scope="col"><input type="text" id="Emel Penyelia" name="emelpegawai"></td>
          </tr>
		  <tr>
		    <td scope="col">&nbsp;</td>
		    <td scope="col">&nbsp;</td>
		    <td class="style3" scope="col">&nbsp;</td>
		    <td colspan="2" scope="col">&nbsp;</td>
		    </tr>	
			
			
		  <tr>
		    <td scope="col">&nbsp;</td>
		    <td colspan="4" scope="col">Penginapan di asrama Seri IPPTAR TIDAK disediakan kepada pegawai di kawasan  Wilayah Persekutuan Kuala Lumpur dan Putrajaya. </td>
		    </tr>
	<div id="project-site">	  <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">Keperluan Asrama </td>
            <td class="style3" scope="col">:</td>
			
            <td width="29%" class="style3" scope="col"><div id="project-site"><input name="asrama" type="radio" value="YA">
            YA </div>              </td>
		   <td width="39%" class="style3" scope="col"><div id="project-site"><input name="asrama" type="radio" value="TIDAK" checked>
            TIDAK</div>              </td>
		  </tr>
					
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
            <td class="style3" scope="col">&nbsp;</td>
            <td colspan="2" scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><span class="style3"></span></td>
            <td class="style3" scope="col">&nbsp;</td>
            <td colspan="2" scope="col"><span class="style3">
              <label>
              <input type="hidden" name="idnumhidden" value="<?php echo $row_viewpro['u_idnum']; ?>">
			   <input type="hidden" name="idkurhidden" value="<?php echo $row_uviewkatalog['co_id']; ?>">
			   <input type="hidden" name="idcodehidden" value="<?php echo $row_uviewkatalog['co_coursecode']; ?>">
			   <input type="hidden" name="sdate" value="<?php echo $row_uviewkatalog['co_sdate']; ?>">
              </label>
            </span> </td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><span class="style3"></span></td>
            <td class="style3" scope="col">&nbsp;</td>
            <td colspan="2" scope="col"><button type="submit" id="add-field-btn" title="Mohon Kursus" onClick="MM_validateForm('Nama Penyelia','','R','Jawatan Penyelia','','R','Emel Penyelia','','RisEmail');return document.MM_returnValue">Mohon Kursus </button></td>
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
            
            
</div>
</form><!-- container -->



<!-- JavaScript : Include and embedded version -->
<script src="../daftar/js/jquery-1.4.2.min.js" type="text/javascript"></script> 
<script src="../daftar/js/functions.js" type="text/javascript"></script>


</body>
</html>
<?php
mysql_free_result($uviewkatalog);

mysql_free_result($Recordset1);
?>