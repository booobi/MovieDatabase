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