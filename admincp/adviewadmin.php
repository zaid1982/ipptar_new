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

$idad = addslashes($_GET['idad']);
mysql_select_db($database_coonect, $coonect);
$query_infoad = "SELECT * FROM a_pro where ad_id='$idad'";
$infoad = mysql_query($query_infoad, $coonect) or die(mysql_error());
$row_infoad = mysql_fetch_assoc($infoad);
$totalRows_infoad = mysql_num_rows($infoad);


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
        
<form id="evaluate_form" action="adviewadmin_act.php" method="post" >
    
<div id="container">
<div id="project-details">
            	
            	<input class="out-of-view" title="Validation Check" style="display: none" name="important" type="text" />
            	<div id="project-website">
                
    <div class="field">
                    <label for="project-name">
                    <strong>MAKLUMAT ADMIN :                    <?php echo $row_infoad['ad_id']; ?></strong></label>
                    <br>
                       
                       
						 <table width="743" border="0">
                          <tr>
                            <td width="733">&nbsp;</td>
                          </tr>
      </table>
						
						<table width="573" border="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>Status</td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_status']; ?></td>
                          </tr>
                          <tr>
                            <td width="24">&nbsp;</td>
                            <td width="97">Nama</td>
                            <td width="8">:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_name']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Jawatan Sekarang </td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_pos']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Gred Jawatan </td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_gred']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_department']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>No.K.Pengenalan</td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_ic']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Emel</td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_email']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>No.Tel (Hp) </td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_telhp']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>No.Tel (Pejabat) </td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_teloff']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Tahap Akses</td>
                            <td>:</td>
                            <td colspan="3"><?php echo $row_infoad['ad_akses']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="3"><label>
                              <input name="hiddenid" type="hidden" value="<?php echo $row_infoad['ad_id']; ?>">
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="3"><table width="319" border="0">
                              <tr>
                                <td width="178" height="57"><label>
                                <input type="submit" name="TidakAktif" value="Tidak Aktif">
                                </label></td>
                                <td width="125"><label>
                                  <input type="submit" name="Aktifkan" value="Aktifkan Akaun">
                                </label></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="5"><label></label>                            </td>
                          </tr>
                        </table>
						<p>&nbsp;</p>
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
mysql_free_result($infoad);
mysql_free_result($viewad);

?>