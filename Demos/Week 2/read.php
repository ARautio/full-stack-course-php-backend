<?php

print "<h1>Blog</h1>";

$content = array(
	array("title" => "Good title", "content" => "Here is some content"),
	array("title" => "Good title", "content" => "Here is some content"),
	array("title" => "Good title", "content" => "Here is some content"),
);

foreach($content as $item){
	print "<h2>" . $item["title"] . "</h2>";
	print "<p>" . $item["content"] . "</p>";
	print "<p>Author: Aki Rautio</p>";
	print "<hr/>";
}

?>