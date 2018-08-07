<?php
include 'Users.php';

$usersObject = new Users(); // This one creates a new object from class. 

$usersObject->addUser("Karolina"); // Class has a function called addUser.

$users = $usersObject->users; // Class has also a variable users;

print_r($users); // Prints Karolina
print "<br/>";
print_r($usersObject->users); // Prints Karolina
print "<br/>";

// Both of the following ways works the same when printing.

$usersObject->addUser("Lukas");

print_r($users); // Prints Karolina
print "<br/>";
print_r($usersObject->users); // Prints Karolina and Lukas
print "<br/>";

// But since variable has the state at the time of assignment it won't have updated value.

$usersObject->removeUser(1); // Class has also removeUser function.

print_r($usersObject->users); // Prints Karolina

$usersObject2 = new Users();
$usersObject2->addUser("Greta");

print_r($usersObject2); // Prints Greta
print_r($usersObject); // Prints Karolina


?>