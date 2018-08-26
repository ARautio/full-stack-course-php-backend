<?php
	print_r($_POST);
?>
<html>
	<head>
		<title>Editor</title>
		<!-- 1. Add following two rows. These use CDN so no need to download anything. -->
		<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
		<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		
	</head>
	<body>
		<form method="post">
			<!-- 2. Add div to have the editor-->			
			<div id="editor">
  			<p>Hello World!</p>
  			<p>Some initial <strong>bold</strong> text</p>
  			<p><br></p>
			</div>
			
			
			<input type="submit" value="Save"/>
		</form>
		<!-- 3. Add following script and check that #editor matches with div id.-->			
		<script>
  		var quill = new Quill('#editor', {
    		theme: 'snow'
  		});
		</script>
		<!-- 4. Unfortunately this doesn't create texarea so you have do 
			a javascript to manage the form submit -->
	</body>
</html>
