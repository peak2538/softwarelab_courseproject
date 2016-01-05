<html>
<head> <title>Lab8: See pi_id=3</title> </head>
<body>


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
	$statement = $pdo->query("SELECT * FROM usonic WHERE pi_id='3' ORDER BY rec_time DESC");
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
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
</body>
</html>
