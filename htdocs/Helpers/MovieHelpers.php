<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Models/Movie.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';

 class MovieHelpers {


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
				$movieList [] = new Movie( $row["MovieName"], $row["CategoryName"], NULL , $row["MovieRating"], $row["ReleaseDate"], $row['CreatedOn'] );
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
				$movieList [] = new Movie( $row["MovieName"], NULL, NULL, NULL, NULL, NULL);
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
					$movieList [] = new Movie( $row["MovieName"], $row["MovieDescription"], NULL, NULL, NULL, NULL);
				}
			}

			return $movieList;
	}


 }
?>