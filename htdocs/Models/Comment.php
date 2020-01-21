<?php
	class Comment implements JsonSerializable {
		private $Id;
		private $UserId;
        private $PostId;
        private $ParentCommentId;
        private $Content;
		private $IsActive;
		private $CreatedOn;

		private $User;
		private $Post;
		private $RatingForPost;
		
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
				'userId' => $this->UserId,
				'postId' => $this->PostId,
				'parentCommentId' => $this->ParentCommentId,
                'content' => $this->Content,
				'isActive' => $this->IsActive,
				'ratingForPost' => $this->RatingForPost,
				'user' => $this->User->get("Username"),
				'post' => $this->Post->get("Content"),
				'createdOn' => $this->CreatedOn
			];
		}
	}
?>