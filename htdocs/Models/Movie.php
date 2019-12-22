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
		private $TrailerSrc;
		private $Awards;
		private $MovieStudio;
		private $MusicStudio;
		private $Actors;
		private $Director;
		private $CreatedOn;
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
				'Id' => $this->Id,
				'Name' => $this->Name,
				'Category' => $this->Category,
				'Rating' => $this->Rating,
				'IMDBRating' => $this->IMDBRating,
				'ReleaseDate' => $this->ReleaseDate,
				'Description' => $this->Description,
				'Country' => $this->Country,
				'Language' => $this->Language,
				'Duration' => $this->Duration,
				'PosterImgSrc' => $this->PosterImgSrc,
				'TrailerSrc' => $this->TrailerSrc,
				'Awards' => $this->Awards,
				'MovieStudio' => $this->MovieStudio,
				'MusicStudio' => $this->MusicStudio,
				'Actors' => $this->Actors,
				'Director' => $this->Director,
				'CreatedOn' => $this->CreatedOn,
				'UpdatedOn' => $this->UpdatedOn
			];
		}
	}
?>