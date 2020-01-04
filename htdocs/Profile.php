<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>
<link rel="stylesheet" href="css/newhome.css">
<link rel="stylesheet" href="css/ProfileDesign.css">
<link rel = "stylesheet" href="css/DuplicatedDesign.css">

<?php
    if (!isset($_SESSION['username'])) {
        echo '<h1 style="margin: 0; padding: 0;">You need to be logged in to view this page</h1>';
        die();
    }
?>

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
                       <a id="submit-details">Save changes</a>
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
                       <a id="submit-password">Save changes</a>
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
       <button style="position: relative; z-index: 50;" id="projection-btn" class = "projection-btn">Add a projection</button>

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
                       <?php
                       include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                       include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';
	
                        $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
                        $projections = MovieProjectionHelpers::getMovieProjections();
                        foreach($projections as $projection) {
                            if($projection->get("OwnerId") === $userId) {
                                echo '<tr>';
                                echo '
                                <td class = "row-prj-name">
                                    "'. $projection->get("Name") .'" projection
                                </td>
                                ';

                                echo '
                                <td class = "row-prj-location">
                                '. $projection->get("Location") .'
                                </td>
                                ';

                                echo '
                                <td class = "row-prj-duration">
                                '. $projection->get("Duration") .'
                                </td>
                                ';

                                echo '
                                <td class = "row-prj-date">
                                '. $projection->get("Date") .'
                                </td>
                                ';

                                echo '
                                <td class = "row-prj-options">
                                    <button id="showEditProjForm('. $projection->get("Id") .')">Edit</button>
                                    <button onclick="deleteProjection('. $projection->get("Id") .')">Delete</button>
                                </td>
                                ';

                                echo '</tr>';
                            }
                        }
                       ?>
                       
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
                   <select id="projection-movie">
                            <?php
                                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
                                $movies = MovieHelpers::getMovies();

                                foreach($movies as $movie) {
                                    echo '<option value="' . $movie->get("Id") .'">'
                                     . $movie->get("Name") .
                                     '</option>';
                                }
                            ?>
                    </select>
                   <!-- <input type="text" id="projection-movie" class="details-field" placeholder="Movie name . . . "> -->
                   <input type="text" id="projection-location" class="details-field" placeholder="Location . . . ">
                   <a id="submit-new-projection">Submit</a>
               </form>
           </div>
       </div>

       <div id = "edit-projection-container">
           <img class = "close-btn" id="edit-projection-close-btn" src="xbutton.png" onclick="hideEditProjForm()">
           <div id = "edit-projection-box">
               <form action="#" id="edit-projection-form">
                   <input type="text" id="edit-projection-name" class="details-field" placeholder="Projection name . . .">
                   <input type="text" id="edit-projection-time" class="details-field" placeholder="Date and time . . .">
                   <input type="text" id="edit-projection-duration" class="details-field" placeholder="Duration . . . ">
                   <input type="text" id="edit-projection-movie" class="details-field" placeholder="Movie name . . . ">
                   <input type="text" id="edit-projection-watchers" class="details-field" placeholder="Number of watchers . . . ">
                   <input type="text" id="edit-projection-location" class="details-field" placeholder="Location . . . ">
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

       <script>


    jQuery('.close-btn').click(function () {
        $(this).parent().hide();
    });


    function validateDetails() {
        if(
            $('#details-email').val() === ''
            || $('#details-firstname').val() === ''
            || $('#details-lastname').val() === ''
        ) {
            alert("You need to provide non-empty details!");
            return false;
        }
        return true;
    }
    
    function validatePassword() {
        if(
            $('#password-lastname').val().length < 6
            || $('#password-firstname').val() !== $('#password-lastname').val()
        ) {
            alert("Passwords need to match and be at least 6 characters!");
            return false;
        }
        return true;
    }
    $('#submit-details').click(() => {
        if(validateDetails()) {
            $.ajax({
            url: '/api/users/changeDetails.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                email: $('#details-email').val(),
                firstName: $('#details-firstname').val(),
                lastName: $('#details-lastname').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    }
            });
        }
    });

    $('#submit-password').click(() => {
        if(validatePassword()) {
            $.ajax({
            url: '/api/users/changePassword.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                oldPassword: $('#password-email').val(),
                newPassword: $('#password-lastname').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    }
            });
        }
       
    });
  
  
  
  function showComments() {
    document.getElementById("comments-container").style.display = "block";
  }

  $("#projection-btn").click(
      () => $("#new-projection-container").show()
    );

  $('#submit-new-projection').click(
      () => $.ajax({
            url: '/api/projections/add.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                name: $('#edit-projection-name').val(),
                date: $('#edit-projection-time').val(),
                duration: $('#edit-projection-duration').val(),
                location: $('#edit-projection-location').val(),
                movieId: $('#edit-projection-movie').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    }
        })
  );

  let deleteProjection = (id) => {
    $.ajax({
            url: '/api/projections/delete.php',
            type: 'POST',
            dataType: 'json',
            data: { id },
            success: (data) => {
                    alert(data["description"]);
                    }
        });
  }
     

     function showEditProjForm(projectionId) {
        $("#edit-projection-container").data("projectionId", projectionId);  
        $("#edit-projection-container").show();
     }

     $('#submit-projection-changes').click(()=>
     {
        projectionId = $("#edit-projection-container").data("projectionId");

        $.ajax({
            url: '/api/projections/edit.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                id: projectionId,
                name: $('#projection-name').val(),
                date: $('#projection-time').val(),
                duration: $('#projection-duration').val(),
                location: $('#projection-location').val(),
                movieId: $('#projection-movie').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    }
        });
     })

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
                      </ul>*/
       </script>
   </body>
</html>