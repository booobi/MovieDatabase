<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Share.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';

class ShareHelpers {

    public static function addShare($userId, $forMovieId) {
        DBOperations::prepareAndExecute(
            "INSERT INTO `movieexchanges`(`ExchangeRequestBy`,`MovieToShare`) VALUES ($userId, $forMovieId)"
        );
    }

    public static function editShare($shareId, $movieId) {
        $share = ShareHelpers::getShare($shareId);
        $prevMovie = $share->get("MovieId");
        $shareOwner = $share->get("RequestBy");
        
        if($movieId == $prevMovie) return;

        if(ShareHelpers::mainShareByUserForMovieExists($shareOwner, $movieId)) {
            return 'exists';
        }

        //remove all requests for the prevous movie share
        DBOperations::prepareAndExecute(
            "DELETE FROM `movieexchanges` WHERE ExchangeRequestTo={$shareOwner} AND MovieToShare={$prevMovie}"
        );

        //edit share
        DBOperations::prepareAndExecute(
            "UPDATE `movieexchanges` SET `MovieToShare`=$movieId WHERE Movie_ExchangesId={$shareId}"
        );
    }

    public static function deleteShare($shareId) {
        $share = ShareHelpers::getShare($shareId);
        $movieId = $share->get("MovieId");
        $shareOwner = $share->get("RequestBy");

        //remove all requests for the movie share
        DBOperations::prepareAndExecute(
            "DELETE FROM `movieexchanges` WHERE ExchangeRequestTo={$shareOwner} AND MovieToShare={$movieId}"
        );

        //delete the share itself
        DBOperations::prepareAndExecute(
            "DELETE FROM `movieexchanges`  WHERE Movie_ExchangesId={$shareId}"
        );
    }

    public static function getShare($shareId) {
        $sharesRes = DBOperations::prepareAndExecute(
            "SELECT * FROM `movieexchanges` WHERE Movie_ExchangesId={$shareId}"
        );
		if ($sharesRes->num_rows > 0) {
			$row = $sharesRes->fetch_assoc();
            $share = new Share();
            $share->set("Id", $row['Movie_ExchangesId']);
            $share->set("RequestBy", $row['ExchangeRequestBy']);
            $share->set("RequestTo", $row['ExchangeRequestTo']);
            $share->set("MovieId", $row['MovieToShare']);
            $share->set("RequesterRating", $row['RequesterRating']);
            $share->set("ApprovalRating", $row['ApprovalRating']);
            $share->set("IsApproved", $row['IsApproved']);

            //movie
            $movie = MovieHelpers::getMovie($row['MovieToShare']);
            $share->set('Movie', $movie);

            //owner
            $owner = UserHelpers::getUser($row['ExchangeRequestBy']);
            $share->set("Owner", $owner);

            return $share;
        }
    }

    public static function getShares() {
        $sharesRes = DBOperations::prepareAndExecute(
            "SELECT * FROM `movieexchanges`"
        );

        $shares = [];
		if ($sharesRes->num_rows > 0) {
			while($row = $sharesRes->fetch_assoc()) {
                $share = new Share();
                $share->set("Id", $row['Movie_ExchangesId']);
                $share->set("RequestBy", $row['ExchangeRequestBy']);
                $share->set("RequestTo", $row['ExchangeRequestTo']);
                $share->set("MovieId", $row['MovieToShare']);
                $share->set("RequesterRating", $row['RequesterRating']);
                $share->set("ApprovalRating", $row['ApprovalRating']);
                $share->set("IsApproved", $row['IsApproved']);

                //movie
                $movie = MovieHelpers::getMovie($row['MovieToShare']);
                $share->set('Movie', $movie);

                //owner
                $owner = UserHelpers::getUser($row['ExchangeRequestBy']);
                $share->set("Owner", $owner);


                $shares[] = $share;
            }
        }

        return $shares;
    }

    public static function getMainShares() {
        $shares = ShareHelpers::getShares();

        $mainShares = array_values(array_filter($shares, function($v, $k) {
            return $v->get("RequestTo") == NULL;
        }, ARRAY_FILTER_USE_BOTH));

        //set status
        foreach($mainShares as $mainShare) {
             //get requests for this user and movie combination (share):
            $shareOwnerId = $mainShare->get("RequestBy");
            $movieId = $mainShare->get("MovieId");

            $isApprovedRes= DBOperations::prepareAndExecute(
                "SELECT * FROM `movieexchanges` WHERE ExchangeRequestTo={$shareOwnerId} AND MovieToShare={$movieId} AND isApproved=1"
            );

            $status="";
            if($isApprovedRes->num_rows > 0) {
                $status = "Shared";
            } else {
                $statusRes = DBOperations::prepareAndExecute(
                    "SELECT * FROM `movieexchanges` WHERE ExchangeRequestTo={$shareOwnerId} AND MovieToShare={$movieId}"
                );
    
                $status = $statusRes->num_rows > 0 ? "Requested" : "New";
            }
            
            $mainShare->set("Status", $status);
        }

        return $mainShares;

    }

    public static function getSharesByUserId($userId) {
        $shares = ShareHelpers::getMainShares();
        
        return array_values(array_filter($shares, function($v, $k) use ($userId) {
            return $v->get("RequestBy") == $userId;
        }, ARRAY_FILTER_USE_BOTH));
    }

    public static function getSharesExcludingUserId($userId) {
        $shares = ShareHelpers::getMainShares();
        
        return array_values(array_filter($shares, function($v, $k) use ($userId) {
            return $v->get("RequestBy") != $userId;
        }, ARRAY_FILTER_USE_BOTH));
    }

    public static function makeRequest($byUserId, $shareId) {

        $share = ShareHelpers::getShare($shareId);
        $shareOwnerId = $share->get('RequestBy');
        $shareMovieId = $share->get('MovieId');


        if($share->get('RequestTo')) {
            return 'invalid';
        }
        if(ShareHelpers::requestForShareExists($byUserId, $shareOwnerId, $shareMovieId)) {
            return 'exists';
        }

        DBOperations::prepareAndExecute(
            "INSERT INTO `movieexchanges`(`ExchangeRequestBy`, `ExchangeRequestTo`, `MovieToShare`) 
            VALUES ($byUserId, $shareOwnerId ,$shareMovieId)"
        );
    }

    public static function getRequestsForShare($shareId) {
        $share = ShareHelpers::getShare($shareId);
        $shareOwnerId = $share->get("RequestBy");
        $shareMovieId = $share->get("MovieId");
        
        $shareRequestIdsRes = DBOperations::prepareAndExecute(
            "SELECT Movie_ExchangesId FROM `movieexchanges` WHERE ExchangeRequestTo={$shareOwnerId} AND MovieToShare={$shareMovieId}
            "
        );

        $shareRequests = [];
        if ($shareRequestIdsRes->num_rows > 0) {
			while($row = $shareRequestIdsRes->fetch_assoc()) {
                $shareRequests[] = ShareHelpers::getShare($row['Movie_ExchangesId']);
            }
        }
		
        return $shareRequests;
        
    }
    public static function userHasRequestToShare($userId, $shareId) {
        $shareRequests = ShareHelpers::getRequestsForShare($shareId);
        
        return count($shareRequests) > 0;
     }

    public static function cancelRequest($ofUserId, $forShareId) {
        $share = ShareHelpers::getShare($forShareId);
        $ownerId = $share->get("RequestBy");
        $forMovieId = $share->get("MovieId");
        DBOperations::prepareAndExecute(
            "DELETE FROM `movieexchanges` 
            WHERE `ExchangeRequestBy`={$ofUserId} AND `ExchangeRequestTo`={$ownerId} AND `MovieToShare`={$forMovieId} 
            "
        );
    }

    public static function alterRequestStatus($shareId, $isApproved) {
        DBOperations::prepareAndExecute(
            "UPDATE `movieexchanges` SET `IsApproved`={$isApproved} 
            WHERE Movie_ExchangesId={$shareId}"
        );
    }
    
    public static function requestForShareExists($byId, $toId, $forMovieId) {
        $res = DBOperations::prepareAndExecute(
        "SELECT * FROM `movieexchanges` WHERE ExchangeRequestBy={$byId} AND ExchangeRequestTo={$toId} AND MovieToShare={$forMovieId}"
        );

        return $res->num_rows > 0;
    }

    public static function mainShareByUserForMovieExists($userId, $movieId) {
        $res = DBOperations::prepareAndExecute(
            "SELECT * FROM `movieexchanges` WHERE ExchangeRequestBy={$userId} AND ExchangeRequestTo IS NULL AND MovieToShare={$movieId}"
            );
    
            return $res->num_rows > 0;
    }
 }
?>