<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css//NewHomeDesign.css">
    <link rel="stylesheet" href="css/NewAddAMovieDesign.css">
    <link rel="stylesheet" href="css/NewDuplicatedDesign.css">

</head>

<body>
    <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/NewHeader.php';
            if(!isset($_GET['id']))
            {
                echo "You need to provide a movie id in order to edit!!";
                die();
            } else {
                $movieId = $_GET['id'];
            }
        
        include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CategoryHelpers.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
                
        $movie = MovieHelpers::getMovie($movieId);
        $movieActors = $movie->get("Actors");
        $movieDirector = $movie->get("Director");
        $movieCategories = $movie->get("Categories");

        echo '
        <script>
            const movieActors = ' . json_encode($movieActors) . ';
            const movieDirector = ' . json_encode($movieDirector) . ';
            const movieCategories = ' . json_encode($movieCategories) . ';
            const action = "edit";
            const movieId = '. $_GET['id'] .';
        </script>
        ';
    ?>

    <form action="/action_page.php">
        <div class="movie-content">
            <div class="fields" id="up-header">

            </div>
                <?php
                echo '
                <input type="text" id="title-field" value="'. $movie->get("Name") .'">
                <input type="url" id="poster-field" value="'. $movie->get("PosterImgSrc") .'">
                '
                ?>
            <div class="first-column">
                <div class="fields" id="movie-director">
                    <select id="directorSelect" style="display:none;">
                        <?php
                            
                            $participants = ParticipantHelpers::getParticipants();
                            $participants = array_filter($participants, function($v, $k) {
                                return $v->get("Position") == "director";
                            }, ARRAY_FILTER_USE_BOTH);
                            foreach($participants as $participant) {
                                echo '<option checked="true" value="' . $participant->get("Id") .'">'
                                . $participant->get("FirstName") . " " . $participant->get("LastName") .
                                '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="fields" id="movie-awards">
                    <?php
                        echo 
                        '
                        <input type="text" id="awards-field" '. ($movie->get("Awards") ? "value='".$movie->get("Awards") . "'" : "placeholder='No Awards ...'") .'">
                        '
                    ?>
                  </div>

                   <div class="fields" id="movie-music">
                    <?php
                        echo 
                        '
                        <input type="text" id="music-field" '. ($movie->get("MusicStudio") ? "value='".$movie->get("MusicStudio") . "'" : "placeholder='No Music Company ...'") .'">
                        '
                    ?>
                   </div>

                   <div class="fields" id="movie-company">
                    <?php
                        echo 
                        '
                        <input type="text" id="studio-field" '. ($movie->get("MovieStudio") ? "value='".$movie->get("MovieStudio") . "'" : "placeholder='No Movie Company ...'") .'">
                        '
                    ?>
                   </div>

                   <div class="fields" id="movie-category">
                        <select id="categorySelect">
                            <?php
                                $categories = CategoryHelpers::getAllCategories();

                                foreach($categories as $category) {
                                    echo '<option value="' . $category->get("Id") .'">' . $category->get("Name") . '</option>';
                                }
                            ?>
                        </select>
                   </div>
                   <div class="fields" id="movie-actors">
                        <select id="actorsSelect" style="display:none;">
                            <?php
                                $participants = ParticipantHelpers::getParticipants();

                                foreach($participants as $participant) {
                                    echo '<option value="' . $participant->get("Id") .'">'
                                     . $participant->get("FirstName") . " " . $participant->get("LastName") .
                                     '</option>';
                                }
                            ?>
                        </select>
                   </div>
              </div>

              <div class = "second-column">
                   <div class="fields" id="movie-language">
                    <?php
                        echo 
                        '
                        <input type="text" id="language-field" value="'. $movie->get("Language") .'">
                        '
                    ?>
                   </div>

                   <div class="fields" id="movie-release">
                        
                        <?php
                        echo 
                        '
                        <p>'. $movie->get("ReleaseDate") .'</p>
                        <input type="date" id="release-field" value="'. $movie->get("ReleaseDate") .'">
                        '
                    ?>
                   </div>

                <div class="fields" id="movie-description">
                    <div class="description-scroller">
                    <?php
                        echo 
                        '
                        <textarea maxlength="540" id = "description-area">'. $movie->get("Description") .'</textarea>
                        '
                    ?>
                    </div>
                </div>
            </div>

            <div class="third-column">
                   <div class="fields" id="movie-trailer">
                   <?php
                        echo 
                        '
                        <input type="text" id="trailer-field" value="'. $movie->get("TrailerSrc") .'">
                        '
                    ?>
                   </div>

                    <div class="fields" id="movie-duration">
                    <?php
                        $timesplit=explode(':',$movie->get("Duration"));
                        $min=($timesplit[0]*60)+($timesplit[1])+($timesplit[2]>30?1:0);
                    
                        echo 
                        '
                        <input type="number" id="duration-field" value="'. $min .'" />
                        '
                    ?>
                        <p class = "duration-mins">in minutes</p>
                    </div>

                    <div class="fields" id="movie-country">
                        <?php
                            echo 
                            '
                            <input type="text" id="country-field" value="'. $movie->get("Country") .'">
                            '
                        ?>
                    </div>

                    <div class="fields" id="movie-location">
                        <?php
                            echo 
                            '
                            <input type="text" id="location-field" value="'. $movie->get("Country") .'">
                            '
                        ?>
                    </div>

                    <div class="fields" id="movie-rating">
                        <?php
                            echo 
                            '
                            <input type="text" id="rating-field" value="'. $movie->get("IMDBRating") .'">
                            '
                        ?>
                    </div>

                    <div class="fields" id="movie-stars">
                        <select id="mainActorsSelect" style="display:none;">
                            <?php
                                $participants = ParticipantHelpers::getParticipants();

                                foreach($participants as $participant) {
                                    echo '<option value="' . $participant->get("Id") .'">'
                                    . $participant->get("FirstName") . " " . $participant->get("LastName") .
                                    '</option>';
                                }
                            ?>
                        </select>
                    </div>
              </div>

            <div id="down-header">
                <button class="movies-btn" id="add-a-movie" onclick="submitMovie(event)">Edit the movie</button>
            </div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/movie-submission.js"></script>
    <script>
    $(document).ready(function () {

//check assigned director, actors and categories

        $("#movie-stars input[type='checkbox']").each((index, val) => {
            if(movieActors.filter(actor => actor.isMainActor).map(actor => actor.id.toString()).includes($(val).attr("value"))) {
                $(val).prop("checked", true);
            }
        });

        $("#movie-actors input[type='checkbox']").each((index, val) => {
            if(movieActors.filter(actor => !actor.isMainActor).map(actor => actor.id.toString()).includes($(val).attr("value"))) {
                $(val).prop("checked", true);
            }
        });

        $("#movie-director input[type='checkbox']").each((index, val) => {
            if(movieDirector.id.toString() === $(val).attr("value")) {
                $(val).prop("checked", true);
            }
        });

        $("#movie-category input[type='checkbox']").each((index, val) => {
            if(movieCategories.map(category => category.id.toString()).includes($(val).attr("value"))) {
                $(val).prop("checked", true);
            }
        });

        $("input[type='checkbox']").trigger("change");
    });
    </script>
</body>

</html>