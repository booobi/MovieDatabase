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
		private $Role;//standard, admin
		
		public function __construct () {
		}

		public function set($property, $val) {
			if (property_exists($this, $property)) {
				$this->$property = $val;
			  }
		}

		public function get($property) {
			if (property_exists($this, $property)) {
			  return $this->$property;
			}
		}

		public function isAdmin() {
			return $this->get('Role') == 'admin';
		}
		
		public function jsonSerialize() {
			return [
				'userId' => $this->UserId,
				'username' => $this->Username,
				'firstName' => $this->FirstName,
				'lastName' => $this->LastName,
				'isActive' => $this->IsActive,
				'isApprovedByAdmin' => $this->IsApprovedByAdmin,
				'isMalicious'=> $this->IsMalicious,
				'password' => $this->Password,
				'role' => $this->Role
			];
		}
	}
?>