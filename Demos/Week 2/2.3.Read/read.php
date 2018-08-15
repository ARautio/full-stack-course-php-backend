<!doctype html>
<html>
	<head>
			<title>Blog Read</title>
	</head>
	<body>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null; 
$year_month = isset($_GET['month']) ? $_GET['month'] : null;
$error = "";

$conn = new mysqli('localhost','test','fullstack','fullstack'); // 	Here your database 
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$selection = "";
if(is_numeric($id)){
	$selection = " WHERE id=" . $id;
}
	
if(strlen($year_month) == 7){ // TODO: Additional check for the content
	list($year,$month) = explode('-',$year_month);
	$selection = " WHERE year(date)=" . $year . " AND month(date)=" .$month;
}

$entries = $conn->query("SELECT * FROM blog_entries" . $selection);

if($entries && $entries->num_rows > 0 ){
	while($row = $entries->fetch_assoc()){
?>
	<h1><a href="read.php?id=<?php print $row['id']; ?>"><?php print $row['title']; ?></a></h1>
	<h2><?php print $row['author']; ?> / <?php print $row['date']; ?></h2>
	<div><?php print $row['content']; ?></div>
<?php
	}
}else {
	$error = "<p>No blog entries to show</p>";
}
print $error;
?>
	</body>
</html>
