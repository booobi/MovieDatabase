<?php
	include '../includes/DBCredentials.php';
	include '../Models/Movie.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$sqlQuery = $conn->prepare("SELECT movies.Name AS MovieName
					, c.Name AS CategoryName
					, movies.MovieRating AS MovieRating
					, CAST(movies.ReleaseDate AS DATE) AS ReleaseDate
				FROM movies
				INNER JOIN movies_categories mc
					ON mc.MovieId = movies.MovieId
				INNER JOIN categories c
					ON c.CategoryId = mc.CategoryId
				LIMIT 10;");
		
		$sqlQuery->execute();
		$result = $sqlQuery->get_result();
		if ($result->num_rows > 0) {
			$movieList = [];
			while($row = $result->fetch_assoc()) {
				$movieList [] = new Movie( $row["MovieName"], $row["CategoryName"], $row["MovieRating"], $row["ReleaseDate"] );
			}
			
			$objJSON = json_encode($movieList);
			echo $objJSON;
			
		} else {
			echo [];
		}
	
?>