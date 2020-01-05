<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Comment.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';


class CommentHelpers {

    public static function getComment($commentId) {
        $res = DBOperations::prepareAndExecute(
        "SELECT * FROM `comments` WHERE CommentId={$commentId}");

        if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();

                $comment = new Comment();
                $comment->set("Id", $row["CommentId"]);
                $comment->set("UserId", $row['OwnerId']);
                $comment->set("PostId", $row['ParentPostId']);
                $comment->set("ParentCommentId", $row['AnswerToCommentId']);
                $comment->set("Content", $row['Content']);
                $comment->set("IsActive", $row['IsActive']);

                $user = UserHelpers::getUser($row['OwnerId']);
                $comment->set("User", $user);
                $ratingForPost = PostHelpers::getPostRatingForUser($row['PostId'], $row['OwnerId']);
                $comment->set("RatingForPost", $ratingForPost);


                return $comment;
        }

        return NULL;
    }
    public static function getComments() {
        $res = DBOperations::prepareAndExecute(
            "SELECT * FROM `comments`");

        $comments = [];
        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                $comment = new Comment();
                $comment->set("Id", $row["CommentId"]);
                $comment->set("PostId", $row['ParentPostId']);
                $comment->set("ParentCommentId", $row['AnswerToCommentId']);
                $comment->set("Content", $row['Content']);
                $comment->set("IsActive", $row['IsActive']);

                $user = UserHelpers::getUser($row['OwnerId']);
                $comment->set("User", $user);
                $ratingForPost = PostHelpers::getPostRatingForUser($row['ParentPostId'], $row['OwnerId']);
                $comment->set("RatingForPost", $ratingForPost);

                $comments[] = $comment;
            }
        }

        return $comments;
    }

    public static function addComment($userId, $postId, $content) {
        echo "INSERT INTO `comments`(`OwnerId`, `ParentPostId`, `Content`) 
        VALUES ({$userId},{$postId}, '{$content}')
        ";
        DBOperations::prepareAndExecute("
        INSERT INTO `comments`(`OwnerId`, `ParentPostId`, `Content`) 
        VALUES ({$userId},{$postId}, '{$content}')
        ");
    }

    public static function addCommentReply($userId, $postId, $parentCommentId, $content) {
        DBOperations::prepareAndExecute("
        INSERT INTO `comments`(`OwnerId`, `ParentPostId`, `AnswerToCommentId`, `Content`) 
        VALUES ({$userId},{$postId},{$parentCommentId},'{$content}')
        ");
    }

    public static function editComment($commendId, $content) {
        DBOperations::prepareAndExecute("
        UPDATE `comments` SET `Content`='{$content}' WHERE CommentId={$commendId}
        ");
    }

    public static function deleteComment($commendId) {
        DBOperations::prepareAndExecute("
        DELETE FROM `comments` WHERE CommentId={$commendId}
        ");
    }

    public static function setIsActiveState($commentId, $isActive) {
        DBOperations::prepareAndExecute("
        UPDATE `comments` SET `IsActive`={$isActive} WHERE CommentId={$commentId}
        ");
    }
    
}
?>