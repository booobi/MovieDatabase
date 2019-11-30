<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/HomeDesign.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/popups.js"></script>
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
        <button class="entrance-btn" onclick="signin_show()" id="sign-in">Sign In</button>
        <button class="entrance-btn" onclick="login_show()" id="log-in">Log In</button>
        <!--<button class="entrance-btn" id="admin-log-in">Admin Log In</button> -->
        <button class="profile-btn" id="admin">Administration</button>
        <button class="profile-btn" id="profile">Profile</button>
        <button class="profile-btn" id="log-out">Log-out</button>
    </div>

    <div class = "menu">
        <button class="movies-btn" id="home"> <a href = "Home.php">Home</a></button>
        <button class="movies-btn" id="add-a-movie"> <a> <!--href = "AddAMovie.php"-->Add a movie </a></button>
        <button class="movies-btn" id="movies"><a> <!--href = "Movies.php"-->Movies </a></button>
        <button class="movies-btn" id="movie-festivals"><a> <!--href = "Festivals.php"-->Festivals </a></button>
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
    <table id = "topMovies" class="top-week-tbl">
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
		<!--
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
        </tr> -->
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
		<div id="login">
		<!-- Popup Div Starts Here -->
			<div id="popupContact">
			<!-- Contact Us Form -->
				<form action="#" id="popupForm" method="post" name="login">
					<img id="close" src="images/xbutton.png" onclick ="login_hide()">
					<h2>Log In</h2>
					<hr>
						<input id="lemail" class="popupField" name="email" placeholder="Email" type="text">
						<input id="lpassword" class="last_element" name="password" placeholder="Password" type="password">
					<a href="javascript:%20validate_login()" id="submit">Send</a>
				</form>
			</div>
		<!-- Popup Div Ends Here -->
		</div>
		<div id="signin">	
		<!-- Popup Div Starts Here -->
			<div id="popupContact">
			<!-- Contact Us Form -->
				<form action="#" id="popupForm" method="post" name="signin">
					<img id="close" src="images/xbutton.png" onclick ="signin_hide()">
					<h2>Sign In</h2>
					<hr>
						<input id="semail" class="popupField" name="email" placeholder="Email" type="text">
						<input id="firstname" class="popupField" name="first_name" placeholder="First Name" type="text">
						<input id="lastname" class="popupField" name="last_name" placeholder="Last Name" type="text">
						<input id="spassword" class="popupField" name="password" placeholder="Password" type="password">
						<input id="repeat" class="last_element" name="confirm_password" placeholder="Repeat Password" type="password">
					<a href="javascript:%20validate_signin()" id="submit">Send</a>
				</form>
			</div>
		<!-- Popup Div Ends Here -->
		</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	<?php
		if($_SESSION["userloggedin"] == TRUE){
			echo "$('.entrance-btn').hide();
				$('#log-out').show();
				$('#profile').show();";
		}
	?>
	/** NOTE: Maybe after the Backend is ready, this code could be reused to load certain parts of the design! **/
    // jQuery('.entrance-btn').click(function () {
        // $('.entrance-btn').hide();

        // if (this.id === 'sign-in') {
            // $('#log-out').show();
            // $('#profile').show();
        // } else if (this.id === 'log-in') {
            // $('#profile').show();
            // $('#log-out').show();
        // } else if (this.id === 'admin-log-in') {
            // $('#admin').show();
            // $('#profile').show();
            // $('#log-out').show();
        // }

        // if ($('.mobile-headings').is(":hidden")) {
            // $('.watch-later').show();
            // $('.watch-later-tbl').show();
        // }else{
            // $('.watch-later-btn').show();
        // }
    // });

    jQuery('.profile-btn').click(function () {

        if (this.id === 'log-out')  {
			//logout the user
			$.ajax({
				url: '/Services/Logout.php',
				type: 'GET',
				dataType: 'json',
				success: function(data) {
					alert(data["description"]);
				}
			});
			
            $('.profile-btn').hide();

            $('.watch-later').hide();
            $('.watch-later-tbl').hide();
            $('.watch-later-btn').hide();
            $('.entrance-btn').show();
        }
    });
/*	
	
    jQuery('#home').click(function () {
        $('.desktop-headings').show();
        $('.tables').show();
    });

    jQuery('#add-a-movie').click(function () {
        $('.desktop-headings').hide();
        $('.tables').hide();
    });

    jQuery('#movies').click(function () {
        $('.desktop-headings').hide();
        $('.tables').hide();
    });

    jQuery('#movie-festivals').click(function () {
        $('.desktop-headings').hide();
        $('.tables').hide();
    });
*/
    jQuery('.top-week-btn').click(function () {
        if($(this).text() === "This week top movies") {
            $('.top-week-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(100, 34, 37, 0.45)');
        }else {
            $('.top-week-tbl').hide();
            $(this).text("This week top movies");
        }
    });

    jQuery('.shared-movies-btn').click(function () {
        if($(this).text() === "Movies shared by the community") {
            $('.shared-movies-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(100, 34, 37, 0.45)');
        }else {
            $('.shared-movies-tbl').hide();
            $(this).text("Movies shared by the community");
        }
    });

    jQuery('.projections-btn').click(function () {
        if($(this).text() === "Movies projections this week") {
            $('.projections-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(100, 34, 37, 0.45)');
        }else {
            $('.projections-tbl').hide();
            $(this).text("Movies projections this week");
        }
    });

    jQuery('.festivals-btn').click(function () {
        if($(this).text() === "Movie festivals") {
            $('.festivals-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(100, 34, 37, 0.45)');

        }else {
            $('.festivals-tbl').hide();
            $(this).text("Movie festivals");
        }
    });

    jQuery('.watch-later-btn').click(function () {
        if($(this).text() === "Watch later") {
            $('.watch-later-tbl').show();
            $(this).text("Hide");
            $(this).css('background-color', 'rgba(22, 72, 127, 0.5)');

        }else {
            $('.watch-later-tbl').hide();
            $(this).text("Watch later");
        }
    });
	
	
	//AJAX call to display movies from DB
	$.ajax({
		url: '/Services/GetHomePageMovies.php',
		type: 'GET',
		dataType: 'json',
		success: function(data) {
			for(var i = 0; i < data.length; i++){
				$("#topMovies").append(["<tr>",
											"<td>" + data[i]["Name"] + "</td>",
											"<td>" + data[i]["Category"] + "</td>",
											"<td>" + data[i]["Rating"] + "</td>",
											"<td>" + data[i]["Date"] + "</td>",
										"</tr>"
										].join());
			}
		}
	});
	
	
	
	

</script>
</body>
</html>