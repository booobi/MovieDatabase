<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';

    $res = NULL;
    if(isset($_GET['id'])) {
        $res = ParticipantHelpers::getParticipant($_GET['id']);
    } else {
        $res = ParticipantHelpers::getParticipants();
    }
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>