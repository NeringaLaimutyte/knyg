<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Knyga.php';
include_once 'controllers/Knyga.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
include_once 'controllers/Knygu_sandelyje.php';
include_once 'controllers/Uzsakymas.php';
include_once 'models/Uzsakymas.php';
include 'log.php';
logas($_SERVER['REQUEST_URI']);
//session_start();
if (!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[2]) {
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
            <form action="uzsakymas.php" method="post">
                <table style="margin-left:auto; margin-right:auto;">
                    <tr>
                        <th>Pasirinkti</th><th>Pavadinimas</th><th>Esamas kiekis</th><th>Užsakomas kiekis</th>
                    </tr>
                    <?php
                    $books = selectManyKnyga();
                    $sandeliai = selectManyKnyguSandelyje();
                    for ($i = 0; $i < count($books); $i++) {
                        echo "<tr><td><input type='checkbox' name='bo[]' value='$i'></td>";
                        echo "<td>" . $books[$i]->pavadinimas . "</td><td>" . selectAmountKnyguSandelyje($books[$i]->id) . "</td>"
                        . "<td><input name='kiekis' placeholder='kiekis'></td>";
                        ;
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
    for ($j = 0; $j < count($sandeliai); $j++) {
        if (in_array($j, $_POST['bo'])) {
            $uzs = new Uzsakymas($_POST['kiekis'], $books[$j], 1);
            insertUzsakymas($uzs);
        }
    }
    header("location: uzsakymas.php");
}
?>
