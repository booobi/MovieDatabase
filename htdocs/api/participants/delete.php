<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    ValidatorHelpers::validateParticipantDeleteFields();

    ParticipantHelpers::deleteParticipant($_POST['participantId']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Participant deleted successfully!'
        ]);
    
?>