<?php
/**
 * Created by PhpStorm.
 * User: yanzk
 * Date: 01/07/2018
 * Time: 8:32 PM
 */


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'tekweb');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


$sql = "SELECT * FROM users WHERE idnumber = '2' AND password='admin'";


if($db->query($sql) ->num_rows > 0){
    echo "Yeah";
}else{
    echo "Awwe";
}