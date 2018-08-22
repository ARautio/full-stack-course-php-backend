<?php
	session_start();	
	$email = checkValue($_POST,'email');
	$password = checkValue($_POST,'password');
	$login_error = "";

	function checkValue($postArray,$key){
		return isset($postArray[$key]) ? $postArray[$key] : null;
	}

	function emailValid($email){
		return strpos($email,'@') > 0;
	}

	if($_POST && emailValid($email)){
		$conn = new mysqli('localhost','test','fullstack','fullstack');
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$email = $conn->real_escape_string($email);
		$result = $conn->query("SELECT * FROM users WHERE email='$email'");
		print $conn->error;
		if($result->num_rows > 0){
			$user = $result->fetch_assoc();
			if(password_verify($password,$user['password'])){
				$_SESSION['username'] = $email;
			}else {
				$login_error = "Error in login";
			}
		}else {
			$login_error = "Error in login";
		}
	}
?>
<?php print $_SESSION['username']; ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input name="email" type="text" value="<?php echo $email; ?>"/>
	<?php print ($_POST && !emailValid($email)) ? "Error" : ""; ?>
	<input name="password" type="password" />
	<?php print $login_error; ?>
	<input type="submit" value="Login" />
</form>
<a href="logout.php">Logout</a>
