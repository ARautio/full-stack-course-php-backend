<?php
	print_r($_POST);
?>
<html>
	<head>
		<title>Editor</title>

		<!-- 1. You need to download these files and following lines to head tag -->
		<script src="wysirules.js"></script>
		<script src="wysihtml5-0.3.0.min.js"></script>
		<link href="wysi.css" rel="stylesheet">

	</head>
	<body>
		<form method="post">
			<!-- 2. Add Toolbar and Textarea -->
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
			<input type="submit" value="Save"/>
		</form>
		<!-- 3. Add editor script and check that toolbar and textarea elements match -->
		<script>
			var editor = new wysihtml5.Editor("wysihtml5-textarea", { // id of textarea element
				toolbar:      "wysihtml5-toolbar", // id of toolbar element
				parserRules:  wysihtml5ParserRules // defined in parser rules set 
			});
		</script>
	</body>
</html>
