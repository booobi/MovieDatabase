<?php
include '../Models/Movie.php';
include '../includes/DBOperations.php';

 class MovieHelpers {

    public static function getHomePageMovies() {

		$result = DBOperations::prepareAndExecute(
			"SELECT movies.Name AS MovieName
			, c.Name AS CategoryName
			, movies.MovieRating AS MovieRating
			, CAST(movies.ReleaseDate AS DATE) AS ReleaseDate
			FROM movies
			INNER JOIN movies_categories mc
			ON mc.MovieId = movies.MovieId
			INNER JOIN categories c
			ON c.CategoryId = mc.CategoryId
			LIMIT 10;");

        $movieList = [];

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$movieList [] = new Movie( $row["MovieName"], $row["CategoryName"], $row["MovieRating"], $row["ReleaseDate"] );
			}
        }
        
        return $movieList;
	}
 }
?>