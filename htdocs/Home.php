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
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

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

        <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';

            $moviesThisWeek = MovieHelpers::getHomeRecentMovies();
            if(count($moviesThisWeek) > 0) {
            
                foreach ($moviesThisWeek as $movie) {
                echo "
                    <tr>
                        <td>" . $movie->get('Name') . "</td>
                        <td>" . $movie->get('Category') . "</td>
                        <td>" . $movie->get('Rating') . "</td>
                        <td>" . $movie->get('ReleaseDate') . "</td>
                    </tr>
                    ";
            }
        }
        ?>
    </table>

    <table class="watch-later-tbl">
        <tbody>

            <?php
                if(!isset($_SESSION['userLoggedIn'])) {
                    echo '
                <tr>
                    <td>
                        <p class="title">' . "Log in to see your 'Watch Later' movies" . '</p>
                    </td>
                </tr>';
                } else {
                    $watchLaterMovies = MovieHelpers::getWatchLaterMoviesForUser($_SESSION['username']);
                    
                    if(count($watchLaterMovies) > 0) {
                        foreach ($watchLaterMovies as $movie) {
                            echo '
                            <tr>
                                <td>
                                    <p class="title">' . $movie->get("Name") . '</p>
                                </td>
                            </tr>
                            ';
                        }
                    }
                } 
            ?>
        </tbody>
    </table>

    <table class="shared-movies-tbl down-tables">
    <tbody>
            <?php
                $sharedMovies = MovieHelpers::getSharedMovies();
                if(count($sharedMovies) > 0) {
                    foreach ($sharedMovies as $movie) {
                        echo '
                        <tr>
                            <td>
                                <p class="title">' . $movie->get("Name") . '</p>
                                <p class="description">' . substr($movie->get("Description"),0,25) .'</p>
                            </td>
                        </tr>
                        ';
                    }
                }

            
            ?>
                
    </tbody>
        <!-- <tr>
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
        </tr> -->
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
