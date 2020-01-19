<?php
class ValidatorHelpers {

    public function validateUserLoggedIn() {
        if(!isset($_SESSION['userLoggedIn']) || !isset($_SESSION['username'])) {
            echo json_encode(
            [
                'status'=>'error',
                'description'=>'You need to be logged in to perform this action!'
            ]);
            die();
        }
    }

    public function validateUserIsAdmin() {
        ValidatorHelpers::validateUserLoggedIn();
        if(!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin']) {
            echo json_encode(
            [
                'status'=>'error',
                'description'=>'You need to be an admin to perform this action!'
            ]);
            die();
        }
    }

    public function validateUserApprovalFields() {
        if(!isset($_POST['userId'])
        || !isset($_POST['isApproved'])
        || ($_POST['isApproved'] != '0' && $_POST['isApproved'] != '1')) {
            echo json_encode(
            [
                'status'=>'error',
                'description'=>'You need to provide an id and a valid isApproved (0 or 1)!'
            ]);
            die();
        }
    }

    public function validateUserAlterStatusFields() {
        if(!isset($_POST['userId'])
        || !isset($_POST['isActive'])
        || ($_POST['isActive'] != '0' && $_POST['isActive'] != '1')) {
            echo json_encode(
            [
                'status'=>'error',
                'description'=>'You need to provide an valid userId and a valid isActive (0 or 1)!'
            ]);
            die();
        }
    }

    public function validateMoviePostData($postArr) {
        //category length check
        if(!isset($postArr["categoryIds"])) {
            echo json_encode(
                [
                    'status'=>'error',
                    'description'=>'You have to choose at least 1 category!'
                ]); 
            die();
        }

        //director length check
        if(!isset($postArr["directorIds"]) || (count($postArr["directorIds"]) > 1)) {
            echo json_encode(
                [
                    'status'=>'error',
                    'description'=>'You have to choose 1 director!'
                ]); 
            die();
        }

        //check movie actors, main actors
        if(!isset($postArr["actorIds"]) || !isset($postArr["mainActorIds"])) {
            echo json_encode(
                [
                    'status'=>'error',
                    'description'=>'You need to select at least 1 actor and 1 main actor'
                ]);
            die();
        }
        
        foreach($postArr["actorIds"] as $actorId) {
            if(in_array($actorId, $_POST["mainActorIds"])) {
                echo json_encode(
                    [
                        'status'=>'error',
                        'description'=>'Actors can not overlap with Main Actors!'
                    ]); 
                die();
            }
        }


    }

    public static function validateCategoryEditFields() {
        ValidatorHelpers::validateCategoryAddFields();
        ValidatorHelpers::validateCategoryDeleteFields();
    }

    public static function validateCategoryAddFields() {
        if(!isset($_POST['name']) || $_POST['name']==''
        || !isset($_POST['isActive']) || ($_POST['isActive']!='0' && $_POST['isActive']!='1')
        || !isset($_POST['description']) || $_POST['description']=='') {
            echo json_encode(
                [
                    'status'=>'failure',
                    'description'=>'You need to provide name, isActive(0 or 1) and description parameters'
                ]);

            die();
        }
    }

    public static function validateCategoryDeleteFields() {
        ValidatorHelpers::validatePostFields(['categoryId']);
    }

    public static function validateFestivalAddFields() {
        ValidatorHelpers::validatePostFields(['name', 'description', 'posterUrl']);
    }

    public static function validateFestivalEditFields() {
        ValidatorHelpers::validatePostFields(['festivalId', 'name', 'description', 'posterUrl']);
    }

    public static function validateFestivalDeleteFields() {
        ValidatorHelpers::validatePostFields(['festivalId']);
    }

    public static function validateParticipantAddFields() {
        ValidatorHelpers::validatePostFields(['name', 'role']);
        $nameArr = explode(" ", $_POST['name']);

        if(count($nameArr) < 2) {
            echo json_encode(
                [
                'status'=>'failure',
                'description'=>'You need to provide both a first and a last name!'
                ]);
            die();
        }
    }

    public static function validateParticipantEditFields() {
        ValidatorHelpers::validatePostFields(['participantId', 'name', 'role']);
        $nameArr = explode(" ", $_POST['name']);
        
        if(count($nameArr) < 2) {
            echo json_encode(
                [
                'status'=>'failure',
                'description'=>'You need to provide both a first and a last name!'
                ]);
            die();
        }
    }

    public static function validateParticipantDeleteFields() {
        ValidatorHelpers::validatePostFields(['participantId']);
    }

    public static function validateUserChangePasswordFields() {
        ValidatorHelpers::validatePostFields(['oldPassword', 'newPassword']);
    }

    public static function validateUserChangeDetailsFields() {
        ValidatorHelpers::validatePostFields(['firstName', 'lastName', 'email']);
    }

    public static function validateProjectionAddFields() {
        ValidatorHelpers::validatePostFields(['name', 'duration', 'location', 'date', 'movieId']);
    }

    public static function validateProjectionEditFields() {
        ValidatorHelpers::validatePostFields(['projectionId','name', 'duration', 'location', 'date', 'movieId']);
    }

    public static function validateProjectionDeleteFields() {
        ValidatorHelpers::validatePostFields(['projectionId']);
    }

    public static function validateProjectionParticipantAlterFields() {
        ValidatorHelpers::validatePostFields(['projectionId', 'participantId']);
    }

    public static function validatePostAddFields()
    {
        ValidatorHelpers::validatePostFields(['description']);
    }

    public static function validatePostEditFields()
    {
        ValidatorHelpers::validatePostFields(['postId', 'description']);
    }

    public static function validatePostRateFields()
    {
        ValidatorHelpers::validatePostFields(['postId', 'rating']);
    }

    public static function validatePostDeleteFields()
    {
        ValidatorHelpers::validatePostFields(['postId']);
    }

    public static function validateCommentAddFields()
    {
        ValidatorHelpers::validatePostFields(['content', 'postId']);
    }

    public static function validateCommentEditFields()
    {
        ValidatorHelpers::validatePostFields(['commentId', 'content']);
    }

    public static function validateCommentDeleteFields()
    {
        ValidatorHelpers::validatePostFields(['commentId']);
    }

    public static function validateShareAddFields()
    {
        ValidatorHelpers::validatePostFields(['movieId']);
    }

    public static function validateShareEditFields()
    {
        ValidatorHelpers::validatePostFields(['shareId', 'movieId']);
    }

    public static function validateShareRequestJoinFields()
    {
        ValidatorHelpers::validatePostFields(['shareId']);
    }

    public static function validateCommentAlterIsActiveFields()
    {
        ValidatorHelpers::validatePostFields(['commentId', 'isActive']);
        if($_POST['isActive'] != '0' && $_POST['isActive'] != '1') {
            echo json_encode(
            [
                'status'=>'error',
                'description'=>'You need to provide a valid isActive (0 or 1)!'
            ]);
            die();
        }

    }

    private static function validatePostFields($fields) {
        $invalidFields = [];
        foreach($fields as $field) {
            if(!isset($_POST[$field]) || !$_POST[$field]) {
                $invalidFields[] = $field;
            }
        }

        if(count($invalidFields)) {
            echo json_encode(
                [
                'status'=>'failure',
                'description'=>'You need to provide valid ' 
                . implode(', ', $invalidFields) 
                . (count($invalidFields) > 1 ? ' fields' : ' field')
                ]);
            die();
        }
    }
}
?>