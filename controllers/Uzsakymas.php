<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectUzsakymas($id) {
    global $mysqli;
    $query = "SELECT * FROM Uzsakymas WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Uzsakymas($row['kiekis'], $row['fk_Knyga'], $row['fk_Knygu_sarasas']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyUzsakymas($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Uzsakymas" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Uzsakymas($row['kiekis'], $row['fk_Knyga'], $row['fk_Knygu_sarasas ']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

//Įterpia elementą į duombazę
function insertUzsakymas($object) {
    global $mysqli;
    $query = "INSERT INTO Uzsakymas (kiekis, fk_Knyga, fk_Knygu_sarasas) VALUE (
          " . mysqli_real_escape_string($mysqli, $object->kiekis) . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Knyga) . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Knygu_sarasas) . "          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateUzsakymas($object) {
    global $mysqli;
    $query = "UPDATE Uzsakymas SET 
          kiekis='" . $object->kiekis . "',
          fk_Knyga='" . $object->fk_Knyga . "',
          fk_Knygu_sarasas ='" . $object->fk_Knygu_sarasas . "'
          WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeUzsakymas($object) {
    global $mysqli;
    $query = "DELETE FROM Uzsakymas WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

?>
