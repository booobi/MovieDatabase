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
    <link rel="stylesheet" href="/newMovies.css">
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
                
                $movies = [];
                //if movie search
                if(isset($_GET['q']) && $_GET['q']) {
                    $movies = MovieHelpers::getMoviesContaining($_GET['q']);
                }
                else {
                    $movies = MovieHelpers::getMovies();
                }
               
                
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

    <div class = "movie-projections-title">
           Movie projections
       </div>
       <div class = "projections-scroller">
           <div id = "projections-box">
               <table class = "my-projections-tbl" cellspacing="0" cellpadding="0">
                   <tr>
                       <th class = "col-prj-name">
                           Name
                           <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                       </th>
                       <th class = "col-prj-location">
                           Location
                       </th>
                       <th class = "col-prj-duration">
                           Duration
                           <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                       </th>
                       <th class = "col-prj-date">
                           Date
                       </th>
                       <th class = "col-prj-options">
                           Options
                       </th>
                   </tr>
                   <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';
                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                
                $projections = MovieProjectionHelpers::getMovieProjections();

                foreach($projections as $projection) {
                    
                    echo'
                    <tr>
                       <td class = "row-prj-name">
                           ' . $projection->get("Name") . '
                       </td>
                       <td class = "row-prj-location">
                       ' . $projection->get("Location") . '
                       </td>
                       <td class = "row-prj-duration">
                       ' . $projection->get("Duration") . '
                       </td>
                       <td class = "row-prj-date">
                       ' . $projection->get("Date") . '
                       </td>
                       <td class = "row-prj-options">';
                       $user = UserHelpers::getCurrentUser();
                       if($user) {
                            $userId =$user->get("UserId");
                            if(MovieProjectionHelpers::userIsOwnerOfProjection($projection->get("Id"), $userId)){
                                echo '<button class = "edit-btn" onclick="showEditProjectionForm('. $projection->get("Id") .')">Edit</button>
                                <button class="delete-btn" onclick="deleteProjection('. $projection->get("Id") .')">Delete</button>';
                            } else if(MovieProjectionHelpers::userHasRequestForProjection($projection->get("Id"), $userId)){
                                echo '<button class="cancel-btn" onclick="deleteProjectionJoin('. $projection->get("Id") .')">Cancel</button>';
                            } else {
                                echo '<button class="join-btn" onclick="requestProjectionJoin('. $projection->get("Id") .')">Join</button>';
                            }
                       }
                        
                       echo '</td>
                   </tr>
                    ';
                }
                ?>
                   <tr>
                       <td class = "row-prj-name">
                           "Avatar" projection
                       </td>
                       <td class = "row-prj-location">
                           Serdika Center
                       </td>
                       <td class = "row-prj-duration">
                           123 min
                       </td>
                       <td class = "row-prj-date">
                           2 Sep 2019
                       </td>
                       <td class = "row-prj-options">
                           <button class = "join-btn" onclick="showJoinProjForm()">Join</button>
                           <button class = "cancel-btn">Cancel</button>
                           <br><button class = "edit-btn" onclick="showEditProjectionForm()">Edit</button>
                           <button class = "delete-btn">Delete</button>
                       </td>
                   </tr>
                   <tr>
                       <td class = "row-prj-name">
                           "Going On 30" projection
                       </td>
                       <td class = "row-prj-location">
                           Paradise Center
                       </td>
                       <td class = "row-prj-duration">
                           220 min
                       </td>
                       <td class = "row-prj-date">
                           21 Sep 2010
                       </td>
                       <td class = "row-prj-options">
                           <button class = "join-btn" onclick="showJoinProjForm()">Join</button>
                           <button class = "cancel-btn">Cancel</button>
                           <br><button class = "edit-btn" onclick="showEditProjectionForm()">Edit</button>
                           <button class = "delete-btn">Delete</button>
                       </td>
                   </tr>
                   <tr>
                       <td class = "row-prj-name">
                           "Wanted" projection <!-- max length = ?-->
                       </td>
                       <td class = "row-prj-location">
                           Vitoshka
                       </td>
                       <td class = "row-prj-duration">
                           152 min
                       </td>
                       <td class = "row-prj-date">
                           5 Jan 2015
                       </td>
                       <td class = "row-prj-options">
                           <button class = "join-btn" onclick="showJoinProjForm()">Join</button>
                           <button class = "cancel-btn">Cancel</button>
                           <br><button class = "edit-btn" onclick="showEditProjectionForm()">Edit</button>
                           <button class = "delete-btn">Delete</button>
                       </td>
                   </tr>
               </table>
           </div>
       </div>

       <div class = "movie-exchanges-title">
           Share requests
       </div>
       <div class = "exchanges-scroller">
           <div id = "exchanges-box">
               <table class = "my-exchanges-tbl" cellspacing="0" cellpadding="0">
                   <tr>
                       <th class = "col-exchanges-movies">
                           Movies
                           <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                       </th>
                       <th class = "col-exchanges-status">
                           Status
                       </th>
                       <th class = "col-exchanges-add-rating">
                       </th>
                       <th class = "col-exchanges-rating">
                           Share rating
                           <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                       </th>
                       <th class = "col-exchanges-options">
                           Options
                       </th>
                   </tr>
                   <tr>
                       <td class = "row-exchanges-movies">
                           Fast and Furious
                       </td>
                       <td class = "row-exchanges-status">
                           Shared
                       </td>
                       <td class = "row-add-rating">
                           <button class = "add-rating-btn" onclick="showShareRating()">Add a rating</button>
                       </td>
                       <td class = "row-exchanges-rating">
                           4
                       </td>
                       <td class = "row-exchanges-options">
                           <button class = "request-btn">Request</button>
                           <button class = "cancel-btn">Cancel</button>
                           <br><button class = "edit-btn" onclick="showEditShareForm()">Edit</button>
                           <button class = "delete-btn">Delete</button>
                       </td>
                   </tr>
                   <tr>
                       <td class = "row-exchanges-movies">
                           Fame
                       </td>
                       <td class = "row-exchanges-status">
                           Not shared
                       </td>
                       <td class = "row-add-rating">
                           <button class = "add-rating-btn" onclick="showShareRating()">Add a rating</button>
                       </td>
                       <td class = "row-exchanges-rating">
                           5
                       </td>
                       <td class = "row-exchanges-options">
                           <button class = "request-btn">Request</button>
                           <button class = "cancel-btn">Cancel</button>
                           <br><button class = "edit-btn" onclick="showEditShareForm()">Edit</button>
                           <button class = "delete-btn">Delete</button>
                       </td>
                   </tr>
                   <tr>
                       <td class = "row-exchanges-movies">
                           Titanic
                       </td>
                       <td class = "row-exchanges-status">
                           Shared
                       </td>
                       <td class = "row-add-rating">
                           <button class = "add-rating-btn" onclick="showShareRating()">Add a rating</button>
                       </td>
                       <td class = "row-exchanges-rating">
                           3
                       </td>
                       <td class = "row-exchanges-options">
                           <button class = "request-btn">Request</button>
                           <button class = "cancel-btn">Cancel</button>
                           <br><button class = "edit-btn" onclick="showEditShareForm()">Edit</button>
                           <button class = "delete-btn">Delete</button>
                       </td>
                   </tr>
               </table>
           </div>
       </div>

       <div id = "rating-share-box">
           <img class="close-btn" id="rating-share-close-btn" src="xbutton.png">
           <div id = "share-rating">
               <select type = "number">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                   <option>5</option>
               </select>
               <button id="rateSubmitBtn" class="add-rating-btn">Rate</button>
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
            <div class="users-watchlater-title">Added to Watchlater list by</div>
            <div class = "users-tbl-scroller">
                <table class="users-tbl">
                    <tr>
                        <td class = "username">
                            4ver
                        </td>
                    </tr>
                    <tr>
                        <td class = "username">
                            lvr
                        </td>
                    </tr>
                    <tr>
                        <td class = "username">
                            maria_34
                        </td>
                    </tr>
                    <tr>
                        <td class = "username">
                            flower
                        </td>
                    </tr>
                    <tr>
                        <td class = "username">
                             abc
                        </td>
                    </tr>
                    <tr>
                        <td class = "username">
                            abc
                        </td>
                    </tr>
                    <tr>
                        <td class = "username">
                            abc
                        </td>
                    </tr>
                </table>
            </div>
            <div class="similar-movies-title">Similar movies</div>
            <div class = "similar-tbl-scroller">
                <table class="similar-movies-tbl">
                    <tr>
                        <td class = "moviename">
                            Mr.Nobody
                        </td>
                    </tr>
                    <tr>
                        <td class = "moviename">
                          Fame
                        </td>
                    </tr>
                    <tr>
                        <td class = "moviename">
                            P.S. I love you
                        </td>
                    </tr>
                    <tr>
                        <td class = "moviename">
                            Titanic
                        </td>
                    </tr>
                    <tr>
                        <td class = "moviename">
                            Avatar
                        </td>
                    </tr>
                    <tr>
                        <td class = "moviename">
                            Avatar
                        </td>
                    </tr>
                    <tr>
                        <td class = "moviename">
                            Avatar
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

       <div id = "edit-projection-container">
           <img class = "close-btn" id="edit-projection-close-btn" src="/images/xbutton.png" onclick="parentNode.style.display='none'">
           <div id = "edit-projection-box">
               <form action="#" id="edit-projection-form">
                   <input type="text" id="projection-name" class="details-field" placeholder="Projection name . . .">
                   <input type="text" id="projection-time" class="details-field" placeholder="Date and time . . .">
                   <input type="text" id="projection-duration" class="details-field" placeholder="Duration . . . ">
                   <div class="fields" id="movie-category">
                       <select id="projection-movies">
                       </select>
                   </div>
                   <input type="text" id="projection-watchers" class="details-field" placeholder="Number of watchers . . . ">
                   <input type="text" id="projection-location" class="details-field" placeholder="Location . . . ">
                   <p>Users awaiting approval</p>
                   <div class = "users-scroller">
                        <div id='projection-participants'>
                            <label class="checkbox-box">
                                4ver
                                <input type="checkbox">
                                <span class="check-mark"></span>
                            </label>
                            <label class="checkbox-box">
                                lvr
                                <input type="checkbox">
                                <span class="check-mark"></span>
                            </label>
                            <label class="checkbox-box">
                                maria5
                                <input type="checkbox">
                                <span class="check-mark"></span>
                            </label>
                            <label class="checkbox-box">
                                flower_34
                                <input type="checkbox">
                                <span class="check-mark"></span>
                            </label>
                        </div>
                   </div>
                   <a href="javascript:%20validateLogIn()" id="submit-projection-changes">Submit</a>
               </form>
           </div>
       </div>

       <div id = "edit-share-container">
           <img class = "close-btn" id="edit-share-close-btn" src="xbutton.png">
           <div id = "edit-share-box">
               <form action="#" id="edit-share-form">
                   <input type="text" id="projection-movie" class="details-field" placeholder="Movie name . . . ">
                   <p>List of users, wanting the movie</p>
                   <div class = "users-scroller">
                       <label class="checkbox-box">
                           4ver
                           <input type="checkbox">
                           <span class="check-mark"></span>
                       </label>
                       <label class="checkbox-box">
                           lvr
                           <input type="checkbox">
                           <span class="check-mark"></span>
                       </label>
                       <label class="checkbox-box">
                           maria5
                           <input type="checkbox">
                           <span class="check-mark"></span>
                       </label>
                       <label class="checkbox-box">
                           flower_34
                           <input type="checkbox">
                           <span class="check-mark"></span>
                       </label>
                   </div>
                   <a href="javascript:%20validateLogIn()" id="submit-share-changes">Submit</a>
               </form>
           </div>
       </div>


    <script src="js/movies.js"></script>

</body>

</html>