<?php
	class Movie implements JsonSerializable {
		private $Name;
		private $Category;
		private $Rating;
		private $ReleaseDate;
		
		public function __construct ( $Name, $Category, $Rating, $ReleaseDate ) {
			$this->Name = $Name;
			$this->Category = $Category;
			$this->Rating = $Rating;
			$this->ReleaseDate = $ReleaseDate;
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
				'Date' => $this->ReleaseDate
			];
		}
	}
?>