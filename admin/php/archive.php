<?php 

require '../config.php';

$recordID = $_POST['recordID'];


	$sql = "Update records set status ='archived' where recordID = '$recordID'";

	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 	

header('Location: ../records.php');
