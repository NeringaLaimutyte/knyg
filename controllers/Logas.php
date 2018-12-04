<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectLogas($id) {
    global $mysqli;
    $query = "SELECT * FROM Logas WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Logas($row['data'], $row['IP'], $row['URL'], $row['laikas'], $row['fk_Vartotojas']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyLogas($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Logas" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Logas($row['data'], $row['IP'], $row['URL'], $row['laikas'], $row['fk_Vartotojas']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

///Įterpia elementą į duombazę
function insertLogas($object) {
    global $mysqli;
    $query = "INSERT INTO Logas (data, IP, URL, laikas, fk_Vartotojas) VALUE (
          NOW(), 
          '".mysqli_real_escape_string($mysqli, $object->IP)."',
          '".mysqli_real_escape_string($mysqli, $object->URL)."',
          NOW(),
          ".mysqli_real_escape_string($mysqli, $object->fk_Vartotojas)."
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateLogas($object) {
    global $mysqli;
    $query = "UPDATE Logas SET 
          data='" . $object->data . "',
          IP=" . $object->IP . ",
          URL='" . $object->URL . "',
          laikas='" . $object->laikas . "',
          fk_Vartotojas=" . $object->fk_Vartotojas*1 . "
          WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeLogas($object) {
    global $mysqli;
    $query = "DELETE FROM Logas WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

?>
