<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel="stylesheet" href="AdministrationDesign.css">
    <link rel="stylesheet" href="DuplicatedDesign.css">
</head>

<body>
<div class="navigation">
    <div class="logo"> Movie Time</div>

    <div class="search">
        <form action="/action_page.php" id="search-box">
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
        <button class="profile-btn" id="profile-btn"><a href="Profile.php">Profile</a></button>
        <button class="profile-btn" id="log-out-btn">Log-out</button>
    </div>

    <div class="menu">
        <button class="menu-btn" id="home"> <a href="Home.php">Home</a></button>
        <button class="menu-btn" id="add-a-post"> <a href="AddAPost.php">Add a post </a></button>
        <button class="menu-btn" id="movies"><a href="Movies.php">Movies </a></button>
        <button class="menu-btn" id="movie-festivals"><a href="Festivals.php">Festivals </a></button>
    </div>
</div>

<div class = "categories-title">
    Movie categories
</div>
<button class = "categories-btn" onclick="showCategoryForm()">Add a category</button>
<div id = "users-categories-container">
    <div id="active-users-box">
        <p>Active users</p>
        <div class = "active-users-scroller">
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
    <div class = "categories-scroller">
        <div id = "categories-box">
            <table class="movie-categories-tbl" cellspacing="0" cellpadding="0">
                 <tr>
                     <th class = "col-category">
                       Category
                     </th>
                     <th class = "col-category-options">
                         Options
                     </th>
                 </tr>
                <tr>
                    <td class = "row-category">
                        Action
                    </td>
                    <td class = "row-category-options">
                        <button class = "edit-category-btn" onclick="showEditCategoryForm()">Edit</button>
                        <button class = "delete-category-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-category">
                        Drama
                    </td>
                    <td class = "row-category-options">
                        <button class = "edit-category-btn" onclick="showEditCategoryForm()">Edit</button>
                        <button class = "delete-category-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-category">
                        Comedy
                    </td>
                    <td class = "row-category-options">
                        <button class = "edit-category-btn" onclick="showEditCategoryForm()">Edit</button>
                        <button class = "delete-category-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-category">
                        Musical
                    </td>
                    <td class = "row-category-options">
                        <button class = "edit-category-btn" onclick="showEditCategoryForm()">Edit</button>
                        <button class = "delete-category-btn">Delete</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="awaiting-users-box">
        <p>Users awaiting email approval</p>
        <div class = "awaiting-users-scroller">
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
</div>

<div class = "participants-title">
    Movie participants
</div>
<button class = "participants-btn" onclick="showParticipantForm()">Add a participant</button>
<div id = "participants-container">
    <div class = "participants-scroller">
        <div id = "participants-box">
            <table class="movie-participants-tbl">
                <tr>
                    <th class = "col-participants-name">
                        Name
                    </th>
                    <th class = "col-participants-role">
                        Role
                    </th>
                    <th class = "col-participants-main">
                        Main actor
                    </th>
                    <th class = "col-participants-options">
                        Options
                    </th>
                </tr>
                <tr>
                    <td class = row-participants-name>
                       James Cameron
                    </td>
                    <td class = row-participants-role>
                        Director
                    </td>
                    <td class = row-participants-main>
                        No
                    </td>
                    <td class = "row-participants-options">
                        <button class = "edit-category-btn" onclick="showEditParticipantForm()">Edit</button>
                        <button class = "delete-category-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = row-participants-name>
                       Kate Winslet
                    </td>
                    <td class = row-participants-role>
                        Actor
                    </td>
                    <td class = row-participants-main>
                        Yes
                    </td>
                    <td class = "row-participants-options">
                        <button class = "edit-category-btn" onclick="showEditParticipantForm()">Edit</button>
                        <button class = "delete-category-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = row-participants-name>
                        Leonardo Dicaprio
                    </td>
                    <td class = row-participants-role>
                        Actor
                    </td>
                    <td class = row-participants-main>
                        Yes
                    </td>
                    <td class = "row-participants-options">
                        <button class = "edit-category-btn" onclick="showEditParticipantForm()">Edit</button>
                        <button class = "delete-category-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = row-participants-name>
                        Billy Zane
                    </td>
                    <td class = row-participants-role>
                        Actor
                    </td>
                    <td class = row-participants-main>
                        No
                    </td>
                    <td class = "row-participants-options">
                        <button class = "edit-category-btn" onclick="showEditParticipantForm()">Edit</button>
                        <button class = "delete-category-btn">Delete</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class = "festivals-title">
    Movies festivals
</div>
<button class = "festivals-btn" onclick="showFestivalForm()">Add a festival</button>
<div id = "festivals-container">
    <div class = "festivals-scroller">
        <div id = "festivals-box">
            <table class = "movie-festivals-tbl" cellspacing="0" cellpadding="0">
                <tr>
                    <th class = "col-festival-name">
                        Name
                    </th>
                    <th class = "col-festival-options">
                        Options
                    </th>
                </tr>
                <tr>
                    <td class = "row-festival-name">
                        "Avatar" projection
                    </td>
                    <td class = "row-festival-options">
                        <button class="edit-category-btn" onclick="showEditFestivalForm()">See/Edit</button>
                        <button class="delete-category-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-festival-name">
                        "Avatar" projection
                    </td>
                    <td class = "row-festival-options">
                        <button class="edit-category-btn" onclick="showEditFestivalForm()">See/Edit</button>
                        <button class="delete-category-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td class = "row-festival-name">
                        "Avatar" projection
                    </td>
                    <td class = "row-festival-options">
                        <button class="edit-category-btn" onclick="showEditFestivalForm()">See/Edit</button>
                        <button class="delete-category-btn">Delete</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id = "new-category-container">
    <img class = "close-btn" id="new-category-close-btn" src="xbutton.png">
    <div id = "new-category-box">
        <form action="#" id="new-category-form">
            <input type="text" id="new-category-name" class="details-field" placeholder="Category name . . .">
            <a href="javascript:%20validateLogIn()" id="submit-category">Submit</a>
        </form>
    </div>
</div>
<div id = "edit-category-container">
    <img class = "close-btn" id="edit-category-close-btn" src="xbutton.png" onclick="hideEditCategoryForm()">
    <div id = "edit-category-box">
        <form action="#" id="edit-category-form">
            <input type="text" id="edit-category-name" class="details-field" placeholder="Category name . . .">
            <a href="javascript:%20validateLogIn()" id="submit-category-changes">Submit</a>
        </form>
    </div>
</div>

<div id = "new-participant-container">
    <img class = "close-btn" id="new-participant-close-btn" src="xbutton.png" onclick="hideParticipantForm()">
    <div id = "new-participant-box">
        <form action="#" id="new-participant-form">
            <input type="text" id="participant-name" class="details-field" placeholder="Participant name . . .">
            <input type="text" id="participant-role" class="details-field" placeholder="Participant role . . .">
            <a href="javascript:%20validateLogIn()" id="submit-participant">Submit</a>
        </form>
    </div>
</div>
<div id = "edit-participant-container">
    <img class = "close-btn" id="edit-participant-close-btn" src="xbutton.png">
    <div id = "edit-participant-box">
        <form action="#" id="edit-participant-form">
            <input type="text" id="edit-participant-name" class="details-field" placeholder="Participant name . . .">
            <input type="text" id="edit-participant-role" class="details-field" placeholder="Participant role . . .">
            <a href="javascript:%20validateLogIn()" id="submit-participant-changes">Submit</a>
        </form>
    </div>
</div>

<div id = "new-festival-container">
    <img class = "close-btn" id="new-festival-close-btn" src="xbutton.png">
    <div id = "new-festival-box">
        <form action="#" id="new-festival-form">
            <input type="text" id="new-festival-name" class="details-field" placeholder="Festival name . . . ">
            <input type="url" id="festival-poster-field" placeholder="Poster link . . .">
            <div class = "festival-info-scroller">
                <div class = "festival-info">
                <textarea id = "festival-description-text" placeholder="Description . . . " maxlength="1000"></textarea>
                </div>
            </div>
            <a href="javascript:%20validateLogIn()" id="submit-festival">Submit</a>
        </form>
    </div>
</div>
<div id = "edit-festival-container">
    <img class = "close-btn" id="edit-festival-close-btn" src="xbutton.png">
    <div id = "edit-festival-box">
        <form action="#" id="edit-festival-form">
            <input type="text" id="edit-festival-name" class="details-field" placeholder="Festival name . . . ">
            <input type="url" id="edit-festival-poster-field" placeholder="Poster link . . .">
            <div class = "festival-info-scroller">
                <div class = "festival-info">
                    <textarea id = "edit-festival-description-text" maxlength="1000">
                        Nick’s friend Shane persuades him to come to the Giant Music Festival
                        to get over her, as they have already bought their tickets and Shane
                        wants to meet DJ Hammerhead (who performs wearing a hammerhead shark mask).
                        On the train they meet Amy, a talkative Australian who has attended the
                        festival for nine consecutive years. Shane is clearly attracted to her.
                        Despite hiding from the inspector by pretending to have an orgy in the toilet,
                        the three are ejected from the train for travelling on child tickets.
                        After reaching the event on foot, Nick and Shane meet Caitlin and her wealthy friends,
                        who are staying in a luxurious tent. They meet a man nicknamed “Pirate” because of his
                        amputated leg, who has designs on Caitlin, and puts Nick down by affecting to mistake
                        his name for "Lick". Caitlin loses her phone; Nick finds it, despite being urinated on
                        by another man, and brings it back to the tent. He has to hide when Caitlin
                        He has to hide when Caitlin He has to hide when Caitlin He has to hid
                    </textarea>
                </div>
            </div>
            <a href="javascript:%20validateLogIn()" id="submit-festival-changes">Submit</a>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="multiselect.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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



    function showCategoryForm() {
        document.getElementById("new-category-container").style.display = "block";
    }

    function showEditCategoryForm() {
        document.getElementById("edit-category-container").style.display = "block";
    }

    function showParticipantForm() {
        document.getElementById("new-participant-container").style.display = "block";
    }

    function showEditParticipantForm() {
        document.getElementById("edit-participant-container").style.display = "block";
    }

    function showFestivalForm() {
        document.getElementById("new-festival-container").style.display = "block";
    }

    function showEditFestivalForm() {
        document.getElementById("edit-festival-container").style.display = "block";
    }


</script>
</body>
</html>