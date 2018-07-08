<?php 

require '../config.php';
include 'uploadFile.php';



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

    //For other municipalities or other barangay
    if($barangayID != '54' && $barangayID != '56'){
        $sql = "SELECT locationID FROM location WHERE barangayID = '$barangayID'";
        $res = $db->query($sql);
        $r = $res->fetch_row();
        if(!$res){
            var_dump($db->error);
        }  
        //Get the location ID from the query above
        $locationID = $r[0];
    }else{
        //insert new barangay
        $barangayName = $_POST['brgyname'];
        $folderNumber = $_POST['folder'];
        $municipality = $_POST['municipality'];
        $province = $_POST['province'];

        $sql = "Insert Into barangay(name,folderNumber) VALUES('$barangayName','$folderNumber') ";

        if(!$db->query($sql)){
            var_dump($db->error);
        }  
        //get barangay ID
        $barangayID = $db->insert_id;

        //insert into location
        $sql = "Insert Into location(municipality,province,barangayID) VALUES('$municipality','$province','$barangayID') ";

        if(!$db->query($sql)){
            var_dump($db->error);
            die;
        } 
        //get the new location ID
        $locationID = $db->insert_id;

    }
    $sql = "INSERT INTO receive(code, dateReceived, applicant, sender, purpose, locationID, actionslipID) 
    VALUES('$code','$dateReceived','$applicant','$sender','$purpose','$locationID','$actionSlipID') ";

    if(!$db->query($sql)){
        var_dump($db->error);
    }  
    $receiveID = $db->insert_id;

}else{
    var_dump($db->error);
    die;
}
$dateInspected = $_POST['date'];
$documentDate = $_POST['docudate'];
$inspector = $_POST['inspector'];
$classification = $_POST['classification'];
$subject = $_POST['subject'];


$sql = "INSERT INTO unclaim(dateInspected,documentDate,inspector,classification,subject)
VALUES('$dateInspected','$documentDate','$inspector','$classification','$subject')";

if(!$db->query($sql)){
    var_dump($db->error);
    die;
} 

$unclaimID = $db->insert_id;
$datereleased = $_POST['drelease'];
$receiver = $_POST['receiver'];


$sql = "INSERT INTO records(status,scanFile,receiveID,receiver,releaseDate,unclaimID) 
VALUES('release','$filename','$receiveID','$receiver','$datereleased','$unclaimID') ";

if(!$db->query($sql)){
    var_dump($db->error);
    die;
}   


header('Location: ../records.php');