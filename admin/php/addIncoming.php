<?php 

require '../config.php';

$action = $_POST['action'];
$oicrd = $_POST['oicrd'];
$note = $_POST['note'];


//Store all checkbox selected to just one variable separated by comma
$actionsJoined = "";
foreach ($action as $a){
    $actionsJoined .= $a . ",";
}

$actiondesired = $_POST['actiondesired'];
$actionsDesiredJoined = "";
foreach ($actiondesired as $a){
    $actionsDesiredJoined .= $a . ",";
}

$sql = "INSERT INTO actionslip(action,actionDesired,oicrd,note) VALUES ('$actionsJoined','$actionsDesiredJoined','$oicrd','$note')";
if ($db->query($sql)) {

    header('Location: ../homepage.php');

}else{
    var_dump($db->error);
}