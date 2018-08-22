<?php
$conn = new mysqli('localhost','test','fullstack','fullstack'); // Here your database 

//include("../.../password/password.php");
// ini_get("mysql.default.user");

function checkValue($postArray,$key){
	return isset($postArray[$key]) ? $postArray[$key] : null;
}

function emailValid($email){
	return strpos($email,'@') > 0;
}

function passwordValid($password){
	return strlen($password) >= 8;
}

function passwordsSame($password,$password_again){
	return $password == $password_again;
}

$email = checkValue($_POST,'email');
$password = checkValue($_POST,'password');
$password_again = checkValue($_POST,'password_again');

$database_error = "";


if(emailValid($email) && passwordValid($password) && passwordsSame($password,$password_again)){
	$conn = new mysqli('localhost','test','fullstack','fullstack');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$email = $conn->real_escape_string($email);
	$encrypt_password = password_hash($password, PASSWORD_DEFAULT);
	$saved = $conn->query("INSERT INTO users (email, password) 
		VALUES ('$email','$encrypt_password')");
	$database_error = $conn->errno === 1062 ? 'Email exists' : 'Database error';
}


?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
	<h2>Register</h2>
	<p>Username: <input type="text" name="email" 
		value="<?php echo $email; ?>"/>
		<?php print !emailValid($email) ? 'Error' : ''; ?></p>
	<p>Password: <input type="password" name="password"
		value="<?php echo $password; ?>"/>
		<?php print !passwordValid($password) ? 'Error' : ''; ?></p>
	<p>Password again:<input type="password" name="password_again"
		value="<?php echo $password_again; ?>"/>
		<?php print !passwordsSame($password, $password_again) ? 'Error' : ''; ?></p>
	<p><?php print $database_error; ?></p>
	<p><input type="submit" value="Create"/></p>
</form>
