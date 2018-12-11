<?php
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
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
        $array[] = ['Krepšelis', 'krepselis.php'];
        
        if($_SESSION['user']->getRoles()[0]){
            $array[] = ['Nustatymai', 'nustatymai.php'];
        }
        $array[] = ['Bonus klubas', 'klubas.php'];
        if($_SESSION['user']->getRoles()[3]){
            $array[] = ['Admin panelė', 'admin.php'];
        }
    }
    $array[] = ['Naujienos', 'naujienos.php'];
    $array[] = ['Knygų paieška', 'paieska.php'];
    $array[] = ['Knygos', 'knygos.php'];
  for ($i = 0; $i < count($array); $i++) {
      echo "<li style='float:right'><a href='" . $array[$i][1] . "'>" . $array[$i][0] . "</a></li>";
  }
  ?>
</ul>