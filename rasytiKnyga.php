<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Knyga.php';
include_once 'controllers/Knyga.php';
include_once 'models/Zanrai.php';
include_once 'controllers/Zanrai.php';
include_once 'models/Zanras.php';
include_once 'controllers/Zanras.php';
include_once 'models/Autoriai.php';
include_once 'controllers/Autoriai.php';
include_once 'models/Autorius.php';
include_once 'controllers/Autorius.php';
include_once 'models/Kaina.php';
include_once 'controllers/Kaina.php';
session_start();
include 'log.php';
logas($_SERVER['REQUEST_URI']);
if(!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[3]) {
    header("location: index.php");
    die();
}
if(!isset($_POST)) {
    header("location: knyguSarasas.php");
    die();
}
$book = new Knyga($_POST['pavadinimas'], $_POST['metai'], $_POST['kalba'], $_POST['url'], $_POST['tekstas'],
    $_POST['psl'], $_POST['ISBN'], $_POST['virselis']);
$book->id = $_POST['id']*1;
if($book->id == 0){
    insertKnyga($book);
    $book->id = mysqli_insert_id($mysqli);
    updateKnygosZanrai($book->id, $_POST['zanrai']);
    updateKnygosAutoriai($book->id, $_POST['autoriai']);
    $price = new Kaina($_POST['kaina'], '', $_POST['nuo'], $_POST['iki'], $book->id);
    insertKaina($price);
}else{
    updateKnyga($book);
    updateKnygosZanrai($book->id, $_POST['zanrai']);
    updateKnygosAutoriai($book->id, $_POST['autoriai']);
    $price = new Kaina($_POST['kaina'], '', $_POST['nuo'], $_POST['iki'], $book->id);
    insertKaina($price);
}
header("location: knyguSarasas.php");