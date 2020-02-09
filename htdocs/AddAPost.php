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
    <link rel="stylesheet" href="/css/posts.css">
    <link rel="stylesheet" href="/css/duplicated.css">
</head>

<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/Header.php';
    ?>


<div class = "public-posts-title">
    Posts
</div>
<button class = "add-post-btn" onclick="showPostForm()">Add a post</button>
<div id = "public-posts-container">
    <div class = "public-posts-scroller">
        <div id = "public-posts-box">
            <table class="public-posts-tbl">
                <tr>
                    <th class = "col-public-post">
                        Post
                    </th>
                    <th class = "col-public-movie">
                        Movie
                    </th>
                    <th class = "col-public-rating">
                        Rating
                    </th>
                    <th class = "col-public-options">
                        Options
                    </th>
                </tr>
                <?php
                
                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
                $posts = PostHelpers::getPosts();

                foreach($posts as $post) {
                    $postMovie = $post->get("MovieId") ? MovieHelpers::getMovie($post->get("MovieId")) : NULL;
                    echo '
                    <tr>
                        <td class = "row-public-post">
                            ' . $post->get("Content") . '
                        </td>
                        <td class = "row-public-movie">
                        ' . ($postMovie ? $postMovie->get("Name") : '') . '
                        </td>
                        <td class = "row-public-rating">
                        ' . $post->get("Rating") . '
                        </td>
                        <td class = "row-public-options">';
                        $currentUser = UserHelpers::getCurrentUser();

                        if($currentUser) {
                            $isOwner = PostHelpers::userIsOwnerOfPost(UserHelpers::getCurrentUser()->get('UserId'), $post->get('Id'));
            
                            if($isOwner || UserHelpers::currentUserIsAdmin()) {
                                echo '
                                <button class = "edit-post-btn" onclick="showEditPostForm(' . ($post->get("Id")) . ')">Edit</button>
                                <button onclick="deletePost(' . ($post->get("Id")) . ')" class = "delete-post-btn">Delete</button>
                                ';
                            } else {
                                echo '
                                <button class = "add-rating-btn" onclick="showRatingForm(' . ($post->get("Id")) . ')">Give a rating</button>
                                ';
                            }
                        }
                       
                        echo '
                            <button class = "details-post-btn"><a href = "/PostDetails.php?id='. $post->get("Id") .'">Details </a></button>
                        </td>
                    </tr>
                    ';
                }
            ?>
            </table>
        </div>
    </div>
</div>

<div id = "new-post-container">
    <img class = "close-btn" id="new-post-close-btn" src="/images/xbutton.png">
    <div id = "new-post-box">
        <form action="#" id="new-post-form">
            <textarea required id = "new-post-text" placeholder="Description . . . " maxlength="540"></textarea>
            <button type="submit" id="submit-new-post">Submit</button>
        </form>
    </div>
</div>

<div id = "edit-post-container">
    <img class = "close-btn" id="edit-post-close-btn" src="/images/xbutton.png">
    <div id = "edit-post-box">
        <form action="#" id="edit-post-form">
            <textarea id = "edit-post-text" placeholder="Description . . . " maxlength="540"></textarea>
            <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                if(isset($_SESSION['userLoggedIn']) && UserHelpers::getCurrentUser()->get("Role") == 'admin'){
                    echo '
                    <label for="post-movie">Select a movie for the post:</label>
                    <select name="post-movie" id="post-movie"></select>
                    ';
                }
            ?>
            <button type="submit" id="submit-post-changes">Submit</button>
        </form>
    </div>
</div>

<div id = "rating-container">
    <img class="close-btn" id="add-rating-close-btn" src="/images/xbutton.png">
    <div id = "add-rating-box">
        <select id='rating-select' type = "number">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
</div>

<script src="/js/posts.js"></script>

</body>