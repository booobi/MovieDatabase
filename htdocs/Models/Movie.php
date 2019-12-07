<?php
	class Movie implements JsonSerializable {
		private $Id;
		private $Name;
		private $Category;
		private $Rating;
		private $IMDBRating;
		private $ReleaseDate;
		private $Description;
		private $Country;
		private $Language;
		private $Duration;
		private $PosterImgSrc;
		private $createdOn;
		private $UpdatedOn;
		
		public function get($property) {
			if (property_exists($this, $property)) {
			  return $this->$property;
			}
		}

		public function set($property, $val) {
			if (property_exists($this, $property)) {
				$this->$property = $val;
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