<?php
    session_start();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    UserHelpers::validateUserLoggedIn();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
  

    // ------- MOCK DATA ------
    $movie = new Movie();
    $movie->set("Name", "RRRRRR");
    $movie->set("ReleaseDate", "1996-02-26");
    $movie->set("Description", "asdasdasdasdasdasdasddsadsadasdadas");
    $movie->set("Link", "http://google.bg");
    $movie->set("Country", "Albania");
    $movie->set("Language", "Albanian");
    $movie->set("IMDBRating", 2);
    $movie->set("PosterImgSrc", "http://google.bg");
    $movie->set("TrailerSrc", "http://google.bg");
    $movie->set("IsActive", 1);
    $movie->set("Duration", 120);
    $movie->set("Awards", "Worst Movie EU");
    $movie->set("MovieStudio", "Cargath Studios");
    $movie->set("MusicStudio", "Reinkor Music Std");


    $actors = [];
    $actors[] = new MovieParticipant();
    $actors[0]->set("Id", 7);
    $actors[0]->set("isMainActor", 0);

    $actors[] = new MovieParticipant();
    $actors[1]->set("Id", 8);
    $actors[1]->set("isMainActor", 1);

    $actors[] = new MovieParticipant();
    $actors[2]->set("Id", 9);
    $actors[2]->set("isMainActor", 1);

    $director = new MovieParticipant();
    $director->set("Id", 5);

    $movie->set("Actors", $actors);
    $movie->set("Director", $director);

    $categories = [];
    $categories[] = new Category();
    $categories[0]->set("Id", 3);
    $categories[] = new Category();
    $categories[1]->set("Id", 4);
    $categories[] = new Category();
    $categories[2]->set("Id", 5);
    $movie->set("Categories", $categories);

    $movies = MovieHelpers::addMovie($movie);
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Movie added successfully!'
        ]); 
?>