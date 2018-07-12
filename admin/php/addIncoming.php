<?php 

require '../config.php';
session_start();

//This are the variables for table actionSlip

$oicrd = $_POST['oicrd'];
$note = $_POST['note'];


//Store all checkbox selected to just one variable separated by comma
$actionsJoined = "";
if(isset($_POST['action'])){
    $action = $_POST['action'];
    foreach ($action as $a){
        $actionsJoined .= $a . "<br>";
    }    
}


$actionsDesiredJoined = "";
if(isset($_POST['actiondesired'])){
    $actiondesired = $_POST['actiondesired'];
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


    // Locations

    $barangayList = "";
    if(isset($_POST['barangay'])){
        $barangayID = array_map('intval', $_POST['barangay']);
        $barangayList = implode("''", $barangayID);
    }

    $location=[];
    //For locations of other municipality/barangay

    foreach ($barangayID as $key => $value) {
        if(isset($barangayID[$key])){
            if($barangayID[$key] == '54' || $barangayID[$key] == '56'){
                $bgyName = $_POST['brgyname'][$key];
                $folder = $_POST['folder'];
                $sql = "INSERT INTO barangay(name,folderNumber) VALUES('$bgyName','$folder')";

                if(!$db->query($sql)){
                    var_dump($db->error);
                }  
                 //get barangay ID
                $bID = $db->insert_id;

                //insert into location
                $municipalityTemp = $_POST['municipality'][$key];
                $provinceTemp = $_POST['province'][$key];

                $sql = "INSERT INTO location(municipality,province,barangayID) VALUES('$municipalityTemp','$provinceTemp','$bID') ";

                if(!$db->query($sql)){
                    var_dump($db->error);
                    die;
                }
                $location[] = $db->insert_id; 
                unset($barangayID[$key]);
              
            }

        }
    }

    if($barangayList){
       $sql = "SELECT locationID FROM location WHERE barangayID IN ('$barangayList')";
       $res = $db->query($sql);
       $r = $res->fetch_all();
       if(!$res){
        var_dump($db->error);
       }  
        //Get the location ID's from the query above
       foreach ($r as $loc) {
            $location[] = intval($loc[0]); 
       }
    }

    $sql = "INSERT INTO receive(code, dateReceived, applicant, sender, purpose, actionslipID) 
    VALUES('$code','$dateReceived','$applicant','$sender','$purpose','$actionSlipID') ";

    if(!$db->query($sql)){
        var_dump($db->error . " " . $locationID);

    }  
    $receiveID = $db->insert_id;

    foreach ($location as $value) {
        $sql = "INSERT INTO receivelocations(receiveID, locationID) VALUES('$receiveID','$value')";
        if(!$db->query($sql)){
            var_dump($db->error . " " . $locationID);
        }  
    }

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