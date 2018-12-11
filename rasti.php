<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
</head>
<style>
.container {
    display: inline-block;
    position: relative;
    width: 33%;
}
.blokas {
    border-bottom: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    margin-top:0px;
    margin-right: 200px;
    margin-left: 200px;
}
.blokas:nth-of-type(1) {
    border-top: 1px solid black;
    margin-top: 10px;
}
</style>
<?php
   include_once 'models/Knyga.php';
   include_once 'controllers/Knyga.php';
   include_once 'models/Zanras.php';
   include_once 'controllers/Zanras.php';
   include_once 'log.php';
   include_once 'controllers/Zanrai.php';
   include_once 'models/Zanrai.php';
   include_once 'controllers/Kaina.php';
   include_once 'models/Kaina.php';
   include 'meniu.php';
?>
<body> 
    <h1>Rastos knygos</h1>
</body>
<?php
if(isset($_POST['submit'])){
    $nuo = $_POST['nuo'];
    $iki = $_POST['iki'];
    if($nuo == NULL)
        $nuo = 0;
    if($iki == NULL)
        $iki = 999;
    if(!empty($_POST['zanras'])){
        
        foreach($_POST['zanras'] as $selected){
            $parinkti_zanrai[] = $selected;
        }
    }
    if(!empty($parinkti_zanrai))
    {
        /*Atrinskim knygas pagal žanrus */
    $knygos_zanrai = selectManyZanrai();
    for($i=0; $i<count($knygos_zanrai); $i++)
    {
        $rado = false;
        for($j=0; $j<count($parinkti_zanrai); $j++)
        {
            if($knygos_zanrai[$i]->fk_zanras == $parinkti_zanrai[$j])
            {
                $rado = true;
            }
        }
        if($rado == true)
            $ieskomos[] = $knygos_zanrai[$i]->fk_Knyga;
    }
    if(!empty($ieskomos)){
        /*Atrinskim knygas pagal kainas */
        $knygos_kainos = selectManyKaina("kaina > ".$nuo." AND kaina <".$iki);
        for($i=0; $i<count($ieskomos); $i++)
        {
            for($j=0; $j<count($knygos_kainos); $j++)
            {
                if($ieskomos[$i] == $knygos_kainos[$j]->fk_Knyga)
                {
                    $atrinktos[]=$ieskomos[$i];
                }
            }
        }
        
        if(empty($atrinktos))
        {
            echo "Nerasta";
        }
        else
        {
            /*Atrinskim knygas pagal kainas */
            $knygos =  selectManyKnyga();
            for($i=0; $i<count($knygos); $i++)
            {
                $rado = false;
                for($j=0; $j<count($atrinktos); $j++)
                {
                    if($knygos[$i]->id == $atrinktos[$j])
                    {
                        $rado = true;
                    }
                }
                if($rado == true)
                {
                    ?>

                    <div class="blokas">
                        <span class="container">
                            <img src="<?php echo $knygos[$i]->paveikslelio_nuoroda;?>" alt="knygos" class="image" style="width:130px;height:200px;margin-left:25px;">
                        </span>
                        <span class="container">
                            <div><?php echo $knygos[$i]->pavadinimas;?></div>
                            <br>
                            <div><?php echo $knygos[$i]->aprasymas;?></div>
                        </span>
                        <span class="container">
                            <div>Išleidimo metai: <?php echo $knygos[$i]->isleidimo_metai;?></div>
                            <div>Kalba: <?php echo $knygos[$i]->kalba;?></div>
                            <div>Žanras:
                                <?php 
                                    $zanrai = selectManyZanrai("fk_Knyga = ".$knygos[$i]->id); 
                                    for($j = 0; $j < count($zanrai); $j++) {
                                        $zanras = selectZanras($zanrai[$j]->fk_zanras);
                                        echo $zanras->pavadinimas;
                                        echo " ";
                                    }
                                ?>
                            </div>
                            <div>ISBN: <?php echo $knygos[$i]->ISBN_kodas;?></div>
                            <div>Kaina: <?php
                            if(count($kaina = selectManyKaina("fk_Knyga=".$knygos[$i]->id." AND PrData < NOW() AND PaData > NOW()")) == 1){
                                echo $kaina[0]->kaina." €";
                            }else{
                                echo selectManyKaina("fk_Knyga=".$knygos[$i]->id." AND PrData < NOW() AND PaData IS NULL")[0]->kaina ." €";
                            }
                            //SELECT * FROM kaina WHERE fk_Knyga=2 AND PrData < NOW() AND PaData > NOW()
                            //SELECT * FROM kaina WHERE fk_Knyga=2 AND PrData < NOW() AND PaData IS NULL
                            ?></div>
                        </span>
                    </div>
                    <?php

                }
            }
        }
    }
    else echo "Nerasta tokių žanrų knygų";
    }
    else echo "Neparinkote žanro";
    
}
?>
