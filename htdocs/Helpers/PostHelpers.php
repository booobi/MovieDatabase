<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Post.php';


class PostHelpers {

    public static function addPost($ownerId, $content) {
        DBOperations::prepareAndExecute("INSERT INTO `posts`(`OwnerId`, `Content`) VALUES ('{$ownerId}', '{$content}')");
    }

    public static function editPost($postId, $content) {
        DBOperations::prepareAndExecute("UPDATE `posts` SET `Content`='{$content}' WHERE PostId={$postId}");
    }

    public static function setPostMovieId($postId, $movieId) {
        DBOperations::prepareAndExecute("UPDATE `posts` SET `MovieId`={$movieId} WHERE PostId={$postId}");
    }

    public static function deletePost($postId) {
        DBOperations::prepareAndExecute("DELETE FROM `posts` WHERE PostId={$postId}");
    }
}
?>