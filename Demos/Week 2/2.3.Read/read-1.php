<?php
$conn = new mysqli('localhost','test','fullstack','fullstack'); // Here your database 
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$entries = $conn->query("SELECT * FROM blog_entries");
if($entries){
	print_r($entries);
	print "<br/><br/>";

	// https://secure.php.net/manual/en/class.mysqli-result.php

	while($row = $entries->fetch_assoc()){
		print_r($row);
	}
}
?>