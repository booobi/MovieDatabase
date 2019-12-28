<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/MoviesDesign.css">

    <button class="menu-btn" id="add-a-movie"> <a href = "AddAMovie.php">Add a movie </a></button>

    <div class="tables">
        <table class = "movies-tbl">       
            <tr>
                <th class = hide-title></th>
                <th class = "show-title">
                    Movie name
                    <br><i class="arrow-down"></i><i class = "arrow-up"> </i>
                </th>
                <th class = "show-title">
                    Category
                    <br><i class="arrow-down"></i><i class = "arrow-up"> </i>
                </th>
                <th class = "show-title">
                    Rating
                    <br><i class="arrow-down"></i><i class = "arrow-up"> </i>
                </th>
                <th class = "show-title">
                    IMDB Rating
                </th>
                <th class = "hide-title">
                    Date
                </th>
                <th class = "hide-title">
                    Country
                </th>
                <th class = "hide-title">
                    Language
                </th>
                <th class = "hide-title">
                    Duration
                </th>
                <th class = "hide-title">
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
                <td class = "show-content">
                    <img src = "'. $movie->get('PosterImgSrc') .'">
                </td>
                <td class = "show-content">
                '. $movie->get('Name') .'
                </td>
                <td class = "hide-content">';
                $movieCategories = $movie->get("Categories");
                foreach($movieCategories as $category)
                {
                    echo $category->get("Name") . ' ';
                }
                echo '</td>
                <td class = "hide-content">
                   '. ($movie->get('Rating') == "0" ? "No Rating Yet" : $movie->get('Rating')) . '
                   <button class = "rating-btn" onclick="showRatingModal('.$movie->get('Id').')">Give a rating</button>
                </td>
                <td class = "hide-content">
                '. $movie->get('IMDBRating') .'
                </td>
                <td class = "hide-content">
                '. $movie->get('ReleaseDate') .'
                </td>
                <td class = "hide-content">
                '. $movie->get('Country') .'
                </td>
                <td class = "hide-content">
                '. $movie->get('Language') .'
                </td>
                <td class = "hide-content">
                '. $movie->get('Duration') .'
                </td>
                <td class = "hide-content">';
                
                echo '<button class = "more-btn" onclick="showInfoModal('.$movie->get('Id').')">More</button>';
                
                if(
                (isset($_SESSION['username']) && in_array($movie->get('Id'), UserHelpers::getUserOwnedMovies($_SESSION['username'])))
                || 
                (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'])
                ) {
                    echo '<button class = "change-movie-btn"><a href="EditMovie.php?id='. $movie->get("Id") .'">Edit</a></button><br>';
                    echo '<button class = "change-movie-btn" id="delete" onclick="deleteMovie('.$movie->get("Id").')">Delete</button>';
                }
                    
                '</td>
            </tr>';
            }
        ?>
        </table>
    </div>



<div id = "info-container">
    <img class = "close-btn" id="info-close-btn" src="/images/xbutton.png">
    <div id="info-box">
        <div class = "info-scroller">
            <div id = "info">
                <div>
                    <label for="director">Director</label><br>
                    <p id='directorText'></p>
                    
                </div>
                <div>
                    <label for="awards">Awards</label><br>
                    <p id='awardsText'></p>
                    
                </div>
                <div>
                    <label for="music">Music</label><br>
                    <p id='musicText'></p>
                    
                </div>
                <div>
                    <label for="company">Movie company</label><br>
                    <p id='companyText'></p>
                    
                </div>
                <div>
                    <label for="language">Language</label><br>
                    <p id='languageText'></p>
                    
                </div>
                <div>
                    <label for="date">Release Date</label><br>
                    <p id='releaseDateText'></p>
                    
                </div>
                <div>
                    <label for="trailer">Trailer</label><br>
                    <p id='trailerText'></p>
                </div>
                <div>
                    <label for="duration">Duration</label><br>
                    <p id='durationText'></p>
                </div>
                <div>
                    <label for="country">Country</label><br>
                    <p id='countryText'></p>
                </div>
                <div>
                    <label for="imdb-rating">IMDB rating</label><br>
                    <p id='imdbRatingText'></p>
                </div>
                <div id = "actors-text">
                    <label for="actors">Actors</label><br>
                    <p id='actorsText'></p>
                </div>
                <div id = "lead-actors-text">
                    <label for="lead-actors">Lead actors</label><br>
                    <p id='mainActorsText'></p>
                </div>
                <div id = "description-text">
                    <label for="description">Description</label><br>
                    <p id='descriptionText'></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id = "rating-box">
    <img class="close-btn" id="rating-close-btn" src="/images/xbutton.png" onclick="$(this).parent().hide()">
    <div id = "rating">
    <h5>Rate the movie:</h5>
        <select id="rateSelect" type = "number" form="rateForm">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <form id="rateForm">
            <button type="submit" id="rateSubmitBtn">Submit</button>
        </form>
    </div>
</div>

<script src="/js/movies.js"></script>
</body>
</html>
