<?php

include_once("configuration/config.php");

//Paiima vartotojo issaugotas knygas
function selectIssaugotosKnygos($id) {
    global $mysqli;
	$results = [];
	$query = "SELECT * FROM Issaugotos_knygos WHERE fk_Vartotojas='".$id."';";
	if ($result = mysqli_query($mysqli, $query)) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $results[] = $row['fk_Knyga'];
		}
	}
	return $results;
}
?>