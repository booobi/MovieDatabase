<?php
	include '../Helpers/UserHelpers.php';

	header('Cache-Control: no-cache, must-revalidate');
	header('Access-Control-Allow-Origin: *');
	//header('Content-Type: application/json');

	session_start();

	if (
		isset($_POST['email']) 
		&& isset($_POST['first_name']) 
		&& isset($_POST['last_name']) 
		&& isset($_POST['password']) 
		&& isset($_POST['confirm_password'])) {

		if($_POST['password'] != $_POST['confirm_password']) {
			echo json_encode([ 'status' => 'error', 'description' => 'Password and Repeat Password do not match!']);
		}

		else {
			echo UserHelpers::createUser($_POST['email'], $_POST['password'], $_POST['first_name'], $_POST['last_name']);
		}
	}
?>