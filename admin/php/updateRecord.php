<?php

//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

require '../config.php';
session_start();

$data = $_POST['data'];
$recordID = $_POST['recordID'];


$sql = "SELECT unclaimID,receiveID FROM records WHERE recordID = '$recordID'";
$res = $db->query($sql);
$r = $res->fetch_row();
if(!$res){
	var_dump($db->error);
}  
$unclaimID = $r[0];
$receiveID = $r[1];

if($unclaimID){
	$dateInspected = $data['dateInspected'];
	$documentDate = $data['documentDate'];
	$inspector = $data['inspector'];
	$classification = $data['classification'];
	$subject = $data['subject'];
	$sql = "Update unclaim set dateInspected ='$dateInspected', documentDate='$documentDate',inspector='$inspector',classification='$classification',subject='$subject' where unclaimID = '$unclaimID'";
	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 	
}
$code = $data['code'];
$dateReceived = $data['dateReceived'];
$applicant = $data['applicant'];
$sender = $data['sender'];
$purpose = $data['purpose'];
$sql = "Update receive set code ='$code',dateReceived='$dateReceived', applicant='$applicant',sender='$sender',purpose='$purpose' where receiveID = '$receiveID'";
if(!$db->query($sql)){
	var_dump($db->error);
	die;
} 	
$receiver = $data['receiver'];
$dateReleased = $data['dateReleased'];
if($dateReleased){
	$sql = "Update records set receiver ='$receiver',releaseDate='$dateReleased' where recordID = '$recordID'";
	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 
}	
	$t = date('h:i:a');
    $d = date('Y:n:j');

    $userID = $_SESSION['currentUserID'];
    $act = "Updated record ".$code;
    $sqlT = "INSERT INTO logs(logDate, logTime, activity, userID, receiveID) 
    VALUES ('$d','$t','$act','$userID','$receiveID')";

    if(!$db->query($sqlT)){
        var_dump($db->error);
        die;
    }

die;