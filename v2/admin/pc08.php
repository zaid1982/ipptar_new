<?php
include("../conn.php");

$select = "select
  sum(case when e_j20 = 1 then 1 else 0 end) as j201,
  sum(case when e_j20 = 2 then 1 else 0 end) as j202,
  
  sum(case when e_j21 = 1 then 1 else 0 end) as j211,
  sum(case when e_j21 = 2 then 1 else 0 end) as j212
  
from epenilaian a, pilih b WHERE a.e_pid = b.p_id AND p_kid LIKE '$_GET[kid]'
order by e_id ASC
";
$result = mysql_query($select) or die("Query failed");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$j201 = $row['j201'];
$j202 = $row['j202'];

$j211 = $row['j211'];
$j212 = $row['j212'];
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
          ['1 - Ya', <?php print $j201 ?>],
          ['2 - Tidak', <?php print $j202 ?>]
        ]);

        var options = {
          title: 'Adakah anda telah mendapat manfaat dari menghadiri kursus ini?',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc20'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Ya', <?php print $j211 ?>],
          ['2 - Tidak', <?php print $j212 ?>]
        ]);

        var options = {
          title: 'Adakah anda ingin memperakukan kursus ini kepada orang lain?',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc21'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="pc20" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc21" style="width: 500px; height: 250px;"></div>
  </body>
</html>