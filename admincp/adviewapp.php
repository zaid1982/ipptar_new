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

$idpermohonan = addslashes($_GET['idapp']);
mysql_select_db($database_coonect, $coonect);
$query_serapp = "SELECT * FROM costu_all where costu_appid='$idpermohonan'";
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
$cat=$row_serall['co_catid'];

//alamat pejabat
$alamatpej1=$row_serall['u_offcity']; 
$alamatpej2=$row_serall['u_city']; 
$poskodpej=$row_serall['u_postcode']; 
$statepej=$row_serall['u_state']; 
$alamatpejabatfull=$alamatpej1.' '.$alamatpej2.' '.$poskodpej.' '.$statepej;

mysql_select_db($database_coonect, $coonect);
$query_category = "SELECT cat_id, cat_name FROM cat_category where cat_id='$cat'";
$category = mysql_query($query_category, $coonect) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);




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
.style2 {font-weight: bold}
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
                    <div align="justify"><strong>MAKLUMAT PERMOHONAN NO SIRI: <?php echo $row_serapp['costu_appid']; ?></strong></div>
                    <table width="743" border="0">
                          <tr>
                            <td width="733"><strong><a href="adviewapp.php?idapp=<?php echo $row_serapp['costu_appid']; ?> & page=1">Papar Maklumat Pemohon</a> | <a href="adviewapp.php?idapp=<?php echo $row_serapp['costu_appid']; ?> & page=2"">Papar maklumat kursus / Permohonan </a> </strong></td>
                          </tr>
      </table>
						</label>
						<? 
						$page= addslashes($_GET['page']);
						if ($page=="2") {?>
						<table width="92%" border="0">
                          <tr>
                            <td width="7%" scope="col"><span class="style3"></span></td>
                            <td width="18%" scope="col"><div align="center" class="style3">
                                <div align="left">Kursus</div>
                            </div></td>
                            <td width="1%" class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td width="74%" scope="col"><?php echo $row_serall['co_name']; ?></td>
                          </tr>
                          <tr>
                            <td width="7%" scope="col"><span class="style3"></span></td>
                            <td width="18%" scope="col"><div align="center" class="style3">
                                <div align="left">ID Kursus </div>
                            </div></td>
                            <td width="1%" class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td width="74%" scope="col"><?php echo $row_serall['co_id']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col"><span class="style3">Kategori Kursus</span></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_category['cat_name']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Kod Kursus</div>
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
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Tarikh Tamat </div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['co_edate']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Kumpulan Sasaran</div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['co_trggroup']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Yuran(RM)</div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['co_fee']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Objektif Kursus</div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><div align="left" class="style3"><?php echo $row_serall['co_obj']; ?></div></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col">&nbsp;</td>
                            <td class="style1" scope="col">&nbsp;</td>
                            <td scope="col">&nbsp;</td>
                          </tr>
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Penyelaras Kursus</div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style2"><span class="style3"></span></div></td>
                            <td scope="col">&nbsp;</td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col"><span class="style3">Nama</span></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['costa_off1']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col"><span class="style3">No. Telefon</span></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['costa_off1tel']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col"><span class="style3">Emel</span></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['costa_off1mail']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col"><span class="style3"></span></td>
                            <td scope="col"><span class="style3"></span></td>
                            <td class="style3" scope="col">&nbsp;</td>
                            <td scope="col"><span class="style3"></span></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col"><div align="center" class="style3">
                                <div align="left">Penyelaras Kursus</div>
                            </div></td>
                            <td class="style1" scope="col"><div align="center" class="style2"><span class="style3"></span></div></td>
                            <td scope="col"><span class="style3"></span></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col"><span class="style3">Nama</span></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['costa_off2']; ?></td>
                          </tr>
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col"><span class="style3">No. Telefon</span></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['costa_off2tel']; ?></td>
                          </tr>
                         
                          <tr>
                            <td scope="col">&nbsp;</td>
                            <td scope="col"><span class="style3">E-mel</span></td>
                            <td class="style1" scope="col"><div align="center" class="style3">:</div></td>
                            <td scope="col"><?php echo $row_serall['costa_off2mail']; ?></td>
                          </tr>
						   <tr>
						     <td scope="col">&nbsp;</td>
						     <td scope="col">&nbsp;</td>
						     <td class="style1" scope="col">&nbsp;</td>
						     <td scope="col">&nbsp;</td>
					      </tr>
                        </table>
						<? 
				  } 
				  if ($page=="1") {?>
				  <table width="652" border="0" align="center">

                    <tr>
                      <td width="51">&nbsp;</td>
                      <td width="132">Nama</td>
                      <td width="16"><span class="style1">:</span></td>
                      <td colspan="3"><?php echo $row_serall['u_name']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>No.KP</td>
                      <td><span class="style1">:</span></td>
                      <td><?php echo $row_serall['u_idnum']; ?></td>
                      <td>Jantina</td>
                      <td>:<?php echo $row_serall['u_gender']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>Alamat</td>
                      <td><span class="style1">:</span></td>
                      <td colspan="3"><?php echo $row_serall['u_address']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>Alamat Emel </td>
                      <td><span class="style1">:</span></td>
                      <td width="209"><?php echo $row_serall['u_email']; ?></td>
                      <td width="94"><span class="style1">No. Tel ( HP ) </span></td>
                      <td width="124"><span class="style1">: <?php echo $row_serall['u_telhp']; ?></span></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>Jawatan </td>
                      <td><span class="style1">:</span></td>
                      <td colspan="3"><?php echo $row_serall['win_pos']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>Gred Jawatan </td>
                      <td>:</td>
                      <td colspan="3"><?php echo $row_serall['win_gred']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>Kementerian/Jabatan</td>
                      <td><span class="style1">:</span></td>
                      <td colspan="3"><?php echo $row_serall['u_offaddress']; ?></td>
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
                      <td><?php echo $row_serall['u_offnum']; ?></td>
                      <td>No. Faks (Pej) </td>
                      <td> :<?php echo $row_serall['u_offfaks']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td valign="top">Tempoh Berhidmat Dalam Jawatan </td>
                      <td valign="top"><span class="style1">:</span></td>
                      <td colspan="3" valign="top"><?php echo $row_serall['win_nowtime']; ?></td>
                    </tr>
					
                    <tr>
                      <td>&nbsp;</td>
                      <td valign="top">Tempoh Berhidmat Dalam Kerajaan </td>
                      <td valign="top"><span class="style1">:</span></td>
                      <td colspan="3" valign="top"><?php echo $row_serall['win_govtime']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>Taraf Akademik </td>
                      <td><span class="style1">:</span></td>
                      <td colspan="3"><?php echo $row_serall['ua_unicourse']; ?></td>
                    </tr>
                   
                    <tr>
                      <td>&nbsp;</td>
                      <td valign="top">Universiti/Kolej</td>
                      <td valign="top"><span class="style1">:</span></td>
                      <td colspan="3" valign="top"><?php echo $row_serall['ua_uni']; ?></td>
                    </tr> 
                    <tr>
                      <td>&nbsp;</td>
                      <td valign="top">Tugas Sekarang </td>
                      <td valign="top" class="style1">:</td>
                      <td colspan="3" valign="top"><?php echo $row_serall['win_descpos']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td valign="top">Pengalaman Kerja </td>
                      <td valign="top" class="style1">:</td>
                      <td colspan="3" valign="top"><?php echo $row_serall['win_exp']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td valign="top">&nbsp;</td>
                      <td valign="top">&nbsp;</td>
                      <td colspan="3" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="5" valign="top">Maklumat Ketua Jabatan/ Penyelia </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td valign="top">&nbsp;</td>
                      <td valign="top">&nbsp;</td>
                      <td colspan="3" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td scope="col">Nama</td>
                      <td class="style1" scope="col">:</td>
                      <td colspan="3" valign="top"><?php echo $row_serapp['costu_pegnama']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td scope="col">Jawatan</td>
                      <td class="style1" scope="col">:</td>
                      <td colspan="3" valign="top"><?php echo $row_serapp['costu_pegjawatan']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td scope="col">E-mel</td>
                      <td class="style1" scope="col">:</td>
                      <td colspan="3" valign="top"><?php echo $row_serapp['costu_pegemail']; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td scope="col">Keperluan Asrama </td>
                      <td class="style1" scope="col">:</td>
                      <td colspan="3" valign="top"><?php echo $row_serapp['costu_asrama']; ?></td>
                    </tr>
                  </table>
				  <? } ?>
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
mysql_free_result($serapp);

mysql_free_result($serall);

mysql_free_result($category);
?>
