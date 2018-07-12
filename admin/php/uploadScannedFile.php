<?php 

	require '../config.php';
	require 'uploadFile.php';

	$recordID = $_POST['recordID'];

	
	$sql = "Update records set scanFile ='$filename' where recordID = '$recordID'";

	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 	

    header('Location: ../records.php#success');
