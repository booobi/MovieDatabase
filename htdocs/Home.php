<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Share:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/HomeDesign.css">
    <script src="js/home.js"></script>
</head>

<body>
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

    <div class="user-buttons">
        <button class="entrance-btn" onclick="signin_show()" id="sign-in-btn">Sign In</button>
        <button class="entrance-btn" onclick="login_show()" id="log-in-btn">Log In</button>
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

<div class="desktop-headings">
    <div class="top-week">This week top movies</div>
    <div class="shared-movies">Movies shared by the community</div>
    <div class="projections">Movies projections this week</div>
    <div class="festivals">Movie festivals</div>
    <div class="watch-later">Watch later</div>
</div>

<div class="mobile-headings">
    <button class="top-week-btn">This week top movies</button>
    <button class="shared-movies-btn">Movies shared by the community</button>
    <button class="projections-btn">Movies projections this week</button>
    <button class="festivals-btn">Movie festivals</button>
    <button class="watch-later-btn">Watch later</button>
</div>

<div class="tables">
    <table class="top-week-tbl">
        <tr>
            <th>Movie name
                <i class="arrow-down"></i><i class = "arrow-up"> </i>
            </th>
            <th>Category
                <i class="arrow-down"></i><i class = "arrow-up"> </i>
            </th>
            <th>Rating
                <i class="arrow-down"></i><i class = "arrow-up"> </i>
            </th>
            <th>Date
                <i class="arrow-down"></i><i class = "arrow-up"> </i>
            </th>
        </tr>
        <tr>
            <td>Titanic</td>
            <td>Drama</td>
            <td>4.9</td>
            <td>12 Sep 2019</td>
        </tr>
        <tr>
            <td>P.S. I Love You</td>
            <td>Romance</td>
            <td>4.0</td>
            <td>1 Sep 2019</td>
        </tr>
        <tr>
            <td>Wanted</td>
            <td>Action</td>
            <td>3.9</td>
            <td>20 Jan 2010</td>
        </tr>
        <tr>
            <td>Singin' In The Rain</td>
            <td>Musical</td>
            <td>4.7</td>
            <td>18 May 2015</td>
        </tr>
    </table>

    <table class="watch-later-tbl">
        <tr>
            <td>
                <p class="title"> Going on 30 </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="title"> It's A Wonderful Life </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="title"> Never Backdown </p>
            </td>
        </tr>
    </table>

    <table class="shared-movies-tbl down-tables">
        <tr>
            <td>
                <p class="title"> Armageddon </p>
                <p class="description">The humanity is in danger...</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="title"> Pride </p>
                <p class="description">Segregation in the 60s...</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="title"> White chicks </p>
                <p class="description">Two policemen...</p>
            </td>
        </tr>
    </table>

    <table class="projections-tbl down-tables">
        <tr>
            <td class>
                <p class="title"> Mr.Nobody </p>
                <p class="description"> <b>22:30 Arena Cinema</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class = "title"> Norbit </p>
                <p class = "description"> <b>18:00  Cultural Center</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class = "title"> The Shawshank Redemption </p>
                <p class = "description"> <b>17:30 Cinema City</p>
            </td>
        </tr>
    </table>

    <table class = "festivals-tbl down-tables">
        <tr>
            <td class>
                <p class = "title"> Cannes  </p>
                <p class = "description">... </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class = "title"> Sundance </p>
                <p class = "description">...</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class = "title"> <it>Tribeca </p>
                <p class = "description">...</p>
            </td>
        </tr>
    </table>
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

</body>
</html>
