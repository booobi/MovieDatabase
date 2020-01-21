
function showLogIn() {
    document.getElementById('log-in-container').style.display = "block";
}

function showSignIn() {
    document.getElementById('sign-in-container').style.display = "block";
}

function showRating() {
    document.getElementById("rating-box").style.display = "block";
}

function showInfo() {
    document.getElementById("info-container").style.display = "block";
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
    } else if (!validateEmail(document.getElementById('sign-email').value)) {
        alert("Please enter a valid email address!");
    } else if (document.getElementById('sign-password').value.length < 6) {
        alert("Password should be at least 6 symbols!");
    } else if (document.getElementById('sign-password').value !== document.getElementById('repeat').value) {
        alert("Password and Repeat Password do not match!");
    } else {
        document.getElementById('form').submit();
        document.getElementById('sign-in').style.display = "none";
        //the sign-in or sign-in-btn is none???
    }
}



/*<!DOCTYPE html>
  <html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="HomeDesign.css">
    <link rel="stylesheet" href="ProfileDesign.css">
    <link rel = "stylesheet" href="DuplicatedDesign.css">
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
                       <input id="details-email" class="details-field" placeholder="Email . . ." type="text">
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
                              <i class="arrow-down"></i><i class = "arrow-up"> </i>
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
                       <i class="arrow-down"></i><i class = "arrow-up"> </i>
                   </th>
                   <th class = "col-post-username">
                       Username
                   </th>
                   <th class = "col-post-rating">
                       User rating
                       <i class="arrow-down"></i><i class = "arrow-up"> </i>
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
                               <i class="arrow-down"></i><i class = "arrow-up"> </i>
                           </th>
                           <th class = "col-prj-date">
                               Date
                           </th>
                           <th class = "col-prj-options">
                               Options
                               <p class = "new-line"></p>
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
                               <i class="arrow-down"></i><i class = "arrow-up"> </i>
                           </th>
                           <th class = "col-exchanges-options">
                               Options
                               <p class = "new-line"></p>
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
                   <input type="text" id="projection-movie" class="details-field" placeholder="Movie name . . . ">
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
                   <input type="text" id="projection-movie" class="details-field" placeholder="Movie name . . . ">
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


    /*    <ul>
                         <li>4ver</li>
                         <li>deina_89</li>
                         <li>lvr</li>
                         <li>flower_34</li>
                         <li>maria5</li>
                      </ul>
</script>
</body>
</html>
*/


/*
* body {
    margin: 0 auto;
    width: 1519px;
    overflow-y: auto;
    overflow-x: auto;
    background-color: rgba(142, 91, 75, 0.66);
}

.navigation {
    overflow: hidden;
    background-color: #462929;
}

.logo {
    margin-top: 60px;
    margin-left: 40px;
    font-family: Monoton, cursive;
    font-size: 42px;
    color: rgba(130, 143, 176, 0.85);
}

.search {
    position: relative;
    margin: 30px auto;
    padding: 7px;
    overflow: hidden;
    align-content: center;
    width: 760px;
    z-index: 1;
}

.search a {
    padding: 14px 16px;
    display: block;
    float: right;
    text-align: center;
    text-decoration: none;
    color: black;
    font-family: Ubuntu, sans-serif;
}

#search-box {
    display: inline-block;
}

.search input[type=text] {
    margin-left: 5px;
    margin-bottom: 10px;
    padding: 6px 5px 5px;
    width: 440px;
    display: inline-block;
    font-size: 18px;
    border: none;
    background-color: rgba(144, 157, 189, 0.7);
}

.advanced-search label{
    padding-left: 22px;
    margin-bottom: 0;
}

.advanced-search .check-mark{
    position: absolute;
    top: 0;
    left: 0;
    margin-top: 2px;
    height: 17px;
    width: 17px;
    background-color: rgba(126, 135, 165, 0.62);

}

.advanced-search .checkbox-box:hover input ~ .check-mark {
    background-color: rgba(95, 108, 127, 0.83);
}

.advanced-search .checkbox-box input:checked ~ .check-mark,
.advanced-search .checkbox-box:hover input:checked ~ .check-mark {
    background-color: rgba(82, 92, 115, 0.71);
}


.advanced-search .checkbox-box input:checked ~ .check-mark::after {
    display: block;
    top: 2px;
    left: 5px;
}
.advanced-search .container input:checked ~ .check-mark::after {
    display: block;
    padding-top: 1.2px;
    top: 1px;
    left: 6px;
    margin-top: 0;
    width: 3px;
    height: 9px;
}

.advanced-search .container .check-mark::after {
    left: 9px;
    top: 5px;
    width: 4px;
}

.search button {
    margin: -60px 10px 5px 10px;
    padding: 10px 12px;
    width: 75px;
    height: 55px;
    display: inline-block;
    font-size: 20px;
    border: none;
    cursor: pointer;
    background-color: rgba(144, 157, 189, 0.7);
    font-family: Ubuntu, sans-serif;
    color: #3d4156;
}

.search ::placeholder {
    font-size: 20px;
    font-family: Lato, sans-serif;
    color: rgba(54, 54, 73, 0.82);
}

.search ::-moz-placeholder {
    font-size: 20px;
    font-family: Lato, sans-serif;
    color: rgba(54, 54, 73, 0.82);
    opacity:  1;
}

.advanced-search {
    margin-top: 7px;
    margin-left: 10px;
    display: inline-block;
    font-family: Ubuntu, sans-serif;
    font-size: 21px;
    z-index: 5;
    color: rgba(175, 144, 134, 0.9);
}

advanced search categories

#popup-advanced {
    margin-top: -130px;
    position: absolute;
    display: none;
}

.user-buttons {
    margin-top: 0;
    float: right;
}

.entrance-btn, .profile-btn {
    margin-top: 8px;
    padding: 8px 16px 8px 20px;
    float: left;
    font-family: Ubuntu, sans-serif;
    font-weight: bold;
    font-size: 21px;
    text-decoration: none;
    border-style: none;
    z-index: 1;
    outline: none;
    // color: #c1c1c1;
    color: rgb(174, 158, 149);
//    background-color: rgba(159, 173, 208, 0.43);
    background-color: rgba(170, 196, 224, 0.33);
}

.entrance-btn a, .profile-btn a {
    float: left;
    font-family: Ubuntu, sans-serif;
    font-weight: 500;
    text-decoration: none;
    border-style: none;
    z-index: 1;
    outline: none;
    color: rgb(174, 158, 149);
    background-color: transparent;
}


.profile-btn {
    font-size: 19px;
    padding: 10px 16px 10px 10px;
}

#sign-in-btn, #log-in-btn {
    display: none;
    float: left;
    overflow: hidden;
    font-weight: 500;
    font-size: 23px;
}

#admin-btn, #profile-btn, #log-out-btn {
    display: inline-block;
    float: left;
    font-size: 21px;
    font-weight: 500;
    overflow: hidden;
}

#sign-in-container, #log-in-container {
    position: fixed;
    top: 0;
    margin: auto;
    width: 1519px;
    height: 100%;
    display: none;
    overflow: hidden;
    z-index: 5;
    background-color: rgba(71, 56, 51, 0.86);
}

#sign-in-box, #log-in-box {
    position: absolute;
    top: 17%;
    left: 51%;
    margin-left: -202px;
    font-family: Lato, sans-serif;
}

#popup-form {
    padding: 10px 50px;
    width: 280px;
    font-family: Lato, sans-serif;
    border-radius: 10px;
    background-color: #856962;
}

#popup-form h2 {
    font-family: Lato, sans-serif;
    text-align: center;
    color: rgba(53, 37, 38, 0.92);
}

#popup-form hr {
    margin: 10px -50px;
    border: 0;
    border-top: 1px solid #de9f97;
}

#popup-form input[type=text], #popup-form input[type=password] {
    margin-top: 30px;
    margin-left: 35px;
    padding: 10px;
    font-family: Lato, sans-serif;
    font-size: 16px;
    border: solid medium #685053;
    background-color: rgba(222, 183, 171, 0.69);
}

#sign-password, #log-password, #sign-email, #log-email {
    background-repeat: no-repeat;
    background-position: 5px 7px;
}

.repeat {
    margin-bottom: 30px;
}

#popup-form ::placeholder {
    font-family: Lato, sans-serif;
    color: #463030;
}

#popup-form ::-moz-placeholder {
    opacity: 0.85;
}

#submit {
    padding: 10px 0;
    width: 100%;
    display: block;
    font-family: Lato, sans-serif;
    font-size: 20px;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    border-radius: 5px;
    color: #dbb1a1;
    border: 1px solid #685053;
    background-color: #5f4345;
}

#sign-close-btn, #log-close-btn {
    margin-top: 50px;
    float: right;
    margin-right: 505px;
}

.menu {
    margin: 0 auto;
    width: 847px;
    position: relative;
}

.menu a {
    text-decoration: none;
    font-family: Ubuntu, sans-serif;
    font-size: 25px;
    font-weight: 500;
    color: rgb(168, 138, 143);
}

.menu a:hover {
    color: rgb(129, 131, 137);
}

.menu-btn {
    padding: 15px 50px 0 60px;
    font-family: Ubuntu, sans-serif;
    font-size: 25px;
    font-weight: 500;
    border-style: none;
    z-index: 1;
    outline: none;
    background-color: transparent;
}

#home, #add-a-post, #movies, #movie-festivals {
    display: inline-block;
    float: left;
    overflow: hidden;
}

.desktop-headings {
    position: absolute;
}

.mobile-headings {
    display: none;
}

.mobile-headings button {
    outline: none;
}

.tables {
    margin-top: 170px;
    height: 858px;
    margin-bottom: 40px;
}

.top-week, .shared-movies, .projections, .festivals {
    position: absolute;
    margin-left: 25px;
    padding-top: 10px;
    width: 420px;
    height: 34px;
    font-family: Lato, sans-serif;
    font-size: 17px;
    font-weight: bold;
    text-align: center;
    border-radius: 8px;
    color: rgb(213, 213, 213);
    background-color: rgba(100, 34, 37, 0.36);
}

.top-week {
    margin-top: 80px;
    margin-left: 540px;
    margin-bottom: 0;
    float: left;
}

.shared-movies {
    margin-top: 600px;
    margin-left: 25px;
}

.projections {
    margin-top: 600px;
    margin-left: 550px;
}

.festivals {
    margin-top: 600px;
    margin-left: 1075px;
}

.top-week-tbl {
    position: absolute;
    margin-left: 280px;
    border-collapse: collapse;
}

.col-top-name, .col-top-category, .col-top-rating, .col-top-date {
    padding: 5px 12px;
    height: 60px;
    font-family: Lato, sans-serif;
    font-size: 20px;
    font-weight: bold;
    color: rgba(34, 4, 8, 0.73);
    background-color: rgba(101, 61, 51, 0.26);
    width: 148px;
    text-align: center;
}

.col-top-name {
    padding-left: 80px;
}

.col-top-category {
    padding-left: 40px;
}

.col-top-rating {
    padding-left: 50px;
}

.col-top-date {
    padding-left: 40px;
    padding-right: 70px;
}

.row-top-name, .row-top-category, .row-top-rating, .row-top-date {
    padding: 18px;
    font-family: Lato, sans-serif;
    font-size: 19px;
    width: 50px;
}

.row-top-name {
    padding-left: 110px;
}

.row-top-category {
    padding-left: 80px;
}

.row-top-rating {
    padding-left: 100px;
}

.row-top-date {
    padding-left: 60px;
}

i {
    border: solid #43455b;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 4px;
}

.arrow-down {
    margin-top: -1px;
    margin-left: 3px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}

.arrow-up {
    margin-top: 5px;
    margin-left: 13px;
    transform: rotate(-135deg);
    -webkit-transform: rotate(-135deg);
}

.down-tables th {
    padding-left: 2px;
    height: 60px;
    font-family: Lato, sans-serif;
    background-color: rgba(204, 106, 106, 0.47);
}

.down-tables td {
    padding-top: 3px;
    padding-left: 1px;
    font-family: Lato, sans-serif;
    background-color: rgba(140, 143, 169, 0.41);
}

.down-tables th, td {
    text-align: left;
}

.title {
    font-size: 20px;
}

.description {
    font-size: 19px;
}

.shared-movies-tbl, .projections-tbl, .festivals-tbl {
    position: absolute;
    width: 420px;
    border-collapse: collapse;
}

.shared-movies-tbl {
    margin-top: 520px;
    margin-left: 25px;
}

.projections-tbl {
    margin-top: 520px;
    margin-left: 550px;
}

.festivals-tbl {
    margin-top: 520px;
    margin-left: 1076px;
}

body ::-webkit-scrollbar {
    width: 8px;
}

body ::-webkit-scrollbar-track {
    background: #95766f;
}

body ::-webkit-scrollbar-thumb {
    background: rgba(37, 38, 53, 0.85);
}

body ::-webkit-scrollbar-thumb:hover {
    background: #555;
}

@media screen and (max-width: 500px) {

    button{
        -webkit-tap-highlight-color: transparent;
    }

    body {
        margin: 0;
        width: 100%;
        overflow-y: auto;
        overflow-x: auto;
        background-color: rgba(142, 91, 75, 0.66);
    }

.navigation.responsive {
        position: relative;
    }

.navigation {
        //    height: 744px;
    }


.logo {
        position: relative;
        margin-top: 20px;
        margin-left: 0;
        width: 93%;
        display: block;
        text-align: right;
        font-size: 38px;
        color: rgba(147, 173, 223, 0.87);
    }

.search {
        margin-top: 200px;
        margin-left: 0;
        margin-bottom: 0;
        padding: 0;
        width: 100%;
        display: block;
    }

    #search-box {
        display: block;
    }

.search input[type=text] {
        margin-left: 0;
        margin-bottom: 4px;
        padding: 10px;
        width: 100%;
        display: block;
        background-color: rgba(183, 157, 148, 0.66);
    }

.search ::placeholder {
        font-size: 20px;
        font-family: Lato, sans-serif;
        color: rgba(71, 55, 51, 0.84);
    }

.search ::-moz-placeholder {
        opacity: 1;
    }

.search button {
        position: relative;
        margin: auto;
        width: 86%;
        display: block;
        text-align: center;
        color: #888b93f2;
        background-color: rgba(99, 106, 139, 0.64);
    }

.advanced-search {
        margin-top: 38px;
        margin-bottom: 30px;
        padding: 0 10px;
        width: 88%;
        display: block;
        text-align: right;
        color: rgba(182, 150, 139, 0.9);
        font-family: Ubuntu, sans-serif;
        font-weight: normal;
        font-size: 18px;
    }
    /*
       .advanced-search input[type=checkbox] {
            margin-top: 8px;
        }

.advanced-search .checkbox-box input:checked ~ .check-mark,
.advanced-search .checkbox-box:hover input:checked ~ .check-mark  {
        background-color: rgba(131, 110, 102, 0.56);
    }

.advanced-search .checkbox-box:hover input ~ .check-mark {
        background-color: rgba(144, 117, 111, 0.72);

    }

.advanced-search .check-mark {
        float: right;
        margin-left: 10px;
        margin-top: 0;
        height: 25px;
        width: 25px;
        position: unset;
        background-color: rgba(144, 117, 111, 0.72);
    }

.advanced-search .checkbox-box input:checked ~ .check-mark::after {
        margin-top: 4px;
        margin-right: 8px;
        display: block;
        float: right;
        position: unset;
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
    }

.user-buttons {
        margin: -30px 0;
        height: 500px;
        float: none;
    }

.entrance-btn, .profile-btn {
        position: relative;
        margin: auto;
        display: block;
        font-family: Ubuntu, sans-serif;
        font-weight: bold;
        background-color: transparent;
    }

    #sign-in-btn, #log-in-btn, #admin-btn, #profile-btn, #log-out-btn {
        top: -350px;
        bottom: 0;
        margin-right: 60px;
        margin-bottom: 8px;
        padding: 15px 0;
        width: 93%;
        display: inline-block;
        float: none;
        text-align: right;
        font-size: 20px;
        color: rgba(223, 213, 219, 0.85);
    }

    #admin-btn, #profile-btn, #log-out-btn {
        display: none;
    }

    #profile-btn a {
        float: right;
    }

.entrance-btn, .user-btn:hover {
        background-color: transparent;
    }

    #sign-in-container, #log-in-container {
        margin: auto;
        width: 100%;
        float: none;
        z-index: 5;
    }

    #sign-in-box, #log-in-box {
        position: unset;
        left: 0;
        margin-left: 0;
        z-index: 5;
    }

    #sign-in-box {
        margin-top: 70px;
    }

    #log-in-box {
        margin-top: 120px;
    }

    #popup-form {
        margin: auto;
        padding: 10px 0 0;
        width: 90%;
        float: none;
        background-color: #745956;
    }

    #popup-form hr {
        margin: 10px auto;
    }

    #popup-form input[type=text],
    #popup-form input[type=password] {
        margin-left: auto;
        width: 86%;
    }

.popup-field, .repeat, #submit {
        margin: auto;
        display: block;
        float: none;
    }

.repeat {
        margin-bottom: 30px;
    }

    #submit {
        width: 99.4%;
    }

.close-btn {
        position: absolute;
        width: 43px;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }

    #sign-close-btn{
        margin: 660px auto auto auto;
    }

    #log-close-btn {
        margin: 510px auto auto auto;
    }

.menu {
        margin: -417px auto;
        position: relative;
        padding: 10px 0;
        width: 85%;
        height: 202px;
        display: block;
        float: none;
        border: solid medium rgba(177, 155, 151, 0.82);
        border-bottom-style: none;
    }

.menu-btn {
        position: relative;
        margin: auto;
        padding: 0;
        width: 85%;
        display: block;
        float: none;
        text-align: center;
    }

.menu-btn a {
        font-size: 23px;
    }

    #home a {
        color: rgb(168, 138, 143);
    }

    #movies a, #add-a-post a, #movie-festivals a {
        color: rgba(133, 144, 175, 0.63);
    }

    #home, #add-a-post, #movies, #movie-festivals {
        margin-bottom: 15px;
        padding: 9px 0 0 0;
        width: 100%;
        display: block;
        float: right;
        text-align: center;
    }

.desktop-headings {
        display: none;
    }

.mobile-headings {
        display: block;
    }

.tables{
        height: 177px;
    }

.top-week-btn, .shared-movies-btn, .projections-btn, .festivals-btn, .watch-later-btn {
        padding-top: 2px;
        margin-left: 10px;
        margin-bottom: 25px;
        width: 95%;
        height: 48px;
        font-family: Lato, sans-serif;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        border-radius: 8px;
        color: rgba(226, 199, 204, 0.99);
    }

.top-week-btn, .shared-movies-btn, .projections-btn, .festivals-btn {
        border-width: medium;
        border-color: rgba(165, 123, 121, 0.88);
        background-color: rgba(105, 52, 60, 0.48);
    }

.top-week-btn {
        position: absolute;
        margin-top: 50px;
        display: block;
    }

.shared-movies-btn {
        position: absolute;
        margin-top: 130px;
    }

.projections-btn {
        position: absolute;
        margin-top: 210px;
    }

.festivals-btn {
        position: absolute;
        margin-top: 290px;
    }

.top-week-tbl, .shared-movies-tbl, .projections-tbl, .festivals-tbl, .watch-later-tbl {
        display: none;
    }

.shared-movies-tbl, .projections-tbl, .festivals-tbl {
        margin-left: 0;
        width: 100%;
    }

.top-week-tbl {
        margin-top: -40px;
        margin-left: 0;
        width: 100%;
        z-index: 5;
    }

.top-week-tbl th, .top-week-tbl td, .down-tables td {
        background-color: rgb(156, 105, 104);
    }

.top-week-tbl th {
        padding: 5px 10px;
        font-size: 17px;
    }

.top-week-tbl td {
        padding: 28px 10px 12px;
        font-size: 16px;
    }

.top-week-tbl i {
        position: absolute;
        padding: 5px;
    }

.arrow-up {
        position: absolute;
        margin-top: 20px;
        margin-left: 3px;
        display: block;
    }

.arrow-down {
        position: absolute;
        margin-top: 20px;
        margin-left: 23px;
        display: block;
    }

.down-tables td {
        text-align: center;
    }

.title {
        font-size: 17px;
    }

.description {
        font-size: 16px;
    }

.shared-movies-tbl {
        margin-top: 40px;
        z-index: 4;
    }

.projections-tbl {
        margin-top: 120px;
        z-index: 3;
    }

.festivals-tbl {
        margin-top: 200px;
        z-index: 2;
    }
}


*/





