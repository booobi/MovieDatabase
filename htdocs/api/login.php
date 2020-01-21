<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
	
	session_start();
	
	if (isset($_POST['email']) &&  isset($_POST['password'])){
		$userId = UserHelpers::getUserIdByUsername($_POST['email']);
		$user = $userId ? UserHelpers::getUser($userId) : NULL;

		//check if user exists
		if($user) {
			//&& $row["IsActive"] == 1){ -- this rule should apply when email confirmation is complete
			if($user->get("Password") == md5($_POST['password']) 
			&& !$user->get("IsMalicious")
			&& $user->get("IsApprovedByAdmin")
			&& $user->get("IsActive")){ 
				$_SESSION['userLoggedIn'] = true;
				$_SESSION['username'] = $_POST['email'];
				$_SESSION['isAdmin'] = $user->isAdmin();
				echo json_encode([ 'status' => 'success', 'description' => 'You have successfully logged in!']);
			} else {
				echo json_encode([ 'status' => 'error', 'description' => 'Please check your username and password or wait for activation!']);
			}
		}

		else {
			echo json_encode([ 'status' => 'error', 'description' => 'Please check your username and password!']);
		}
	}
?>