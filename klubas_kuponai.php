<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">    
<style>
.blokas {
	margin:auto;
	width:400px;
	text-align:middle;
}

.mygtukas{
	margin-left:100px;
	border-radius:8px;
	background-color:Transparent;
	border-style:solid;
	border-color:black;
	font-family:Verdana,Geneva,sans-serif;
	font-weight: bold;
	cursor:pointer;
	margin-top:15px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 400px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>    
<?php
    include_once 'log.php';
logas($_SERVER['REQUEST_URI']);
    include 'meniu.php';
?>
<h1>Kuponai</h1>
<div class="blokas">
<table>
  <tr>
	<th>Nr</th>
    <th>Suma</th>
    <th>Galioja iki</th>
    <th>Kodas</th>
  </tr>
<?php
   include 'models/Klubas_kuponai.php';
   include 'controllers/Klubas_kuponai.php';
   $kuponai = selectKuponai($_SESSION["user"]->id);
   
   for($i = 0; $i < count($kuponai); $i++){
?>
    <tr>
		<td><?php echo $i+1?></td>
        <td><?php echo $kuponai[$i]->suma;?></td>
        <td><?php echo $kuponai[$i]->galiojimo_data;?></td>
		<td><?php echo $kuponai[$i]->kodas;?></td>
   </tr>
<?php
   }
?>
</table>
<br>
<form action="klubas_pirkti_kupona.php"><input type="submit" value="Pirkti kuponą" style="width:200px;height:60px;" class="mygtukas"></form> 
<br>
<form action="klubas_main.php"><input type="submit" value="Atgal" style="width:200px;height:60px;" class="mygtukas"></form>  
</div>



</body>
</html>
