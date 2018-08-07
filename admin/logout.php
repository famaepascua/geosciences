<?php

//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

 require("config.php");
session_start();
$logID = $_SESSION['userlogID'];

 if($logID){
  $sql = "Update userlogs set timeOut = NOW() where userlogID = '$logID' ";

  if(!$db->query($sql)){
    var_dump($db->error);
    die;
  }
  $userlogID = $db->insert_id;
}
session_destroy();
header('Location:../index.php');