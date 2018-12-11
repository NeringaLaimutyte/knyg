<?php
include_once("configuration/config.php");
//Paima nepasibaigusius ir nepanaudotus vartotojo kuponus
function selectKuponai($id){
	global $mysqli;
	$data = date("Y-m-d");
	$query = "SELECT * FROM kuponas WHERE fk_Vartotojas='".$id."' AND ar_panaudotas='0' AND galiojimo_data>'".$data."';";
    if($result = mysqli_query($mysqli, $query)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Kuponas($row['suma'], $row['kodas'], $row['galiojimo_data']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

function addKuponas($suma, $id, $data){
	global $mysqli;
	$kodas = generateRandomString();
	$query = "SELECT * FROM kuponas WHERE kodas='".$kodas."';";
	$result = mysqli_query($mysqli, $query);
	while(mysqli_num_rows($result) > 0)
	{
		$kodas = generateRandomString();
		$query = "SELECT COUNT(id) FROM kuponas WHERE kodas='".$kodas."';";
		$result = mysqli_query($mysqli, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);		
	}
	
	$query = "INSERT INTO `kuponas` (`id`, `kodas`, `suma`, `galiojimo_data`, `ar_panaudotas`, `fk_Vartotojas`) VALUES (NULL, '".$kodas."', '".$suma."', '".$data."', '0', '".$id."');";
    $result = mysqli_query($mysqli, $query);
    return $result;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ`!@#$%^&*_=\|/*-+.,<>:;"';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}