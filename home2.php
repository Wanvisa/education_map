


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta charset="utf-8"> 
 	<title>Education</title>
 	<script src="ammap/ammap.js" type="text/javascript"></script>
	<link rel="stylesheet" href="ammap/ammap.css" type="text/css" media="all" />
	<script src="ammap/maps/js/worldLow.js" type="text/javascript"></script>
  <?php 
header('Content-Type: application/json');
$linklist=array();
$link=array();
mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('Education') or die(mysql_error());
$qr=mysql_query("SELECT * FROM `labor_force` ") or die(mysql_error());
while($res=mysql_fetch_array($qr))
{
 $link['id']=$res['Country Code'];
 $link['number']=$res['Country Name'].$res['1994'];
 array_push($linklist,$link);
}
//print_R($linklist);

$jsondata = json_encode($linklist,JSON_PRETTY_PRINT);


?>
 <script>

      // add all your code to this method, as this will ensure that page is loaded
      AmCharts.ready(function() {
          // create AmMap object
          var map = new AmCharts.AmMap();
          // set path to images


          /* create data provider object
           mapVar tells the map name of the variable of the map data. You have to
           view source of the map file you included in order to find the name of the
           variable - it's the very first line after commented lines.

           getAreasFromMap indicates that amMap should read all the areas available
           in the map data and treat them as they are included in your data provider.
           in case you don't set it to true, all the areas except listed in data
           provider will be treated as unlisted.
          */


          
          var area = <?php echo $jsondata; ?>;
          // var area = [
          //   { "id": "FR", "color": "#4444ff" },
          //   // { id: "RU", color: "#4444ff" },
          //   // { id: "US", color: "#4444ff" }
          // ]          

          for (i = 0; i < $linklist.length; i++) { 
              console.log($linklist[i] + "<br>");
           }
        // <?php 
        // for ($x = 0; $x <sizeof($linklist); $x++) {
        //       array_push($area, {"id": "US", "color": "4444ac"})
        // } 
        // ?>                
          var dataProvider = {


              mapVar: AmCharts.maps.worldLow,
              getAreasFromMap: true,
              // url:"json/map.json",
              areas:area;
            

          };
          // pass data provider to the map object
          map.dataProvider = dataProvider;

          /* create areas settings
           * autoZoom set to true means that the map will zoom-in when clicked on the area
           * selectedColor indicates color of the clicked area.
           */
          map.areasSettings = {
              autoZoom: true,
              selectedColor: "#CC0000"
          };

          // let's say we want a small map to be displayed, so let's create and add it to the map
          map.smallMap = new AmCharts.SmallMap();

          // write the map to container div
          map.write("mapdiv");

      });

        </script>
	
</head>
<body id = "webbody">
	<div id="header">
	<h1>Education</h1>
	<h2>Website description</h2>
	</div>
	<div id = "header2">
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    
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

  

</body>

</html>
<style>
#webbody{
	background-color: #3C3C3F;
}
#header{ 
	background-color: #F88017;
	margin-right: 10%;
	margin-left: 10%;
	margin-top: 4%;
	padding-bottom: 10px;

}
#header2{
	background-color:white;
	margin-right: 10%;
	margin-left: 10%;
	margin-top: 0%;
	padding-bottom: 50%;

}

body { font: .8em Arial, Sans-Serif; line-height: 1.8em; background: #333; color: #444; }


#header h1 {
font-size: 30px;
font-weight: 100;
letter-spacing: -1px;
padding: 22px 0 5px 10px;
}
#header h2 {
color: #eee;
font-size: 19px;
font-weight: 100;
padding: 0 0 0 11px;
letter-spacing: -1px;
line-height: 12px;
}
#footer { 
	font-size: 11px; 
	text-align: center; border-top: 1px solid #ccc;

	padding-bottom: 3px;
	margin-right: 20%;
	margin-left: 20%;
	background-color: #F88017;
}
#footer p{

	font-size:15px;
	font-family: "Times New Roman";

}
#menu {
	background: #FFC65D;
	height: 20px;
	margin-left: 0%;
	margin-right: 0%;

}
#menu li {
	list-style-type: none;
	padding-left: 2%;
	display: block;
	float: left;
}
#menu li a {
text-decoration: none;
font-size: 15px;
color :#551C00;
}

#menu li a:hover {
color: #003854;
text-decoration: none;
}






</style>