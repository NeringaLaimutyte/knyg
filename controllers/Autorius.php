<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectAutorius($id) {
    global $mysqli;
    $query = "SELECT * FROM Autorius WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Autorius($row['vardas'], $row['pavarde'], $row['biografija']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyAutorius($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Autorius" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Autorius($row['vardas'], $row['pavarde'], $row['biografija ']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

//Įterpia elementą į duombazę
function insertAutorius($object) {
    global $mysqli;
    $query = "INSERT INTO Autorius (vardas, pavarde, biografija) VALUE (
          '" . mysqli_real_escape_string($mysqli, $object->vardas) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->pavarde) . "',
          '" . mysqli_real_escape_string($mysqli, $object->biografija) . "'          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateAutorius($object) {
    global $mysqli;
    $query = "UPDATE Autorius SET 
          vardas='" . mysqli_real_escape_string($mysqli, $object->vardas) . "',
          pavarde='" . mysqli_real_escape_string($mysqli, $object->pavarde) . "',
          biografija ='" . mysqli_real_escape_string($mysqli, $object->biografija) . "'
          WHERE id = " . mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeAutorius($object) {
    global $mysqli;
    $query = "DELETE FROM Autorius WHERE id = " . mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}
?>
