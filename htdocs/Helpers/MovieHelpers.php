<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Movie.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Festival.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';

 class MovieHelpers {

	public static function getMovies($size=20, $orderByColumn="UpdatedOn") {
		$result = DBOperations::prepareAndExecute(
			"SELECT movies.MovieId as MovieId,
			movies.Name AS MovieName,
			c.Name AS CategoryName,
			movies.MovieRating AS MovieRating,
			movies.IMDBRating As MovieIMDBRating,
			CAST(movies.ReleaseDate AS DATE) AS ReleaseDate,
			movies.Country as MovieCountry,
			movies.Language as MovieLanguage,
			movies.Duration as MovieDuration,
			movies.PosterImgSrc as MoviePosterImgSrc
			FROM movies
			INNER JOIN movies_categories mc
			ON mc.MovieId = movies.MovieId
			INNER JOIN categories c
			ON c.CategoryId = mc.CategoryId
			ORDER BY movies." . $orderByColumn . " LIMIT " . $size);

		$movieList = [];

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$movie = new Movie();
				$movie->set('Id', $row["MovieId"]);
				$movie->set('Name', $row["MovieName"]);
				$movie->set('Category', $row["CategoryName"]);
				$movie->set('Rating', $row["MovieRating"]);
				$movie->set('IMDBRating', $row["MovieIMDBRating"]);
				$movie->set('ReleaseDate', $row["ReleaseDate"]);
				$movie->set('Country', $row["MovieCountry"]);
				$movie->set('Language', $row["MovieLanguage"]);
				$movie->set('Duration', $row["MovieDuration"]);
				$movie->set('PosterImgSrc', $row["MoviePosterImgSrc"]);
			
				$movieList[] = $movie;
			}
		}

		return $movieList;
	}


	public static function deleteMovie($movieId) { 
		
		// DBOperations::prepareAndExecute("DELETE FROM movies_categories WHERE MovieId = {$movieId};");
		// DBOperations::prepareAndExecute("DELETE FROM movieevents WHERE MovieId = {$movieId};");
		DBOperations::prepareAndExecute("DELETE FROM movies WHERE MovieId = {$movieId};");

	}

	public static function rateMovie($userId, $movieId, $rating) {
		
		$existingRatingRes = 
	DBOperations::prepareAndExecute("SELECT UserId FROM userratings WHERE UserId = {$userId} AND MovieID = {$movieId}");

		//if rating for this movie from this user exists -> update the rating
		if ($existingRatingRes->num_rows > 0) {
			DBOperations::prepareAndExecute("
			UPDATE `userratings` SET `MovieRating`= {$rating} WHERE UserId = {$userId} AND MovieID={$movieId}");
		} else {
			DBOperations::prepareAndExecute("
			INSERT INTO `userratings`(`UserId`, `MovieID`, `MovieRating`) VALUES ({$userId},{$movieId},{$rating});");
		}
		
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
			"' ORDER BY IMDBRating DESC LIMIT 10;");

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
					// $movies[] = new Movie( $row["MovieName"], $row["MovieDescription"], NULL, NULL, NULL, NULL);
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
 }
?>