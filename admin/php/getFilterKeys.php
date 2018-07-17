<?php 
require '../config.php';
 
$key = $_POST['key'];
$location = [];

if($key == 'barangay'){
	$sql = "SELECT name FROM barangay group by 1";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }  
}else if($key == 'classification'){
	$sql = "SELECT classification FROM unclaim group by 1";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }  
}else if($key == 'code'){
	$sql = "SELECT code FROM receive group by 1";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }
}else if($key == 'folderNum'){
	$sql = "SELECT folderNumber FROM barangay group by 1";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }
}else if($key == 'municipality'){
		$sql = "SELECT  municipality FROM location group by 1";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }
}else{
	$sql = "SELECT  province FROM location group by 1";
        $res = $db->query($sql);
        $location = $res->fetch_all();
        if(!$res){
            var_dump($db->error);
        }
}

echo json_encode($location);

