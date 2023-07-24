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

$idpermohonan=$_GET['idapp'];
mysql_select_db($database_coonect, $coonect);
$query_serapp = "SELECT costu_appid, costu_id, costu_coursecode, costu_uid,costu_numid, costu_uname, costu_status FROM costu_all where costu_appid='$idpermohonan'";
$serapp = mysql_query($query_serapp, $coonect) or die(mysql_error());
$row_serapp = mysql_fetch_assoc($serapp);
$totalRows_serapp = mysql_num_rows($serapp);

$idkursus=$row_serapp['costu_id'];
$iduser=$row_serapp['costu_numid'];
$iduserkp=$row_serapp['costu_uid'];

//echo $idkursus;
//echo $iduser;

mysql_select_db($database_coonect, $coonect);
$query_serall = "SELECT * FROM co_info, u_profile, ua_academic, win_info, costa_off where co_info.co_id='$idkursus' AND costa_off.costa_id='$idkursus' AND u_profile.u_id='$iduser' AND win_info.win_id='$iduser' AND ua_academic.ua_acd_id='$iduser'";
$serall = mysql_query($query_serall, $coonect) or die(mysql_error());
$row_serall = mysql_fetch_assoc($serall);
$totalRows_serall = mysql_num_rows($serall);




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



<style type="text/css">
<!--
.style1 {font-family: Calibri}
-->
</style>
</head>

<body>
	
    


<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript>




<div id="clouds"></div>
    
    	<div id="header"></div>
        
<form id="evaluate_form" action="pdf/adapproval_act.php" method="post" >
    
<div id="container">
<div id="project-details">
            	
            	<input class="out-of-view" title="Validation Check" style="display: none" name="important" type="text" />
            	<div id="project-website">
                
    <div class="field">
                    <label for="project-name">
                    <div align="justify"><strong>MAKLUMAT PERMOHONAN NO SIRI: <?php echo $row_serapp['costu_appid']; ?></strong></div>
                    </label><br>
                       
                       
						 <table width="743" border="0">
                          <tr>
                            <td width="733"><strong></strong></td>
                          </tr>
      </table>
					
						<table width="92%" border="0">
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col">Status Permohonan </td>
                            <td class="style1" scope="col">:</td>
                            <td scope="col"><?php echo $row_serapp['costu_status']; ?></td>
                          </tr>
                          <tr>
                            <td width="7%" scope="col"><span class="style3"></span></td>
                            <td width="18%" scope="col"><div align="center" class="style3">
                                <div align="left">No Siri Permohonan </div>
                            </div></td>
                            <td width="1%" class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td width="74%" scope="col"><?php echo $row_serapp['costu_appid']; ?></td>
                          </tr>
                          <tr>
                            <td width="7%" scope="col"><span class="style3"></span></td>
                            <td width="18%" scope="col"><div align="center" class="style3">
                                <div align="left">Tajuk Kursus </div>
                            </div></td>
                            <td width="1%" class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td width="74%" scope="col"><?php echo $row_serall['co_name']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col">ID Kursus </td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['co_id']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Kod Kursus </div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['co_coursecode']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Tarikh Mula </div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['co_sdate']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col">Tarikh Tamat </td>
                            <td class="style1" scope="col">:</td>
                            <td scope="col"><?php echo $row_serall['co_edate']; ?></td>
                          </tr>
                         
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Nama Pemohon </div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['u_name']; ?></td>
                          </tr>
 <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col">&nbsp;</td>
                            <td class="style1" scope="col">&nbsp;</td>
                            <td scope="col">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4" scope="col"><span class="style3"></span><span class="style3">
                              <label>
                              <input name="hiddenappid" type="hidden" value="<?php echo $row_serapp['costu_appid']; ?>">
							   <input name="catid" type="hidden" value="<?php echo $row_serall['co_catid']; ?>">
                              </label>
                            </span></td>
                          </tr>
                          
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><span class="style3"></span></td>
                            <td class="style3" scope="col">&nbsp;</td>
                            <td scope="col"><table width="125" border="0">
                              <tr>
                                <td width="65"><input name="lulus" type="submit" value="Lulus"></td>
                                <td width="125"><input type="submit" name="tolak" value="Tolak"></td>
                              </tr>
                            </table>
                              <label></label></td>
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
mysql_free_result($serapp);

mysql_free_result($serall);
?>
