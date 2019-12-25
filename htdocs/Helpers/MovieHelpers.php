<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Movie.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Festival.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/MovieParticipant.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CategoryHelpers.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';

 class MovieHelpers {

	public static function editMovie($movieId, $movie) {
		//update in movies
		echo "UPDATE `movies` 
		SET
		`Name`='" . $movie->get("Name") . "',`ReleaseDate`='" . $movie->get("ReleaseDate") . "',
		`Description`='" . $movie->get("Description") . "',`Link`='" . $movie->get("Link") . "',
		`Country`='" . $movie->get("Country") . "',`Language`='" . $movie->get("Language") . "',
		`IMDBRating`=" . $movie->get("IMDBRating") . ",
		`PosterImgSrc`='" . $movie->get("PosterImgSrc") . "',
		`TrailerSrc`='" . $movie->get("TrailerSrc") . "',
		`IsActive`=" . $movie->get("IsActive") . ",`Duration`=SEC_TO_TIME(" . $movie->get("Duration") . "*60),
		`Rewards`='" . $movie->get("Awards") . "',`MovieStudio`='" . $movie->get("MovieStudio") . "',
		`MusicStudio`='" . $movie->get("MusicStudio") . "'
		WHERE MovieId = {$movieId}";
		DBOperations::prepareAndExecute(
			"UPDATE `movies` 
			SET
			`Name`='" . $movie->get("Name") . "',`ReleaseDate`='" . $movie->get("ReleaseDate") . "',
			`Description`='" . $movie->get("Description") . "',`Link`='" . $movie->get("Link") . "',
			`Country`='" . $movie->get("Country") . "',`Language`='" . $movie->get("Language") . "',
			`IMDBRating`=" . $movie->get("IMDBRating") . ",
			`PosterImgSrc`='" . $movie->get("PosterImgSrc") . "',
			`TrailerSrc`='" . $movie->get("TrailerSrc") . "',
			`IsActive`=" . $movie->get("IsActive") . ",`Duration`=SEC_TO_TIME(" . $movie->get("Duration") . "*60),
			`Rewards`='" . $movie->get("Awards") . "',`MovieStudio`='" . $movie->get("MovieStudio") . "',
			`MusicStudio`='" . $movie->get("MusicStudio") . "'
			WHERE MovieId = {$movieId}");
	}

	public static function addMovie($movie) {
		//insert in movies
		DBOperations::prepareAndExecute(
		"INSERT INTO 
		`movies`
		(`Name`, `ReleaseDate`, `Description`, `Link`, `Country`, `Language`, 
		`MovieRating`, `IMDBRating`, `PosterImgSrc`, `TrailerSrc`, `IsActive`, 
		`Duration`, `Rewards`, `MovieStudio`, `MusicStudio`) 
		VALUES  " . " " . "
		('" . $movie->get("Name") . "','" . $movie->get("ReleaseDate") . "','" . $movie->get("Description") . "',
		'" . $movie->get("Link") . "','" . $movie->get("Country") . "','" . $movie->get("Language") . "'
		,0," . $movie->get("IMDBRating") . ",'" . $movie->get("PosterImgSrc") . "','" . $movie->get("TrailerSrc") . "',
		" . $movie->get("IsActive") . ",
		SEC_TO_TIME(" . $movie->get("Duration") . "*60),'" . $movie->get("Awards") . "','" . $movie->get("MovieStudio") . "',
		'" . $movie->get("MusicStudio") . "')");

		//get new movie Id
		$movieId = MovieHelpers::getLastUpdatedFromTable('movies');

		//set main actors, actors and director
		ParticipantHelpers::applyParticipantsToMovie($movieId, $movie->get("Actors"), $movie->get("Director"));

		//set categories
		CategoryHelpers::applyCategoriesToMovie($movieId, $movie->get("Categories"));
	}

	public static function getMovies($size=20, $orderByColumn="Name") {
		$result = DBOperations::prepareAndExecute(
			"SELECT movies.MovieId as MovieId,
			movies.Name AS MovieName,
			movies.MovieRating AS MovieRating,
			movies.IMDBRating As MovieIMDBRating,
			CAST(movies.ReleaseDate AS DATE) AS ReleaseDate,
			movies.Country as MovieCountry,
			movies.Language as MovieLanguage,
			movies.Duration as MovieDuration,
			movies.PosterImgSrc as MoviePosterImgSrc,
			movies.UpdatedOn,
			movies.CreatedOn
			FROM movies
			ORDER BY movies." . $orderByColumn . " LIMIT " . $size);

		$movieList = [];

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$movie = new Movie();
				$movie->set('Id', $row["MovieId"]);
				$movie->set('Name', $row["MovieName"]);
				$movie->set('Rating', $row["MovieRating"]);
				$movie->set('IMDBRating', $row["MovieIMDBRating"]);
				$movie->set('ReleaseDate', $row["ReleaseDate"]);
				$movie->set('Country', $row["MovieCountry"]);
				$movie->set('Language', $row["MovieLanguage"]);
				$movie->set('Duration', $row["MovieDuration"]);
				$movie->set('PosterImgSrc', $row["MoviePosterImgSrc"]);
				$movie->set('UpdatedOn', $row["UpdatedOn"]);
				$movie->set('CreatedOn', $row["CreatedOn"]);

				$movieCategories = CategoryHelpers::getMovieCategories($row["MovieId"]);
				$movie->set('Categories', $movieCategories);
			
				$movieList[] = $movie;
			}
		}

		return $movieList;
	}

	
	public static function getMovieParticipants($movieId) {
		$result = DBOperations::prepareAndExecute(
			"SELECT FirstName, LastName, Position FROM `movies_participants` m_p 
			INNER JOIN `movieparticipants` mp 
			WHERE m_p.ParticipantId = mp.MovieParticipantId AND MovieId={$movieId}");

		$participants = [];

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$participant = new MovieParticipant();
				$participant->set('FirstName', $row["FirstName"]);
				$participant->set('LastName', $row["LastName"]);
				$participant->set('Position', $row["Position"]);
				
				$participants[] = $participant;
			}
		}

		return $participants;	
	}

	public static function getMovie($movieId) {
		//base movie data
		$movieResult = DBOperations::prepareAndExecute(
		"SELECT movies.MovieId, movies.Name as MovieName, ReleaseDate, movies.Description,
		PosterImgSrc, Country, Language, MovieRating, IMDBRating, Duration, Rewards, 
		CreatedOn, UpdatedOn, MusicStudio, MovieStudio, TrailerSrc
		from movies 
		WHERE movies.MovieId = {$movieId}");

		$movie = new Movie();

		if ($movieResult->num_rows > 0) {
			$row = $movieResult->fetch_assoc();
				
				$movie->set('Id', $row["MovieId"]);
				$movie->set('Name', $row["MovieName"]);
				$movie->set('MusicStudio', $row["MusicStudio"]);
				$movie->set('MovieStudio', $row["MovieStudio"]);
				$movie->set('Rating', $row["MovieRating"]);
				$movie->set('IMDBRating', $row["IMDBRating"]);
				$movie->set('ReleaseDate', $row["ReleaseDate"]);
				$movie->set('Description', $row["Description"]);
				$movie->set('Country', $row["Country"]);
				$movie->set('Language', $row["Language"]);
				$movie->set('Duration', $row["Duration"]);
				$movie->set('Awards', $row["Rewards"]);
				$movie->set('PosterImgSrc', $row["PosterImgSrc"]);
				$movie->set('TrailerSrc', $row["TrailerSrc"]);
	
		}

		//movie actors
		$movieActors = ParticipantHelpers::getMovieActors($movieId);
		$movie->set('Actors', $movieActors);
		
		//movie director
		$director = ParticipantHelpers::getMovieDirector($movieId);
		$movie->set('Director', $director);

		//movie categories
		$movieCategories = CategoryHelpers::getMovieCategories($movieId);
		$movie->set('Categories', $movieCategories);

		return $movie;
	}

	public static function deleteMovie($movieId) { 
		
		// DBOperations::prepareAndExecute("DELETE FROM movies_categories WHERE MovieId = {$movieId};");
		// DBOperations::prepareAndExecute("DELETE FROM movieevents WHERE MovieId = {$movieId};");
		DBOperations::prepareAndExecute("DELETE FROM movies WHERE MovieId = {$movieId};");

	}

	public static function rateMovie($userId, $movieId, $rating) {
		
		$existingRatingRes = 
	DBOperations::prepareAndExecute("SELECT UserId FROM userratings WHERE UserId = {$userId} AND MovieID = {$movieId}");

		$operation;
		//if rating for this movie from this user exists -> update the rating
		if ($existingRatingRes->num_rows > 0) {
			$operation = "update";
			DBOperations::prepareAndExecute("
			UPDATE `userratings` SET `MovieRating`= {$rating} WHERE UserId = {$userId} AND MovieID={$movieId}");
		} else {
			$operation = "create";
			DBOperations::prepareAndExecute("
			INSERT INTO `userratings`(`UserId`, `MovieID`, `MovieRating`) VALUES ({$userId},{$movieId},{$rating});");
		}

		//update global user rating with average
		DBOperations::prepareAndExecute(
			"UPDATE movies SET MovieRating = 
				(SELECT AVG(userratings.MovieRating) 
				FROM userratings 
				WHERE userratings.MovieID = {$movieId}) 
				WHERE MovieId={$movieId};");

		
		return $operation;
	}

    public static function getHomeRecentMovies() {

		$lastWeekStart = Date("Y-m-d",time() - (7 * 24 * 60 * 60));
		//+ 1 day to include today
		$today = Date("Y-m-d", time() + (24*60*60));
		
		$result = DBOperations::prepareAndExecute(
			"SELECT movies.Name AS MovieName,
			c.Name AS CategoryName,
			movies.MovieRating AS MovieRating,
			CAST(movies.ReleaseDate AS DATE) AS ReleaseDate,
			CAST(movies.CreatedOn AS DATE) AS CreatedOn
			FROM movies
			INNER JOIN movies_categories mc
			ON mc.MovieId = movies.MovieId
			INNER JOIN categories c
			ON c.CategoryId = mc.CategoryId
			WHERE movies.CreatedOn BETWEEN '" . $lastWeekStart . "' AND '" . $today .
			"' ORDER BY CreatedOn DESC LIMIT 4;");

        $movieList = [];

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$movie = new Movie();
				$movie->set('Name', $row["MovieName"]);
				$movie->set('Category', $row["CategoryName"]);
				$movie->set('Rating', $row["MovieRating"]);
				$movie->set('ReleaseDate', $row["ReleaseDate"]);
				$movie->set('CreatedOn', $row["CreatedOn"]);
				// $movieList [] = new Movie( $row["MovieName"], $row["CategoryName"], NULL , $row["MovieRating"], $row["ReleaseDate"], $row['CreatedOn'] );
				$movieList[] = $movie;
			}
		}
        
        return $movieList;
	}

	public static function getWatchLaterMoviesForUser($username) 
	{
		$result = DBOperations::prepareAndExecute(
			"SELECT movies.Name AS MovieName FROM movies INNER JOIN watchlateritems 
			WHERE movies.MovieId = watchlateritems.WatchLaterItemId");

        $movieList = [];

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$movie = new Movie();
				$movie->set('Name', $row['MovieName']);
				// $movieList [] = new Movie( $row["MovieName"], NULL, NULL, NULL, NULL, NULL);
				$movieList[] = $movie;
			}
        }
        
        return $movieList;
	}

	public static function getSharedMovies() {
		$result = DBOperations::prepareAndExecute(
			"SELECT movies.Name as MovieName, movies.Description as MovieDescription
			FROM movies 
			INNER JOIN movieexchanges 
			WHERE movies.MovieId = movieexchanges.MovieToShare AND movieexchanges.IsApproved = 0 
			ORDER BY movies.UpdatedOn DESC 
			LIMIT 10;");

			$movies = [];

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$movie = new Movie();
					$movie->set('Name', $row["MovieName"]);
					$movie->set('Description', $row["MovieDescription"]);

					$movies[] = $movie;
				}
			}

			return $movies;
	}

	public static function getMovieProjectionsBetween($dateStart, $dateEnd) {
		$result = DBOperations::prepareAndExecute(
			"SELECT movieevents.Time as Time,
			movieevents.Location as Location,
			movies.Name as MovieName
			FROM movieevents INNER JOIN movies
			WHERE movieevents.MovieEventId = movies.MovieId AND movieevents.Time BETWEEN '{$dateStart}' AND '{$dateEnd}'
			LIMIT 10;");


		$movieProjMap = [];
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$movieProjMap[$row['MovieName']] = [$row['Time'], $row['Location']];
			}
		}

		return $movieProjMap;
	}

	public static function getMovieFestivals() {
		$result = DBOperations::prepareAndExecute(
			"SELECT moviefestivals.Name as FestivalName,
			moviefestivals.Description as FestivalDescription
			FROM moviefestivals
			LIMIT 10;");


		$festivals = [];
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$festivals[] = new Festival($row['FestivalName'], $row['FestivalDescription']);
			}
		}

		return $festivals;
	}

	/**
	 * IMPORTANT: Table needs to have 'UpdatedOn' column.
	 * Returns the id of the last modified tuple
	 */
	public static function getLastUpdatedFromTable($tableName) {
		$lastIdRes = DBOperations::prepareAndExecute(
			"SELECT * FROM `{$tableName}` ORDER BY UpdatedOn DESC LIMIT 1");
		
			if ($lastIdRes->num_rows > 0) {
				$test = $lastIdRes->fetch_assoc();
				return reset($test);
		}

		return NULL;
	}
 }
?>