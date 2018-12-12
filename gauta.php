<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include 'log.php';
logas($_SERVER['REQUEST_URI']);
//session_start();
if (!isset($_SESSION['user']) || !$_SESSION['user']->getRoles()[2]) {
    header("location: index.php");
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
        <form method="post">
            <div style="text-align: center">
                <h3>Gautų knygų kiekio kitimas:</h3>
                Nuo: <input type="text" name="date1" id="date1" alt="date" class="IP_calendar" title="d/m/Y">
                iki: <input type="text" name="date2" id="date1" alt="date" class="IP_calendar" title="d/m/Y">
                <input type='submit'>
            </div>
        </form>
        <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js">
        </script>
    </body>
</html>
<?php
if ($_POST != null) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    if ($date1 == '' || $date2 == '') {
        echo "Nepasirinktas laikotarpis";
    } else {
        if ($date2 < $date1) {
            echo "Netinkamas laikotarpis";
        } else {
            $_SESSION['data1']=$date1;
            $_SESSION['data2']=$date2;
            header("location: gauta_grafikas.php");
        }
    }
}
?>
