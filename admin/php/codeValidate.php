<?php

require '../config.php';

$code = $_GET['code'];

$sql = "SELECT code FROM receive WHERE code = '$code'";
$res = $db->query($sql);

if(mysqli_num_rows($res) > 0){
	echo json_encode('False');
}else{
	echo json_encode('True');
}
