<?php
	class Festival implements JsonSerializable {
		private $Id;
		private $Name;
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
		
		public function jsonSerialize() {
			return [
				'id' => $this->Id,
				'name' => $this->Name,
				'description' => $this->Description
			];
		}
	}
?>