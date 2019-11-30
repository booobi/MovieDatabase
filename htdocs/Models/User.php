<?php
	class User implements JsonSerializable {
		private $UserId;
		private $Username;
		private $FirstName;
		private $LastName;
		private $IsActive;
		private $IsApprovedByAdmin;
		private $IsMalicious;
		private $Password;
		private $ConfirmPassword;
		private $Role;//standard, admin
		
		public function __construct ( $Username, $FirstName, $LastName, $Password, $ConfirmPassword ) {
			$this->Username = $Username;
			$this->FirstName = $FirstName;
			$this->LastName = $LastName;
			$this->Password = $Password;
			$this->ConfirmPassword = $ConfirmPassword;
		}
		
		public function createUser($conn){
			$sqlQuery = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1;");
			if($sqlQuery) {
				$sqlQuery->bind_param('s', $this->Username);
				$sqlQuery->execute();
			}
			
			$result = $sqlQuery->get_result();
			$user = mysqli_fetch_assoc($result);
			
			if ($user) {
				// return '{"status": "error", "description": "User already exists"}';
				return json_encode([ 'status' => 'error', 'description' => 'User already exists!']);
			} 
			
			if($this->Password != $this->ConfirmPassword){
				return json_encode([ 'status' => 'error', 'description' => 'Password and Repeat Password do not match!']);
			}
			
			$passwordHashed = md5($this->Password);//encrypt the password before saving in the database
			$sqlQuery = $conn->prepare("INSERT INTO users (firstname, lastname, password, email, role, isactive, ismalicious, isapprovedbyadmin) 
										 VALUES(?, ?, ?, ?, 'standard', 0, 0, 0);");
			if($sqlQuery) {
				$sqlQuery->bind_param('ssss', $this->FirstName, $this->LastName, $passwordHashed, $this->Username);
				$sqlQuery->execute();
			}

			// $_SESSION['username'] = $this->Username;
			// $_SESSION['success'] = "You are now logged in";
			return json_encode([ 'status' => 'success', 'description' => 'Registration was successful! \nPlease check your email for confirmation!']);
		}

		
		public function get($property) {
			if (property_exists($this, $property)) {
			  return $this->$property;
			}
		}
		
		public function jsonSerialize() {
			return [
				'Username' => $this->Username,
				'First Name' => $this->FirstName,
				'Last Name' => $this->LastName,
			];
		}
	}
?>