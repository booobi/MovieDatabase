<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/MovieParticipant.php';

class ParticipantHelpers {

    public static function getMovieActors($movieId) {
        $movieActorsRes = DBOperations::prepareAndExecute(
			"SELECT MovieParticipantId, FirstName, LastName, Position, isMainActor 
			FROM `movieparticipants` INNER JOIN `movies_participants` 
			ON movieparticipants.MovieParticipantId = movies_participants.ParticipantId
			WHERE movies_participants.MovieId = {$movieId} AND NOT Position='director'");

		$movieActors = [];
		if ($movieActorsRes->num_rows > 0) {
			while($row = $movieActorsRes->fetch_assoc()) {
                $actor = new MovieParticipant();
                $actor->set("Id", $row['MovieParticipantId']);
				$actor->set("FirstName", $row['FirstName']);
				$actor->set("LastName", $row['LastName']);
				$actor->set("Position", $row['Position']);
				$actor->set("isMainActor", $row['isMainActor']);

				$movieActors[] = $actor;
			}
        }

        return $movieActors;
    }

    public static function getMovieDirector($movieId) {
        $movieDirectorRes = DBOperations::prepareAndExecute(
			"SELECT MovieParticipantId, FirstName, LastName, Position 
			FROM `movieparticipants` INNER JOIN `movies_participants` 
			ON movieparticipants.MovieParticipantId = movies_participants.ParticipantId
			WHERE movies_participants.MovieId = {$movieId} AND Position='director'");

        $director = NULL;
		if ($movieDirectorRes->num_rows > 0) {
			$row = $movieDirectorRes->fetch_assoc();		
			$director = new MovieParticipant();
			$director->set("Id", $row['MovieParticipantId']);
			$director->set("FirstName", $row['FirstName']);
			$director->set("LastName", $row['LastName']);
			$director->set("Position", $row['Position']);
        }

        return $director;
    }

    public static function applyParticipantsToMovie($movieId, $actors, $director) {
        
        //remove previous participants
        DBOperations::prepareAndExecute(
            "DELETE FROM `movies_participants` WHERE MovieId = {$movieId}");

        foreach($actors as $actor) {
            //check if actor id exists
            $actorId = $actor->get("Id");
            $actorExistsRes = DBOperations::prepareAndExecute(
                "SELECT * FROM `movieparticipants` WHERE movieParticipantId = {$actorId}");
            if($actorExistsRes->num_rows > 0) {
                //apply actor to movie
                DBOperations::prepareAndExecute(
                    "INSERT INTO `movies_participants`(`MovieId`, `ParticipantId`, `IsMainActor`) 
                VALUES ({$movieId}, {$actorId}, " . ($actor->get("isMainActor")) .")");
            }
        }

        //check if director exists
        $directorId = $director->get("Id");
        $directorExistsRes = DBOperations::prepareAndExecute(
        "SELECT * FROM `movieparticipants` WHERE movieParticipantId = {$directorId} AND Position='director'");
        if($directorExistsRes->num_rows > 0) {
            //apply director to movie
            DBOperations::prepareAndExecute(
                "INSERT INTO `movies_participants`(`MovieId`, `ParticipantId`, `IsMainActor`) 
            VALUES ({$movieId}, {$directorId}, 0)");
        }
    }

    public static function getAllParticipants() {
        $participantsRes = DBOperations::prepareAndExecute(
            "SELECT * FROM `movieparticipants`");

        $participants = [];
        if ($participantsRes->num_rows > 0) {
            while($row = $participantsRes->fetch_assoc()) {
                $participant = new MovieParticipant();
                $participant->set("Id", $row["MovieParticipantId"]);
                $participant->set("FirstName", $row['FirstName']);
                $participant->set("LastName", $row['LastName']);
                $participant->set("Position", $row['Position']);

                $participants[] = $participant;
            }
        }

        return $participants;
    }

 }
?>