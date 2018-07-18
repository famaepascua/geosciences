<?php 

require '../config.php';
session_start();


$recordID = $_POST['recordID'];


	$sql = "Select unclaimID,receive.receiveID,code from records inner join receive on receive.receiveID = records.receiveID where records.recordID='$recordID'";

	if(!$db->query($sql)){
		var_dump($db->error);
		die;
	} 	
	 $res = $db->query($sql);
      $r = $res->fetch_row();

      $unclaimID = $r[0];
      $code = $r[2];
      if($unclaimID){
      	$sql = "Delete from unclaim where unclaimID='$unclaimID'";

		if(!$db->query($sql)){
			var_dump($db->error);
			die;
		} 	
      }
      $receiveID = $r[1];
      $sql = "Select recLocID from receivelocations where receiveID='$receiveID'";

		if(!$db->query($sql)){
			var_dump($db->error);
			die;
		} 	
	 $res = $db->query($sql);
     $recLocID = $res->fetch_all();
     $recLocations = [];
     foreach ($recLocID as $list) {
     	$recLocations[] = $list[0];
     }
     $recLocations = implode("','", $recLocations);
 	$sql = "Delete from receivelocations where recLocID in ('$recLocations')";

		if(!$db->query($sql)){
			var_dump($db->error);
			die;
		} 
 	
    $t = date('h:i:a');
    $d = date('Y:n:j');

    $userID = $_SESSION['currentUserID'];
    $act = "Deleted record ".$code;
    $sqlT = "INSERT INTO logs(logDate, logTime, activity, userID, receiveID) 
    VALUES ('$d','$t','$act','$userID','$receiveID')";

    if(!$db->query($sqlT)){
        var_dump($db->error);
        die;
    }
    

 	$sql = "Delete from receive where receiveID = '$receiveID'";

		if(!$db->query($sql)){
			var_dump($db->error);
			die;
		} 

 	$sql = "Delete from records where recordID = '$recordID'";

		if(!$db->query($sql)){
			var_dump($db->error);
			die;
		} 


        header('Location: ../records.php');
   


