<?php
include("../conn.php");

$select = "select
  sum(case when e_j9 = 1 then 1 else 0 end) as j91,
  sum(case when e_j9 = 2 then 1 else 0 end) as j92,
  sum(case when e_j9 = 3 then 1 else 0 end) as j93,
  sum(case when e_j9 = 4 then 1 else 0 end) as j94,
  sum(case when e_j9 = 5 then 1 else 0 end) as j95,
  
  sum(case when e_j10 = 1 then 1 else 0 end) as j101,
  sum(case when e_j10 = 2 then 1 else 0 end) as j102,
  sum(case when e_j10 = 3 then 1 else 0 end) as j103,
  sum(case when e_j10 = 4 then 1 else 0 end) as j104,
  sum(case when e_j10 = 5 then 1 else 0 end) as j105,
  
  sum(case when e_j11 = 1 then 1 else 0 end) as j111,
  sum(case when e_j11 = 2 then 1 else 0 end) as j112,
  sum(case when e_j11 = 3 then 1 else 0 end) as j113,
  sum(case when e_j11 = 4 then 1 else 0 end) as j114,
  sum(case when e_j11 = 5 then 1 else 0 end) as j115,
  
  sum(case when e_j12 = 1 then 1 else 0 end) as j121,
  sum(case when e_j12 = 2 then 1 else 0 end) as j122,
  sum(case when e_j12 = 3 then 1 else 0 end) as j123,
  sum(case when e_j12 = 4 then 1 else 0 end) as j124,
  sum(case when e_j12 = 5 then 1 else 0 end) as j125
  
from epenilaian a, pilih b WHERE a.e_pid = b.p_id AND p_kid LIKE '$_GET[kid]'
order by e_id ASC
";
$result = mysql_query($select) or die("Query failed");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$j91 = $row['j91'];
$j92 = $row['j92'];
$j93 = $row['j93'];
$j94 = $row['j94'];
$j95 = $row['j95'];

$j101 = $row['j101'];
$j102 = $row['j102'];
$j103 = $row['j103'];
$j104 = $row['j104'];
$j105 = $row['j105'];

$j111 = $row['j111'];
$j112 = $row['j112'];
$j113 = $row['j113'];
$j114 = $row['j114'];
$j115 = $row['j115'];

$j121 = $row['j121'];
$j122 = $row['j122'];
$j123 = $row['j123'];
$j124 = $row['j124'];
$j125 = $row['j125'];
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
          ['1 - Amat Lemah', <?php print $j91 ?>],
          ['2 - Lemah', <?php print $j92 ?>],
          ['3 - Sederhana', <?php print $j93 ?>],
          ['4 - Baik', <?php print $j94 ?>],
          ['5 - Amat Baik', <?php print $j95 ?>]
        ]);

        var options = {
          title: 'Perbincangan Kumpulan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc09'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j101 ?>],
          ['2 - Lemah', <?php print $j102 ?>],
          ['3 - Sederhana', <?php print $j103 ?>],
          ['4 - Baik', <?php print $j104 ?>],
          ['5 - Amat Baik', <?php print $j105 ?>]
        ]);

        var options = {
          title: 'Syarahan / Ceramah',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc10'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j111 ?>],
          ['2 - Lemah', <?php print $j112 ?>],
          ['3 - Sederhana', <?php print $j113 ?>],
          ['4 - Baik', <?php print $j114 ?>],
          ['5 - Amat Baik', <?php print $j115 ?>]
        ]);

        var options = {
          title: 'Latih Amal',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc11'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j121 ?>],
          ['2 - Lemah', <?php print $j122 ?>],
          ['3 - Sederhana', <?php print $j123 ?>],
          ['4 - Baik', <?php print $j124 ?>],
          ['5 - Amat Baik', <?php print $j125 ?>]
        ]);

        var options = {
          title: 'Nota',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc12'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="pc09" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc10" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc11" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc12" style="width: 500px; height: 250px;"></div>
  </body>
</html>