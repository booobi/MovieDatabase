<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/FestivalHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    ValidatorHelpers::validateFestivalDeleteFields();
    
    FestivalHelpers::deleteFestival($_POST['id']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Festival deleted successfully!'
        ]);
    
?>