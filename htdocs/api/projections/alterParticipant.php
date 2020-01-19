<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateProjectionParticipantAlterFields();

    MovieProjectionHelpers::alterParticipantStatus($_POST['projectionId'], $_POST['participantId'], $_POST['status']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Participant status altered successfully!'
        ]);
    
?>