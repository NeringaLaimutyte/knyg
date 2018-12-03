<?php
include_once 'log.php';
session_start();
unset($_SESSION['user']);
header("Location: index.php");