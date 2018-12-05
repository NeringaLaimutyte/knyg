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
<div>Žanrai</div>
<br>
<?php
   include_once 'models/Knyga.php';
   include_once 'controllers/Knyga.php';
   include_once 'models/Zanras.php';
   include_once 'controllers/Zanras.php';
   $zanrai = selectManyZanras();
   
   for($i = 0; $i < count($zanrai); $i++){
?>

<form action="rasti.php" method="post">
<label><?php echo $zanrai[$i]->pavadinimas;?>
  <input type="checkbox" name="zanras[]" value=<?php echo $zanrai[$i]->pavadinimas; ?> >
</label>
<br>
<?php
   }
?>
<br>
Kaina nuo:<input type="number" name="nuo" value="0"><br>
Kaina iki: <input type="number" name="iki" value="0"><br>
<input type="submit" name="submit" value="Ieškoti"/>


</form>


</body>
</html>
