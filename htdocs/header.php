<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Share:400,700,700i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/css/header.css">
<div class="navigation">
    <div class="logo"> Movie Time</div>

    <div class="search">
        <form action="/action_page.php" id = "search-box">
            <input type="text" placeholder="Search movie, actor, director...">
        </form>
        <div class="advanced-search">
            <input type="checkbox" id="check-adv-search" value="check" >
            Advanced search
        </div>
        <div id = "popup-advanced">
            <p>this should</p>
            <p>be</p>
            <p>a pop-up</p>
        </div>
        <button type="submit">Go!</button>
    </div>

    <div id="user-menu-container">
        <div class="user-buttons">
            <?php
                //session_start();
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
                    echo '<button class="profile-btn" id="admin-btn">Administration</button>';
                }

                if(isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn']) {
                    echo '<button class="profile-btn" id="profile-btn">Profile</button>';
                    echo '<button class="profile-btn" id="log-out-btn">Log-out</button>';
                } else {
                    echo '<button class="entrance-btn" onclick="signin_show()" id="sign-in-btn">Sign In</button>';
                    echo '<button class="entrance-btn" onclick="login_show()" id="log-in-btn">Log In</button>';
                }
            ?>
        </div>

        <div class = "menu">
            <button class="menu-btn" id="home"> <a href = "Home.php">Home</a></button>
            <button class="menu-btn" id="add-a-post"> <a href = "AddAPost.php">Add a post </a></button>
            <button class="menu-btn" id="movies"><a href = "Movies.php">Movies </a></button>
            <button class="menu-btn" id="movie-festivals"><a href = "Festivals.php">Festivals </a></button>
        </div>
    </div>
</div>

<div id="sign-in-box">
        <div id="popup-entrance">
            <form action="#" id="popup-form" method="post" name="signup-form">
                <img id="close-btn" src="images/xbutton.png" onclick ="signin_hide()">
                <h2>Sign In</h2>
                <hr>
                <input id="sign-email" name="email" class="popup-field" placeholder="Email" type="text">
                <input id="firstname" name="first_name" class="popup-field" placeholder="First Name" type="text">
                <input id="lastname" name="last_name" class="popup-field" placeholder="Last Name" type="text">
                <input id="sign-password" name="password" class="popup-field" placeholder="Password" type="password">
                <input id="repeat" name="confirm_password" class="repeat" placeholder="Repeat Password" type="password">
                <a href="javascript:%20validate_signin()" id="submit">Send</a>
            </form>
        </div>
    </div>
<div id="log-in-box">
    <div id="popup-entrance">
        <form action="#" id="popup-form" method="post" name="login-form">
            <img id="close-btn" src="/images/xbutton.png" onclick ="login_hide()">
            <h2>Log In</h2>
            <hr>
            <input name="email" id="log-email" class="popup-field" placeholder="Email" type="text">
            <input name="password" id="log-password" class="repeat" placeholder="Password" type="password">
            <a href="javascript:%20validate_login()" id="submit">Send</a>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/header.js"></script>