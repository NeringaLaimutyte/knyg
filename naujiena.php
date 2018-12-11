<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Naujienos.php';
include_once 'controllers/Naujienos.php';
session_start();
include 'log.php';
logas($_SERVER['REQUEST_URI']);
if(!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[3]) {
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        input{
            height: 20px;
            width: 125px;
            margin-bottom: 5px;
        }
        .helper{
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
<?php
    include 'adminMenu.php';
    $news = selectNaujienos($_GET['id']*1);
    $button = 'Atnaujinti naujieną';
    if($news == null){
        $news = new Naujienos();
        $news->id = 0;
        $button = 'Rašyti naujieną';
    }
?>
<div style="text-align: center">
    <h2>Rašyti naujieną</h2>
    <form action="rasytiNaujiena.php" method="post" id="form">
        <span class="helper">Pavadinimas</span><input type="text" name="pavadinimas" value="<?php echo $news->pavadinimas; ?>"/></><br />
        <span class="helper">Publikuoti</span> <input type="date" name="publikavimo_data" value="<?php echo $news->publikavimo_data; ?>"/><br />
        <textarea cols="35" rows="5" name="tekstas" placeholder="Naujienos tekstas" usrform="form"><?php echo $news->tekstas; ?></textarea><br />
        <input type="hidden" name="id" value="<?php echo $news->id; ?>" />
        <input type="submit" value="<?php echo $button; ?>" />
    </form>
</div>
</body>
</html>

