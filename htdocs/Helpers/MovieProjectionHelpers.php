<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/MovieProjection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
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
            $projection->set('Duration', $row["Duration"]);
            $projection->set('MovieId', $row["MovieId"]);
            $projection->set('OwnerId', $row["OwnerId"]);
            $projection->set('Date', $row["Time"]);
            $projection->set('Participants', MovieProjectionHelpers::getProjectionParticipants($row["MovieEventId"]));
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
                $projection->set('Duration', $row["Duration"]);
				$projection->set('Location', $row["Location"]);
                $projection->set('MovieId', $row["MovieId"]);
                $projection->set('OwnerId', $row["OwnerId"]);
                $projection->set('Date', $row["Time"]);
                $projection->set('Participants', MovieProjectionHelpers::getProjectionParticipants($row["MovieEventId"]));
                
				$movieProjections[] = $projection;
			}
		}

		return $movieProjections;	
    }

    public static function getProjectionsByUser($userId) {
        $allProj = MovieProjectionHelpers::getMovieProjections();
        return array_values(array_filter($allProj, function($v, $k) use ($userId) {
            return $v->get("OwnerId") == $userId;
        }, ARRAY_FILTER_USE_BOTH));
    }

    public static function getProjectionParticipants($projectionId) {

        $res = DBOperations::prepareAndExecute("
        SELECT * FROM `events_participants` WHERE EventId={$projectionId}
        ");
        $participantsMap = [];
        if ($res->num_rows > 0) {
			while($row = $res->fetch_assoc()) {
                $user = UserHelpers::getUser($row['ParticipantId']);
                $participantsMap[] = [$user->get("UserId"), $user->get('Username'), $row['IsApproved']];
            }
        }
        return $participantsMap;
    }

    public static function addMovieProjection($ownerId, $name, $duration ,$movieId, $date, $location) {
       DBOperations::prepareAndExecute("
        INSERT INTO `movieevents`(`MovieId`, `Name`, `Duration` ,`OwnerId`, `Time`, `Location`) 
        VALUES ({$movieId},'{$name}', {$duration} ,{$ownerId},STR_TO_DATE('{$date}', '%Y-%m-%d'),'{$location}')
        ");
    }

    public static function editMovieProjection($projectionId, $ownerId, $name, $duration,$movieId, $date, $location) {
        DBOperations::prepareAndExecute("UPDATE `movieevents` 
        SET `Name`='{$name}',`MovieId`={$movieId},
        `Duration`={$duration},
        `OwnerId`={$ownerId},`Time`=STR_TO_DATE('{$date}', '%Y-%m-%d'),
        `Location`='{$location}'
        WHERE MovieEventId = {$projectionId}");
    }

    public static function deleteMovieProjection($projectionId) {
        DBOperations::prepareAndExecute("
        DELETE FROM `movieevents` 
        WHERE MovieEventId = {$projectionId}");
    }

    public static function alterParticipantStatus($projectionId, $participantId, $status) {
        DBOperations::prepareAndExecute("
        UPDATE `events_participants` SET `IsApproved`={$status} WHERE `ParticipantId`={$participantId} AND `EventId`={$projectionId}");    
    }
}
?>