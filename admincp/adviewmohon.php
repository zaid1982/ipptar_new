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
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->



</head>

<body>
	
    


<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript>




<div id="clouds"></div>
    
    	<div id="header"></div>
        
<form id="evaluate_form" action="" method="post">
    
<div id="container">
<div id="project-details">
            	
            	<input class="out-of-view" title="Validation Check" style="display: none" name="important" type="text" />
            	<div id="project-website">
                
    <div class="field">
                    <label for="project-name">
                    <div align="justify">Sila isikan maklumat dibawah dengan tepat sehingga selesai dan lengkap. Pastikan anda menekan butang 'Cipta Akaun' sebagai </div>
                    </label><br>
                       
                        <label>
						 <table width="743" border="0">
                          <tr>
                            <td width="733">&nbsp;</td>
                          </tr>
      </table>
						</label>
						<table width="92%" border="0">
          <tr>
            <td width="7%" scope="col"><span class="style3"></span></td>
            <td width="18%" scope="col"><div align="center" class="style3">
                <div align="left">Kursus</div>
            </div></td>
            <td width="1%" class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td width="74%" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_name']; ?></span></td>
          </tr>
		  <tr>
            <td width="7%" scope="col"><span class="style3"></span></td>
            <td width="18%" scope="col"><div align="center" class="style3">
                <div align="left">ID Kursus </div>
            </div></td>
            <td width="1%" class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td width="74%" scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_id']; ?></span></td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">Kategori kursus</span></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td scope="col"><?php echo $row_Recordset1['cat_name']; ?></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Kod kursus</div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_coursecode']; ?></span></td>
          </tr>
		    <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Tarikh Mula </div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_sdate']; ?></span></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><div align="center" class="style3">
                <div align="left">Tarikh Tamat </div>
            </div></td>
            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
            <td scope="col"><span class="style3"><?php echo $row_uviewkatalog['co_edate']; ?></span></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><span class="style3"></span></td>
            <td class="style3" scope="col">&nbsp;</td>
            <td scope="col"><span class="style3">
              <label></label>
            </span> </td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><span class="style3"></span></td>
            <td class="style3" scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
          </tr>
      </table>

    </div>
                    
                    </div>
                <!-- project-website -->
                
               
            
</div><!-- project-details -->
            
            <div id="checklist">
            	
            	
            
			<div id="checklist-end">
            
            	
                
                <p id="max-fields" style="display:none">Max 10 fields, <span></span> remaining.</p>
            
            	<a  type="submit" title="Cipta Akuan Ekursus Anda" id="add-field-btn">Cipta Akuan Ekursus Anda</a>
                
              
            
            </div>
            
            
</div><!-- container -->



<!-- JavaScript : Include and embedded version -->
<script src="../daftar/js/jquery-1.4.2.min.js" type="text/javascript"></script> 
<script src="../daftar/js/functions.js" type="text/javascript"></script>


</body>
</html>
<?php
mysql_free_result($uviewkatalog);

mysql_free_result($Recordset1);
?>