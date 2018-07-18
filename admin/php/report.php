<?php 
require '../config.php';

$key = $_POST['key'];
$value = $_POST['value'];
$location = [];

if($key == 'barangay'){
    $where = "AND name = '$value'"; 
}else if ($key == 'dateInsp'){
    $where = "AND dateInspected = '$value'"; 
}else if ($key == 'dateRec'){
    $where = "AND dateReceived = '$value'"; 
}else if ($key == 'dateRel'){
    $where = "AND dateReleased = '$value'"; 
}else if ($key == 'docDate'){
    $where = "AND documentDate = '$value'"; 
}else if ($key == 'folderNum'){
    $where = "AND folderNumber = '$value'"; 
}else if ($key == 'municipality'){
    $where = "AND municipality = '$value'"; 
}else if ($key == 'province'){
    $where = "AND province = '$value'"; 
}else if($key =='classification'){
    $where = "AND classification = '$value'"; 
}

$sql = "SELECT code,folderNumber,applicant,sender,GROUP_CONCAT(CONCAT(barangay.name,',',municipality,',',province)SEPARATOR '<br>') as location FROM receive INNER JOIN receivelocations on receive.receiveID = receivelocations.receiveID INNER JOIN location on receivelocations.locationID = location.locationID INNER JOIN barangay ON barangay.barangayID = location.barangayID inner JOIN records on records.receiveID = receive.receiveID inner join actionslip on actionslip.actionslipID = receive.actionslipID left join unclaim on unclaim.unclaimID = records.unclaimID WHERE archive = '0' ".$where." GROUP BY records.recordID ";


$res = $db->query($sql);
if(!$res){
    var_dump($db->error);
    die;
}  
$location = $res->fetch_all();



echo json_encode($location);

