<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Naujienos.php';
include_once 'controllers/Naujienos.php';
session_start();
include 'log.php';
logas($_SERVER['REQUEST_URI']);
if(!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[3]) {
    header("location: index.php");
    die();
}
if(!isset($_POST)) {
    header("location: naujienuSarasas.php");
    die();
}
$news = new Naujienos($_POST['pavadinimas'], $_POST['tekstas'], '', $_POST['publikavimo_data']);
$news->id = $_POST['id']*1;
if($news->id == 0){
    insertNaujienos($news);
}else{
    updateNaujienos($news);
}
header("location: naujienuSarasas.php");