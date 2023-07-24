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

$iduser=$_GET['iduser'];
mysql_select_db($database_coonect, $coonect);
$query_viewprouser = "SELECT * FROM u_profile, ua_academic, win_info where u_profile.u_id='$iduser' AND ua_academic.ua_acd_id='$iduser' AND win_info.win_id='$iduser'";
$viewprouser = mysql_query($query_viewprouser, $coonect) or die(mysql_error());
$row_viewprouser = mysql_fetch_assoc($viewprouser);
$totalRows_viewprouser = mysql_num_rows($viewprouser);

//alamat pejabat
$alamatpej1=$row_viewprouser['u_offcity']; 
$alamatpej2=$row_viewprouser['u_city']; 
$poskodpej=$row_viewprouser['u_postcode']; 
$statepej=$row_viewprouser['u_state']; 
$alamatpejabatfull=$alamatpej1.' '.$alamatpej2.' '.$poskodpej.' '.$statepej;

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
        
<form id="evaluate_form" action="" method="post">
    
<div id="container">
<div id="project-details">
            	
            	<input class="out-of-view" title="Validation Check" style="display: none" name="important" type="text" />
            	<div id="project-website">
                
    <div class="field">
                    <label for="project-name">
                    <div align="justify"><strong>MAKLUMAT PENGGUNA :</strong></div>
                    <br>
                       
                        <label>
                        </label>
<table width="652" border="0" align="center">
                          <tr>
                            <td width="51">&nbsp;</td>
                            <td width="132">Nama</td>
                            <td width="16"><span class="style1">:</span></td>
                            <td colspan="3"><?php echo $row_viewprouser['u_name']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>No.KP</td>
                            <td><span class="style1">:</span></td>
                            <td><?php echo $row_viewprouser['u_idnum']; ?></td>
                            <td>Jantina</td>
                            <td>:<?php echo $row_viewprouser['u_gender']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="top">Alamat</td>
                            <td valign="top"><span class="style1">:</span></td>
                            <td colspan="3"><?php echo $row_viewprouser['u_address']; ?></td>
                          </tr>
                         <tr>
                            <td>&nbsp;</td>
                            <td>Alamat Emel </td>
                            <td><span class="style1">:</span></td>
                            <td width="197"><?php echo $row_viewprouser['u_email']; ?></td>
                            <td width="100"><span class="style1">No. Tel ( HP ) </span></td>
                            <td width="130"><span class="style1">:</span><?php echo $row_viewprouser['u_telhp']; ?></td>
        </tr>
                           <tr>
                            <td>&nbsp;</td>
                            <td>Jawatan  </td>
                            <td><span class="style1">:</span></td>
                            <td colspan="3"><?php echo $row_viewprouser['win_pos']; ?></td>
                          </tr>
                           <tr>
                             <td>&nbsp;</td>
                             <td>Gred Jawatan </td>
                             <td>:</td>
                             <td colspan="3"><?php echo $row_viewprouser['win_gred']; ?></td>
                           </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Kementerian/Jabatan</td>
                            <td><span class="style1">:</span></td>
                            <td colspan="3"><?php echo $row_viewprouser['u_offaddress']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="top">Alamat Tempat Bertugas </td>
                            <td valign="top">:</td>
                            <td colspan="3" valign="top"><?php echo $alamatpejabatfull; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>No. Tel (Pej) </td>
                            <td><span class="style1">:</span></td>
                            <td><?php echo $row_viewprouser['u_offnum']; ?></td>
                            <td>No. Faks (Pej) </td>
                            <td>:<?php echo $row_viewprouser['u_offfaks']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="top">Tempoh Berhidmat Dalam Jawatan </td>
                            <td valign="top"><span class="style1">:</span></td>
                            <td colspan="3" valign="top"><?php echo $row_viewprouser['win_nowtime']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="top">Tempoh Berhidmat Dalam Kerajaan </td>
                            <td valign="top"><span class="style1">:</span></td>
                            <td colspan="3" valign="top"><?php echo $row_viewprouser['win_govtime']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Taraf Akademik </td>
                            <td><span class="style1">:</span></td>
                            <td colspan="3"><?php echo $row_viewprouser['ua_unicourse']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="middle">Universiti/Kolej</td>
                            <td valign="top">:</td>
                            <td colspan="3" valign="top"><?php echo $row_viewprouser['ua_uni']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="middle">Tugas Sekarang </td>
                            <td valign="top">:</td>
                            <td colspan="3" valign="top"><?php echo $row_viewprouser['win_descpos']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="middle">Pengalaman Kerja </td>
                            <td valign="top">:</td>
                            <td colspan="3" valign="top"><?php echo $row_viewprouser['win_exp']; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td valign="middle"><p>Kata Laluan </p>                            </td>
                            <td valign="top"><span class="style1">:</span></td>
                            <td colspan="3" valign="top"><?php echo $row_viewprouser['u_pwd']; ?></td>
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



<!-- JavaScript : Include and embedded version -->
<script src="../daftar/js/jquery-1.4.2.min.js" type="text/javascript"></script> 
<script src="../daftar/js/functions.js" type="text/javascript"></script>


</body>
</html>
<?php
mysql_free_result($viewprouser);
mysql_free_result($viewad);

?>