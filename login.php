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

<?php
include 'meniu.php';
?>
    <?php
if(!isset($_POST['el_pastas']) || !isset($_POST['pass'])){
    ?>
    <div style="text-align: center">
        <form action="login.php" method="post">
            <input name="el_pastas" placeholder="el paštas" /><br />
            <input name="pass" placeholder="slaptažodis" type="password" /><br />
            <input type="submit" />
        </form>
    </div>
    <?php
}else{
    $user = selectManyVartotojas("el_pastas='".mysqli_real_escape_string($mysqli, $_POST['el_pastas'])."' AND 
    slaptazodis='".md5(mysqli_real_escape_string($mysqli, $_POST['pass']))."';");
    if(count($user) == 1){
        $_SESSION['user'] = $user[0];
    }
}
?>
</body>
</html>
