<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
mysqli_set_charset($mysqli,"utf8");
session_start();
$id = 0;
if(isset($_SESSION['user'])){
    $id = $_SESSION['user']->id;
}
if(!isset($_SERVER['HTTP_REFERER'])){
    $_SERVER['HTTP_REFERER']='';
}
$log = new Logas(0, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_REFERER'], 0, $id);
insertLogas($log);
