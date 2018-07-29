<?php 

require '../config.php';
require 'uploadFile.php';
session_start();

$recordID = $_POST['recordID'];

if($filename){
$sql = "Update records set scanFile ='$filename' where recordID = '$recordID'";

if(!$db->query($sql)){
  var_dump($db->error);
  die;
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
    $act = "Uploaded scanned file to record ".$code;
    $sqlT = "INSERT INTO logs(logDate, logTime, activity, userID, receiveID) 
    VALUES ('$d','$t','$act','$userID','$receiveID')";

    if(!$db->query($sqlT)){
        var_dump($db->error);
        die;
    }
  
}

    header('Location: ../records.php#success');
