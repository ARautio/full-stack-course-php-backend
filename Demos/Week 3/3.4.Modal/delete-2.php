<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
$checked = isset($_GET['checked']) ? $_GET['checked'] : null;

if($id != null && is_numeric($id) && $checked == "OK"){
	$conn = new mysqli('localhost','test','fullstack','fullstack'); // Put your database here 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$deleted = $conn->query("DELETE FROM blog_entries WHERE id=" . $id);

	if($deleted){
		header('Location: read-8.php');
	}
}else if($id != null && is_numeric($id)){
	print "Do you want to remove blog entry with ID " . $id . "?";
	print '<a href="delete-2.php?id=' . $id. '&checked=OK">Remove</a>';
}