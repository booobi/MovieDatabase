<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/FestivalHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    ValidatorHelpers::validateFestivalAddFields();
    
    FestivalHelpers::addFestival($_POST['name'], $_POST['description'], $_POST['posterUrl']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Festival added successfully!'
        ]);
    
?>