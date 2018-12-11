<?php

include_once("configuration/config.php");
include_once("models/Knygu_sandelyje.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectKnyguSandelyje($id) {
    global $mysqli;
    $query = "SELECT * FROM Knygu_sandelyje WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($row == NULL){
            return NULL;
        }
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
    $results = [];
    $query = "SELECT * FROM Knygu_sandelyje" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Knygu_sandelyje($row['kiekis'], $row['fk_Sandelis'], $row['fk_Knyga']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}
function selectAmountKnyguSandelyje($fk_Knyga){
    global $mysqli;
    $query = 'SELECT SUM(kiekis) as kiekis FROM Knygu_sandelyje where fk_Knyga = '.$fk_Knyga*1;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($row == NULL){
            return NULL;
        }
        return $row['kiekis'];
    }
    return null;
}
//Įterpia elementą į duombazę
function insertKnyguSandelyje($object) {
    global $mysqli;
    $query = "INSERT INTO Knygu_sandelyje (kiekis, fk_Sandelis, fk_Knyga) VALUE (
          " . mysqli_real_escape_string($mysqli, $object->kiekis)*1 . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Sandelis)*1 . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_Knyga)*1 . "          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateKnyguSandelyje($object) {
    global $mysqli;
    $query = "UPDATE Knygu_sandelyje SET 
          kiekis=" . mysqli_real_escape_string($mysqli, $object->kiekis)*1 . ",
          fk_Sandelis=" . mysqli_real_escape_string($mysqli, $object->fk_Sandelis)*1 . ",
          fk_Knyga =" . mysqli_real_escape_string($mysqli, $object->fk_Knyga)*1 . "
          WHERE id = " . mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeKnyguSandelyje($object) {
    global $mysqli;
    $query = "DELETE FROM Knygu_sandelyje WHERE id = " . mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}

?>
