<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="css/HomeDesign.css">
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
                    foreach ($sharedMovies as $movie) {
                        echo '
                        <tr>
                            <td>
                                <p class="title">' . $movie->get("Name") . '</p>
                                <p class="description">' . substr($movie->get("Description"),0,25) .'...</p>
                            </td>
                        </tr>
                        ';
                }
            ?>
                
    </tbody>    
    </table>

    <table class="projections-tbl down-tables">

        <?php
            $dateToday = Date("Y-m-d",time());
            $dateWeekAhead = Date("Y-m-d",time() + (7 * 24 * 60 * 60));
            $movieProjectionsMap = MovieHelpers::getMovieProjectionsBetween($dateToday, $dateWeekAhead);

            foreach($movieProjectionsMap as $key=>$val) {
                
                $movieTime = $val[0];
                $movieLocation = $val[1];
                echo "
                <tr>
                    <td>
                        <p class=\"title\"> {$key} </p>
                        <p class=\"description\"> <b>{$movieTime} {$movieLocation}</p>
                    </td>
                </tr>";
            }
        ?>
    </table>

    <table class = "festivals-tbl down-tables">
       <?php
        $festivals = MovieHelpers::getMovieFestivals();
        foreach($festivals as $festival) {
            echo '
            <tr>
                <td class>
                    <p class = "title">' . $festival->get('Name') . '</p>
                    <p class = "description">' . $festival->get('Description') . '</p>
                </td>
            </tr>';
        }
     
       ?>
    </table>
</div>

</body>
</html>
