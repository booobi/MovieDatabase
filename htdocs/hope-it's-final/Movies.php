<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,600,700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="MoviesLogic.js"></script>
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel="stylesheet" href="DuplicatedDesign.css">
    <link rel="stylesheet" href="MoviesDesign.css">
</head>

<body>
       <div class="navigation">
         <div class="logo"> Movie Time</div>
         <div class="search">
         <form action="/action_page.php" id = "search-box">
            <input type="text" placeholder="Search movie, actor, director...">
         </form>
            <div class="advanced-search">
                 <label class="checkbox-box">
                     Advanced search
                     <input type="checkbox">
                     <span class="check-mark"></span>
                 </label>
             </div>
         <button type="submit">Go!</button>
         </div>
    <div class="user-buttons">
        <button class="entrance-btn" onclick="showSignIn()" id="sign-in-btn">Sign In</button>
        <button class="entrance-btn" onclick="showLogIn()" id="log-in-btn">Log In</button>
        <button class="profile-btn" id="admin-btn">Administration</button>
        <button class="profile-btn" id="profile-btn">Profile</button>
        <button class="profile-btn" id="log-out-btn">Log-out</button>
    </div>
    <div class = "menu">
        <button class="menu-btn" id="home"> <a href = "Home.php">Home</a></button>
        <button class="menu-btn" id="add-a-post"> <a href = "AddAPost.php">Add a post </a></button>
        <button class="menu-btn" id="movies"><a href = "Movies.php">Movies </a></button>
        <button class="menu-btn" id="movie-festivals"><a href = "Festivals.php">Festivals </a></button>
    </div>
</div>

<button class="menu-btn" id="add-a-movie"> <a href = "AddAMovie.php">Add a movie </a></button>

       <div class = "movies-tbl-scroller">
          <div class = "movies-container">
    <table class = "movies-tbl">
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
        <tr>
            <td class = "row-category">
                Drama
            </td>
            <td class = "row-rating">
                3.5/5
                <br><button class = "rating-btn" onclick="showRating()">Give a rating</button>
            </td>
            <td class = "row-poster">
                <img src = "https://upload.wikimedia.org/wikipedia/en/1/19/Titanic_%28Official_Film_Poster%29.png">
            </td>
            <td class = "row-name">
                Titanic
            </td>
            <td class = "row-options">
                <button class = "more-btn" onclick="showInfo()">More</button>
                <button class = "change-movie-btn"><a href = "EditAMovie.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
        <tr>
            <td class = "row-category">
                Romance
            </td>
            <td class = "row-rating">
                3.2/5
                <br><button class = "rating-btn" onclick="showRating()">Give a rating</button>
            </td>
            <td class = "row-poster">
                <img src = "https://upload.wikimedia.org/wikipedia/en/7/7f/PS_I_Love_You_%28film%29.jpg">
            </td>
            <td class = "row-name">
                P.S I Love You
            </td>
            <td class = "row-options">
                <button class = "more-btn" onclick="showInfo()">More</button>
                <button class = "change-movie-btn"><a href = "EditAMovie.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
    </table>
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

       <div id = "sign-in-container">
    <img class = "close-btn" id="sign-close-btn" src="xbutton.png">
    <div id ="sign-in-box">
        <form action="#" id="popup-form" method="post" name="form">
            <h2>Sign In</h2>
            <hr>
            <input id="sign-email" class="popup-field" placeholder="Email" type="text">
            <input id="firstname" class="popup-field" placeholder="First Name" type="text">
            <input id="lastname" class="popup-field" placeholder="Last Name" type="text">
            <input id="sign-password" class="popup-field" placeholder="Password" type="password">
            <input id="repeat" class="repeat" placeholder="Repeat Password" type="password">
            <a href="javascript:%20validateSignIn()" id="submit">Send</a>
        </form>
    </div>
</div>

       <div id = "log-in-container">
    <img class = "close-btn" id="log-close-btn" src="xbutton.png">
    <div id="log-in-box">
        <form action="#" id="popup-form" method="post" name="form">
            <h2>Log In</h2>
            <hr>
            <input id="log-email" class="popup-field" placeholder="Email" type="text">
            <input id="log-password" class="repeat" placeholder="Password" type="password">
            <a href="javascript:%20validateLogIn()" id="submit">Send</a>
        </form>
    </div>
</div>

       <div id = "rating-box">
    <img class="close-btn" id="rating-close-btn" src="xbutton.png">
    <div id = "rating">
        <select type = "number">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        <button class="add-rating-btn">Rate</button>
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
           <img class = "close-btn" id="edit-projection-close-btn" src="xbutton.png" onclick="hideEditProjForm()">
           <div id = "edit-projection-box">
               <form action="#" id="edit-projection-form">
                   <input type="text" id="projection-name" class="details-field" placeholder="Projection name . . .">
                   <input type="text" id="projection-time" class="details-field" placeholder="Date and time . . .">
                   <input type="text" id="projection-duration" class="details-field" placeholder="Duration . . . ">
                   <div class="fields" id="movie-category">
                       <select id="test">
                           <option>Titanic</option>
                           <option>Avatar</option>
                           <option>Mr.Nobody</option>
                           <option>P.S. I love you</option>
                           <option>Fame</option>
                           <option>Wanted</option>
                           <option>It's a wonderful life</option>
                           <option>Selena</option>
                       </select>
                   </div>
                   <input type="text" id="projection-watchers" class="details-field" placeholder="Number of watchers . . . ">
                   <input type="text" id="projection-location" class="details-field" placeholder="Location . . . ">
                   <p>Users awaiting approval</p>
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    jQuery('.entrance-btn').click(function () {
        $('.entrance-btn').hide();

        if (this.id === 'sign-in-btn') {
            $('#log-out-btn').show();
            $('#profile-btn').show();
        } else if (this.id === 'log-in-btn') {
            $('#profile-btn').show();
            $('#log-out-btn').show();
        } else if (this.id === 'admin-btn') {
            $('#admin-btn').show();
            $('#profile-btn').show();
            $('#log-out-btn').show();
        }

        if ($('.mobile-headings').is(":hidden")) {
            $('.watch-later').show();
            $('.watch-later-tbl').show();
        }else{
            $('.watch-later-btn').show();
        }
    });

    jQuery('.profile-btn').click(function () {

        if (this.id === 'log-out-btn')  {
            $('.profile-btn').hide();

            $('.watch-later').hide();
            $('.watch-later-tbl').hide();
            $('.watch-later-btn').hide();
            $('.entrance-btn').show();
        }
    });

    jQuery('.close-btn').click(function () {
        $('.close-btn').parent().hide();
    });




    $(document).ready(function () {
        $("#test").CreateMultiCheckBox({ width: '', defaultText : 'Movie name . . . ', height:'350px' });
    });

    $(document).ready(function () {
        $(document).on("click", ".MultiCheckBox", function () {
            let detail = $(this).next();
            detail.show();
        });

        $(document).on("click", ".MultiCheckBoxDetail .cont input", function (e) {
            e.stopPropagation();
            $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();

            let val = ($(".MultiCheckBoxDetailBody input:checked").length === $(".MultiCheckBoxDetailBody input").length)
            $(".MultiCheckBoxDetailHeader input").prop("checked", val);
        });

        $(document).on("click", ".MultiCheckBoxDetail .cont", function (e) {
            let inp = $(this).find("input");
            let chk = inp.prop("checked");
            inp.prop("checked", !chk);

            let multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
            let multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
            multiCheckBoxDetail.next().UpdateSelect();

            let val = ($(".MultiCheckBoxDetailBody input:checked").length === $(".MultiCheckBoxDetailBody input").length)
            $(".MultiCheckBoxDetailHeader input").prop("checked", val);
        });

        $(document).mouseup(function (e) {
            let container = $(".MultiCheckBoxDetail");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.hide();
            }
        });
    });

    let defaultMultiCheckBoxOption = { width: '160px', defaultText: 'Select Below', height: '200px' };

    jQuery.fn.extend({
        CreateMultiCheckBox: function (options) {

            let localOption = {};
            localOption.width = (options !== null && options.width !== null && options.width !== undefined) ? options.width : defaultMultiCheckBoxOption.width;
            localOption.defaultText = (options !== null && options.defaultText !== null && options.defaultText !== undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
            localOption.height = (options !== null && options.height !== null && options.height !== undefined) ? options.height : defaultMultiCheckBoxOption.height;

            this.hide();
            this.attr("multiple", "multiple");
            let divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + "<span class='k-icon k-i-arrow-60-down'><svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sort-down' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-sort-down fa-w-10 fa-2x'><path fill='currentColor' d='M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z' class=''></path></svg></span></div>").insertBefore(this);
            divSel.css({ "width":''});

            let detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
            detail.css({ "width": '' });
            let multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");

            this.find("option").each(function () {
                let val = $(this).attr("value");

                if (val === undefined)
                    val = '';

                multiCheckBoxDetailBody.append("<div class='cont'><div><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
            });

            multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
        },
        UpdateSelect: function () {
            let arr = [];

            this.prev().find(".mulinput:checked").each(function () {
                arr.push($(this).val());
            });

            this.val(arr);
        },
    });
</script>
</body>
</html>