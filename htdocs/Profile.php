<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/duplicated.css">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/Header.php';
    ?>
    <div class="watchlater-title">
        Watchlater
    </div>
    <div id="users-watchlater-container">
        <div id="edit-details-box">
            <form id="details-form">
                <h2>Edit details</h2>
                <input required id="details-email" class="details-field" placeholder="Email . . ." type="email">
                <input required id="details-firstname" class="details-field" placeholder="First name . . ." type="text">
                <input required id="details-lastname" class="details-field" placeholder="Last name . . . " type="text">
                <button type="submit" id="submit-details">Save changes</button>
            </form>
        </div>
        <div class="watchlater-scroller">
            <div id="watchlater-box">
                <table class="watch-later-tbl" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            Going on 30
                        </td>
                    </tr>
                    <tr>
                        <td>
                            It's A Wonderful Life
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Never Backdown
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Avatar
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Manhattan
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="edit-password-box">
            <form action="#" id="password-form">
                <h2>Edit password</h2>
                <input required id="password-email" class="password-field" placeholder="Old password . . ."
                    type="password">
                <input required minlength=6 id="password-firstname" class="password-field"
                    placeholder="New password . . ." type="password">
                <input required minlength=6 id="password-lastname" class="password-field"
                    placeholder="Repeat new password . . ." type="password" type="text">
                <button type="submit" id="submit-password">Save changes</button>
            </form>
        </div>
    </div>
    <div class="posts-title">
        My posts
    </div>
    <div id="posts-container">
        <div class="posts-scroller">
            <div id="posts-box">
                <table class="posts-tbl">
                    <tr>
                        <th class="col-posts-posts">
                            Post
                            <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                        </th>
                        <th class="col-posts-comments">
                            Comments count
                        </th>
                        <th class="col-posts-rating">
                            Rating
                            <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                        </th>
                        <th class="col-posts-date">
                            Date
                        </th>
                        <th class="col-comments-btn">
                        </th>
                    </tr>

                    <?php
                        include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
                        include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                        include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CommentHelpers.php';

                        $userId = UserHelpers::getCurrentUser()->get("UserId");
                        
                        $posts = PostHelpers::getPostsByUser($userId);

                        foreach($posts as $post) {
                            $postComments = CommentHelpers::getCommentsForPost($post->get("Id"));

                            echo '
                        <tr>
                            <td class="row-posts-posts">
                                ' . $post->get('Content') . '
                            </td>
                            <td class="row-posts-comments">
                                ' . count($postComments) . '
                            </td>
                            <td class="row-posts-rating">
                                ' . ($post->get('Rating') ? $post->get('Rating') : 'None') . '
                            </td>
                            <td class="row-posts-date">
                                ' . ($post->get('CreatedOn')) . '
                            </td>
                            <td class="row-comments-btn">
                                <button onclick="showComments()">Comments</button>
                            </td>
                        </tr>
                            ';
                        }
                    ?>


                    <tr>
                        <td class="row-posts-posts">
                            Please, add "Avatar"
                        </td>
                        <td class="row-posts-comments">
                            10
                        </td>
                        <td class="row-posts-rating">
                            9
                        </td>
                        <td class="row-posts-date">
                            2 Sep 2019
                        </td>
                        <td class="row-comments-btn">
                            <button onclick="showComments()">Comments</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="row-posts-posts">
                            I really want to watch "Casablanca"!
                        </td>
                        <td class="row-posts-comments">
                            12
                        </td>
                        <td class="row-posts-rating">
                            8
                        </td>
                        <td class="row-posts-date">
                            21 Sep 2010
                        </td>
                        <td class="row-comments-btn">
                            <button>Comments</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="row-posts-posts">
                            Add the ,,Shutter Island", it's worth it>
                            <!-- max length = 40-->
                        </td>
                        <td class="row-posts-comments">
                            7
                        </td>
                        <td class="row-posts-rating">
                            5
                        </td>
                        <td class="row-posts-date">
                            5 Jan 2015
                        </td>
                        <td class="row-comments-btn">
                            <button>Comments</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="row-posts-posts">
                            Add the ,,Shutter Island", it's worth it>
                            <!-- max length = 40-->
                        </td>
                        <td class="row-posts-comments">
                            7
                        </td>
                        <td class="row-posts-rating">
                            5
                        </td>
                        <td class="row-posts-date">
                            5 Jan 2015
                        </td>
                        <td class="row-comments-btn">
                            <button>Comments</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div id="comments-container">
        <img class="close-btn" id="comments-close-btn" src="xbutton.png" onclick="hideComments()">
        <div id="comments-box">
            <div class="comments-scroller">
                <table class="comments-tbl">
                    <tr>
                        <th class="col-post-comment">
                            Comment
                        </th>
                        <th class="col-post-post">
                            Post
                            <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                        </th>
                        <th class="col-post-username">
                            Username
                        </th>
                        <th class="col-post-rating">
                            User rating
                            <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                        </th>
                        <th class="col-post-date">
                            Date
                        </th>
                    </tr>
                    <tr>
                        <td class="row-post-comment">Yes, it's an awesome movie!</td>
                        <td class="row-post-post">Please, add "Avatar"!</td>
                        <td class="row-post-username">deina_89</td>
                        <td class="row-post-rating">9</td>
                        <td class="row-post-date">2 Sep 2019</td>
                    </tr>
                    <tr>
                        <td class="row-post-comment">I don't like it!I haven't watched such a crappy movie, sly.</td>
                        <td class="row-post-post">Please, add "Avatar"!</td>
                        <td class="row-post-username">4ever</td>
                        <td class="row-post-rating">2</td>
                        <td class="row-post-date">21 Jan 2019</td>
                    </tr>
                    <tr>
                        <td class="row-post-comment">Yes, it's a nice sci-fi</td>
                        <td class="row-post-post">Please, add "Avatar"!</td>
                        <td class="row-post-username">lvr</td>
                        <td class="row-post-rating">5</td>
                        <td class="row-post-date">8 Sep 2018</td>
                    </tr>
                    <tr>
                        <td class="row-post-comment">Don't</td>
                        <td class="row-post-post">Please, add "Avatar"!</td>
                        <td class="row-post-username">flower34</td>
                        <td class="row-post-rating">1</td>
                        <td class="row-post-date">12 Jun 2010</td>
                    </tr>
                    <tr>
                        <td class="row-post-comment">No need</td>
                        <td class="row-post-post">Please, add "Avatar"!</td>
                        <td class="row-post-username">maria5</td>
                        <td class="row-post-rating">1</td>
                        <td class="row-post-date">17 Jun 2010</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="projections-title">
        My projections
    </div>
    <button class="projection-btn" onclick="showProjectionForm()">Add a projection</button>
    <div class="exchanges-title">
        Share requests
    </div>
    <button class="exchange-btn" onclick="showShareForm()">Share a movie</button>
    <div id="projections-exchanges-container">
        <div class="projections-scroller">
            <div id="projections-box">
                <table class="my-projections-tbl" cellspacing="0" cellpadding="0">
                    <tr>
                        <th class="col-prj-name">
                            Name
                            <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                        </th>
                        <th class="col-prj-location">
                            Location
                        </th>
                        <th class="col-prj-duration">
                            Duration
                            <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                        </th>
                        <th class="col-prj-date">
                            Date
                        </th>
                        <th class="col-prj-options">
                            Options
                        </th>
                    </tr>
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                        include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';
                        $userId = UserHelpers::getCurrentUser()->get("UserId");
                        $projections = MovieProjectionHelpers::getProjectionsByUser($userId);

                        foreach($projections as $projection) {
                            echo '
                        <tr>
                            <td class="row-prj-name">
                                ' . $projection->get('Name') . '
                            </td>
                            <td class="row-prj-location">
                                ' . $projection->get('Location') .'
                            </td>
                            <td class="row-prj-duration">
                                ' . $projection->get("Duration") . '
                            </td>
                            <td class="row-prj-date">
                                ' . $projection->get('Date') . '
                            </td>
                            <td class="row-prj-options">
                                <button onclick="showEditProjForm(' . $projection->get('Id') . ')">Edit</button>
                                <button onclick="deleteProjection(' . $projection->get('Id') . ')">Delete</button>
                            </td>
                        </tr>
                            ';
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="exchanges-scroller">
            <div id="exchanges-box">
                <table class="my-exchanges-tbl">
                    <tr>
                        <th class="col-exchanges-movies">
                            Movies
                            <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                        </th>
                        <th class="col-exchanges-status">
                            Status
                        </th>
                        <th class="col-exchanges-rating">
                            Share rating
                            <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                        </th>
                        <th class="col-exchanges-options">
                            Options
                        </th>
                    </tr>
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';
                        include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                        $currentUserId = UserHelpers::getCurrentUser()->get("UserId");
                        $mainShares = ShareHelpers::getSharesByUserId($currentUserId);
                        foreach($mainShares as $mainShare) {
                          echo '
                        </tr>
                            <td class="row-exchanges-movies">' . $mainShare->get("Movie")->get('Name') . '</td>
                            <td class="row-exchanges-status">' . $mainShare->get("Status") . '</td>
                            <td class="row-exchanges-rating">' . $mainShare->get("ApprovalRating") . '</td>
                            <td class="row-exchanges-options">
                                <button onclick="showEditShareForm(' . $mainShare->get("Id") . ')">Edit</button>
                                <button onclick="deleteShare(' . $mainShare->get("Id") . ')">Delete</button>
                            </td class="row-exchanges-options">
                        </tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div id="new-projection-container">
        <img class="close-btn" id="new-projection-close-btn" src="/images/xbutton.png"
            onclick="parentNode.style.display='none'">
        <div id="new-projection-box">
            <form action="#" id="new-projection-form">
                <input type="text" id="projection-name" class="details-field" placeholder="Projection name . . .">
                <input type="text" id="projection-time" class="details-field" placeholder="Date and time . . .">
                <input type="text" id="projection-duration" class="details-field" placeholder="Duration . . . ">
                <select id="projection-movieId">
                </select>
                <input type="text" id="projection-watchers" class="details-field"
                    placeholder="Number of watchers . . . ">
                <input type="text" id="projection-location" class="details-field" placeholder="Location . . . ">
                <button type="submit" id="submit-new-projection">Submit</button>
            </form>
        </div>
    </div>
    <div id="edit-projection-container">
        <img class="close-btn" id="edit-projection-close-btn" src="/images/xbutton.png"
            onclick="parentNode.style.display='none'">
        <div id="edit-projection-box">
            <form action="#" id="edit-projection-form">
                <input type="text" id="edit-projection-name" class="details-field" placeholder="Projection name . . .">
                <input type="text" id="edit-projection-time" class="details-field" placeholder="Date and time . . .">
                <input type="text" id="edit-projection-duration" class="details-field" placeholder="Duration . . . ">
                <select id="edit-projection-movieId">
                </select>
                <input type="text" id="edit-projection-watchers" class="details-field"
                    placeholder="Number of watchers . . . ">
                <input type="text" id="edit-projection-location" class="details-field" placeholder="Location . . . ">
                <p>Users awaiting approval</p>
                <div class="users-scroller" id="projection-participants">
                    <label class="checkbox-box">
                        4ver
                        <input type="checkbox">
                        <span class="check-mark"></span>
                    </label>
                    <label class="checkbox-box">
                        lvr
                        <input type="checkbox">
                        <span class="check-mark"></span>
                    </label>
                    <label class="checkbox-box">
                        maria5
                        <input type="checkbox">
                        <span class="check-mark"></span>
                    </label>
                    <label class="checkbox-box">
                        flower_34
                        <input type="checkbox">
                        <span class="check-mark"></span>
                    </label>
                </div>
                <a id="submit-projection-changes">Submit</a>
            </form>
        </div>
    </div>
    <div id="new-share-container">
        <img class="close-btn" id="new-share-close-btn" src="/images/xbutton.png"
            onclick="parentNode.style.display='none'">
        <div id="new-share-box">
            <form id="new-share-form">
                <label for="newShareMovie">Select movie:</label>
                <select id="newShareMovie"></select>
                <button type="submit" id="submit-new-share">Submit</button>
            </form>
        </div>
    </div>
    <div id="edit-share-container">
        <img class="close-btn" id="edit-share-close-btn" src="/images/xbutton.png"
            onclick="parentNode.style.display='none'">
        <div id="edit-share-box">
            <form action="#" id="edit-share-form">
                <label for="editShareMovie">Select movie:</label>
                <select id="editShareMovie"></select>
                <p>List of users, wanting the movie</p>
                <div id="shareParticipants" class="users-scroller">
                </div>
                <button id="submit-share-changes">Submit</button>
            </form>
        </div>
    </div>
    <script src="/js/profile.js"></script>
</body>

</html>