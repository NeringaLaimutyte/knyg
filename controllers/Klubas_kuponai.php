<?php
include_once("configuration/config.php");
//Paima nepasibaigusius ir nepanaudotus vartotojo kuponus
function selectKuponai($id){
	global $mysqli;
	$data = date("Y-m-d");
	$query = "SELECT * FROM kuponas WHERE fk_Vartotojas='".$id."' AND ar_panaudotas='0' AND galiojimo_data>'".$data."';";
    if($result = mysqli_query($mysqli, $query)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Kuponas($row['suma'], $row['galiojimo_data']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

function addKuponas($suma, $id, $data){
	global $mysqli;
	$query = "INSERT INTO `kuponas` (`id`, `suma`, `galiojimo_data`, `ar_panaudotas`, `fk_Vartotojas`) VALUES (NULL, '".$suma."', '".$data."', '0', '".$id."');";
    $result = mysqli_query($mysqli, $query);
    return $result;
}