<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
</head>
<?php
   include_once 'models/Knyga.php';
   include_once 'controllers/Knyga.php';
   include_once 'models/Zanras.php';
   include_once 'controllers/Zanras.php';
   include_once 'log.php';
   include 'meniu.php';
?>
<body> 
    <h1>Rastos knygos</h1>
</body>
<?php
if(isset($_POST['submit'])){
    echo "nuo:".$_POST['nuo']."<br>";
    echo "iki:".$_POST['iki'];
    if(!empty($_POST['zanras'])){
        
        foreach($_POST['zanras'] as $selected){
            echo "<br>".$selected;
        }
    }
}
?>
