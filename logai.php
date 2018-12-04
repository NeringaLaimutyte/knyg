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
    <style>
        input{
            height: 20px;
            width: 125px;
            margin-bottom: 5px;
        }
        .helper{
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
<?php
    include 'adminMenu.php';
?>
<div style="text-align: center">
    <h2>Pasirinkite filtrus</h2>
    <form action="logas.php" method="get">
        <span class="helper">Nuo</span><input type="date" name="nuoD" /></><br />
        <span class="helper">Iki</span> <input type="date" name="ikiD" value="<?php echo date('Y-m-d'); ?>"/><br />
        <span class="helper">Nuo</span> <input type="time" name="nuoL" value="00:00" /><br />
        <span class="helper">Iki</span> <input type="time" name="ikiL" value="23:59"  /><br />
        <span class="helper">IP</span>  <input type="text" name="IP" /><br />
        <span class="helper">Vartotojas</span> <input type="number" name="user" value="0" /><br />
        <span class="helper">URL</span> <input type="text" name="URL" value="/knygynas/" /><br />
        Arba palikite tuščias reiškmes visoms reikšmėms<br />
        <input type="submit" value="Rodyti statistiką" />
    </form>
</div>
</body>
</html>

