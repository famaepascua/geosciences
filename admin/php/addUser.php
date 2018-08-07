<?php 

//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

require '../config.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$usertype = $_POST['usertype'];
$username = $_POST['username'];
$password = $_POST['password'];


$sql = "INSERT INTO users(username,password,firstName,lastName,userType)
        VALUES('$username','$password','$firstname','$lastname','$usertype')";

if($db->query($sql)){

    header('Location: ../users.php');

}
	$t = date('h:i:a');
    $d = date('Y:n:j');

    $userID = $_SESSION['currentUserID'];
    $adduserID = $db-> insert_id;
    $act = "Added new user";
    $sqlT = "INSERT INTO logs(logDate, logTime, activity, userID, addUserID) 
    VALUES ('$d','$t','$act','$userID','$adduserID')";

    if(!$db->query($sqlT)){
        var_dump($db->error);
        die;
    }