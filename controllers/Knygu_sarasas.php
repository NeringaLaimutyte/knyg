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
    $result = [];
    $query = "SELECT * FROM Knygu_sarasas" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Knygu_sarasas($row['data'], $row['fk_Leidykla'], $row['fk_Sandelis']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertKnyguSarasas($object) {
    global $mysqli;
    $query = "INSERT INTO Knygu_sarasas (data, fk_Leidykla, fk_Sandelis) VALUE (
          NOW(), 
          " . mysqli_real_escape_string($mysqli, $object->fk_Leidykla) . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Sandelis) . "
          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateKnyguSarasas($object) {
    global $mysqli;
    $query = "UPDATE Knygu_sarasas SET 
          data=" . $object->data . ",
          fk_Leidykla=" . $object->fk_Leidykla . ",
          fk_Sandelis=" . $object->fk_Sandelis . "
          WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeKnyguSarasas($object) {
    global $mysqli;
    $query = "DELETE FROM Knygu_sarasas WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

?>
