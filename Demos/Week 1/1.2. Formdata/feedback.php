<?php
	$name = isset($_POST['name']) ? $_POST['name'] : '';

	if(strlen($name) > 0){
		print $name;
	}else{
		print "Please add a name.";
	}
?>