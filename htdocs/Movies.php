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
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/movies.css">
    <link rel="stylesheet" href="css/duplicated.css">
</head>

<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/Header.php';
    ?>

    <button class="menu-btn" id="add-a-movie"> <a href="AddMovie.php">Add a movie </a></button>

    <div class="movies-tbl-scroller">
        <div class="movies-container">
            <table class="movies-tbl">
            <tr>
                <th class = "movie-id"></th>
                <th class = "col-category">
                    Category
                    <br><i class = "arrow-down"></i><i class = "arrow-up"></i>
                </th>
                <th class = "col-rating">
                    Rating
                    <br><i class = "arrow-down"></i><i class = "arrow-up"></i>
                </th>
                <th class = "col-poster"></th>
                <th class = "col-name">
                    Movie name
                    <br><i class = "arrow-down"></i><i class = "arrow-up"></i>
                </th>
                <th class = "col-options">
                    Options
                </th>
            </tr>
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
                include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                
                $movies = MovieHelpers::getMovies();

                foreach($movies as $movie) {
                    
                    echo
                    '
                    <tr>
                        <td class="row-category">';
                        $movieCategories = $movie->get("Categories");
                        foreach($movieCategories as $category)
                        {
                            echo $category->get("Name") . ' ';
                        }
                        echo '</td>
                        <td class="row-rating">
                            ' . $movie->get("Rating") . '/5
                            <br><button class="rating-btn" data-movieid="'. $movie->get("Id") . '" id="rating-btn">Give a rating</button>
                        </td>
                        <td class="row-poster">
                            <img
                                src="' . $movie->get("PosterImgSrc") . '">
                        </td>
                        <td class="row-name">
                            '. $movie->get("Name") . '
                        </td>
                        <td class="row-options">
                            <button class="more-btn" data-movieid="'. $movie->get("Id") . '">More</button>';
                            

                        if(
                            (isset($_SESSION['username']) && in_array($movie->get('Id'), UserHelpers::getUserOwnedMovies($_SESSION['username'])))
                            || 
                            (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'])
                            ) {
                                echo '<button class = "change-movie-btn"><a href="EditMovie.php?id='. $movie->get("Id") .'">Edit</a></button><br>';
                                echo '<button class = "change-movie-btn delete-btn" id="delete" data-movieid="'.$movie->get("Id").'">Delete</button>';
                            }

                        echo '</td>
                    </tr>';
                }
                ?>
            </table>
        </div>
    </div>

    <div id="rating-box">
        <img class="close-btn" id="rating-close-btn" onclick="parentNode.style.display='none'" src="/images/xbutton.png">
        <div id="rating">
            <select id="ratingSelect" type="number">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <button id="rateSubmitBtn">Rate</button>
        </div>
    </div>

    <div id="info-container">
        <img class="close-btn" id="info-close-btn" src="/images/xbutton.png">
        <div id="info-box">
            <div class="info-scroller">
                <div id="info">
                    <div>
                        <label for="director">Director</label><br><br>
                        <div id="directorText"></div>
                    </div>
                    <div>
                        <label for="awards">Awards</label><br><br>
                        <div id="awardsText"></div>
                    </div>
                    <div>
                        <label for="music">Music</label><br><br>
                        <div id="musicText"></div>
                    </div>
                    <div>
                        <label for="company">Movie company</label><br><br>
                        <div id="companyText"></div>
                    </div>
                    <div>
                        <label for="language">Language</label><br><br>
                        <div id="languageText"></div>
                    </div>
                    <div>
                        <label for="date">Release Date</label><br><br>
                        <div id="releaseDateText"></div>
                    </div>
                    <div>
                        <label for="trailer">Trailer</label><br><br>
                        <div id="trailerText"></div>
                    </div>
                    <div>
                        <label for="duration">Duration</label><br><br>
                        <div id="durationText"></div>
                    </div>
                    <div>
                        <label for="country">Country</label><br><br>
                        <div id="countryText"></div>
                    </div>
                    <div>
                        <label for="location">Filmed in</label><br><br>
                    </div>
                    <div>
                        <label for="imdb-rating">IMDB rating</label><br><br>
                        <div id="imdbRatingText"></div>
                    </div>
                    <div id="actors-text">
                        <label for="actors">Actors</label><br><br>
                        <div id="actorsText"></div>
                    </div>
                    <div id="lead-actors-text">
                        <label for="lead-actors">Lead actors</label><br><br>
                        <div id="mainActorsText"></div>
                        </div>
                    <div id="description-text">
                        <label for="description">Description</label><br><br>
                        <div id="descriptionText"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/movies.js"></script>

</body>

</html>