<?php
	session_start();
	$_SESSION['userloggedin'] = false;
	echo json_encode([ 'status' => 'success', 'description' => 'You have successfully logged out!']);
?>