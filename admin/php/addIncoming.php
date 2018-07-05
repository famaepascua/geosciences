<?php 

require '../config.php';


//This are the variables for table actionSlip
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
    //Get the ID inserted to table actionslip
    $actionSlipID = mysqli_insert_id($db);

    //If insert to actionSlip is success we will insert to receive table
    //Variables for receive table
    $code = $_POST['code'];
    $dateReceived = $_POST['date'];
    $applicant = $_POST['applicant'];
    $sender = $_POST['sender'];
    $purpose = $_POST['purpose'];
    $barangayID = $_POST['barangay'];
    $sql = "SELECT locationID FROM location WHERE barangayID = '$barangayID'";
    $res = $db->query($sql);
    $r = $res->fetch_row();
    if(!$res){
        var_dump($db->error);
    }
    //Get the location ID from the query above
    $locationID = $r[0];

    $sql = "INSERT INTO receive(code, dateReceived, applicant, sender, purpose, locationID, actionslipID) 
              VALUES('$code','$dateReceived','$applicant','$sender','$purpose','$locationID','$actionSlipID') ";

    if(!$db->query($sql)){
        var_dump($db->error);
    }

    header('Location: ../homepage.php');



}else{
    var_dump($db->error);
}