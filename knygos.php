﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
<style>
.container {
    display: inline-block;
    position: relative;
    width: 33%;
}
.blokas {
    border-bottom: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    margin-top:0px;
    margin-right: 200px;
    margin-left: 200px;
}
.blokas:nth-of-type(1) {
    border-top: 1px solid black;
    margin-top: 10px;
}
</style>
</head>
<body>    
<?php
   include 'meniu.php';
?>
<h1>Knygos</h1>
<?php
   include 'models/Knyga.php';
   include 'controllers/Knyga.php';
   include 'models/Zanrai.php';
   include 'controllers/Zanrai.php';
   include 'models/Zanras.php';
   include 'controllers/Zanras.php';
   $knygos = selectManyKnyga();
   
   for($i = 0; $i < count($knygos); $i++){
?>

<div class="blokas">
    <span class="container">
        <img src="<?php echo $knygos[$i]->paveikslelio_nuoroda;?>" alt="knygos" class="image" style="width:130px;height:200px;margin-left:25px;">
    </span>
    <span class="container">
        <div><?php echo $knygos[$i]->pavadinimas;?></div>
        <div><?php echo $knygos[$i]->aprasymas;?></div>
    </span>
    <span >
    <span class="container">
        <div>Išleidimo metai: <?php echo $knygos[$i]->isleidimo_metai;?></div>
        <div>Kalba: <?php echo $knygos[$i]->kalba;?></div>
        <div>Žanras:
             <?php 
                $zanrai = selectManyZanrai(/*"WHERE fk_Knyga = $knygos[$i]->id"*/); 
                for($j = 0; $j < count($zanrai); $j++) {
                    $zanras = selectZanras($zanrai[$j]->fk_zanras);
                    echo $zanras->pavadinimas;
                    echo " ";
                }
             ?>
        </div>
        <div>ISBN: <?php echo $knygos[$i]->ISBN_kodas;?></div>
        <div>Kaina: </div>
    </span>
</div>
<?php
   }
   ?>


</body>
</html>
