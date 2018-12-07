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
<h1>Išsaugotos knygos</h1>

<div class="blokas">
<form action="klubas_main.php"><input type="submit" value="Atgal" style="width:200px;height:60px;" class="mygtukas"></form>  
</div>

</body>
</html>
