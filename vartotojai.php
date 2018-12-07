<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
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
    <h3>Vartotojai:</h3>
    <table style="margin-left:auto; margin-right:auto;">
        <tr>
            <th>#</th><th>Vardas</th><th>Pavardė</th><th>Rolės</th><th>Veiksmas</th>
        </tr>
        <?php
        function role($arr){
            $text = ['Paprastas', 'Darbuotojas', 'Sandėlio darbuotojas', 'Administratoruis'];
            $result = [];
            for($i = 0; $i < 4; $i++){
                if($arr[$i]){
                    $result[] = $text[$i];
                }
            }
            if(count($result) == 0){
                $result[] = 'Deaktyvuotas';
            }
            return join('<br />', $result);
        }
        $users = selectManyVartotojas("id > 0");
        for($i = 0; $i < count($users); $i++){
            $roles = role($users[$i]->getRoles());
            $aktyvuoti = ($roles == 'Deaktyvuotas')?'Aktyvuoti':'Deaktyvuoti';
            echo "<tr><td>".$users[$i]->id."</td><td>".$users[$i]->vardas."</td><td>".$users[$i]->pavarde."</td>
<td>".$roles."</td><td><a href='vartotojas.php?id=".$users[$i]->id."'>Keisti</a><!--<br />
<a href='aktyvuoti.php?id=".$users[$i]->id."'>".$aktyvuoti."</a>--></td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>

