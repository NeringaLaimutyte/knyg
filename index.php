<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    //if url = /, go to index.php
    include_once 'log.php';
logas($_SERVER['REQUEST_URI']);
    include 'meniu.php';
?>
<h1>Sveiki atvykę į</h1>
<h1>TIESIOG KNYGYNAS</h1>
<span class="container">
    <img src="images/knygos.jpg" alt="knygos" class="image" />
    <div class="middle">
      <a href="knygos.php" class="button">Knygos</a>
    </div>
  </span>
  <span class="container">
    <img src="images/naujienos.jpg" alt="naujienos" class="image" />
    <div class="middle">
      <a href="naujienos.php" class="button">Naujienos</a>
    </div>
  </span>
  <span class="container">
    <img src="images/ieškotiknygos.jpg" alt="ieškotiknygos" class="image" />
    <div class="middle">
      <a href="paieska.php" class="button">Ieškoti knygos</a>
    </div>
  </span>
</body>
</html>
