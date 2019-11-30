<?php
	include '../includes/DBCredentials.php';
	include '../Models/User.php';
	
	session_start();
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if ( isset($_POST['email']) &&  isset($_POST['password']) ){
		$sqlQuery = $conn->prepare("SELECT users.UserId AS UserId
					, users.FirstName AS FirstName
					, users.LastName AS LastName
					, users.Password AS Password
					, users.Email AS Email
					, users.Role AS Role
					, users.IsActive AS IsActive
					, users.IsMalicious AS IsMalicious
					, users.IsMalicious AS IsApprovedByAdmin
				FROM users
				WHERE users.Email = ?
				LIMIT 1;");
		
		$sqlQuery->bind_param('s', $_POST['email']);
		$sqlQuery->execute();
		$result = $sqlQuery->get_result();
		 
		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				if($row["Password"] == md5($_POST['password']) && $row["IsMalicious"] == 0){ //&& $row["IsActive"] == 1){ -- this rule should apply when email confirmation is complete
					$_SESSION['userloggedin'] = true;
					$_SESSION['username'] = $_POST['email'];
					echo json_encode([ 'status' => 'success', 'description' => 'You have successfully logged in!']);
				} else {
					echo json_encode([ 'status' => 'error', 'description' => 'Please check your username and password!']);
				}
			}
			
			//$objJSON = json_encode($productsList);
			//echo $objJSON;
			
		} else {
			echo json_encode([ 'status' => 'error', 'description' => 'Please check your username and password!']);
		}
	}
	mysqli_close($conn)
	//$conn->close;
?>