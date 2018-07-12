<?php 

require '../config.php';

$recordID = $_POST['recordID'];
$dateInspected = $_POST['date'];
$documentDate = $_POST['docudate'];
$inspector = $_POST['inspector'];
$classification = $_POST['classification'];
$subject = $_POST['subject'];


$sql = "INSERT INTO unclaim(dateInspected,documentDate,inspector,classification,subject)
VALUES('$dateInspected','$documentDate','$inspector','$classification','$subject')";

if(!$db->query($sql)){
	var_dump($db->error);
} 

$unclaimID = $db->insert_id;

$sql = "Update records set status = 'unclaim', unclaimID = '$unclaimID' where recordID = '$recordID'";

if(!$db->query($sql)){
	var_dump($db->error);
} 

    header('Location: ../unclaim.php#success');

