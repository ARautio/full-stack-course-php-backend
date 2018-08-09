<?php
	$title = isset($_POST['title']) ? $_POST['title'] : '';
	$author = isset($_POST['author']) ? $_POST['author'] : '';
	$content = isset($_POST['content']) ? $_POST['content'] : '';
	$success = 	isset($_GET['success']) ? $_GET['success'] : '';
	$error = array("title" => "","author" => "", "content" => "","database" => "");

	if($_POST){
		if(strlen($title) == 0 || strlen($author) == 0 || strlen($content) == 0){
			if(strlen($title) == 0){
				$error['title'] = 'Error';
			}
			if(strlen($author) == 0){
				$error['author'] = 'Error';
			}

			if(strlen($content) == 0){
				$error['content'] = 'Error';
			}
		
		}else {
		
			$conn = new mysqli('localhost','test','fullstack','fullstack'); // Here your database 
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$title = $conn->real_escape_string($title);
			$author = $conn->real_escape_string($author);
			$content = $conn->real_escape_string($content);

			$saved = $conn->query("INSERT INTO blog_entries (title, author, content) 
				VALUES ('$title','$author','$content')");
			if($saved){
				header('Location: ' . $_SERVER['PHP_SELF'] . '?success=OK');
			}else{
				$error['database'] = "Error when saving";
			}
		}
	}

	if(strlen($success) == 0) {
?>
<!doctype html>
<html>
	<head>
			<title>Blog create</title>
	</head>
	<body>
		<h2>Add blog text</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<p>Title: 
				<input type="text" name="title" 
					value="<?php echo $title; ?>"/>
				<?php echo $error['title']; ?>
			</p>
			<p>Author: <input type="text" name="author" 
				value="<?php echo $author; ?>"/>
				<?php echo $error['author']; ?></p>
			<p>Content: 
				<textarea name="content"><?php echo $content; ?></textarea>
				<?php echo $error['content']; ?>
			</p>
			<?php echo $error['database']; ?>
			<p><?php echo $success; ?>
			<p><input type="submit" value="Save"></p>
		</form>
	</body>
</html>
<?php
	}else {
		print "Ok";
	}
?>