<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;

if($id != $null){
	$conn = new mysqli('localhost','test','fullstack','fullstack'); // Here your database 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$deleted = $conn->query("DELETE blog_entries WHER id=" . $id);

	if($deleted){
		header('Location: read.php');
	}
}