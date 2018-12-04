<?php
include_once 'log.php';
logas($_SERVER['REQUEST_URI']);
session_start();
unset($_SESSION['user']);
header("Location: index.php");