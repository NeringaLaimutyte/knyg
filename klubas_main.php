<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
<style>
.blokas {
	margin:auto;
	width:200px;
	text-align:middle;
}

.mygtukas{
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
<h1>Bonus klubas</h1>

<div class="blokas">
<form action="klubas_issaugotos_knygos.php"><input type="submit" value="Išsaugotos knygos" style="width:200px;height:60px;" class="mygtukas"></form>  
<form action="klubas_uzsakymu_istorija.php"><input type="submit" value="Užsakymų istorija" style="width:200px;height:60px;" class="mygtukas"></form>  
<form action="klubas_bonus_pinigai.php"><input type="submit" value="Bonus pinigai" style="width:200px;height:60px;" class="mygtukas"></form>  
<form action="klubas_pasiulymai.php"><input type="submit" value="Knygų pasiūlymai" style="width:200px;height:60px;" class="mygtukas"></form>  
<form action="klubas_kuponai.php"><input type="submit" value="Dovanų kuponai" style="width:200px;height:60px;" class="mygtukas"></form>  
</div>

</body>
</html>
