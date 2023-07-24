<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<style>
@media screen {
   #printbr {display: none;}
   #bolehprint {display: none;}
           }
@media print {
   #printbr {display: block; margin-top: 100px;}
   #bolehprint {display: block;}
   .dontprint { display: none; }
             }
</style>

<script src="../js/jquery.tools.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/overlay-apple.css"/>

<style>
/* use a semi-transparent image for the overlay */
#overlay {
background-image:url(../images/white.png);
color:#efefef;
height:450px;
}
/* container for external content. uses vertical scrollbar, if needed */
div.contentWrap {
height:500px;
overflow-y:auto;
}
</style>

<script language=JavaScript>
function reload1(form)
{
var val=form.kluster.options[form.kluster.options.selectedIndex].value; 
var val2=form.tahun.options[form.tahun.options.selectedIndex].value; 
self.location='mohon.php?b_id=' + val + '&tahun=' + val2 ;
}
function reload2(form)
{
var val=form.kluster.options[form.kluster.options.selectedIndex].value; 
var val2=form.tahun.options[form.tahun.options.selectedIndex].value; 
var val3=form.kursus.options[form.kursus.options.selectedIndex].value; 

self.location='mohon.php?b_id=' + val + '&tahun=' + val2 + '&k_id=' + val3 ;
}
</script>
</head>