<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CategoryHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';

    ValidatorHelpers::validateCategoryEditFields();
    
    CategoryHelpers::editCategory($_POST['id'], $_POST['name'], $_POST['description'], $_POST['isActive']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Category edited successfully!'
        ]);
    
?>