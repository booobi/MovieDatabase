<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Post.php';


class PostHelpers {

    public static function getPost($postsId) {
        $res = DBOperations::prepareAndExecute(
        "SELECT * FROM `posts` WHERE PostId={$postId}");

        if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();

                $post = new Post();
                $post->set("Id", $row["PostId"]);
                $post->set("OwnerId", $row['OwnerId']);
                $post->set("MovieId", $row['MovieId']);
                $post->set("Rating", $row['Rating']);
                $post->set("Content", $row['Content']);
                $post->set("IsActive", $row['IsActive']);

                return $post;
        }

        return NULL;
    }
    public static function getPosts() {
        $res = DBOperations::prepareAndExecute(
            "SELECT * FROM `posts`");

        $posts = [];
        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                $post = new Post();
                $post->set("Id", $row["PostId"]);
                $post->set("OwnerId", $row['OwnerId']);
                $post->set("MovieId", $row['MovieId']);
                $post->set("Rating", $row['Rating']);
                $post->set("Content", $row['Content']);
                $post->set("IsActive", $row['IsActive']);

                $posts[] = $post;
            }
        }

        return $posts;
    }

    public static function addPost($ownerId, $content) {
        DBOperations::prepareAndExecute("INSERT INTO `posts`(`OwnerId`, `Content`) VALUES ('{$ownerId}', '{$content}')");
    }

    public static function editPost($postId, $content) {
        DBOperations::prepareAndExecute("UPDATE `posts` SET `Content`='{$content}' WHERE PostId={$postId}");
    }

    public static function ratePost($userId, $postId, $rating) {
		
		$existingRatingRes = 
	DBOperations::prepareAndExecute("SELECT UserId FROM userratings WHERE UserId = {$userId} AND PostId = {$postId}");

		$operation;
		//if rating for this movie from this user exists -> update the rating
		if ($existingRatingRes->num_rows > 0) {
			$operation = "update";
			DBOperations::prepareAndExecute("
			UPDATE `userratings` SET `PostRating`= {$rating} WHERE UserId = {$userId} AND PostId={$postId}");
		} else {
			$operation = "create";
			DBOperations::prepareAndExecute("
			INSERT INTO `userratings`(`UserId`, `PostId`, `PostRating`) VALUES ({$userId},{$postId},{$rating});");
		}

		//update global user rating with average
		DBOperations::prepareAndExecute(
			"UPDATE posts SET Rating = 
				(SELECT AVG(userratings.PostRating) 
				FROM userratings 
				WHERE userratings.PostId = {$postId}) 
				WHERE PostId={$postId};");

		
		return $operation;
    }
    
    public static function setPostMovieId($postId, $movieId) {
        DBOperations::prepareAndExecute("UPDATE `posts` SET `MovieId`={$movieId} WHERE PostId={$postId}");
    }

    public static function deletePost($postId) {
        DBOperations::prepareAndExecute("DELETE FROM `posts` WHERE PostId={$postId}");
    }

    public static function getPostRatingForUser($postId, $userId) {
        $res = DBOperations::prepareAndExecute("SELECT PostRating FROM `userratings` WHERE UserId={$userId} AND PostId={$postId}");
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            return $row['PostRating'];    
        }
    }
}
?>