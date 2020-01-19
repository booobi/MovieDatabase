<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/post-details.css">
    <link rel="stylesheet" href="/css/duplicated.css">
</head>

<body>
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Header.php';
    if(!isset($_GET['id'])) {
        echo "You need to provide an id to access this page";
        die();
    }
?>

<div class = "post-title">
    Post
</div>
<div id = "post-box">
            <table class="post-tbl">
                <tr>
                    <th class = "col-post">
                        Post
                    </th>
                    <th class = "col-movie">
                        Movie
                    </th>
                    <th class = "col-rating">
                        Rating
                    </th>
                </tr>
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
                $post = PostHelpers::getPost($_GET['id']);

                $postMovie = $post->get("MovieId") ? MovieHelpers::getMovie($post->get("MovieId"))->get('Name') : NULL;
                    echo '
                    <tr>
                        <td class = "row-post">
                            ' . $post->get("Content") . '
                        </td>
                        <td class = "row-movie">
                        ' . $postMovie . '
                        </td>
                        <td class = "row-rating">
                        ' . $post->get("Rating") . '
                        </td>
                    </tr>
                    ';
                ?>
            </table>
        </div>

<div class = "public-comments-title">
    Comments
</div>
<?php
echo '<button class = "add-comment-btn" onclick="showCommentForm('. $_GET['id'] .')">Add a comment</button>'
?>
<div id = "public-comments-container">
    <div class = "public-comments-scroller">
        <div id = "public-comments-box">
            <table class="public-comments-tbl">
                <tr>
                    <th class = "col-public-comment">
                        Comment
                    </th>
                    <th class = "col-public-user">
                        User
                    </th>
                    <th class = "col-public-user-rating">
                        User rating
                    </th>
                    <th class = "col-public-comments-options">
                        Options
                    </th>
                </tr>
                <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CommentHelpers.php';
                $comments = CommentHelpers::getCommentsForPost($_GET['id']);

                foreach($comments as $comment) {
                    echo '
                    <tr>
                        <td class = "row-public-comment">
                            ' . $comment->get("Content") . '
                        </td>
                        <td class = "row-public-user">
                        ' . $comment->get("User")->get("Username") . '
                        </td>
                        <td class = "row-public-user-rating">
                        ' . $comment->get("RatingForPost") . '
                        </td>
                        <td class = "row-public-comments-options">
                            <button class = "edit-comment-btn" onclick="showEditCommentForm(' . $comment->get("Id") . ')">Edit</button>
                            <button onclick="deleteComment(' . $comment->get("Id") . ')" class = "delete-comment-btn">Delete</button>
                        </td>
                    </tr>
                    ';
                }
                ?>
            </table>
        </div>
    </div>
</div>

<div id = "new-comment-container">
    <img class = "close-btn" id="new-comment-close-btn" src="/images/xbutton.png">
    <div id = "new-comment-box">
        <form action="#" id="new-comment-form">
            <textarea required id = "new-comment-text" placeholder="Comment. . . " maxlength="540" ></textarea>
            <button type="submit" id="submit-new-comment">Submit</a>
        </form>
    </div>
</div>

<div id = "edit-comment-container">
    <img class = "close-btn" id="edit-comment-close-btn" src="/images/xbutton.png">
    <div id = "edit-comment-box">
        <form action="#" id="edit-comment-form">
            <textarea required id = "edit-comment-text" placeholder="Comment . . . " maxlength="540" ></textarea>
            <button type="submit" id="submit-comment-changes">Submit</button>
        </form>
    </div>
</div>

<script src="/js/postdetails.js"></script>
</body>