<?php
session_start();

$conn = new mysqli('localhost','test','fullstack','fullstack');
$username = $_SESSION['username'];
$result = $conn->query("SELECT id FROM users WHERE email='$username'");
$row = $result->fetch_assoc();
$user_id = $row['id'];


$result = $conn->query("DELETE FROM tokens WHERE user_id='$user_id'");


unset($_SESSION['username']);

session_destroy();
header("Location: login.php");

?>
