<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    ValidatorHelpers::validateParticipantEditFields();

    $nameArr = explode(" ", $_POST['name']);
    $firstName = explode(" ", $_POST['name'])[0];
    $lastName = explode(" ", $_POST['name'])[1];
    ParticipantHelpers::editParticipant($_POST['participantId'], $firstName, $lastName, $_POST['role']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Participant edited successfully!'
        ]);
    
?>