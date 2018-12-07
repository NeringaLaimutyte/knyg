<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
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
    include 'log.php';
logas($_SERVER['REQUEST_URI']);
?>
<div style="text-align: center">
    <h3>Filtrai:<br /><?php
        echo 'nuo '. $_GET['nuoD'].' iki '.$_GET['ikiD'].'<br />nuo '.$_GET['nuoL'].' iki '.$_GET['ikiL'].'<br />
        IP: '.$_GET['IP']/*.'<br />URL: '.$_GET['URL']*/.'<br />Vartotojas: '.$_GET['user'];
        ?></h3>
    <table style="margin-left:auto; margin-right:auto;">
        <tr>
            <th>Laikas</th><th>URL</th><th>IP</th><th>Vartotojas</th>
        </tr>
        <?php
        $where = [];
        if($_GET['nuoD'] != ''){
            $where[] = 'data >= "'.$_GET['nuoD'].'"';
        }
        if($_GET['ikiD'] != ''){
            $where[] = 'data <= "'.$_GET['ikiD'].'"';
        }
        if($_GET['nuoL'] != ''){
            $where[] = 'laikas >= "'.$_GET['nuoL'].'"';
        }
        if($_GET['ikiL'] != ''){
            $where[] = 'laikas <= "'.$_GET['ikiL'].'"';
        }
        if($_GET['IP'] != ''){
            $where[] = 'IP = "'.$_GET['nuoD'].'"';
        }
        /*if($_GET['URL'] != ''){
            $where[] = 'URL = "'.$_GET['nuoD'].'"';
        }*/
        if($_GET['user'] != ''){
            $where[] = 'fk_Vartotojas = '.$_GET['user'];
        }
        $logs = selectManyLogas(join(" AND ", $where));
        for($i = 0; $i < count($logs); $i++){
            echo "<tr><td>".$logs[$i]->data.' '.$logs[$i]->laikas."</td><td>".$logs[$i]->URL."</td><td>".$logs[$i]->IP."</td><td>".$logs[$i]->fk_Vartotojas."</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>

