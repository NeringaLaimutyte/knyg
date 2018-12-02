<ul>
  <?php 
    $array[] = ['Prisijungti', 'login.php'];
    $array[] = ['Registruotis', 'register.php'];
    for($i = 0; $i < count($array); $i++){
        echo "<li style='float:right'><a href='".$array[$i][1]."'>".$array[$i][0]."</a></li>";
    }
  ?>
  
  
  
</ul>