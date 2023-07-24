<?php
include("../conn.php");

$select = "select
  sum(case when e_j1 = 1 then 1 else 0 end) as j11,
  sum(case when e_j1 = 2 then 1 else 0 end) as j12,
  sum(case when e_j1 = 3 then 1 else 0 end) as j13,
  sum(case when e_j1 = 4 then 1 else 0 end) as j14,
  sum(case when e_j1 = 5 then 1 else 0 end) as j15,
  sum(case when e_j1 = 6 then 1 else 0 end) as j16,
  sum(case when e_j1 = 7 then 1 else 0 end) as j17
  
from epenilaian a, pilih b WHERE a.e_pid = b.p_id AND p_kid LIKE '$_GET[kid]'
order by e_id ASC
";
$result = mysql_query($select) or die("Query failed");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$j11 = $row['j11'];
$j12 = $row['j12'];
$j13 = $row['j13'];
$j14 = $row['j14'];
$j15 = $row['j15'];
$j16 = $row['j16'];
$j17 = $row['j17'];

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
          ['1 - Facebook Rasmi IPPTAR', <?php print $j11 ?>],
          ['2 - Laman Sesawang IPPTAR', <?php print $j12 ?>],
          ['3 - Blast Email', <?php print $j13 ?>],
          ['4 - Jadual Tahunan IPPTAR',<?php print $j14 ?>],
          ['5 - Rakan-rakan', <?php print $j15 ?>],
          ['6 - Hebahan Surat', <?php print $j16 ?>],
          ['7 - TV/Radio/Surat Khabar', <?php print $j17 ?>]
        ]);

        var options = {
          title: 'DARI MANA ANDA MENDAPAT MAKLUM TENTANG KURSUS INI',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc01'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="pc01" style="width: 500px; height: 250px;"></div>
  </body>
</html>