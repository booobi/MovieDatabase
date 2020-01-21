<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel="stylesheet" href="PostsDesign.css">
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
                <tr>
                    <td class = "row-public-post">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-movie">
                        Avatar
                    </td>
                    <td class = "row-public-rating">
                        3.5
                    </td>
                    <td class = "row-public-options">
                        <button class = "add-rating-btn" onclick="showRatingForm()">Give a rating</button>
                        <button class = "details-post-btn"><a href = "PostDetails.php">Details </a></button>
                        <button class = "edit-post-btn" onclick="showEditPostForm()">Edit</button>
                        <button class = "delete-post-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-post">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-movie">
                        Avatar
                    </td>
                    <td class = "row-public-rating">
                        9
                    </td>
                    <td class = "row-public-options">
                        <button class = "add-rating-btn" onclick="showRatingForm()">Give a rating</button>
                        <button class = "details-post-btn"><a href = "PostDetails.php">Details </a></button>
                        <button class = "edit-post-btn" onclick="showEditPostForm()">Edit</button>
                        <button class = "delete-post-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-post">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-movie">
                        "Avatar"
                    </td>
                    <td class = "row-public-rating">
                        9
                    </td>
                    <td class = "row-public-options">
                        <button class = "add-rating-btn" onclick="showRatingForm()">Give a rating</button>
                        <button class = "details-post-btn"><a href = "PostDetails.php">Details </a></button>
                        <button class = "edit-post-btn" onclick="showEditPostForm()">Edit</button>
                        <button class = "delete-post-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-post">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-movie">
                        "Avatar"
                    </td>
                    <td class = "row-public-rating">
                        9
                    </td>
                    <td class = "row-public-options">
                        <button class = "add-rating-btn" onclick="showRatingForm()">Give a rating</button>
                        <button class = "details-post-btn"><a href = "PostDetails.php">Details </a></button>
                        <button class = "edit-post-btn" onclick="showEditPostForm()">Edit</button>
                        <button class = "delete-post-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-post">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-movie">
                        "Avatar"
                    </td>
                    <td class = "row-public-rating">
                        9
                    </td>
                    <td class = "row-public-options">
                        <button class = "add-rating-btn" onclick="showRatingForm()">Give a rating</button>
                        <button class = "details-post-btn"><a href = "PostDetails.php">Details </a></button>
                        <button class = "edit-post-btn" onclick="showEditPostForm()">Edit</button>
                        <button class = "delete-post-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-post">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-movie">
                        "Avatar"
                    </td>
                    <td class = "row-public-rating">
                        9
                    </td>
                    <td class = "row-public-options">
                        <button class = "add-rating-btn" onclick="showRatingForm()">Give a rating</button>
                        <button class = "details-post-btn"><a href = "PostDetails.php">Details </a></button>
                        <button class = "edit-post-btn" onclick="showEditPostForm()">Edit</button>
                        <button class = "delete-post-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-public-post">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-public-movie">
                        "Avatar"
                    </td>
                    <td class = "row-public-rating">
                        9
                    </td>
                    <td class = "row-public-options">
                        <button class = "add-rating-btn" onclick="showRatingForm()">Give a rating</button>
                        <button class = "details-post-btn"><a href = "PostDetails.php">Details </a></button>
                        <button class = "edit-post-btn" onclick="showEditPostForm()">Edit</button>
                        <button class = "delete-post-btn">Delete</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id = "new-post-container">
    <img class = "close-btn" id="new-post-close-btn" src="xbutton.png">
    <div id = "new-post-box">
        <form action="#" id="new-post-form">
            <textarea id = "new-post-text" placeholder="Description . . . " maxlength="540"></textarea>
            <a href="javascript:%20validateLogIn()" id="submit-new-post">Submit</a>
        </form>
    </div>
</div>

<div id = "edit-post-container">
    <img class = "close-btn" id="edit-post-close-btn" src="xbutton.png">
    <div id = "edit-post-box">
        <form action="#" id="edit-post-form">
            <textarea id = "edit-post-text" placeholder="Description . . . " maxlength="540"></textarea>
            <p>Movie of the post</p>
            <div class = "movies-scroller">
                <ul>
                    <li>Titanic</li>
                    <li>Fast and Furious</li>
                    <li>Avatar</li>
                    <li>Mr Nobody</li>
                    <li>P.S. I love you</li>
                </ul>
            </div>
            <a href="javascript:%20validateLogIn()" id="submit-post-changes">Submit</a>
        </form>
    </div>
</div>

<div id = "rating-container">
    <img class="close-btn" id="add-rating-close-btn" src="xbutton.png">
    <div id = "add-rating-box">
        <select type = "number">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        <button class="add-rating-btn">Rate</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="multiselect.min.js"></script>

<script>
   jQuery('.close-btn').click(function () {
       $(this).parent().hide();
   });

   function showPostForm() {
        document.getElementById("new-post-container").style.display = "block";
    }

   function showEditPostForm() {
       document.getElementById("edit-post-container").style.display = "block";
   }

   function showRatingForm() {
       document.getElementById("rating-container").style.display = "block";
   }

</script>
</body>