<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo fk_Knyga ir fk_zanras

function selectZanrai($fk_Knyga, $fk_zanras) {
    global $mysqli;
    $query = "SELECT * FROM zanrai WHERE fk_Knyga = ".mysqli_real_escape_string($mysqli, $fk_Knyga)."
        AND fk_zanras = ".mysqli_real_escape_string($mysqli, $fk_zanras);
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Zanrai($row['fk_Knyga'], $row['fk_zanras']);
        /*$temp->id = $row['id']; lentele neturi id*/
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyZanrai($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM zanrai" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Zanrai($row['fk_Knyga'], $row['fk_zanras']);
            /*$temp->id = $row['id']; lentele neturi id*/
            $results[] = $temp;
        }
    }
    return $results;
}

//Įterpia elementą į duombazę
function insertZanrai($object) {
    global $mysqli;
    $query = "INSERT INTO zanrai (fk_Knyga, fk_zanras) VALUE (
          " . mysqli_real_escape_string($mysqli, $object->fk_Knyga)*1 . ", 
          " . mysqli_real_escape_string($mysqli, $object->fk_zanras)*1 . "          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje

function updateZanrai($object) {
    global $mysqli;
    $query = "UPDATE zanrai SET 
          fk_Knyga=". mysqli_real_escape_string($mysqli, $object->fk_Knyga) . ",
          fk_zanras=" . mysqli_real_escape_string($mysqli, $object->fk_zanras) . "
          WHERE fk_Knyga = ".mysqli_real_escape_string($mysqli, $object->fk_Knyga)*1 ."
              AND fk_zanras = ".mysqli_real_escape_string($mysqli, $object->fk_zanras)*1;
    mysqli_query($mysqli, $query);
}
//Ištrina elementą iš duombazės
function removeZanrai($object) {
    global $mysqli;
    $query = "DELETE FROM zanrai WHERE fk_Knyga = ".mysqli_real_escape_string($mysqli, $object->fk_Knyga)."
        AND fk_zanras = ".mysqli_real_escape_string($mysqli, $object->fk_zanras);
    mysqli_query($mysqli, $query);
}

?>
