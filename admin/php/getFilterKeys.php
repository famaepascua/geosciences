<?php 
require '../config.php';
 
$key = $_POST['key'];
$location = [];

if($key == 'barangay'){
	$sql = "SELECT name FROM barangay";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }  
}else if($key == 'classification'){
	$sql = "SELECT classification FROM unclaim";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }  
}else if($key == 'code'){
	$sql = "SELECT code FROM receive";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }
}else if($key == 'folderNum'){
	$sql = "SELECT folderNumber FROM barangay";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }
}else if($key == 'municipality'){
		$sql = "SELECT  municipality FROM location";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }
}else{
	$sql = "SELECT  province FROM location";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }
}

echo json_encode($location);

