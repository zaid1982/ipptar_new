<?php
include("../conn.php");

$select = "select
  sum(case when e_j2 = 1 then 1 else 0 end) as j21,
  sum(case when e_j2 = 2 then 1 else 0 end) as j22
  
from epenilaian a, pilih b WHERE a.e_pid = b.p_id AND p_kid LIKE '$_GET[kid]'
order by e_id ASC
";
$result = mysql_query($select) or die("Query failed");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$j21 = $row['j21'];
$j22 = $row['j22'];

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
          ['1 - YA', <?php print $j21 ?>],
          ['2 - TIDAK', <?php print $j22 ?>]
        ]);

        var options = {
          title: 'Adakah kursus ini mencapai objektif?',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc02'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="pc02" style="width: 500px; height: 250px;"></div>
  </body>
</html>