<?php
	class Category implements JsonSerializable {
		private $Id;
        private $Name;
        private $IsActive;
        private $Description;
		
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
		
		public function __toString()
		{
			return $this->Name;
		}

		public function jsonSerialize() {
			return [
				'id' => $this->Id,
				'name' => $this->Name,
				'isActive' => $this->IsActive,
				'description' => $this->Description
			];
		}
	}
?>