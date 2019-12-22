<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script type="text/javascript" src="MoviesLogic.js"></script>
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel="stylesheet" href="MoviesDesign.css">
</head>

<body>
<div class="navigation">
    <div class="logo"> Movie Time</div>
    <div class="search">
        <form action="/action_page.php" id = "search-box">
            <input type="text" placeholder="Search movie, actor, director...">
        </form>
        <div class="advanced-search">
            <input type="checkbox" id="check-adv-search" value="check">
            Advanced search
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

<button class="menu-btn" id="add-a-movie"> <a href = "AddAMovie.php">Add a movie </a></button>

<div class = "movies-container">
    <table class = "movies-tbl">
        <tr>
            <th class = "movie-id"></th>
            <th class = "col-poster"></th>
            <th class = "col-name">
                Movie name
                <br><i class = "arrow-down"></i><i class = "arrow-up"></i>
            </th>
            <th class = "col-rating">
                Rating
                <br><i class = "arrow-down"></i><i class = "arrow-up"></i>
            </th>
            <th class = "col-category">
                Category
                <br><i class = "arrow-down"></i><i class = "arrow-up"></i>
            </th>
            <th class = "col-options"></th>
        </tr>
        <tr>
            <td class = "row-poster">
                <img src = "https://upload.wikimedia.org/wikipedia/en/1/19/Titanic_%28Official_Film_Poster%29.png">
            </td>
            <td class = "row-name">
                Titanic
            </td>
            <td class = "row-rating">
                3.5/5
                <button class = "rating-btn" onclick="showRating()">Give a rating</button>
            </td>
            <td class = "row-category">
                Drama
            </td>
            <td class = "row-options">
                <button class = "more-btn" onclick="showInfo()">More</button>
                <button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
    </table>
</div>

<div id = "sign-in-container">
    <img class = "close-btn" id="sign-close-btn" src="xbutton.png">
    <div id ="sign-in-box">
        <form action="#" id="popup-form" method="post" name="form">
            <h2>Sign In</h2>
            <hr>
            <input id="sign-email" class="popup-field" placeholder="Email" type="text">
            <input id="firstname" class="popup-field" placeholder="First Name" type="text">
            <input id="lastname" class="popup-field" placeholder="Last Name" type="text">
            <input id="sign-password" class="popup-field" placeholder="Password" type="password">
            <input id="repeat" class="repeat" placeholder="Repeat Password" type="password">
            <a href="javascript:%20validateSignIn()" id="submit">Send</a>
        </form>
    </div>
</div>

<div id = "log-in-container">
    <img class = "close-btn" id="log-close-btn" src="xbutton.png">
    <div id="log-in-box">
        <form action="#" id="popup-form" method="post" name="form">
            <h2>Log In</h2>
            <hr>
            <input id="log-email" class="popup-field" placeholder="Email" type="text">
            <input id="log-password" class="repeat" placeholder="Password" type="password">
            <a href="javascript:%20validateLogIn()" id="submit">Send</a>
        </form>
    </div>
</div>

<div id = "rating-box">
    <img class="close-btn" id="rating-close-btn" src="/images/xbutton.png">
    <div id = "rating">
        <select type = "number">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
</div>

<div id = "info-container">
    <img class = "close-btn" id="info-close-btn" src="xbutton.png">
    <div id="info-box">
        <div class = "info-scroller">
            <div id = "info">
                <div>
                    <label for="director">Director</label><br><br>
                    James Cameron
                </div>
                <div>
                    <label for="awards">Awards</label><br><br>
                    11 Oscar
                </div>
                <div>
                    <label for="music">Music</label><br><br>
                    James Horner
                </div>
                <div>
                    <label for="company">Movie company</label><br><br>
                    Twentieth Century Fox
                </div>
                <div>
                    <label for="language">Language</label><br><br>
                    English, Italian, Swedish
                </div>
                <div>
                    <label for="date">Release Date</label><br><br>
                    19.12.1997
                </div>
                <div>
                    <label for="trailer">Trailer</label><br><br>
                    <a href = "https://www.youtube.com/watch?v=2e-eXJ6HgkQ&ab_channel=Titanic-OfficialTrailer%28HD%29" target="_blank">Open</a>
                </div>
                <div>
                    <label for="duration">Duration</label><br><br>
                    240 min
                </div>
                <div>
                    <label for="country">Country</label><br><br>
                    USA
                </div>
                <div>
                    <label for="location">Filmed in</label><br><br>
                    USA
                </div>
                <div>
                    <label for="imdb-rating">IMDB rating</label><br><br>
                    7.8
                </div>
                <div id = "actors-text">
                    <label for="actors">Actors</label><br><br>
                    Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates
                    Frances Fisher, Gloria Stuart, Bill Paxton
                </div>
                <div id = "lead-actors-text">
                    <label for="lead-actors">Lead actors</label><br><br>
                    Leonardo DiCaprio, Kate Winslet, Billy Zane
                </div>
                <div id = "description-text">
                    <label for="description">Description</label><br><br>
                    84 years later, a 100 year-old woman
                    named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert,
                    Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh
                    about her life set in April 10th 1912, on a ship called Titanic
                    when young Rose boards the departing ship with the upper-class passengers and her mother,
                    Ruth DeWitt Bukater, and her fiancé, Caledon Hockley. Meanwhile, a drifter and artist named Jack Dawson
                    and his best friend Fabrizio De Rossi win third-class tickets to the ship in a game.
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    jQuery('.entrance-btn').click(function () {
        $('.entrance-btn').hide();

        if (this.id === 'sign-in-btn') {
            $('#log-out-btn').show();
            $('#profile-btn').show();
        } else if (this.id === 'log-in-btn') {
            $('#profile-btn').show();
            $('#log-out-btn').show();
        } else if (this.id === 'admin-btn') {
            $('#admin-btn').show();
            $('#profile-btn').show();
            $('#log-out-btn').show();
        }

        if ($('.mobile-headings').is(":hidden")) {
            $('.watch-later').show();
            $('.watch-later-tbl').show();
        }else{
            $('.watch-later-btn').show();
        }
    });

    jQuery('.profile-btn').click(function () {

        if (this.id === 'log-out-btn')  {
            $('.profile-btn').hide();

            $('.watch-later').hide();
            $('.watch-later-tbl').hide();
            $('.watch-later-btn').hide();
            $('.entrance-btn').show();
        }
    });

    jQuery('.close-btn').click(function () {
        $('.close-btn').parent().hide();
    });
</script>
</body>
</html>