<?php
	class Festival implements JsonSerializable {
		private $Name;
		private $Description;
		
		public function __construct ($Name, $Description) {
			$this->Name = $Name;
			$this->Description = $Description;
		}
		
		public function get($property) {
			if (property_exists($this, $property)) {
			  return $this->$property;
			}
		}
		
		public function jsonSerialize() {
			return [
				'Name' => $this->Name,
				'Description' => $this->Description
			];
		}
	}
?>