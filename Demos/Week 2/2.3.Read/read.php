<!doctype html>
<html>
	<head>
			<title>Blog create</title>
	</head>
	<body>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
$year_month = isset($_GET['month']) ? $_GET['month'] : null;
$error = "";

$conn = new mysqli('localhost','test','fullstack','fullstack'); 
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$filter = "";
if($id != null){
	$id = $conn->real_escape_string($id);
	$filter = " WHERE id=" . $id;
}

if($year_month != null && strlen($year_month) == 7){
	$year_month = $conn->real_escape_string($year_month); // 2018-05
	list($year,$month) = explode('-',$year_month);
	$filter = " WHERE year(date)=" . $year . " AND month(date)=" . $month;
}

$entries = $conn->query("SELECT * FROM blog_entries" . $filter);

if($entries){
	if($entries->num_rows == 0){
		$error = "No blog entry to show";
	}
	while($row = $entries->fetch_assoc()){
	?>
		<h1><a href="read.php?id=<?php print $row['id'] ;?>">
			<?php print $row['title']; ?>
		</a></h1>
		<h2><?php print $row['date']; ?> / <?php print $row['author']; ?></h2>
		<div><?php print $row['content']; ?></div>
	<?php
	}
}else{
	$error = "Error finding a content";
}

print "<p>" . $error . "</p>";
?>
	</body>
</html>
