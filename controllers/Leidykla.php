<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectLeidykla($id) {
    global $mysqli;
    $query = "SELECT * FROM Leidykla WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Leidykla($row['pavadinimas'], $row['miestas'], $row['el_pasto_adresas'], $row['gatve'], $row['namo_numeris']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyLeidykla($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Leidykla" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Leidykla($row['pavadinimas'], $row['miestas'], $row['el_pasto_adresas'], $row['gatve'], $row['namo_numeris']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

//Įterpia elementą į duombazę
function insertLeidykla($object) {
    global $mysqli;
    $query = "INSERT INTO Leidykla (pavadinimas, miestas, el_pasto_adresas, gatve, namo_numeris) VALUE (
          '" . mysqli_real_escape_string($mysqli, $object->pavadinimas) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->miestas) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->el_pasto_adresas) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->gatve) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->namo_numeris) . "'          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateLeidykla($object) {
    global $mysqli;
    $query = "UPDATE Leidykla SET 
          pavadinimas='" . $object->pavadinimas . "',
          miestas='" . $object->miestas . "',
          el_pasto_adresas='" . $object->el_pasto_adresas . "',
          el_pasto_adresas='" . $object->gatve . "',
          gatve='" . $object->namo_numeris . "'
          WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeLeidykla($object) {
    global $mysqli;
    $query = "DELETE FROM Leidykla WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

?>
