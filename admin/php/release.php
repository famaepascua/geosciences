<?php 

require '../config.php';

$datereleased = $_POST['datereleased'];
$receiver = $_POST['receiver'];
$recordID = $_POST['recordID'];

$sql = "Update records set status = 'release', releaseDate = '$datereleased',receiver='$receiver' where recordID = '$recordID'";

if(!$db->query($sql)){
	var_dump($db->error);
} 

    header('Location: ../records.php');

