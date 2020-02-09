<div class="navigation">
    <div class="logo"> Movie Time</div>

    <div class="search">
        <form id="search-box">
            <input id="searchInput" type="text" placeholder="Search movie, actor, director...">
        </form>
        <div class="advanced-search">
            <label id="advancedSearchLabel" class="checkbox-box">
                Advanced search
                <input id="advancedSearchCheckbox" type="checkbox">
                <span id="advancedSearchSpan" class="check-mark"></span>
            </label>
        </div>
        <button id="searchBtn" type="submit">Go!</button>
    </div>

    <div class="user-buttons">
        <?php

        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
            echo '<button class="profile-btn" onclick="window.location.href=\'Administration.php\'" id="admin-btn">Administration</button>';
        }

        if(isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn']) {
            echo '<button class="profile-btn" onclick="window.location.href=\'Profile.php\'" id="profile-btn">Profile</button>';
            echo '<button class="profile-btn" onclick="logout()" id="log-out-btn">Log-out</button>';
        } else {
            echo '<button class="entrance-btn" onclick="signin_show()" id="sign-in-btn">Sign In</button>';
            echo '<button class="entrance-btn" onclick="login_show()" id="log-in-btn">Log In</button>';
        }
    ?>
        <!-- <button class="entrance-btn" onclick="showSignIn()" id="sign-in-btn">Sign In</button>
        <button class="entrance-btn" onclick="showLogIn()" id="log-in-btn">Log In</button>
        <button class="profile-btn" id="admin-btn"><a href = "Administration.php">Administration</button>
        <button class="profile-btn" id="profile-btn"><a href="Profile.php">Profile</a></button>
        <button class="profile-btn" id="log-out-btn">Log-out</button> -->
    </div>

    <div class="menu">
        <button class="menu-btn" id="home"> <a href="Home.php">Home</a></button>
        <button class="menu-btn" id="add-a-post"> <a href="AddAPost.php">Add a post </a></button>
        <button class="menu-btn" id="movies"><a href="Movies.php">Movies </a></button>
        <button class="menu-btn" id="movie-festivals"><a href="Festivals.php">Festivals </a></button>
    </div>
</div>


<div id="sign-in-container">
    <img class="close-btn" id="sign-close-btn" src="/images/xbutton.png" onclick="parentNode.style.display='none'">
    <div id="sign-in-box">
        <form action="#" id="popup-form" method="post" name="signup-form">
            <h2>Sign In</h2>
            <hr>
            <input id="sign-email" name="email" class="popup-field" placeholder="Email . . ." type="email">
            <input id="firstname" name="first_name" class="popup-field" placeholder="First name . . ." type="text">
            <input id="lastname" name="last_name" class="popup-field" placeholder="Last name . . ." type="text">
            <input id="sign-password" name="password" class="popup-field" placeholder="Password" type="password">
            <input id="repeat" name="confirm_password" class="repeat" placeholder="Repeat Password" type="password">
            <a onclick="signup()" id="submit">Send</a>
        </form>
    </div>
</div>

<div id="log-in-container">
    <img class="close-btn" id="log-close-btn" src="/images/xbutton.png" onclick="parentNode.style.display='none'">
    <div id="log-in-box">
        <form action="#" id="popup-form" method="post" name="login-form">
            <h2>Log In</h2>
            <hr>
            <input name="email" id="log-email" class="popup-field" placeholder="Email . . ." type="email">
            <input name="password" id="log-password" class="repeat" placeholder="Password . . ." type="password">
            <a onclick="login()" id="submit">Send</a>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="/js/header.js"></script>
<script src="/js/jquery.query-object.js"></script>