<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
<style>
.blokas {
    margin-top:30px;
    margin-right: 200px;
    margin-left: 200px;
}
.blokas:nth-of-type(1) {
    margin-top: 0px;
}
</style>
</head>
<body>    
<?php
    include_once 'log.php';
    include 'meniu.php';
?>
<h1>Naujienos</h1>
<?php
   include 'models/Naujienos.php';
   include 'controllers/Naujienos.php';
   $naujienos = selectManyNaujienos("publikavimo_data < NOW() ORDER BY publikavimo_data  DESC");
   
   for($i = 0; $i < count($naujienos); $i++){
?>

    <div class="blokas">
        <h3><?php echo $naujienos[$i]->pavadinimas;?></h3>
        <br>
        <div><?php echo $naujienos[$i]->publikavimo_data;?></div>
        <div><?php echo $naujienos[$i]->tekstas;?></div>
   </div>
<?php
   }
?>


</body>
</html>
