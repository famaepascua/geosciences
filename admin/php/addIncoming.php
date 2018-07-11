<?php 

require '../config.php';
session_start();

//This are the variables for table actionSlip
$action = $_POST['action'];
$oicrd = $_POST['oicrd'];
$note = $_POST['note'];


//Store all checkbox selected to just one variable separated by comma
$actionsJoined = "";
if($action){
    foreach ($action as $a){
        $actionsJoined .= $a . "<br>";
    }    
}


$actiondesired = $_POST['actiondesired'];
$actionsDesiredJoined = "";
if($actiondesired){
    foreach ($actiondesired as $a){
        $actionsDesiredJoined .= $a . "<br>";
    }   
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

        $sql = "INSERT INTO barangay(name,folderNumber) VALUES('$barangayName','$folderNumber')";

        if(!$db->query($sql)){
            var_dump($db->error);
        }  
        //get barangay ID
        $barangayID = $db->insert_id;

        //insert into location
        $sql = "INSERT INTO location(municipality,province,barangayID) VALUES('$municipality','$province','$barangayID') ";

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
        var_dump($db->error . " " . $locationID);

    }  
    $receiveID = $db->insert_id;

    $sql = "INSERT INTO records(status,scanFile,receiveID) 
              VALUES('inspection','temp.pdf','$receiveID') ";


    $t = date('h:i:a');
    $d = date('Y:n:j');

    $userID = $_SESSION['currentUserID'];
    $act = "Added new record";
    $sqlT = "INSERT INTO logs(logDate, logTime, activity, userID, receiveID) 
            VALUES ('$d','$t','$act','$userID','$receiveID')";

    if(!$db->query($sqlT)){
        var_dump($db->error);
        die;
    }


    if(!$db->query($sql)){
        var_dump($db->error);
    }   
    $numberOfRows = mysqli_affected_rows($db);


    if($numberOfRows > 0){
        header('Location: ../homepage.php#success');
    }else{
        header('Location: ../homepage.php#failed');
    }





}else{
    var_dump($db->error);
}