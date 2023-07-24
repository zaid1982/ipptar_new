<?php
include("../conn.php");

$select = "select
  sum(case when e_j3 = 1 then 1 else 0 end) as j31,
  sum(case when e_j3 = 2 then 1 else 0 end) as j32,
  sum(case when e_j3 = 3 then 1 else 0 end) as j33,
  sum(case when e_j3 = 4 then 1 else 0 end) as j34,
  sum(case when e_j3 = 5 then 1 else 0 end) as j35,
  
  sum(case when e_j4 = 1 then 1 else 0 end) as j41,
  sum(case when e_j4 = 2 then 1 else 0 end) as j42,
  sum(case when e_j4 = 3 then 1 else 0 end) as j43,
  sum(case when e_j4 = 4 then 1 else 0 end) as j44,
  sum(case when e_j4 = 5 then 1 else 0 end) as j45
  
from epenilaian a, pilih b WHERE a.e_pid = b.p_id AND p_kid LIKE '$_GET[kid]'
order by e_id ASC
";
$result = mysql_query($select) or die("Query failed");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$j31 = $row['j31'];
$j32 = $row['j32'];
$j33 = $row['j33'];
$j34 = $row['j34'];
$j35 = $row['j35'];

$j41 = $row['j41'];
$j42 = $row['j42'];
$j43 = $row['j43'];
$j44 = $row['j44'];
$j45 = $row['j45'];

}
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j31 ?>],
          ['2 - Lemah', <?php print $j32 ?>],
          ['3 - Sederhana', <?php print $j33 ?>],
          ['4 - Baik', <?php print $j34 ?>],
          ['5 - Amat Baik', <?php print $j35 ?>]
        ]);

        var options = {
          title: 'Pengetahuan yang berkaitan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc03'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j41 ?>],
          ['2 - Lemah', <?php print $j42 ?>],
          ['3 - Sederhana', <?php print $j43 ?>],
          ['4 - Baik', <?php print $j44 ?>],
          ['5 - Amat Baik', <?php print $j45 ?>]
        ]);

        var options = {
          title: 'Kemahiran di dalam bidang yang berkaitan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc04'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="pc03" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc04" style="width: 500px; height: 250px;"></div>
  </body>
</html>