<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,600,700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="MoviesLogic.js"></script>
    <link rel="stylesheet" href="css/NewHomeDesign.css">
    <link rel="stylesheet" href="css/NewMoviesDesign.css">
    <link rel="stylesheet" href="css/DuplicatedDesign.css">
</head>

<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/NewHeader.php';
    ?>

    <button class="menu-btn" id="add-a-movie"> <a href="AddAMovie.php">Add a movie </a></button>

    <div class="movies-tbl-scroller">
        <div class="movies-container">
            <table class="movies-tbl">
                <tr>
                    <th class="movie-id"></th>
                    <th class="col-category">
                        Category
                        <br><i class="arrow-down"></i><i class="arrow-up"></i>
                    </th>
                    <th class="col-rating">
                        Rating
                        <br><i class="arrow-down"></i><i class="arrow-up"></i>
                    </th>
                    <th class="col-poster"></th>
                    <th class="col-name">
                        Movie name
                        <br><i class="arrow-down"></i><i class="arrow-up"></i>
                    </th>
                    <th class="col-options">
                        Options
                    </th>
                </tr>
                <tr>
                    <td class="row-category">
                        Drama
                    </td>
                    <td class="row-rating">
                        3.5/5
                        <br><button class="rating-btn" onclick="showRating()">Give a rating</button>
                    </td>
                    <td class="row-poster">
                        <img
                            src="https://upload.wikimedia.org/wikipedia/en/1/19/Titanic_%28Official_Film_Poster%29.png">
                    </td>
                    <td class="row-name">
                        Titanic
                    </td>
                    <td class="row-options">
                        <button class="more-btn" onclick="showInfo()">More</button>
                        <button class="change-movie-btn"><a href="EditAMovie.php">Edit</a></button><br>
                        <button class="change-movie-btn" id="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class="row-category">
                        Romance
                    </td>
                    <td class="row-rating">
                        3.2/5
                        <br><button class="rating-btn" onclick="showRating()">Give a rating</button>
                    </td>
                    <td class="row-poster">
                        <img src="https://upload.wikimedia.org/wikipedia/en/7/7f/PS_I_Love_You_%28film%29.jpg">
                    </td>
                    <td class="row-name">
                        P.S I Love You
                    </td>
                    <td class="row-options">
                        <button class="more-btn" onclick="showInfo()">More</button>
                        <button class="change-movie-btn"><a href="EditAMovie.php">Edit</a></button><br>
                        <button class="change-movie-btn" id="delete">Delete</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div id="rating-box">
        <img class="close-btn" id="rating-close-btn" src="xbutton.png">
        <div id="rating">
            <select type="number">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>

    <div id="info-container">
        <img class="close-btn" id="info-close-btn" src="xbutton.png">
        <div id="info-box">
            <div class="info-scroller">
                <div id="info">
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
                        <a href="https://www.youtube.com/watch?v=2e-eXJ6HgkQ&ab_channel=Titanic-OfficialTrailer%28HD%29"
                            target="_blank">Open</a>
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
                    <div id="actors-text">
                        <label for="actors">Actors</label><br><br>
                        Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates
                        Frances Fisher, Gloria Stuart, Bill Paxton
                    </div>
                    <div id="lead-actors-text">
                        <label for="lead-actors">Lead actors</label><br><br>
                        Leonardo DiCaprio, Kate Winslet, Billy Zane
                    </div>
                    <div id="description-text">
                        <label for="description">Description</label><br><br>
                        84 years later, a 100 year-old woman
                        named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert,
                        Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh
                        about her life set in April 10th 1912, on a ship called Titanic
                        when young Rose boards the departing ship with the upper-class passengers and her mother,
                        Ruth DeWitt Bukater, and her fiancé, Caledon Hockley. Meanwhile, a drifter and artist named Jack
                        Dawson
                        and his best friend Fabrizio De Rossi win third-class tickets to the ship in a game.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>

</html>