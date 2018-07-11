<?php 

require '../config.php';

$recordID = $_POST['recordID'];

if(!$datereleased = $_POST['datereleased']){
	include 'uploadFile.php';
	
	$sql = "Update records set scanFile ='$filename' where recordID = '$recordID'";

	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 	
}else{
	$receiver = $_POST['receiver'];

	$sql = "Update records set status = 'release', releaseDate = '$datereleased',receiver='$receiver' where recordID = '$recordID'";

	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 	
}

header('Location: ../release.php');

