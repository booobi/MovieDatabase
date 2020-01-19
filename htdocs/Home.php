<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/duplicated.css">
</head>

<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/Header.php';
    ?>

    <div class="desktop-headings">
        <div class="top-week-title">This week top movies</div>
        <div class="shared-movies-title">Movies shared by the community</div>
        <div class="festivals-title">Movie festivals</div>
        <div class="projections-title">Movies projections this week</div>
    </div>

    <div class="mobile-headings">
        <button class="top-week-btn">This week top movies</button>
        <button class="shared-movies-btn">Movies shared by the community</button>
        <button class="projections-btn">Movies projections this week</button>
        <button class="festivals-btn">Movie festivals</button>
    </div>

    <div class="tables">
        <div class="top-week-scroller">
            <table class="top-week-tbl">
                <tr>
                    <th class="col-top-rating">
                        Rating
                        <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                    </th>
                    <th class="col-top-date">
                        Date
                        <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                    </th>
                    <th class="col-top-poster">

                    </th>
                    <th class="col-top-name">
                        Movie name
                        <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                    </th>
                    <th class="col-top-category">
                        Category
                        <p class="new-line"><i class="arrow-down"></i><i class="arrow-up"> </i></p>
                    </th>
                </tr>
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
                
                $moviesThisWeek = MovieHelpers::getHomeRecentMovies();
                if(count($moviesThisWeek) > 0) {
                
                    foreach ($moviesThisWeek as $movie) {
                        $categoriesStr = "";
                        foreach($movie->get("Categories") as $category) {
                            $categoriesStr .= $category->get("Name") . " ";
                        }
                        $test = $movie->get("PosterImgSrc");
                        echo '
                            <tr>
                                <td class="row-top-rating">' . $movie->get('Rating') . '</td>
                                <td class="row-top-date">' . $movie->get('ReleaseDate') . '</td>
                                <td class="row-top-poster"><img src="' . $test . '"></td>
                                <td class="row-top-name">' . $movie->get('Name') . '</td>
                                <td class="row-top-category">' .  $categoriesStr . '</td>
                            </tr>
                            ';
                    }
                }
        ?>
            </table>
        </div>

        <div class="down-tables">
            <div class="shared-tbl-scroller">
                <table class="shared-movies-tbl">
                    <tr>
                        <td>
                            <p class="movie-name"> Armageddon </p>
                            <p class="description">The humanity is in danger...</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="movie-name"> Pride </p>
                            <p class="description">Segregation in the 60s...</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="movie-name"> White chicks </p>
                            <p class="description">Two policemen...</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="festivals-tbl-scroller">
                <table class="festivals-tbl">
                    <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/FestivalHelpers.php';
                        $festivals = FestivalHelpers::getFestivals();
                        foreach($festivals as $festival) {
                            echo '
                            <tr>
                                <td>
                                    <p class = "movie-name">' . $festival->get('Name') . '</p>
                                    <p class = "description">' . $festival->get('Description') . '</p>
                                </td>
                            </tr>';
                        }

                    ?>
                </table>
            </div>
            <div class="projections-tbl-scroller">
                <table class="projections-tbl">
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
                                <p class=\"movie-name\"> {$key} </p>
                                <p class=\"description\"> <b>{$movieTime} {$movieLocation}</p>
                            </td>
                        </tr>";
                    }
                ?>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

  
    jQuery('.top-week-btn').click(function () {
        if ($(this).text() === "This week top movies") {
            $('.top-week-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
        } else {
            $('.top-week-tbl').hide();
            $(this).text("This week top movies");
        }
    });

    jQuery('.shared-movies-btn').click(function () {
        if ($(this).text() === "Movies shared by the community") {
            $('.shared-movies-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
        } else {
            $('.shared-movies-tbl').hide();
            $(this).text("Movies shared by the community");
        }
    });

    jQuery('.projections-btn').click(function () {
        if ($(this).text() === "Movies projections this week") {
            $('.projections-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
        } else {
            $('.projections-tbl').hide();
            $(this).text("Movies projections this week");
        }
    });

    jQuery('.festivals-btn').click(function () {
        if ($(this).text() === "Movie festivals") {
            $('.festivals-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');

        } else {
            $('.festivals-tbl').hide();
            $(this).text("Movie festivals");
        }
    });

    jQuery('.watch-later-btn').click(function () {
        if ($(this).text() === "Watch later") {
            $('.watch-later-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');

        } else {
            $('.watch-later-tbl').hide();
            $(this).text("Watch later");
        }
    });

</script>
</body>

</html>