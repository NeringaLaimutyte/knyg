<?php
include_once 'models/Vartotojas.php';
?>
<ul>
    <li ><a href="index.php">TIESIOG KNYGYNAS</a></li>
  <?php
    session_start();
    $array = [];
    $array[] = ['Atsijungti', 'logout.php'];
    $array[] = ['Logai', 'logs.php'];
    $array[] = ['Rašyti naujieną', 'adminNaujienos.php'];

  for ($i = 0; $i < count($array); $i++) {
      echo "<li style='float:right'><a href='" . $array[$i][1] . "'>" . $array[$i][0] . "</a></li>";
  }
  ?>
  
  
  
</ul>