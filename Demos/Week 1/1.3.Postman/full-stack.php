<?php
function my_simple_crypt( $string, $action = 'e' ) {
	// you may change these values to your own
	$secret_key = 'my_simple_secret_key';
	$secret_iv = 'my_simple_secret_iv';

	$output = false;
	$encrypt_method = "AES-256-CBC";
	$key = hash( 'sha256', $secret_key );
	$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

	if( $action == 'e' ) {
			$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	}
	else if( $action == 'd' ){
			$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	}

	return $output;
}

	$first_name = isset($_GET['firstname']) ? $_GET['firstname'] : '';
	$last_name = isset($_POST['lastname']) ? $_POST['lastname'] : '';
	$decrypt = isset($_GET['de']) ? $_GET['de'] : 'off';
	$first = isset($_GET['first']) ? $_GET['first'] : '';
	$last = isset($_GET['last']) ? $_GET['last'] : '';
	if($decrypt == 'on'){
		print my_simple_crypt($fist,'d');
		print my_simple_crypt($last,'d');
	}else {
		if($first_name == '' && $last_name == ''){
			print "Error: No values.";
		} else {
			$encrypt = $first_name . $last_name;
			print "Answer (copy following to the assignment answer): " . my_simple_crypt($encrypt);
		}
	}
?>