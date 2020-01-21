<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel="stylesheet" href="FestivalDesign.css">
    <link rel="stylesheet" href="DuplicatedDesign.css">

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

<div class = "festival-title">
    Festivals
</div>
<button class = "add-festival-btn" onclick="showFestForm()">Add a festival</button>
<div class = "fest-scroller">
  <div id = "festival-box">
    <table class="fest-tbl">
        <tr>
            <th class = "col-fest-poster"></th>
            <td class = "row-fest-poster">
              <img src = "https://www.printingincannes.com/wp-content/uploads/2019/04/blog_Cannes_Film_festival_Printingincannes-760xauto_0_0.jpg">
            </td>
            <th class = "col-fest-name"></th>
            <td class = "row-fest-name">
                Cannes Festival
            </td>
            <th class = "col-fest-info"></th>
            <td class = "row-fest-info">
                <div class = "fest-text">
                The Cannes Film Festival has its origins in 1932 when Jean Zay,
                the French Minister of National Education, on the proposal of historian
                Philippe Erlanger and with the support of the British and Americans,
                set up an international cinematographic festival.
                Its origins may be attributed in part to the French desire to compete with the Venice Film Festival,
                which at the time was shocking the democratic world by its fascist bias.
                The first festival was planned for 1939, Cannes was selected as the location for it,
                but the funding and organization were too slow and finally, the beginning of World War II put an end to this plan.
                </div>
            </td>
            <th class = "col-fest-options"></th>
            <td class = "row-fest-options">
                <button class = "edit-fest-btn" onclick="showEditFestForm()">Edit</button>
                <button class = "delete-fest-btn">Delete</button>
            </td>
        <tr>
    </table>
  </div>
</div>

<div id = "new-fest-container">
    <img class = "close-btn" id="new-fest-close-btn" src="xbutton.png" onclick="hideFestForm()">
    <div id = "new-fest-box">
        <form action="#" id="new-fest-form">
            <input type="text" id="new-fest-name" class="fest-details-field" placeholder="Festival name . . . ">
            <input type="url" id="fest-poster-field" placeholder="Poster link . . .">
            <div class = "fest-info-scroller">
                <div class = "fest-info">
                    <textarea id = "fest-description-text" placeholder="Description . . . " maxlength="1000"></textarea>
                </div>
            </div>
            <a href="javascript:%20validateLogIn()" id="submit-fest">Submit</a>
        </form>
    </div>
</div>

<div id = "edit-fest-container">
    <img class = "close-btn" id="edit-fest-close-btn" src="xbutton.png">
    <div id = "edit-fest-box">
        <form action="#" id="edit-fest-form">
            <input type="text" id="edit-fest-name" class="details-field" placeholder="Festival name . . . ">
            <input type="url" id="edit-fest-poster-field" placeholder="Poster link . . .">
            <div class = "fest-info-scroller">
                <div class = "fest-info">
                    <textarea id = "edit-fest-description-text" maxlength="1000">
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
            <a href="javascript:%20validateLogIn()" id="submit-fest-changes">Submit</a>
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

    function showFestForm() {
        document.getElementById("new-fest-container").style.display = "block";
    }

    function showEditFestForm() {
        document.getElementById("edit-fest-container").style.display = "block";
    }


</script>
</body>