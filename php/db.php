<?php
date_default_timezone_set('Asia/Manila');
$conn = new mysqli("localhost","root","","geosciences");

if(!$conn){
    echo "Database Error" . $conn->error;
}