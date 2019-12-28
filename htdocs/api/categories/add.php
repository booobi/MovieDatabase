<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CategoryHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';

    ValidatorHelpers::validateCategoryAddFields();
    
    CategoryHelpers::addCategory($_POST['name'], $_POST['description'], $_POST['isActive']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Category added successfully!'
        ]);
    
?>