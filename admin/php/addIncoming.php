<?php 

require '../config.php';

$action = $_POST['action'];
$actiondesired = $_POST['actiondesired'];
$ar = [];
foreach ($action as $actionarray){
    array_push($ar,$actionarray);
}

$actiondesired = $_POST['actiondesired'];
$ad = [];
foreach ($actiondesired as $actiondes){
    array_push($ad,$actiondes);
}

$sql = "INSERT INTO actionslip(action,actionDesired,oicrd,note)
        VALUES('$action','$actiondesired','$oicrd','$note')";

if($db->query($sql)){

    header('Location: ../homepage.php');

}