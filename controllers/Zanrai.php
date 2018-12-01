<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectZanrai($id) {
    global $mysqli;
    $query = "SELECT * FROM zanrai WHERE id = " . $id;
    if ($result = mysqli_query($this->mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Naujienos($row['fk_Knyga']);
        $temp = new Naujienos($row['fk_zanras']);
        $temp->id = $row['id'];
        return $temp;
    }
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyZanrai($object, $where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM zanrai" . $where;
    if ($result = mysqli_query($this->mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new zanrai($row['fk_Knyga']);
            $temp = new zanrai($row['fk_zanras']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertZanrai($object) {
    global $mysqli;
    $query = "INSERT INTO zanrai (fk_Knyga, fk_zanras) VALUE (
          '" . mysqli_real_escape_string($this->mysqli, $this->fk_Knyga) . ", 
          '" . mysqli_real_escape_string($this->mysqli, $this->fk_zanras) . "
          
        )";
    mysqli_query($this->mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateZanrai($object) {
    global $mysqli;
    $query = "UPDATE zanrai SET 
          pavadinimas='" . $this->fk_Knyga . "'
          pavadinimas='" . $this->fk_zanras . "'
          WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeZanrai($object) {
    global $mysqli;
    $query = "DELETE FROM zanrai WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

?>
