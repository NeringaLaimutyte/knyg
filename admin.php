<?php
include_once 'log.php';
logas($_SERVER['REQUEST_URI']);
include_once 'models/Vartotojas.php';
session_start();
if(!isset($_SESSION['user'])) {
    header("location: index.php");
}
if(!$_SESSION['user']->getRoles()[3]){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include 'adminMenu.php';
?>
<div style="text-align: center">
Labas
</div>
</body>
</html>

