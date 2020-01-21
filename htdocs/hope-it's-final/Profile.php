<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel = "stylesheet" href="DuplicatedDesign.css">
    <link rel="stylesheet" href="ProfileDesign.css">
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
<div class = "watchlater-title">
    Watchlater
</div>
<div id = "users-watchlater-container">
    <div id="edit-details-box">
        <form action="#" id="details-form">
            <h2>Edit details</h2>
            <input id="details-email" class="details-field" placeholder="Email . . ." type="email">
            <input id="details-firstname" class="details-field" placeholder="First name . . ." type="text">
            <input id="details-lastname" class="details-field" placeholder="Last name . . . " type="text">
            <a href="javascript:%20validateDetails()" id="submit-details">Save changes</a>
        </form>
    </div>
    <div class = "watchlater-scroller">
        <div id = "watchlater-box">
            <table class="watch-later-tbl" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        Going on 30
                    </td>
                </tr>
                <tr>
                    <td>
                        It's A Wonderful Life
                    </td>
                </tr>
                <tr>
                    <td>
                        Never Backdown
                    </td>
                </tr>
                <tr>
                    <td>
                        Avatar
                    </td>
                </tr>
                <tr>
                    <td>
                        Manhattan
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="edit-password-box">
        <form action="#" id="password-form">
            <h2>Edit password</h2>
            <input id="password-email" class="password-field" placeholder="Old password . . ." type="text">
            <input id="password-firstname" class="password-field" placeholder="New password . . ." type="text">
            <input id="password-lastname" class="password-field" placeholder="Repeat new password . . ." type="text">
            <a href="javascript:%20validatePassword()" id="submit-password">Save changes</a>
        </form>
    </div>
</div>
<div class = "posts-title">
    My posts
</div>
<div id = "posts-container">
    <div class = "posts-scroller">
        <div id = "posts-box">
            <table class="posts-tbl">
                <tr>
                    <th class = "col-posts-posts">
                        Post
                        <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                    </th>
                    <th class = "col-posts-comments">
                        Comments count
                    </th>
                    <th class = "col-posts-rating">
                        Rating
                        <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                    </th>
                    <th class = "col-posts-date">
                        Date
                    </th>
                    <th class = "col-comments-btn">
                    </th>
                </tr>
                <tr>
                    <td class = "row-posts-posts">
                        Please, add "Avatar"
                    </td>
                    <td class = "row-posts-comments">
                        10
                    </td>
                    <td class = "row-posts-rating">
                        9
                    </td>
                    <td class = "row-posts-date">
                        2 Sep 2019
                    </td>
                    <td class = "row-comments-btn">
                        <button onclick="showComments()">Comments</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-posts-posts">
                        I really want to watch "Casablanca"!
                    </td>
                    <td class = "row-posts-comments">
                        12
                    </td>
                    <td class = "row-posts-rating">
                        8
                    </td>
                    <td class = "row-posts-date">
                        21 Sep 2010
                    </td>
                    <td class = "row-comments-btn">
                        <button>Comments</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-posts-posts">
                        Add the ,,Shutter Island", it's worth it> <!-- max length = 40-->
                    </td>
                    <td class = "row-posts-comments">
                        7
                    </td>
                    <td class = "row-posts-rating">
                        5
                    </td>
                    <td class = "row-posts-date">
                        5 Jan 2015
                    </td>
                    <td class = "row-comments-btn">
                        <button>Comments</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-posts-posts">
                        Add the ,,Shutter Island", it's worth it> <!-- max length = 40-->
                    </td>
                    <td class = "row-posts-comments">
                        7
                    </td>
                    <td class = "row-posts-rating">
                        5
                    </td>
                    <td class = "row-posts-date">
                        5 Jan 2015
                    </td>
                    <td class = "row-comments-btn">
                        <button>Comments</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div id = "comments-container">
    <img class = "close-btn" id="comments-close-btn" src="xbutton.png" onclick="hideComments()">
    <div id = "comments-box">
        <div class = "comments-scroller">
            <table class="comments-tbl">
                <tr>
                    <th class = "col-post-comment">
                        Comment
                    </th>
                    <th class = "col-post-post">
                        Post
                        <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                    </th>
                    <th class = "col-post-username">
                        Username
                    </th>
                    <th class = "col-post-rating">
                        User rating
                        <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                    </th>
                    <th class = "col-post-date">
                        Date
                    </th>
                </tr>
                <tr>
                    <td class = "row-post-comment">Yes, it's an awesome movie!</td>
                    <td class = "row-post-post">Please, add "Avatar"!</td>
                    <td class = "row-post-username">deina_89</td>
                    <td class = "row-post-rating">9</td>
                    <td class = "row-post-date">2 Sep 2019</td>
                </tr>
                <tr>
                    <td class = "row-post-comment">I don't like it!I haven't watched such a crappy movie, sly.</td>
                    <td class = "row-post-post">Please, add "Avatar"!</td>
                    <td class = "row-post-username">4ever</td>
                    <td class = "row-post-rating">2</td>
                    <td class = "row-post-date">21 Jan 2019</td>
                </tr>
                <tr>
                    <td class = "row-post-comment">Yes, it's a nice sci-fi</td>
                    <td class = "row-post-post">Please, add "Avatar"!</td>
                    <td class = "row-post-username">lvr</td>
                    <td class = "row-post-rating">5</td>
                    <td class = "row-post-date">8 Sep 2018</td>
                </tr>
                <tr>
                    <td class = "row-post-comment">Don't</td>
                    <td class = "row-post-post">Please, add "Avatar"!</td>
                    <td class = "row-post-username">flower34</td>
                    <td class = "row-post-rating">1</td>
                    <td class = "row-post-date">12 Jun 2010</td>
                </tr>
                <tr>
                    <td class = "row-post-comment">No need</td>
                    <td class = "row-post-post">Please, add "Avatar"!</td>
                    <td class = "row-post-username">maria5</td>
                    <td class = "row-post-rating">1</td>
                    <td class = "row-post-date">17 Jun 2010</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class = "projections-title">
    My projections
</div>
<button class = "projection-btn" onclick="showProjectionForm()">Add a projection</button>
<div class = "exchanges-title">
    Share requests
</div>
<button class = "exchange-btn" onclick="showShareForm()">Share a movie</button>
<div id = "projections-exchanges-container">
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
                        <button onclick="showEditProjForm()">Edit</button>
                        <button>Delete</button>
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
                        <button onclick="showEditProjForm()">Edit</button>
                        <button>Delete</button>
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
                        <button onclick="showEditProjForm()">Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class = "exchanges-scroller">
        <div id = "exchanges-box">
            <table class = "my-exchanges-tbl">
                <tr>
                    <th class = "col-exchanges-movies">
                        Movies
                        <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
                    </th>
                    <th class = "col-exchanges-status">
                        Status
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
                    <td class = "row-exchanges-rating">
                        4
                    </td>
                    <td class = "row-exchanges-options">
                        <button onclick="showEditShareForm()">Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-exchanges-movies">
                        Fame
                    </td>
                    <td class = "row-exchanges-status">
                        Not shared
                    </td>
                    <td class = "row-exchanges-rating">
                        5
                    </td>
                    <td class = "row-exchanges-options">
                        <button onclick="showEditShareForm()">Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-exchanges-movies">
                        Titanic
                    </td>
                    <td class = "row-exchanges-status">
                        Shared
                    </td>
                    <td class = "row-exchanges-rating">
                        3
                    </td>
                    <td class = "row-exchanges-options">
                        <button onclick="showEditShareForm()">Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div id = "new-projection-container">
    <img class = "close-btn" id="new-projection-close-btn" src="xbutton.png" onclick="hideProjectionForm()">
    <div id = "new-projection-box">
        <form action="#" id="new-projection-form">
            <input type="text" id="projection-name" class="details-field" placeholder="Projection name . . .">
            <input type="text" id="projection-time" class="details-field" placeholder="Date and time . . .">
            <input type="text" id="projection-duration" class="details-field" placeholder="Duration . . . ">
            <div class="fields">
                <select class="movies">
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
            <a href="javascript:%20validateLogIn()" id="submit-new-projection">Submit</a>
        </form>
    </div>
</div>
<div id = "edit-projection-container">
    <img class = "close-btn" id="edit-projection-close-btn" src="xbutton.png" onclick="hideEditProjForm()">
    <div id = "edit-projection-box">
        <form action="#" id="edit-projection-form">
            <input type="text" id="projection-name" class="details-field" placeholder="Projection name . . .">
            <input type="text" id="projection-time" class="details-field" placeholder="Date and time . . .">
            <input type="text" id="projection-duration" class="details-field" placeholder="Duration . . . ">
            <div class="fields">
                <select class="movies">
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
<div id = "new-share-container">
    <img class = "close-btn" id="new-share-close-btn" src="xbutton.png" onclick="hideShareForm()">
    <div id = "new-share-box">
        <form action="#" id="new-share-form">
            <input type="text" id="projection-movie" class="details-field" placeholder="Movie name . . . ">
            <ul>
            </ul>
            <a href="javascript:%20validateLogIn()" id="submit-new-share">Submit</a>
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
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="multiselect.min.js"></script>
<script>
    jQuery('.close-btn').click(function () {
        $(this).parent().hide();
    });
    jQuery('.entrance-btn').click(function () {
        $('.entrance-btn').hide();
        if (this.id === 'sign-in')  {
            $('#log-out').show();
            $('#profile').show();
        } else if (this.id === 'log-in'){
            $('#profile').show();
            $('#log-out').show();
        } else if(this.id === 'admin-log-in'){
            $('#admin').show();
            $('#profile').show();
            $('#log-out').show();
        }
        $('.watch-later').show();
        $('.watch-later-tbl').show();
    });
    jQuery('.profile-btn').click(function () {
        if (this.id === 'log-out')  {
            $('.profile-btn').hide();
            $('.watch-later').hide();
            $('.watch-later-tbl').hide();
            $('.watch-later-btn').hide();
            $('.entrance-btn').show();
        }
    });
    function showComments() {
        document.getElementById("comments-container").style.display = "block";
    }
    function showProjectionForm() {
        document.getElementById("new-projection-container").style.display = "block";
    }
    function showEditProjForm() {
        document.getElementById("edit-projection-container").style.display = "block";
    }
    function showShareForm() {
        document.getElementById("new-share-container").style.display = "block";
    }
    function showEditShareForm() {
        document.getElementById("edit-share-container").style.display = "block";
    }

    $(document).ready(function () {
        $(".movies").CreateMultiCheckBox({ width: '', defaultText : 'Movie name . . . ', height:'350px' });
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
            divSel.css({ "width": localOption.width });

            let detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
            detail.css({ "width": ''});
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