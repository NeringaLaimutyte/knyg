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
session_start();
if (!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[2]) {
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <style>
            td{
                text-align: center;
            }
            table{
                width: 500px;
            }
            table td{
                padding: 0;
                height: 34px;
            }
            label {
                display: block;
                min-height: 100%;
                height: 100%;
            }
            input[type='checkbox'] {
                width: 25px;
                height: 25px;
                margin-bottom: 0px;

            }
        </style>
    </head>
    <body>
        <?php
        include 'meniu_sandelis.php';
        if (!isset($_GET['id'])) {
            header("location: index.php");
        } else {
            $id = $_GET['id'];
        }
        $user = selectKnyguSandelyje($id);
        if ($user == NULL) {
            header("location: sandelis_inventorizacija.php");
        }
        // https://stackoverflow.com/a/50638673
        ?>
        <div style="text-align: center">
            <h3>Kiekis:</h3>
            <form  method="post">
                <?php
                echo "<input type='text' name='kiekis' value='$id'>"
                ?>
                <input type='submit'>
            </form>
        </div>
        <?php
        if ($_POST != null) {
                if (in_array($j, $_POST['bo'])) {
                    $kiekis = $sandeliai[$j]->kiekis;
                    $kiekis = $kiekis - 1;
                    $obj = new Knygu_sandelyje($kiekis, $sandeliai[$j]->fk_Sandelis, $sandeliai[$j]->fk_Knyga);
                    updateKnyguSandelyje($obj);
                }
            header("location: sandelis_inventorizacija.php");
        }
        ?>
    </body>
</html>
