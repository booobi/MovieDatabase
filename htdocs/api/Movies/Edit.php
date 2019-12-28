<?php
    session_start();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    UserHelpers::validateUserLoggedIn();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';

    $userOwnedMovies = UserHelpers::getUserOwnedMovies($_SESSION['username']);
    ValidatorHelpers::validateMoviePostData($_POST);
    
    if(
        (!isset($_SESSION['username']) || count($userOwnedMovies)==0 || !in_array(intVal($_POST['movieId']), $userOwnedMovies))
        && 
        (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin'])
        ) {
            echo json_encode(
                [
                    'status'=>'fail',
                    'description'=>'You do not have permission to edit this movie!'
                ]);
            die();
        }
       


    
    $movie = new Movie();
    $movie->set("Name", $_POST["name"]);
    $movie->set("ReleaseDate", $_POST["releaseDate"]);
    $movie->set("Description", $_POST["description"]);
    $movie->set("Link", "http://google.bg");
    $movie->set("Country", $_POST["country"]);
    $movie->set("Language", $_POST["language"]);
    $movie->set("IMDBRating", $_POST["rating"]);
    $movie->set("PosterImgSrc", $_POST["posterUrl"]);
    $movie->set("TrailerSrc", $_POST["trailerUrl"]);
    $movie->set("IsActive", 1);
    $movie->set("Duration", $_POST["duration"]);
    $movie->set("Awards", $_POST["awards"]);
    $movie->set("MovieStudio", $_POST["movieCompany"]);
    $movie->set("MusicStudio", $_POST["musicCompany"]);

    //set director
    $director = new MovieParticipant();
    $director->set("Id", $_POST["directorIds"][0]);
    $movie->set("Director", $director);
    
    //set actors
    $actors = [];  
    foreach($_POST["actorIds"] as $actorId) {
        $actor = new MovieParticipant();
        $actor->set("Id", $actorId);
        $actor->set("isMainActor", 0);
        
        $actors[] = $actor;
    }    
    //set main actors
    foreach($_POST["mainActorIds"] as $mainActorId) {
        $mainActor = new MovieParticipant();
        $mainActor->set("Id", $mainActorId);
        $mainActor->set("isMainActor", 1);

        $actors[] = $mainActor;
    }
    $movie->set("Actors", $actors);

    //set categories
    $categories = [];
    foreach($_POST["categoryIds"] as $categoryId) {
        $category = new Category();
        $category->set("Id", $categoryId);

        $categories[] = $category;
    }
    $movie->set("Categories", $categories);
    $movies = MovieHelpers::editMovie($_POST['movieId'], $movie);

    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Movie edited successfully!'
        ]); 
?>