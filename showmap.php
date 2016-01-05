<!DOCTYPE html>
<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js"></script>



<table border="2">
<tr>
 <th>pi_id</th>
 <th>water_level</th>
 <th>rec_time</th>
</tr>
<?php
// PDO
$pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');
try{
	$statement = $pdo->query("SELECT * FROM usonic WHERE pi_id='3' ORDER BY rec_time DESC LIMIT 1");
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
	$stationnum1 = htmlentities($row['pi_id']);
	$water1 = htmlentities($row['water_level']);

	echo "<tr>";
	echo "<td>";
	echo htmlentities($row['pi_id']);
	echo "</td>";
	echo "<td>";
	echo htmlentities($row['water_level']);
	echo "</td>";
	echo "<td>";
	echo htmlentities($row['rec_time']);
	echo "</td>";
	echo "</tr>";
	}
}
//Table printed

catch( PDOException $Exception ) {
	echo 'Connection failed: ' . $e->getMessage();
	// Note The Typecast To An Integer!
	throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
	exit;
}

?>
</table>


<hr>

<table border="5">
<tr>
 <th>pi_id</th>
 <th>water_level</th>
 <th>rec_time</th>
</tr>
<?php
// PDO
$pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');
try{
	$statement = $pdo->query("SELECT * FROM usonic WHERE pi_id='4' ORDER BY rec_time DESC LIMIT 1");
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
	$stationnum2 = htmlentities($row['pi_id']);
	$water2 = htmlentities($row['water_level']);

	echo "<tr>";
	echo "<td>";
	echo htmlentities($row['pi_id']);
	echo "</td>";
	echo "<td>";
	echo htmlentities($row['water_level']);
	echo "</td>";
	echo "<td>";
	echo htmlentities($row['rec_time']);
	echo "</td>";
	echo "</tr>";
	}
}
//Table printed

catch( PDOException $Exception ) {
	echo 'Connection failed: ' . $e->getMessage();
	// Note The Typecast To An Integer!
	throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
	exit;
}

?>
</table>



<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(13.6124016,100.8430774),
    zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  //create map object inside div id="googleMap" with mapProp parameters specified above
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  

  
  
//marker1
  var marker1=new google.maps.Marker({
   position:new google.maps.LatLng(13.6124016,100.8430774), 
   url:"showpi3.php",
   map:map});

   //marker1.setMap(map);

  var infowindow1 = new google.maps.InfoWindow({
   content:"Station#<?php echo $stationnum1?>: <?php echo $water1 ?>"
  });

  google.maps.event.addListener(marker1, 'mouseover', function() {
   infowindow1.open(map,marker1);
  });

   google.maps.event.addListener(marker1, 'click', function() {
	window.open(marker1.url);
  });
 
 
 
  
 //marker2
  var marker2=new google.maps.Marker({
   position:new google.maps.LatLng(13.6024016,100.8532874), 
   url:"showpi4.php",
   map:map});

   //marker1.setMap(map);

  var infowindow2 = new google.maps.InfoWindow({
   content:"Station#<?php echo $stationnum2?>: <?php echo $water2 ?>"
  });

  google.maps.event.addListener(marker2, 'mouseover', function() {
   infowindow2.open(map,marker2);
  });
 
  google.maps.event.addListener(marker2, 'click', function() {
   window.open(marker2.url);
  }); 

 
 
 
 
  
}
//on load execute the function initialize()
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
//div to hold map and CSS to size
<div id="googleMap" style="width:800px;height:480px;"></div>
</body>

</html>