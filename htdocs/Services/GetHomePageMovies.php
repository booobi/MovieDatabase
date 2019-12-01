<?php
	include '../Helpers/MovieHelpers.php';

	$movies = MovieHelpers::getHomePageMovies();

	echo json_encode($movies);	
?>