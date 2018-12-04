<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectKnyguSarasas($id) {
    global $mysqli;
    $query = "SELECT * FROM Knygu_sarasas WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Knygu_sarasas($row['data'], $row['fk_Leidykla'], $row['fk_Sandelis']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyKnyguSarasas($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Knygu_sarasas" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Knygu_sarasas($row['data'], $row['fk_Leidykla'], $row['fk_Sandelis']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

//Įterpia elementą į duombazę
function insertKnyguSarasas($object) {
    global $mysqli;
    $query = "INSERT INTO Knygu_sarasas (data, fk_Leidykla, fk_Sandelis) VALUE (
          NOW(), 
          " . mysqli_real_escape_string($mysqli, $object->fk_Leidykla)*1 . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Sandelis)*1 . "
          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateKnyguSarasas($object) {
    global $mysqli;
    $query = "UPDATE Knygu_sarasas SET 
          data=" . mysqli_real_escape_string($mysqli, $object->data) . ",
          fk_Leidykla=" . mysqli_real_escape_string($mysqli, $object->fk_Leidykla)*1 . ",
          fk_Sandelis=" . mysqli_real_escape_string($mysqli, $object->fk_Sandelis)*1 . "
          WHERE id = " . mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeKnyguSarasas($object) {
    global $mysqli;
    $query = "DELETE FROM Knygu_sarasas WHERE id = " . mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}

?>
