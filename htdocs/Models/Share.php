<?php
	class Share implements JsonSerializable {
		private $Id;
		private $RequestBy;
        private $RequestTo;
        private $MovieId;
        private $RequesterRating;
        private $ApprovalRating;
        private $IsApproved;
		
		private $Status;

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
				'requestBy' => $this->RequestBy,
				'RequestTo' => $this->RequestTo,
				'movieId' => $this->MovieId,
                'requesterRating' => $this->RequesterRating,
				'approvalRating' => $this->ApprovalRating,
				'isApproved' => $this->IsApproved,
				'status' => $this->Status
			];
		}
	}
?>