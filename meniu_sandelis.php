<?php
include_once 'models/Vartotojas.php';
?>
<ul>
    <li ><a href="sandelisMeniu.php">TIESIOG KNYGYNAS</a></li>
  <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $array = [];
    $array[] = ['Atsijungti', 'logout.php'];
    $array[] = ['Ataskaitos', '#'];
    $array[] = ['Likučio peržiūra', 'sandelis_likutis.php'];
    $array[] = ['Inventorizacija', 'sandelis_inventorizacija.php'];
    $array[] = ['Užsakymas', '#'];
    $array[] = ['Priėmimas', 'priemimas.php'];
    $array[] = ['Išdavimas', 'sandelis_isdavimas.php'];

  for ($i = 0; $i < count($array); $i++) {
      echo "<li style='float:right'><a href='" . $array[$i][1] . "'>" . $array[$i][0] . "</a></li>";
  }
  ?>
</ul>
