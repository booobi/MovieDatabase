<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="DuplicatedDesign.css">
    <link rel="stylesheet" href="HomeDesign.css">
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
            <button class="profile-btn" id="admin-btn"><a href = "Administration.php">Administration</button>
            <button class="profile-btn" id="profile-btn"><a href="Profile.php">Profile</a></button>
            <button class="profile-btn" id="log-out-btn">Log-out</button>
       </div>

        <div class = "menu">
            <button class="menu-btn" id="home"> <a href = "Home.php">Home</a></button>
            <button class="menu-btn" id="add-a-post"> <a href = "AddAPost.php">Add a post </a></button>
            <button class="menu-btn" id="movies"><a href = "Movies.php">Movies </a></button>
            <button class="menu-btn" id="movie-festivals"><a href = "Festivals.php">Festivals </a></button>
        </div>
     </div>


          <div class="top-week-title">This week top movies</div>
             <div class ="top-week-scroller">
                <table class="top-week-tbl">
            <tr>
            <th class = "col-top-rating">
                Rating
                <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
            </th>
            <th class = "col-top-date">
                Date
                <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
            </th>
            <th class = "col-top-poster">

            </th>
            <th class = "col-top-name">
                Movie name
                <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
            </th>
            <th class = "col-top-category">
                Category
                <p class = "new-line"><i class="arrow-down"></i><i class = "arrow-up"> </i></p>
            </th>
        </tr>
        <tr>
            <td class = "row-top-rating">
                4.9
            </td>
            <td class = "row-top-date">
                12 Sep 2019
            </td>
            <td class = "row-top-poster">
            <img src = "https://upload.wikimedia.org/wikipedia/en/1/19/Titanic_%28Official_Film_Poster%29.png">
            </td>
            <td class = "row-top-name">
                Titanic
            </td>
            <td class = "row-top-category">
                Drama
            </td>
            </tr>
                 <tr>
                     <td class = "row-top-rating">
                         4.0
                     </td>
                     <td class = "row-top-date">
                         2 Sep 2019
                     </td>
                     <td class = "row-top-poster">
                         <img src = "https://upload.wikimedia.org/wikipedia/en/7/7f/PS_I_Love_You_%28film%29.jpg">
                     </td>
                     <td class = "row-top-name">
                         P.S. I love you
                     </td>
                     <td class = "row-top-category">
                         Romantic
                     </td>
                 </tr>
    </table>
            </div>
          <div class = "down-tables">
              <div class="shared-movies-title">Movies shared by the community</div>
              <div class = "shared-tbl-scroller">
                      <table class="shared-movies-tbl">
        <tr>
            <td>
                <p class="movie-name"> Armageddon </p>
                <p class="description">The humanity is in danger...</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="movie-name"> Pride </p>
                <p class="description">Segregation in the 60s...</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="movie-name"> White chicks </p>
                <p class="description">Two policemen...</p>
            </td>
        </tr>
    </table>
              </div>
              <div class="festivals-title">Movie festivals</div>
              <div class = "festivals-tbl-scroller">
              <table class = "festivals-tbl">
              <tr>
                  <td class>
                      <p class="movie-name"> Cannes  </p>
                      <p class = "description">... </p>
                  </td>
              </tr>
              <tr>
                  <td>
                      <p class="movie-name"> Sundance </p>
                      <p class = "description">...</p>
                  </td>
              </tr>
              <tr>
                  <td>
                      <p class="movie-name"> Tribeca </p>
                      <p class = "description">...</p>
                  </td>
              </tr>
          </table>
              </div>
              <div class="projections-title">Movies projections this week</div>
              <div class = "projections-tbl-scroller">
              <table class="projections-tbl">
                <tr>
                   <td class>
                      <p class="movie-name"> Mr.Nobody </p>
                      <p class="description"> 22:30 Arena Cinema</p>
                   </td>
                </tr>
                <tr>
                   <td>
                       <p class="movie-name"> Norbit </p>
                       <p class = "description"> 18:00  Cultural Center </p>
                   </td>
                </tr>
                <tr>
                   <td>
                       <p class="movie-name"> The Shawshank Redemption </p>
                       <p class = "description"> 17:30 Cinema City</p>
                   </td>
                </tr>
              </table>
          </div>
          </div>


      <div id="sign-in-container">
          <img class = "close-btn" id = "sign-close-btn" src="xbutton.png" onclick ="hideSignIn()">
          <div id="sign-in-box">
               <form action="#" id="popup-form" method="post" name="form">
               <h2>Sign In</h2>
               <hr>
            <input id="sign-email" class="popup-field" placeholder="Email . . ." type="text">
            <input id="firstname" class="popup-field" placeholder="First name . . ." type="text">
            <input id="lastname" class="popup-field" placeholder="Last name . . ." type="text">
            <input id="sign-password" class="popup-field" placeholder="Password . . ." type="password">
            <input id="repeat" class="repeat" placeholder="Repeat Password . . ." type="password">
            <a href="javascript:%20validateSignIn()" id="submit">Send</a>
        </form>
         </div>
     </div>

      <div id="log-in-container">
           <img class = "close-btn" id = "log-close-btn"  src="xbutton.png" onclick ="hideLogIn()">
            <div id="log-in-box">
            <form action="#" id="popup-form" method="post" name="form">
            <h2>Log In</h2>
            <hr>
            <input id="log-email" class="popup-field" placeholder="Email . . ." type="text">
            <input id="log-password" class="repeat" placeholder="Password . . ." type="password">
            <a href="javascript:%20validateLogIn()" id="submit">Send</a>
        </form>
    </div>
      </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>


    jQuery('.close-btn').click(function () {
        $('.close-btn').parent().hide();
    });


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


   function showLogIn() {
       document.getElementById('log-in-container').style.display = "block";
   }

   function showSignIn() {
       document.getElementById('sign-in-container').style.display = "block";
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