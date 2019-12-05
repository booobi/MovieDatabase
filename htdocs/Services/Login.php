<?php
	include '../Helpers/UserHelpers.php';
	
	session_start();
	
	if (isset($_POST['email']) &&  isset($_POST['password'])){
		
		$user = UserHelpers::getUser($_POST['email']);

		//check if user exists
		if($user) {
			//&& $row["IsActive"] == 1){ -- this rule should apply when email confirmation is complete
			if($user->get("Password") == md5($_POST['password']) && $user->get("IsMalicious") == 0){ 
				$_SESSION['userLoggedIn'] = true;
				$_SESSION['username'] = $_POST['email'];
				$_SESSION['isAdmin'] = $user->isAdmin();
				echo json_encode([ 'status' => 'success', 'description' => 'You have successfully logged in!']);
			} else {
				echo json_encode([ 'status' => 'error', 'description' => 'Please check your username and password!']);
			}
		}

		else {
			echo json_encode([ 'status' => 'error', 'description' => 'Please check your username and password!']);
		}
	}
?>