<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectSandelis($id) {
    global $mysqli;
    $query = "SELECT * FROM Sandelis WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Sandelis($row['pavadinimas'], $row['gatve'], $row['miestas'], $row['namo_numeris']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManySandelis($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Sandelis" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Sandelis($row['pavadinimas'], $row['gatve'], $row['miestas '], $row['namo_numeris ']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

//Įterpia elementą į duombazę
function insertSandelis($object) {
    global $mysqli;
    $query = "INSERT INTO Sandelis (pavadinimas, gatve, miestas , namo_numeris ) VALUE (
          '" . mysqli_real_escape_string($mysqli, $object->pavadinimas) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->gatve) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->miestas) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->namo_numeris) . "'          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateSandelis($object) {
    global $mysqli;
    $query = "UPDATE Sandelis SET 
          pavadinimas='" . $object->pavadinimas . "',
          gatve='" . $object->gatve . "',
          miestas ='" . $object->miestas . "',
          namo_numeris ='" . $object->namo_numeris . "'
          WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeSandelis($object) {
    global $mysqli;
    $query = "DELETE FROM Sandelis WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

?>
