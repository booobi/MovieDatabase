<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/MoviesDesign.css">
</head>

<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
    ?>

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
                    <button class = "more-btn">More</button>
                </td>
                <td class = "hide-content">
                '. $movie->get('Category') .'
                </td>
                <td class = "hide-content">
                   '. ($movie->get('Rating') == "0" ? "No Rating Yet" : $movie->get('Rating')) . '
                   <button class = "rating-btn" onclick="openRatingModal('.$movie->get('Id').')">Give a rating</button>
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
                
                if(
                (isset($_SESSION['username']) && in_array($movie->get('Id'), UserHelpers::getUserOwnedMovies($_SESSION['username'])))
                || 
                (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'])
                ) {
                    echo '<button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>';
                    echo '<button class = "change-movie-btn" id="delete" onclick="deleteMovie('.$movie->get("Id").')">Delete</button>';
                }
                    
                '</td>
            </tr>';
            }
        ?>
        </table>
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
