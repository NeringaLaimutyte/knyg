<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
mysqli_set_charset($mysqli,"utf8");
session_start();
function logas($url){
    $id = 0;
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user']->id;
    }
    $log = new Logas(0, $_SERVER['REMOTE_ADDR'], parse_url($url, PHP_URL_PATH), 0, $id);
    insertLogas($log);
}
