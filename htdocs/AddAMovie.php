<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/HomeDesign.css">
    <link rel="stylesheet" href="/css/AddAMovieDesign.css">

    <?php
        echo '
        <script>
            const action = "add";
        </script>
        ';
    ?>
   
     <form>
          <div class = "movie-content">
              <div class="fields" id="up-header">
                  <input type="text" id="title-field" placeholder="Movie title . . . ">
                  <input type="url" id="poster-field" placeholder="Poster link . . .">
              </div>

              <div class = "first-column">
                  <div class="fields" id="movie-director">
                    <select id="directorSelect" style="display:none;">
                        <?php
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';
                            $participants = ParticipantHelpers::getParticipants();
                            $participants = array_filter($participants, function($v, $k) {
                                return $v->get("Position") == "director";
                            }, ARRAY_FILTER_USE_BOTH);
                            foreach($participants as $participant) {
                                echo '<option value="' . $participant->get("Id") .'">'
                                . $participant->get("FirstName") . " " . $participant->get("LastName") .
                                '</option>';
                            }
                        ?>
                    </select>
                   </div>

                  <div class="fields" id="movie-awards">
                      <input type="text" id="awards-field" placeholder="Awards . . . ">
                  </div>

                   <div class="fields" id="movie-music">
                       <input type="text" id="music-field" placeholder="Music . . . ">
                   </div>

                   <div class="fields" id="movie-company">
                       <input type="text" id="studio-field" placeholder="Movie company . . . ">
                   </div>

                   <div class="fields" id="movie-category">
                        <select id="categorySelect">
                            <?php
                                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CategoryHelpers.php';
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
                                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';
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
                        <input type="text" id="language-field" placeholder="Language . . . ">
                   </div>

                   <div class="fields" id="movie-release">
                        <p>Release date . . .</p>
                        <input type="date" id="release-field">
                   </div>

                   <div class="fields" id="movie-description">
                        <textarea placeholder="Description . . . " maxlength="540" id = "description-area"></textarea>
                   </div>
              </div>

              <div class="third-column">
                   <div class="fields" id="movie-trailer">
                         <input type="text" id="trailer-field" placeholder="Trailer . . . ">
                   </div>

                    <div class="fields" id="movie-duration">
                         <input type="number" id="duration-field" placeholder="Duration . . ." />
                        <p class = "duration-mins">in minutes</p>
                    </div>

                    <div class="fields" id="movie-country">
                          <input type="text" id="country-field" placeholder="Country . . . ">
                    </div>

                    <div class="fields" id="movie-location">
                          <input type="text" id="location-field" placeholder="Filmed in . . . ">
                    </div>

                    <div class="fields" id="movie-rating">
                          <input type="text" id="rating-field" placeholder="IMDB Rating . . . ">
                    </div>

                    <div class="fields" id="movie-stars">
                        <select id="mainActorsSelect" style="display:none;">
                            <?php
                                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';
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

              <div id = "down-header">
                  <button class="movies-btn" id="add-a-movie" onclick="submitMovie(event)">Add the movie</button>
              </div>
           </div>

     </form>

    <script type="text/javascript" src="/js/movie-submission.js"></script>
</body>
</html>