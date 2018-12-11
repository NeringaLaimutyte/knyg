<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Knyga.php';
include_once 'controllers/Knyga.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
include_once 'controllers/Knygu_sandelyje.php';
include_once 'controllers/Kaina.php';
include_once 'models/Kaina.php';
include 'log.php';
logas($_SERVER['REQUEST_URI']);
//session_start();
if(!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[2]) {
    header("location: index_sandelis.php");
    die();
}//*/
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include 'meniu_sandelis.php';
?>
<div style="text-align: center">
    <h3>Knygos:</h3>
    <table style="margin-left:auto; margin-right:auto;">
        <tr>
            <th>Pavadinimas</th><th>Kiekis</th>
        </tr>
        <?php
        $books = selectManyKnyga();
        for($i = 0; $i < count($books); $i++){
            echo "<tr><td>".$books[$i]->pavadinimas."</td><td>".selectAmountKnyguSandelyje($books[$i]->id)."</td>";
        }
        ?>
    </table>
</div>
<script>
    document.getElementById('naujas').addEventListener('click', (e)=>{
        window.location = 'knyga.php?id=0';
    });
</script>
</body>
</html>
