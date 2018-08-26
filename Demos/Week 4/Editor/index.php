<?php
	print_r($_POST);
?>
<html>
	<head>
		<title>Editor</title>
		<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
		<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		
		<script src="wysirules.js"></script>
		<script src="wysihtml5-0.3.0.min.js"></script>
		<link href="wysi.css" rel="stylesheet">

		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'#tiny' });</script>
		
	</head>
	<body>
		<form method="post">
			<!-- Quill -->			
			<div id="editor">
  			<p>Hello World!</p>
  			<p>Some initial <strong>bold</strong> text</p>
  			<p><br></p>
			</div>
			
			<!-- WYSI -->
			<div id="wysihtml5-toolbar" style="display: none;">
				<a data-wysihtml5-command="bold">bold</a>
				<a data-wysihtml5-command="italic">italic</a>
				
				<!-- Some wysihtml5 commands require extra parameters -->
				<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">red</a>
				<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">green</a>
				<a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">blue</a>
				
				<!-- Some wysihtml5 commands like 'createLink' require extra paramaters specified by the user (eg. href) -->
				<a data-wysihtml5-command="createLink">insert link</a>
				<div data-wysihtml5-dialog="createLink" style="display: none;">
					<label>
						Link:
						<input data-wysihtml5-dialog-field="href" value="http://" class="text">
					</label>
					<a data-wysihtml5-dialog-action="save">OK</a> <a data-wysihtml5-dialog-action="cancel">Cancel</a>
				</div>
			</div>		
			<textarea id="wysihtml5-textarea" name="text"> </textarea>

			<textarea id="tiny" name="text2"> </textarea>
			<input type="submit" value="Save"/>
		</form>
		<script>
  		var quill = new Quill('#editor', {
    		theme: 'snow'
  		});
		</script>
		
		<script>
			var editor = new wysihtml5.Editor("wysihtml5-textarea", { // id of textarea element
				toolbar:      "wysihtml5-toolbar", // id of toolbar element
				parserRules:  wysihtml5ParserRules // defined in parser rules set 
			});
		</script>
	</body>
</html>
