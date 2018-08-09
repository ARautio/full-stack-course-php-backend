<?php
// Let's first check whethre we have all needed data
$title = isset($_POST['title']) ? $_POST['title'] : '';
$author = isset($_POST['author']) ? $_POST['author'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';

?>
<!doctype html>
<html>
	<head>
			<title>Blog create</title>
	</head>
	<body>
		<h2>Add blog text</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<p>Name: <input type="text" name="title" value="<?php echo $title; ?>"/></p>
			<p>Author: <input type="text" name="author" value="<?php echo $author; ?>"/></p>
			<p>Content: <textarea name="content"><?php echo $content; ?></textarea></p>
			<p><input type="submit" value=" Save" class="update_button"/></p>
		</form>
	</body>
</html>