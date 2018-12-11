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
include_once 'controllers/Kaina.php';
include_once 'models/Kaina.php';
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
            <h3>Likutis:</h3>
            <table style="margin-left:auto; margin-right:auto;">
                <tr>
                    <th>Pavadinimas</th><th>Sandėlis</th><th>Kiekis</th>
                </tr>
                <?php
                $books = selectManyKnyga();
                $sandeliai = selectManyKnyguSandelyje();
                $sand= selectManySandelis();
                for ($i = 0; $i < count($sandeliai); $i++) {
                    echo "<tr><td>" . selectKnyga($sandeliai[$i]->fk_Knyga)->pavadinimas . "</td>"
                            . "<td>" . selectSandelis($sandeliai[$i]->fk_Sandelis)->pavadinimas . "</td>"
                            . "<td>" . $sandeliai[$i]->kiekis . "</td>";
                }
                ?>
            </table>
        </div>
    </body>
</html>
