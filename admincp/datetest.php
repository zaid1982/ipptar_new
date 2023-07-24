<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<? 
$date="12/09/2011";
$day= substr($date,0,-8);
$month = substr($date,3,-5);
$year = substr($date,6);

if ($month=="01") { $monthword="Januari"; }
if ($month=="02") { $monthword="Febuari"; }
if ($month=="03") { $monthword="Mac"; }
if ($month=="04") { $monthword="April"; }
if ($month=="05") { $monthword="Mei"; }
if ($month=="06") { $monthword="Jun"; }
if ($month=="07") { $monthword="Julai"; }
if ($month=="08") { $monthword="Ogos"; }
if ($month=="09") { $monthword="September"; }
if ($month=="10") { $monthword="Oktober"; }
if ($month=="11") { $monthword="November"; }
if ($month=="12") { $monthword="Disember"; }

$fulldate1=$day.' '.$monthword.' '.$year;

echo $fulldate1;
?>