<?php 

//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

require '../config.php';
session_start();

$recordID = $_POST['recordID'];

if(!$datereleased = $_POST['datereleased']){
	include 'uploadFile.php';
	
	$sql = "Update records set scanFile ='$filename' where recordID = '$recordID'";

	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 	
}else{
	$receiver = strtoupper($_POST['receiver']);

	$sql = "Update records set status = 'release', releaseDate = '$datereleased',receiver='$receiver' where recordID = '$recordID'";

	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 	
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
    $act = "Released record ".$code;
    $sqlT = "INSERT INTO logs(logDate, logTime, activity, userID, receiveID) 
    VALUES ('$d','$t','$act','$userID','$receiveID')";

    if(!$db->query($sqlT)){
        var_dump($db->error);
        die;
    }

header('Location: ../release.php#success');

