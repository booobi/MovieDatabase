<?php
	include '../includes/DBCredentials.php';
	include '../Models/User.php';
	header('Cache-Control: no-cache, must-revalidate');
	header('Access-Control-Allow-Origin: *');
	//header('Content-Type: application/json');
	session_start();

	// connect to the database $conn = new mysqli($servername, $username, $password, $connname); mysqli_connect('localhost', 'root', '', 'registration');
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

// // REGISTER USER
	if ( isset($_POST['email']) &&  isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['password']) && isset($_POST['confirm_password']))  {
		$username = mysqli_real_escape_string($conn, $_POST['email']);
		$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
		$objUser = new User($username, $first_name, $last_name, $password, $confirm_password);
		echo ($objUser->createUser($conn));
		// $conn->close();
	}
	$conn->close();
	
?>