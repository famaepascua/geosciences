<?php

require 'config.php';

$barangay = $_GET['barangay'];

$sql = "SELECT municipality,province FROM barangay inner join location on location.barangayID = barangay.barangayID WHERE barangay.barangayID = '$barangay'";
$res = $db->query($sql);
if(mysqli_num_rows($res) < 1){
	$r = false;
}else{
	$r = $res->fetch_row();
}
echo json_encode($r);