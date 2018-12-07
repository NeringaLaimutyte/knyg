<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Naujienos.php';
include_once 'controllers/Naujienos.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
include 'log.php';
logas($_SERVER['REQUEST_URI']);
session_start();
if(!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[3]) {
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include 'adminMenu.php';
?>
<div style="text-align: center">
    <h3>Naujienos:</h3>
    <button class="submit" id="naujas">Rašyti Naujieną</button><br /><br />
    <table style="margin-left:auto; margin-right:auto;">
        <tr>
            <th>Pavadinimas</th><th>Rašymo data</th><th>Publikavimo data</th><th>Veiksmas</th>
        </tr>
        <?php
        $news = selectManyNaujienos();
        for($i = 0; $i < count($news); $i++){
            echo "<tr><td>".$news[$i]->pavadinimas."</td><td>".$news[$i]->parasymo_data."</td><td>".$news[$i]->publikavimo_data."</td>
<td><a href='naujiena.php?id=".$news[$i]->id."'>Keisti</a><!--<br />
<a href='aktyvuoti.php?id=".$users[$i]->id."'>".$aktyvuoti."</a>--></td></tr>";
        }
        ?>
    </table>
</div>
<script>
    document.getElementById('naujas').addEventListener('click', (e)=>{
        window.location = 'naujiena.php?id=0';
    });
</script>
</body>
</html>

