<?php
	class MovieProjection implements JsonSerializable {
		private $Id;
		private $Name;
		private $Duration;
        private $Location;
        private $MovieId;
        private $OwnerId;
		private $Date;
		
        private $Participants;

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
				'duration' => $this->Duration,
                'location' => $this->Location,
                'movieId' => $this->MovieId,
                'ownerId' => $this->OwnerId,
				'date' => $this->Date,
				'participants'=>$this->Participants
			];
		}
	}
?>