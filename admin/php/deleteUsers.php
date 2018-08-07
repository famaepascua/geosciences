<?php 

//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

require '../config.php';
session_start();


$users = implode("','",$_POST['users']);
$sql = "SELECT username FROM users WHERE userID IN ('$users')";
$res = $db->query($sql);
$r = $res->fetch_all();
if(!$res){
	var_dump($db->error);
} 
$usersList = []; 
foreach($r as $list){
	$usersList[] = $list[0];
}
$userList = implode(',', $usersList);

$sql = "Delete from users where userID in ('$users')  ";

if(!$db->query($sql)){
	var_dump($db->error);
	die;
}


$t = date('h:i:a');
$d = date('Y:n:j');

$userID = $_SESSION['currentUserID'];
$act = "Deleted user/s ".$userList;
$sqlT = "INSERT INTO logs(logDate, logTime, activity, userID) 
VALUES ('$d','$t','$act','$userID')";

if(!$db->query($sqlT)){
	var_dump($db->error);
	die;
}

