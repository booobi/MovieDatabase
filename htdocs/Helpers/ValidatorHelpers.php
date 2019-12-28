<?php
class ValidatorHelpers {
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
        if(!isset($_POST['id'])) {
            echo json_encode(
                [
                    'status'=>'failure',
                    'description'=>'You need to provide id parameter'
                ]);
            die();
        }
    }
}
?>