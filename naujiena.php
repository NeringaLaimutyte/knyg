<?php
include_once 'log.php';
include_once 'configuration/config.php';
include_once 'models/Naujienos.php';
include_once 'controllers/Naujienos.php';
$naujiena = selectNaujienos(1);
echo $naujiena->pavadinimas;