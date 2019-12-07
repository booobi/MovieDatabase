<?php
	class Movie implements JsonSerializable {
		private $Name;
		private $Category;
		private $Rating;
		private $ReleaseDate;
		private $createdOn;
		private $Description;
		
		public function __construct ( $Name, $Category, $Description, $Rating, $ReleaseDate, $CreatedOn ) {
			$this->Name = $Name;
			$this->Category = $Category;
			$this->Rating = $Rating;
			$this->ReleaseDate = $ReleaseDate;
			$this->CreatedOn = $CreatedOn;
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
				'Category' => $this->Category,
				'Rating' => $this->Rating,
				'ReleaseDate' => $this->ReleaseDate,
				'CreatedOn' => $this->CreatedOn
			];
		}
	}
?>