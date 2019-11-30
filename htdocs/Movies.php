<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="HomeDesign.css">
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
            <input type="checkbox" id="check-adv-search" value="check">
            Advanced search
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

<div class="tables">
    <table class = "movies-tbl">
        <tr>
            <th class = hide-title></th>
            <th class = "show-title">
                Movie name
                <br><i class="arrow-down"></i><i class = "arrow-up"> </i>
            </th>
            <th class = "show-title">
                Category
                <br><i class="arrow-down"></i><i class = "arrow-up"> </i>
            </th>
            <th class = "show-title">
                Rating
                <br><i class="arrow-down"></i><i class = "arrow-up"> </i>
            </th>
            <th class = "show-title">
                IMDB Rating
            </th>
            <th class = "hide-title">
                Date
            </th>
            <th class = "hide-title">
                Country
            </th>
            <th class = "hide-title">
                Language
            </th>
            <th class = "hide-title">
                Duration
            </th>
            <th class = "hide-title">
                Options
            </th>
        </tr>
        <tr>
            <td class = "show-content">
                <img src = "https://upload.wikimedia.org/wikipedia/en/1/19/Titanic_%28Official_Film_Poster%29.png">
            </td>
            <td class = "show-content">
                Titanic
                <button class = "more-btn">More</button>
            </td>
            <td class = "hide-content">
                Drama
            </td>
            <td class = "hide-content">
                <select type="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </td>
            <td class = "hide-content">
                8.9/10
            </td>
            <td class = "hide-content">
                12 Sep 2019
            </td>
            <td class = "hide-content">
                USA
            </td>
            <td class = "hide-content">
                English
            </td>
            <td class = "hide-content">
                2h 00min
            </td>
            <td class = "hide-content">
                <button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
        <tr>
            <td class = "show-content">
                <img src = "https://upload.wikimedia.org/wikipedia/en/7/7f/PS_I_Love_You_%28film%29.jpg">
            </td>
            <td class = "show-content">
                P.S. I Love You
                <button class = "more-btn">More</button>
            </td>
            <td class = "hide-content">
                Romance
            </td>
            <td class = "hide-content">
                <select type="number" >
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </td>
            <td class = "hide-content">
                7.8/10
            </td>
            <td class = "hide-content">
                1 Sep 2019
            </td>
            <td class = "hide-content">
                USA
            </td>
            <td class = "hide-content">
                English
            </td>
            <td class = "hide-content">
                1h 45min
            </td>
            <td class = "hide-content">
                <button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
        <tr>
            <td class = "show-content">
                <img src = "https://upload.wikimedia.org/wikipedia/en/9/98/Wanted_film_poster.jpg">
            </td>
            <td class = "show-content">
                Wanted
                <button class = "more-btn">More</button>
            </td>
            <td class = "hide-content">
                Action
            </td>
            <td class = "hide-content">
                <select type="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </td>
            <td class = "hide-content">
                5.5/10
            </td>
            <td class = "hide-content">
                20 Jan 2010
            </td>
            <td class = "hide-content">
                USA
            </td>
            <td class = "hide-content">
                English
            </td>
            <td class = "hide-content">
                2h 30min
            </td>
            <td class = "hide-content">
                <button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
        <tr>
            <td class = "show-content">
                <img src = "https://upload.wikimedia.org/wikipedia/en/f/f9/Singing_in_the_rain_poster.jpg">
            </td>
            <td class = "show-content">
                Singin' In The Rain
                <button class = "more-btn">More</button>
            </td>
            <td class = "hide-content">
                Musical
            </td>
            <td class = "hide-content">
                <select type="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </td>
            <td class = "hide-content">
                4.0/10
            </td>
            <td class = "hide-content">
                18 May 2015
            </td>
            <td class = "hide-content">
                USA
            </td>
            <td class = "hide-content">
                English
            </td>
            <td class = "hide-content">
                2h 30min
            </td>
            <td class = "hide-content">
                <button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
        <tr>
            <td class = "show-content">
                <img src = "https://upload.wikimedia.org/wikipedia/en/5/54/Fast_and_the_furious_poster.jpg">
            </td>
            <td class = "show-content">
                Fast and Furious
                <button class = "more-btn">More</button>
            </td>
            <td class = "hide-content">
                Action
            </td>
            <td class = "hide-content">
                <select type="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </td>
            <td class = "hide-content">
                6.8/10
            </td>
            <td class = "hide-content">
                18 April 2015
            </td>
            <td class = "hide-content">
                USA
            </td>
            <td class = "hide-content">
                English
            </td>
            <td class = "hide-content">
                1h 30min
            </td>
            <td class = "hide-content">
                <button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
        <tr>
            <td class = "show-content">
                <img src = "https://upload.wikimedia.org/wikipedia/en/0/08/Malena_101.jpg">
            </td>
            <td class = "show-content">
                Malena
                <button class = "more-btn">More</button>
            </td>
            <td class = "hide-content">
                Drama
            </td>
            <td class = "hide-content">
                <select type="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </td>
            <td class = "hide-content">
                4.9/10
            </td>
            <td class = "hide-content">
                1 March 2011
            </td>
            <td class = "hide-content">
                USA
            </td>
            <td class = "hide-content">
                English
            </td>
            <td class = "hide-content">
                1h 10min
            </td>
            <td class = "hide-content">
                <button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
        <tr>
            <td class = "show-content">
                <img src = "https://upload.wikimedia.org/wikipedia/en/6/6b/Fameposter.jpg">
            </td>
            <td class = "show-content">
                Fame
                <button class = "more-btn">More</button>
            </td>
            <td class = "hide-content">
                Musical
            </td>
            <td class = "hide-content">
                <select type="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </td>
            <td class = "hide-content">
                7.4/10 <br> IMDB
            </td>
            <td class = "hide-content">
                28 June 2017
            </td>
            <td class = "hide-content">
                USA
            </td>
            <td class = "hide-content">
                English
            </td>
            <td class = "hide-content">
                1h 20min
            </td>
            <td class = "hide-content">
                <button class = "change-movie-btn"><a href = "Edit.php">Edit</a></button><br>
                <button class = "change-movie-btn" id="delete">Delete</button>
            </td>
        </tr>
    </table>
</div>

<div id="sign-in-box">
    <div id="popup-entrance">
        <form action="#" id="popup-form" method="post" name="form">
            <img id="close-btn" src="xbutton.png" onclick ="hideSignIn()">
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
            <img id="close-btn" src="xbutton.png" onclick ="hideLogIn()">
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

   /* jQuery('.entrance-btn').click(function () {
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
*/

     jQuery('.more-btn').click(function () {
         if($(this).parent().siblings('.hide-content').css('display') === 'none') {
             $(this).parent().siblings('.hide-content').css('display', 'block');
             $(this).text('Less');
             $(this).css('color','rgba(5,5,61,0.71)');
             $(this).css('background-color','rgba(73,80,110,0.48)');
         }else{
             $(this).parent().siblings('.hide-content').css('display','none');
             $(this).text('More');
             $(this).css('color','rgba(48,24,33,0.87)');
             $(this).css('background-color','rgba(110, 83, 80, 0.69)');
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

        /*<input type="number" min="1" max="5" id = "input"  placeholder="Give a rating..">*/
    }
</script>
</body>
</html>