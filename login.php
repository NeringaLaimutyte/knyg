<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div style="text-align: center">
<?php
include_once 'log.php';
include 'meniu.php';
$form = '
        <form action="login.php" method="post">
            <input name="el_pastas" placeholder="el paštas" /><br />
            <input name="pass" placeholder="slaptažodis" type="password" /><br />
            <input type="submit" />
        </form>';
if(!isset($_POST['el_pastas']) || !isset($_POST['pass'])){
    echo $form;
}else{
    $user = selectManyVartotojas("el_pastas='".mysqli_real_escape_string($mysqli, $_POST['el_pastas'])."' AND 
    slaptazodis='".md5(mysqli_real_escape_string($mysqli, $_POST['pass']))."';");
    if(count($user) == 1){
        $_SESSION['user'] = $user[0];
        header("Location: index.php");
    }else{
        echo '<h2>Nepavyko prisijungti</h2>'.$form;
    }
}
?>
</div>
</body>
</html>
