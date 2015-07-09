<html>
  <head>
  <?php
    header("Content-Type: text/html; charset=UTF-8");
     
    $host="localhost";
    $user="root"; // MySql Username
    $pass=""; // MySql Password
    $dbname="Education"; // Database Name
  $conn=mysql_connect($host,$user,$pass) or die("Can't connect"); // เชื่อมต่อ ฐานข้อมูล
    //echo("Connected");
    mysql_select_db($dbname) or die(mysql_error()); 

    print "<table border cellpadding=3>"; 
    $data = mysql_query("SELECT * FROM labor_force") 
  or die(mysql_error()); 
  $rows   = array();
  $temp_1 = array();
  $temp_2 = array();
  $rows[] = array('Country', 'Numbers');
  while($r = mysql_fetch_assoc($data)) {
    $temp_1 = (string)$r['Country Name'];
    $temp_2 = (int)$r['2004'];
    $rows[] = array($temp_1,$temp_2);
  }
  $jsonTable = json_encode($rows);
?>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable(<?php echo $jsonTable; ?>);

        var options = {};
        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>