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
$adminakses=$row_viewad['ad_akses'];


$idkursus = addslashes($_GET['idkur']);
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

<script type="text/javascript"> question_number = 28; </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9648109-31']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {
	color: #FFFFFF;
	font-size: medium;
}
.style3 {font-size: large}
-->
</style>
</head>

<body>
	
    


<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript>




<div id="clouds"></div>
    
    	<div id="header"></div>
        
<form id="evaluate_form" action="adclosekursus_act.php" method="post" >
    
<div id="container">
<div id="project-details">
            	
            	<input class="out-of-view" title="Validation Check" style="display: none" name="important" type="text" />
            	<div id="project-website">
                
    <div class="field">
                    <label for="project-name">
                    <div align="justify"><strong>PROSES SELESAI : </strong></div>
                    <br>
                       
                        
						 <table width="743" border="0">
                          <tr>
                            <td width="733">&nbsp;</td>
                          </tr>
      </table>
						</label>
						<table width="92%" border="0">
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
            <td class="style1" scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td width="7%" scope="col"><span class="style3"></span></td>
            <td width="18%" scope="col">&nbsp;</td>
            <td width="1%" class="style1" scope="col">&nbsp;</td>
            <td width="74%" scope="col">&nbsp;</td>
          </tr>
		  <tr>
            <td width="7%" scope="col"><span class="style3"></span></td>
            <td colspan="3" scope="col"><div align="center"></div></td>
            </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td valign="top" scope="col"><span class="style2">Proses Selesai</span></td>
            <td valign="top" class="style1" scope="col"><span class="style2"> - </span></td>
            <td valign="top" scope="col"><span class="style2">Sila klik pada butang pangkah &quot;X&quot; untuk menggunakan fungsian lain. </span></td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col">&nbsp;</td>
            <td class="style1" scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
          </tr>
		    <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col">&nbsp;</td>
            <td class="style1" scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col">&nbsp;</td>
            <td class="style1" scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
            <td class="style3" scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
            <td class="style3" scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td scope="col"><span class="style3"></span></td>
            <td scope="col"><span class="style3"></span></td>
            <td class="style3" scope="col">&nbsp;</td>
            <td scope="col">&nbsp;</td>
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