
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

<div id="user-menu-container">
    <div class="user-buttons">
        <?php
            session_start();
            
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
                echo '<button class="profile-btn" id="admin-btn">Administration</button>';
            }

            if(isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn']) {
                echo '<button class="profile-btn" id="profile-btn">Profile</button>';
                echo '<button class="profile-btn" id="log-out-btn">Log-out</button>';
            } else {
                echo '<button class="entrance-btn" onclick="signin_show()" id="sign-in-btn">Sign In</button>';
                echo '<button class="entrance-btn" onclick="login_show()" id="log-in-btn">Log In</button>';
            }
        ?>
        
        
    </div>

    <div class = "menu">
        <button class="menu-btn" id="home"> <a href = "Home.php">Home</a></button>
        <button class="menu-btn" id="add-a-post"> <a href = "AddAPost.php">Add a post </a></button>
        <button class="menu-btn" id="movies"><a href = "Movies.php">Movies </a></button>
        <button class="menu-btn" id="movie-festivals"><a href = "Festivals.php">Festivals </a></button>
</div>
    </div>
    <script>
        $('#log-out-btn').click( ()=> {
            $.ajax({
                url: '/Services/Logout.php',
                type: 'POST',
                dataType: 'json',
                success: (data) => {
                    alert(data["description"]);
                    location.reload();
                }
            });
        });
    </script>


</div>