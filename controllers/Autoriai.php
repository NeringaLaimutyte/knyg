<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
/*
function selectAutoriai($id) {
    global $mysqli;
    $query = "SELECT * FROM Autoriai WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Autoriai($row['fk_Knyga'], $row['fk_Autorius']);
        $temp->id = $row['id'];
        return $temp;
    }
}
*/
//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyAutoriai($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM Autoriai" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Autoriai($row['fk_Knyga'], $row['fk_Autorius']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
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
/*
function updateAutoriai($object) {
    global $mysqli;
    $query = "UPDATE Autoriai SET 
          fk_Knyga=" . $object->fk_Knyga . ",
          fk_Autorius=" . $object->fk_Autorius . "
          WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}
*/
//Ištrina elementą iš duombazės
function removeAutoriai($object) {
    global $mysqli;
    $query = "DELETE FROM Autoriai WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

?>
