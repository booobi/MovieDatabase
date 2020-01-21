<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel="stylesheet" href="DuplicatedDesign.css">
    <link rel="stylesheet" href="AddAMovieDesign.css">
    <script type="text/javascript" src="EditAMovieLogic.js"></script>
</head>

<body>
<div class="navigation">
    <div class="logo"> Movie Time</div>

    <div class="search">
        <form action="/action_page.php" id="search-box">
            <input type="text" placeholder="Search movie, actor, director...">
        </form>
        <div class="advanced-search">
            <input type="checkbox" id="check-adv-search" value="check"> Advanced search
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

    <div class="menu">
        <button class="menu-btn" id="home"> <a href="Home.php">Home</a></button>
        <button class="menu-btn" id="add-a-post"> <a href="AddAPost.php">Add a post </a></button>
        <button class="menu-btn" id="movies"><a href="Movies.php">Movies </a></button>
        <button class="menu-btn" id="movie-festivals"><a href="Festivals.php">Festivals </a></button>
    </div>
</div>

<form action="/action_page.php">
    <div class = "movie-content">
        <div class="fields" id="up-header">
            <input type="text" id="title-field" placeholder="Movie title . . . ">
            <input type="url" id="poster-field" placeholder="Poster link . . .">
        </div>

        <div class = "first-column">
            <div class="fields" id="movie-director">
                <input type="text" id="director-field" placeholder="Director . . . ">
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
                <select id="test">
                    <option>Action</option>
                    <option>Adventure</option>
                    <option>Comedy</option>
                    <option>Drama</option>
                    <option>Musical</option>
                    <option>Romance</option>
                    <option>Thriller</option>
                    <option>Western</option>
                </select>
            </div>
            <div class="fields" id="movie-actors">
                <input type="text" id="actors-field" placeholder="Actors . . . ">
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
                <div class = "description-scroller">
                    <textarea placeholder="Description . . . " maxlength="540" id = "description-area"></textarea>
                </div>
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
                <input type="text" id="stars-field" placeholder="Lead actors . . . ">
            </div>
        </div>

        <div id= "down-header">
            <button class="movies-btn" id="add-a-movie" onclick="validateFields()">Edit the movie</button>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="multiselect.min.js"></script>

<script>

    $(document).ready(function () {
        $("#test").CreateMultiCheckBox({ width: '177px', defaultText : 'Category . . . ', height:'350px' });
    });

    $(document).ready(function () {
        $(document).on("click", ".MultiCheckBox", function () {
            let detail = $(this).next();
            detail.show();
        });

        /*  $(document).on("click", ".MultiCheckBoxDetailHeader input", function (e) {
               e.stopPropagation();
               let hc = $(this).prop("checked");
               $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
               $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
           });

           $(document).on("click", ".MultiCheckBoxDetailHeader", function (e) {
               let inp = $(this).find("input");
               let chk = inp.prop("checked");
               inp.prop("checked", !chk);
               $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
               $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
           });
    */
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
            divSel.css({ "width": localOption.width });

            let detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
            detail.css({ "width": 219 });
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