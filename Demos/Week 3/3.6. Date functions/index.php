<?php
	$conn = new mysqli('localhost','test','fullstack','fullstack'); // Here your database 
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	}
	$dates = $conn->query("SELECT date, id FROM blog_entries ORDER BY date, id ASC");
	while($row = $dates->fetch_assoc()){
		//print $row['date'] . "<br/>";
		$date = date_create($row['date']);
		print $row['id'] . " " . date_format($date,"d.m.Y") . "<br/>";
	}
	//$variable = 2010+5;
	//$todaysDate = date("Y-m-d G:i:s", mktime(10,5,30,6,10,$variable));
	//print $todaysDate;
?>
