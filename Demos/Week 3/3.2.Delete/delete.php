<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;

if($id != null && is_numeric($id)){
	$conn = new mysqli('localhost','test','fullstack','fullstack'); // Put your database here 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$deleted = $conn->query("DELETE FROM blog_entries WHERE id=" . $id);

	if($deleted){
		header('Location: read-6.php');
	}
}