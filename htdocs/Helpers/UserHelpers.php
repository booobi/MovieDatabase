<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/User.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';

 class UserHelpers {

    public static function alterUserStatus($userId, $status) {
        DBOperations::prepareAndExecute("UPDATE users SET IsActive={$status} WHERE UserId = {$userId}");
    }

    public static function alterUserApproval($userId, $isApproved) {
        DBOperations::prepareAndExecute("UPDATE users SET IsApprovedByAdmin={$isApproved}, IsActive=1 WHERE UserId = {$userId}");
    }

    public static function getUserIdByUsername($username) {
        $result = DBOperations::prepareAndExecute("SELECT UserId FROM users WHERE Email = '{$username}'");

        return $result->fetch_assoc()['UserId'];
    }

    public static function getCurrentUser() {
        if(isset($_SESSION['username'])) {
            $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
            return UserHelpers::getUser($userId);
        }
    }

    public static function changeUserPassword($userId, $newPassword) {
        $newPassword = md5($newPassword);
        DBOperations::prepareAndExecute("UPDATE `users` SET `Password`='{$newPassword}' WHERE UserId={$userId}");
    }

    public static function changeUserDetails($userId, $firstName, $lastName, $email) {
        //check if same user email exists
        if(!UserHelpers::isEmailAvailableForUser($userId, $email)) {
            echo json_encode(
            [
                'status'=>'failure',
                'description'=>'Another user has this email!'
            ]);
            die(); 
        }
        
        DBOperations::prepareAndExecute(
        "UPDATE `users` SET `FirstName`='{$firstName}',`LastName`='{$lastName}',`Email`='{$email}' 
        WHERE UserId={$userId}");

    }

    public static function getUserOwnedMovies($username) {
        $result = DBOperations::prepareAndExecute(
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
        }

        return $userOwnedMovieIds;
    }

    public static function getUsers() {
        $result = DBOperations::prepareAndExecute("SELECT * FROM users");

        $users = [];
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user = new User();
                $user->set('UserId', $row['UserId']);
                $user->set('Username', $row['Email']);
                $user->set('FirstName', $row['FirstName']);
                $user->set('LastName', $row['LastName']);
                $user->set('IsActive', $row['IsActive']);
                $user->set('IsMalicious', $row['IsMalicious']);
                $user->set('IsApprovedByAdmin', $row['IsApprovedByAdmin']);
                $user->set('Password', $row['Password']);
                $user->set('Role', $row['Role']);
                
                $users[] = $user;
            }
            
            return $users;
        }
    }

    public static function getUser($userId) {
        $result = DBOperations::prepareAndExecute(
            "SELECT *
			FROM users
            WHERE UserId = {$userId}");
            
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
    
                $user = new User();
                $user->set('UserId', $row['UserId']);
                $user->set('Username', $row['Email']);
                $user->set('FirstName', $row['FirstName']);
                $user->set('LastName', $row['LastName']);
                $user->set('IsActive', $row['IsActive']);
                $user->set('IsMalicious', $row['IsMalicious']);
                $user->set('IsApprovedByAdmin', $row['IsApprovedByAdmin']);
                $user->set('Password', $row['Password']);
                $user->set('Role', $row['Role']);
                return $user;
            }
    
            return NULL;
    }

    public static function isEmailAvailableForUser($userId, $email) {
        $res = DBOperations::prepareAndExecute(
        "SELECT * FROM `users` WHERE Email = '{$email}' AND UserId != {$userId}");

        return $res->num_rows == 0;
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
        
        return json_encode([ 'status' => 'success', 'description' => 'Registration was successful! Please wait for an admin to activate your account!']);
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

    public static function currentUserIsAdmin() {
        return (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']);
    }
}
?>