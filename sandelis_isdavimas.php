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
    <h3>Išdavimas:</h3>
    <form action="sandelis_isdavimas.php" method="post">
    <table style="margin-left:auto; margin-right:auto;">
        <tr>
            <th>Pasirinkti</th><th>Pavadinimas</th><th>Kiekis</th>
        </tr>
        <?php
        $books = selectManyKnyga();
        $sandeliai= selectManyKnyguSandelyje();
        for($i = 0; $i < count($sandeliai); $i++){
            echo "<tr><td><input type='checkbox' name='bo[]' value='$i'></td>";
            echo "<td>".selectKnyga($sandeliai[$i]->fk_Knyga)->pavadinimas."</td><td>".$sandeliai[$i]->kiekis."</td><td><a href='keistiKieki.php?id=" . $sandeliai[$i]->id . "'>Keisti</a></td>";
            }
        ?>
    </table>
    <input type='submit'>
    </form>
</div>
</body>
</html>
<?php
if ($_POST != null) {
    for($j=0;$j<count($sandeliai);$j++){
        if (in_array($j, $_POST['bo'])) {
            $kiekis= $sandeliai[$j]->kiekis;
            $kiekis=$kiekis-1;
            $obj=new Knygu_sandelyje($kiekis,$sandeliai[$j]->fk_Sandelis, $sandeliai[$j]->fk_Knyga);
            updateKnyguSandelyje($obj);          
        } 
    }
    header("location: sandelis_isdavimas.php");
}
?>
