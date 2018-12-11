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
        <div style="text-align: center">
            <h3>Priėmimas:</h3>
            <button class="submit" id="bendras">Bendras knygų kiekio kitimas</button><br><br>
            <button class="submit" id="gauta">Gautų knygų kiekio kitimas</button><br><br>
            <button class="submit" id="isduota">Išduotų (parduotų) knygų kiekio kitimas</button><br><br>
        </div>
        <script>
            document.getElementById('bendras').addEventListener('click', (e) => {
                window.location = 'bendras.php?id=0';
            });
            document.getElementById('gauta').addEventListener('click', (e) => {
                window.location = 'gauta.php?id=0';
            });
            document.getElementById('isduota').addEventListener('click', (e) => {
                window.location = 'isduota.php?id=0';
            });
        </script>
    </body>
</html>
