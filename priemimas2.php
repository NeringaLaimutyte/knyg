<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Knyga.php';
include_once 'controllers/Knyga.php';
include_once 'models/Sandelis.php';
include_once 'controllers/Sandelis.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
include_once 'controllers/Knygu_sandelyje.php';
include_once 'controllers/Uzsakymas.php';
include_once 'models/Uzsakymas.php';
include 'log.php';
logas($_SERVER['REQUEST_URI']);
session_start();
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
            <h3>Priėmimas:</h3>
            <form method="post">
                <table style="margin-left:auto; margin-right:auto;">
                    <tr>
                        <th>Pasirinkti</th><th>Nr.</th><th>Pavadinimas</th><th>ISBN kodas</th><th>Kiekis</th><th>Veiksmas</th>
                    </tr>
                    <?php
                    $order=$_SESSION['order'];
                    $books = selectManyKnyga();
                    $orders = selectUzsakymas($order);
                        echo "<tr><tr><td><input type='checkbox' name='bo[]' value='$i'></td>"
                        . "<td>" . $orders->id . "</td>"
                        . "<td>" . selectKnyga($orders->fk_Knyga)->pavadinimas . "</td>"
                        . "<td>" . selectKnyga($orders->fk_Knyga)->ISBN_kodas . "</td>"
                        . "<td>" . $orders->kiekis . "</td>"
                                . "<td><a href='#'>Keisti</a></td>";
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
            $kiekis = $sandeliai[$j]->kiekis;
            $kiekis = $kiekis - 1;
            $obj = new Knygu_sandelyje($kiekis, $sandeliai[$j]->fk_Sandelis, $sandeliai[$j]->fk_Knyga);
            updateKnyguSandelyje($obj);
        }
    }
    header("location: priemimas2.php");
}
?>
