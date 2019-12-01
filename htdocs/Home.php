<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Share:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/HomeDesign.css">
</head>

<body>
<div class="navigation">
    <div class="logo"> Movie Time</div>

    <div class="search">
        <form action="/action_page.php" id = "search-box">
            <input type="text" placeholder="Search movie, actor, director...">
        </form>
        <div class="advanced-search">
            <input type="checkbox" id="check-adv-search" value="check" >
            Advanced search
        </div>
        <div id = "popup-advanced">
            <p>this should</p>
            <p>be</p>
            <p>a pop-up</p>
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
        <tr>
            <td>Titanic</td>
            <td>Drama</td>
            <td>4.9</td>
            <td>12 Sep 2019</td>
        </tr>
        <tr>
            <td>P.S. I Love You</td>
            <td>Romance</td>
            <td>4.0</td>
            <td>1 Sep 2019</td>
        </tr>
        <tr>
            <td>Wanted</td>
            <td>Action</td>
            <td>3.9</td>
            <td>20 Jan 2010</td>
        </tr>
        <tr>
            <td>Singin' In The Rain</td>
            <td>Musical</td>
            <td>4.7</td>
            <td>18 May 2015</td>
        </tr>
    </table>

    <table class="watch-later-tbl">
        <tr>
            <td>
                <p class="title"> Going on 30 </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="title"> It's A Wonderful Life </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="title"> Never Backdown </p>
            </td>
        </tr>
    </table>

    <table class="shared-movies-tbl down-tables">
        <tr>
            <td>
                <p class="title"> Armageddon </p>
                <p class="description">The humanity is in danger...</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="title"> Pride </p>
                <p class="description">Segregation in the 60s...</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="title"> White chicks </p>
                <p class="description">Two policemen...</p>
            </td>
        </tr>
    </table>

    <table class="projections-tbl down-tables">
        <tr>
            <td class>
                <p class="title"> Mr.Nobody </p>
                <p class="description"> <b>22:30 Arena Cinema</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class = "title"> Norbit </p>
                <p class = "description"> <b>18:00  Cultural Center</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class = "title"> The Shawshank Redemption </p>
                <p class = "description"> <b>17:30 Cinema City</p>
            </td>
        </tr>
    </table>

    <table class = "festivals-tbl down-tables">
        <tr>
            <td class>
                <p class = "title"> Cannes  </p>
                <p class = "description">... </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class = "title"> Sundance </p>
                <p class = "description">...</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class = "title"> <it>Tribeca </p>
                <p class = "description">...</p>
            </td>
        </tr>
    </table>
</div>

<div id="sign-in-box">
    <div id="popup-entrance">
        <form action="#" id="popup-form" method="post" name="form">
            <img id="close-btn" src="images/xbutton.png" onclick ="hideSignIn()">
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
<div id="log-in-box">
    <div id="popup-entrance">
        <form action="#" id="popup-form" method="post" name="form">
            <img id="close-btn" src="/images/xbutton.png" onclick ="hideLogIn()">
            <h2>Log In</h2>
            <hr>
            <input id="log-email" class="popup-field" placeholder="Email" type="text">
            <input id="log-password" class="repeat" placeholder="Password" type="password">
            <a href="javascript:%20validateLogIn()" id="submit">Send</a>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
/*

   jQuery('.entrance-btn').click(function () {
        $('.entrance-btn').hide();

        if (this.id === 'sign-in') {
            $('#log-out').show();
            $('#profile').show();
        } else if (this.id === 'log-in') {
            $('#profile').show();
            $('#log-out').show();
        } else if (this.id === 'admin-log-in') {
            $('#admin').show();
            $('#profile').show();
            $('#log-out').show();
        }

        if ($('.mobile-headings').is(":hidden")) {
            $('.watch-later').show();
            $('.watch-later-tbl').show();
        }else{
            $('.watch-later-btn').show();
        }
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
*/

/*
function myFunction() {
    let checkBox = document.getElementById("check-adv-search");
    let text = document.getElementById("hid");
    if (checkBox.checked === true) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
}*/

    jQuery('.top-week-btn').click(function () {
        if($(this).text() === "This week top movies") {
            $('.top-week-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
        }else {
            $('.top-week-tbl').hide();
            $(this).text("This week top movies");
        }
    });

    jQuery('.shared-movies-btn').click(function () {
        if($(this).text() === "Movies shared by the community") {
            $('.shared-movies-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
        }else {
            $('.shared-movies-tbl').hide();
            $(this).text("Movies shared by the community");
        }
    });

    jQuery('.projections-btn').click(function () {
        if($(this).text() === "Movies projections this week") {
            $('.projections-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
        }else {
            $('.projections-tbl').hide();
            $(this).text("Movies projections this week");
        }
    });

    jQuery('.festivals-btn').click(function () {
        if($(this).text() === "Movie festivals") {
            $('.festivals-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');

        }else {
            $('.festivals-tbl').hide();
            $(this).text("Movie festivals");
        }
    });

    jQuery('.watch-later-btn').click(function () {
        if($(this).text() === "Watch later") {
            $('.watch-later-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(105, 52, 60, 0.48)');

        }else {
            $('.watch-later-tbl').hide();
            $(this).text("Watch later");
        }
    });

   function showLogIn() {
       document.getElementById('log-in-box').style.display = "block";
   }

   function hideLogIn(){
       document.getElementById('log-in-box').style.display = "none";
   }

   function showSignIn() {
       document.getElementById('sign-in-box').style.display = "block";
   }

   function hideSignIn(){
       document.getElementById('sign-in-box').style.display = "none";
   }

   function validateEmail(email) {
       let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
       return re.test(String(email).toLowerCase());
   }

   function validateLogIn() {
       if (document.getElementById('log-email').value === "" ||
           document.getElementById('log-password').value === "") {
           alert("Please fill all the fields!");
       }
       else if(!validateEmail(document.getElementById('log-email').value)){
           alert("Please enter a valid email address!");
       }
       else{
           document.getElementById('form').submit();
           document.getElementById('log-in').style.display = "none";
           //log-in or log-in-btn ??
       }
   }

   function validateSignIn() {
       if (document.getElementById('sign-email').value === "" ||
           document.getElementById('firstname').value === "" ||
           document.getElementById('lastname').value === "" ||
           document.getElementById('sign-password').value === "" ||
           document.getElementById('repeat').value === "") {
           alert("Please fill all the fields!");
       }
       else if(!validateEmail(document.getElementById('sign-email').value)){
           alert("Please enter a valid email address!");
       }
       else if(document.getElementById('sign-password').value.length < 6){
           alert("Password should be at least 6 symbols!");
       }
       else if(document.getElementById('sign-password').value !== document.getElementById('repeat').value){
           alert("Password and Repeat Password do not match!");
       }
       else{
           document.getElementById('form').submit();
           document.getElementById('sign-in').style.display = "none";
           //the sign-in or sign-in-btn is none???
       }
   }

</script>
</body>
</html>
