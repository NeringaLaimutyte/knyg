<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
include_once 'controllers/DazniausiasIp.php';
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
    include 'adminMenu.php';
    if(!isset($_GET['id']) || $_GET['id'] == 0){
        header("location: index.php");
    }
    $user = selectVartotojas($_GET['id']);
    if($user == NULL){
        header("location: vartotojai.php");
    }
    // https://stackoverflow.com/a/50638673
?>
<div style="text-align: center">
    <h3>Vartotojas:</h3>
    <table style="margin-left:auto; margin-right:auto;">
        <tr><th colspan="3" style="text-align: center;">BENDROJI INFORMACIJA</th></tr>
        <tr><td>Vardas</td><td>Pavardė</td><td>El. Paštas</td></tr>
        <tr><td><?php echo $user->vardas; ?></td><td><?php echo $user->pavarde; ?></td><td><?php echo $user->el_pastas; ?></td></tr>
    </table><br />
    <table style="margin-left:auto; margin-right:auto;">
        <tr><th colspan="4" style="text-align: center">ROLĖS</th></tr>
        <tr><td>Vartotojas</td><td>Darbuotojas</td><td>Sandėlio darbuotojas</td><td>Administratorius</td></tr>
        <tr>
        <?php for($i = 0; $i < 4; $i++){ ?>
    <td><label><input type="checkbox" <?php echo ($user->getRoles()[$i])?'checked':''; ?> /></label></td>
        <?php } ?></tr>
    </table><br />
    <table style="margin-left:auto; margin-right:auto;">
        <tr><th colspan="3" style="text-align: center;">STATISTIKA</th></tr>
        <tr><td>Paskutinis prisijungimas</td><td>Dažniausias IP</td><td>Nupirkta knygų</td></tr>
        <tr><td><?php $last = selectManyLogas('fk_Vartotojas = '.$user->id.' ORDER BY id  DESC LIMIT 1')[0]; echo $last->data.'<br />'.$last->laikas; ?></td><td><?php echo dazniausiasIP($user->id) ?></td><td><?php echo $user->nupirkta_knygu; ?></td></tr>
    </table>
</div>
<script>
    let checkboxes = [...document.getElementsByTagName('input')];
    for(let i = 0; i < 4; i++){
        checkboxes[i].addEventListener("click", function(){
            update(i);
        });
    }
    function update(id) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
        };
        xhttp.open("GET", "keistiRole.php?id=<?php echo $_GET['id']; ?>&role="+id, true);
        xhttp.send();
    }
</script>
</body>
</html>

