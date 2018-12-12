<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
<style>

</style>
</head>
<body>    
<?php
    include_once 'log.php';
    include 'meniu.php';
?>
<div align=center>
   <h3>Knygos paieška</h3>
</div>
<?php
   include_once 'models/Knyga.php';
   include_once 'controllers/Knyga.php';
   include_once 'models/Zanras.php';
   include_once 'controllers/Zanras.php';
   $zanrai = selectManyZanras();
   ?>
    
<div align= center>
<form action="rasti.php" method="post">
    Žanrai <br />
    <?php
   for($i = 0; $i < count($zanrai); $i++){
?>
<label><?php echo $zanrai[$i]->pavadinimas;?>
  <input type="checkbox" name="zanras[]" value="<?php echo $zanrai[$i]->id?>" >
</label>
<br>
<?php
   }
?>
<br>
Kaina nuo:<input type="number" name="nuo" value="" ><br>
Kaina iki: <input type="number" name="iki" value=""><br>
<input type="submit" name="submit" value="Ieškoti"/>


</form>
</div>

</body>
</html>
