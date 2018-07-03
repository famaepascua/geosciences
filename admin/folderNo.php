<?php

require 'config.php';

$barangay = $_GET['barangay'];

$sql = "SELECT folderNumber FROM barangay WHERE name = '$barangay'";
$res = $db->query($sql);
$r = $res->fetch_row();
echo json_encode($r);