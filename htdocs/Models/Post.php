<?php
	class MovieParticipant implements JsonSerializable {
		private $Id;
        private $OwnerId;
        private $MovieId;
        private $Content;
		private $Rating;
		private $IsActive;
		
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
				'ownerId' => $this->OwnerId,
				'movieId' => $this->MovieId,
				'content' => $this->Content,
                'rating' => $this->Rating,
                'isActive' => $this->IsActive
			];
		}
	}
?>