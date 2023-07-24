<?php
session_start();
include("../conn.php");

#if(isset($_SESSION['terai']) && $_SESSION['terai'] == "pentic"){

$select = "select
  sum(case when e_j17 = 1 then 1 else 0 end) as j171,
  sum(case when e_j17 = 2 then 1 else 0 end) as j172,
  sum(case when e_j17 = 3 then 1 else 0 end) as j173,
  sum(case when e_j17 = 4 then 1 else 0 end) as j174,
  sum(case when e_j17 = 5 then 1 else 0 end) as j175,
  
  sum(case when e_j18 = 1 then 1 else 0 end) as j181,
  sum(case when e_j18 = 2 then 1 else 0 end) as j182,
  sum(case when e_j18 = 3 then 1 else 0 end) as j183,
  sum(case when e_j18 = 4 then 1 else 0 end) as j184,
  sum(case when e_j18 = 5 then 1 else 0 end) as j185,
  
  sum(case when e_j19 = 1 then 1 else 0 end) as j191,
  sum(case when e_j19 = 2 then 1 else 0 end) as j192,
  sum(case when e_j19 = 3 then 1 else 0 end) as j193,
  sum(case when e_j19 = 4 then 1 else 0 end) as j194,
  sum(case when e_j19 = 5 then 1 else 0 end) as j195,
  
  count(e_id) as id,
  
  t_nama
  
from epenilaian_ticer a, pilih b, ticer c WHERE a.e_pid = b.p_id AND a.e_tid = c.t_id AND p_kid LIKE '$_SESSION[kid]' AND a.e_tid LIKE '$_SESSION[tid]'
order by e_id ASC
";
$result = mysql_query($select) or die("Query failed");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
	
$j171 = $row['j171'];
$j172 = $row['j172'];
$j173 = $row['j173'];
$j174 = $row['j174'];
$j175 = $row['j175'];

$j181 = $row['j181'];
$j182 = $row['j182'];
$j183 = $row['j183'];
$j184 = $row['j184'];
$j185 = $row['j185'];

$j191 = $row['j191'];
$j192 = $row['j192'];
$j193 = $row['j193'];
$j194 = $row['j194'];
$j195 = $row['j195'];

$t_name = $row['t_nama'];

}

#}else{}
?>
<html>
  <head>
    <title>eKURSUS @ Institut Penyiaran dan Penerangan Tun Abdul Razak (IPPTAR)</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j171 ?>],
          ['2 - Lemah', <?php print $j172 ?>],
          ['3 - Sederhana', <?php print $j173 ?>],
          ['4 - Baik', <?php print $j174 ?>],
          ['5 - Amat Baik', <?php print $j175 ?>]
        ]);

        var options = {
          title: 'Ketepatan kandungan ceramah dengan tajuk latihan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc17'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j181 ?>],
          ['2 - Lemah', <?php print $j182 ?>],
          ['3 - Sederhana', <?php print $j183 ?>],
          ['4 - Baik', <?php print $j184 ?>],
          ['5 - Amat Baik', <?php print $j185 ?>]
        ]);

        var options = {
          title: 'Keberkesanan persembahan dan pendekatan',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc18'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['1 - Amat Lemah', <?php print $j191 ?>],
          ['2 - Lemah', <?php print $j192 ?>],
          ['3 - Sederhana', <?php print $j193 ?>],
          ['4 - Baik', <?php print $j194 ?>],
          ['5 - Amat Baik', <?php print $j195 ?>]
        ]);

        var options = {
          title: 'Pengetahuan kepakaran mengenai tajuk ceramah',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pc19'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  	<p align="center"><b><?php print $t_name; ?></b></p>
  	<br/>
    <div id="pc17" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc18" style="width: 500px; height: 250px;"></div>
    <br/>
    <div id="pc19" style="width: 500px; height: 250px;"></div>
  </body>
</html>