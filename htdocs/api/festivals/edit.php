<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/FestivalHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    ValidatorHelpers::validateFestivalEditFields();
    
    FestivalHelpers::editFestival($_POST['id'], $_POST['name'], $_POST['description']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Festival edited successfully!'
        ]);
    
?>