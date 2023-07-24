<?php
include("../conn.php");

$select = "select
  sum(case when e_j5 = 1 then 1 else 0 end) as j51,
  sum(case when e_j5 = 2 then 1 else 0 end) as j52,
  sum(case when e_j5 = 3 then 1 else 0 end) as j53,
  sum(case when e_j5 = 4 then 1 else 0 end) as j54,
  sum(case when e_j5 = 5 then 1 else 0 end) as j55,
  
  sum(case when e_j6 = 1 then 1 else 0 end) as j61,
  sum(case when e_j6 = 2 then 1 else 0 end) as j62,
  sum(case when e_j6 = 3 then 1 else 0 end) as j63,
  sum(case when e_j6 = 4 then 1 else 0 end) as j64,
  sum(case when e_j6 = 5 then 1 else 0 end) as j65,
  
  sum(case when e_j7 = 1 then 1 else 0 end) as j71,
  sum(case when e_j7 = 2 then 1 else 0 end) as j72,
  sum(case when e_j7 = 3 then 1 else 0 end) as j73,
  sum(case when e_j7 = 4 then 1 else 0 end) as j74,
  sum(case when e_j7 = 5 then 1 else 0 end) as j75,
  
  sum(case when e_j8 = 1 then 1 else 0 end) as j81,
  sum(case when e_j8 = 2 then 1 else 0 end) as j82,
  sum(case when e_j8 = 3 then 1 else 0 end) as j83,
  sum(case when e_j8 = 4 then 1 else 0 end) as j84,
  sum(case when e_j8 = 5 then 1 else 0 end) as j85
  
from epenilaian a, pilih b WHERE a.e_pid = b.p_id AND p_kid LIKE '$_GET[kid]'
order by e_id ASC
";
$result = mysql_query($select) or die("Query failed");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$j51 = $row['j51'];
$j52 = $row['j52'];
$j53 = $row['j53'];
$j54 = $row['j54'];
$j55 = $row['j55'];

$j61 = $row['j61'];
$j62 = $row['j62'];
$j63 = $row['j63'];
$j64 = $row['j64'];
$j65 = $row['j65'];

$j71 = $row['j71'];
$j72 = $row['j72'];
$j73 = $row['j73'];
$j74 = $row['j74'];
$j75 = $row['j75'];

$j81 = $row['j81'];
$j82 = $row['j82'];
$j83 = $row['j83'];
$j84 = $row['j84'];
$j85 = $row['j85'];
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
          ['1 - Amat Lemah', <?php print $j51 ?>],
          ['2 - Lemah', <?php print $j52 ?>],
          ['3 - Sederhana', <?php print $j53 ?>],
          ['4 - Baik', <?php print $j54 ?>],
          ['5 - Amat Baik', <?php print $j55 ?>]
        ]);

        var options = {
          title: 'Kesesuaian pemilihan kursus',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc05'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j61 ?>],
          ['2 - Lemah', <?php print $j62 ?>],
          ['3 - Sederhana', <?php print $j63 ?>],
          ['4 - Baik', <?php print $j64 ?>],
          ['5 - Amat Baik', <?php print $j65 ?>]
        ]);

        var options = {
          title: 'Kesinambungan topik-topik',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc06'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="pc05" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc06" style="width: 500px; height: 250px;"></div>
  </body>
</html>