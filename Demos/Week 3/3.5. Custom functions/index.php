	<?php

function addNumbers($number1,$number2){
	return $number1 + $number2;
}

function addNumbers(){
	return 5;
}

print addNumbers();

function checkErrors($variable, $error){
	if(strlen($variable) == 0){
		return $error;
	}
	return "";
}

$title = "Title";
$author = "";

$error = Array();
$error['title'] = checkErrors($title,"Error");
$error['author'] = checkErrors($author,"Error");

//print_r($error);


//echo addNumbers(5,1);

$conn = new mysqli('localhost','test','fullstack','fullstack'); // Here your database 
if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}
$blog = ["title"=> "Title", "author" => "Author", 
"content" => "Content"];

function saveValues($conn,$arrayValues){
	foreach($arrayValues as $key => $value){
		$arrayValues[$key] = $conn->real_escape_string($value);
	}
	$keys = "";
	$values = "";	
	foreach($arrayValues as $key => $value){
		$keys = $keys .  $key . ",";
		$values = $values . $value . ",";
	}
	$saves = $conn->query("INSERT INTO blog_entries " .substr($keys,0,-1) . " VALUES (" . substr($values,0,-1) . ");");

}

saveValues($conn,$blog);


?>
