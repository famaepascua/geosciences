<?php

//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

//set upload folder
$target_dir = "../uploads/"; 
//get filename
$filename = $_FILES["scannedFile"]["name"];
$target_file = $target_dir . basename($filename);
//save file to upload folder
move_uploaded_file($_FILES["scannedFile"]["tmp_name"], $target_file);
