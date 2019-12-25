<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/User.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';

 class UserHelpers {

    public static function getUserIdByUsername($username) {
        $result = DBOperations::prepareAndExecute("SELECT UserId FROM users WHERE Email = '{$username}'");

        return $result->fetch_assoc()['UserId'];
    }

    public static function getUserOwnedMovies($username) {
        $result = $result = DBOperations::prepareAndExecute(
            "SELECT user_owned_movies.MovieId from `user_owned_movies`
            INNER JOIN `users` 
            WHERE users.UserId = user_owned_movies.UserId
            AND
            users.Email = ?;", 
			
			's', 
            [$username]);

        $userOwnedMovieIds = [];
        if($result->num_rows > 0) {
            while($resRow = $result->fetch_assoc()) {
                $userOwnedMovieIds[] = $resRow['MovieId'];
            }
            return $userOwnedMovieIds;
        }

        return [];
    }

    public static function getUser($userName) {
        $result = DBOperations::prepareAndExecute(
            "SELECT users.UserId AS UserId
			, users.FirstName AS FirstName
			, users.LastName AS LastName
			, users.Password AS Password
			, users.Email AS Email
			, users.Role AS Role
			, users.IsActive AS IsActive
			, users.IsMalicious AS IsMalicious
			, users.IsMalicious AS IsApprovedByAdmin
			FROM users
			WHERE users.Email = ?
            LIMIT 1;", 
			
			's', 
			[$userName]);

            if($result->num_rows > 0) {
                $resRow = $result->fetch_assoc();
    
                $objUser = new User(
                    $resRow['Email'],
                    $resRow['FirstName'],
                    $resRow['LastName'],
                    $resRow['Password'],
                    $resRow['Role']);
                    return $objUser;
            }
    
            return NULL;
    }
    
    public static function checkUserExistence($userName) {
        $result = DBOperations::prepareAndExecute(
            "SELECT * FROM users WHERE email = ? LIMIT 1;", 			
			's', 
            [$userName]);

        return $result->num_rows > 0;
    }

    public function createUser($email, $passwordPlain, $firstName, $lastName ){
        if (UserHelpers::checkUserExistence($email)) {
            return json_encode([ 'status' => 'error', 'description' => 'User already exists!']);
        } 
        
        //encrypt the password before saving in the database
        $passwordHashed = md5($passwordPlain);
        
        $result = DBOperations::prepareAndExecute(
            "INSERT INTO users (firstname, lastname, password, email, role, isactive, ismalicious, isapprovedbyadmin) 
        VALUES(?, ?, ?, ?, 'standard', 0, 0, 0);", 			
			'ssss', 
            [$firstName, $lastName, $passwordHashed, $email]);
        
        return json_encode([ 'status' => 'success', 'description' => 'Registration was successful! \nPlease check your email for confirmation!']);
    }

    public static function validateUserLoggedIn() {
        if(!isset($_SESSION['userLoggedIn']) || !$_SESSION['userLoggedIn']) {
            echo json_encode(
            [
                'status'=>'failure',
                'description'=>'You are not logged in or do not have required privilages for this action'
            ]);
            die();
        }
    }

    public static function checkUserIsAdmin() {
        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
            echo json_encode(
                [
                    'status'=>'failure',
                    'description'=>'You need to be an admin to perform this action'
                ]);
            die();
        }
    }
}
?>