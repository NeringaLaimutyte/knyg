<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
<style>
.blokas {
	margin:auto;
	width:200px;
	text-align:center;
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
<h1>Pirkti kuponą</h1>
<div class="blokas">

<?php
   include 'models/Klubas_kuponai.php';
   include 'controllers/Klubas_kuponai.php';
?>
<form method="post" action="")>
<h3>Kupono suma: <input type="number" name="suma" value="1" style="width:200px;height:60px;" class="mygtukas"><br>
</h3>
<br><br><br>
<input type="submit" value="Pirkti" style="width:200px;height:60px;" class="mygtukas"></form> 
<br>

<?php
if(isset($_POST["suma"]))
{
	$data1 = date('Y-m-d');
	$data = date('Y-m-d', strtotime($data1. ' + 10 days'));
	$result = addKuponas($_POST["suma"],$_SESSION["user"]->id,$data);
	if($result)
		echo "Pirkimas sėkmingas";
	else
		echo "Pirkimas nepavyko";
}
?>

<form action="klubas_kuponai.php"><input type="submit" value="Atgal" style="width:200px;height:60px;" class="mygtukas"></form>  
</div>

</body>
</html>
