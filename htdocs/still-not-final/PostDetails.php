<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel="stylesheet" href="PostDetailsDesign.css">
    <link rel="stylesheet" href="DuplicatedDesign.css">
</head>

<body>
<div class="navigation">
    <div class="logo"> Movie Time</div>
    <div class="search">
        <form action="/action_page.php" id = "search-box">
            <input type="text" placeholder="Search movie, actor, director...">
        </form>
        <div class="advanced-search">
            <label class="checkbox-box">
                Advanced search
                <input type="checkbox">
                <span class="check-mark"></span>
            </label>
        </div>
        <button type="submit">Go!</button>
    </div>
    <div class="user-buttons">
        <button class="entrance-btn" onclick="showSignIn()" id="sign-in-btn">Sign In</button>
        <button class="entrance-btn" onclick="showLogIn()" id="log-in-btn">Log In</button>
        <button class="profile-btn" id="admin-btn">Administration</button>
        <button class="profile-btn" id="profile-btn">Profile</button>
        <button class="profile-btn" id="log-out-btn">Log-out</button>
    </div>
    <div class = "menu">
        <button class="menu-btn" id="home"> <a href = "Home.php">Home</a></button>
        <button class="menu-btn" id="add-a-post"> <a href = "AddAPost.php">Add a post </a></button>
        <button class="menu-btn" id="movies"><a href = "Movies.php">Movies </a></button>
        <button class="menu-btn" id="movie-festivals"><a href = "Festivals.php">Festivals </a></button>
    </div>
</div>

<div class = "post-title">
    Posts
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
                <tr>
                    <td class = "row-post">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-movie">
                        Avatar
                    </td>
                    <td class = "row-rating">
                        3.5
                    </td>
            </table>
        </div>

<div class = "public-comments-title">
    Comments
</div>
<button class = "add-comment-btn" onclick="showCommentForm()">Add a comment</button>
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
                <tr>
                    <td class = "row-public-comment">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-user">
                        Avatar
                    </td>
                    <td class = "row-public-user-rating">
                        3.5
                    </td>
                    <td class = "row-public-comments-options">
                        <button class = "edit-comment-btn" onclick="showEditCommentForm()">Edit</button>
                        <button class = "delete-comment-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td class = "row-public-comment">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-user">
                        Avatar
                    </td>
                    <td class = "row-public-user-rating">
                        3.5
                    </td>
                    <td class = "row-public-comments-options">
                        <button class = "edit-comment-btn" onclick="showEditCommentForm()">Edit</button>
                        <button class = "delete-comment-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-comment">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-user">
                        Avatar
                    </td>
                    <td class = "row-public-user-rating">
                        3.5
                    </td>
                    <td class = "row-public-comments-options">
                        <button class = "edit-comment-btn" onclick="showEditCommentForm()">Edit</button>
                        <button class = "delete-comment-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-comment">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-user">
                        Avatar
                    </td>
                    <td class = "row-public-user-rating">
                        3.5
                    </td>
                    <td class = "row-public-comments-options">
                        <button class = "edit-comment-btn" onclick="showEditCommentForm()">Edit</button>
                        <button class = "delete-comment-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-comment">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-user">
                        Avatar
                    </td>
                    <td class = "row-public-user-rating">
                        3.5
                    </td>
                    <td class = "row-public-comments-options">
                        <button class = "edit-comment-btn" onclick="showEditCommentForm()">Edit</button>
                        <button class = "delete-comment-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-comment">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-user">
                        Avatar
                    </td>
                    <td class = "row-public-user-rating">
                        3.5
                    </td>
                    <td class = "row-public-comments-options">
                        <button class = "edit-comment-btn" onclick="showEditCommentForm()">Edit</button>
                        <button class = "delete-comment-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-comment">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-user">
                        Avatar
                    </td>
                    <td class = "row-public-user-rating">
                        3.5
                    </td>
                    <td class = "row-public-comments-options">
                        <button class = "edit-comment-btn" onclick="showEditCommentForm()">Edit</button>
                        <button class = "delete-comment-btn">Delete</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id = "new-comment-container">
    <img class = "close-btn" id="new-comment-close-btn" src="xbutton.png">
    <div id = "new-comment-box">
        <form action="#" id="new-comment-form">
            <textarea id = "new-comment-text" placeholder="Comment. . . " maxlength="540" ></textarea>
            <a href="javascript:%20validateLogIn()" id="submit-new-comment">Submit</a>
        </form>
    </div>
</div>

<div id = "edit-comment-container">
    <img class = "close-btn" id="edit-comment-close-btn" src="xbutton.png">
    <div id = "edit-comment-box">
        <form action="#" id="edit-comment-form">
            <textarea id = "edit-comment-text" placeholder="Comment . . . " maxlength="540" ></textarea>
            <a href="javascript:%20validateLogIn()" id="submit-comment-changes">Submit</a>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="multiselect.min.js"></script>

<script>
    jQuery('.close-btn').click(function () {
        $(this).parent().hide();
    });

    function showCommentForm() {
        document.getElementById("new-comment-container").style.display = "block";
    }

    function showEditCommentForm() {
        document.getElementById("edit-comment-container").style.display = "block";
    }


</script>
</body>