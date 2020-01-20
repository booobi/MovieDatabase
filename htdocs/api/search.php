<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CommentHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateSearchFields();

    $searchString = strtolower($_POST['searchString']);
    $found = find($searchString);

    if($found) {
        echo json_encode(
            [
                'status'=>'success',
                'description'=>$found
            ]);
    } else {
        echo json_encode(
            [
                'status'=>'error',
                'description'=>'Nothing that mathes your search criteria could be found!'
            ]);
    }

    function find($searchString) {
        //basic search
        $matchingMovies = MovieHelpers::getMoviesContaining($searchString);
        if(count($matchingMovies) > 0) {
            return ['movie' => $matchingMovies[0]];
        }

        if($_POST['advancedSearch']) {
            $matchingPosts = PostHelpers::getPostsContaining($searchString);
            if(count($matchingPosts) > 0) {
                return ['post' => $matchingPosts[0]];
            }

            $matchingComments = CommentHelpers::getCommentsContaining($searchString);
            if(count($matchingComments) > 0) {
                return ['comment' => $matchingComments[0]];
            }
        }

        return NULL;
}
?>