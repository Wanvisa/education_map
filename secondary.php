<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>Education Map</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php
    header("Content-Type: text/html; charset=UTF-8");
     
    $host="localhost";
    $user="root"; // MySql Username
    $pass=""; // MySql Password
    $dbname="education_data"; // Database Name
  $conn=mysql_connect($host,$user,$pass) or die("Can't connect"); // เชื่อมต่อ ฐานข้อมูล
    //echo("Connected");
    mysql_select_db($dbname) or die(mysql_error()); 

    print "<table border cellpadding=3>"; 
    $data = mysql_query("SELECT * FROM secondary") 
  or die(mysql_error()); 
  $rows   = array();
  $temp_1 = array();
  $temp_2 = array();
  $rows[] = array('Country', 'Percent');
  while($r = mysql_fetch_assoc($data)) {
    $temp_1 = (string)$r['Country Name'];
    $temp_2 = (int)$r['2012'];
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

        var options = {
          colorAxis: {colors: ['#B1E13C','#75A500', '#004029']},
          backgroundColor: '#F2F2F2',
          datalessRegionColor: 'white',
          defaultColor: 'grey',
          datalessRegionColor:'black'
        };
        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      };
    </script>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</head>
<body>



<nav class="navbar navbar-inverse" style="margin-bottom:0px;">
  <div class="container-fluid">
    <!-- <div class="navbar-header">
      <a class="navbar-brand" href="#">Education</a>
    </div> -->
  <div>
    <ul class="nav navbar-nav">
        <li><a href="Home.php">Home</a></li>
        <li><a href="labor.php">Labor Force</a></li>
        <li><a href="gdp.php">Percent of GDP</a></li>
        <li><a href="unemploy.php">Percent of Unemployment</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">School Enrolment<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="preprimary.php">Pre-primary</a></li>
            <li><a href="primary.php">Primary</a></li>
            <li><a href="secondary.php">Secondary</a></li> 
            <li><a href="tertiary.php">Tertiary</a></li> 

          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
    
        
        <div class="row"style="background:#F2F2F2; height:100%";>
         <div class = "col-md-6">
          <div id="regions_div" style="width: 100%; height: 70%; margin-top:10%; margin-left:2%;"></div>
          </div>
         <div class="col-md-6" style="width: 100%px; height: 60%;margin-top:5%;" >
         <h3> Percent Gross of Secondary</h3><br>
        <p>Gross enrolment ratio. Secondary. All programmes. Total is the total enrollment in secondary education, regardless of age, expressed as a percentage of the population of official secondary education age. GER can exceed 100% due to the inclusion of over-aged and under-aged students because of early or late school entrance and grade repetition.</p>        
        </div>
         </div>


    
         
</body> 
</html>
<style>

  .container{
    margin-left: 0px;
}

}
  .container-fluid{
  
    border-style: solid;
    border-width: .5px;
    
  }
  .list-group-item{
    margin-right: 50%;
  }
  .bg{
    background-image: url("images/labor.jpg");
    width: 100%;
    height: 700px;
    background-size: cover;
    
  }

</style>