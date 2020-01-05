<?php
	class Comment implements JsonSerializable {
		private $Id;
        private $PostId;
        private $ParentCommentId;
        private $Content;
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
				'postId' => $this->PostId,
				'parentCommentId' => $this->ParentCommentId,
                'content' => $this->Content,
                'isActive' => $this->IsActive
			];
		}
	}
?>