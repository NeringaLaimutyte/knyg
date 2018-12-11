<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
include 'log.php';
logas($_SERVER['REQUEST_URI']);
session_start();
if(!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[3]) {
    header("location: index.php");
    die();
}
if(!isset($_GET['id']) || $_GET['id'] == 0){
    die();
}
$user = selectVartotojas($_GET['id']);
if($user == NULL){
    die();
}
$_GET['role'] *= 1;
$user->role *= 1;
if($user->getRoles()[$_GET['role']]){
    $user->role -= pow(2, $_GET['role']);
}else{
    $user->role += pow(2, $_GET['role']);
}
updateVartotojas($user);