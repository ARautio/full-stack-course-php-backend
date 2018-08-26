<?php
	print_r($_POST);
?>
<html>
	<head>
		<title>Editor</title>

		<!-- 1. Add follwoing rows -->
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'#tiny' });</script>
		
	</head>
	<body>
		<form method="post">
			<!-- 2. Add textarea with id the same as in init script -->
			<textarea id="tiny" name="text2"> </textarea>
			<input type="submit" value="Save"/>
		</form>
	</body>
</html>
