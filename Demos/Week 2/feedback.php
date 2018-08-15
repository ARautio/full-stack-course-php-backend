<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
	$conn = new mysqli('localhost','test','fullstack','fullstack');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$saved = $conn->query("INSERT INTO blog_entries (title, author, content) 
	VALUES ('$title','$author','$content')");

	print_r($conn);
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" name="name"/>
</form>