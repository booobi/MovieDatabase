<?php
	class MovieParticipant implements JsonSerializable {
        private $Movie;
		private $FirstName;
        private $LastName;
		private $Position;
		private $isMainActor;
		
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
				'firstName' => $this->FirstName,
				'lastName' => $this->LastName,
				'position' => $this->Position,
				'isMainActor' => $this->isMainActor
			];
		}
	}
?>