<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'controllers/Vartotojas.php';
include_once 'models/Knyga.php';
include_once 'controllers/Knyga.php';
include_once 'models/Kaina.php';
include_once 'controllers/Kaina.php';
include_once 'models/Autoriai.php';
include_once 'controllers/Autoriai.php';
include_once 'models/Autorius.php';
include_once 'controllers/Autorius.php';
include_once 'models/Zanras.php';
include_once 'controllers/Zanras.php';
include_once 'models/Zanrai.php';
include_once 'controllers/Zanrai.php';
session_start();
include 'log.php';
logas($_SERVER['REQUEST_URI']);
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
    $news = selectKnyga($_GET['id']*1);
    $button = 'Atnaujinti knygą';
    $authors = selectManyAutorius();
    $genres = selectManyZanras();
    $author = [];
    $genre = [];
    if($news == null){
        $news = new Knyga();
        $news->id = 0;
        $button = 'Įrašyti knygą';
    }else{
        $author = selectManyAutoriai('fk_knyga = '.$news->id);
        $genre = selectManyZanrai('fk_knyga = '.$news->id);
    }
?>
<div style="text-align: center">
    <h2>Apie knygą</h2>
    <form action="rasytiKnyga.php" method="post" id="form">
        <span class="helper">Pavadinimas</span><input type="text" name="pavadinimas" value="<?php echo $news->pavadinimas; ?>"/><br />
        <span class="helper">Autoriai</span><select name="autoriai[]" multiple>
            <?php
            for($i = 0; $i < count($authors); $i++){
                $selected = '';
                for($j = 0; $j < count($author); $j++){
                    if($authors[$i]->id == $author[$j]->fk_Autorius){
                        $selected = 'selected';
                        break;
                    }
                }
                echo '<option value="'.$authors[$i]->id.'" '.$selected.' >'.$authors[$i]->vardas.' '.$authors[$i]->pavarde.'</option>';
            }
            ?>
        </select><br />
        <span class="helper">Žanrai</span><select name="zanrai[]" multiple>
            <?php
                for($i = 0; $i < count($genres); $i++){
                    $selected = '';
                    for($j = 0; $j < count($genre); $j++){
                        if($genres[$i]->id == $genre[$j]->fk_zanras){
                            $selected = 'selected';
                            break;
                        }
                    }
                    echo '<option value="'.$genres[$i]->id.'" '.$selected.' >'.$genres[$i]->pavadinimas.'</option>';
                }
            ?>
        </select><br />
        <span class="helper">Kaina</span><input type="number" name="kaina" value="<?php echo latestKaina($news->id)->kaina; ?>"/><br />
        <span class="helper">Kaina nuo</span><input type="date" name="nuo" value="<?php echo date('Y-m-d'); ?>"/><br />
        <span class="helper">Kaina iki</span><input type="date" name="iki" value="" /><br />
        <span class="helper">ISBN</span><input type="text" name="ISBN" value="<?php echo $news->ISBN_kodas; ?>"/><br />
        <span class="helper">Metai</span><input type="number" name="metai" value="<?php echo $news->isleidimo_metai; ?>"/><br />
        <span class="helper">PSL kiekis</span><input type="number" name="psl" value="<?php echo $news->puslapiu_skaicius; ?>"/><br />
        <span class="helper">Kalba</span><input type="text" name="kalba" value="<?php echo $news->kalba; ?>"/><br />
        <span class="helper">Viršelio tipas</span><input type="text" name="virselis" value="<?php echo $news->virselio_tipas; ?>"/><br />
        <span class="helper">Viršelio url</span><input type="text" name="url" value="<?php echo $news->paveikslelio_nuoroda; ?>"/><br />
        <textarea cols="35" rows="5" name="tekstas" placeholder="Aprašymas" usrform="form"><?php echo $news->aprasymas; ?></textarea><br />
        <input type="hidden" name="id" value="<?php echo $news->id; ?>" />
        <input type="submit" value="<?php echo $button; ?>" />
    </form>
</div>
</body>
</html>

