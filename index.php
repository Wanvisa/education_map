
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>Education Map</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script src="ammap/ammap.js" type="text/javascript"></script>
  <link rel="stylesheet" href="ammap/ammap.css" type="text/css" media="all" />
  <script src="ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script>
 // add all your code to this method, as this will ensure that page is loaded
    AmCharts.ready(function() {
        // create AmMap object
        var map = new AmCharts.AmMap();
      
        // set path to images
        map.pathToImages = "ammap/images/";

        /* create data provider object
         map property is usually the same as the name of the map file.

         getAreasFromMap indicates that amMap should read all the areas available
         in the map data and treat them as they are included in your data provider.
         in case you don't set it to true, all the areas except listed in data
         provider will be treated as unlisted.
        */
        var dataProvider = {
            map: "worldLow",
            getAreasFromMap:true,
            
        }; 
        // pass data provider to the map object
        map.dataProvider = dataProvider;

        /* create areas settings
         * autoZoom set to true means that the map will zoom-in when clicked on the area
         * selectedColor indicates color of the clicked area.
         */
        map.areasSettings = {
            autoZoom: true,
            selectedColor: "#F58802"
        };

        // let's say we want a small map to be displayed, so let's create it
        map.smallMap = new AmCharts.SmallMap();

        // write the map to container div
        map.write("mapdiv");
    });
  
</script> 
 

</head>
<body>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.js"></script>

<div class="container-fluid" style="background : black; color:white;">
  <h1>EDUCATION</h1>
  <p>MAP BY PPY.</p>
  </div>
    

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Education Map</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <li><a href="#">Labor Force</a></li>
        <li><a href="#">literacy Rate</a></li>
        <li><a href="#">Children Out Of School</a></li>
        <li><a href="#">Umemployment</a></li>

      </ul>
    </div>
  </div>
</nav>


  <center><div id="mapdiv" style="width: 80%; height: 500px;"></div></center>
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
 while($info = mysql_fetch_array($data)) 
 { 

    print "<b>Country Name:</b> ".$info['Country Name'] . " <br>"; 
    print "<b>1990:</b> ".$info['1990'] . " <br>"; 

  
 } 

?>

 


 
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
</style>