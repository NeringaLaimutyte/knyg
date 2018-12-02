<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
if(!isset($_POST['vardas'])){
    ?>
    <form action="register.php" method="post">
        <input name="vardas" placeholder="vardas" /><br />
        <input name="pavarde" placeholder="pavarde" /><br />
        <input name="el_pastas" placeholder="el paštas" /><br />
        <input name="pass1" placeholder="slaptažodis" type="password" /><br />
        <input name="pass2" placeholder="pakartokite slaptažodį" type="password" /><br />
        <input name="adresas" placeholder="adresas" /><br />
        <input type="submit" />
    </form>
    <?php
}elseif($_POST['pass1'] == $_POST['pass2']){
    $user = new Vartotojas($_POST['vardas'], $_POST['pavarde'], $_POST['el_pastas'], $_POST['adresas'], 1);
    insertVartotojas($user, md5($_POST['pass1']));
}
?>