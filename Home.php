
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>Education Map</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


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
    $data = mysql_query("SELECT * FROM labor_force") 
  or die(mysql_error()); 
  $rows   = array();
  $temp_1 = array();
  $temp_2 = array();
  $rows[] = array('Country', 'Numbers');
  while($r = mysql_fetch_assoc($data)) {
    $temp_1 = (string)$r['Country Name'];
    $temp_2 = (int)$r['2011'];
    $rows[] = array($temp_1,$temp_2);
  }
  $jsonTable = json_encode($rows);
?>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

    

    

      google.load("visualization", "1", {packages:["geomap"]});
      google.setOnLoadCallback(drawMap)

   
;

      function drawMap() {
        var data = google.visualization.arrayToDataTable(<?php echo $jsonTable; ?>);

        
        options['dataMode'] = 'regions';

        var container = document.getElementById('regions_div');
        var geomap = new google.visualization.GeoMap(container);

        geomap.draw(data);


      };
    </script>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>



 

 <nav class="navbar navbar-inverse" style = "margin-bottom:0px;">
  <div class="container-fluid">
  <!--   <div class="navbar-header">

      <a class="navbar-brand" href="#">Education</a>
    </div>
 -->  <div>
    <ul class="nav navbar-nav">
        <li class = "active"><a href="Home.php">Home</a></li>
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


   <!--  <div class = "col-md-12">
   <a class="thumbnail">
    <img src="images/home2.jpg"style="width:1280px;height:450px;">

   </a>
  </div> -->

       <div class="background"></div>
       <div class="col-md-4">
       	<h3>About Us</h3>
	<center><i class="fa fa-users fa-5x big-icon" style="margin-top:10px; margin-bottom:10px;"></i></center>

   <font size="4.5px"><p>Our project is about map visualization that visualize data on a map. It shows all the country name and its information so you can understand the data easier.</p></font size>
  </div>
  <div class="col-md-4"style="margin-bottom:50px; margin-bottom:40px;" >
   <h3>Data</h3>
   <center><i class="fa fa-pie-chart fa-5x big-icon"></i></center>

   <font size="4.5px"><p>We focus on the education data that contains data from all over the world and the interesting indicators. All the database comes from data worldbank.</p></font size>
  </div>
  <div class="col-md-4"style="margin-bottom:50px; margin-bottom:10px;" >
   <h3>Tools</h3>
   <center><i class="fa fa-cog fa-5x big-icon"></i></center>

   <font size="4.5px"><p>Google map API</p></font size>
   <font size="4.5px"><p>HTML5 CSS BOOTSTRAP PHP</p></font size>
   <font size="4.5px"><p>Sublime Text<p></font size>
 </div>
    
</div>


      

       

      <!--  <nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid" >
    <div class="navbar-header" > -->
      <!-- <a  class="navbar-brand"href=>Presented By Wanvisa Daengduang</a> -->
   <!--    
    </div>
    
  </div>
</nav> -->
        
  </div>
      
    

   

        <!-- <img src="images/home2.jpg"style="width:100%;height:800px; margin-top:0px"> -->
       

   
          <!-- <div id="regions_div" style="width: 1000px; height: 700px;"></div> -->
</body>
</html>
<style>

  .container{
    margin-left: 0px;
    background: black;
    width: auto;
    height: 10px;
}

}
  .container-fluid{
  
    border-style: solid;
    border-width: .5px;
  
  }
  .list-group-item{
    margin-right: 50%;
  }
  .background {
    background-image: url("images/home2.jpg");
    width: 100%;
    height: 550px;
    background-size: cover;

}
  .transbox {
    margin-top: 20%;
    background-color: #fff;
    border: 1px solid black;
    opacity: 0.6;
    filter: alpha(opacity=60); /* For IE8 and earlier */
}
.big-icon {
    font-size: 90px;
}
