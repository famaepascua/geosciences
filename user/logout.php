<?php
/**
 * Created by PhpStorm.
 * User: yanzky
 * Date: 08/07/2018
 * Time: 7:01 AM
 */

session_start();
session_destroy();
header('Location:../index.php');