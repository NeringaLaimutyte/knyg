<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės
function selectAutoriai($fk_Knyga, $fk_Autorius) {
    global $mysqli;
    $query = "SELECT * FROM Autoriai WHERE fk_Knyga = ".mysqli_real_escape_string($mysqli, $fk_Knyga)."
        AND fk_Autorius = ".mysqli_real_escape_string($mysqli, $fk_Autorius);
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Autoriai($row['fk_Knyga'], $row['fk_Autorius']);
        return $temp;
    }
    return null;
}
//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyAutoriai($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Autoriai" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Autoriai($row['fk_Knyga'], $row['fk_Autorius']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

//Įterpia elementą į duombazę
function insertAutoriai($object) {
    global $mysqli;
    $query = "INSERT INTO Autoriai (fk_Knyga, fk_Autorius) VALUE (
          " . mysqli_real_escape_string($mysqli, $object->fk_Knyga) . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Autorius) . "          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateAutoriai($object) {
    global $mysqli;
    $query = "UPDATE Autoriai SET 
          fk_Knyga=" . $object->fk_Knyga . ",
          fk_Autorius=" . $object->fk_Autorius . "
          WHERE fk_Knyga = ".mysqli_real_escape_string($mysqli, $object->fk_Knyga)."
          AND fk_Autorius = ".mysqli_real_escape_string($mysqli, $object->fk_Autorius);
    mysqli_query($mysqli, $query);
}
//Ištrina elementą iš duombazės
function removeAutoriai($object) {
    global $mysqli;
    $query = "DELETE FROM Autoriai WHERE fk_Knyga = ".mysqli_real_escape_string($mysqli, $object->fk_Knyga)."
        AND fk_Autorius = ".mysqli_real_escape_string($mysqli, $object->fk_Autorius);
    mysqli_query($mysqli, $query);
}

?>
