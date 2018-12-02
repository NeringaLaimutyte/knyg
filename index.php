<!DOCTYPE html>
<html>
<head>
<style>
ul { 
    list-style-type: none;
    margin: 2pt;
    padding: 0;
    overflow: hidden;
    background-color: #90EE90;
    font-size:130%;
    font-family:'Times New Roman', Times, serif;
}

li {
    float: left;
}

li a {
    display: block;
    color: #696969;
    text-align: center;
    padding: 18px 16px;
    text-decoration: none;
    
}

li a:hover:not(.active) {
    color: white;
    background-color:MediumSeaGreen;;
}

.active {
    color: white;
    background-color: rgb(95, 194, 98);
}
.container {
    display: inline-block;
    position: relative;
    width: 33%;
}

.image {
  opacity: 1;
  display: inline-block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container .middle {
  opacity: 1;
}

.text {
  color: white;
  font-size: 50px;
  padding: 16px 32px;
}
.button {
    background-color: none;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 80px;
    margin: 4px 2px;
    cursor: pointer;
}
h1 {
    text-align: center;
    color: black;
}
</style>
</head>
<body>

<?php
    include 'meniu.php';
?>
<h1>Sveiki atvykę į</h1>
<h1>TIESIOG KNYGYNAS</h1>
<span class="container">
    <img src="images/knygos.jpg" alt="knygos" class="image" >
    <div class="middle">
      <a href="#" class="button">Knygos</a>
    </div>
  </span>
  <span class="container">
    <img src="images/naujienos.jpg" alt="naujienos" class="image" >
    <div class="middle">
      <a href="#" class="button">Naujienos</a>
    </div>
  </span>
  <span class="container">
    <img src="images/ieškotiknygos.jpg" alt="ieškotiknygos" class="image" >
    <div class="middle">
      <a href="#" class="button">Ieškoti knygos</a>
    </div>
  </span>
</body>
</html>
