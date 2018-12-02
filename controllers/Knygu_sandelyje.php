<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectKnyguSandelyje($id) {
    global $mysqli;
    $query = "SELECT * FROM Knygu_sandelyje WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Knygu_sandelyje($row['kiekis'], $row['fk_Sandelis'], $row['fk_Knyga']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyKnyguSandelyje($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM Knygu_sandelyje" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Knygu_sandelyje($row['kiekis'], $row['fk_Sandelis'], $row['fk_Knyga ']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertKnyguSandelyje($object) {
    global $mysqli;
    $query = "INSERT INTO Knygu_sandelyje (kiekis, fk_Sandelis, fk_Knyga) VALUE (
          " . mysqli_real_escape_string($mysqli, $object->kiekis) . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Sandelis) . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Knyga) . "          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateKnyguSandelyje($object) {
    global $mysqli;
    $query = "UPDATE Knygu_sandelyje SET 
          kiekis=" . $object->kiekis . ",
          fk_Sandelis=" . $object->fk_Sandelis . ",
          fk_Knyga =" . $object->fk_Knyga . "
          WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeKnyguSandelyje($object) {
    global $mysqli;
    $query = "DELETE FROM Knygu_sandelyje WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

?>
