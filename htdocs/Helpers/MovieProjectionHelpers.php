<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/MovieProjection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';

class MovieProjectionHelpers {

    public static function getMovieProjection($projectionId) {
        $res = DBOperations::prepareAndExecute("SELECT * FROM `movieevents`
        WHERE MovieEventId = {$projectionId}");

        $projection = NULL;
		if ($res->num_rows > 0) {
			$row = $res->fetch_assoc();
            $projection = new MovieProjection();
            $projection->set('Id', $row["MovieEventId"]);
            $projection->set('Name', $row["Name"]);
            $projection->set('Location', $row["Location"]);
            $projection->set('MovieId', $row["MovieId"]);
            $projection->set('OwnerId', $row["OwnerId"]);
            $projection->set('Date', $row["Time"]);
		}
        
        return $projection;
    }

    public static function getMovieProjections() {
        $res = DBOperations::prepareAndExecute("SELECT * FROM `movieevents`");

        $movieProjections = [];

		if ($res->num_rows > 0) {
			while($row = $res->fetch_assoc()) {
				$projection = new MovieProjection();
				$projection->set('Id', $row["MovieEventId"]);
				$projection->set('Name', $row["Name"]);
				$projection->set('Location', $row["Location"]);
                $projection->set('MovieId', $row["MovieId"]);
                $projection->set('OwnerId', $row["OwnerId"]);
                $projection->set('Date', $row["Time"]);
                
				$movieProjections[] = $projection;
			}
		}

		return $movieProjections;	
    }

    public static function addMovieProjection($ownerId, $name, $movieId, $date, $location) {
       DBOperations::prepareAndExecute("
        INSERT INTO `movieevents`(`MovieId`, `Name`, `OwnerId`, `Time`, `Location`) 
        VALUES ({$movieId},'{$name}',{$ownerId},STR_TO_DATE('{$date}', '%Y-%m-%d'),'{$location}')
        ");
    }

    public static function editMovieProjection($projectionId, $ownerId, $name, $movieId, $date, $location) {
        DBOperations::prepareAndExecute("UPDATE `movieevents` 
        SET `Name`='{$name}',`MovieId`={$movieId},
        `OwnerId`={$ownerId},`Time`=STR_TO_DATE('{$date}', '%Y-%m-%d'),
        `Location`='{$location}'
        WHERE MovieEventId = {$projectionId}");
    }

    public static function deleteMovieProjection($projectionId) {
        DBOperations::prepareAndExecute("
        DELETE FROM `movieevents` 
        WHERE MovieEventId = {$projectionId}");
    }

}
?>