<?php

require '../config.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$usertype = $_POST['usertype'];
$username = $_POST['username'];

$password = $_POST['password'];


$sql = "INSERT INTO users(username,password,firstName,lastName,userType)
        VALUES('$username','$password','$firstname','$lastname','$usertype')";

if($db->query($sql)){

    header('Location: ../users.php');

}else {
    $message = "Error! Contact Administrator!";

    echo "<script type='text/javascript'>
        
            alert('$message');
            window.location.replace('../users.php');
        </script>";
}