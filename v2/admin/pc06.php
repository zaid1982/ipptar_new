<?php
include("../conn.php");

$select = "select
  sum(case when e_j13 = 1 then 1 else 0 end) as j131,
  sum(case when e_j13 = 2 then 1 else 0 end) as j132,
  sum(case when e_j13 = 3 then 1 else 0 end) as j133,
  sum(case when e_j13 = 4 then 1 else 0 end) as j134,
  sum(case when e_j13 = 5 then 1 else 0 end) as j135,
  
  sum(case when e_j14 = 1 then 1 else 0 end) as j141,
  sum(case when e_j14 = 2 then 1 else 0 end) as j142,
  sum(case when e_j14 = 3 then 1 else 0 end) as j143,
  sum(case when e_j14 = 4 then 1 else 0 end) as j144,
  sum(case when e_j14 = 5 then 1 else 0 end) as j145,
  
  sum(case when e_j15 = 1 then 1 else 0 end) as j151,
  sum(case when e_j15 = 2 then 1 else 0 end) as j152,
  sum(case when e_j15 = 3 then 1 else 0 end) as j153,
  sum(case when e_j15 = 4 then 1 else 0 end) as j154,
  sum(case when e_j15 = 5 then 1 else 0 end) as j155,
  
  sum(case when e_j16 = 1 then 1 else 0 end) as j161,
  sum(case when e_j16 = 2 then 1 else 0 end) as j162,
  sum(case when e_j16 = 3 then 1 else 0 end) as j163,
  sum(case when e_j16 = 4 then 1 else 0 end) as j164,
  sum(case when e_j16 = 5 then 1 else 0 end) as j165
  
from epenilaian a, pilih b WHERE a.e_pid = b.p_id AND p_kid LIKE '$_GET[kid]'
order by e_id ASC
";
$result = mysql_query($select) or die("Query failed");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$j131 = $row['j131'];
$j132 = $row['j132'];
$j133 = $row['j133'];
$j134 = $row['j134'];
$j135 = $row['j135'];

$j141 = $row['j141'];
$j142 = $row['j142'];
$j143 = $row['j143'];
$j144 = $row['j144'];
$j145 = $row['j145'];

$j151 = $row['j151'];
$j152 = $row['j152'];
$j153 = $row['j153'];
$j154 = $row['j154'];
$j155 = $row['j155'];

$j161 = $row['j161'];
$j162 = $row['j162'];
$j163 = $row['j163'];
$j164 = $row['j164'];
$j165 = $row['j165'];
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
          ['1 - Amat Lemah', <?php print $j131 ?>],
          ['2 - Lemah', <?php print $j132 ?>],
          ['3 - Sederhana', <?php print $j133 ?>],
          ['4 - Baik', <?php print $j134 ?>],
          ['5 - Amat Baik', <?php print $j135 ?>]
        ]);

        var options = {
          title: 'Tempoh masa kursus',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc13'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j141 ?>],
          ['2 - Lemah', <?php print $j142 ?>],
          ['3 - Sederhana', <?php print $j143 ?>],
          ['4 - Baik', <?php print $j144 ?>],
          ['5 - Amat Baik', <?php print $j145 ?>]
        ]);

        var options = {
          title: 'Makanan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc14'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j151 ?>],
          ['2 - Lemah', <?php print $j152 ?>],
          ['3 - Sederhana', <?php print $j153 ?>],
          ['4 - Baik', <?php print $j154 ?>],
          ['5 - Amat Baik', <?php print $j155 ?>]
        ]);

        var options = {
          title: 'Penginapan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc15'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j161 ?>],
          ['2 - Lemah', <?php print $j162 ?>],
          ['3 - Sederhana', <?php print $j163 ?>],
          ['4 - Baik', <?php print $j164 ?>],
          ['5 - Amat Baik', <?php print $j165 ?>]
        ]);

        var options = {
          title: 'Komputer/Peralatan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc16'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="pc13" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc14" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc15" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc16" style="width: 500px; height: 250px;"></div>
  </body>
</html>