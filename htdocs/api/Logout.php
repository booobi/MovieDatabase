<?php
	session_start();
	session_destroy();
	
	echo json_encode([ 'status' => 'success', 'description' => 'You have successfully logged out!']);
?>