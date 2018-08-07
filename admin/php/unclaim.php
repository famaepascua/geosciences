<?php 

//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

require '../config.php';
session_start();

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
$sql = "SELECT records.receiveID,code FROM `records` INNER JOIN receive on receive.receiveID = records.receiveID where records.recordID = '$recordID'";
       $res = $db->query($sql);
       $r = $res->fetch_row();
       if(!$res){
        var_dump($db->error);
       }  
       $receiveID = $r[0];
       $code = $r[1];

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
    header('Location: ../unclaim.php#success');

