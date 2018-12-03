﻿<?php
include_once 'models/Vartotojas.php';
?>
<ul>
    <li ><a href="index.php">TIESIOG KNYGYNAS</a></li>
  <?php
    session_start();
    $array = [];
    if(!isset($_SESSION['user'])) {
        $array[] = ['Prisijungti', 'login.php'];
        $array[] = ['Registruotis', 'register.php'];
    }else{
        $array[] = ['Atsijungti', 'logout.php'];
        if($_SESSION['user']->getRoles()[0]){
            $array[] = [$_SESSION['user']->vardas, '#'];
        }
        if($_SESSION['user']->getRoles()[3]){
            $array[] = ['Admin panelė', 'admin.php'];
        }
    }
    $array[] = ['Naujienos', '#'];
    $array[] = ['Knygų paieška', '#'];
    $array[] = ['Knygos', 'knygos.php'];

  for ($i = 0; $i < count($array); $i++) {
      echo "<li style='float:right'><a href='" . $array[$i][1] . "'>" . $array[$i][0] . "</a></li>";
  }
  ?>
  
  
  
</ul>