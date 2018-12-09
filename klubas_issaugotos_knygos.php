<!DOCTYPE html>
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

.blokas2 {
	margin:auto;
	width:200px;
	text-align:middle;
}

.mygtukas{
	border-radius:8px;
	background-color:Transparent;
	border-style:solid;
	border-color:black;
	font-family:Verdana,Geneva,sans-serif;
	font-weight: bold;
	cursor:pointer;
	margin-top:15px;
}
</style>
</head>
<body>    
<?php
    include_once 'log.php';
logas($_SERVER['REQUEST_URI']);
    include 'meniu.php';
?>
<h1>Išsaugotos knygos</h1>
<?php
   include 'models/Knyga.php';
   include 'controllers/Knyga.php';
   include 'models/Zanrai.php';
   include 'controllers/Zanrai.php';
   include 'models/Zanras.php';
   include 'controllers/Zanras.php';
   include 'models/Kaina.php';
   include 'controllers/Kaina.php';
   include 'controllers/Klubas_issaugotos_knygos.php';
   
   $results = selectIssaugotosKnygos($_SESSION["user"]->id);
   
   for($i = 0; $i < count($results); $i++){
	   $knyga = selectKnyga($results[$i]);
?>

<div class="blokas">
    <span class="container">
        <img src="<?php echo $knyga->paveikslelio_nuoroda;?>" alt="knygos" class="image" style="width:130px;height:200px;margin-left:25px;">
    </span>
    <span class="container">
        <div><?php echo $knyga->pavadinimas;?></div>
        <br>
        <div><?php echo $knyga->aprasymas;?></div>
    </span>
    <span class="container">
        <div>Išleidimo metai: <?php echo $knyga->isleidimo_metai;?></div>
        <div>Kalba: <?php echo $knyga->kalba;?></div>
        <div>Žanras:
             <?php 
                $zanrai = selectManyZanrai("fk_Knyga = ".$knyga->id); 
                for($j = 0; $j < count($zanrai); $j++) {
                    $zanras = selectZanras($zanrai[$j]->fk_zanras);
                    echo $zanras->pavadinimas;
                    echo " ";
                }
             ?>
        </div>
        <div>ISBN: <?php echo $knyga->ISBN_kodas;?></div>
        <div>Kaina: <?php
        echo latestKaina($knyga->id)->kaina.' €';
        ?></div>
    </span>
</div>
<?php
   }
   ?>
   
<div class="blokas2">
<form action="klubas_main.php"><input type="submit" value="Atgal" style="width:200px;height:60px;" class="mygtukas"></form>  
</div>

</body>
</html>
