<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
<style>
.blokas {
	margin:auto;
	width:300px;
	text-align:middle;
}

.mygtukas{
	margin-left:50px;
	border-radius:8px;
	background-color:Transparent;
	border-style:solid;
	border-color:black;
	font-family:Verdana,Geneva,sans-serif;
	font-weight: bold;
	cursor:pointer;
	margin-top:15px;
}
</style>
</head>
<body>    
<?php
    include_once 'log.php';
logas($_SERVER['REQUEST_URI']);
    include 'meniu.php';
	

	
?>
<h1>Bonus pinigai</h1>

<div class="blokas">
<br>
<h3 style="text-align:center;">Bonus pinigų kiekis</h3>
<p style="text-align:center;"><?php echo $_SESSION["user"]->bonus_pinigai; echo "€"?></p>
<br>
<h3 style="text-align:center;">Personalios nuolaidos dydis</h3>
<p style="text-align:center;"><?php echo $_SESSION["user"]->nuolaida; echo "%"?></p>
<br>
<h3 style="text-align:center;">Iš viso išleista</h3>
<p style="text-align:center;"><?php echo $_SESSION["user"]->isleista_pinigu; echo "€"?></p>
<br>

<form action="klubas_main.php"><input type="submit" value="Atgal" style="width:200px;height:60px;" class="mygtukas"></form>  
</div>

</body>
</html>
