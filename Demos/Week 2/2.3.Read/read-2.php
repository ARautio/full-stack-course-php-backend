<?php
$item_id = isset($_GET['id']) ? $_GET['id'] : null;
$year_month = isset($_GET['month']) ? $_GET['month'] : null;


$conn = new mysqli('localhost','test','fullstack','fullstack'); // Here your database 
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$selection = "";

// Single item
if(is_numeric($item_id)){
	$selection = 'WHERE id=' . $item_id; 
}

// Month
if(strlen($year_month) > 0){
	list($year,$month) = explode('-',$year_month);
	$selection = 'WHERE month(date)=' . $month . ' AND year(date)=' . $year; 
}


$entries = $conn->query("SELECT * FROM blog_entries " . $selection);
if($entries){
	print_r($entries);
	print "<br/><br/>";

	// https://secure.php.net/manual/en/class.mysqli-result.php

	while($row = $entries->fetch_assoc()){
		print_r($row);
	}
}

?>