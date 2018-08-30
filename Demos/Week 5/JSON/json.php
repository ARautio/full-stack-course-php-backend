<?php

$myArr = array("John", "Mary", "Peter", "Sally");

$myJSON = json_encode($myArr);

$myArray = json_decode($myJSON);

echo $myJSON;
print_r($myArray);
?>
