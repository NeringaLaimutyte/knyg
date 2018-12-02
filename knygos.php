<!DOCTYPE html>
<html>
<head>
<style>
.container {
    display: inline-block;
    position: relative;
    width: 33%;
}
.blokas {
    border: 1px solid black;
    margin-top: 100px;
    margin-right: 200px;
    margin-left: 200px;
}
</style>
</head>
<body>
<?php
   include 'meniu.html';
?>
<h1>Knygos</h1>
<div class="blokas">
    <span class="container">
        <img src="images/knygos.jpg" alt="knygos" class="image" style="width:130px;height:200px;">
    </span>
    <span class="container">
        <div>Pavadinimas</div>
        <div>Aprašymas</div>
    </span>
    <span >
    <span class="container">
        <div>Išleidimo metai</div>
        <div>Kalba</div>
        <div>Žanras</div>
        <div>ISBN</div>
        <div>Kaina</div>
    </span>
</div>



</body>
</html>
