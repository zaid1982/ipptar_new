
<? include 'adconfig.php'; ?>
<? 
// Get all the data from the "example" table
$result = mysql_query("SELECT co_id,co_sdate,co_edate from co_info") 
or die(mysql_error());  


// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {

$idkursus=$row['co_id'];
$am='am';
$date=(date("d/m/Y")); 
$time=(date("H:i:s"));
	// Print out the contents of each row into a table
$tarikhmula=$row['co_sdate'];
$tarikhakhir=$row['co_edate'];

//echo $date;
//$tarikhmula="20/12/2011";
$day1= substr($tarikhmula,0,-8);
$month1 = substr($tarikhmula,3,-5);
$year1 = substr($tarikhmula,6);
$fulldate1=$month1.'/'.$day1.'/'.$year1;
 

//date realtime
//$tarikhakhir="22/12/2011";
$day2= substr($tarikhakhir,0,-8);
$month2 = substr($tarikhakhir,3,-5);
$year2 = substr($tarikhakhir,6);
$fulldate2=$month2.'/'.$day2.'/'.$year2;

$day3= substr($date,0,-8);
$month3 = substr($date,3,-5);
$year3 = substr($date,6);
$realdate=$month3.'/'.$day3.'/'.$year3;

$time1 = strtotime($fulldate1);
$time2 = strtotime($fulldate2);
$time3 = strtotime($realdate);

$newformat1 = date('Y-m-d',$time1);
$newformat2 = date('Y-m-d',$time2);
$newformat3 = date('Y-m-d',$time3);
//echo $newformat1;
//echo $newformat2;
$diffstart = ((strtotime($newformat3) - strtotime($newformat1)) / (86400) );
$diffend = ((strtotime($newformat3) - strtotime($newformat2)) / (86400) );
// FOR START DATE 
//echo $diffstart;
//echo $diffend;

// berlangsung
if ( $diffstart>=0 &&  $diffend<=0  )
{
$sql= "UPDATE co_info SET co_langsung='BERLANGSUNG' where co_id='$idkursus'";
mysql_query($sql);
}
// tidak berlansung before date
if ( $diffstart<0 &&  $diffend<0  )
{
$sql= "UPDATE co_info SET co_langsung=' ' where co_id='$idkursus'";
mysql_query($sql);
}
// tidak berlansung after date
if ( $diffstart>0 &&  $diffend>0  )
{
$sql= "UPDATE co_info SET co_langsung=' ' where co_id='$idkursus'";
mysql_query($sql);
}
} 

?>

